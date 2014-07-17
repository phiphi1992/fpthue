<?php $this->renderPartial('//common/header'); ?>
<div class="content-container">
	<div class="page-parents page-news page-news-detail">
		<!-- BOX NEWS DETAIL-->
		<div class="wrap-box notice news">
			<div class="img-decoration decoration-01 decoration-top-left"></div>
			<div class="img-decoration decoration-02 decoration-top-right"></div>
			<div class="img-decoration decoration-07 decoration-middle-right"></div>
			<?php if(!empty($new)){ ?>
			<div class="wrap-title">
				<div class="inner">
					<h1 class="title"><?php echo $new->name; ?></h1>
				</div>
			</div>
			<div class="box">
				<img src="<?php echo getImage($new->image, 550, 253);?>" alt="img">
				<div class="content-editor">
					<p><?php echo $new->content; ?></p>
				</div>
				<p class="date-post"><?php echo "Đăng ngày ".date("d/m/Y",$new->created); ?></p>
			</div>
			<?php }else echo "Không tìm thấy tin tức!"; ?>
		</div>
		<!-- BOX NEWS RELATED-->
		<div class="wrap-box notice news related">
			<div class="wrap-title">
				<div class="inner">
					<h1 class="title">Tin liên quan</h1>
				</div>
			</div>
			<div class="box col-item-md">
			<?php if(!empty($arrNew)){ ?>
				<ul class="list-has-bg-item">
				<?php foreach($arrNew as $new){ ?>
					<li>
						<a href="<?php echo PIUrl::createUrl('/home/parentsDetail', array("alias"=>$new->alias)); ?>"><img src="<?php echo getImage($new->image, 261, 120); ?>" alt="img" width="265" height="122"></a>
						<div class="content-detail">
							<h4 title="<?php echo $new->name; ?>"><a href="<?php echo PIUrl::createUrl('/home/parentsDetail', array("alias"=>$new->alias)); ?>"><?php echo word_limiter($new->name, 15); ?></a></h4>
							<p class="date-post"><?php echo "Đăng ngày ".date("d/m/Y",$new->created); ?></p>
						</div>
					</li>
				<?php } ?>
				</ul>
			<?php } ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
</div>
<div id="footer-container">
	<div id="footer-sprite"></div>
	<div class="footer-container">
		<div class="container">
			<div class="img-decoration footer-decoration-01 decoration-top-left"></div>
			<div class="img-decoration footer-decoration-02 decoration-top-right"></div>
			<div class="info-contact">
				<h3><?php echo $this->dataSystem->title; ?></h3>
				<p>Địa chỉ: <?php echo $this->dataSystem->address; ?></p>
				<p>Điện thoại: <?php echo $this->dataSystem->phone; ?></p>
				<p>Email: <?php echo $this->dataSystem->email; ?></p>
			</div>
			<ul class="menu-horizontal">
				<li><a href="<?php echo PIUrl::createUrl('/home/');?>" class="menu-home <?php echo (yii::app()->getController()->action->id == 'index') ? 'active' : ''; ?>"><i class="icon-ib menu-home-hover"></i><span>Trang chủ</span></a></li>
				<li><a href="<?php echo PIUrl::createUrl('/home/information');?>" class="menu-introduce <?php echo (yii::app()->getController()->action->id == 'information') ? 'active' : ''; ?>"><i class="icon-ib menu-introduce-hover"></i><span>Giới thiệu</span></a></li>
				<li><a href="<?php echo PIUrl::createUrl('/home/parents');?>" class="menu-parents <?php echo (yii::app()->getController()->action->id == 'parents') ? 'active' : ''; ?>"><i class="icon-ib menu-parents-hover"></i><span>Góc phụ huynh</span></a></li>
				<li><a href="<?php echo PIUrl::createUrl('/home/news');?>" class="menu-news <?php echo (yii::app()->getController()->action->id == 'news') ? 'active' : ''; ?>"><i class="icon-ib menu-news-hover"></i><span>Tin tức</span></a></li>
				<li><a href="<?php echo PIUrl::createUrl('/home/album');?>" class="menu-library <?php echo (yii::app()->getController()->action->id == 'album') ? 'active' : ''; ?>"><i class="icon-ib menu-library-hover"></i><span>Thư viện hình ảnh</span></a></li>
				<li><a href="<?php echo PIUrl::createUrl('/home/contact');?>" class="menu-contact <?php echo (yii::app()->getController()->action->id == 'contact') ? 'active' : ''; ?>"><i class="icon-ib menu-contact-hover"></i><span>Liên hệ</span></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="wrap-copyright">
			<div class="container">
				<p class="copyright">Copyright © 2014 Trường mầm non Bảo Ngọc. <span>All rights reserved</span></p>
				<p class="designby">Designed by <a href="javascript:void(0)">Kovo.vn</a></p>
			</div>
		</div>
	</div>
</div>
</div>
<style>
.firstPage, .lastPage{display:none !important;}
.selected a{color: #ED3237 !important;}
</style>
<!-- FOOTER CONTAINER -->
<?php $this->renderPartial('//common/footer'); ?>