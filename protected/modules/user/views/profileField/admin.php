<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Manage'),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('profile-field-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>
<ul class="breadcrumb" id="breadcrumb">
	<li><span class="badge badge-success"><strong><?php echo UserModule::t('Manage Profile Fields'); ?></strong></span></li>
</ul>

<p><?php echo UserModule::t("You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?></p>

<?php echo CHtml::link(UserModule::t('Advanced Search'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'profile-field-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table-default items table table-striped table-bordered',
	'columns'=>array(
		array(
			'name' => 'id',
			'type'=>'raw',
			'value' => '$data->id',
			'htmlOptions'=>array('style'=>'width:50px')
		),
		array(
			'name'=>'varname',
			'type'=>'raw',
			'value'=>'UHtml::markSearch($data,"varname")',
		),
		array(
			'name'=>'title',
			'value'=>'UserModule::t($data->title)',
		),
		array(
			'name'=>'field_type',
			'value'=>'$data->field_type',
			'filter'=>ProfileField::itemAlias("field_type"),
		),
		'field_size',
		//'field_size_min',
		array(
			'name'=>'required',
			'value'=>'ProfileField::itemAlias("required",$data->required)',
			'filter'=>ProfileField::itemAlias("required"),
		),
		//'match',
		//'range',
		//'error_message',
		//'other_validator',
		//'default',
		'position',
		array(
			'name'=>'visible',
			'value'=>'ProfileField::itemAlias("visible",$data->visible)',
			'filter'=>ProfileField::itemAlias("visible"),
		),
		//*/
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width:55px')
		),
	),
)); ?>
