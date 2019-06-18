<?php if (!defined('THINK_PATH')) exit(); echo W('TopBar/topbar');?>
<style type="text/css">
    .wminimize:hover {
        text-decoration: none;
    }

    .table thead>tr>th,
    .table tbody>tr>th,
    .table tfoot>tr>th,
    .table thead>tr>td,
    .table tbody>tr>td,
    .table tfoot>tr>td {
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


            <div class="page-content">


                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3" style="margin-top:130px;">
                                <div class="login-panel  panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" style="font-family: 微软雅黑;font-size:20px"><?php echo C('COMM_TITLE');?>提示页面</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div class="form-group" style="height:200px;width:400px;overflow:hidden">

                                            <div class="success" style="font-family: 微软雅黑;margin-left:150px;line-height:8">
											<!-- <img src="/moodle/easylearning/Public/admin/img/success.gif"> -->
											<span style="margin-left:20px;font-size:16px"><?php echo($message); ?></span></div>
                                            <div class="success" style="font-family: 微软雅黑;margin-left:150px;">页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b></div>

                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>
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
        (function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
    var time = --wait.innerHTML;
    if(time <= 0) {
        location.href = href;
        clearInterval(interval);
    };
}, 1000);
})();

    </script>