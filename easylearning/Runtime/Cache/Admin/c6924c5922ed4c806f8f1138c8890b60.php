<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>
<style type="text/css">
	
	.wminimize:hover{
		text-decoration:none;
	}
	.table thead>tr>th, .table tbody>tr>th, .table tfoot>tr>th, .table thead>tr>td, .table tbody>tr>td, .table tfoot>tr>td {
			padding: 5px;
			line-height: 1.428571429;
			vertical-align: top;
			 border-top: 0px solid #ddd; 
			 width: 1px;
			 padding-right: 2px;
}
.td19{
	width:10px;
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

							<li>
								<a href="#">权限管理</a>
							</li>
							<li class="active">角色授权</li>
						</ul><!-- .breadcrumb -->

						
					</div>

					<div class="page-content">
						<div class="page-header">
						 
							<a class="label label-xlg label-primary arrowed-right " href="<?php echo U('Role/index');?>">
							返回列表</a>
							
							
							
						</div>

				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->

						<div class="row">
							<div class="col-xs-12">
								<div class="table-responsive">
								  <form action="" method="post">
									<table id="sample-table-1" class="table table-striped table-hover">
										

										<tbody>
										 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
												<th class="right" colspan="6">
												<input type="checkbox" class="ace" name="node[]"  value="<?php echo ($val["id"]); ?>" <?php if($val["access"] == 1): ?>checked=checked<?php endif; ?>/>
														<span class="lbl">&nbsp;&nbsp;<?php echo ($val["title"]); ?></span>
													
												</th>
												
											</tr>
										  <?php if(is_array($val["child"])): $i = 0; $__LIST__ = $val["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
												<td class="right td<?php echo ($val["id"]); ?>">
														<input type="checkbox" class="ace" name="node[]"  value="<?php echo ($vo["id"]); ?>" <?php if($vo["access"] == 1): ?>checked=checked<?php endif; ?> />
														<span class="lbl">&nbsp;&nbsp;<?php echo ($vo["title"]); ?></span>
												</td>
											 <?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><td class="td<?php echo ($val["id"]); ?>">
														<input type="checkbox" class="ace" name="node[]" value="<?php echo ($v["id"]); ?>" <?php if($v["access"] == 1): ?>checked=checked<?php endif; ?>/>
														<span class="lbl">&nbsp;&nbsp;<?php echo ($v["title"]); ?></span>
												</td><?php endforeach; endif; else: echo "" ;endif; ?>
											</tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
										<tr>
											<td colspan="5">
											<input type="hidden" name="id" value="<?php echo ($id); ?>">
											<button class="btn btn-info " type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button></td>
										</tr>

										</tbody>
									
								   </table>
								  
								</form>
								</div><!-- /.table-responsive -->
								<div class="col-sm-6 pull-right">
									<div class="dataTables_paginate paging_bootstrap ">
										<ul class="pagination ">
										
										</ul>
									</div>
								</div>
							</div><!-- /span -->
						</div><!-- /row -->

					

					
					</div><!-- /.col -->
				</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

			
			</div><!-- /.main-container-inner -->
}

			
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


		<!-- ace scripts -->

		
<script type="text/javascript">
	jQuery(function($) {
		var oTable1 = $('#sample-table-2').dataTable( {
		"aoColumns": [
		  { "bSortable": false },
		  null, null,null, null, null,
		  { "bSortable": false }
		] } );
		
		
		$('table th input:checkbox').on('click' , function(){
			var that = this;
			var id='.td'+$(this).val();
			$(this).closest('tr').nextAll().find(id+' input:checkbox')
			.each(function(){
				this.checked = that.checked;
				//$(this).closest('tr').toggleClass('selected');
			});
				
		});
	
		$('table .right input:checkbox').on('click' , function(){
			var that = this;
			//alert($(this).closest('td').attr('class'));
			$(this).closest('tr').find('td input:checkbox')
			.each(function(){
				this.checked = that.checked;
				$(this).closest('tr').toggleClass('selected');
			});
				
		});
	
		
	})
</script>