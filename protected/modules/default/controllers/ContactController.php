<?php
class ContactController extends Controller {

	public function actionIndex() {
		$this->pageTitle = "Liên hệ";
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
			dump($_POST);
			$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
			$mailer->Host = 'smtp.gmail.com';
			$mailer->IsSMTP();
			$mailer->From = $_POST['email'];
			$mailer->FromName = 'Support';
			$mailer->CharSet = 'UTF-8';
			$mailer->Subject = $_POST['subject'];
			$mailer->Body = $_POST['content'];
			$mailer->Send();
		}
	}
}