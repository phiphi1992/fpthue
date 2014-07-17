<?php

class ImagesController extends Controller
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
	public function actions()
    {
        return array(
            'upload'=>array(
                'class'=>'ext.xupload.actions.XUploadAction',
                'path' =>Yii::getPathOfAlias('webroot').'/upload/images',
                'publicPath' => Yii::app()->baseUrl.'/image/50/50/1/',
            ),
        );
    }
	
	public function actionIndex()
	{
		$model = new Images;
		$criteria=new CDbCriteria();
		$criteria->condition = 'album_id=:album_id';
		$criteria->order = 'id DESC';
		$criteria->params = array(':album_id'=>Images::$IMAGE_PHOTO);
		$count=Images::model()->count($criteria);
		$pages=new CPagination($count);
		
		// results per page
		$pages->pageSize=18;
		$pages->applyLimit($criteria);
		$listImage=Images::model()->findAll($criteria);
		//dump($model);
		$dataAlbums = Albums::model()->getAlbums();
		$this->render('index',compact('model','pages','dataAlbums','listImage'));
	}
	
	public function actionBanner(){
		if(isset($_POST['selected']) && !empty($_POST['selected'])){
			foreach($_POST['selected'] as $k=>$v){
					$model = Images::model()->findByPk($v);
					$name = $model->attributes['image'];
					if($model->delete() && $name != '' && file_exists(Yii::app()->basePath.'/../upload/images/'.$name))
						unlink(Yii::app()->basePath.'/../upload/images/'.$name);
			}
			Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		}
		$model = Images::model()->findAllByAttributes(array('album_id'=>Images::$IMAGE_BANNER));
		$this->render('index_banner',array('model'=>$model));
	}
	public function actionAddBanner(){
	
		$model = new Images;
		$model->album_id = Images::$IMAGE_BANNER;
		if(!empty($_POST['Images'])){
			$model->attributes = $_POST['Images'];
			$objImage=CUploadedFile::getInstance($model,'image');
			$imageName = $this->getFileName($objImage);
			$model->image = $imageName;
			$model->created = time();
			if($model->validate() && $model->save()){
				$objImage->saveAs(Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName);
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/images/banner'));
			}
		}
		$this->render('form_image',array('model'=>$model,'title'=>'Thêm mới banner'));
	}
	public function actionEditBanner($id){
		$model = Images::model()->findByPk($id);
		$model->album_id = Images::$IMAGE_BANNER;
		if(!empty($_POST['Images'])){
			$model->attributes = $_POST['Images'];
			$objImage=CUploadedFile::getInstance($model,'image');
			$imageName = $this->getFileName($objImage);
			if(!empty($objImage))
				$model->image = $imageName;
			if($model->validate() && $model->save()){
				if(!empty($objImage))
					$objImage->saveAs(Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName);
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/images/banner'));
			}
		}
		$this->render('form_image',array('model'=>$model,'title'=>'Cập nhật banner'));
	}
	
	
	public function actionPatner(){
		if(isset($_POST['selected']) && !empty($_POST['selected'])){
			foreach($_POST['selected'] as $k=>$v){
					$model = Images::model()->findByPk($v);
					$name = $model->attributes['image'];
					if($model->delete() && $name != '' && file_exists(Yii::app()->basePath.'/../upload/images/'.$name))
						unlink(Yii::app()->basePath.'/../upload/images/'.$name);
			}
			Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		}
		$model = Images::model()->findAllByAttributes(array('album_id'=>Images::$IMAGE_PATNER));
		$this->render('index_pather',array('model'=>$model));
	}
	public function actionAddPatner(){
		$model = new Images;
		$model->album_id = Images::$IMAGE_PATNER;
		if(!empty($_POST['Images'])){
			$model->attributes = $_POST['Images'];
			$objImage=CUploadedFile::getInstance($model,'image');
			$imageName = $this->getFileName($objImage);
			$model->image = $imageName;
			$model->created = time();
			if($model->validate() && $model->save()){
				$objImage->saveAs(Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName);
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/images/patner'));
			}
		}
		$this->render('form_image',array('model'=>$model,'title'=>'Thêm mới đối tác'));
	}
	public function actionEditPatner($id){
		$model = Images::model()->findByPk($id);
		$model->album_id = Images::$IMAGE_PATNER;
		if(!empty($_POST['Images'])){
			$model->attributes = $_POST['Images'];
			$objImage=CUploadedFile::getInstance($model,'image');
			$imageName = $this->getFileName($objImage);
			if(!empty($objImage))
				$model->image = $imageName;
			if($model->validate() && $model->save()){
				if(!empty($objImage))
					$objImage->saveAs(Yii::getPathOfAlias('webroot').'/upload/images/'.$imageName);
				Yii::app()->user->setFlash('success', translate('Thêm thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/images/patner'));
			}
		}
		$this->render('form_image',array('model'=>$model,'title'=>'Cập nhật đối tác'));
	}
	
	
	private function getFileName($objFile){
		if(empty($objFile))
			return '';
		$imageType = explode('.',$objFile->name);
		if(count($imageType) > 1)
			$imageType = $imageType[count($imageType)-1];
		else
			$imageType = 'jpg';
		$imageName = md5(uniqid()).'.'.$imageType;
		return $imageName;
	}
	
	public function loadModel($id)
	{
		$model=Images::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionDelImage($id,$typeId)
	{
		$model = Images::model()->findByPk($id);
		$name = $model->attributes['image'];
		if($this->loadModel($id)->delete() && $name != '' && file_exists(Yii::app()->basePath.'/../upload/images/'.$name))
			unlink(Yii::app()->basePath.'/../upload/images/'.$name);
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		if($typeId == Images::$IMAGE_PATNER)
			$this->redirect(PIUrl::createUrl('/admin/images/patner'));
		elseif($typeId == Images::$IMAGE_BANNER)
			$this->redirect(PIUrl::createUrl('/admin/images/banner'));
		else
			$this->redirect(PIUrl::createUrl('/admin/images/index'));
			
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
}