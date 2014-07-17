<?php

class TeachersController extends Controller
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
		
		$model = Teachers::model()->find();
		$flag = 0; $flag1 = 0;
		if(!empty($_POST['Teachers'])){
			$image1_old = $model->attributes['image1'];
			if(!empty(CUploadedFile::getInstance($model,'image1')->name))
			{
				$image1_old = $model->attributes['image1'];
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image1_old);
				if(file_exists($path) && !empty($image1_old)) unlink($path);
				$model->attributes = $_POST['Teachers'];
				$model->image1 = CUploadedFile::getInstance($model,'image1');
				$image = $model->image1;
				$imageType = explode('.',$model->image1->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image1 = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				$model->image1 = $image1_old;
				$model->attributes = $_POST['Teachers'];
				
			}
			
			$image2_old = $model->attributes['image2'];
			if(!empty(CUploadedFile::getInstance($model,'image2')->name))
			{
				$image2_old = $model->attributes['image2'];
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image2_old);
				if(file_exists($path) && !empty($image2_old)) unlink($path);
				$model->image2 = CUploadedFile::getInstance($model,'image2');
				$image1 = $model->image2;
				$imageType = explode('.',$model->image2->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image2 = $imageName;
				$images_path1 = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag1 = 1;
			}else{
				$model->image2 = $image2_old;
				$model->attributes = $_POST['Teachers'];
			}
			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhật thành công.'));
				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				if($flag1 == 1)
				{
					$image1->saveAs($images_path1);
				}
				$this->redirect(PIUrl::createUrl('/admin/teachers'));
			}
		}
		$this->render('index',array('model'=>$model));
	}
	
}