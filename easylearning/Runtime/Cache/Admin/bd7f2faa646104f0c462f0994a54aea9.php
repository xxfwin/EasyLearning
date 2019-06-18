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
								<a href="#">事故信息</a>
							</li>
							<li class="active">事故信息</li>
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
						 <form action="" method="get">
										<div style="margin-bottom:10px;" class="col-sm-11">
											<span class="input-icon input-icon-right">
											<input  type="text" id="userid" placeholder="ID" name="userid" style="height:32px;width:120px;" value="<?php echo ($_GET['userid']); ?>">
											</span>
											<span class="input-icon input-icon-right">
											<input  type="text" id="username" placeholder="姓名" name="username" style="height:32px;width:120px;" value="<?php echo ($_GET['username']); ?>">
											</span>
											<span class="input-icon input-icon-right">
											<input  type="text" id="idcard" placeholder="证件号" name="idcard" style="height:32px;width:120px;" value="<?php echo ($_GET['idcard']); ?>">
											</span>
											<input  class=" btn-lg btn-success btn btn-xs btn-danger" type="submit" value="搜索">
										</div>
										<?php if(($role == 1) OR ($role == 2)): ?><a class="label label-xlg label-primary arrowed-right pull-right " href="<?php echo U('Incident/add');?>">
							添加事故</a><?php endif; ?>

						</form>




						</div>
						<div class="form-group">

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
														<th>用户ID</th>
														<th>姓名</th>
														<th>事故类型</th>
														<th>电话</th>
														<th>故障部位</th>
														<th>案件号</th>
														<th>出险时间</th>
														<th>状态</th>
														<th>定损员</th>
														<th>修理厂</th>
														<th>车ID</th>
														<th>
															是否三者车
														</th>
														<th>
															三者车ID
														</th>
														
														
														


													</tr>
												</thead>

												<tbody>
												 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
													
														<?php if(($role == 1) OR ($role == 2) OR ($role == 8)): ?><td>
															<div class="btn-group">

																<?php if(($role == 1) OR ($role == 2) OR ($role == 8)): ?><a href="<?php echo U('Incident/edit',array('id'=>$v['id']));?>" class="btn btn-xs btn-info">
																	<i class="icon-edit bigger-120"></i>
																</a><?php endif; ?>

																<?php if(($role == 1) OR ($role == 2)): ?><a href="<?php echo U('Incident/replyqr',array('userid'=>$v['userid'],'data'=>$v['id']));?>" class="btn btn-xs btn-info">
																	<i class="icon-user bigger-120"></i>
																</a><?php endif; ?>
																
																<a onclick="if(confirm('确认删除?')) location.href='<?php echo U('Incident/del',array('id'=>$v['id']));?>'"  href="javascript:;"  class="btn btn-xs btn-danger">
																	<i class="icon-trash bigger-120"></i>
																</a>
																<?php if(($role == 9) OR ($role == 1)): ?><a href="<?php echo U('Incident/changetodaishenhe',array('id'=>$v['id']));?>" class="btn btn-xs btn-info">
																	<i class="icon-info-sign bigger-120"></i>
																</a><?php endif; ?>

															</div>


														</td><?php endif; ?>
														
														<?php if($role == 9): ?><td>
															<a href="<?php echo U('Incident/pass',array('id'=>$v['id']));?>" class="btn btn-xs btn-info">
																	<i class="icon-info-sign bigger-120"></i>
															</a>
															<a href="<?php echo U('Incident/notpass',array('id'=>$v['id']));?>" class="btn btn-xs btn-danger">
																	<i class="icon-trash bigger-120"></i>
															</a>
															</td><?php endif; ?>
													
														<td><?php echo ($v["userid"]); ?></td>
														<td>
														<?php echo ($v["username"]); ?>
														</td>
														<td><?php echo ($v["faultytype"]); echo ($v["faultycondition"]); ?></td>
														<td><?php echo ($v["phone"]); ?></td>
														<td><?php echo ($v["carposition"]); ?></td>
														<td><?php echo ($v["position"]); ?></td>
														<td><?php echo ($v["date"]); ?></td>
														<!-- <td><?php echo ($v["status"]); ?></td> -->
														<?php if($v["status"] == 0): ?><td>已报案</td>
														<?php elseif($v["status"] == 1): ?><td>已处理</td>
														<?php elseif($v["status"] == 2): ?><td>已到达维修厂</td>
														<?php elseif($v["status"] == 3): ?><td>已完成维修</td>
														<?php elseif($v["status"] == 4): ?><td>待审核</td>
														<?php elseif($v["status"] == 5): ?><td>未通过</td><?php endif; ?>
														
														<td>
														<?php if(($role == 2) OR ($role == 1)): ?><a href="<?php echo U('Incident/pic',array('incidentid'=>$v['id']));?>">
														<?php echo ($v["auditorname"]); ?>
														</a>
														<?php else: ?>
														<?php echo ($v["auditorname"]); endif; ?>
														
													</td>
														<td>
														<?php if(($role == 1) OR ($role == 8)): ?><a href="<?php echo U('Incident/pic',array('factoryid'=>$v['factoryid']));?>">
														<?php echo ($v["factoryname"]); ?>
														</a>
														<?php else: ?>
														<?php echo ($v["factoryname"]); endif; ?>
														</td>
														<td><?php echo ($v["carplatenumber"]); ?></td>
														<td>
															<?php echo ($v["isthirdparty"]); ?>
														</td>
														<td>
															<?php echo ($v["thirdpartyplatenumber"]); ?>
														</td>

													</tr><?php endforeach; endif; else: echo "" ;endif; ?>

												</tbody>
											</table>

										</div><!-- /.table-responsive -->
										<div class="col-sm-6 pull-right">
												
											<a class="label label-xlg label-primary arrowed-right pull-right " href="<?php echo U('Incident/outputcsv');?>">
													导出记录</a>
										
											<div class="dataTables_paginate paging_bootstrap ">
												<ul class="pagination ">
												<?php echo ($page); ?>
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
		$('#starTime').datetimepicker({
			lang:'ch',
			step:30,
		});
		$('#endTime').datetimepicker({
			lang:'ch',
			step:30,
		});

		});
</script>