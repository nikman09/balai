<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	<link rel="icon" href="assets/images/favicon.ico">
	<title>Gadgetmart | Login</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/neon-core.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/neon-theme.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/neon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/font-icons/font-awesome/css/font-awesome.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/custom.css">
	<script src="<?php echo base_url() ?>assets/back-end/js/jquery-1.11.3.min.js"></script>
	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
	.login-page .login-header.login-caret::after{
		position: absolute;
		content: '';
		left: 50%;
		bottom: 0;
		margin-left: -12.5px;
		width: 0px;
		height: 0px;
		border-style: solid;
		border-width: 13px 12.5px 0 12.5px;
		border-color: #373e4a transparent transparent transparent;
		bottom: -13px;
		-moz-transition: all 550ms ease-in-out;
		-webkit-transition: all 550ms ease-in-out;
		-o-transition: all 550ms ease-in-out;
		transition: all 550ms ease-in-out;
	}
	</style>
	<style>
	.g-recaptcha {
		transform:scale(0.8);
		transform-origin:0 0;
	}
	</style>
</head>
<body class="page-body login-page login-form-fall">
	<!-- This is needed when you send requests via Ajax -->
	<script type="text/javascript">
		var baseurl = '';
	</script>
	<div class="login-container">
		<div class="login-header login-caret" style="padding-top:10px;padding-bottom:20px">
			<div class="login-content">
				<a href="index.html" class="logo">
					<h2 style="color:#f7f7f7">Gadgetmart</h2>
					<!--img src="<?php echo base_url() ?>assets/back-end/images/logogadget.png" width="120" alt="" -->
				</a>
				<p class="description" style="color:#f7f7f7">Login Data Costumer</p>
				<!-- progress bar indicator -->
			</div>
		</div>
		<div class="login-progressbar">
			<div></div>
		</div>
		<div class="login-progressbar">
			<div></div>
		</div>
		<div class="login-form" >
			<div class="login-content">
			
				<form method="post" role="form" id="form_login" class="validate" action="<?php echo base_url() ?>costumer/login<?php if (isset($_GET['m'])) echo "?m=".$_GET['m'].""; ?>">
				<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
					<div class="">
					<?php 
					if (isset($gagal))
						pesanvar($gagal,"username atau password yang dimasukkan salah","username atau password yang dimasukkan salah","Klik CAPTCHA untuk verifikasi login") ?>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>
								<input type="text" class="form-control" name="username" id="username"  placeholder="Username" autocomplete="off" value="<?php echo set_value('username'); ?>"
								/>
							</div>
							
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-lock"></i>
								</div>
								<input type="password" class="form-control" name="password" id="password" placeholder="Password"  value="<?php echo set_value('password'); ?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block btn-login">
								<i class="entypo-right-open-mini"></i>
								Login
							</button>
						</div>
						
					</div>
				</form>
				<div class="login-bottom-links">
					<a href="#">Gadgetmart</a> -
					<a href="#"><?php echo date("Y") ?></a>
				</div>
			</div>
		</div>
	</div>
	<!-- Bottom scripts (common) -->

	<script src="<?php echo base_url() ?>assets/back-end/js/gsap/TweenMax.min.js"></script>
	<script src="<?php echo base_url() ?>assets/back-end/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?php echo base_url() ?>assets/back-end/js/bootstrap.js"></script>
	<script src="<?php echo base_url() ?>assets/back-end/js/joinable.js"></script>
	<script src="<?php echo base_url() ?>assets/back-end/js/resizeable.js"></script>
	<script src="<?php echo base_url() ?>assets/back-end/js/neon-api.js"></script>
	<script src="<?php echo base_url() ?>assets/back-end/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url() ?>assets/back-end/js/neon-login.js"></script>
	<script>
	var neonRegister = neonRegister || {};
	(function($, window, undefined)
	{
		"use strict";
		$(document).ready(function()
		{
			neonRegister.$container = $("#form_login");	
			neonRegister.$container.validate({
				rules: {
					username: {
						required: true,
					},
					password: {
						required: true,
						minlength: 6
					},
					
				},
				messages: {
					username: {
						required: 'Username harus diisi'
					},
					password: {
						required: 'password harus diisi',
						minlength: 'Panjang karakter minimal 6 karakter.'
					}
				},
				highlight: function(element) {
					$(element).closest('.input-group').addClass('validate-has-error');
				},
				unhighlight: function(element)
				{
					$(element).closest('.input-group').removeClass('validate-has-error');
				},
			});
			// Login Form Setup
			neonRegister.$body = $(".login-page");
			neonRegister.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
			neonRegister.$login_progressbar = neonRegister.$body.find(".login-progressbar div");
			neonRegister.$login_progressbar_indicator.html('0%');
			if(neonRegister.$body.hasClass('login-form-fall'))
			{
				var focus_set = false;
				setTimeout(function(){ 
					neonRegister.$body.addClass('login-form-fall-init')
					setTimeout(function()
					{
						if( !focus_set)
						{
							neonRegister.$container.find('input:first').focus();
							focus_set = true;
						}
					}, 550);
				}, 0);
			}
			else
			{
				neonRegister.$container.find('input:first').focus();
			}
			// Functions
		});
	})(jQuery, window);
	</script>

	<script src="<?php echo base_url() ?>assets/back-end/js/jquery.inputmask.bundle.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/select2/select2.css">
	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url() ?>assets/back-end/js/neon-custom.js"></script>
	<script src="<?php echo base_url() ?>assets/back-end/js/select2/select2.min.js"></script>
	<!-- Demo Settings -->
	<script src="<?php echo base_url() ?>assets/back-end/js/neon-demo.js"></script>
	
</body>

</html>
