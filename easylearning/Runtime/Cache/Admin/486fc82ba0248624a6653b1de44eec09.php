<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>

	<style type="text/css">
		
		.onShow{
			height:30px;display:block;float:right;margin-right:335px;width:140px
		}
		.onError{
			height:30px;display:block;float:right;margin-right:335px;width:140px
		}
		.onFocus{
			height:30px;display:block;float:right;margin-right:335px;width:140px
		}
		.onCorrect{
			height:30px;display:block;float:right;margin-right:335px;width:140px
		}

	</style>	
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<?php echo W('TopBar/leftbar');?>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">首页</a>
							</li>

							<li>
								<a href="<?php echo U('Admin/index');?>">管理员列表</a>
							</li>
							<li class="active">添加管理员</li>
						</ul><!-- .breadcrumb -->

						
					</div>

					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed " href="<?php echo U('Admin/index');?>">
							返回列表</a>
							
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" action="" method="post" id="myform">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员名称： </label>

										<div class="col-sm-9">
											<input type="text" id="username" placeholder="管理员名称" class="col-xs-5" name="username"  value="<?php echo ($info["username"]); ?>" disabled="disabled" />
											 
										</div>
									</div>

									<div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 密码： </label>

										<div class="col-sm-9">
											<input type="password" id="password"  placeholder="最少六位密码" class="col-xs-5"  name="password" />
											 <span class='onShow'  id="passwordTip"></span>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 重复密码： </label>

										<div class="col-sm-9">
											<input type="password"  placeholder="最少六位重复密码" class="col-xs-5"  name="repass" id="repass" />
											 <span class='onShow'  id="repassTip"></span>
										</div>
									</div>
									

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
										   <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>

											
										</div>
									</div>

								

									
								</form>

								

							
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
	<!-- basic scripts -->

		<!--[if !IE]> -->

		

		<!-- <![endif]-->

		<!--[if IE]>

<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Public/admin/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/Public/admin/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/Public/admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/Public/admin/js/bootstrap.min.js"></script>
		<script src="/Public/admin/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="/Public/admin/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="/Public/admin/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/Public/admin/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/Public/admin/js/jquery.slimscroll.min.js"></script>
		<script src="/Public/admin/js/jquery.easy-pie-chart.min.js"></script>
		<script src="/Public/admin/js/jquery.sparkline.min.js"></script>
		<script src="/Public/admin/js/flot/jquery.flot.min.js"></script>
		<script src="/Public/admin/js/flot/jquery.flot.pie.min.js"></script>
		<script src="/Public/admin/js/flot/jquery.flot.resize.min.js"></script>


		<!-- page specific plugin scripts -->

		<script src="/Public/admin/js/jquery.dataTables.min.js"></script>
		<script src="/Public/admin/js/jquery.dataTables.bootstrap.js"></script>

		<!-- ace scripts -->

		<script src="/Public/admin/js/ace-elements.min.js"></script>
		<script src="/Public/admin/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

	
	</body>
</html>

<script type="text/javascript">
$(function(){
	$.formValidator.initConfig({formID:"myform",debug:false,submitOnce:true
		
	});
	
	$("#password").formValidator({onShow:"填写密码",onFocus:"填写6位以上密码",onCorrect:"密码已经输入"}).inputValidator({min:6,onError:"填写6位以上密码"}).defaultPassed();
	
	$("#repass").formValidator({onShow:"再次输入密码",onFocus:"至少6个长度",onCorrect:"密码一致"}).inputValidator({min:1,empty:{leftEmpty:false,rightEmpty:false},onError:"重复密码不能为空"}).compareValidator({desID:"password",operateor:"=",onError:"2次密码不一致"});
	
   
});
</script>