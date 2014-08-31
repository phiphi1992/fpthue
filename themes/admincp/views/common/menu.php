<div class="sidebar" id="sidebar">
<ul class="nav nav-list">
	<li <?php if(curCA('controller') == 'default' && curCA('action') == 'index') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin');?>">
			<i class="icon-dashboard"></i>
			<span class="menu-text"> Trang chủ </span>
		</a>
	</li>
	<li <?php if(curCA('controller') == 'system' && curCA('action') == 'index') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/system');?>">
			<i class="icon-text-width"></i>
			<span class="menu-text"> Cài đặt </span>
		</a>
	</li>
	<li <?php if(curCA('controller') == 'informations' && curCA('action') == 'index') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/informations');?>">
			<i class="icon-text-width"></i>
			<span class="menu-text"> Bài viết trang chủ </span>
		</a>
	</li>
	<!--<li <?php if(curCA('controller') == 'informations' || curCA('controller') == 'teachers' || curCA('controller') == 'facilities') echo 'class="active"'?>>
		<a href="#" class="dropdown-toggle">
			<i class="icon-list"></i>
			<span class="menu-text"> Thông tin</span>
			<b class="arrow icon-angle-down"></b>
		</a>
		<ul class="submenu">
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/informations');?>">
					<i class="icon-text"></i>
					<span class="menu-text"> Giới thiệu </span>
				</a>
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/teachers');?>">
					<i class="icon-double-angle-right"></i>
					<span class="menu-text"> Đội ngũ giáo viên </span>
				</a>
			</li>
			
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/facilities');?>">
					<i class="icon-double-angle-right"></i>
					<span class="menu-text"> Cơ sở vật chất </span>
				</a>
				
			</li>
		</ul>
	</li>-->
	<?php
		$menus = CategoriesNews::model()->findAll();
		if(!empty($menus))
		foreach($menus as $menu):
	?>
	<li <?php if(curCA('controller') == 'news' &&  curCA('action') == 'index' && $_GET['id'] == $menu->id) echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/news',array('id'=>$menu->id));?>">
			<i class="icon-edit"></i>
			<span class="menu-text"> <?php echo $menu->name;?> </span>
		</a>
	</li>
	<?php endforeach;?>
	<li <?php if(curCA('controller') == 'links' && curCA('action') == 'index') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/links/index');?>">
			<i class="icon-text-width"></i>
			<span class="menu-text"> Liên kết web </span>
		</a>
	</li>
	<li <?php if(curCA('controller') == 'support') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/support');?>">
			<i class="icon-edit"></i>
			<span class="menu-text"> Hỗ trợ trực tuyến </span>
		</a>
	</li>
	
	<li <?php if(curCA('controller') == 'images' ||  curCA('controller') == 'albums' ||  curCA('controller') == 'slides' ) echo 'class="active"'?>>
		<a href="#" class="dropdown-toggle">
			<i class="icon-picture"></i>
			<span class="menu-text"> Thư viện hình ảnh </span>
			<b class="arrow icon-angle-down"></b>
		</a>
		
		<ul class="submenu">
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/images/patner');?>">
					<i class="icon-double-angle-right"></i>
					Quản lý đối tác
				</a>
				
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/images/index');?>">
					<i class="icon-double-angle-right"></i>
					Quản lý hình ảnh
				</a>
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/images/banner/');?>" class="dropdown-toggle">
					<i class="icon-double-angle-right"></i>
					Banner phải
				</a>
			</li>
			
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/slides/');?>">
					<i class="icon-double-angle-right"></i>
					Hình ảnh trình diễn
				</a>
				
			</li>
			
		</ul>
	</li>
	<li <?php if(curCA('controller') == 'videos' && curCA('action') == 'index') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/videos');?>">
			<i class="icon-tag"></i>
			<span class="menu-text"> Videos </span>
		</a>
	</li>
	
	<li <?php if(curCA('controller') == 'comments' && curCA('action') == 'index') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/comments');?>">
			<i class="icon-edit"></i>
			<span class="menu-text"> Thư liên hệ </span>
		</a>
	</li>
	<?php if(isset($_GET['qtmax'])):?>
		<li>
			<a href="<?php echo PIUrl::createUrl('/admin/categoriesNews',array('qtmax'=>1));?>">
				<i class="icon-edit"></i>
				<span class="menu-text"> Danh mục bài viết </span>
			</a>
		</li>
	<?php endif;?>
</ul><!--/.nav-list-->

<div class="sidebar-collapse" id="sidebar-collapse">
	<i class="icon-double-angle-left"></i>
</div>
</div>
