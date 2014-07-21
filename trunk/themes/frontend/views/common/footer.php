<!--=== Footer ===-->
<div class="footer">
	<div class="container">
		<div class="row-fluid">
			<div class="span10">
				<p>2013 &copy; VIETTELHUE. ALL Rights Reserved.
			</div>
			<div class="span2">	
				<p>Thiết kế bởi <a href="qtmax.com">QTMax</a></p>
			</div>
		</div>
	</div>
</div>
<!--=== End Footer ===-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<!--JS Google Map-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/gmap/gmap.js"></script>
<!--End JS Google Map-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/app.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/pages/index.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/js/pages/contact.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		App.init();
		App.initSliders();
		Index.initRevolutionSlider(); 
		Contact.initMap();  
    });
</script>
<!--[if lt IE 9]>
    <script src="assets/js/respond.js"></script>
<![endif]-->
<!-- Like box -->
<script type="text/javascript">
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=1412745882340898&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>