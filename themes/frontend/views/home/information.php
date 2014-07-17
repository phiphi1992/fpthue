<?php $this->renderPartial('//common/header'); ?>
<div class="content-container">
	<div class="page-introduce">
		<!-- BOX COMMON INTRODUCE -->
		<div class="wrap-box introduce">
			<div class="img-decoration decoration-01 decoration-top-left"></div>
			<div class="img-decoration decoration-06 decoration-top-right"></div>
			<div class="img-decoration decoration-03 decoration-bottom-left"></div>
			<div class="wrap-title">
				<div class="inner">
					<h1 class="title">Giới thiệu chung</h1>
				</div>
			</div>
			<div class="box">
				<img src="<?php echo getImage($info->image, 400, 317); ?>" class="img-introduce" alt="img" width="400" height="317">
				<div class="content">
					<p><?php echo $info->content; ?></p>
				</div>
			</div>
		</div>
		<!-- BOX FACILITIES -->
		<div class="wrap-box introduce facilities">
			<div class="img-decoration decoration-07 decoration-top-right"></div>
			<div class="img-decoration decoration-08 decoration-bottom-left"></div>
			<div class="wrap-title">
				<div class="inner">
					<h1 class="title">Cơ sở vật chất</h1>
				</div>
			</div>
			<div class="box">
				<ul>
				<?php if(!empty($facilities)){ ?>	
					<li>
						<img src="<?php echo getImage($facilities->image1, 360, 220); ?>" alt="img">
						<p title="<?php echo $facilities->title1; ?>"><?php echo word_limiter($facilities->title1, 7);?></p>
						<p class="text-indent"><?php echo $facilities->content1 ;?></p>
						<p class="text-indent"><?php echo $facilities->content2 ;?></p>
					</li>
					<li>
						<img src="<?php echo getImage($facilities->image2, 360, 220); ?>" alt="img">
						<p title="<?php echo $facilities->title2; ?>"><?php echo word_limiter($facilities->title2, 7);?></p>
						<p class="text-indent"><?php echo $facilities->content3 ;?></p>
						<p class="text-indent"><?php echo $facilities->content4 ;?></p>
					</li>
					<li>
						<img src="<?php echo getImage($facilities->image3, 360, 220); ?>" alt="img">
						<p title="<?php echo $facilities->title3; ?>"><?php echo word_limiter($facilities->title3, 7);?></p>
						<p class="text-indent"><?php echo $facilities->content5 ;?></p>
						<p class="text-indent"><?php echo $facilities->content6 ;?></p>
					</li>
				<?php }else{ echo translate("Không tìm thấy thông tin<br/><br/>"); } ?>
				</ul>
			</div>
		</div>
		<!-- BOX TEACHER -->
		<div class="wrap-box introduce facilities teacher">
			<div class="wrap-title">
				<div class="inner">
					<h1 class="title">Đội ngũ giáo viên</h1>
				</div>
			</div>
			<div class="box">
				<ul>
				<?php if(!empty($teachers)){ ?>					
					<li>
						<img src="<?php echo getImage($teachers->image1, 549, 220); ?>" alt="img">
						<p><span>Ban giám hiệu</span>: <?php echo word_limiter($teachers->administrators, 15);?></p>
						<p><span>Gồm</span>: <?php echo word_limiter($teachers->total, 15);?></p>
					</li>
					<li class="last">
						<img src="<?php echo getImage($teachers->image2, 549, 220); ?>" alt="img">
						<p><span>Giáo viên</span>: <?php echo word_limiter($teachers->teacher, 6);?></p>
						<p><span>Nhân viên tạp vụ</span>: <?php echo word_limiter($teachers->staff,6);?></p>
						<p><span>Cấp dưỡng</span>: <?php echo word_limiter($teachers->support,6);?></p>
						<p><span>Bảo vệ</span>: <?php echo word_limiter($teachers->protection,6);?></p>
					</li>
				<?php }else{ echo translate("Không tìm thấy thông tin<br/><br/>"); } ?>
				</ul>
			</div>
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

<!-- FOOTER CONTAINER -->
<?php $this->renderPartial('//common/footer'); ?>