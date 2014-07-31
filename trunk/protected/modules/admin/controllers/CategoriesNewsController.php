<?php

class CategoriesNewsController extends Controller
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
		$model = new CategoriesNews('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['CategoriesNews']))
			$model->attributes=$_GET['CategoriesNews'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new CategoriesNews;
		
		if(isset($_POST['CategoriesNews']))
		{
			$model->attributes=$_POST['CategoriesNews'];
			$model->created = time();
			$model->alias = alias($_POST['CategoriesNews']['name']);
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/categoriesNews/index'));
			}
		}
		
		$this->render('create', array('model'=>$model));
	}
	
	public function actionUpdate($id = null)
	{
		$model = CategoriesNews::model()->findByPk($id);
		
		if(isset($_POST['CategoriesNews']))
		{
			
			$model->attributes=$_POST['CategoriesNews'];
			$model->created = time();
			
			if($model->save())
			{
				Yii::app()->user->setFlash('success', translate('Cập nhập thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/news',array('id'=>$id)));
			}
		}
		
		$this->render('update', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=CategoriesNews::model()->findByPk($id);
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
	
}