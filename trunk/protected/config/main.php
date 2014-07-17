<?php

// uncomment the following to define a path alias
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require(dirname(__FILE__) . '/_path-aliases.php'); // Yii::setPathOfAlias('local','path/to/local-folder');

require(dirname(__FILE__) . "/function_alias.php"); // Gồm các function được dùng nhiều trong hệ thống


return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'CÔNG TY CP VIỄN THÔNG FPT - CN HUẾ',
	'defaultController' => 'home',
	'theme'=>'frontend',
	'timeZone' => 'UTC',
	// preloading 'log' component
	'preload'=>array('log'),//'bootstrap'
	// autoloading model and component classes
	'import'=> require(dirname(__FILE__) . '/_importeds.php'),
	'aliases'=>array('xupload' => 'ext.xupload'),
	'modules'=> require(dirname(__FILE__) . '/_modules.php'),
	'components'=> require(dirname(__FILE__) . '/_components.php'),
	'params'=> array(
		'adminEmail'=>'phihoang12b2@gmail.com',
		'datetime'=>'d/m/Y H:s:i A',
		'date'=>'d/m/Y',
		'config'=>array(
			'description'=>'Mẫu giáo Bảo Ngọc',
			'author'=>'Kovo.vn',
			'keyword'=>'Phòng công chứng số 3 - TP Đà Nẵng',
			'icon'=>'img/favicon.ico',
		),
	),
);
