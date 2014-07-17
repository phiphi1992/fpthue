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
			<li class="active"><?php echo translate('Danh sách banner');?></li>
		</ul>
	</div>

	<div class="page-content">
		<div class="page-header position-relative">
			<h1>
				<?php echo translate('Danh sách banner');?> <a href="<?php echo PIUrl::createUrl('/admin/images/addBanner');?>"><button class="btn btn-small btn-primary">Thêm</button></a>
			</h1>
		</div><!--/.page-header-->
		<div class="row-fluid">
			<div class="span12">
			<form method="POST" action="<?php echo PIUrl::createUrl('/admin/images/banner');?>">
				<table id="sample-table-1" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th class="center">
								<label>
									<input class="checkAll" type="checkbox" />
									<span class="lbl"></span>
								</label>
							</th>
							<th>Hình ảnh</th>
							<th>Tiêu đề</th>
							<th>Liên kết</th>
							<th>Ngày tạo</th>
							<th><input onclick="return confirm('Bạn thực sự muốn thực hiện thao tác này?');" type="submit" name="deleteAll" class="btn btn-mini btn-danger icon-trash bigger-120" value="Xóa"></th>
						</tr>
					</thead>

					<tbody>
					<?php if(!empty($model)){ foreach($model as $image):?>
						<tr>
							<td class="center">
								<label>
									<input class="checkItem" value="<?php echo $image->id?>" name="selected[]" type="checkbox" />
									<span class="lbl"></span>
								</label>
							</td>

							<td><?php echo CHtml::image(getImage($image->image,"80", "60" ));?></td>
							<td><?php echo $image->name;?></td>
							<td><?php echo $image->link;?></td>
							<td><?php echo date('d/m/Y',$image->created);?></td>

							<td>
								<div class="hidden-phone visible-desktop btn-group">
									<a href="<?php echo PIUrl::createUrl('/admin/images/editBanner',array('id'=>$image->id));?>">
									<button type="button" class="btn btn-mini btn-info">
										<i class="icon-edit bigger-120"></i>
									</button></a>
									<a onclick="return confirm('Bạn thực sự muốn xóa banner này.');" href="<?php echo PIUrl::createUrl('/admin/images/delImage',array('id'=>$image->id,'typeId'=>Images::$IMAGE_PATNER));?>">
									<button type="button" class="btn btn-mini btn-danger">
										<i class="icon-trash bigger-120"></i>
									</button>
									</a>
								</div>
							</td>
						</tr>
						<?php endforeach; }else{?>
						<tr><td colspan="6">Không có banner nào.<td></tr>
						<?php }?>
					</tbody>
				</table>
			</form>
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
</div><!--/.main-content-->
<script>
	$("document").ready(function(){
		$('.checkAll').change(function(){
			if($(this).is(':checked')){
				$('.checkItem').attr('checked',true);
			}else{
				$('.checkItem').attr('checked',false);
			}
		});
	})
</script>