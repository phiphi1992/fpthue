<div class="content-container">
	<div class="container">
		<!--=== Slider ===-->
		<?php $this->renderPartial('//common/banner',array(
			'arrBanner'=>$arrBanner
		));?>
		<!--=== End Slider ===-->
		<?php if(!empty($this->dataSystem['marquee']) && $this->dataSystem['marquee'] != '') {?>
		<div class="row-fluid purchase margin-bottom-10">
			<strong style="color: red; text-align: center; font-size: 16px;"><marquee SCROLLDELAY=50><?php echo $this->dataSystem['marquee'];?></marquee></strong>
		</div>
		<?php }?>
		<div class="span9" style="margin-left: 0px;">
			<?php if(!empty($model)) {?>
			<div class="news">
				<div class="headline"><a href="<?php echo PIUrl::createUrl('/default/new/index',array('alias'=>strtolower($category['alias'])));?>"><h3><?php echo $category['name'];?></h3></a></div>
				<div class="row-fluid margin-bottom-10">
					<?php foreach ($model as $new) {?>
					<div class="span6 item" style="margin-left:5px;">
						<a href="<?php echo PIUrl::createUrl('default/new/detail',array('category'=>strtolower($category['alias']),'alias'=>$new['alias']));?>"><img class="pull-left lft-img-margin" src="<?php echo getImage($new['image'],150,90,0)?>" alt="" /></a>
						<h5><strong><a href="<?php echo PIUrl::createUrl('default/new/detail',array('category'=>strtolower($category['alias']),'alias'=>$new['alias']));?>"><?php echo $new['name'];?></a></strong></h5>
						<i class="icon-time"></i> <?php echo date('d/m/Y',$new['created']);?> | <i class="icon-user-md"></i> Admin
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
		<?php $this->widget('application.components.widgetRight',array('dataSystem'=>$this->dataSystem));?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	/*Set height internet item*/
	setTimeout(function() {
		var _heightMax = 100;
		$(".news .item").each(function(){
			var height = $(this).height();
			if(height > _heightMax){
				_heightMax = height;
			}
		});
		$(".news .item").css('height',_heightMax+'px');
	}, 1000);
	
});
</script>