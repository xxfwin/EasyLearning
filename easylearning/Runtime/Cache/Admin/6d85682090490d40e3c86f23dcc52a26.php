<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>

		<link rel="stylesheet" href="/moodle/easylearning/Public/upload/themes/default/default.css" />
		<script src="/moodle/easylearning/Public/upload/kindeditor.js"></script>
		<script src="/moodle/easylearning/Public/upload/lang/zh_CN.js"></script>
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
								<a href="#">首页</a>
							</li>

							<li>
								<a href="<?php echo U('Incidentfaulty/index');?>">导出笔记</a>
							</li>
							<li class="active">生成笔记</li>
						</ul><!-- .breadcrumb -->

					
					</div>

					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed-in-right " href="#">
							请选择生成参数</a>
							
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" action="" method="post" id="myform">
								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 请选择要导出的课程： </label>
										<div class="col-sm-9">
											<table id="sample-table-1" class="table table-striped table-hover">
											<tbody>
												 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
														<th class="right" colspan="6">
														<input type="checkbox" class="ace" name="node[]"  value="<?php echo ($val["id"]); ?>" />
																<span class="lbl">&nbsp;&nbsp;<?php echo ($val["fullname"]); ?></span>
															
														</th>
														
													</tr>
													<tr>
													  <?php if(is_array($val["child"])): $i = 0; $__LIST__ = $val["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td class="td<?php echo ($val["id"]); ?>">
															<input type="checkbox" class="ace" name="node[]"  value="<?php echo ($key); ?>"  />
															<span class="lbl">&nbsp;&nbsp;<?php echo ($vo); ?></span>
														</td><?php endforeach; endif; else: echo "" ;endif; ?>
													</tr><?php endforeach; endif; else: echo "" ;endif; ?>


											</tbody>
										
											</table>
									   </div>
								   
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 请选择导出模板： </label>

										<div class="col-sm-9">
											<select id="template" name="template">
												<?php if(is_array($templatelist)): $i = 0; $__LIST__ = $templatelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tempval): $mod = ($i % 2 );++$i;?><option value ="<?php echo ($tempval["id"]); ?>"><?php echo ($tempval["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 请选择导出文件类型： </label>

										<div class="col-sm-9">
											<select id="filetype" name="filetype">
												<option value ="0">PDF</option>

											</select>
									</div>
								</div>
								<div class="clearfix form-actions">
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" id="button" type="submit">
											<i class="icon-ok bigger-110"></i>
											提交
										</button>

										&nbsp; &nbsp; &nbsp;
										<button class="btn" type="reset">
											<i class="icon-undo bigger-110"></i>
											重置
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

<!-- <script type="text/javascript"> -->
	<!-- $(function(){ -->
		<!-- $("#button").click(function(){ -->
		
			
			<!-- var type=$("#type").val(); -->
			<!-- var condition=$("#condition").val(); -->
			<!-- var value=$("#value").val(); -->
			
			
			<!-- if(type==''){ -->
				<!-- layer.alert('事故类型必须填写', {icon: 5}); -->
				<!-- return false; -->
			<!-- }else if(condition==''){ -->
				<!-- layer.alert('条件必须填写', {icon: 5}); -->
				<!-- return false; -->
			<!-- }else if(value==''){ -->
				<!-- layer.alert('价值必须填写', {icon: 5}); -->
				<!-- return false; -->
			<!-- }else{ -->
				<!-- $("#myform").submit(); -->
			<!-- } -->
		<!-- }); -->
	<!-- }); -->
<!-- </script> -->

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