<div class="container">		
	<div class="row-fluid">
		<div class="span8">
            <div id="map" class="map map-box map-box-space margin-bottom-40" style="height:300px;">
            </div><!---/map-->
			<form action="default/contact/sendMail" id="formContact" method="POST">
                <label>Họ tên <span class="color-red">*</span></label></label>
                <input type="text" class="span7" name="fullName" id="fullName" />
                <label>Email <span class="color-red">*</span></label>
                <input type="text" class="span7" name="email" id="email"/>
                <label>Số điện thoại</label>
                <input type="text" class="span7" name="phone" id="phone"/>
				<label>Chủ đề <span class="color-red">*</span></label></label>
                <input type="text" class="span7" name="subject" id="subject"/>
                <label>Nội dung <span class="color-red">*</span></label></label>
                <textarea rows="8" class="span10" name="content" id="content"></textarea>
                <p><button type="text" class="btn-u sendMail">Gửi</button></p>
            </form>
        </div><!--/span9-->

        <div class="span4">
            <!-- Contacts -->
            <div class="headline"><h3>LIÊN HỆ</h3></div>
            <ul class="unstyled who margin-bottom-20">
                <li><a href="#"><i class="icon-home"></i><?php echo $arrSystem['address']?></a></li>
                <li><a href="#"><i class="icon-envelope-alt"></i><?php echo $arrSystem['email']?></a></li>
                <li><a href="#"><i class="icon-phone-sign"></i><?php echo $arrSystem['phone']?></a></li>
            </ul>

            <!-- Business Hours -->
            <div class="headline"><h3>GIỜ LÀM VIỆC</h3></div>
            <ul class="unstyled">
                <li><strong>Thứ 2- Thứ 6:</strong> 7h30 - 17h</li>
                <li><strong>Thứ 7:</strong> 7h30 - 11h30</li>
                <li><strong>Chủ nhật:</strong> Nghỉ</li>
            </ul>
        </div>
    </div>

	<?php if(!empty($arrPartner)) {?>
	<div id="clients-flexslider parter" class="flexslider home clients">
		<div class="headline"><h3>ĐỐI TÁC</h3></div>
		<ul class="slides">
			<?php foreach ($arrPartner as $partner) {?>
			<li style="display: block;">
				<a href="<?php echo $partner['link'];?>">
					<img src="<?php echo getImage($partner['image'],80,80,0)?>" alt="" /> 
					<img src="<?php echo getImage($partner['image'],80,80,0)?>" class="color-img" alt="" />
				</a>
			</li>
			<?php }?>
		</ul>
	</div>
	<?php }?>
</div>

<!--JS Google Map-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/gmap/gmap.js"></script>
<!--End JS Google Map-->
<script type="text/javascript">
$(document).ready(function() {
	Contact.initMap();
	/*Validation*/
	$('.sendMail').on('click',function(){
		$("#formContact").validate({
			rules: {
				fullName: {
					required: true,
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					number: true
				},
				subject: {
					required: true,
				},
				content: {
					required: true,
					minlength: 10
				},
			},
			messages: {
				fullName: {
					required: "Xin vui lòng nhập họ tên",
				},
				email: {
					required: "Xin vui lòng nhập email",
					email: "Xin vui lòng nhập đúng định dạng email"
				},
				phone:'Xin vui lòng nhập đúng số điện thoại',
				subject: {
					required: "Xin vui lòng nhập chủ đề",
				},
				content: {
					required: "Xin vui lòng nhập nội dung",
					minlength: "Nội dung cần có tối thiểu là 10 ký tự."
				},
			},
			submitHandler: function (form) {
				$.ajax({
					url: 	'',
					data:	form.serialize(),
					type:	form.atrr('method'),
					dataType: 'JSON',
					success: function(res){
						if(res.error != true){
							alert(res.message);
							$(".formContact input").each(function(){
								$(this).val("");
							})
							$(".formContact textarea").val('');
						}else {
							alert(res.message);
						}
					}
				});
				return false; // required to block normal submit since you used ajax
			}
		});
	});
});
</script>