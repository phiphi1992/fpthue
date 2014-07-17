<?php

class NewsController extends Controller
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
	
	public function actionIndex($id)
	{
		$catelog = CategoriesNews::model()->findByPk($id);
		if($catelog == null)
			throw new CHttpException('404','Không tìm thấy trang.');
		$model = new News('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('index',array(
			'model'=>$model,
			'catalog'=>$catelog
		));
	}
	public function actionCreate($id=null)
	{
		$category=CategoriesNews::model()->findByPk($id);
		$model = new News; 
		$flag = 0;
		if(!empty($_POST['News'])){
			$image_old = $model->attributes['image'];
			
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				//$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image_old);
				//if(file_exists($path)) unlink($path);
				$model->attributes = $_POST['News'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				
				$model->attributes = $_POST['News'];
				$model->image = $image_old;
			}
			$model->created = time();
			$model->alias = alias($_POST['News']['name']);
			$model->category_news_id =$id;
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));

				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				$this->redirect(PIUrl::createUrl('/admin/news/'.$model->category_news_id));
			}
		}
		$dataCategories = CategoriesNews::model()->getDataCategories();
		$this->render('create', array('model'=>$model, 'dataCategories'=>$dataCategories));
	}
	
	public function actionUpdate($id = null)
	{
		$model = News::model()->findByPk($id);
		$flag  = 0;
		$image_old = $model->attributes['image'];
		if(!empty($_POST['News'])){
		
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image_old);
				if(file_exists($path) && !empty($image_old)) unlink($path);
				$model->attributes = $_POST['News'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				$model->attributes = $_POST['News'];
				$model->image = $image_old;
			}
			$model->created = time();
			$model->alias = alias($_POST['News']['name']);
			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhật thành công.'));
				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				$this->redirect(PIUrl::createUrl('/admin/news/'.$model->category_news_id));
			}
		}
		$dataCategories = CategoriesNews::model()->getDataCategories();
		$this->render('update', array('model'=>$model, 'dataCategories'=>$dataCategories));
	}
	
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
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
		$idCate = News::model()->findByPk($arrIdNew[0]);
		for($i=0; $i<count($arrIdNew); $i++){
			$this->loadModel($arrIdNew[$i])->delete();
		}
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index?id='.$idCate->category_news_id));
	}
}