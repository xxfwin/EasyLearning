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
								<a href="<?php echo U('Thirdparty/index');?>">导出笔记</a>
							</li>
							<li>
								<a href="<?php echo U('Thirdparty/index');?>">导出模板管理</a>
							</li>
							<li class="active">修改模板</li>
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed " href="<?php echo U('Thirdparty/index');?>">
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 模板名称： </label>

										<div class="col-sm-9">
											<input type="text" id="title" placeholder="模板名称" class="col-sm-4" name="title"  value="<?php echo ($info["title"]); ?>" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 模板顺序： </label>

										<!-- <div class="col-sm-9"> -->
											<!-- <input type="text" id="model" placeholder="模板顺序" class="col-sm-4"  name="model" value="<?php echo ($info["model"]); ?>" /> -->
										<!-- </div> -->
										<div class='parent'>
											<div class='wrapper'>
											  <div id='left' class='container'>
											  <label> 当前顺序： </label>
											  <?php if(is_array($modelarray)): $i = 0; $__LIST__ = $modelarray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; switch($v): case "Notes": ?><div><input type="hidden" name="0" value="0">Notes</div><?php break;?>
												<?php case "Facts": ?><div><input type="hidden" name="1" value="1">Facts</div><?php break;?>
												<?php case "CommonMistakes": ?><div><input type="hidden" name="2" value="2">CommonMistakes</div><?php break;?>
												<?php case "OtherSays": ?><div><input type="hidden" name="3" value="3">OtherSays</div><?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>

											  </div>
											  
											  <input type="hidden" name="cut" value="cut">
											  <div id='right' class='container'>
											  <label> 可选模块： </label>
												 <?php if(is_array($nmodelarray)): $i = 0; $__LIST__ = $nmodelarray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; switch($v): case "Notes": ?><div><input type="hidden" name="0" value="0">Notes</div><?php break;?>
												<?php case "Facts": ?><div><input type="hidden" name="1" value="1">Facts</div><?php break;?>
												<?php case "CommonMistakes": ?><div><input type="hidden" name="2" value="2">CommonMistakes</div><?php break;?>
												<?php case "OtherSays": ?><div><input type="hidden" name="3" value="3">OtherSays</div><?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>
											  </div>
											</div>
										</div>
									</div>
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
<script type="text/javascript">
	function $ (id) {	
		return document.getElementById(id);
	}
	dragula([$('left'), $('right')]);
</script>