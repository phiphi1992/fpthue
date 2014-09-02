<?php
class NewController extends Controller {

	public $pageSize = 30;
	public function actionIndex($alias) {
		/*Get news by alias*/
		$category = CategoriesNews::model()->findByAttributes(array('alias'=>$alias));
		if($category===null) {
			throw new CHttpException(404,'Không tìm thấy trang');
		}
		$this->pageTitle = $category->name . ($category->title ? ' - '.$category->title : '');
		$this->description = $category->description;
		$this->dataSystem->keyword = $category->keyword;

		$criteria = new CDbCriteria();
		$criteria->addCondition("category_news_id = ".$category['id']);
		$criteria->order = "id DESC";

		$count = News::model()->count($criteria);

		$pages = new CPagination($count);
		$pages->setPageSize($this->pageSize);
		$pages->applyLimit($criteria);

		/*Slider*/
		$criBanner = new CDbCriteria();
		$criBanner->order = "id DESC";
		$criBanner->limit = 5;
		$arrBanner = Slides::model()->findAll($criBanner);

		$this->render('index',array(
			'arrBanner'=>$arrBanner,
			'model'=> News::model()->findAll($criteria),
			'page_size'=> $this->pageSize,
			'count'=>$count,
			'pages'=>$pages,
			'category'=>$category,
		));
	}

	public function actionDetail($category=null,$alias=null) {
		$categoryNew = CategoriesNews::model()->findByAttributes(array('alias'=>$category));
		$model = News::model()->findByAttributes(array('alias'=>$alias));
		if(empty($categoryNew) || empty($model)) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		$this->pageTitle = $model->name . ($categoryNew->title ? ' - '.$categoryNew->title : '');
		$this->description = $model->description;		
		$this->dataSystem->keyword = $categoryNew->keyword;

		//Related
		$criRelated = new CDBCriteria;
		$criRelated->addCondition("category_news_id = ".$categoryNew['id']);
		$criRelated->addCondition("alias !=:alias");
		$criRelated->params = array(':alias'=>$alias);
		$criRelated->order = "id DESC";
		$criRelated->limit = 8;
		$arrRelated = News::model()->findAll($criRelated);

		$this->render('detail',array(
			'model'=>$model,
			'arrRelated'=>$arrRelated,
		));
	}
}
?>