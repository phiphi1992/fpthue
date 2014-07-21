<!DOCTYPE HTML>
<html>
<?php $this->renderPartial('//common/header');?>
<style>
.errorMessage{color:red;}
</style>
<body class="login-layout" style="background: #fff;">
	<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center" style="margin-top:30px;">
									<img src = "<?php echo Yii::app()->theme->baseUrl;?>/assets/img/viettel_logo.png" />
								</div>
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border" style="padding: 2px;background-color: #ccc;">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-coffee green"></i>
													Đăng nhập hệ thống
												</h4>

												<div class="space-6"></div>

												<?php echo CHtml::beginForm('','post',array('class'=>'form-signin')); ?>
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<?php echo CHtml::activeTextField($model,'username',array('class'=>'form-control user-name span12','placeholder'=>'Tên đăng nhập','autofocus'=>'true')) ?>
																<i class="icon-user"></i>
															</span>
														<?php echo CHtml::error($model,'username'); ?>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<?php echo CHtml::activePasswordField($model,'password',array('class'=>'form-control user-pass span12','placeholder'=>'Mật khẩu')) ?>
																<i class="icon-lock"></i>
															</span>
															<?php echo CHtml::error($model,'password'); ?>
														</label>

														<div class="space"></div>

														<div class="clearfix">
															<label class="inline">
																<?php echo CHtml::activeCheckBox($model,'rememberMe',array('class'=>'rem_me')); ?>
																<span class="lbl"> Ghi nhớ tài khoản</span>
															</label>

															<button type="submit" class="width-35 pull-right btn btn-small btn-primary">
																<i class="icon-key"></i>
																Đăng nhập
															</button>
														</div>

														<div class="space-4"></div>
													</fieldset>
												<?php echo CHtml::endForm(); ?>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/login-box-->
											<div class="toolbar center">
												<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													Back to login
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/forgot-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div>
</body>
<script type="text/javascript">
	function show_box(id) {
		$('.widget-box.visible').removeClass('visible');
		 $('#'+id).addClass('visible');
	}
</script>
<?php
$form = new CForm(array(
	'elements'=>array(
		'username'=>array(
			'type'=>'text',
			'maxlength'=>32,
		),
		'password'=>array(
			'type'=>'password',
			'maxlength'=>32,
		),
		'rememberMe'=>array(
			'type'=>'checkbox',
		)
	),

	'buttons'=>array(
		'login'=>array(
			'type'=>'submit',
			'label'=>'Login',
		),
	),
), $model);
?>