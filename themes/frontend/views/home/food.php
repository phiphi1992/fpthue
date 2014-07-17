<?php $this->renderPartial('//common/header'); ?>
<style>.box .table-container table{border:1px solid #e1e1e1; font-size:16px; text-align:center} .box .table-container table tr td{padding: 10px;border: 1px solid #e1e1e1;}</style>
<div class="content-container">
	<div class="page-foodforbaby">
		<!-- BOX COMMON INTRODUCE -->
		<div class="wrap-box news">
		<?php if(!empty($arrNutrition)){ ?>
			<div class="wrap-title">
				<div class="inner">
					<h1 class="title"><?php echo $arrNutrition->name; ?></h1>
				</div>
			</div>
			<div class="box">
				<div class="table-container">
					<?php echo $arrNutrition->content; ?>
				</div>
				
				<div class="wrap-btn">
				<?php if(!empty($arrNutritionPre)){ ?>
					<div class="left"><a href="<?php echo PIUrl::createUrl('/home/food', array("id"=>$arrNutritionPre->id)); ?>" class="btn"><i class="icon-ib menu-news-hover"></i><span>Thực đơn của bé tuần trước</span></a></div>
				<?php } ?>
				<?php if(!empty($arrNutritionNext)){ ?>
					<div class="right"><a href="<?php echo PIUrl::createUrl('/home/food', array("id"=>$arrNutritionNext->id)); ?>" class="btn"><i class="icon-ib menu-news-hover"></i><span>Thực đơn của bé tuần tiếp theo</span></a></div>
					<div class="clearfix"></div>
				<?php } ?>
				</div>
			</div>
		<?php }else	echo "Không tìm thấy thực đơn!"; ?>
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