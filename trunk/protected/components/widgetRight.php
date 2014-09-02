<?php
class widgetRight extends CWidget
{
	public $dataSystem = array();
	public function init(){}

	public function run(){

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

		/*Ads Right*/
		$criAds = new CDbCriteria();
		$criAds->addCondition("album_id = 1");
		$criAds->order = "id DESC";
		$arrAds = Images::model()->findAll($criAds);

		/*Pictures*/
		$criPic = new CDbCriteria();
		$criPic->addCondition("album_id = 2");
		$criPic->order = "id DESC";
		$arrPic = Images::model()->findAll($criPic);

		$this->render("widgetRight",array(
			'dataSystem'=>$this->dataSystem,
			'arrNews'=>$arrNews,
			'arrSupport'=>$arrSupport,
			'arrAds'=>$arrAds,
			'arrPic'=>$arrPic
		));
	}
}
?>