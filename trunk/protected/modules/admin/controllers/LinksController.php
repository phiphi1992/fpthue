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
		$model = Links::model()->find();
		if(!empty($_POST['Links'])){
			$model->attributes = $_POST['Links'];
			if($model->save()){
				Yii::app()->user->setFlash('success', translate('Cập nhật thành công.'));
				$this->redirect(PIUrl::createUrl('/admin/links'));
			}
		}
		$this->render('index',array('model'=>$model));
	}
	
}