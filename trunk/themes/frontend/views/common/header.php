<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $this->dataSystem->description; ?>">
	<meta name="keywords" content="<?php echo $this->dataSystem->keyword; ?>">
	<meta name="author" content="tác giả">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>VIETTEL - <?php echo isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name; ?></title>

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
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/parallax-slider/css/parallax-slider.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/bxslider/jquery.bxslider.css" />
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
		<a href="/"><img id="logo-header" src="<?php echo Yii::app()->theme->baseUrl;?>/img/front/viettel_logo.png" width="100" alt="Logo"/ style="height:40px;"></a>
		<!-- Menu -->
		<div class="navbar">
			<div class="navbar-inner">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					 <span class="icon-bar"></span>
				</a><!-- /nav-collapse -->
                <div class="nav-collapse collapse">
                    <ul class="nav top-2">
                        <li class="active">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li>
                            <a href="dang-ky-internet">Đăng Ký Internet</a>
                        </li>
						<li>
                            <a href="dang-ky-cap-quang">Đăng Ký Cáp Quang</a>
                        </li>
                        <li>
                            <a href="store">Store</a>
                        </li>
						<li>
                            <a href="chu-ky-so">Chữ Ký Số</a>
                        </li> 
						<li>
                            <a href="sim-card">Sim - Card</a>
                        </li>
						<li>
                            <a href="tin-tuc">Tin Tức</a>
                        </li>
						<li>
                            <a href="lien-he">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=== End Header ===-->