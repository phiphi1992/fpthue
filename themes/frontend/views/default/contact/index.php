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

    <!-- Our Clients -->
    <div id="clients-flexslider" class="flexslider home clients">
        <div class="headline"><h3>ĐỐI TÁC</h3></div>    
        <ul class="slides">
            <li>
                <a href="#">
                    <img src="assets/img/clients/hp_grey.png" alt="" /> 
                    <img src="assets/img/clients/hp.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/igneus_grey.png" alt="" /> 
                    <img src="assets/img/clients/igneus.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/vadafone_grey.png" alt="" /> 
                    <img src="assets/img/clients/vadafone.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/walmart_grey.png" alt="" /> 
                    <img src="assets/img/clients/walmart.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/shell_grey.png" alt="" /> 
                    <img src="assets/img/clients/shell.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/natural_grey.png" alt="" /> 
                    <img src="assets/img/clients/natural.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/aztec_grey.png" alt="" /> 
                    <img src="assets/img/clients/aztec.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/gamescast_grey.png" alt="" /> 
                    <img src="assets/img/clients/gamescast.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/cisco_grey.png" alt="" /> 
                    <img src="assets/img/clients/cisco.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/everyday_grey.png" alt="" /> 
                    <img src="assets/img/clients/everyday.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/cocacola_grey.png" alt="" /> 
                    <img src="assets/img/clients/cocacola.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/spinworkx_grey.png" alt="" /> 
                    <img src="assets/img/clients/spinworkx.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/shell_grey.png" alt="" /> 
                    <img src="assets/img/clients/shell.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/natural_grey.png" alt="" /> 
                    <img src="assets/img/clients/natural.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/gamescast_grey.png" alt="" /> 
                    <img src="assets/img/clients/gamescast.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/everyday_grey.png" alt="" /> 
                    <img src="assets/img/clients/everyday.png" class="color-img" alt="" />
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/img/clients/spinworkx_grey.png" alt="" /> 
                    <img src="assets/img/clients/spinworkx.png" class="color-img" alt="" />
                </a>
            </li>
        </ul>
    </div>
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