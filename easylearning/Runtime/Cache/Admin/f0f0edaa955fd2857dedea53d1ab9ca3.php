<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo C('COMM_TITLE');?>|登录</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="/moodle/easylearning/Public/admin/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/moodle/easylearning/Public/admin/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="/moodle/easylearning/Public/admin/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		

		<!-- ace styles -->

		<link rel="stylesheet" href="/moodle/easylearning/Public/admin/css/ace.min.css" />
		<link rel="stylesheet" href="/moodle/easylearning/Public/admin/css/ace-rtl.min.css" />
		<script src='/moodle/easylearning/Public/admin/js/jquery-1.10.2.min.js'></script>
		<script charset="utf-8" src="/moodle/easylearning/Public/admin/layer/layer.js"></script>

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/moodle/easylearning/Public/admin/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/moodle/easylearning/Public/admin/js/html5shiv.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.input-icon>input {
				padding-left: 35px;
				padding-right: 6px;
			}
			
		</style>
	</head>

	<body class="login-layout" style="background:#6fb3e0">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<small>
							<i class="icon-leaf"></i>
							
						</small>
						<span class="white"><?php echo C('COMM_TITLE');?></span>
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												请输入您的账号和密码
											</h4>

											<div class="space-6"></div>

											<form  id="loginform" class="form-vertical login-form" action="<?php echo U('Login/relogin');?>" method="post" onsubmit="return checkform()">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
														<i class="icon-user"></i>
														<input type="text" class="form-control" placeholder="账户" name="name" id="name"  onblur="return checkName()" 
														value=""/>
															
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
														<i class="icon-lock"></i>
															<input type="password" class="form-control" placeholder="密码" name="password" id="pass" />
															
														</span>
													</label>
													<label class="block clearfix">
														<div class="block input-icon input-icon-left">
														<i class="icon-picture"></i>
															<input type="text" class="form-control" style="width:180px;display: inline" placeholder="验证码" name="verify" id="verifys"/>
															<img style="width:100px" src="<?php echo U('Login/verify');?>" id="verify"  style="cursor: pointer;"/> 
															
														</div>
													</label>
													<div class="space"></div>

													<div class="clearfix">
														

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															登录
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

										</div><!-- /widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="javascript:void(0)"  class="forgot-password-link">
													
												</a>
											</div>

										
										</div>
									</div><!-- /widget-body -->
								</div><!-- /login-box -->

							

							
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->


		<!-- <![endif]-->

	

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/moodle/easylearning/Public/admin/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/moodle/easylearning/Public/admin/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		
		<!-- inline scripts related to this page -->

		<script type="text/javascript">
		 function checkform(){
		 	var name=$("#name").val();
		 	var pass=$("#pass").val();
		 	var verify=$("#verifys").val();
		 	if(name==''){
		 		layer.alert('用户名不能为空', {icon: 5});
		 		return false;
		 	}else if(pass==''){
		 		layer.alert('密码不能为空', {icon: 5});
		 		return false;
		 	}else if(verify==''){
		 		layer.alert('验证码不能为空', {icon: 5});
		 		return false;
		 	}else{
		 		return true;
		 	}
		 }
		 function checkName(){
		 	var name=$("#name").val();
		 	var url="<?php echo U('Login/checkName');?>";
		 	  $.ajax({
			        type:'POST',
			        url:url,
			        data:{name:name},
			        success:function(data){
			        	if(data==0){
			        		layer.alert('用户名不存在', {icon: 5});
		 					return false;
			        	}else if(data==2){
			        		layer.alert('用户名已被锁定', {icon: 5});
		 					return false;
			        	}else{
			        		return true;
			        	}
				}
		            
		      })
		 }
		  $(function(){
		 	$("#verify").click(function(){
		 		 var src="<?php echo U('Login/verify','','');?>";
		 		 var urlSrc=src+'/id/'+Math.random();
		 		 $(this).attr('src', urlSrc);

		 	});
		 });
		 
		</script>
	</body>
</html>