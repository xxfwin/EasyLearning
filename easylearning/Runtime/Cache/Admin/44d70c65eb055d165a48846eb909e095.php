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
								<a href="<?php echo U('Coupons/index');?>">投保人管理</a>
							</li>
							<li class="active">添加电子券</li>
						</ul><!-- .breadcrumb -->
					</div>
					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed " href="<?php echo U('Coupons/index');?>">
							返回列表</a>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" action="" method="post" id="myform">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户ID： </label>
										<div class="col-sm-9">
											<input type="text" id="userid" placeholder="用户ID" class="col-sm-4"  name="userid" value="<?php echo ($info["userid"]); ?>" />
										</div>
									</div>
	 								<div class="form-group">
	 									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">起始日期：</label>
	 									<div class="col-sm-9">
											<input  type="text" id="date" placeholder="结束时间" class="col-sm-4" name="date"  style="height:32px;" value="<?php echo ($_GET['date']); ?>" />
	 									</div>
	 								</div>
	 								<div class="form-group">
	 									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">截止日期：</label>
	 									<div class="col-sm-9">
	 										<input type="text" id="enddate" placeholder="截止日期" class="col-sm-4" name="enddate" style="height:32px;" value="<?php echo ($_GET['enddate']); ?>"/>
	 									</div>

	 								</div>
									<!-- <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 状态： </label>

										<div class="col-sm-9">
											<input type="text" id="status" placeholder="状态" class="col-sm-4"  name="status" value="<?php echo ($info["status"]); ?>" />

										</div>
									</div> -->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 状态： </label>

										<div class="col-sm-9">
											<select class="form-control" style="width:150px" name="status" id="status">
																								
												<option value="1" <?php if($info["status"] == 1): ?>selected=selected<?php endif; ?>>
													未使用
												</option>
												<option value="0" <?php if($info["status"] == 0): ?>selected=selected<?php endif; ?>>
													已使用
												</option>
											</select>

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 价值： </label>

										<div class="col-sm-9">
											<input type="text" id="value" placeholder="价值" class="col-sm-4"  name="value" value="<?php echo ($info["value"]); ?>" />

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


	<!-- <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
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
 -->

<script type="text/javascript">
	$(function(){
		$("#button").click(function(){
			var userid=$("#userid").val();
			var dateStr=$("#date").val();
			var enddateStr=$("#enddate").val();
			var status=$("#status").val();
			var value=$("#value").val();



			if(userid==''){
				layer.alert('用户ID必须填写', {icon: 5});
				return false;
			}else if(status==''){
				layer.alert('状态必须填写', {icon: 5});
				return false;
			}else if(value==''){
				layer.alert('价值必须填写', {icon: 5});
				return false;
			}else if(dateStr==''){
				layer.alert('起始日期必须填写',{icon: 5});
				return false;
			}else if(enddateStr==''){
				layer.alert('终止日期必须填写',{icon: 5});
				return flase;
			}else if(enddateStr<=dateStr){
				layer.alert('终止日期必须晚于起始日期',{icon: 5});
				return false;
			}else{
				$("#myform").submit();
			}
		});
	});
	$(function(){
		var logic = function( currentDateTime ){
			if( currentDateTime.getDay()==6 ){
				this.setOptions({
					minTime:'11:00'
				});
			}else
				this.setOptions({
					minTime:'8:00'
				});
		};
		$('#date').datetimepicker({
			lang:'ch',
			step:30,
		});
		$('#enddate').datetimepicker({
			lang:'ch',
			step:30,
		});

		});
</script>