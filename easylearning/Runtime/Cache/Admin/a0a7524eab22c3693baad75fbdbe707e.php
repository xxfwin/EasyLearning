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
								<a href="<?php echo U('Index/index');?>">首页</a>
							</li>

							<li>
								<a href="#">权限管理</a>
							</li>
							<li class="active">角色列表</li>
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">

							<a class="label label-xlg label-primary arrowed-right " href="<?php echo U('Role/add');?>">
							添加角色</a>



						</div>

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th>操作</th>
														<th>ID</th>
														<th>角色名称</th>
														<th>角色描述</th>
														<th>状态</th>
														<th>排序</th>
														<th>创建时间</th>
														
													</tr>
												</thead>

												<tbody>
												 <?php if(is_array($data["list"])): $i = 0; $__LIST__ = $data["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
													
														<td>
															<div class="btn-group">
																<a href="<?php echo U('Role/rbac',array('id'=>$v['id']));?>" class="btn btn-xs btn-success">
																	<i class="icon-lock bigger-120"></i>
																</a>

																<a href="<?php echo U('Role/edit',array('id'=>$v['id']));?>" class="btn btn-xs btn-info">
																	<i class="icon-edit bigger-120"></i>
																</a>

																<!-- <a onclick="if(confirm('确认删除?')) location.href='<?php echo U('Role/del',array('id'=>$v[id]));?>'"  href="javascript:;"  class="btn btn-xs btn-danger">
																	<i class="icon-trash bigger-120"></i>
																</a>
 -->

															</div>


														</td>
													
														<td>
															<?php echo ($v["id"]); ?>
														</td>
														<td><?php echo ($v["name"]); ?></td>
														<td><span class="label label-info  arrowed-in-right"><?php echo ($v["remark"]); ?></span></td>
														<td>
														   <?php if($v["status"] == '开启'): ?><span class="label label-success arrowed"><?php echo ($v["status"]); ?></span>
												            <?php else: ?>
												               <span class="label  label-warning arrowed "><?php echo ($v["status"]); ?></span><?php endif; ?>
														</td>

														<td>
															<span class="badge badge-purple"><?php echo ($v["sort"]); ?></span>

														</td>
														<td>
															<?php echo (date('Y-m-d H:i:s',$v["time"])); ?>

														</td>

													</tr><?php endforeach; endif; else: echo "" ;endif; ?>

												</tbody>
											</table>

										</div><!-- /.table-responsive -->
										<div class="col-sm-6 pull-right">
											<div class="dataTables_paginate paging_bootstrap ">
												<ul class="pagination ">
												<?php echo ($data["page"]); ?>
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