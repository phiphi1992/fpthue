<?php

class DefaultController extends Controller
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
		$this->pageTitle = $this->dataSystem->title;
		$criteriaComments = new CDbCriteria;
		$criteriaComments->limit = 10;
		$criteriaComments->order = "id DESC";
		$comments = Comments::model()->findAll($criteriaComments);
		$this->render('index',compact('comments'));
	}

	public function actionFileConfig()
	{
		$this->render('file_config');
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