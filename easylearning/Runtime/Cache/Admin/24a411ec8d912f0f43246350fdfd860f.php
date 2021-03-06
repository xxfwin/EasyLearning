<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo C('COMM_TITLE');?></title>

		<meta name="description" content="pingan wechat platform" />
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
		<link rel="stylesheet" href="/moodle/easylearning/Public/admin/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/moodle/easylearning/Public/admin/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="/moodle/easylearning/Public/admin/js/ace-extra.min.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
		<link href="/moodle/easylearning/Public/admin/css/validator.css" rel="stylesheet" type="text/css" />
		<script src="/moodle/easylearning/Public/admin/js/formValidatorRegex.js" type="text/javascript"></script>
		<script src="/moodle/easylearning/Public/admin/js/formValidator-4.0.1.js" type="text/javascript"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/moodle/easylearning/Public/admin/js/html5shiv.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/respond.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="/moodle/easylearning/Public/admin/css/jquery.datetimepicker.css" />
		<script src="/moodle/easylearning/Public/admin/js/jquery.datetimepicker1.js"></script>
		<script src="/moodle/easylearning/Public/admin/layer/layer.js" type="text/javascript"></script>
		<script src="/moodle/easylearning/Public/kindeditor/kindeditor.js"></script>  
	     <script charset="utf-8" src="/moodle/easylearning/Public/kindeditor/lang/zh-CN.js"></script>
		<script>
       KindEditor.ready(function(K) {
                window.editor = K.create('#desc',{
							    width : '700px',
							     height : '350px'
							}
	                	);
        });
</script>
		
	</head>

	<body>
		<div class="navbar navbar-default " id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container visible-lg" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							<?php echo C('COMM_TITLE');?>
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->
				
				
				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!-- <img class="nav-user-photo" src="/moodle/easylearning/Public/admin/avatars/user.jpg" alt="Jason's Photo" /> -->
								<span class="user-info">
									<small>欢迎,</small>
									<?php echo (session('name')); ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>
							

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!-- <li> -->
									<!-- <a href="<?php echo U('UserInfo/index');?>"> -->
										<!-- <i class="icon-cog"></i> -->
										<!-- 修改信息 -->
									<!-- </a> -->
								<!-- </li> -->

								<!-- <li> -->
									<!-- <a href="<?php echo U('UserInfo/pass');?>"> -->
										<!-- <i class="icon-user"></i> -->
										<!-- 修改密码 -->
									<!-- </a> -->
								<!-- </li> -->

								<!-- <li class="divider"></li> -->
								
								<li>
									<a href="/moodle">
										<i class="icon-cog"></i>
										返回Moodle
									</a>
								</li>
								<li>
									<a href="<?php echo U('Notecart/shop');?>">
										<i class="icon-cog"></i>
										笔记购物车
									</a>
								</li>
								<li>
									<a href="<?php echo U('Login/logout');?>">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>