<?php
/*Nơi khai báo xác lập url routing*/
return array(
	'tin-tuc/<alias:.*?>'=>'home/newDetail',
	'goc-phu-huynh/<alias:.*?>'=>'home/parentsDetail',
	'login'=>'user/login',
	''=>'home',
	'gioi-thieu'=>'home/information',
	'goc-phu-huynh'=>'home/parents',
	'goc-dinh-duong-<id:\d+>'=>'home/food',
	'thu-vien-hinh-anh'=>'home/album',
	'lien-he'=>'home/contact',
	'tin-tuc'=>'home/news',
	'thu-vien-hinh-anh-<id:\d+>'=>'home/image',
	'hinh-anh'=>'home/albumImage',
	'thong-bao/<alias:.*?>'=>'home/notiDetail',
	'<controller:\w+>/<id:\d+>'=>'<controller>/view',
	'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
	'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
);

/* End file _routers.php */
/* Location: aplication.protected.config._routers.php */