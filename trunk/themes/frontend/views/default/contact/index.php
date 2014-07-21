<div class="container">		
	<div class="row-fluid">
		<div class="span8">
            <div id="map" class="map map-box map-box-space margin-bottom-40" style="height:300px;">
            </div><!---/map-->
			<form action="default/contact/sendMail" id="formContact" method="POST"/>
                <label>Họ tên</label>
                <input type="text" class="span7" name="fullName" id="fullName" />
                <label>Email <span class="color-red">*</span></label>
                <input type="text" class="span7" name="email" id="email"/>
                <label>Số điện thoại</label>
                <input type="text" class="span7" name="phone" id="phone"/>
				<label>Chủ đề</label>
                <input type="text" class="span7" name="subject" id="subject"/>
                <label>Nội dung</label>
                <textarea rows="8" class="span10" name="content" id="content"></textarea>
                <p><button type="button" class="btn-u sendMail">Gửi</button></p>
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
        </div><!--/span3-->        
    </div><!--/row-fluid-->        

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
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	// validate signup submit
	$("#formContact").validate({
		rules: {
			fullName: "required",
			email: {
				required: true,
				email: true
			},
		},
		messages: {
			fullname: "Họ tên không được trống",
			email: "Email không đúng định dạng",
		}
	});
	$('.sendMail').on('click',function(e){
		alert('send');
		frm = $('#formContact');
		$.ajax({
			type: frm.attr('method'),
			url: frm.attr('action'),
			data: frm.serialize(),
			success: function(res)
			{
				alert(res);
			}
		});
		e.preventDefault();
	});
});
</script>