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
		$criStore->limit = 6;
		$arrStore = News::model()->findAll($criStore);

		//partner
		$criPartner = new CDbCriteria();
		$criPartner->addCondition("album_id = 3");
		$criPartner->order = "id DESC";
		$criPartner->limit = 10;
		$arrPartner = Images::model()->findAll($criPartner);

		//News
		$criNew = new CDBCriteria;
		$criNew->addCondition("category_news_id = 5");
		$criNew->order = "id DESC";
		$criNew->limit = 5;
		$arrNews = News::model()->findAll($criNew);

		//Support
		$criSupport = new CDbCriteria();
		$criSupport->order = "id DESC";
		$arrSupport = Supports::model()->findAll($criSupport);

		/*Add Right*/
		$criAds = new CDbCriteria();
		$criAds->addCondition("album_id = 1");
		$criAds->order = "id DESC";
		$criAds->limit = 2;
		$arrAds = Images::model()->findAll($criAds);

		/*Slider*/
		$criBanner = new CDbCriteria();
		$criBanner->order = "id DESC";
		$criBanner->limit = 3;
		$arrBanner = Slides::model()->findAll($criBanner);

		$this->render("index", array(
			'arrBanner'=>$arrBanner,
			'arrInternet' => $arrInternet,
			'arrOptical'=> $arrOptical,
			'arrStore'=> $arrStore,
			'arrPartner'=>$arrPartner,
			'arrNews'=>$arrNews,
			'arrSupport'=> $arrSupport,
			'arrAds'=>$arrAds
		));
	}
}