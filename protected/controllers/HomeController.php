<?php

class HomeController extends Controller
{
	/*public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}*/
	public function allowedActions()
	{
		return '*';
	}

	public function actionIndex()
	{
		$this->pageTitle = $this->dataSystem->title;

		// Dang ky Internet
		$criInternet = new CDBCriteria;
		$criInternet->addCondition("category_news_id = 1");
		$criInternet->order = "id DESC";
		$criInternet->limit = 3;
		$arrInternet = News::model()->findAll($criInternet);

		//Dang ky cap quang
		$criOptical = new CDBCriteria;
		$criOptical->addCondition("category_news_id = 2");
		$criOptical->order = "id DESC";
		$criOptical->limit = 3;
		$arrOptical = News::model()->findAll($criOptical);

		//Store
		$criStore = new CDBCriteria;
		$criStore->addCondition("category_news_id = 6");
		$criStore->order = "id DESC";
		$criStore->limit = 3;
		$arrStore = News::model()->findAll($criStore);

		//CA
		$criCa = new CDBCriteria;
		$criCa->addCondition("category_news_id = 3");
		$criCa->order = "id DESC";
		$criCa->limit = 3;
		$arrCa = News::model()->findAll($criCa);

		//Sim - Card
		$criSimCard = new CDBCriteria;
		$criSimCard->addCondition("category_news_id = 4");
		$criSimCard->order = "id DESC";
		$criSimCard->limit = 3;
		$arrSimCard = News::model()->findAll($criSimCard);

		//TV
		$criTv = new CDBCriteria;
		$criTv->addCondition("category_news_id = 7");
		$criTv->order = "id DESC";
		$criTv->limit = 3;
		$arrTv = News::model()->findAll($criTv);


		/*Pictures*/
		$criPic = new CDbCriteria();
		$criPic->addCondition("album_id = 2");
		$criPic->order = "id DESC";
		$criPic->limit = 10;
		$arrPic = Images::model()->findAll($criPic);

		/*Slider*/
		$criBanner = new CDbCriteria();
		$criBanner->order = "id DESC";
		$criBanner->limit = 5;
		$arrBanner = Slides::model()->findAll($criBanner);
	
		/*Links web*/
		$arrLink = Links::model()->find();

		$this->render("index", array(
			'arrBanner'=>$arrBanner,
			'arrInternet' => $arrInternet,
			'arrOptical'=> $arrOptical,
			'arrStore'=> $arrStore,
			'arrCa'=>$arrCa,
			'arrSimCard'=>$arrSimCard,
			'arrTv'=>$arrTv,
			'arrLink'=>$arrLink
		));
	}

	public function actionError() {
		$this->render("error");
	}
}