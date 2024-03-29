<?php

class RecoveryController extends Controller
{
	public $defaultAction = 'recovery';
	
	/**
	 * Recovery password
	 */
	public function actionRecovery () {
		$form = new UserRecoveryForm;
		if (Yii::app()->user->id) {
		    	$this->redirect(Yii::app()->controller->module->returnUrl);
		    } else {
				$email = ((isset($_GET['email']))?$_GET['email']:'');
				$activkey = ((isset($_GET['activkey']))?$_GET['activkey']:'');
				if ($email&&$activkey) {
					$form2 = new UserChangePassword;
		    		$find = User::model()->notsafe()->findByAttributes(array('email'=>$email));
		    		if(isset($find)&&$find->activkey==$activkey) {
			    		if(isset($_POST['UserChangePassword'])) {
							$form2->attributes=$_POST['UserChangePassword'];
							if($form2->validate()) {
								$find->password = Yii::app()->controller->module->encrypting($form2->password);
								$find->activkey=Yii::app()->controller->module->encrypting(microtime().$form2->password);
								if ($find->status==0) {
									$find->status = 1;
								}
								$find->save();
								Yii::app()->user->setFlash('recoveryMessage',UserModule::t("New password is saved."));
								$this->redirect(Yii::app()->controller->module->recoveryUrl);
							}
						} 
						$this->render('changepassword',array('form'=>$form2));
		    		} else {
		    			Yii::app()->user->setFlash('recoveryMessage',UserModule::t("Incorrect recovery link."));
						$this->redirect(Yii::app()->controller->module->recoveryUrl);
		    		}
		    	} else {
			    	if(isset($_POST['UserRecoveryForm'])) {
			    		$form->attributes=$_POST['UserRecoveryForm'];
			    		if($form->validate()) {
			    			$user = User::model()->notsafe()->findbyPk($form->user_id);
							$activation_url = 'http://' . $_SERVER['HTTP_HOST'].$this->createUrl(implode(Yii::app()->controller->module->recoveryUrl),array("activkey" => $user->activkey, "email" => $user->email));
							
							$subject = UserModule::t("Bạn đã có yêu cầu phục hồi mật khẩu từ {site_name}",
			    					array(
			    						'{site_name}'=>Yii::app()->name,
			    					));
			    			$message = UserModule::t("Bạn đã có yêu cầu phục hồi mật khẩu từ {site_name}. Để nhận được mật khẩu mới bạn hãy vào link sau: {activation_url}.",
			    					array(
			    						'{site_name}'=>Yii::app()->name,
			    						'{activation_url}'=>$activation_url,
			    					));
							
							if(Yii::app()->request->isAjaxRequest)
							{
								jsonOut(array(
									'error'=>false,
									'msg'=>'Xin vui lòng kiểm tra email. Một hướng dẫn đã chuyển đến email của bạn.'
								),false);
							}
			    			
							
							UserModule::sendMail($user->email,$subject,$message);
			    			
							Yii::app()->user->setFlash('recoveryMessage',UserModule::t("Please check your email. An instructions was sent to your email address."));
			    			$this->refresh();
			    		}else{
							if(Yii::app()->request->isAjaxRequest)
							{
								jsonOut(array(
									'error'=>true,
									'msg'=>CActiveForm::validate($form)
								));
							}
						}
			    	}
		    		$this->render('recovery',array('form'=>$form));
		    	}
		    }
	}

}