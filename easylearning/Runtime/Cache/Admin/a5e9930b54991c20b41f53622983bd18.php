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

							<li>
								<a href="<?php echo U('Incident/index');?>">事故信息</a>
							</li>
							<li class="active">修改事故信息</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
						 <a class="label label-xlg label-primary arrowed " href="<?php echo U('Incident/index');?>">
							返回列表</a>

						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" action="" method="post" id="myform">
									<!-- 选择分类 -->
								<!--  <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分类： </label>

										<div class="col-sm-3">

											<select   class="form-control"  name="cate_id" id="cate">
												<option value="0">请选择分类</option>
												 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($info["cate_id"] == $v['id']): ?>selected=selected<?php endif; ?>><?php echo ($v["cate"]); ?></option>
													 <?php if(is_array($v["child"])): $i = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($info["cate_id"] == $vo['id']): ?>selected=selected<?php endif; ?>>&nbsp;└-<?php echo ($vo["cate"]); ?></option>

												    <?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($info["cate_id"] == $val['id']): ?>selected=selected<?php endif; ?>>&nbsp;&nbsp;└-<?php echo ($val["cate"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
											</select>

										</div>


									</div> -->

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户ID： </label>

										<div class="col-sm-9">
											<input type="text" id="userid" placeholder="用户ID" class="col-sm-4" name="userid"  value="<?php echo ($info["userid"]); ?>" />

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 电话： </label>

										<div class="col-sm-9">
											<input type="text" id="phone" placeholder="用户电话" class="col-sm-4" name="phone"  value="<?php echo ($info["phone"]); ?>" />

										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 故障部位： </label>

										<div class="col-sm-9">
											<input type="text" id="carposition" placeholder="故障部位" class="col-sm-4" name="carposition"  value="<?php echo ($info["carposition"]); ?>" />

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 案件号： </label>

										<div class="col-sm-9">
											<input type="text" id="position" placeholder="案件号" class="col-sm-4" name="position"  value="<?php echo ($info["position"]); ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 事故类型： </label>
										
										
										<div class="col-sm-9">

											<select class="form-control"   style="width:150px" name="faultyid" id="faultyid">
												<?php if(is_array($faultyinfo)): $i = 0; $__LIST__ = $faultyinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($info[faultyid] == $v[id]): ?>selected=selected<?php endif; ?>>
													<?php echo($v[type].$v[condition]) ?>
													</option><?php endforeach; endif; else: echo "" ;endif; ?>
											
											
											</select>

										</div>
										<!-- <div class="col-sm-9">
											<input type="text" id="faultyid" placeholder="事故类型ID" class="col-sm-4" name="faultyid"  value="<?php echo ($info["faultyid"]); ?>" />

										</div> -->
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 出险时间： </label>

										<div class="col-sm-9">
											<input type="text" id="date" placeholder="发生时间" class="col-sm-4"  name="date" value="<?php echo ($info["date"]); ?>" />

										</div>
									</div>
									 
									 <div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 状态： </label>
									<div class="col-sm-9">
									<select class="form-control"  style="width:150px" name="status" id="status">				

									<?php if($info["status"] == 1): ?><option value="1">已处理</option>
									<option value="2">已到达维修厂</option>
									<option value="3">已完成维修</option>
									<option value="4">待审核</option>
									<option value="5">未通过</option><?php endif; ?>
									<?php if($info["status"] == 2): ?><option value="2">已到达维修厂</option>
									<option value="1">已处理</option>
									<option value="3">已完成维修</option>
									<option value="4">待审核</option>
									<option value="5">未通过</option><?php endif; ?>
									<?php if($info["status"] == 3): ?><option value="3">已完成维修</option>
									<option value="1">已处理</option>
									<option value="2">已到达维修厂</option>
									<option value="4">待审核</option>
									<option value="5">未通过</option><?php endif; ?>
									<?php if($info["status"] == 4): ?><option value="4">待审核</option>
									<option value="1">已处理</option>
									<option value="2">已到达维修厂</option>
									<option value="3">已完成维修</option>
									<option value="5">未通过</option><?php endif; ?>
									<?php if($info["status"] == 5): ?><option value="5">未通过</option>
									<option value="1">已处理</option>
									<option value="2">已到达维修厂</option>
									<option value="3">已完成维修</option>
									<option value="4">待审核</option><?php endif; ?>
									
									
									</select>
									
									</div>

									</div>
									<!-- <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 状态： </label>

										<div class="col-sm-9">
											<input type="text" id="status" placeholder="状态" class="col-sm-4"  name="status" value="<?php echo ($info["status"]); ?>" />

										</div>
									</div> -->
									
									
									<?php if(($role == 1) ): ?><div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 定损员： </label>
									<div class="col-sm-9">
									<select class="form-control"  style="width:150px" name="auditor_id" id="auditor_id">
										<option value=""></option>
										<?php if(is_array($auditorlist)): $i = 0; $__LIST__ = $auditorlist;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo[id]); ?>" <?php if($vo[id] == $info[auditor_id]): ?>selected="selected"<?php endif; ?>><?php echo ($vo[nickname]); ?></option><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
									
									</select>
									
									</div>

									</div><?php endif; ?>
									
									
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 维修厂： </label>
									<div class="col-sm-9">
									<select class="form-control"  style="width:150px" name="factoryid" id="factoryid">
										<option value=""></option>
										<?php if(is_array($factorylist)): $i = 0; $__LIST__ = $factorylist;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo[id]); ?>"<?php if($vo[id] == $info[factoryid]): ?>selected="selected"<?php endif; ?>><?php echo ($vo[name]); ?></option><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
									
									</select>
									
									</div>

									</div>
									<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 候选维修厂： </label>
									<div class="col-sm-9">
											
										<?php if(is_array($candidatefactorylist)): $i = 0; $__LIST__ = $candidatefactorylist;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="candidatefactoryid[]" value="<?php echo ($vo['id']); ?>" <?php if($vo['check'] == 1): ?>checked = "checked"<?php endif; ?> ><?php echo ($vo['name']); ?></input>
										</if><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
										
										
									
									</div>

									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 车ID： </label>

										<div class="col-sm-9">
											<input type="text" id="carid" placeholder="车ID" class="col-sm-4"  name="carid" value="<?php echo ($info["carid"]); ?>" />

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否三者车： </label>

										<div class="col-sm-9">
											<select class="form-control"  style="width:150px" name="is_thirdparty" id="is_thirdparty">				
												<option value="1" <?php if(1 == $info[is_thirdparty]): ?>selected="selected"<?php endif; ?>>是</option>
												<option value="0" <?php if(0 == $info[is_thirdparty]): ?>selected="selected"<?php endif; ?>>否</option>
									</select>

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 三者车ID： </label>

										<div class="col-sm-9">
											<input type="text" id="thirdparty_id" placeholder="三者车ID" class="col-sm-4"  name="thirdparty_id" value="<?php echo ($info["thirdparty_id"]); ?>" />

										</div>
									</div>
									<!-- <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否推荐： </label>

										<div class="col-sm-9">
										<label>
											<input name="recommend" type="radio" class="ace" value="推荐" />
											<span class="lbl">&nbsp;推荐</span>
										</label>
										<label>
											<input name="recommend" type="radio" class="ace" value="未推荐" />
											<span class="lbl">&nbsp;未推荐</span>
										</label>

										</div>
									</div> -->
									<!-- <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否置顶： </label>

										<div class="col-sm-9">
										<label>
											<input name="top" type="radio" class="ace" value="置顶" />
											<span class="lbl">&nbsp;置顶</span>
										</label>
										<label>
											<input name="top" type="radio" class="ace" value="未置顶" />
											<span class="lbl">&nbsp;未置顶</span>
										</label>

										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否审核： </label>

										<div class="col-sm-9">
										<label>
											<input name="audit" type="radio"  class="ace" value="审核不通过" />
											<span class="lbl">&nbsp;审核不通过</span>
										</label>
										<label>
											<input name="audit" type="radio"    class="ace" value="审核通过" />
											<span class="lbl">&nbsp;审核通过</span>
										</label>
										<label>
											<input name="audit" type="radio"  class="ace" value="待审核" />
											<span class="lbl">&nbsp;待审核</span>
										</label>

										</div>
									</div> -->
								   <!-- <div class="form-group" style="display: none;">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 图片上传： </label>

										<div class="col-sm-9">
											<input type="button" id="J_selectImage" value="批量上传" />
		                                    <div id="J_imageView"></div>

										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 投保人内容： </label>

										<div class="col-sm-7 col-xs-4">
			 <textarea id="desc" name="content" style="width:700px;height:300px;"><?php echo ($info["content"]); ?>
</textarea>

										</div>
									</div>



								<div class="form-group"> -->





									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
											<button class="btn btn-info" id="button" type="submit">
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
		$("#button").click(function(){

						var userid=$("#userid").val();
						var faultyid=$("#faultyid").val();
						var count=$("#count").val();
						var date=$("#date").val();
						var status=$("#status").val();
						var factoryid=$("#factoryid").val();
						var carid=$("#carid").val();
						var is_thirdparty=$("#is_thirdparty").val();

						if(userid==''){
							layer.alert('用户ID必须填写', {icon: 5});
							return false;
						}else if(faultyid==''){
							layer.alert('故障号必须填写', {icon: 5});
							return false;
						}else if(date==''){
							layer.alert('日期必须填写', {icon: 5});
							return false;
						}else if(status==''){
							layer.alert('状态必须填写', {icon: 5});
							return false;
						}else if (carid=='') {
							layer.alert('车辆ID必须填写', {icon: 5});
							return false;
						}else if (is_thirdparty=='') {
							layer.alert('是否三者车必须填写', {icon: 5});
							return false;
						}else {
							$("#myform").submit();
						}
		});
	});
</script>

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
		$('#enddate').datetimepicker({
			lang:'ch',
			step:30,
		});

		});
</script>