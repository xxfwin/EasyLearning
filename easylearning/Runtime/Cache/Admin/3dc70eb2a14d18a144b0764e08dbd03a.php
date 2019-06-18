<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>

		<style type="text/css">
		
		.onShow{
			height:30px;display:block;float:right;margin-right:336px;width:138px
		}
		.onError{
			height:30px;display:block;float:right;margin-right:336px;width:138px
		}
		.onFocus{
			height:30px;display:block;float:right;margin-right:336px;width:138px
		}
		.onCorrect{
			height:30px;display:block;float:right;margin-right:336px;width:138px
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
								<a href="#">首页</a>
							</li>

							<li>
								<a href="<?php echo U('Node/index');?>">节点列表</a>
							</li>
							<li class="active">修改节点</li>
						</ul><!-- .breadcrumb -->

					
					</div>

					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed " href="<?php echo U('Node/index');?>">
							返回列表</a>
							
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" action="" method="post" id="myform">
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 上一级： </label>
									
										<div class="col-sm-3">
											
											<select   class="form-control"  name="pid" id="pid">
												<option value="0">请选择权限</option>
												 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($info["pid"] == $v['id']): ?>selected=selected<?php endif; ?> ><?php echo ($v["title"]); ?></option>
													 <?php if(is_array($v["child"])): $i = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($info["pid"] == $vo['id']): ?>selected=selected<?php endif; ?> > &nbsp;└-<?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
											</select>
											 
										</div>

										
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ActionName： </label>

										<div class="col-sm-9">
											<input type="text" id="name" placeholder="控制器/方法区分大小写" class="col-sm-4" name="name"  value="<?php echo ($info["name"]); ?>" />
											
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> RealName： </label>

										<div class="col-sm-9">
											<input type="text" id="title" placeholder="控制器/方法的别名" class="col-sm-4" name="title" value="<?php echo ($info["title"]); ?>" />
											
										</div>
									</div>
									
                                  
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 排序： </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="排序" class="input-large"  name="sort" value="<?php echo ($info["sort"]); ?>" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">图标： </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-2" placeholder="图标" class="input-large"  name="icon" value="<?php echo ($info["icom"]); ?>" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否开启： </label>

										<div class="col-sm-9">
										<label>
											<input name="status" type="radio" <?php if($info["status"] == '开启'): ?>checked=checked<?php endif; ?> class="ace" value="开启" />
											<span class="lbl">&nbsp;开启</span>
										</label>
										<label>	
											<input name="status" type="radio" <?php if($info["status"] == '关闭'): ?>checked=checked<?php endif; ?> class="ace" value="关闭" />
											<span class="lbl">&nbsp;关闭</span>
										</label>	
									
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 设为菜单： </label>

										<div class="col-sm-9">
										<label>
											<input name="type" type="radio" <?php if($info["type"] == '是'): ?>checked=checked<?php endif; ?> class="ace" value="是" />
											<span class="lbl">&nbsp;是</span>
										</label>
										&nbsp;
										<label>
											<input name="type" type="radio" <?php if($info["type"] == '否'): ?>checked=checked<?php endif; ?>class="ace" value="否" />
											<span class="lbl">&nbsp;否</span>
										</label>	
									
										</div>
									</div>
									

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
											<button class="btn btn-info" id="button" type="button">
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
			var name=$("#name").val();
			var title=$("#title").val();
			
			if(name==''){
				layer.alert('控制器/方法必须填写', {icon: 5});
				return false;
			}else if(title==''){
				layer.alert('控制器/方法的别名必须填写', {icon: 5});
				return false;
			}else{
				$("#myform").submit();
			}
		});
	});
</script>