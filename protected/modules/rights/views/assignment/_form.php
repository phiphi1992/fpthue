<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'htmlOptions' => array('class'=>'form-horizontal well')
)); ?>
	
	<div class="control-group">
		<div class="controls">
		<?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions,array('class'=>'form-control m-bot15')); ?>
		<?php echo $form->error($model, 'itemname'); ?>
		</div>
	</div>
	
	<div class="control-group buttons">
		<div class="controls">
		<?php echo CHtml::submitButton(Rights::t('core', 'Assign'),array('class'=>'btn btn-info')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div>