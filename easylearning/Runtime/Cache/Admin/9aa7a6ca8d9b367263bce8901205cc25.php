<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>

		<link rel="stylesheet" href="/moodle/easylearning/Public/upload/themes/default/default.css" />
		<script src="/moodle/easylearning/Public/upload/kindeditor.js"></script>
		<script src="/moodle/easylearning/Public/upload/lang/zh_CN.js"></script>
		<script type="text/javascript" src="<?php echo $CFG->wwwroot;?>/moodle/course/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo $CFG->wwwroot;?>/moodle/course/ueditor.all.min.js"></script>
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
								<a href="<?php echo U('Thirdparty/index');?>">课程提示</a>
							</li>
							<li>
								<a href="<?php echo U('Thirdparty/index');?>">管理提示</a>
							</li>
							<li class="active">添加提示信息</li>
						</ul><!-- .breadcrumb -->

					
					</div>

					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed " href="<?php echo U('Classtips/index');?>">
							返回列表</a>
							
							<!-- 引入拖拽库 -->
							<link href='/moodle/easylearning/Public/dragula/dragula.css' rel='stylesheet' type='text/css' />
							<link href='/moodle/easylearning/Public/dragula/example/example.css' rel='stylesheet' type='text/css' />
							<script src='/moodle/easylearning/Public/dragula/dragula.js'></script>
							
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" action="" method="post" id="myform">
								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 选择课程： </label>
										<select id="course" name="course" onchange="changeForm(this.value)">
											<?php if(is_array($courseinfo)): $i = 0; $__LIST__ = $courseinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$course): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($course["id"]); ?>"><?php echo ($course["fullname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 选择章节： </label>
										<select id="pageid" name="pageid">
											
										</select>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 选择类型： </label>
										<select id="type" name="type">
											<option value ="1">Facts</option>
											<option value ="2">CommonMistakes</option>
											<option value ="3">OtherSays</option>
										</select>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否开启： </label>
										<select id="open" name="open">
											<option value="1" selected="true">开启</option>
											<option value ="0">关闭</option>
										</select>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 提示内容： </label>

										<div class="col-sm-9">
											<!-- <textarea id="tipcontent" name="tipcontent" placeholder="提示内容" class="col-sm-4" rows=10><?php echo ($info["tipcontent"]); ?></textarea> -->
											<!-- <input type="text" id="tipcontent" placeholder="提示内容" class="col-sm-4"  name="tipcontent" value="<?php echo ($info["tipcontent"]); ?>" /> -->
											<!-- 调用ueditor -->
											<script id="tipcontent" name="tipcontent" type="text/plain"> <?php echo ($info["tipcontent"]); ?></script>
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
			window.jQuery || document.write("<script src='/moodle/easylearning/Public/admin/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/moodle/easylearning/Public/admin/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/moodle/easylearning/Public/admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/moodle/easylearning/Public/admin/js/bootstrap.min.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="/moodle/easylearning/Public/admin/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="/moodle/easylearning/Public/admin/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/jquery.slimscroll.min.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/jquery.easy-pie-chart.min.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/jquery.sparkline.min.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/flot/jquery.flot.min.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/flot/jquery.flot.pie.min.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/flot/jquery.flot.resize.min.js"></script>


		<!-- page specific plugin scripts -->

		<script src="/moodle/easylearning/Public/admin/js/jquery.dataTables.min.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/jquery.dataTables.bootstrap.js"></script>

		<!-- ace scripts -->

		<script src="/moodle/easylearning/Public/admin/js/ace-elements.min.js"></script>
		<script src="/moodle/easylearning/Public/admin/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

	
	</body>
</html>

<script type="text/javascript">
	$(function(){
		$("#button").click(function(){
		
			
			var name=$("#name").val();
			var platenumber=$("#platenumber").val();
			var phone=$("#phone").val();
			
			if(name==''){
				layer.alert('投保人标题必须填写', {icon: 5});
				return false;
			}else if(platenumber==''){
				layer.alert('身份证号必须填写', {icon: 5});
				return false;
			}else if(phone==''){
				layer.alert('电话号码必须填写', {icon: 5});
				return false;
			}else{
				$("#myform").submit();
			}
		});
	});
</script>

<script type="text/javascript">
	function changeForm(val){
		$.post("getpage.html", { "courseid": val },
	   function(data){
		 var obj=document.getElementById('pageid'); 
		 obj.options.length = 0;
		 for(var page in data){
			obj.options.add(new Option(data[page]['name'],data[page]["instance"]));
			
		 }
	   }, "json");
		
	}
</script>
<script>
	$(document).ready(function(){
		var ue = UE.getEditor('tipcontent');
		/*$("#toEdit").click(function(){
				var eData = ue.getContentTxt();
				var id="<?php echo ($list['id']); ?>";
				var data={'id':id,'data':eData};
				$.post("<?php echo U('User/edit');?>",data);
		});*/
	});
</script>