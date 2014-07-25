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

			<!--End quảng cáo ngang-->
			<?php  if(!empty($arrCa)) {?>
			<div class="ca">
				<div class="headline"><a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'chu-ky-so'));?>"><h3>Chữ ký số</h3></a></div>
				<div class="row-fluid margin-bottom-10">
					<ul class="thumbnails">
						<?php foreach ($arrCa as $ca) {?>
						<li class="span4 thumbnail-style thumbnail-kenburn item">
							<div class="overflow-hidden"><img src="<?php echo getImage($ca['image'],260,160,0)?>" alt="" /></div>
							<h5><a href="<?php echo PIUrl::createUrl('default/new/detail',array('category'=>'chu-ky-so','alias'=>$ca['alias']));?>"><strong><?php echo $ca['name']?></strong></a></h5>
							<i class="icon-time"></i> <?php echo date('d/m/Y',$ca['created']);?> | <i class="icon-user-md"></i> Admin
							<p><i><?php echo word_limiter($ca['description'],20)?></i></p>
						</li>
					<?php }?>
					</ul>
				</div>
			</div>
			<?php }?>

			<?php  if(!empty($arrSimCard)) {?>
			<div class="ca">
				<div class="headline"><a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'sim-card'));?>"><h3>Sim Card</h3></a></div>
				<div class="row-fluid margin-bottom-10">
					<ul class="thumbnails">
						<?php foreach ($arrSimCard as $simCard) {?>
						<li class="span4 thumbnail-style thumbnail-kenburn item">
							<div class="overflow-hidden"><img src="<?php echo getImage($simCard['image'],260,160,0)?>" alt="" /></div>
							<h5><a href="<?php echo PIUrl::createUrl('default/new/detail',array('category'=>'sim-card','alias'=>$simCard['alias']));?>"><strong><?php echo $simCard['name']?></strong></a></h5>
							<i class="icon-time"></i> <?php echo date('d/m/Y',$simCard['created']);?> | <i class="icon-user-md"></i> Admin
							<p><i><?php echo word_limiter($simCard['description'],20)?></i></p>
						</li>
					<?php }?>
					</ul>
				</div>
			</div>
			<?php }?>

			<?php if(!empty($arrStore)) {?>
			<div class="store">
				<div class="headline"><a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'store'));?>"><h3>STORE</h3></a></div>
				<div class="row-fluid margin-bottom-10">
					<ul class="thumbnails">
						<?php foreach ($arrStore as $store) {?>
						<li class="span4 thumbnail-style thumbnail-kenburn item">
							<div class="overflow-hidden"><img src="<?php echo getImage($store['image'],260,160,0)?>" alt="" /></div>
							<h5><a href="<?php echo PIUrl::createUrl('default/new/detail',array('category'=>'dang-ky-cap-quang','alias'=>$store['alias']));?>"><strong><?php echo $store['name']?></strong></a></h5>
							<i class="icon-time"></i> <?php echo date('d/m/Y',$store['created']);?> | <i class="icon-user-md"></i> Admin
							<p><i><?php echo word_limiter($store['description'],20)?></i></p>
						</li>
					<?php }?>
					</ul>
				</div>
			</div>
			<?php }?>
		</div>
		<?php $this->renderPartial('//common/right',array(
			'arrNews'=>$arrNews,
			'arrSupport'=>$arrSupport,
			'arrAds'=>$arrAds,
			'arrPic'=>$arrPic
		));?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	/*Set height internet item*/
	var max = 250;
	var _internetMax = max;
	var internetHeight = $(".internet ul").height();
	if(internetHeight > _internetMax) {
		_internetMax =  internetHeight;
	}

	$(".internet li.thumbnail-style").css({
		'height': _internetMax+'px',
		'border': 'solid 1px rgba(173, 172, 172, 0.368627)'
	});

	/*Set height optical item*/
	var _opticalMax = max;
	var opticalHeight = $(".optical ul").height();
	if(opticalHeight > _opticalMax) {
		_opticalMax =  opticalHeight;
	}

	$(".optical li.thumbnail-style").css({
		'height': _opticalMax+'px',
		'border': 'solid 1px rgba(173, 172, 172, 0.368627)'
	});

	/*Set height ca item*/
	var _simCardMax = max;
	var simCardHeight = $(".simCard ul").height();
	if(simCardHeight > _simCardMax) {
		_simCardMax =  simCardHeight;
	}

	$(".simCard li.thumbnail-style").css({
		'height': _caMax+'px',
		'border': 'solid 1px rgba(173, 172, 172, 0.368627)'
	});

	/*Set height sim card item*/
	var _caMax = max;
	var caHeight = $(".ca ul").height();
	if(caHeight > _caMax) {
		_caMax =  caHeight;
	}

	$(".ca li.thumbnail-style").css({
		'height': _caMax+'px',
		'border': 'solid 1px rgba(173, 172, 172, 0.368627)'
	});
	/*Set height store item*/
	var _storeMax = max;
	var storeHeight = $(".store ul").height();
	if(storeHeight > _storeMax) {
		_storeMax =  storeHeight;
	}

	$(".store li.thumbnail-style").css({
		'height': _storeMax+'px',
		'border': 'solid 1px rgba(173, 172, 172, 0.368627)'
	});
});
</script>