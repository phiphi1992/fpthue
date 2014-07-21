<?php
class DefaultModule extends CWebModule
{
	public $pageSize = 20;
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'default.models.*',
			'default.components.*',
		));
		Yii::app()->theme = "frontend";
	}

	public function beforeControllerAction($controller, $action)
	{
		$controller->layout = '//layouts/main';
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
