<div class="span3" style="margin-left:20px;"> 
	<div class="posts">
		<div class="headline"><h3>HỖ TRỢ TRỰC TUYẾN</h3></div>
			<?php if(!empty($this->dataSystem['hotline']) && $this->dataSystem['hotline'] != '') {?>
			<dl class="dl-horizontal">
				<div class="hotline">
					<span><strong><?php echo $this->dataSystem['hotline'];?></strong></span>
				</div>
			</dl>
			<?php }?>
			<?php if(!empty($arrSupport)) {
				foreach ($arrSupport as $support) {
			?>
			<dl class="dl-horizontal">
				<div class="support">
					<h5><?php echo $support['position']?>: </h5>
					<h3><strong><?php echo $support['phone']?></strong></h3>
				</div>
			</dl>
			<?php 
				}
			}?>
	</div>
	<?php if(!empty($arrNews)) {?>
	<div class="posts">
		<div class="headline"><a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>'tin-tuc'));?>"><h3>TIN TỨC</h3></a></div>
		<?php foreach ($arrNews as $new) {?>
		<dl class="dl-horizontal">
			<dt><a href="<?php echo PIUrl::createUrl('default/new/detail',array('category'=>'tin-tuc','alias'=>$new['alias']));?>"><img src="<?php echo getImage($new['image'])?>" alt="<?php echo $new['name']?>" /></a></dt>
			<dd>
				<p><a href="<?php echo PIUrl::createUrl('default/new/detail',array('category'=>'tin-tuc','alias'=>$new['alias']));?>"><?php echo $new['name']?></a></p>
				<p><i class="icon-time"></i> <?php echo date('d/m/Y',$new['created'])?></p>
		</dl>
		<?php }?>
	</div>
	<?php }?>
	<br/>
	<!-- Ads -->
	<?php if(!empty($arrAds)) {?>
		<?php foreach ($arrAds as $asd) {?>
			<div class="row-fluid margin-bottom-10" style="text-align: center;">
				<img src="<?php echo getImage($asd['image'],270,270,0)?>" alt="" />
			</div>
		<?php }?>
	<?php }?>
	<!-- End Ads -->
	<!-- Vide0 -->
	<div  class="row-fluid margin-bottom-10" style="text-align:center;">
		<iframe src="https://player.vimeo.com/video/53111938" width="270" height="200"></iframe>
	</div>
	<!-- End -->
	<!--Pictures slide-->
	<?php if(!empty($arrPic)) {?>
	<div class="pictures">
		<div class="headline"><h3>Hình ảnh</h3></div>
		<div id="myCarousel" class="carousel slide">
			<div class="carousel-inner">
				<?php foreach ($arrPic as $key=>$pic) {?>
				<div class="item <?php echo $key==0 ? 'active': '';?>">
					<img src="<?php echo getImage($pic['image'],270,250,0)?>"/>
				</div>
				<?php }?>
			</div>
			<div class="carousel-arrow">
				<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="icon-angle-left"></i></a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="icon-angle-right"></i></a>
			</div>
		</div>
	</div>
	<?php }?>
	<!--End Pictures slide-->
	<!-- Fan Facebok -->
	<div class="fanpage">
		<div class="fb-like-box" data-href="https://www.facebook.com/pages/Viettel-Telecom-Hu%E1%BA%BF/600489353403220?ref=hl" data-width="270px" data-height="250px" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
	</div>
	<div class="twitter_googleplus">
	<?php $this->widget('application.extensions.social.social', array(
		'style'=>'horizontal', 
		'networks' => array(
			'twitter'=>array(
				'data-via'=>'', //http://twitter.com/#!/YourPageAccount if exists else leave empty
			),
			'googleplusone'=>array(
				"size"=>"medium",
				"annotation"=>"bubble",
			)
		)
	));?>
	</div>
	<!-- End Fan Facebok -->
</div>