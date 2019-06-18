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
								<a href="#">微信数据管理</a>
							</li>
							<li class="active">微信关注列表</li>
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
						 <form action="" method="get">
										<div style="margin-bottom:10px;" class="col-sm-11">

										<!-- 保留查询功能 -->
										<!-- <div class="col-sm-3" style="margin-left:-24px;">

											<select   class="form-control"  style="width:110px" name="pid" id="pid">
												<option value="0">请选择分类</option>
												 <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>"<?php if($_GET['pid']== $v['id']): ?>selected=selected<?php endif; ?>><?php echo ($v["cate"]); ?></option>
													 <?php if(is_array($v["child"])): $i = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($_GET['pid']== $vo['id']): ?>selected=selected<?php endif; ?>>&nbsp;└-<?php echo ($vo["cate"]); ?></option>

												    <?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($_GET['pid']== $val['id']): ?>selected=selected<?php endif; ?>>&nbsp;&nbsp;└-<?php echo ($val["cate"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
											</select>

										</div> -->

										<!-- <span class="input-icon input-icon-right" style="margin-left:-107px;">
											<input  type="text" id="starTime" placeholder="开始时间" name="starTime" style="height:32px;" value="<?php echo ($_GET['starTime']); ?>">
											</span> -->

											<span class="input-icon input-icon-right">
											<input  type="text" id="id" placeholder="ID" name="id" style="height:32px;width:120px;" value="<?php echo ($_GET['id']); ?>">
											</span>
											<span class="input-icon input-icon-right">
											<input  type="text" id="username" placeholder="昵称" name="username" style="height:32px;width:120px;" value="<?php echo ($_GET['username']); ?>">
											</span>
											<span class="input-icon input-icon-right">
											<input  type="text" id="idcard" placeholder="证件号" name="idcard" style="height:32px;width:120px;" value="<?php echo ($_GET['idcard']); ?>">
											</span>
											<input  class=" btn-lg btn-success btn btn-xs btn-danger" type="submit" value="搜索">
										</div>

										
										

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

														<th>ID</th>
														<th>昵称</th>
														<th>性别</th>
														
														
														<?php if($role == 1): ?><th>操作</th><?php endif; ?>
													</tr>
												</thead>

												<tbody>
												 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
														<td>
															<?php echo ($v["id"]); ?>
														</td>
														<td><?php echo ($v["nickname"]); ?></td>
														
														<?php if($v["sex"] == 1): ?><td>男</td><?php endif; ?>
														<?php if($v["sex"] == 0): ?><td>保密</td><?php endif; ?>
														<?php if($v["sex"] == 2 ): ?><td>女</td><?php endif; ?>
														
														


														<!-- <td class="hidden-480">
														  <span  <?php if($v["recommend"] == '置顶'): ?>class="label label-success arrowed">
														  <?php else: ?>
														     class="label label-warning arrowed"><?php endif; ?>
														  <?php echo ($v["recommend"]); ?></span>

														  </td> -->
														<!-- <td class="hidden-480">
														  <span  <?php if($v["top"] == '推荐'): ?>class="label label-success arrowed">
														  <?php else: ?>
														     class="label label-warning arrowed"><?php endif; ?>
														  <?php echo ($v["top"]); ?></span>

														  </td>-->
														  <!-- <td class="hidden-480">
														  <span  <?php if($v["audit"] == '审核通过'): ?>class="label label-success arrowed">
														  <?php elseif($v["audit"] == '审核不通过'): ?>
														     class="label label-danger arrowed">
														   <?php else: ?>
														    class="label label-info  arrowed"><?php endif; ?>
														  <?php echo ($v["audit"]); ?></span>

														  </td> -->
														<!-- <td class="hidden-480">
															<span class="badge badge-purple"><?php echo ($v["sort"]); ?></span>

														</td>
														<td class="hidden-480">
															<?php echo (date('Y-m-d H:i:s',$v["time"])); ?>

														</td> -->
														<?php if($role == 1): ?><td>
															<div class="btn-group">
															<a href="<?php echo U('User/edit',array('id'=>$v['id']));?>" class="btn btn-xs btn-info">
																<i class="icon-edit bigger-120"></i></a>
																<a onclick="if(confirm('删除该用户会删除与该用户相关的所有信息。确认删除吗?')) location.href='<?php echo U('User/del',array('id'=>$v[id]));?>'"  href="javascript:;"  class="btn btn-xs btn-danger">
																	<i class="icon-trash bigger-120"></i>
																</a>

														</td>
															<?php else: endif; ?>



															</div>


													</tr><?php endforeach; endif; else: echo "" ;endif; ?>

												</tbody>
											</table>

										</div><!-- /.table-responsive -->
										<div class="col-sm-6 pull-right">
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