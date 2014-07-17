<?php

class AdminController extends Controller
{
	public $defaultAction = 'admin';
	
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl', // perform access control for CRUD operations
		));
		/*return array(
			'rights', // perform access control for CRUD operations

		);*/
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','view'),
				//'users'=>UserModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function init(){
		parent::init();
		$this->layout = $this->module->layout;
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('searchNew');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['User']))
		{
			$model->attributes=$_GET['User'];
			$model->fullname = $_GET['User']['fullname'];
		}

        $this->render('index',array(
            'model'=>$model,
        ));
		/*$dataProvider=new CActiveDataProvider('User', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
		$profile=new Profile;
		$modelClass= new Classes();
		$this->performAjaxValidation(array($model,$profile));
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
			$profile->attributes=$_POST['Profile'];
			$profile->user_id=0;
			if($model->validate()&&$profile->validate()) {
				$model->password=Yii::app()->controller->module->encrypting($model->password);
				if($model->save()) {
					$profile->user_id=$model->id;
					$profile->save();
					/*Add role for user. added by phihx. date 14/02/2014*/
					if(!empty($_POST['user_role'])){
						//foreach($_POST['user_role'] as $role){
							Rights::assign($_POST['user_role'], $model->id);
						//}
					}
					if(!empty($_POST['Classes']['id'])){
						$userClass = new UsersClass;
						$userClass->user_id = $model->id;
						$userClass->class_id = $_POST['Classes']['id'];
						$userClass->save();
					}
					Yii::app()->user->setFlash('success',translate('Thêm mới người dùng thành công.'));
				}
				$this->redirect(PIUrl::createUrl('/user'));
			} else $profile->validate();
		}
		/* Get All role. Added by Phihx. date 14/02/2014*/
		$allRoles=$this->getAllRoleUser();
		//$allClass = Classes::model()->findAll();
		/*Get classes*/
		$arrClass[''] = '---Chọn lớp---';
		$classes = Classes::model()->findAllByAttributes(array('status'=>Classes::STATUS_ACTIVE));
		if(!empty($classes)){
			foreach ($classes as $class) {
				$arrClass[$class->id] = $class->name;
			}
		}
		$this->render('create',array(
			'model'=>$model,
			'profile'=>$profile,
			'modelClass'=>$modelClass,
			'allRoles'=>$allRoles,
			'arrClass'=>$arrClass,
			'userCurrenRole'=>array('student'),
		));
	}
	/**
	* This method use to get all user role
	* @author Phihx
	* @date 14/02/2014
	*/
	public function getAllRoleUser(){
		Yii::import('application.modules.rights.components.dataproviders.*');
		$all_roles= new RAuthItemDataProvider('roles', array( 
						'type'=>2,
					));
		return $all_roles->fetchData();
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$profile=$model->profile;
		$this->performAjaxValidation(array($model,$profile));
		
		/* Get current user role. Added by Phihx. date 14/02/2014*/
		$assignedItems = Rights::getAuthorizer()->getAuthItems(null, $model->id);
		$userCurrenRole = array_keys($assignedItems);
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];

			if($model->validate()&&$profile->validate()) {
				/*$old_password = User::model()->notsafe()->findByPk($model->id);
				if ($old_password->password!=$model->password) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);
					$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
				}*/
				if (!empty($_POST['newPassword'])) {
					$model->password=Yii::app()->controller->module->encrypting($_POST['newPassword']);
					$model->activkey=Yii::app()->controller->module->encrypting(microtime().$_POST['newPassword']);
				}

				$model->save();
				$profile->save();

				/*remove role for user. added by phihx. date 14/02/2014*/
				if(!empty($userCurrenRole)){
					foreach($userCurrenRole as $role){
						Rights::revoke($role, $model->id);
					}
				}
				/*Add role for user. added by phihx. date 14/02/2014*/
				if(!empty($_POST['user_role'])){
					//foreach($_POST['user_role'] as $role){
						Rights::assign($_POST['user_role'], $model->id);
					//}
				}
				Yii::app()->user->setFlash('success',translate('Chỉnh sửa người dùng thành công.'));
				$this->redirect(PIUrl::createUrl('/user'));
			} else $profile->validate();
		}
		
		/* Get All role. Added by Phihx. date 14/02/2014*/
		$allRoles=$this->getAllRoleUser();
		//$allClass = Classes::model()->findAll();
		$arrClass[''] = '---Chọn lớp---';
		
		
		Yii::app()->theme= 'flatlab';
		
		$this->render('update',array(
			'model'=>$model,
			'profile'=>$profile,
			'allRoles'=>$allRoles,
			'userCurrenRole'=>$userCurrenRole,
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel();
			$profile = Profile::model()->findByPk($model->id);
			$profile->delete();
			$model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('/user/admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	/**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($validate)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($validate);
            Yii::app()->end();
        }
    }
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->notsafe()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
}