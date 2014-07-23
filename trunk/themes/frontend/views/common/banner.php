<?php if(!empty($arrBanner)) {?>
<div class="container">
	<div class="fullwidthbanner-container">	
		<div class="fullwidthabnner">
			<ul>
				<?php foreach ($arrBanner as $banner) {?>
				<li data-transition="3dcurtain-vertical" data-slotamount="10" data-masterspeed="300" data-thumb="<?php echo getImage($banner['image'],1170,750,0)?>">
					<img src="<?php echo getImage($banner['image'],1170,450,0)?>" />
				</li>
				<?php }?>
			</ul>
			<div class="tp-bannertimer tp-bottom"></div>
		</div>
	</div>
</div>
<?php }?>