<!--=== Slider ===-->
<div class="slider-inner">
	<div id="da-slider" class="da-slider">
		<div class="da-slide">
            <!-- <h2>
				<i>Dịch Vụ Cáp Quang Siêu Nhanh</i> <br /><br /> 
				<i>O1699 333 777</i> - <i>O1699 333 777</i>
			</h2>			
            <div class="da-img"><img src="assets/img/common/trangtien.jpg" alt="" /></div> -->
        </div>

        <nav class="da-arrows">
            <span class="da-arrows-prev"></span>
            <span class="da-arrows-next"></span>
        </nav>
    </div><!--/da-slider-->
</div><!--/slider-->
<!--=== End Slider ===-->
<!-- Purchase Block -->
<div class="row-fluid purchase margin-bottom-10">
	<div class="container">
		<p style="color: red; text-align: center; font-size: 16px;"><marquee SCROLLDELAY=50>FPT Telecom Huế xin kính chào quý khách. Hotline liên hệ : 054 3786 999 - 0905 999 789</marquee></p>
	</div>
</div>
<div class="container">
	<div class="span9" style="margin-left: 0px;">
		<?php if(!empty($model)) {?>
		<div class="news">
			<div class="headline"><a href=""><h3><?php echo $category['name'];?></h3></a></div>
			<div class="row-fluid margin-bottom-10">
				<?php foreach ($model as $new) {?>
				<div class="span6 item" style="margin-left:5px;">
					<img class="pull-left lft-img-margin" width="150" src="<?php echo getImage($new['image'],150,90,0)?>" alt="" />
					<strong><a href="/default/internet/detail/id/<?php echo $new['id'];?>"><?php echo $new['name'];?></a></strong>
					<p><i class="icon-time"> <?php echo date('d/m/Y',$new['created']);?></i>
					<p><i><?php echo word_limiter($new['description'],20)?></i></p>
				</div>
				<?php }?>
			</div>
		</div>
		<div class="pagination pagination-centered">
		<?php 
		$this->widget('CLinkPager', array(
		'currentPage'=>$pages->getCurrentPage(),
		'itemCount'=>$count,
		'pageSize'=>$page_size,
		'maxButtonCount'=>5,
		'prevPageLabel' => '<i class="icon-double-angle-left"></i>',
        'nextPageLabel' => '<i class="icon-double-angle-right"></i>',
        'firstPageLabel' => 'Trước',
        'lastPageLabel' => 'Tiếp',
		'header'=>'',
		'htmlOptions'=>array('class'=>''),
		));
		?>
		</div>
		<?php }?>
	</div>
	<!-- Posts -->
	<?php $this->renderPartial('//common/right',array(
		'arrNews'=>$arrNews,
		'arrSystem'=>$arrSystem,
		'arrSupport'=>$arrSupport
	));?>
</div>
<script type="text/javascript">
$( window ).load(function() {
	/*Set height internet item*/
	var _heightMax = 0;
	$(".news .item").each(function(){
		var height = $(this).height();
		if(height > _heightMax){
			_heightMax = height;
		}
	});
	$(".news .item").css('height',_heightMax+'px');
});
</script>