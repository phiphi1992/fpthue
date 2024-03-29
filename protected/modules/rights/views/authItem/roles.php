<style>.pagination{margin:0}</style>
<section class="panel">
	<header class="panel-heading"> <?php echo Rights::t('core', 'Quản lý vai trò'); ?>
	<?php echo CHtml::link(Rights::t('core', 'Create a new role'), array('authItem/create', 'type'=>CAuthItem::TYPE_ROLE), array(
	   	'class'=>'add-role-link btn btn-default',
	)); ?>
	</header>
	<div class="panel-body">
		<div class="adv-table">
			<div class="alert alert-warning fade in" style="margin-bottom: 0;">
				<?php echo Rights::t('core', 'A role is group of permissions to perform a variety of tasks and operations, for example the authenticated user.'); ?><br />
				<?php echo Rights::t('core', 'Roles exist at the top of the authorization hierarchy and can therefore inherit from other roles, tasks and/or operations.'); ?>
            </div>
			<?php $this->widget('bootstrap.widgets.TbGridView', array(
				    'dataProvider'=>$dataProvider,
				    'template'=>'{items}',
				    'emptyText'=>Rights::t('core', 'No roles found.'),
				    'htmlOptions'=>array('class'=>'grid-view role-table'),
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
			    			'value'=>'$data->getDeleteRoleLink()',
			    		),
				    )
				)); ?>

			</div>
			<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>
	  </div>
</section>
