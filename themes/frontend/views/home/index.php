<div class="content-container">
	<!--=== Slider ===-->
	<?php $this->renderPartial('//common/banner',array(
		'arrBanner'=>$arrBanner
	));?>
	<!--=== End Slider ===-->
	<div class="container">
		<div class="row-fluid purchase margin-bottom-10">
				<strong style="color: red; text-align: center; font-size: 16px;"><marquee SCROLLDELAY=50>Viettel Huế xin kính chào quý khách. Hotline liên hệ : 054 3786 999 - 0905 999 789</marquee></strong>
		</div>
		<div class="span9" style="margin-left:10px;">
			<div class="message"></div>
			<?php if(!empty($arrInternet)) {?>
			<div class="internet">
				<div class="headline"><a href="dang-ky-internet"><h3>ĐĂNG KÝ INTERNET</h3></a></div>
				<div class="row-fluid margin-bottom-10">
					<ul class="thumbnails">
						<?php foreach ($arrInternet as $internet) {?>
						<li class="span4 thumbnail-style thumbnail-kenburn item">
							<div class="overflow-hidden"><img src="<?php echo getImage($internet['image'],260,160,0)?>" alt="" /></div>
							<h5><a href="dang-ky-internet/<?php echo $internet['alias'];?>"><strong><?php echo $internet['name']?></strong></a></h5>
							<p><i><?php echo word_limiter($internet['description'],20)?></i></p>
						</li>
					<?php }?>
					</ul>
				</div>
			</div>
			<?php }?>
			<?php if(!empty($arrOptical)) {?>
			<div class="optical">
				<div class="headline"><a href="dang-ky-cap-quang"><h3>ĐĂNG KÝ CÁP QUANG</h3></a></div>
				<div class="row-fluid margin-bottom-10">
					<ul class="thumbnails">
						<?php foreach ($arrOptical as $arrOptical) {?>
						<li class="span4 thumbnail-style thumbnail-kenburn item">
							<div class="overflow-hidden"><img src="<?php echo getImage($arrOptical['image'],260,160,0)?>" alt="" /></div>
							<h5><a href="dang-ky-cap-quang/<?php echo $arrOptical['alias'];?>"><strong><?php echo $arrOptical['name']?></strong></a></h5>
							<p><i><?php echo word_limiter($arrOptical['description'],20)?></i></p>
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
				<div class="headline"><a href="store"><h3>STORE</h3></a></div>
				<ul class="thumbnails">
					<?php foreach ($arrStore as $store) {?>
					<li class="span3">
						<div class="thumbnail-style thumbnail-kenburn item">
							<div class="thumbnail-img">
								<div class="overflow-hidden" style="height:150px;"><img src="<?php echo getImage($arrOptical['image'],250,160,0)?>" alt="<?php echo $store['name']?>" /></div>
							</div>
							<h5><a class="hover-effect" href="store/<?php echo $store['alias'];?>"><strong><?php echo $store['name']?></strong></a></h5>
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
	var _heightInternetMax = 0;
	$(".internet .thumbnail-style").each(function(){
		var height = $(this).height();
		if(height > _heightInternetMax){
			_heightInternetMax = height;
		}
	});
	$(".internet .thumbnail-style").css('height',_heightInternetMax+'px');
	/*Set height optical item*/
	var _heightOpticalMax = 0;
	$(".optical .thumbnail-style").each(function(){
		var height = $(this).height();
		if(height > _heightOpticalMax){
			_heightOpticalMax = height;
		}
	});
	$(".optical .thumbnail-style").css('height',_heightOpticalMax+'px');
	/*Set height store item*/
	var _heightStoreMax = 0;
	$(".store .thumbnail-style").each(function(){
		var height = $(this).height();
		if(height > _heightStoreMax){
			_heightStoreMax = height;
		}
	});
	$(".store .thumbnail-style").css('height',_heightStoreMax+'px');
});
</script>