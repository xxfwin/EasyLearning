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
								<a href="#">首页</a>
							</li>
						</ul><!-- .breadcrumb -->


					</div>

					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed " href="<?php echo U('Thirdparty/index');?>">
							返回列表</a>

							<!-- 引入拖拽库 -->
							<link href='/moodle/easylearning/Public/dragula/dragula.css' rel='stylesheet' type='text/css' />
							<link href='/moodle/easylearning/Public/dragula/example/example.css' rel='stylesheet' type='text/css' />
							<script src='/moodle/easylearning/Public/dragula/dragula.js'></script>
							<script src="/moodle/easylearning/Public/admin/js/ace-extra.min.js"></script>
						
							
							
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-7">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" action=  "<?php echo U('Notecart/submit');?>"  method="post" id="myform">
														<div class="form-group">
														<p class="label label-xlg label-primary arrowed " >
																购物车列表</p>
														

					
															<div class='parent'>
																
																<div class='wrapper'>
																	  <div  class='container notecart left'>
																		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="note"  value="<?php echo ($v['id']); ?>" name="<?php echo ($i); ?>"><input type="hidden" name="<?php echo ($i); ?>">
																				<?php echo ($v['name']); ?>
																				<div style="float:right">
																					<a class="del"  style="cursor: pointer;">[删除]</a>
																				</div>
																			</div><?php endforeach; endif; else: echo "" ;endif; ?>
																	  </div>
																	 
																</div>
																
															</div>
														</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
										<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
											<button class="btn btn-info" id="button" type="submit"  value="<?php echo ($v['id']); ?>">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>


										</div>
									</div>
								</form>
							</div><!-- /.col -->
							<!-- 在右边点击显示每个笔记的内容 -->
							<div class="col-xs-5">
							<p class="label label-xlg label-primary arrowed " >
							在这里显示左边购物车的内容</p>
							<div>
								<p id="showNote">test</p>
							</div>
							</div>
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
	
	
</script>
<!-- 点击左边的每一个笔记，在右边显示相应的内容 -->
<script type="text/javascript">
	$(function(){
		//拖动
		var lefts = document.getElementsByClassName("left");
		for(var i=0;i<lefts.length;i++){
			dragula([lefts[i]]);
		}
		//点击左侧列表，在右侧显示购物车内容
		$(".note").click(function(){
			var nid = $(this).attr('value');
                
			$.post("<?php echo U('Notecart/shop');?>",{id:nid},
				function(result){
					$("#showNote").html(result);
				}
				//"json"
			);
		});
/*                      $('#button').click(function(){
                        var nid = $(this).attr('value');

                        $.post("<?php echo U('Notecart/submit');?>",{id:nid},
                                function(result){
                                 
                                }
                                //"json"
                        );
                });

*/		//删除
		$(".del").click(function(){
			$(this).parent().parent().remove();
			var nid = $(this).parent().parent().attr('value');
			$.post("<?php echo U('Notecart/del');?>",{id:nid},
				function(result){
					
				}
				//"json"
			);
		});
	});


</script>