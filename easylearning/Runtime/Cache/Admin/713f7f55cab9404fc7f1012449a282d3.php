<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>
<head>
<script type="text/javascript" src="<?php echo $CFG->wwwroot;?>/moodle/course/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo $CFG->wwwroot;?>/moodle/course/ueditor.all.min.js"></script>
</head>
<style type="text/css">
	
	.wminimize:hover{
		text-decoration:none;
	}
	.table thead>tr>th, .table tbody>tr>th, .table tfoot>tr>th, .table thead>tr>td, .table tbody>tr>td, .table tfoot>tr>td {
			padding: 8px;
			line-height: 1.428571429;
			vertical-align: top;
			 border-top: 0px solid #ddd; 
	.myHeader{
		color: #6A5ACD;
		text-align:center;
	}
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
								<a href="<?php echo U('Index/index');?>">首页</a>
							</li>

							<li class="active"><a href="<?php echo U('User/index');?>">笔记列表</a></li>
							<li class="active"><?php echo ($list['fullname']); ?></li>
							<li class="active"><?php echo ($list['name']); ?></li>
						</ul><!-- .breadcrumb -->

					</div>
	
					<div class="page-content">
						<form method="post">
							<div class="form-group">
								<label for="inputfile">请修改笔记：</label>
							</div>
							<div class="form-group">
								<!-- 调用ueditor -->
								<div id="editor"></div>
							</div>
							  <button type="submit" class="btn btn-primary btn-block">修改</button>
						</form>
					
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

<script>
	$(document).ready(function(){
		var ue = UE.getEditor('editor');
		/*$("#toEdit").click(function(){
				var eData = ue.getContentTxt();
				var id="<?php echo ($list['id']); ?>";
				var data={'id':id,'data':eData};
				$.post("<?php echo U('User/edit');?>",data);
		});*/
	});
</script>