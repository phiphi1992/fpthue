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
		$this->pageTitle = "Trang chủ";
		
		// du lieu slide
		$arrSlide = Slides::model()->findAll();
		// du lieu gioi thieu
		$info =  Informations::model()->find();
		// hinh anh hoat dong
		$cri = new CDBCriteria;
		$cri->order = 'id DESC';
		$cri->limit = 6;
		$arrImage = Albums::model()->findAll($cri);

		//Setting
		$criSystem = new CDbCriteria();
		$criSystem->order = "id DESC";
		$arrSystem = System::model()->find($criSystem);

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
		
		$this->render("index", array(
			'arrSlide' => $arrSlide,
			'info' => $info,
			'arrImage' => $arrImage,
			'arrSystem'=> $arrSystem,
			'arrInternet' => $arrInternet,
			'arrOptical'=> $arrOptical,
			'arrStore'=> $arrStore,
			'arrPartner'=>$arrPartner,
			'arrNews'=>$arrNews,
			'arrSupport'=> $arrSupport,
			'arrAds'=>$arrAds
		));
	}
	
	public function actionInformation(){
	
		$this->pageTitle = "Giới thiệu - Mẫu giáo Bảo Ngọc";
		
		$info =  Informations::model()->find();
		$facilities = Facilities::model()->find();
		$teachers = Teachers::model() ->find();
		$this->render("information", array('info'=>$info,'teachers'=>$teachers,'facilities'=>$facilities));
	}
	
	public function actionParents(){
	
		$this->pageTitle = "Góc phụ huynh - Mẫu giáo Bảo Ngọc";
		
		// Goc phu huynh
		$cri = new CDBCriteria;
		$cri->addCondition("category_news_id = 3");
		$cri->order = "id DESC";
		
		$countItem =  News::model()->count($cri);
                
        $pages = new CPagination($countItem);
        $pages->setPageSize(10);
        $pages->applyLimit($cri);  // the trick is here!
		
		$arrData = News::model()->findAll($cri);
		$this->render("parents", array(
			"arrData" => $arrData,
			'item_count'=>$countItem,
			'page_size'=>10,
			'pages'=>$pages,
		));
	}
	
	public function actionParentsDetail($alias=null){
	
		$this->pageTitle = "Góc phụ huynh - Mẫu giáo Bảo Ngọc";
		
		// Goc phu huynh
		$cri = new CDBCriteria;
		$cri->addCondition("alias LIKE :alias and category_news_id = 3");
		$cri->params = array(':alias'=>$alias);
		$new = News::model()->find($cri);
	
		// tin lien quan
		$cri1 = new CDBCriteria;
		$cri1->addCondition("alias NOT LIKE :alias and category_news_id = 3");
		$cri1->order = 'id DESC';
		$cri1->limit = 4;
		$cri1->params = array(':alias'=>$alias);
		$arrNew = News::model()->findAll($cri1);
		
		
		$this->render("parentsDetail", array(
			"new" => $new,
			'arrNew' => $arrNew,
		));
	}
	
	public function actionImage($id){
	
		$this->pageTitle = "Thư viện ảnh - Mẫu giáo Bảo Ngọc";
		
		// Thu vien album
		$cri = new CDBCriteria;
		$cri->addCondition("album_id = {$id}");
		
		$countItem =  Images::model()->count($cri);    
        $pages = new CPagination($countItem);
        $pages->setPageSize(16);
        $pages->applyLimit($cri);  // the trick is here!
		
		$arrImage = Images::model()->findAll($cri);
		
		$this->render("image", array(
			"arrImage"=> $arrImage,
			'item_count'=>$countItem,
			'page_size'=>16,
			'pages'=>$pages,
		));
	}
	public function actionAlbum(){
	
		$this->pageTitle = "Thư viện hình ảnh - Mẫu giáo Bảo Ngọc";
		
		// Thu vien album
		$cri = new CDBCriteria;
		$countItem =  Albums::model()->count($cri);    
        $pages = new CPagination($countItem);
        $pages->setPageSize(16);
        $pages->applyLimit($cri);  // the trick is here!
		
		$arrImage = Albums::model()->findAll($cri);
		
		$this->render("album", array(
			"arrImage"=> $arrImage,
			'item_count'=>$countItem,
			'page_size'=>16,
			'pages'=>$pages,
		));
	}
	
	public function actionNews(){
	
		$this->pageTitle = "Tin tức - Mẫu giáo Bảo Ngọc";
		
		// tin tuc moi nhat
		$cri = new CDBCriteria;
		$cri->addCondition("category_news_id = 2");
		
		$countItem =  News::model()->count($cri);    
        $pages = new CPagination($countItem);
        $pages->setPageSize(10);
        $pages->applyLimit($cri);  // the trick is here!
		
		$arrNew = News::model()->findAll($cri);
		$this->render("news", array(
			"arrNew" => $arrNew,
			'item_count'=>$countItem,
			'page_size'=>10,
			'pages'=>$pages,
		));
	}
	
	public function actionNewDetail($alias=null){
	
		$this->pageTitle = "Tin tức - Mẫu giáo Bảo Ngọc";
		
		// tin tuc
		$cri = new CDBCriteria;
		$cri->addCondition("alias LIKE :alias and category_news_id = 2");
		$cri->params = array(':alias'=>$alias);
		$new = News::model()->find($cri);
	
		// tin tuc lien quan
		$cri1 = new CDBCriteria;
		$cri1->addCondition("alias NOT LIKE :alias and category_news_id = 2");
		$cri1->params = array(':alias'=>$alias);
		$cri1->order = 'id DESC';
		$cri1->limit = 4;
		$arrNew = News::model()->findAll($cri1);
		
		
		$this->render("newDetail", array(
			"new" => $new,
			'arrNew' => $arrNew,
		));
	}
	
	public function actionContact(){
		$this->pageTitle = "Liên hệ - Mẫu giáo Bảo Ngọc";
		
		if(!empty($_POST)){
			$model  = new Comments;
			$model->name = $_POST['name'];
			$model->email = $_POST['email'];
			$model->title = $_POST['subject'];
			$model->content = $_POST['content'];
			$model->created = time();
			$model->save();
			echo true;
		}else	$this->render("contact");
	}
	
	public function actionNoti(){
	
		$this->pageTitle = "Thông báo - Mẫu giáo Bảo Ngọc";
		
		// Thong bao
		$cri = new CDBCriteria;
		$cri->addCondition("category_news_id = 1");
		
		$countItem =  News::model()->count($cri);    
        $pages = new CPagination($countItem);
        $pages->setPageSize(10);
        $pages->applyLimit($cri);  // the trick is here!
		
		$arrNoti = News::model()->findAll($cri);

		$this->render("noti", array(
			"arrNoti" => $arrNoti,
			'item_count'=>$countItem,
			'page_size'=>10,
			'pages'=>$pages,
		));
	}
	
	public function actionNotiDetail($alias=null){
	
		$this->pageTitle = "Thông báo - Mẫu giáo Bảo Ngọc";
		
		// thong bao
		$cri = new CDBCriteria;
		$cri->addCondition("alias LIKE :alias and category_news_id = 1");
		$cri->params = array(':alias'=>$alias);
		$new = News::model()->find($cri);
	
		// thong bao lien quan
		$cri1 = new CDBCriteria;
		$cri1->addCondition("alias NOT LIKE :alias and category_news_id = 1");
		$cri1->order = 'id DESC';
		$cri1->limit = 4;
		$cri1->params = array(':alias'=>$alias);
		$arrNew = News::model()->findAll($cri1);
		
		
		$this->render("notiDetail", array(
			"new" => $new,
			'arrNew' => $arrNew,
		));
	}
	
	public function actionFood($id=null){
	
		$this->pageTitle = "Góc dinh dưỡng - Mẫu giáo Bảo Ngọc";
		
		// Goc dinh duong
		$cri = new CDBCriteria;
		$cri->addCondition("category_news_id = 4  and id = {$id} ");
		$arrNutrition = News::model()->find($cri);
		$arrNutritionNext = null;
		$arrNutritionPre = null;
		
		if(!empty($arrNutrition)){
			$cri = new CDBCriteria;
			$cri->order = "id ASC";
			$cri->addCondition("category_news_id = 4  and id > {$id}");
			$arrNutritionNext = News::model()->find($cri);
			
			$cri = new CDBCriteria;
			$cri->order = "id DESC";
			$cri->addCondition("category_news_id = 4  and id < {$id}");
			$arrNutritionPre = News::model()->find($cri);
		}	
		
		$this->render("food", array(
			"arrNutrition"=> $arrNutrition,
			"arrNutritionNext" => $arrNutritionNext,
			"arrNutritionPre" => $arrNutritionPre,
		));
	}
	
	public function actionCheckFood($id=null, $next=null){
	
		// Goc dinh duong
		$cri = new CDBCriteria;

		if($next == 1){
			$cri->order = "id ASC";
			$cri->addCondition("category_news_id = 4  and id > {$id}");
		}else{
			$cri->order = "id DESC";
			$cri->addCondition("category_news_id = 4  and id < {$id}");
		}
		$arrNutrition = News::model()->find($cri);
		if(!empty($arrNutrition)) echo "true";
		else echo "false";
	}
	
	
}