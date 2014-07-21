<!-- Purchase Block -->
<div class="row-fluid purchase margin-bottom-10">
	<div class="container">
		<p style="color: red; text-align: center; font-size: 16px;"><marquee SCROLLDELAY=50>FPT Telecom Huế xin kính chào quý khách. Hotline liên hệ : 054 3786 999 - 0905 999 789</marquee></p>
	</div>
</div>
<div class="container">
	<div class="span9" style="margin-left: 10px;">
		<?php if(!empty($model)) {?>
		<div class="blog margin-bottom-20">
			<h3><?php echo $model['name']?></h3>
			<ul class="unstyled inline">
				<li><i class="icon-time"></i> <?php echo date('d/m/Y',$model['created']);?></li>
			</ul>
			<p><?php echo $model['content'];?></p>
		</div>
		<div class="facebook_comment">
		<h4 class="color-green">Bình luận</h4>
		<?php 
			$this->widget('application.extensions.fb-comment.FBComment', array(
			'url' =>PIURl::createAbsoluteUrl('default/new/detail',array('alias'=>$model['alias'])), // required site url
  			'posts' => 10, // optional no. of posts (default: 10)
			'width'=>'100%'
		));?>
		</div>
		<?php }?>
		<?php if(!empty($arrRelated)) {?>
		<div class="row-fluid margin-bottom-10">
			<h4 class="color-green">Tin liên quan</h4>
			<div style="margin-left: 20px;" >
				<?php foreach ($arrRelated as $related) {?>
				<i class="icon-hand-right"></i> <a href="/default/internet/detail/id/<?php echo $related['id'];?>" style="color: rgb(18, 65, 253);"><strong><?php echo $related['name'];?></strong></a> (<?php echo date('d/m/Y',$related['created']);?>)<br/>
				<?php }?>
			</div>
		</div>
		<?php }?>
	</div>
	<?php $this->renderPartial('//common/right',array(
		'arrNews'=>$arrNews,
		'arrSystem'=>$arrSystem,
		'arrSupport'=>$arrSupport
	));?>
</div>
<script type="text/javascript">
$(window).load(function() {
	var _width = $('.span9').width();
	$('.facebook_comment .fb_iframe_widget iframe').css('width', '700px');
	$('.facebook-comment .fb-comments .pluginFontHelvetica').children().attr('style', 'width:700px !important');
});
</script>