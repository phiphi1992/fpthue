<style>.pagination{margin:0}</style>
<section class="panel">
	<header class="panel-heading"> <?php echo Rights::t('core', 'Quản lý nhiệm vụ'); ?>
	<?php echo CHtml::link(Rights::t('core', 'Create a new task'), array('authItem/create', 'type'=>CAuthItem::TYPE_TASK), array(
		'class'=>'add-task-link btn btn-default',
	)); ?>
	</header>
	<div class="panel-body">
		<div class="adv-table">
			<div class="alert alert-warning fade in" style="margin-bottom: 0;">
				<?php echo Rights::t('core', 'A task is a permission to perform multiple operations, for example accessing a group of controller action.'); ?><br />
				<?php echo Rights::t('core', 'Tasks exist below roles in the authorization hierarchy and can therefore only inherit from other tasks and/or operations.'); ?>
            </div>
			<?php $this->widget('bootstrap.widgets.TbGridView', array(
				    'dataProvider'=>$dataProvider,
				    'template'=>'{items}',
				    'emptyText'=>Rights::t('core', 'No tasks found.'),
				    'htmlOptions'=>array('class'=>'grid-view task-table'),
					'itemsCssClass' => 'table-default items table table-striped table-bordered',
				    'columns'=>array(
			    		array(
			    			'name'=>'name',
			    			'header'=>Rights::t('core', 'Name'),
			    			'type'=>'raw',
			    			'htmlOptions'=>array('class'=>'name-column'),
			    			'value'=>'$data->getGridNameLink()',
			    		),
			    		array(
			    			'name'=>'description',
			    			'header'=>Rights::t('core', 'Description'),
			    			'type'=>'raw',
			    			'htmlOptions'=>array('class'=>'description-column'),
			    		),
			    		array(
			    			'name'=>'bizRule',
			    			'header'=>Rights::t('core', 'Business rule'),
			    			'type'=>'raw',
			    			'htmlOptions'=>array('class'=>'bizrule-column'),
			    			'visible'=>Rights::module()->enableBizRule===true,
			    		),
			    		array(
			    			'name'=>'data',
			    			'header'=>Rights::t('core', 'Data'),
			    			'type'=>'raw',
			    			'htmlOptions'=>array('class'=>'data-column'),
			    			'visible'=>Rights::module()->enableBizRuleData===true,
			    		),
			    		array(
			    			'header'=>'&nbsp;',
			    			'type'=>'raw',
			    			'htmlOptions'=>array('class'=>'actions-column'),
			    			'value'=>'$data->getDeleteTaskLink()',
			    		),
				    )
				)); ?>

			</div>
			<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>
	  </div>
</section>