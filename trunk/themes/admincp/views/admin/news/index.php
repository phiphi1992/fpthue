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
			<li class="active"><?php echo $catalog->name;?></li>
		</ul>
	</div>
	<div class="page-content">
		<div class="page-header position-relative">
			<h1><?php echo $catalog->name;?></h1>
		</div><!--/.page-header-->
		<?php $id = (isset($_GET['id'])) ? $_GET['id'] : null; ?>
		<div class="row-fluid">
			<div class="span12">
			<a href="<?php echo PIUrl::createUrl('/admin/news/create/', array('id'=>$id));?>" class="btn btn-primary">
				<i class="icon-ok bigger-110"></i>
				<?php echo translate('Thêm bài viết');?>
			</a>
			<a href="<?php echo PIUrl::createUrl('admin/categoriesNews/update', array('id'=>$id));?>" class="btn btn-purple">
				<i class="icon-ok bigger-110"></i>
				<?php echo translate('Cập nhật từ khóa');?>
			</a>
			
			<form method="post">
				<!--PAGE CONTENT BEGINS-->
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'news-grid',
					'dataProvider'=>$model->search($id),
					'filter'=>$model,
					'htmlOptions'=>array(),
					'itemsCssClass'=>'table table-striped table-bordered table-hover',
					'emptyText' => 'Không có kết quả hiển thị',
					'selectableRows' => 2,
					'summaryText' => 'Hiển thị {start} - {end} của {count} kết quả ',
					'columns'=>array(	
						array(
							'id' => 'id',
							'class' => 'CCheckBoxColumn',
						),
						array(
							'header'=>'STT',
							'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
						),
						'name',
						'image'=>array(
							'name' => 'image',
							'type'=>'raw',
							'filter'=>false,
							'value'=>'CHtml::image(getImage($data->image,"80", "60" ))',
							'htmlOptions'=> array("class"=>"image"),
						),
						'created'=>array(
							'name'=>'created',
							'type'=>'raw',
							'filter'=>false,
							'value'=>'date(Yii::app()->params["date"],$data->created)',

						),
						array(
							'header' => '<input type="button" name="deleteAll" class="deleteAll btn btn-mini btn-danger icon-trash bigger-120" value="Xóa" />',
 							'class'=>'CButtonColumn',
							'template' => '{update}{delete}',
							'buttons'  => array(
								'update' => array(
									'options'=>array('class'=>'btn btn-mini btn-info icon-edit bigger-120','title'=>'Sửa bài viết' ),																							
									'imageUrl' => false,
									'label'=>false,
								),
								'delete' => array(
									'label'=>false,
									'options'=>array('class'=>'btn btn-mini btn-danger icon-trash bigger-120','title'=>'Xóa bài viết' ),
									'imageUrl' => false,
								),						
							 ),
							'deleteConfirmation'=>'Bạn có muốn xóa tin tức này không?',
						),	
					),
				)); ?>
			</form>	
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->
<style>
.grid-view .filters input, .grid-view .filters select {
    width: 92%;
}
.image img{
	width:80px;
	height:60px;
}
.btn-info{margin-right:3px;}
input[type="checkbox"]{opacity:1;}
.select-on-check-all{ margin-top:-7.3px !important; }
</style>
<script>
	$("document").ready(function(){
		$(".deleteAll").live('click', function(){
			var arrIdNew = $("#news-grid").yiiGridView('getSelection');
			if(arrIdNew != ""){
				var answer = confirm ("Bạn có muốn xóa các danh mục tin tức được chọn không?");
				if(answer){
					var arrIdNew = $("#news-grid").yiiGridView('getSelection');
					var url = '<?php echo PIUrl::createUrl("/admin/news/deleteAll/id");?>';
					url+='/'+arrIdNew;
					window.location.href = url;
				}
			}
		});
	})
</script>