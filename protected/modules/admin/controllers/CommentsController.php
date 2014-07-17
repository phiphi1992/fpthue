<?php

class CommentsController extends Controller
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
	
	public function actionIndex(){
		
		$model = new Comments('search');
		$model->unsetAttributes();  // clear any default values
	
		if(isset($_GET['Comments']))
			$model->attributes=$_GET['Comments'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	 
	public function actionUpdate($id=null)
	{
		
		$model = Comments::model()->findByPk($id);
		
		if(isset($_POST['Comments']))
		{
			$model->attributes=$_POST['Comments'];
			$model->created = time();
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Cập nhập thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/comments/index'));
			}
		}
		
		$this->render('update', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=Comments::model()->findByPk($id);
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
		for($i=0; $i<count($arrIdNew); $i++){
			$this->loadModel($arrIdNew[$i])->delete();
		}
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	public function actionGetContentByID($id){
		$arr = explode(",", $id);
		$id = $arr[count($arr)-1];
		$model=Comments::model()->findByPk($id);
		$data = array();
		$data[0] = $model->content;
		$data[1] = $model->title;
		$data[2] = $model->address;
		echo json_encode($data);
	}
	
}