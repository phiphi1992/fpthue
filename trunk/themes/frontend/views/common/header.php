<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo isset($this->pageTitle) ? $this->pageTitle : $this->dataSystem->title; ?></title>
	<meta name="description" content="<?php echo $this->description; ?>">
	<meta name="keywords" content="<?php echo $this->dataSystem->keyword; ?>">
	<meta name="author" content="tác giả">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/img/front/viettel_favicon.ico">
	<link href='http://fonts.googleapis.com/css?family=Patrick+Hand&subset=latin,latin-ext,vietnamese' rel='stylesheet' type='text/css'>
	<!-- Remove style skype on IE -->
	<script type="text/javascript">var webroot = '<?php echo Yii::app()->baseUrl;?>'</script>
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<meta content="telephone=no" name="format-detection" />

	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/common.css" />
	<!-- CSS Global Compulsory-->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/style.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/headers/header1.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/style_responsive.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/common.css" />
	<!-- CSS Implementing Plugins -->    
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/flexslider/flexslider.css" type="text/css" media="screen" />      
	
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/revolution_slider/css/rs-style.css" media="screen" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/revolution_slider/rs-plugin/css/settings.css" media="screen" />   
	<!-- CSS Theme -->    
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/css/themes/default.css" id="style_color" />

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<!--=== Top ===-->
<div class="top">
    <div class="container">	
        <ul class="loginbar pull-right">
        </ul>
    </div>		
</div><!--/top-->
<!--=== End Top ===-->
<!--=== Header ===-->
<div class="header">
	<div class="container"> 
		<!-- Logo -->
		<div class="span12" style="margin-left:0px;">
			<a href="<?php echo PIUrl::createUrl('/home/index');?>"><img id="logo-header" src="<?php echo Yii::app()->theme->baseUrl;?>/img/front/viettel_logo.png" width="100" alt="Logo" style="height:50px;"></a>
			<ul class="loginbar pull-right">
				<?php if($this->dataSystem['hotline']) {?>
				<li><i class="icon-phone-sign"></i> <?php echo $this->dataSystem['hotline'];?> <?php echo !empty($this->dataSystem['phone']) ?'- '.$this->dataSystem['phone'] : ''?></li>
				<?php }?>
				<?php if($this->dataSystem['email']) {?>
				<li class="devider">&nbsp;</li>
				<li><i class="icon-envelope-alt"></i> <?php echo $this->dataSystem['email'];?></li>
				<?php }?>
			</ul>
		</div>
		<!-- Menu -->
		<div class="navbar">
			<div class="navbar-inner">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a><!-- /nav-collapse -->
                <div class="nav-collapse collapse">
                	<?php 
                	$alias = '';
                	if(!empty($_GET['alias'])) $alias = $_GET['alias'];
                	$category = '';
                	if(!empty($_GET['category'])) $category = $_GET['category'];
                	?>
                    <ul class="nav top-2">
                        <li class="<?php echo Yii::app()->controller->id == 'home' ? 'active' : '' ?>">
                            <a href="<?php echo PIUrl::createUrl('/home/index');?>">Trang chủ</a>
                        </li>
                        <li class ="<?php echo ((!empty($this->module) && $this->module->id == 'default' && Yii::app()->controller->id == 'new' && $alias =='dang-ky-internet') || $category == strtolower('dang-ky-internet')) ? 'active' : '' ?>">
                            <a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'dang-ky-internet'));?>">Đăng Ký Internet</a>
                        </li>
						<li class ="<?php echo ((!empty($this->module) && $this->module->id == 'default' && Yii::app()->controller->id == 'new' && $alias =='dang-ky-cap-quang') || $category == strtolower('dang-ky-cap-quang')) ? 'active' : '' ?>">
                            <a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'dang-ky-cap-quang'));?>">Đăng Ký Cáp Quang</a>
                        </li>
                        <li class ="<?php echo ((!empty($this->module) && $this->module->id == 'default' && Yii::app()->controller->id == 'new' && $alias =='truyen-hinh') || $category == strtolower('truyen-hinh')) ? 'active' : '' ?>">
                            <a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'truyen-hinh'));?>">Truyền Hình</a>
                        </li>
                        <li class ="<?php echo ((!empty($this->module) && $this->module->id == 'default' && Yii::app()->controller->id == 'new' && $alias =='store') || $category == strtolower('store')) ? 'active' : '' ?>">
                            <a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'store'));?>">Store</a>
                        </li>
						<li class ="<?php echo ((!empty($this->module) && $this->module->id == 'default' && Yii::app()->controller->id == 'new' && $alias =='chu-ky-so') || $category == strtolower('chu-ky-so')) ? 'active' : '' ?>">
                            <a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'chu-ky-so'));?>">Chữ Ký Số</a>
                        </li> 
						<li class ="<?php echo ((!empty($this->module) && $this->module->id == 'default' && Yii::app()->controller->id == 'new' && $alias =='sim-card') || $category == strtolower('sim-card')) ? 'active' : '' ?>">
                            <a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'sim-card'));?>">Sim - Card</a>
                        </li>
						<li class ="<?php echo ((!empty($this->module) && $this->module->id == 'default' && Yii::app()->controller->id == 'new' && $alias =='tin-tuc') || $category == strtolower('tin-tuc')) ? 'active' : '' ?>">
                            <a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'tin-tuc'));?>">Tin Tức</a>
                        </li>
						<li class ="<?php echo (!empty($this->module) && $this->module->id == 'default' && Yii::app()->controller->id == 'contact') ? 'active' : '' ?>">
                            <a href="<?php echo PIUrl::createUrl('/default/contact/index');?>">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=== End Header ===-->