<div class="span3" style="margin-left:20px;"> 
	<div class="posts">
		<div class="headline"><h3>HỖ TRỢ TRỰC TUYẾN</h3></div>
			<?php if(!empty($arrSystem)) {?>
			<dl class="dl-horizontal">
				<div class="hotline">
					<span><strong><?php echo $arrSystem['hotline'];?></strong></span>
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
		<div class="headline"><h3>TIN TỨC</h3></div>
		<?php foreach ($arrNews as $new) {?>
		<dl class="dl-horizontal">
			<dt><a href="#"><img src="<?php echo getImage($new['image'])?>" alt="<?php echo $new['name']?>" /></a></dt>
			<dd>
				<p><a href="#"><?php echo $new['name']?></a></p>
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
	<div  style="text-align: center; margin-left:-30px;">
		<figure class="embed-section">
			<iframe src="https://player.vimeo.com/video/53111938" width="250" height="200"></iframe>
		</figure>                            
	</div>
	<!-- End -->
	<!--Pictures slide-->
	<!-- <div class="pictures">
		<div class="headline"><h3>Hình ảnh</h3></div>
		<div id="myCarousel" class="carousel slide">
			<div class="carousel-inner" style="height: 200px;">
				<div class="item active">
					<img src="assets/img/common/hue_1.jpg" alt="" width="300" />
				</div>
				<div class="item">
					<img src="assets/img/common/hue_2.jpg" alt="" width="300" />
				</div>
			</div>
			<div class="carousel-arrow">
				<a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="icon-angle-left"></i></a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="icon-angle-right"></i></a>
			</div>
		</div>
	</div>
	<!--End Pictures slide-->
	<!-- Fan Facebok -->
	<div class="fanpage">
		<div class="fb-like-box" data-href="https://www.facebook.com/pages/Viettel-Telecom-Hu%E1%BA%BF/600489353403220?ref=hl" data-width="270px" data-height="250px" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
	</div>
	<!-- End Fan Facebok -->
</div>