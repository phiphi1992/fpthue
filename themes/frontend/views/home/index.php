<div class="content-container">
	<!--=== Slider ===-->
	<?php $this->renderPartial('//common/banner',array(
		'arrBanner'=>$arrBanner
	));?>
	<!--=== End Slider ===-->
	<div class="container">
		<?php if(!empty($this->dataSystem['marquee']) && $this->dataSystem['marquee'] != '') {?>
		<div class="row-fluid purchase margin-bottom-10">
			<strong style="color: red; text-align: center; font-size: 16px;"><marquee SCROLLDELAY=50><?php echo $this->dataSystem['marquee'];?></marquee></strong>
		</div>
		<?php }?>
		<div class="span9" style="margin-left:10px;">
			<div class="message"></div>
			<?php if(!empty($arrInternet)) {?>
			<div class="internet">
				<div class="headline"><a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'dang-ky-internet'));?>"><h3>ĐĂNG KÝ INTERNET</h3></a></div>
				<div class="row-fluid margin-bottom-10">
					<ul class="thumbnails">
						<?php foreach ($arrInternet as $internet) {?>
						<li class="span4 thumbnail-style thumbnail-kenburn item">
							<div class="overflow-hidden"><img src="<?php echo getImage($internet['image'],260,160,0)?>" alt="" /></div>
							<h5><a href="<?php echo PIUrl::createUrl('default/new/detail',array('category'=>'dang-ky-internet','alias'=>$internet['alias']));?>"><strong><?php echo $internet['name']?></strong></a></h5>
							<i class="icon-time"></i> <?php echo date('d/m/Y',$internet['created']);?> | <i class="icon-user-md"></i> Admin
							<p><i><?php echo word_limiter($internet['description'],20)?></i></p>
						</li>
					<?php }?>
					</ul>
				</div>
			</div>
			<?php }?>
			<?php  if(!empty($arrOptical)) {?>
			<div class="optical">
				<div class="headline"><a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'dang-ky-cap-quang'));?>"><h3>ĐĂNG KÝ CÁP QUANG</h3></a></div>
				<div class="row-fluid margin-bottom-10">
					<ul class="thumbnails">
						<?php foreach ($arrOptical as $optical) {?>
						<li class="span4 thumbnail-style thumbnail-kenburn item">
							<div class="overflow-hidden"><img src="<?php echo getImage($optical['image'],260,160,0)?>" alt="" /></div>
							<h5><a href="<?php echo PIUrl::createUrl('default/new/detail',array('category'=>'dang-ky-cap-quang','alias'=>$optical['alias']));?>"><strong><?php echo $optical['name']?></strong></a></h5>
							<i class="icon-time"></i> <?php echo date('d/m/Y',$optical['created']);?> | <i class="icon-user-md"></i> Admin
							<p><i><?php echo word_limiter($optical['description'],20)?></i></p>
						</li>
					<?php }?>
					</ul>
				</div>
			</div>
			<?php }?>
			<!--Quảng cáo ngang-->
			<div class="row-fluid margin-bottom-10">
				<div class="span12" style="text-align: center;">
					<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl;?>/assets/img/common/quangcao_2.gif" alt="Quảng cáo"/></a>
				</div>
			</div>
			<!--End-->
			<?php if(!empty($arrStore)) {?>
			<div class="store">
				<div class="headline"><a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'store'));?>"><h3>STORE</h3></a></div>
				<ul class="thumbnails">
					<?php foreach ($arrStore as $store) {?>
					<li class="span3">
						<div class="thumbnail-style thumbnail-kenburn item">
							<div class="thumbnail-img">
								<div class="overflow-hidden" style="height:150px;"><img src="<?php echo getImage($store['image'],250,160,0)?>" alt="<?php echo $store['name']?>" /></div>
							</div>
							<h5><a class="hover-effect" href="<?php echo PIUrl::createUrl('default/new/detail',array('category'=>'store','alias'=>$store['alias']));?>"><strong><?php echo $store['name']?></strong></a></h5>
							<i class="icon-time"></i> <?php echo date('d/m/Y',$store['created']);?> | <i class="icon-user-md"></i> Admin
							<p><i><?php echo word_limiter($store['description'],20)?></i></p>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
			<?php }?>
			<?php if(!empty($arrPartner)) {?>
			<div id="clients-flexslider parter" class="flexslider home clients">
				<div class="headline"><h3>ĐỐI TÁC</h3></div>
				<ul class="slides">
					<?php foreach ($arrPartner as $partner) {?>
					<li style="display: block;">
						<a href="<?php echo $partner['link'];?>">
							<img src="<?php echo getImage($partner['image'],80,80,0)?>" alt="" /> 
							<img src="<?php echo getImage($partner['image'],80,80,0)?>" class="color-img" alt="" />
						</a>
					</li>
					<?php }?>
				</ul>
			</div>
			<?php }?>
		</div>
		<?php $this->renderPartial('//common/right',array(
			'arrNews'=>$arrNews,
			'arrSupport'=>$arrSupport,
			'arrAds'=>$arrAds
		));?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	/*Set height internet item*/
	var _internetMax = 250;
	var internetHeight = $(".internet ul").height();
	if(internetHeight > _internetMax) {
		_internetMax =  internetHeight;
	}

	$(".internet li").css({
		'height': _internetMax+'px'
	});

	/*Set height optical item*/
	var _opticalMax = 250;
	var opticalHeight = $(".optical ul").height();
	if(opticalHeight > _opticalMax) {
		_opticalMax =  opticalHeight;
	}

	$(".optical li").css({
		'height': _opticalMax+'px'
	});

	/*Set height store item*/
	var _storeMax = 250;
	var storeHeight = $(".store ul").height();
	if(storeHeight > _storeMax) {
		_storeMax =  storeHeight;
	}

	$(".store li").css({
		'height': _storeMax+'px'
	});
});
</script>