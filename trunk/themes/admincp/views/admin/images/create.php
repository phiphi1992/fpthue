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
			<li class="active"><?php echo translate('Thêm hình ảnh');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Thêm hình ảnh');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
			<div class="row-fluid">
			
				<div class="widget-box">
				<div class="form-horizontal">
					<div class="control-group">
						<label style="text-align:left" class="control-label" for="form-field-1">Chọn album hình:</label>

						<div class="controls">
							<select id="selectIdAlbum">
								<?php if(!empty($dataAlbums)) foreach($dataAlbums as $key=>$value):?>
									<option value="<?php echo $key;?>"><?php echo $value;?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
				</div>
					<?php
						$this->widget('ext.xupload.XUpload', array(
								'url' => PIUrl::createUrl('/admin/images/upload'),
								'model' => $model,
								'attribute' => 'file',
								'multiple' => true,
						));
					?>
				</div>
				<style>
				#XUploadForm-form .row{margin-left:0}
				#XUploadForm-form .fileinput-button{margin-right:4px;}
				</style>
				
			</div> 
			</div> <!--.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery.colorbox-min.js"></script>
<script>
$(document).ready(function(){

	$('#selectIdAlbum').change(function(){
		$("#XUploadForm_album_id").val($(this).val());
	});
	
	setTimeout(function(){
	$("#id-file-format").trigger('click')
	},0);
	$(".lbl").hide();	
	
	$('#images-form').submit(function(){
    $('button[type=submit]', this).attr('disabled', 'disabled');
	});
});
</script>