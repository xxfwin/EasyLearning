<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/font-awesome.css?v=1453653603" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/mobile_module.css?v=1453653603" media="all">

	<title>添加用户车辆到您的维修厂</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="shortcut icon" href="http://weixin.microbye.com/favicon.ico">
</head>	
<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
<body>
	<div id="container" class="container body">
    	<div class="block_content_bg p_10"> 
		            <div class="block_content_top_min">
                <center>请输入您的账户密码</center>
            </div>
        <!-- 表单 -->
                <form id="form" action="#" method="post" class="form-horizontal">
          <!-- 基础文档模型 -->
          <div id="tab1" class="tab-pane in              tab1">
			  
					<div class="form-item cf"></div> <div class="form-item cf"></div> 

                  <div class="form-item cf" id="usernameform" >
						<label class="item-label">
                                        帐户名                    <span class="check-tips">
                                            </span></label>
                    <div class="controls">
                      <input type="text" class="text input-large" name="username" value="">                    </div>
                  </div>                
				  <div class="form-item cf" id="passwordform" >
                    <label class="item-label" >
                                        密码                    <span class="check-tips">
                                            </span></label>
                    <div class="controls">
                      <input type="password" class="text input-large" name="password" value="">                    </div>
                  </div>
				  	
				  
				<div class="form-item cf">
            
            <button class="home_btn submit-btn mb_10 mt_10" id="submit" type="submit" target-form="form-horizontal">确 定</button>
            </div>
        </form>
      </div>
  </div>
 <block name="script">


 
</body>