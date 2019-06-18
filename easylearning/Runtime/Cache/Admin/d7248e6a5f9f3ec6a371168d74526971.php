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
								<a href="javascript:void(0)">基本设置</a>
							</li>
							<li class="active">修改信息</li>
						</ul><!-- .breadcrumb -->

						
					</div>

					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed " href="javascript:void(0)">
							修改信息</a>
							
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" action="" method="post" id="myform">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 我的昵称： </label>

										<div class="col-sm-9">
											<input type="text" id="nickname" placeholder="我的昵称" class="col-xs-5" name="nickname" value="<?php echo ($info["nickname"]); ?>" />
											 
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 工作电话： </label>

										<div class="col-sm-9">
											<input type="text" id="phone" placeholder="工作电话" class="col-xs-5" name="phone" value="<?php echo ($info["phone"]); ?>" />
											 
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 我的工号： </label>

										<div class="col-sm-9">
											<input type="text" id="worknumber" placeholder="我的工号" class="col-xs-5" name="worknumber" value="<?php echo ($info["worknumber"]); ?>" disabled="disabled" />
											 
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