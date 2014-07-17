<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = 'main';
	//public $theme = 'admincp';
	public $image = '';
	public $renScript = true;
	public $dataSystem = array();
	
	// use for popup schedule
	public $model = array(); 
 	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public function init()
	{
		parent::init();
		$this->dataSystem = System::model()->find();
	}
	
	protected function afterRender($view, &$output) {
		if($this->renScript)
			Yii::app()->clientScript->registerCoreScript('jquery');
		//Yii::app()->dynamicRes->debug();
		//Yii::app()->dynamicRes->saveScheme();
		
	}
	
	/**
	* Phương thức dùng để cắt chuổi
	**/
	public function word_limiter($str, $limit = 100, $end_char = '&#8230;')
	{
		if (trim($str) == '')
		{
			return $str;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

		if (strlen($str) == strlen($matches[0]))
		{
			$end_char = '';
		}

		return rtrim($matches[0]).$end_char;
	}
	
	/**
	* $data = array(
	*	'view'=>'mail',
	*	'server'=>'phihoang12b2@gmail.com',
	*	'data'=>array(
	*		'email'=>'phihoang12b2@gmail.com'
	*	)
	*);
	*$this->SendMail('hjkhjkh@jkhjk.kjljlk','asdad',$data,'layout');
	**/
	
	public function SendMail($mailTo = '',$subject = '',$params=array(),$layout = 'layout')
	{
		if(isset($params['server']) && $params['server'] != ''){
			$mailFrom = $params['server'];
		}
		$message	=	new YiiMailMessage;
		$message->view = $layout;
		$sid				= 1;
		$params				= $params;
		$message->subject	= $subject;
		//$message->from = $mailFrom;
		$message->setBody($params, 'text/html');
		$message->addTo($mailTo);
		return Yii::app()->mail->send($message);
	}
	
	
	// Function send mail use php Mailer
	public function send_Mail($subject, $body){
		$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
		
		$letter = Letter::model()->find();
		$this->host = $letter->host;
		$this->port = $letter->port;
		$this->username = $letter->username;
		$this->password = $letter->password;
		
		$mailer->IsSMTP();
		$mailer->SMTPDebug = 0; 
		$mailer->SMTPAuth = true;
		$mailer->CharSet = 'UTF-8';
		$mailer->SMTPSecure = "ssl";
		$mailer->Host = 'smtp.gmail.com';;
		$mailer->Port = 465; 
		$mailer->Username = "dqbinh92@gmail.com";
		$mailer->Password = "quangbinh1516";
		$mailer->SetFrom("dqbinh92@gmail.com", "Mầm Non Bảo Ngọc - liên hệ");
		$mailer->AddAddress("binhdq92@gmail.com");
		$mailer->Subject =  $subject;
		$mailer->Body = $body;
		if($mailer->Send()) {
			return true;
		}
		else {
			return false;
		}
	}
}