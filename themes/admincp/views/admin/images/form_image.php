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
			<li class="active"><?php echo $title;?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo $title;?>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
				<?php $form = $this->beginWidget('CActiveForm', array(
					'id'=>'news-form',
					//'enableAjaxValidation'=>true,
					'enableClientValidation'=>true,
					'focus'=>array($model,'title'),
					'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
				)); ?>
					
				
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'name',array('placeholder'=>'Tiêu đề', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'name'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'link',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->textField($model,'link',array('placeholder'=>'Liên kết', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'link'); ?>
						</div>
					</div>
					
					<div class="control-group">
						<?php echo $form->labelEx($model,'image',array('class'=>'control-label')); ?>
						<div class="controls">
							<?php echo $form->fileField($model,'image',array('id'=>'id-input-file-1', 'class'=>'span12')); ?>
							<?php echo $form->error($model,'image'); ?>
						</div>
					</div>
				

					<div class="form-actions">
						<button id="submitForm" class="btn btn-primary" type="submit">
							<i class="icon-ok bigger-110"></i>
							<?php
								if($model->isNewRecord) echo translate('Thêm'); else echo translate('Cập nhật');
							?>
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