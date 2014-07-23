<?php

class InformationsController extends Controller
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
		$model = Informations::model()->find();		
		$flag = 0;
		if(!empty($_POST['Informations'])){
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image_old);
				if(file_exists($path) && !empty($image_old)) unlink($path);
				$model->attributes = $_POST['Informations'];
				$model->image = CUploadedFile::getInstance($model,'image');
				
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				$arr = $_POST['Informations'];
				//array_pop($arr);
				$model->attributes = $arr;
				$model->name = 'Bài viết trang chủ';
				$model->description = 'Bài viết trang chủ';
			}
			$model->created = time();
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhật thành công.'));
				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				$this->redirect(PIUrl::createUrl('/admin/informations/'));
			}
		}
		$this->render('index',array('model'=>$model));
	}
}