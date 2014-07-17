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
				<?php echo translate('Tổng quan');?>
			</h1>
		</div>
	</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<!--PAGE CONTENT BEGINS-->
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'facilities-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title1'),
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
						<?php echo $form->labelEx($model,'title1',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'title1',array('placeholder'=>'Tiêu đề 1','class'=>'span12')); ?>
							<?php echo $form->error($model,'title1'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'content1',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'content1',array('placeholder'=>'Nội dung 1','class'=>'span12')); ?>
							<?php echo $form->error($model,'content1'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'content2',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'content2',array('placeholder'=>'Nội dung 2','class'=>'span12')); ?>
							<?php echo $form->error($model,'content2'); ?>
						</div>
					</div>
					<div class="page-content">
						<div class="page-header position-relative">
							<h1>
								<?php echo translate('Cơ sở 1');?>
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
						<?php echo $form->labelEx($model,'title2',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'title2',array('placeholder'=>'Tiêu đề 2','class'=>'span12')); ?>
							<?php echo $form->error($model,'title2'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'content3',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'content3',array('placeholder'=>'Số phòng','class'=>'span12')); ?>
							<?php echo $form->error($model,'content3'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'content4',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'content4',array('placeholder'=>'Số sân chơi','class'=>'span12')); ?>
							<?php echo $form->error($model,'content4'); ?>
						</div>
					</div>
					<div class="page-content">
						<div class="page-header position-relative">
							<h1>
								<?php echo translate('Cơ sở 2');?>
							</h1>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<img src="<?php echo PIUrl::createUrl('/upload/images/'.$model->image3);?>"/>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'image3',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->fileField($model,'image3',array('id'=>'id-input-file-1', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'image3'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'title3',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'title3',array('placeholder'=>'Tiêu đề 3','class'=>'span12')); ?>
							<?php echo $form->error($model,'title3'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'content5',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'content5',array('placeholder'=>'Số phòng','class'=>'span12')); ?>
							<?php echo $form->error($model,'content5'); ?>
						</div>
					</div>
					<div class="control-group">
						<?php echo $form->labelEx($model,'content6',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'content6',array('placeholder'=>'Số sân chơi','class'=>'span12')); ?>
							<?php echo $form->error($model,'content6'); ?>
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
	$("#facilities-form").submit(function(){
		$("#submitForm").attr("disabled", true);
	});
</script>
</div><!--/.main-content-->