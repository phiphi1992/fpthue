<?php
class NewController extends Controller {

	public $pageSize = 20;
	public function actionIndex($alias) {
		/*Get news by alias*/
		$category = CategoriesNews::model()->findByAttributes(array('alias'=>$alias));
		if($category===null) {
			throw new CHttpException(404,'Không tìm thấy trang');
		}
		$criteria = new CDbCriteria();
		$criteria->addCondition("category_news_id = ".$category['id']);
		$criteria->order = "id DESC";

		$count = News::model()->count($criteria);

		$pages = new CPagination($count);
		$pages->setPageSize($this->pageSize);
		$pages->applyLimit($criteria);

		//News
		$criNew = new CDBCriteria;
		$criNew->addCondition("category_news_id = 5");
		$criNew->order = "id DESC";
		$criNew->limit = 5;
		$arrNews = News::model()->findAll($criNew);
		
		//Setting
		$criSystem = new CDbCriteria();
		$criSystem->order = "id DESC";
		$arrSystem = System::model()->find($criSystem);
		
		//Support
		$criSupport = new CDbCriteria();
		$criSupport->order = "id DESC";
		$arrSupport = Supports::model()->findAll($criSupport);
		$this->pageTitle = $this->pageTitle = $category->name . ' - ' . $this->dataSystem->title;

		/*Pictures*/
		$criPic = new CDbCriteria();
		$criPic->addCondition("album_id = 2");
		$criPic->order = "id DESC";
		$criPic->limit = 10;
		$arrPic = Images::model()->findAll($criPic);

		/*Slider*/
		$criBanner = new CDbCriteria();
		$criBanner->order = "id DESC";
		$criBanner->limit = 3;
		$arrBanner = Slides::model()->findAll($criBanner);

		$this->render('index',array(
			'arrBanner'=>$arrBanner,
			'model'=> News::model()->findAll($criteria),
			'page_size'=> $this->pageSize,
			'count'=>$count,
			'pages'=>$pages,
			'category'=>$category,
			'arrNews'=>$arrNews,
			'arrSystem'=>$arrSystem,
			'arrSupport'=>$arrSupport,
			'arrPic'=>$arrPic
		));
	}

	public function actionDetail($category=null,$alias=null) {
		$categoryNew = CategoriesNews::model()->findByAttributes(array('alias'=>$category));
		$model = News::model()->findByAttributes(array('alias'=>$alias));
		if(empty($categoryNew) || empty($model)) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		$this->description = $model->description;
		$this->pageTitle = $model->name . ' - ' . $this->dataSystem->title;
		//Related
		$criRelated = new CDBCriteria;
		$criRelated->addCondition("category_news_id = ".$categoryNew['id']);
		$criRelated->addCondition("alias !=:alias");
		$criRelated->params = array(':alias'=>$alias);
		$criRelated->order = "id DESC";
		$criRelated->limit = 8;
		$arrRelated = News::model()->findAll($criRelated);

		//News
		$criNew = new CDBCriteria;
		$criNew->addCondition("category_news_id = 5");
		$criNew->order = "id DESC";
		$criNew->limit = 5;
		$arrNews = News::model()->findAll($criNew);
		
		//Setting
		$criSystem = new CDbCriteria();
		$criSystem->order = "id DESC";
		$arrSystem = System::model()->find($criSystem);

		/*Pictures*/
		$criPic = new CDbCriteria();
		$criPic->addCondition("album_id = 2");
		$criPic->order = "id DESC";
		$criPic->limit = 10;
		$arrPic = Images::model()->findAll($criPic);

		//Support
		$criSupport = new CDbCriteria();
		$criSupport->order = "id DESC";
		$arrSupport = Supports::model()->findAll($criSupport);
		$this->render('detail',array(
			'model'=>$model,
			'arrRelated'=>$arrRelated,
			'arrNews'=>$arrNews,
			'arrSystem'=>$arrSystem,
			'arrSupport'=>$arrSupport,
			'arrPic'=>$arrPic
		));
	}
}
?>