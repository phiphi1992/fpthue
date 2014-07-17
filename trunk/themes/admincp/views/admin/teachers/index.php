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
			<li class="active"><?php echo translate('Đội ngũ giáo viên');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Ban giám hiệu');?>
			</h1>
		</div>
	</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'teachers-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'administrators'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					<div class="control-group">
						<div class="controls">
							<img src="<?php echo PIUrl::createUrl('/upload/images/'.$model->image1);?>"/>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'image1',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->fileField($model,'image1',array('id'=>'id-input-file-1', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'image1'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'administrators',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'administrators',array('placeholder'=>'Ban giám hiệu','class'=>'span12')); ?>
							<?php echo $form->error($model,'administrators'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'total',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'total',array('placeholder'=>'Gồm','class'=>'span12')); ?>
							<?php echo $form->error($model,'total'); ?>
						</div>
					</div>
	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Đội ngũ giáo viên');?>
			</h1>
		</div>
	</div>
					<div class="control-group">
						<div class="controls">
							<img src="<?php echo PIUrl::createUrl('/upload/images/'.$model->image2);?>"/>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'image2',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->fileField($model,'image2',array('id'=>'id-input-file-1', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'image2'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'teacher',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'teacher',array('placeholder'=>'Giáo viên', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'teacher'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'support',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'support',array('placeholder'=>'Cấp dưỡng', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'support'); ?>
						</div>
					</div>

					<div class="control-group">
						<?php echo $form->labelEx($model,'staff',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'staff',array('placeholder'=>'Nhân viên tạp vụ', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'staff'); ?>
						</div>
					</div>

					<div class="control-group">
						<?php echo $form->labelEx($model,'protection',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'protection',array('placeholder'=>'Bảo vệ', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'protection'); ?>
						</div>
					</div>
					<div class="form-actions">
						<button id="submitForm" class="btn btn-primary" type="submit">
							<i class="icon-ok bigger-110"></i>
							<?php echo translate('Cập nhật');?>
						</button>

						&nbsp; &nbsp; &nbsp;
						<button type="button" onclick="location.href='<?php echo PIUrl::createUrl('/admin');?>'" class="btn " >
							<i class="icon-undo bigger-110"></i>
							<?php echo translate('hủy');?>
						</button>
					</div>
				<?php $this->endWidget(); ?>
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<script>
	$("#teachers-form").submit(function(){
		$("#submitForm").attr("disabled", true);
	});
</script>
</div><!--/.main-content-->