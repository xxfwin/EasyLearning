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
								
									<!-- start 车辆信息 -->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 车牌号： </label>

										<div class="col-sm-9">
											<input type="text" id="carplatenumber" placeholder="车牌号" class="col-sm-4" name="carplatenumber"  value="<?php echo ($info["carplatenumber"]); ?>" onblur="checkuser()" />
											<div id="userinfo" name="userinfo"> </div>
										</div>
									</div>
									<!-- end 车辆信息 -->
									
									<!-- start 用户信息 -->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户姓名： </label>

										<div class="col-sm-9">
											<input type="text" id="username" placeholder="用户姓名" class="col-sm-4" name="username"  value="<?php echo ($info["username"]); ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户手机： </label>

										<div class="col-sm-9">
											<input type="text" id="userphone" placeholder="用户手机" class="col-sm-4" name="userphone"  value="<?php echo ($info["userphone"]); ?>" />
										</div>
									</div>
									<!-- start 用户信息 -->
									
									<!-- start 案件信息 -->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 联系电话： </label>

										<div class="col-sm-9">
											<input type="text" id="phone" placeholder="联系电话" class="col-sm-4" name="phone"  value="<?php echo ($info["phone"]); ?>" />

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
											<input type="text" id="date" placeholder="出险时间" class="col-sm-4"  name="date" value="<?php echo ($info["date"]); ?>" />

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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否三者车： </label>

										<div class="col-sm-9">
											<select class="form-control"  style="width:150px" name="is_thirdparty" id="is_thirdparty">				
										<option value="0">否</option>
										<option value="1">是</option>
									</select>

										</div>
									</div>
									<!-- end 案件信息 -->
									
									<!-- start 三者车 -->
									<div class="form-group">
										
										如果没有三者车，下面三个可以不填
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 三者车车主姓名： </label>

										<div class="col-sm-9">
											<input type="text" id="thirdparty_name" placeholder="三者车车主姓名" class="col-sm-4"  name="thirdparty_name" value="<?php echo ($info["thirdparty_name"]); ?>" />

										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 三者车车主手机： </label>

										<div class="col-sm-9">
											<input type="text" id="thirdparty_phone" placeholder="三者车车主手机" class="col-sm-4"  name="thirdparty_phone" value="<?php echo ($info["thirdparty_phone"]); ?>" />

										</div>
									</div>
																		
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 三者车车牌号： </label>

										<div class="col-sm-9">
											<input type="text" id="thirdparty_platenumber" placeholder="三者车车牌号" class="col-sm-4"  name="thirdparty_platenumber" value="<?php echo ($info["thirdparty_platenumber"]); ?>" />

										</div>
									</div>
									<!-- end 三者车 -->
									
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

<!-- 用户信息快速查询 -->
<script type="text/javascript">
function checkuser(){
	var dataPara = getFormJson($('#myform'));
	$.ajax({
        type: "POST",
        url: "./query",
        data: dataPara,
        success: successcallback,
        statusCode: {
            404: function () {
                alert('找不到页面');
            },
            500: function () {
                alert('内部服务器错误 ');
            }
        }
	});
}

function getFormJson(frm) {
    var o = {};
    var a = $(frm).serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });

    return o;
}

function successcallback(data){

	var user = eval(data);
	if(user.state == 1){
		alert("存在多个车牌号信息，请手动输入用户信息");
	}
	else if (user.state == 0){
		
		document.getElementById("username").value=user.username;
		document.getElementById("userphone").value=user.phone;
		
	}
	
}

</script>