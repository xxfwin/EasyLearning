<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>

<script type="text/javascript" src="<?php echo $CFG->wwwroot;?>/moodle/course/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo $CFG->wwwroot;?>/moodle/course/ueditor.all.min.js"></script>

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
							<li class="active">修改提示信息</li>
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否开启： </label>

										<!-- <div class="col-sm-9"> -->
											<!-- <input type="text"  placeholder="是否开启" class="col-sm-4"   value="<?php echo ($info["open"]); ?>" /> -->
											
										<!-- </div> -->
										
										<select id="open" name="open">
										<?php if($info["open"] == 1 ): ?><option value="1" selected="true">开启</option>
											<option value ="0">关闭</option>
											<?php else: ?> 
												<option value="1">开启</option>
												<option value ="0" selected="true">关闭</option><?php endif; ?>
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
											<input type="hidden" name="tipid" id="tipid" value="<?php echo ($info["tipid"]); ?>">
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
			var name=$("#cate").val();
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]')
				});
			html = editor.html();
			editor.sync('desc');
			editor.html('desc', html);
			var title=$("#title").val();
			var descs=$("#descs").val();

			if(name==0){
				layer.alert('分类必须选择', {icon: 5});
				return false;
			}else if(title==''){
				layer.alert('文章标题必须填写', {icon: 5});
				return false;
			}else if(descs==''){
				layer.alert('描述必须填写', {icon: 5});
				return false;
			}else if(html==''){
				layer.alert('文章内容必须填写', {icon: 5});
				return false;
			}else{
				$("#myform").submit();
			}
		});
	});

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