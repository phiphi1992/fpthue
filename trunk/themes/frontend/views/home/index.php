<?php $this->renderPartial('//common/header'); ?>
	<div class="content-container">
		<div class="page-home">
			<div class="main-content">
				<!-- BOX SLIDER -->
				<?php if(!empty($arrSlide)){ ?>
				<div class="box slider">
					<div class="img-decoration decoration-01 decoration-top-left"></div>
					<div class="img-decoration decoration-02 decoration-top-right"></div>
					<div class="img-decoration decoration-03 decoration-bottom-left"></div>
					<div class="camera_wrap">
					<?php foreach($arrSlide as $image){ ?>
						<div data-src="<?php echo getImage($image->image, 850, 400); ?>"></div>
					<?php } ?>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php } ?>
				<!-- BOX INTRODUCE -->
				<div class="wrap-box introduce">
					<div class="img-decoration decoration-05 decoration-top-right"></div>
					<div class="wrap-title">
						<div class="inner">
							<h1 class="title"><i class="icon-ib icon-intro"></i>Giới thiệu</h1>
						</div>
					</div>
					<div class="box">
					<?php if(!empty($info)){ ?>
						<img src="<?php  echo getImage($info['image'], 400, 317); ?>" class="img-introduce" alt="img" width="400" height="317">
						<div class="content">
							<?php echo word_limiter($info['description'], 220); ?><a href="<?php echo PIUrl::createUrl('/home/information');?>" class="view-more">Xem thêm</a>
						</div>
					<?php } ?>
					</div>
				</div>
				<!-- BOX PHOTO ACTIVITY -->
				<div class="wrap-box photo-activity">
					<div class="img-decoration decoration-01 decoration-top-left"></div>
					<div class="wrap-title">
						<div class="inner">
							<h1 class="title"><i class="icon-ib icon-heart"></i>Hình ảnh hoạt động</h1>
						</div>
					</div>
					<div class="box">
						<?php if(!empty($arrImage)){ ?>
						<ul class="list-img">
							<?php foreach($arrImage as $image){ ?>
							<li title="<?php echo $image->name; ?>">
								<a href="<?php echo PIUrl::createUrl('/home/image/', array("id"=>$image->id));?>">
									<img src="<?php echo Albums::model()->getImagePrimary($image->id, 262, 121); ?>" alt="img" width="270" height="124">
									<p><?php echo word_limiter($image->name, 8); ?></p>
								</a>
							</li>
							<?php } ?>
						</ul>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="sidebar">
				<!-- BOX NOTICE -->
				<div class="wrap-box notice">
					<div class="img-decoration decoration-04 decoration-bottom-right"></div>
					<div class="wrap-title">
						<div class="inner">
							<h1 class="title"><i class="icon-ib icon-notice"></i>Thông báo</h1>
						</div>
					</div>
					<div class="box list">
					<?php if(!empty($arrNoti)){ $i = 0; ?>
						<ul>
						<?php foreach($arrNoti as $noti){  ?>
							<li>
								<a href="<?php echo PIUrl::createUrl('/home/notiDetail', array("alias"=>$noti->alias)); ?>">
									<span class="number"><?php echo ++$i; ?></span>
									<div class="content">
										<p class="brief-content" title="<?php echo $noti->name; ?>"><?php echo word_limiter($noti->name, 11); ?></p>
										<p class="date-post"><?php echo "Đăng ngày ".date("d/m/Y",$noti->created); ?></p>
									</div>
								</a>
							</li>
						<?php } ?>
						</ul>
					<?php } ?>
					</div>
				</div>

				<!-- BOX NUTRITION -->
				<div class="wrap-box nutrition">
					<div class="wrap-title">
						<div class="inner">
							<h1 class="title"><i class="icon-ib icon-nutrition"></i>Góc dinh dưỡng</h1>
						</div>
					</div>
					<div class="box list">
					<?php if(!empty($arrNutrition)){ $i = 0; ?>
						<ul>
						<?php foreach($arrNutrition as $nutrition){  ?>
							<li>
								<a href="<?php echo PIUrl::createUrl('/home/food', array("id"=>$nutrition->id)); ?>">
									<span class="number"><?php echo ++$i; ?></span>
									<div class="content">
										<p class="brief-content" title="<?php echo $nutrition->name; ?>"><?php echo word_limiter($nutrition->name,11); ?></p>
										<p class="date-post"><?php echo "Đăng ngày ".date("d/m/Y",$nutrition->created); ?></p>
									</div>
								</a>
							</li>
						<?php } ?>
						</ul>
					<?php } ?>
					</div>
				</div>
				<!-- BOX NEWS -->
				<div class="wrap-box news">
					<div class="wrap-title">
						<div class="inner">
							<h1 class="title"><i class="icon-ib icon-leaf"></i>tin tức mới nhất</h1>
						</div>
					</div>
					<div class="box list">
					<?php if(!empty($arrNew)){ $i = 0; ?>
						<ul>
						<?php foreach($arrNew as $new){  ?>
							<li>
								<a href="<?php echo PIUrl::createUrl('/home/newDetail', array("alias"=>$new->alias)); ?>">
									<span class="number"><?php echo ++$i; ?></span>
									<div class="content">
										<p class="brief-content" title="<?php echo $new->name;  ?>"><?php echo word_limiter($new->name, 11); ?></p>
										<p class="date-post"><?php echo "Đăng ngày ".date("d/m/Y",$new->created); ?></p>
									</div>
								</a>
							</li>
						<?php } ?>
						</ul>
					<?php } ?>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
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