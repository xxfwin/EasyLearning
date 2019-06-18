<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>
<script src="/Public/upload/kindeditor.js"></script>
		<script src="/Public/upload/lang/zh_CN.js"></script>
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
			
			
			var img_id_upload=new Array();//初始化数组，存储已经上传的图片名
			var i=0;//初始化数组下标
			$(function() {
				$('#file_upload').uploadify({
					'auto'     : false,//关闭自动上传
					'removeTimeout' : 1,//文件队列上传完成1秒后删除
					'swf'      : 'uploadify.swf',
					'uploader' : 'uploadify.php',
					'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
					'buttonText' : '选择图片',//设置按钮文本
					'multi'    : true,//允许同时上传多张图片
					'uploadLimit' : 10,//一次最多只允许上传10张图片
					'fileTypeDesc' : 'Image Files',//只允许上传图像
					'fileTypeExts' : '*.gif; *.jpg; *.png',//限制允许上传的图片后缀
					'fileSizeLimit' : '20000KB',//限制上传的图片不得超过200KB 
					'onUploadSuccess' : function(file, data, response) 
					// Put your options here
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
								<a href="<?php echo U('Index/index');?>">首页</a>
							</li>

							<li>
								<a href="<?php echo U('Incident/index');?>">事故信息</a>
							</li>
							<li class="active">上传图片</li>
						</ul><!-- .breadcrumb --> 
					</div>
					<div class="page-content">
						<!-- <div class="page-header">
						 <form action="" method="get">
										<div style="margin-bottom:10px;" class="col-sm-11">
											<span class="input-icon input-icon-right">
											<input type="text" id="platenumber" placeholder="车牌号码" name="platenumber" style="height:32px;" value="<?php echo ($_GET['platenumber']); ?>">
											</span>
											<span class="input-icon input-icon-right">
											<input type="text" id="userid" placeholder="用户ID" name="userid" style="height:32px;" value="<?php echo ($_GET['userid']); ?>">
											</span>
											<input  class=" btn-lg btn-success btn btn-xs btn-danger" type="submit" value="搜索">
										</div>
										<?php if($role == 1): ?><a class="label label-xlg label-primary arrowed-right pull-right " href="<?php echo U('Incident/add');?>">添加车辆</a><?php endif; ?>
						 </form>
						</div> -->




						<div class="form-group">

						</div>

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
										
										
										
										<form class="form-horizontal" action="#" enctype="multipart/form-data" method="post" >
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 选择案件： </label>

												<div class="col-sm-9">
												
													<select class="form-control"  style="width:150px" name="incident" id="incident">
														
														<?php if(is_array($incident)): $i = 0; $__LIST__ = $incident;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo[id]); ?>"><?php echo ($vo[username]); ?>|<?php echo ($vo[position]); ?></option><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
									
													</select>
												</div>
												
											</div>
 											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 上传图片： </label>

												<div class="col-sm-9">
													<input type='file'  name='pic'>
												 

												</div>
											</div> 
<!--									<div class="form-group" style="">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 图片上传： </label>

										<div class="col-sm-9">
											<input type="button" id="file_upload" value="批量上传" />
		                                    <div id="J_imageView">
											</div>

										</div>
									</div>-->
											
									
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" id="button" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>


										</div>
									</div>
										 
										</form>
											<!-- <table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>时间</th>
														<th>图片</th>				
													</tr>
												</thead>

												<tbody>
												 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
														<td>
															<?php  echo date('Y-m-d H:i:s',$v['create_time']); ?>
														</td>
														<td><img src="<?php echo ($picBase.$v[path]);?>" /></td>
														
														<?php if($role == 1): ?><td>
																<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">


																	<a href="<?php echo U('Incident/edit',array('id'=>$v['id']));?>" class="btn btn-xs btn-info">
																		<i class="icon-edit bigger-120"></i>
																	</a>

																	<a onclick="if(confirm('确认删除?')) location.href='<?php echo U('Incident/del',array('id'=>$v[id]));?>'"  href="javascript:;"  class="btn btn-xs btn-danger">
																		<i class="icon-trash bigger-120"></i>
																	</a>


																</div>


															</td><?php endif; ?>


													</tr><?php endforeach; endif; else: echo "" ;endif; ?>

												</tbody>
											</table>

										</div>-->
										<!-- /.table-responsive -->
										
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
		$('#date').datetimepicker({
			lang:'ch',
			step:30,
		});
		

		});
</script>