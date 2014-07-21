<?php
/*Nơi khai báo xác lập url routing*/
return array(
	'login'=>'user/login',
	''=>'home',	
	'lien-he'=>'default/contact/index',
	'admin'=>'admin/default/index',
	'<alias>/danh-muc'=>array('default/new/index', 'urlSuffix'=>'.html', 'caseSensitive'=>true),
	'<category:.*?>/<alias>/bai-viet'=>array('default/new/detail', 'urlSuffix'=>'.html', 'caseSensitive'=>true),
	'<controller:\w+>/<id:\d+>'=>'<controller>/view',
	'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
	'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
);

/* End file _routers.php */
/* Location: aplication.protected.config._routers.php */