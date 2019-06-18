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
								<a href="<?php echo U('Incident/index');?>">事故信息</a>
							</li>
							<li class="active">事故列表</li>
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed " href="<?php echo U('Incident/index');?>">
							返回列表</a>

						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" action="" method="post" id="myform">

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户ID： </label>

										<div class="col-sm-9">
											<input type="text" id="userid" placeholder="用户ID" class="col-sm-4" name="userid"  value="<?php echo ($info["userid"]); ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 电话： </label>

										<div class="col-sm-9">
											<input type="text" id="phone" placeholder="用户电话" class="col-sm-4" name="phone"  value="<?php echo ($info["phone"]); ?>" />

										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 故障部位： </label>

										<div class="col-sm-9">
											<input type="text" id="carposition" placeholder="故障部位" class="col-sm-4" name="carposition"  value="<?php echo ($info["carposition"]); ?>" />

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 案件号： </label>

										<div class="col-sm-9">
											<input type="text" id="position" placeholder="案件号" class="col-sm-4" name="position"  value="<?php echo ($info["position"]); ?>" />

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 事故类型： </label>
										
										
										<div class="col-sm-9">

											<select class="form-control"   style="width:150px" name="faultyid" id="faultyid">
											<?php if(is_array($faultyinfo)): $i = 0; $__LIST__ = $faultyinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($info[faultyid] == $v[id]): ?>selected=selected<?php endif; ?>>
												<?php echo($v[type].$v[condition]) ?>
												</option><?php endforeach; endif; else: echo "" ;endif; ?>
									
									
											</select>

										</div>
									</div>
									<!-- <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 事故类型： </label>

										<div class="col-sm-9">
											<input type="text" id="faultyid" placeholder="事故类型ID" class="col-sm-4" name="faultyid"  value="<?php echo ($info["faultyid"]); ?>" />

										</div>
									</div> -->

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 出险时间： </label>

										<div class="col-sm-9">
											<input type="text" id="date" placeholder="发生时间" class="col-sm-4"  name="date" value="<?php echo ($info["date"]); ?>" />

										</div>
									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 状态： </label>
									<div class="col-sm-9">
									<select class="form-control"  style="width:150px" name="status" id="status">				
									
									<?php if($info["status"] == 1): ?><option value="1">已处理</option>
									<option value="2">已到达维修厂</option>
									<option value="3">已完成维修</option><?php endif; ?>
									<?php if($info["status"] == 2): ?><option value="2">已到达维修厂</option>
									<option value="1">已处理</option>
									<option value="3">已完成维修</option><?php endif; ?>
									<?php if($info["status"] == 3): ?><option value="3">已完成维修</option>
									<option value="1">已处理</option>
									<option value="2">已到达维修厂</option><?php endif; ?>
									
									
									</select>
									
									</div>

									</div>

									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 维修厂： </label>
									<div class="col-sm-9">
									<select class="form-control"  style="width:150px" name="factoryid" id="factoryid">
										<option value=""></option>
										<?php if(is_array($factorylist)): $i = 0; $__LIST__ = $factorylist;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo[id]); ?>"><?php echo ($vo[name]); ?></option><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
									
									</select>
									
									</div>

									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 候选维修厂： </label>
									<div class="col-sm-9">
									<?php if(is_array($factorylist)): $i = 0; $__LIST__ = $factorylist;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="candidatefactoryid[]" value="<?php echo ($vo[id]); ?>"><?php echo ($vo[name]); ?></input><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
									</div>

									</div>
									
									<!-- <div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 车ID： </label>
									<div class="col-sm-9">
									<select class="form-control"  style="width:150px" name="carid" id="carid">				
										<?php if(is_array($carlist)): $i = 0; $__LIST__ = $carlist;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo[id]); ?>"><?php echo ($vo[nickname]); ?></option><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
									
									</select>
									</div>
									</div> -->						
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 车ID： </label>

										<div class="col-sm-9">
											<input type="text" id="carid" placeholder="车ID" class="col-sm-4"  name="carid" value="<?php echo ($info["carid"]); ?>" />

										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否三者车： </label>

										<div class="col-sm-9">
											<select class="form-control"  style="width:150px" name="is_thirdparty" id="is_thirdparty">				
										<option value="0">否</option>
										<option value="1">是</option>
									</select>

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 三者车ID： </label>

										<div class="col-sm-9">
											<input type="text" id="thirdparty_id" placeholder="三者车ID" class="col-sm-4"  name="thirdparty_id" value="<?php echo ($info["thirdparty_id"]); ?>" />

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


			var userid=$("#userid").val();
			var faultyid=$("#faultyid").val();
			var count=$("#count").val();
			var date=$("#date").val();
			var status=$("#status").val();
			var factoryid=$("#factoryid").val();
			var carid=$("#carid").val();
			
			var is_thirdparty=$("#is_thirdparty").val();
			

			if(userid==''){
				layer.alert('用户ID必须填写', {icon: 5});
				return false;
			}else if(faultyid==''){
				layer.alert('事故号必须填写', {icon: 5});
				return false;
			}else if(date==''){
				layer.alert('日期必须填写', {icon: 5});
				return false;
			}else if(status==''){
				layer.alert('状态必须填写', {icon: 5});
				return false;
			}else if (carid=='') {
				layer.alert('车辆ID必须填写', {icon: 5});
				return false;
			}else if (is_thirdparty=='') {
				layer.alert('是否三者车必须填写', {icon: 5});
				return false;
			}else {
				$("#myform").submit();
			}
		});
	});
</script>

<!-- 下面是时间的参数 -->
<script type="text/javascript">
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