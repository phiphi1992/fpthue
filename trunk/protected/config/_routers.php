<?php
/*Nơi khai báo xác lập url routing*/
return array(
	'login'=>'user/login',
	''=>'home',	
	'thong-bao/<alias:.*?>'=>'home/notiDetail',
	'lien-he'=>'default/contact/index',
	
	/*'<alias:.*?>'=>'default/new/index',*/
	'store/<alias>'=>'default/new/detail',
	'<controller:\w+>/<id:\d+>'=>'<controller>/view',
	'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
	'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
);

/* End file _routers.php */
/* Location: aplication.protected.config._routers.php */