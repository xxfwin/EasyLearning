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
                <script type="text/javascript">try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}</script>

                <ul class="breadcrumb">
                    <li> <i class="icon-home home-icon"></i>
                        <a href="<?php echo U('Index/index');?>">首页</a>
                    </li>

                    <li>
                        <a href="#">维修厂信息</a>
                    </li>
                    <li class="active">维修厂列表</li>
                </ul>
                <!-- .breadcrumb --> </div>

            <div class="page-content">
                <div class="page-header">
				<?php if($role != 8): ?><form action="" method="get">
                        <div style="margin-bottom:10px;" class="col-sm-11">

                            <!-- 保留查询功能 -->
                            <div class="col-sm-3" style="margin-left:-24px;">

                                <select   class="form-control"  style="width:120px" name="star" id="star">
                                    <option value="0">请选择星级</option>
                                    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["star"]); ?>"<?php if($_GET['star']== $v['star']): ?>selected=selected<?php endif; ?>
                                        ><?php echo ($v["star"]); ?>
                                    </option>
                                    <!--<?php if(is_array($v["child"])): $i = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($_GET['pid']== $vo['id']): ?>selected=selected<?php endif; ?>
                                    >&nbsp;└-<?php echo ($vo["cate"]); ?>
                                </option>

                                <?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($_GET['pid']== $val['id']): ?>selected=selected<?php endif; ?>
                                    >&nbsp;&nbsp;└-<?php echo ($val["cate"]); ?>
                                </option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                        --><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>

            </div>

            <!-- <span class="input-icon input-icon-right" style="margin-left:-107px;">
            <input  type="text" id="starTime" placeholder="开始时间" name="starTime" style="height:32px;" value="<?php echo ($_GET['starTime']); ?>"></span>
        -->
        <span class="input-icon input-icon-right " style="margin-left:-120px;">
            <input  type="text" id="name" placeholder="姓名" name="name" style="height:32px;width:120px;" value="<?php echo ($_GET['name']); ?>"></span>
        <input  class=" btn-lg btn-success btn btn-xs btn-danger" type="submit" value="搜索"></div>
    
    <?php if($role == 1): ?><a class="label label-xlg label-primary arrowed-right pull-right " href="<?php echo U('Factory/add');?>">添加维修厂</a><?php endif; ?>
</form><?php endif; ?>

</div>
<div class="form-group"></div>

<div class="row">
<div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="sample-table-1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
							<?php if($role == 1): ?><th>操作</th><?php endif; ?>
							<?php if($role == 8): ?><th>操作</th><?php endif; ?>
                            <th>ID</th>
                            <th>地址</th>
                            <th>星级</th>
                            <th>名字</th>
                            <th>锁定</th>
                            <th>优先级</th>
							<?php if($role == 1): ?><th>对应账户</th><?php endif; ?>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
							
															<?php if($role == 1): ?><td>
                                        <div class="btn-group">

                                            <a href="<?php echo U('Factory/edit',array('id'=> $v['id']));?>" class="btn btn-xs btn-info"> <i class="icon-edit bigger-120"></i>
                                            </a>

                                            <a onclick="if(confirm('确认删除?'))
        location.href='<?php echo U('Factory/del',array('id'=> $v[id]));?>'"  href="javascript:;" class="btn btn-xs btn-danger">
                                                <i class="icon-trash bigger-120"></i>
                                            </a>

                                        </div>

                                    </td><?php endif; ?>
                                <?php if($role == 8): ?><td>
                                    <a href="<?php echo U('Factory/edit',array('id'=> $v['id']));?>" class="btn btn-xs btn-info">
                                        <i class="icon-edit bigger-120"></i>
                                    </a>
									</td><?php endif; ?>
								
                                <td><?php echo ($v["id"]); ?></td>
                                <td><?php echo ($v["address"]); ?></td>
                                <td><?php echo ($v["star"]); ?></td>
                                <td><?php echo ($v["name"]); ?></td>
                               <?php if($v[lock] == 1): ?><td>已锁定</td>
									
									<?php elseif($v[lock] == 0): ?>
									<td>未锁定</td>
									<?php else: endif; ?>
									<td><?php echo ($v["priority"]); ?></td>
                                <?php if($role == 1): ?><td>
										<?php echo ($v["accountid"]); ?>
									</td><?php endif; ?>	

                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
                </table>

            </div>
            <!-- /.table-responsive -->
            <div class="col-sm-6 pull-right">
                <div class="dataTables_paginate paging_bootstrap ">
                    <ul class="pagination "><?php echo ($page); ?></ul>
                </div>
            </div>
        </div>
        <!-- /span --> </div>
    <!-- /row -->

</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.page-content -->
</div>
<!-- /.main-content -->

</div>
<!-- /.main-container-inner -->
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