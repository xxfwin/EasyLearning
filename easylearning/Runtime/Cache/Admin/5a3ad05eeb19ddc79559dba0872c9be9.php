<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>

		<style type="text/css">
		
		.onShow{
			height:30px;display:block;float:right;margin-right:335px;width:140px
		}
		.onError{
			height:30px;display:block;float:right;margin-right:335px;width:140px
		}
		.onFocus{
			height:30px;display:block;float:right;margin-right:335px;width:140px
		}
		.onCorrect{
			height:30px;display:block;float:right;margin-right:335px;width:140px
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
								<a href="<?php echo U('Admin/index');?>">管理员列表</a>
							</li>
							<li class="active">修改管理员</li>
						</ul><!-- .breadcrumb -->

					
					</div>

					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed " href="<?php echo U('Admin/index');?>">
							返回列表</a>
							
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" action="" method="post" id="myform">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员名称： </label>

										<div class="col-sm-9">
											<input type="text" id="username" placeholder="管理员名称" class="col-xs-5" name="username" value="<?php echo ($info["username"]); ?>" disabled="disabled"/>
											 
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 用户姓名： </label>
									
										<div class="col-sm-3">
											
											<select   class="form-control"  name="weixinid" id="weixinid">
												<option value="0">请选择用户</option>
												 <?php if(is_array($infoRole)): $i = 0; $__LIST__ = $infoRole;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($info["role_id"] == $v['id']): ?>selected="selected"<?php endif; ?>><?php echo ($v["nickname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
											</select>
											 
										</div>

									
									</div>
									

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
										<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
											<button class="btn btn-info" type="submit">
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

<script type="text/javascript">
$(function(){
	$.formValidator.initConfig({formID:"myform",debug:false,submitOnce:true
		
	});
	$("#username").formValidator({onShow:"请输入用户名",onFocus:"用户名4-10个字符",onCorrect:"该用户名可以注册"}).inputValidator({min:4,max:10,onError:"你输入的用户名非法"})
	    .ajaxValidator({
		async : false,
		url :"<?php echo U('Admin/check_user');?>",
		success : function(data){

			if(data==0){
				return true;
			}else if(data==1){
				return false;
			}
			else{
				return false;
			}
		},
		buttons: $("#button"),
		error: function(jqXHR, textStatus, errorThrown){alert("服务器没有返回数据，可能服务器忙，请重试"+errorThrown);},
		onError : "用户名已存在",
		onWait : "正在对用户名进行合法性校验，请稍候..."
	}).defaultPassed();
	$("#password").formValidator({onShow:"填写密码",onFocus:"填写6位以上密码",onCorrect:"密码已经输入"}).inputValidator({min:6,onError:"填写6位以上密码"}).defaultPassed();
	
	$("#repass").formValidator({onShow:"再次输入密码",onFocus:"至少6个长度",onCorrect:"密码一致"}).inputValidator({min:1,empty:{leftEmpty:false,rightEmpty:false},onError:"重复密码不能为空"}).compareValidator({desID:"password",operateor:"=",onError:"2次密码不一致"});
	$("#role").formValidator({onShow:"选择权限组",onFocus:"选择权限组",onCorrect:"权限组已选择"}).inputValidator({min:1,onError:"选择权限组"}).defaultPassed();
	
   
   
});
</script>