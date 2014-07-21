<?php

class SlidesController extends Controller
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
		if(!empty($_POST)){
			$images =  CUploadedFile::getInstancesByName('images');
			if (isset($images) && count($images) > 0) {
				// go through each uploaded image
				foreach ($images as $image => $pic) {
					$model = new Slides; 
					$imageType = explode('.',$pic->name);
					$imageType = $imageType[count($imageType)-1];
					$imageName = md5(uniqid()).'.'.$imageType;
					if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName)) 
					{											
						$model->image = $imageName;
						$model->name = $pic->name;
						
						$model->save();

							
								Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
					
					}
						// handle the errors here, if you want
						
				}
			}	
			$this->redirect(PIUrl::createUrl('/admin/slides/index/'));	
		}
		
		$criteria=new CDbCriteria();
		$criteria->order = 'id DESC';
		$count=Slides::model()->count($criteria);
		$pages=new CPagination($count);
		
		// results per page
		$pages->pageSize=6;
		$pages->applyLimit($criteria);
		$model=Slides::model()->findAll($criteria);
		$this->render('index',compact('model','pages'));
	}
	
	public function loadModel($id)
	{
		$model=Slides::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionDelete($id)
	{
		$model = Slides::model()->findByPk($id);
		if($model == null) 
			$this->redirect(PIUrl::createUrl('/admin/slides/index/'));
		$name = $model->attributes['image'];
		$this->loadModel($id)->delete();
		if(file_exists(Yii::app()->basePath.'/../upload/images/'.$name) && $name->image != '')
			unlink(Yii::app()->basePath.'/../upload/images/'.$name);
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		$this->redirect(PIUrl::createUrl('/admin/slides'));
	}
}