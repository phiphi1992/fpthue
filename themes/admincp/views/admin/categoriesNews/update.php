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
			<li class="active"><?php echo translate('Danh mục tin tức');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Cập nhập danh mục bài viết');?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'categoriesnews-form',
					'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					<h4><?php echo yii::app()->user->getFlash('success'); ?></h4>
					<div class="control-group">
						<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'name',array('placeholder'=>'Tên danh mục bài viết', 'class'=>'span12','readonly'=>true)); ?>
							<?php echo $form->error($model,'name'); ?>
						</div>
					</div>

					<div class="control-group">
						<?php echo $form->labelEx($model,'title',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textArea($model,'title',array('placeholder'=>'Tiêu đề', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'title'); ?>
						</div>
					</div>

					<div class="control-group">
						<?php echo $form->labelEx($model,'keyword',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textArea($model,'keyword',array('placeholder'=>'Từ khóa', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'keyword'); ?>
						</div>
					</div>

					<div class="control-group">
						<?php echo $form->labelEx($model,'description',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textArea($model,'description',array('placeholder'=>'Mô tả từ khóa', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'description'); ?>
						</div>
					</div>

					<div class="form-actions">
						<button id="submitForm" class="btn btn-info" type="submit">
							<i class="icon-ok bigger-110"></i>
							<?php echo translate('Cập nhập');?>
						</button>

						&nbsp; &nbsp; &nbsp;
						<button type="button" onclick="location.href='<?php echo PIUrl::createUrl('/admin');?>'" class="btn" >
							<i class="icon-undo bigger-110"></i>
							<?php echo translate('hủy');?>
						</button>
					</div>
				<?php $this->endWidget(); ?>
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->
<script>
	$("#categoriesnews-form").submit(function(){
		$("#submitForm").attr("disabled", true);
	});
</script>