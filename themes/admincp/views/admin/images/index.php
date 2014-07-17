<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="<?php echo PIUrl::createUrl('/admin');?>">Trang chủ</a>

				<span class="divider">
					<i class="icon-angle-right arrow-icon"></i>
				</span>
			</li>
			<li class="active"><?php echo translate('Hình Ảnh');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Hình Ảnh');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
			<div class="row-fluid">	
				<ul class="ace-thumbnails">
				<?php if(!empty($listImage)){ foreach($listImage as $image):?>
					<li>
						<a href="<?php echo getImage($image->image,500,500);?>" data-rel="colorbox" class="cboxElement">
							<img width="150px" height="150px"  src="<?php echo getImage($image->image,150,150,1);?>" />

						</a>
						
						<div class="tools tools-bottom">
							<a href="<?php echo getImage($image->image,500,500);?>" data-rel="colorbox">
								<i class="icon-link"></i>
							</a>


							<a href="<?php echo PIUrl::createUrl('/admin/images/delImage/',array('id'=>$image->id,'typeId'=>Images::$IMAGE_PHOTO));?>" class="delete">
								<i class="icon-remove red"></i>
							</a>
						</div>

					</li>
					<?php endforeach; }else{?>
					<span>Không có hình ảnh</span>
					<?php }?>
					
					
									
				</ul>
				<style>.pagination .hidden{visibility: visible!important;}</style>
			</div> 
			</div> <!--.span-->
		</div><!--/.row-fluid-->
		<div class="row-fluid">
				<div class="pagination">
						<?php $this->widget('CLinkPager', array(
						'pages' => $pages,
						'header'=>'',
						'selectedPageCssClass'=>'active',
						'firstPageLabel'=>'<i class="icon-double-angle-left"></i>',
						'prevPageLabel'=>'<',
						'nextPageLabel'=>'>',
						'lastPageLabel'=>'<i class="icon-double-angle-right"></i>',
						'htmlOptions'=>array('class'=>''),
					)) ?>				
				</div>
				</div>
	</div><!--/.page-content-->
</div><!--/.main-content-->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery.colorbox-min.js"></script>

<script>
$(document).ready(function(){
	var colorbox_params = {
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="icon-arrow-left"></i>',
		next:'<i class="icon-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'100%',
		maxHeight:'100%',
		onOpen:function(){
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = 'auto';
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading icon
	
	setTimeout(function(){
	$("#id-file-format").trigger('click')
	},500);
	$(".lbl").hide();	
	
	$('#images-form').submit(function(){
    $('button[type=submit]', this).attr('disabled', 'disabled');
	});

});
	
</script>