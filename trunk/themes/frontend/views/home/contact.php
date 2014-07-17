<?php $this->renderPartial('//common/header'); ?>
<div class="content-container">
	<div class="page-contact">
		<!-- BOX COMMON INTRODUCE -->
		<div class="wrap-box">
			<div class="img-decoration decoration-01 decoration-top-left"></div>
			<div class="img-decoration decoration-02 decoration-top-right"></div>
			<div class="wrap-title">
				<div class="inner">
					<h1 class="title">Liên hệ</h1>
				</div>
			</div>
			<div class="box">
				<div id="map"></div>
			</div>
		</div>
		<form action="./" class="form-contact">
			<div class="form-group">
				<label for="inputRealName">Tên của bạn <span class="force">*</span></label>
				<input type="text" name="name" id="inputRealName" class="form-control">
			</div>
			<div class="form-group">
				<label for="inputEmail">Địa chỉ mail của bạn <span class="force">*</span></label>
				<input type="text" name="email" id="inputEmail" class="form-control">
			</div>
			<div class="form-group">
				<label for="inputSubject">Tiêu đề <span class="force">*</span></label>
				<input type="text" name="subject" id="inputSubject" class="form-control">
			</div>
			<div class="form-group form-full">
				<label for="inputContent">Nội dung <span class="force">*</span></label>
				<textarea id="inputContent" name="content" class="form-control" cols="30" rows="10"></textarea>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-contact"><i class="icon-ib menu-contact-hover"></i><span>Gửi</span></button>
			</div>
		</form>
	</div>
</div>
</div>
<div id="footer-container">
	<div id="footer-sprite"></div>
	<div class="footer-container">
		<div class="container">
			<div class="img-decoration footer-decoration-01 decoration-top-left"></div>
			<div class="img-decoration footer-decoration-02 decoration-top-right"></div>
			<div class="info-contact">
				<h3><?php echo $this->dataSystem->title; ?></h3>
				<p>Địa chỉ: <?php echo $this->dataSystem->address; ?></p>
				<p>Điện thoại: <?php echo $this->dataSystem->phone; ?></p>
				<p>Email: <?php echo $this->dataSystem->email; ?></p>
			</div>
			<ul class="menu-horizontal">
				<li><a href="<?php echo PIUrl::createUrl('/home/');?>" class="menu-home <?php echo (yii::app()->getController()->action->id == 'index') ? 'active' : ''; ?>"><i class="icon-ib menu-home-hover"></i><span>Trang chủ</span></a></li>
				<li><a href="<?php echo PIUrl::createUrl('/home/information');?>" class="menu-introduce <?php echo (yii::app()->getController()->action->id == 'information') ? 'active' : ''; ?>"><i class="icon-ib menu-introduce-hover"></i><span>Giới thiệu</span></a></li>
				<li><a href="<?php echo PIUrl::createUrl('/home/parents');?>" class="menu-parents <?php echo (yii::app()->getController()->action->id == 'parents') ? 'active' : ''; ?>"><i class="icon-ib menu-parents-hover"></i><span>Góc phụ huynh</span></a></li>
				<li><a href="<?php echo PIUrl::createUrl('/home/news');?>" class="menu-news <?php echo (yii::app()->getController()->action->id == 'news') ? 'active' : ''; ?>"><i class="icon-ib menu-news-hover"></i><span>Tin tức</span></a></li>
				<li><a href="<?php echo PIUrl::createUrl('/home/album');?>" class="menu-library <?php echo (yii::app()->getController()->action->id == 'album') ? 'active' : ''; ?>"><i class="icon-ib menu-library-hover"></i><span>Thư viện hình ảnh</span></a></li>
				<li><a href="<?php echo PIUrl::createUrl('/home/contact');?>" class="menu-contact <?php echo (yii::app()->getController()->action->id == 'contact') ? 'active' : ''; ?>"><i class="icon-ib menu-contact-hover"></i><span>Liên hệ</span></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="wrap-copyright">
			<div class="container">
				<p class="copyright">Copyright © 2014 Trường mầm non Bảo Ngọc. <span>All rights reserved</span></p>
				<p class="designby">Designed by <a href="javascript:void(0)">Kovo.vn</a></p>
			</div>
		</div>
	</div>
</div>
</div>
<script>
	function ValidateEmail(mail)   
	{  
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
	  {  
		return true;  
	  }  else return false;
	}  

	$(document).ready(function(){
		
		// MAP
		$("#map").gmap3({
			marker: {
				address: "<?php echo $this->dataSystem->address; ?>",
				options: {
					icon: "<?php echo Yii::app()->theme->baseUrl;?>/img/front/marker.png"
				}
			},
			map: {
				options: {
					zoom: 16,
					scrollwheel: false,
					draggable: true
				}
			}
		});
	
		$(".form-contact").submit(function(){
			i=0;
			var error = true;
			$(".form-contact .form-control").each(function(){
				i++;
				if(i==2 && $(this).val()!=""){
					if(ValidateEmail($(this).val()) == false){
						$(this).parent().find(".force").html("* không hợp lệ");
						$(this).parent().find(".force").attr("class", "force error");
						error = false;
					}else{
						$(this).parent().find(".force").html("*");
						$(this).parent().find(".force").attr("class", "force");
					}
				}else{
					if($(this).val() == ""){
						$(this).parent().find(".force").html("* không được trống");
						$(this).parent().find(".force").attr("class", "force error");
						error = false;
					}else{
						$(this).parent().find(".force").html("*");
						$(this).parent().find(".force").attr("class", "force");
					}
				}
			});
			if(error == true){
				var data = $('form').serialize();
				$.ajax({url: webroot +"/home/contact/",data:data,type:'post',
					success:function(result){
						if(result == true){
							alert("Gửi thông tin thành công!");
							$(".form-contact .form-control").each(function(){
								$(this).val("");
							})
						}
					}
				});
			};
			return false;
		});
	});
</script>
<style>
	.error{color:red;}
</style>
<!-- FOOTER CONTAINER -->
<?php $this->renderPartial('//common/footer'); ?>