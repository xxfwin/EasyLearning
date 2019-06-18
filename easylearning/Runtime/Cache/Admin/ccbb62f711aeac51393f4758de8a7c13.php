<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>


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
								<a href="<?php echo U('Coupons/index');?>">电子券信息</a>
							</li>
							<li class="active">修改电子券信息</li>
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
									<!-- 选择分类 -->
								<!--  <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分类： </label>

										<div class="col-sm-3">

											<select   class="form-control"  name="cate_id" id="cate">
												<option value="0">请选择分类</option>
												 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($info["cate_id"] == $v['id']): ?>selected=selected<?php endif; ?>><?php echo ($v["cate"]); ?></option>
													 <?php if(is_array($v["child"])): $i = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($info["cate_id"] == $vo['id']): ?>selected=selected<?php endif; ?>>&nbsp;└-<?php echo ($vo["cate"]); ?></option>

												    <?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($info["cate_id"] == $val['id']): ?>selected=selected<?php endif; ?>>&nbsp;&nbsp;└-<?php echo ($val["cate"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
											</select>

										</div>


									</div> -->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 起始日期： </label>

										<div class="col-sm-9">
											<input type="text" id="date" placeholder="起始日期" class="col-sm-4" name="date"  value="<?php echo ($info["date"]); ?>" />

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 终止日期： </label>

										<div class="col-sm-9">
											<input type="text" id="enddate" placeholder="终止日期" class="col-sm-4" name="enddate"  value="<?php echo ($info["enddate"]); ?>" />

										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户ID： </label>

										<div class="col-sm-9">
											<input type="text" id="userid" placeholder="用户ID" class="col-sm-4"  name="userid" value="<?php echo ($info["userid"]); ?>" />

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
									<!--<div class="form-group">
										<input type="text" id="value" placeholder="价值" class="col-sm-4"  name="value" value="<?php echo ($info["id"]); ?>" />
									</div>-->
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
											<button class="btn btn-info" id="button" type="submit">
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
			var date=$("#date").val();
			var enddate=$("#enddate").val();
			var userid=$("#userid").val();
			var status=$("$status").val();
			var value=$("$value").val();

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
</script>