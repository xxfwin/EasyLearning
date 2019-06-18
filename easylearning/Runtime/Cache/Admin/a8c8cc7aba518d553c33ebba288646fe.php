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
							
							<li class="active">笔记购物车</li>
							
						</ul><!-- .breadcrumb -->

					</div>

					<div class="page-content">
						<div class="page-header">
						<a class="label label-xlg label-primary arrowed-in-right " href="<?php echo U('Notecart/index');?>">
							返回</a>
							<div class="table-responsive" >
								<form class="form-horizontal" action="<?php echo U('Notecart/add');?>" method="post" id="myform">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Facts： </label>

										<div class="col-sm-9">
											<?php if(is_array($facts)): $i = 0; $__LIST__ = $facts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tempval): $mod = ($i % 2 );++$i;?><td class="">
													<input type="checkbox" class="ace" name="facts<?php echo ($tempval['tipid']); ?>"  value="<?php echo ($tempval['tipid']); ?>"  />
													<span class="lbl"><?php echo ($tempval['tipcontent']); ?></span>
												</td><?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> AnnotationSpace： </label>

										<div class="col-sm-9">
											<input type="checkbox" class="ace" name="as"  value="<?php echo ($note['id']); ?>"  />
											<span class="lbl"><?php echo ($note['text']); ?></span>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> CommonMistakes： </label>

	
											<div class="col-sm-9">
											<?php if(is_array($cm)): $i = 0; $__LIST__ = $cm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tempval): $mod = ($i % 2 );++$i;?><td class="">
													<input type="checkbox" class="ace" name="cm<?php echo ($tempval['tipid']); ?>"  value="<?php echo ($tempval['tipid']); ?>"  />
													<span class="lbl"><?php echo ($tempval['tipcontent']); ?></span>
												</td><?php endforeach; endif; else: echo "" ;endif; ?>
											</div>
			
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> OtherSays： </label>

										<div class="col-sm-9">
											<div class="col-sm-9">
											<?php if(is_array($os)): $i = 0; $__LIST__ = $os;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tempval): $mod = ($i % 2 );++$i;?><td class="td<?php echo ($val["id"]); ?>">
													<input type="checkbox" class="ace" name="os<?php echo ($tempval['tipid']); ?>"  value="<?php echo ($tempval['tipid']); ?>"  />
													<span class="lbl"><?php echo ($tempval['tipcontent']); ?></span>
												</td><?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
										</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" id="button" type="submit">
												<i class="icon-ok bigger-110"></i>
												加入购物车
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
									</div>
								</form>
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