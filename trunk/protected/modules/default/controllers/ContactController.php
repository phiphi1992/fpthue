<?php
class ContactController extends Controller {

	public function actionIndex() {
		$this->pageTitle = "Liên hệ - ".$this->dataSystem->title;
		
		//Setting
		$criSystem = new CDbCriteria();
		$criSystem->order = "id DESC";
		$arrSystem = System::model()->find($criSystem);

		//partner
		$criPartner = new CDbCriteria();
		$criPartner->addCondition("album_id = 3");
		$criPartner->order = "id DESC";
		$criPartner->limit = 10;
		$arrPartner = Images::model()->findAll($criPartner);
		$this->render('index',array(
			'arrSystem'=>$arrSystem,
			'arrPartner'=>$arrPartner,
		));
	}

	public function actionSendMail() {
		if(!empty($_POST)) {
			$message = new YiiMailMessage;
			$message->setBody($_POST['content']);
			$message->subject = $_POST['subject'];
			$message->from = $_POST['email'];
			$message->to = Yii::app()->params['adminEmail'];

			if(Yii::app()->mail->send($message)) {
				$model = new Comments();
				$model->title = $_POST['subject'];
				$model->content = $_POST['content'];
				$model->email = $_POST['email'];
				$model->name = $_POST['fullName'];
				$model->phone = $_POST['phone'];
				$model->created = time();
				if($model->save()) {
					json_encode(array(
						'error'=>false,
						'message'=>'Cảm ơn bạn đã gửi thông tin, chúng tôi sẽ phản hồi cho bạn trong thời gian sớm nhất!'
					));
				}else {
					json_encode(array(
						'error'=>true,
						'message'=>'Gửi thông tin không thành công'
					));
				}
			}
		}
	}
}