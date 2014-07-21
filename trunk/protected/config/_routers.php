<?php
/*Nơi khai báo xác lập url routing*/
return array(
	'login'=>'user/login',
	''=>'home',	
	'lien-he'=>'default/contact/index',
	
	'<alias>'=>'default/new/index',
	'<controller:\w+>/<id:\d+>'=>'<controller>/view',
	'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
	'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
	'<category:.*?>/<alias>'=>'default/new/detail',
);

/* End file _routers.php */
/* Location: aplication.protected.config._routers.php */