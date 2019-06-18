<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>
<style type="text/css">
	
	.wminimize:hover{
		text-decoration:none;
	}
	.table thead>tr>th, .table tbody>tr>th, .table tfoot>tr>th, .table thead>tr>td, .table tbody>tr>td, .table tfoot>tr>td {
			padding: 8px;
			line-height: 1.428571429;
			vertical-align: top;
			 border-top: 0px solid #ddd; 
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
							
							<li class="active">笔记列表</li>
							
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
							<div class="table-responsive" >
								<table id="sample-table-1" class="table table-hover"  >
									<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
											<th>
												<a class="label label-xlg label-primary arrowed-right ">
													<?php echo ($key); ?>
												</a>
												<a href="<?php echo U('User/add',array('course'=>$key));?>" class="wminimize">
													[<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加]
												</a>
											</th>
										</tr>
										<tr>
											<?php if(is_array($vo)): $k = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($k % 2 );++$k;?><td>
													<span>
														<?php echo ($m['content']); ?><a href="<?php echo U('User/show',array('id'=>$m['id']));?>" class="wminimize">[查看]</a>
														<a href="<?php echo U('User/edit',array('id'=>$m['id']));?>" class="wminimize">[修改]</a>
														<a onclick="if(confirm('确认删除?')) location.href='<?php echo U('User/del',array('id'=>$m[id]));?>'" style="cursor: pointer;" class="wminimize">[删除]</a>
													</span>
												</td>
												<!-- 每三列换一行 -->
												<?php if($k%3 == 0): ?><tr></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								</table>
							</div><!-- /.table-responsive -->
						</div>
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