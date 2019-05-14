
function atInfo(msg,fun){
	msg='<p class="p_font" style="padding:10px 0px 10px 0px;"><img class="sign_warn" src="'+base+'/images/user/transparent.gif" /> '+msg+'</p>';
	if(fun==undefined){
		$.dialog({
			id:"atInfo",
			title:"信息提示",
			zIndex: 9999,
			width:280,
			fixed: true,
			lock: true,
			content:msg,
			okValue:"确定",
			ok: function () {
				return true;
			}
		});
	}else{
		$.dialog({
			id:"atInfo",
			title:"信息提示",
			zIndex: 9999,
			width:280,
			fixed: true,
			lock: true,
			content:msg,
			okValue:"确定",
			beforeunload:fun,
			ok: function () {
				return true;
			}
		});
	}
}

function atConfirm(msg,cb,cancel){
	if(cancel==undefined){
		cancel=true;
	}
	msg='<p class="p_font" style="padding:10px 0px 10px 0px;"><img class="sign_ask" src="'+base+'/images/user/transparent.gif" /> '+msg+'</p>';
	$.dialog({
			id:"atConfirm",
			title:"确认提示",
			zIndex: 9999,
			width:280,
			fixed: true,
			lock: true,
			content:msg,
			cancelValue:"取消",
			cancel:cancel,
			okValue:"确定",
			ok:cb
		});
}

function atConfirm2(msg,cb,cancel){
	if(cancel==undefined){
		cancel=true;
	}
	msg='<p class="p_font" style="padding:10px 0px 10px 0px;"><img class="sign_ask" src="'+base+'/images/user/transparent.gif" /> '+msg+'</p>';
	$.dialog({
			id:"atConfirm2",
			title:"确认提示",
			zIndex: 9999,
			width:280,
			fixed: true,
			lock: true,
			content:msg,
			cancelValue:"取消",
			cancel:cancel,
			okValue:"确定",
			ok:cb
		});
}

function atPage(title,pagename,param,width,height,closeflag,name,zIndex){
	atPageClose();
	var showtitle=true;
	if(title==""){
		showtitle=false;
	}
	if(width==undefined){
		width=300;
	}
	if(height==undefined){
		height=200;
	}
	if(closeflag==undefined){
		closeflag=true;
	}
	if(name==undefined){
		name="";
	}
	if(zIndex==undefined){
		zIndex=9998;
	}
	var page=pagename+"_pop.htm";
	if(param!=""){
		page=page+"?"+param;
	}
	if(closeflag==true){
		if(showtitle==true){
			$.dialog({
				id:"atPage"+name,
				title:title,
				zIndex: zIndex,
				padding: 0,
				width:width,
				height:height,
				content:"<iframe id='pageiframe' src='"+page+"' frameborder='0' scrolling='no' width='"+width+"' height='"+height+"'></iframe>",
				fixed: true,
				lock: true,
				beforeunload: function () {
					try{
						closeAtPage(pagename,param);
					}catch(e){}
					return true;
				},
				ok:false
			});
		}else{
			$.dialog({
				id:"atPage"+name,
				title:false,
				zIndex: zIndex,
				padding: 0,
				content:"<iframe id='pageiframe' src='"+page+"' frameborder='0' scrolling='no' width='"+width+"' height='"+height+"'></iframe>",
				fixed: true,
				lock: true,
				ok:false,
				cancel:false
			});
		}
	}else{
		if(showtitle==true){
			$.dialog({
				id:"atPage"+name,
				title:title,
				zIndex: zIndex,
				padding: 0,
				width:width,
				height:height,
				esc:false,
				content:"<iframe id='pageiframe' src='"+page+"' frameborder='0' scrolling='no' width='"+width+"' height='"+height+"'></iframe>",
				fixed: true,
				lock: true,
				ok:false
			});
		}else{
			$.dialog({
				id:"atPage"+name,
				title:false,
				zIndex: zIndex,
				padding: 0,
				content:"<iframe id='pageiframe' src='"+page+"' frameborder='0' scrolling='no' width='"+width+"' height='"+height+"'></iframe>",
				fixed: true,
				lock: true,
				ok:false,
				esc:false,
				cancel:false
			});
		}
	}
}

function atUrl(title,url,width,height){
	atUrlClose();
	var showtitle=true;
	if(title==""){
		showtitle=false;
	}
	if(width==undefined){
		width=300;
	}
	if(height==undefined){
		height=200;
	}
	var zIndex=9998;
	if(showtitle==true){
			$.dialog({
				id:"atUrl",
				title:title,
				zIndex: zIndex,
				padding: 0,
				width:width,
				height:height,
				content:"<iframe id='pageiframe' src='"+url+"' frameborder='0' scrolling='no' width='"+width+"' height='"+height+"'></iframe>",
				fixed: true,
				lock: true,
				ok:false
			});
		}else{
			$.dialog({
				id:"atUrl",
				title:false,
				zIndex: zIndex,
				padding: 0,
				content:"<iframe id='pageiframe' src='"+url+"' frameborder='0' scrolling='no' width='"+width+"' height='"+height+"'></iframe>",
				fixed: true,
				lock: true,
				ok:false,
				cancel:false
			});
		}
}

function atDelete(title,showid,id){
	atDeleteClose();
	var msg='<div class="layer_info_tips" style="margin-left:-25px;"><p class="p_font"><img class="sign_ask" src="'+base+'/images/user/transparent.gif" /> '+title+'</p><p class="btn_bar"><a class="com_btn_b" href="javascript:;" onclick="deleteOk('+id+');atDeleteClose();"><span>确定</span></a> &nbsp; <a class="com_btn_grey" href="javascript:;" onclick="atDeleteClose();"><span>取消</span></a></p></div>';
	$.dialog({
		id:"atDelete",
		title:false,
		zIndex:999999,
		content:msg,
		follow: document.getElementById(showid),
		cancel:false,
		padding: 0,
		initialize: function () {	
			var wrap = this.dom.wrap[0];
			var wrapHeight = wrap.offsetHeight;
			var top=this.dom.wrap.css("top");
			var t=parseInt(top.substring(0,top.length-2))-parseInt(wrapHeight)-25;
			this.dom.wrap.css("top",t+"px");
		},
		beforeunload: function () {
			return true;
		}
	});	
}


function atSuccess(msg){
	if(msg==undefined){
		msg="操作成功";
	}
	var content='<div class="layer_info_tips" style="margin-left:-30px;width:350px;"><p class="p_font"><img class="sign_warn" src="'+base+'/images/user/transparent.gif" />'+msg+'</p></div>';
	$.dialog({
			id:"atSuccess",
			title:false,
			zIndex: 9996,
			padding: 0,
			content:content,
			fixed: true,
			lock: false,
			ok:false,
			cancel:false,
			time:2000
		});
}



function atPageClose(name){
	if(name==undefined){
		name="";
	}
	var dialog = $.dialog.get('atPage'+name);
	if(dialog!=undefined){
		dialog.close();
	}
}
function atUrlClose(){
	var dialog = $.dialog.get('atUrl');
	if(dialog!=undefined){
		dialog.close();
	}
}

function atDeleteClose(){
	var dialog = $.dialog.get('atDelete');
	if(dialog!=undefined){
		dialog.close();
	}
}

function atPageResize(width,height){
	var dialog = $.dialog.get('atPage');
	if(dialog!=undefined){
		//dialog.size(width, height);
		dialog.size(width, height);
		$("#pageiframe").height(height);
		//atPage(at_title,at_pagename,at_param,width,height,at_closeflag);
	}
}