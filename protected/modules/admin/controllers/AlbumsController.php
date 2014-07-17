<?php

class AlbumsController extends Controller
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
		$model = new Albums('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Albums']))
			$model->attributes=$_GET['Albums'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	public function actionCreate()
	{
		$model = new Albums; 
		
		$flag = 0;
		if(!empty($_POST['Albums'])){
			$image_old = $model->attributes['image'];
			
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				//$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image_old);
				//if(file_exists($path)) unlink($path);
				$model->attributes = $_POST['Albums'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				
				$model->attributes = $_POST['Albums'];
				$model->image = $image_old;
			}
			$model->created = time();
			$model->alias = alias($_POST['Albums']['name']);
			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));

				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				$this->redirect(PIUrl::createUrl('/admin/albums/index'));
			}
		}
		$this->render('create', array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=Albums::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionView($id) 
	{
		$album=Albums::model()->findByPk($id);
		if(!empty($_POST)){
			$images =  CUploadedFile::getInstancesByName('images');
			if (isset($images) && count($images) > 0) {
				// go through each uploaded image
				foreach ($images as $image => $pic) {
					$model = new Images;
					$imageType = explode('.',$pic->name);
					$imageType = $imageType[count($imageType)-1];
					$imageName = md5(uniqid()).'.'.$imageType;
					
					if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName)) 
					{											
						$model->image = $imageName;
						$model->name = $pic->name;
						$model->created = time();
						$model->album_id = $album->id;
						$model->save();
							
							Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
					}
						// handle the errors here, if you want
				}
				
			}	
			$this->redirect(PIUrl::createUrl('/admin/albums/view/id/'.$id));		
		}
		
		$criteria=new CDbCriteria();
		$criteria->addCondition("album_id = {$id}");
		$criteria->order = 'id DESC';
		$count=Images::model()->count($criteria);
		$pages=new CPagination($count);
		
		// results per page
		$pages->pageSize=18;
		$pages->applyLimit($criteria);
		$listImage=Images::model()->findAll($criteria);
		
		$this->render('view',compact('model','list','pages','listImage','id','album'));
    }
	
	public function actionUpdate($id = null)
	{
		$model = Albums::model()->findByPk($id);
		
		$flag  = 0;
		$image_old = $model->attributes['image'];
		if(!empty($_POST['Albums'])){
		
			if(!empty(CUploadedFile::getInstance($model,'image')->name))
			{
				$image_old = $model->attributes['image'];
				$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image_old);
				if(file_exists($path) && !empty($image_old)) unlink($path);
				$model->attributes = $_POST['Albums'];
				$model->image = CUploadedFile::getInstance($model,'image');
				$image = $model->image;
				$imageType = explode('.',$model->image->name);
				$imageType = $imageType[count($imageType)-1];
				$imageName = md5(uniqid()).'.'.$imageType;
				$model->image = $imageName;
				$images_path = Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName;
				$flag = 1;
			}else{
				$model->attributes = $_POST['Albums'];
				$model->image = $image_old;
			}
			$model->created = time();
			$model->alias = alias($_POST['Albums']['name']);
			
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhật thành công.'));
				if($flag == 1)
				{
					$image->saveAs($images_path);	
				}
				$this->redirect(PIUrl::createUrl('/admin/albums/'));
			}
		}
		$this->render('update', array('model'=>$model));
	}
	
	
	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
	public function actionSetPrimary(){
		if(!empty($_POST['album']) && !empty($_POST['image_id'])){
			Images::model()->updateAll(array('is_primary'=>0),'album_id=:album_id',array(':album_id'=>$_POST['album']));
			Images::model()->updateByPk($_POST['image_id'],array('is_primary'=>1));
			jsonOut(array('error'=>false,'msg'=>'Chọn hình đại diện thành công.'));
		}
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