<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php echo $this->dataSystem->description; ?>">
		<meta name="keywords" content="<?php echo $this->dataSystem->keyword; ?>">
		<meta name="author" content="tác giả">
		<link rel="shortcut icon" href="img/front/favicon.ico">
		<link href='http://fonts.googleapis.com/css?family=Patrick+Hand&subset=latin,latin-ext,vietnamese' rel='stylesheet' type='text/css'>
		<title><?php echo $this->pageTitle;?></title>
		<!-- Remove style skype on IE -->
		<script type="text/javascript">var webroot = '<?php echo Yii::app()->baseUrl;?>'</script>
		<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
		<meta content="telephone=no" name="format-detection" />
		
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/common.css" />
		
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<div id="wrapper">
			<!-- HEADER CONTAINER -->
			<div id="cloud"></div>
			<div class="container">
				<div class="header-container">
					<div id="bee-01"></div>
					<div id="bee-02"></div>
					<div id="bee-03"></div>
					<h1 class="wrap-logo"><a href="<?php echo PIUrl::createUrl('/home/');?>" class="text-hide icon-ib logo" style="background:url('<?php
						echo getImageFullSize($this->dataSystem->logo);
					?>') no-repeat scroll center top / cover  rgba(0, 0, 0, 0)">Mầm non Bảo Ngọc</a></h1>
					<ul class="menu-horizontal">
						<li><a href="<?php echo PIUrl::createUrl('/home/');?>" class="menu-home <?php echo (yii::app()->getController()->action->id == 'index') ? 'active' : ''; ?>"><i class="icon-ib menu-home-hover"></i><span>Trang chủ</span></a></li>
						<li><a href="<?php echo PIUrl::createUrl('/home/information');?>" class="menu-introduce <?php echo (yii::app()->getController()->action->id == 'information') ? 'active' : ''; ?>"><i class="icon-ib menu-introduce-hover"></i><span>Giới thiệu</span></a></li>
						<li><a href="<?php echo PIUrl::createUrl('/home/parents');?>" class="menu-parents <?php echo (yii::app()->getController()->action->id == 'parents') ? 'active' : ''; ?>"><i class="icon-ib menu-parents-hover"></i><span>Góc phụ huynh</span></a></li>
						<li><a href="<?php echo PIUrl::createUrl('/home/news');?>" class="menu-news <?php echo (yii::app()->getController()->action->id == 'news') ? 'active' : ''; ?>"><i class="icon-ib menu-news-hover"></i><span>Tin tức</span></a></li>
						<li><a href="<?php echo PIUrl::createUrl('/home/album');?>" class="menu-library <?php echo (yii::app()->getController()->action->id == 'album') ? 'active' : ''; ?>"><i class="icon-ib menu-library-hover"></i><span>Thư viện hình ảnh</span></a></li>
						<li><a href="<?php echo PIUrl::createUrl('/home/contact');?>" class="menu-contact <?php echo (yii::app()->getController()->action->id == 'contact') ? 'active' : ''; ?>"><i class="icon-ib menu-contact-hover"></i><span>Liên hệ</span></a></li>
					</ul>
					<a href="#wd-menu-vertical" class="wd-button-menu">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<ul class="breadcrumb">
						<?php
							$action = "";
							switch(yii::app()->controller->action->id){
								case "information": $action = "Giới thiệu"; break;
								case "parents": $action = "Góc phụ huynh"; break;
								case "news": $action = "Tin tức"; break; 
								case "newDetail": $action = "Tin tức"; break;
								case "album": $action = "Thư viện album"; break;
								case "contact": $action = "Liên hệ"; break;
								case "notiDetail": $action = "Thông báo"; break;
								case "food": $action = "Góc dinh dưỡng"; break;
								case "image": $action = "Thư viện ảnh"; break;
								case "parentsDetail": $action = "Góc phụ huynh"; break;
							}
						?>
						<?php if(!empty($action)){ ?>
							<li><a href="<?php echo PIUrl::createUrl('/home/'); ?>">Trang chủ</a></li>
							<li><span><?php echo $action; ?></span></li>
						<?php } ?>
					</ul>
					<div class="clearfix"></div>
				</div>