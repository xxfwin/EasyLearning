<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>

		<link rel="stylesheet" href="/Public/upload/themes/default/default.css" />
		<script src="/Public/upload/kindeditor.js"></script>
		<script src="/Public/upload/lang/zh_CN.js"></script>
		<script>
			KindEditor.ready(function(K) {
				var editor = K.editor({
					allowFileManager : true
				});
				K('#J_selectImage').click(function() {
					editor.loadPlugin('multiimage', function() {
						editor.plugin.multiImageDialog({
							clickFn : function(urlList) {
								var div = K('#J_imageView');
								div.html('');
								K.each(urlList, function(i, data) {
									div.append('<img style="width:130px;height：30px;margin-top:20px;margin-right:8px;"src="' + data.url + '">');
								});
								editor.hideDialog();
							}
						});
					});
				});
			});
		</script>
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
								<a href="<?php echo U('Factorybrand/index');?>">维修厂品牌</a>
							</li>
							<li class="active">添加维修厂品牌</li>
						</ul><!-- .breadcrumb -->

					
					</div>

					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed " href="<?php echo U('Factorybrand/index');?>">
							返回列表</a>
							
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" action="" method="post" id="myform">	
									
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 维修厂： </label>
									<div class="col-sm-9">
									<select class="form-control"  style="width:150px" name="factoryid" id="factoryid">				
										<?php if(is_array($factorylist)): $i = 0; $__LIST__ = $factorylist;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo[id]); ?>"><?php echo ($vo[name]); ?></option><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>				
									</select>					
									</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 车辆品牌： </label>
									<div class="col-sm-9">
									<select class="form-control"  style="width:150px" name="car_brandid" id="car_brandid">				
										<?php if(is_array($carbrandlist)): $i = 0; $__LIST__ = $carbrandlist;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo[id]); ?>"><?php echo ($vo[brand]); ?></option><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>				
									</select>					
									</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" id="button" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
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
		$("#button").click(function(){
		
			
			var factoryid=$("#factoryid").val();
			var car_brandid=$("#car_brandid").val();

			
			if(factoryid==''){
				layer.alert('维修厂ID必须填写', {icon: 5});
				return false;
			}else if(car_brandid==''){
				layer.alert('车辆ID必须填写', {icon: 5});
				return false;
			}else{
				$("#myform").submit();
			}
		});
	});
</script>