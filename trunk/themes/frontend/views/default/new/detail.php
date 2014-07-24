<div class="container">
	<?php if(!empty($this->dataSystem['marquee']) && $this->dataSystem['marquee'] != '') {?>
	<div class="row-fluid purchase margin-bottom-10">
		<strong style="color: red; text-align: center; font-size: 16px;"><marquee SCROLLDELAY=50><?php echo $this->dataSystem['marquee'];?></marquee></strong>
	</div>
	<?php }?>
	<div class="span9" style="margin-left: 10px;">
		<?php if(!empty($model)) {?>
		<div class="row-fluid margin-bottom-30">
			<img class="pull-left lft-img-margin img-width-200" src="<?php echo getImage($model['image'],260,160,0)?>" alt="" />
			<h4><?php echo $model['name']?></h4>
			<i class="icon-time"></i> <?php echo date('d/m/Y',$model['created']);?> | <i class="icon-user-md"></i> Admin
			<p><strong><?php echo $model['description']?></strong></p>
		</div>
		<div class="row-fluid margin-bottom-20">
			<?php echo $model['content'];?>
		</div>
		<div class="facebook_like_share">
			<div class="fb-like" style="float:left; margin-right:30px;" data-href="https://www.facebook.com/pages/Viettel-Telecom-Hu%E1%BA%BF/600489353403220" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
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
		</div>
		<div class="facebook_comment">
			<h4 class="color-green">Bình luận</h4>
			<?php 
				$this->widget('application.extensions.fb-comment.FBComment', array(
				'url' =>Yii::app()->getBaseUrl(true).$_SERVER['REQUEST_URI'], // required site url
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
				<i class="icon-hand-right"></i> <a href="<?php echo PIUrl::createUrl('default/new/detail',array('category'=>'tin-tuc','alias'=>$related['alias']));?>" style="color: rgb(18, 65, 253);"><strong><?php echo $related['name'];?></strong></a> (<?php echo date('d/m/Y',$related['created']);?>)<br/>
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