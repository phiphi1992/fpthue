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
		$criteria->order = 'id DESC';
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
	
	public function loadModel($id)
	{
		$model=Images::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function actionCreate()
	{
		Yii::import("xupload.models.XUploadForm");
        $model = new XUploadForm;
		$dataAlbums = Albums::model()->getAlbums();
		$this->render('create',compact('model','dataAlbums'));
	}
	public function actionDeleteImage($id)
	{
		$model = Images::model()->findByPk($id);
		$name = $model->attributes['image'];
		$album = $model->attributes['album_id'];
		$this->loadModel($id)->delete();
		unlink(Yii::app()->basePath.'/../upload/images/'.$name);
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		$this->redirect(PIUrl::createUrl('/admin/albums/view/',array('id'=>$album)));
	}
	public function actionDelete($id)
	{
		$model = Images::model()->findByPk($id);
		$name = $model->attributes['image'];
		$this->loadModel($id)->delete();
		unlink(Yii::app()->basePath.'/../upload/images/'.$name);
		Yii::app()->user->setFlash('success', translate('Xóa thành công.'));
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
}