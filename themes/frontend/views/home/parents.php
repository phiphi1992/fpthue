<?php $this->renderPartial('//common/header'); ?>
<div class="content-container">
	<div class="page-parents">
		<!-- BOX COMMON INTRODUCE -->
		<div class="wrap-box notice">
			<div class="img-decoration decoration-01 decoration-top-left"></div>
			<div class="img-decoration decoration-02 decoration-top-right"></div>
			<div class="img-decoration decoration-07 decoration-middle-right"></div>
			<div class="wrap-title">
				<div class="inner">
					<h1 class="title">Góc phụ huynh</h1>
				</div>
			</div>
			<div class="box">
			<?php if(!empty($arrData)){ ?>
				<div class="col-item-lg">
					<ul class="list-has-bg-item">
					<?php for($i=0; $i<ceil(count($arrData)/5); $i++){ ?>
						<li>
							<a href="<?php echo PIUrl::createUrl('/home/parentsDetail', array("alias"=>$arrData[$i]->alias)); ?>"><img src="<?php echo getImage($arrData[$i]->image, 555, 255); ?>" alt="img" width="550" height="253"></a>
							<div class="content-detail">
								<h4 title="<?php echo $arrData[$i]->name; ?>"><a href="<?php echo PIUrl::createUrl('/home/parentsDetail', array("alias"=>$arrData[$i]->alias)); ?>"><?php echo word_limiter($arrData[$i]->name, 15); ?></a></h4>
								<p title="<?php echo $arrData[$i]->description; ?>"><?php echo word_limiter($arrData[$i]->description, 55)." "; ?><a href="<?php echo PIUrl::createUrl('/home/parentsDetail', array("alias"=>$arrData[$i]->alias)); ?>" class="view-more">Xem thêm</a></p>
								<p class="date-post"><?php echo "Đăng ngày ".date("d/m/Y",$arrData[$i]->created); ?></p>
							</div>
						</li>
					<?php } ?>
					</ul>
				</div>
				<div class="col-item-md">
					<ul class="list-has-bg-item">
					<?php $k=0; ?>
					<?php for($i=ceil(count($arrData)/5); $i<count($arrData); $i++){ ?>
						<li>
							<a href="<?php echo PIUrl::createUrl('/home/parentsDetail', array("alias"=>$arrData[$i]->alias)); ?>"><img src="<?php echo getImage($arrData[$i]->image, 555, 255); ?>" alt="img" width="550" height="253"></a>
							<div class="content-detail">
								<h4 title="<?php echo $arrData[$i]->name; ?>"><a href="<?php echo PIUrl::createUrl('/home/parentsDetail', array("alias"=>$arrData[$i]->alias)); ?>"><?php echo word_limiter($arrData[$i]->name, 15); ?></a></h4>
								<p class="date-post"><?php echo "Đăng ngày ".date("d/m/Y",$arrData[$i]->created); ?></p>
							</div>
						</li>
						<?php $k++; if($k==2){ $k=0; ?>
							<div class="clearfix"></div>
						<?php } ?>
					<?php  } ?>
					</ul>
				</div>
				<?php } ?>
				<div class="clearfix"></div>
				<div class="wrap-pagination">
					<?php if( $item_count > 10){ ?>
					<p>Trang: </p>
					<?php } ?>
					<?php
						$this->widget('CLinkPager', array(
							'currentPage'=>$pages->getCurrentPage(),
							'itemCount'=>$item_count,
							'pageSize'=>$page_size,
							'maxButtonCount'=>5,
							'header'=>'',
							'htmlOptions'=>array('class'=>'pagination mt0'),
							'firstPageCssClass' => 'firstPage',
							'lastPageCssClass' => 'lastPage',
							'previousPageCssClass' => 'page-prev',
							'nextPageCssClass' => 'page-next',
							'prevPageLabel' => '',
							'nextPageLabel' => '',
						));
					?>
				</div>
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
<style>
.firstPage, .lastPage{display:none !important;}
.selected a{color: #ED3237 !important;}
</style>
<!-- FOOTER CONTAINER -->
<?php $this->renderPartial('//common/footer'); ?>