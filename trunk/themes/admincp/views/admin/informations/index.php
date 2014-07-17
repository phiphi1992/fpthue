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
			<li class="active"><?php echo translate('Giới thiệu') ;?></li>
		</ul><!--.breadcrumb-->					
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1><?php echo translate('Giới thiệu');?></h1>
		</div><!--/.page-header-->

		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'informations-form',
					'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'name'),
					'htmlOptions'=>array('class'=>'form-horizontal','enctype'=>'multipart/form-data'),
					
				)); ?>
				<div class="control-group">
					<div class="controls">
						<img src="<?php echo getImage($model->image, 100, 100); ?>"/>
					</div>
				</div>
				<div class="control-group">
					<?php echo $form->labelEx($model,'image',array('class'=>'control-label')); ?>
					<div class="controls">
							<?php echo $form->fileField($model,'image',array('id'=>'id-input-file-1')); ?>
							<?php echo $form->error($model,'image'); ?>									
					</div>
				</div>	
				<div class="control-group">
					<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textArea($model,'name',array('class'=>'span12','style'=>'height:80px')); ?>
						<?php echo $form->error($model,'name'); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $form->labelEx($model,'description',array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textArea($model,'description',array('class'=>'ckeditor')); ?>
						<?php echo $form->error($model,'description'); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $form->labelEx($model,'content',array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textArea($model,'content',array('class'=>'ckeditor')); ?>
						<?php echo $form->error($model,'content'); ?>
					</div>
				</div>
				<div class="form-actions">
					<button class="btn btn-primary" type="submit">
						<i class="icon-ok bigger-110"></i>
						<?php echo translate('Cập nhật');?>
					</button>

					&nbsp; &nbsp; &nbsp;
					<button type="button" onclick="location.href='<?php echo PIUrl::createUrl('/admin');?>'" class="btn" >
						<i class="icon-undo bigger-110"></i>
						<?php echo translate('Hủy');?>
					</button>
				</div>
				<?php $this->endWidget(); ?>
				<div class="hr hr-double dotted"></div>
			</div>
		</div>
	</div>
</div>
<script>
	$("#informations-form").submit(function(){
		$('button[type=submit]', this).attr('disabled', 'disabled');
	});
</script>