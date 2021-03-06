<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- 引入表格 -->
			<script type="text/javascript" src="/moodle/easylearning/Public/dlswgrid/dlshouwen.grid.min.js"></script>
			<script type="text/javascript" src="/moodle/easylearning/Public/dlswgrid/i18n/en.js"></script>
			<script type="text/javascript" src="/moodle/easylearning/Public/dlswgrid/i18n/zh-cn.js"></script>
			<script type="text/javascript" src="/moodle/easylearning/Public/dlswgrid/i18n/zh-tw.js"></script>
			<link rel="stylesheet" type="text/css" href="/moodle/easylearning/Public/dlswgrid/dlshouwen.grid.min.css" />
			<script type="text/javascript" src="/moodle/easylearning/Public/dlswgrid/dependents/datePicker/WdatePicker.js" defer="defer"></script>
			<link rel="stylesheet" type="text/css" href="/moodle/easylearning/Public/dlswgrid/dependents/datePicker/skin/WdatePicker.css" />
			<link rel="stylesheet" type="text/css" href="/moodle/easylearning/Public/dlswgrid/dependents/datePicker/skin/default/datepicker.css" />
			<link rel="stylesheet" type="text/css" href="/moodle/easylearning/Public/dlswgrid/dependents/fontAwesome/css/font-awesome.min.css" media="all" />
			<script type="text/javascript" src="<?php echo $CFG->wwwroot;?>/moodle/course/ueditor.parse.js"></script>
			
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
								<a href="#">课程提示</a>
							</li>
							<li class="active">管理提示</li>
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">

							<a class="label label-xlg label-primary arrowed-right pull-right " href="<?php echo U('Classtips/add');?>">添加提示信息</a>

						</div>
						<div class="form-group">

						</div>

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											<script type="text/javascript">
												var datass = <?php echo ($datas); ?>
											
												var gridColumns_2_1_1 = [
													{id:'fullname', title:'课程名称', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'lk'},
													{id:'name', title:'章节名称', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'lk'},
													{id:'type', title:'提示类型', type:'string', columnClass:'text-center',codeTable:{1:'Facts',2:'CommonMistakes',3:'OtherSays'}, fastQuery:true, fastQueryType:'lk'},
													{id:'tipcontent', title:'提示内容', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'lk'},
													{id:'open', title:'是否开启', type:'string', columnClass:'text-center',codeTable:{0:'关闭',1:'开启'}, fastQuery:true, fastQueryType:'lk'},
													{id:'tipid', title:'操作', type:'string', columnClass:'text-center',resolution:function(value, record, column, grid, dataNo, columnNo){
	var content = '';
	content += '<a href="edit/id/'+record.tipid+'"><button class="btn btn-xs btn-default" ><i class="fa fa-edit"></i>  编辑</button></a>';
	content += '  ';
	content += '<a href="del/id/'+record.tipid+'"><button class="btn btn-xs btn-danger" ><i class="fa fa-trash-o"></i>  删除</button></a>';
	return content;
}}
												];
													var gridOption_2_1_1 = {
													lang : 'zh-cn',
													ajaxLoad : false,
													exportFileName : '导出模板',
													datas : datass,
													columns : gridColumns_2_1_1,
													gridContainer : 'gridContainer',
													toolbarContainer : 'gridToolBarContainer',
													tools : 'fastQuery',
													pageSize : 10,
													pageSizeLimit : [10, 20, 50]
												};
												var grid_2_1_1 = $.fn.dlshouwen.grid.init(gridOption_2_1_1);
												$(function(){
													grid_2_1_1.load();
												});
											</script>

				<div id="gridContainer" class="dlshouwen-grid-container"></div>
				<div id="gridToolBarContainer" class="dlshouwen-grid-toolbar-container"></div>

											
										<!-- 
											<table id="sample-table-1" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th>操作</th>
														<th>ID</th>
														<th>车主姓名</th>
														<th>电话号码</th>
														<th>车牌号码</th>
														
													</tr>
												</thead>

												<tbody>
												 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
													
														<td>
															<div class="btn-group">


																<a href="<?php echo U('Thirdparty/edit',array('id'=>$v['id']));?>" class="btn btn-xs btn-info">
																	<i class="icon-edit bigger-120"></i>
																</a>

																<a onclick="if(confirm('确认删除?')) location.href='<?php echo U('Thirdparty/del',array('id'=>$v[id]));?>'"  href="javascript:;"  class="btn btn-xs btn-danger">
																	<i class="icon-trash bigger-120"></i>
																</a>
															</div>
														</td>
													
														<td>
															<?php echo ($v["id"]); ?>
														</td>
														<td><?php echo ($v["username"]); ?></td>
														<td><?php echo ($v["phone"]); ?></td>
														<td><?php dump($v.platenumber) ?></td>
														<td><?php echo ($v["platenumber"]); ?></td>


													</tr><?php endforeach; endif; else: echo "" ;endif; ?>
												</tbody>
											</table>
											-->

										</div><!-- /.table-responsive -->
										<div class="col-sm-6 pull-right">
										<?php if($role == 1): ?><a class="label label-xlg label-primary arrowed-right pull-right " href="<?php echo U('Thirdparty/outputcsv');?>">
												导出记录</a><?php endif; ?>
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
<script type="text/javascript">
uParse('.gridContainer');
</script>