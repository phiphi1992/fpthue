<?php

class LinksController extends Controller
{
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations

		);
	}
	public function allowedActions()
	{
		//return 'error';
	}
	
	public function actionIndex()
	{
		$model = new Links('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Links']))
			$model->attributes=$_GET['Links'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new Links(); 
		if(!empty($_POST['Links'])){
			$model->attributes = $_POST['Links'];
			$model->created = time();
			/*Get max priority*/
			$maxPriority = Links::model()->getMaxPriority();
			$model->priority = $maxPriority + 1;
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/links'));
			}
		}
		$this->render('create', array('model'=>$model));
	}
	
	public function actionUpdate($id = null)
	{
		$model = Links::model()->findByPk($id);
		if(!empty($_POST['Links'])){
			$model->attributes = $_POST['Links'];
			$model->created = time();
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhật thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/links/'));
			}
		}
		$this->render('update', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=Links::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	// function delete rows
	public function actionDeleteAll($id){
		$arrIdNew = explode(",",$id);
		$idCate = Links::model()->findByPk($arrIdNew[0]);
		for($i=0; $i<count($arrIdNew); $i++){
			$this->loadModel($arrIdNew[$i])->delete();
		}
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
}