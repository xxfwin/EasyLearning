var toprunflag=1;
//顶部导航条
function closeMessage(){
	$("#showMessage").hide();
}

//每30秒执行 
$('body').everyTime('30s',function(){ 
	getTopNum();
});

function getTopNum(){
	if(toprunflag==1){
		var param=new Object();
		submitCommon(param,"getTopNum","doGetTopNum");
	}
}
function doGetTopNum(data){
	var flag=data["flag"];
	if(flag==1){
		var uid=data["uid"];
		var topnum1=data["topnum1"];
		var topnum2=data["topnum2"];
		var topnum3=data["topnum3"];
		var topnum4=data["topnum4"];
		var topnum5=data["topnum5"];
		var topnum6=data["topnum6"];
		var topnum7=data["topnum7"];
		var msg="";
		if(parseInt(topnum1)>0){
			msg=msg+'<li>'+topnum1+' 条新评论， <a onclick="clearNum(1)" href="'+base+'/user/wb_pl.htm">查看评论</a></li>';
		}
		if(parseInt(topnum2)>0){
			msg=msg+'<li>'+topnum2+' 位新粉丝， <a onclick="clearNum(2)" href="'+base+'/user/wb_fs.htm">查看粉丝</a></li>';
		}
		if(parseInt(topnum3)>0){
			msg=msg+'<li>'+topnum3+' 条新私信， <a onclick="clearNum(3)" href="'+base+'/user/wb_sms.htm">查看私信</a></li>';
		}
		if(parseInt(topnum4)>0){
			msg=msg+'<li>'+topnum4+' 个@我的， <a onclick="clearNum(4)" href="'+base+'/user/wb_me.htm">查看@我</a></li>';
		}
		if(parseInt(topnum5)>0){
			msg=msg+'<li>'+topnum5+' 条新通知， <a onclick="clearNum(5)" href="'+base+'/user/wb_notice.htm">查看通知</a></li>';
		}
		if(parseInt(topnum6)>0){
			msg=msg+'<li>'+topnum6+' 条新消息， <a onclick="clearNum(6)" href="'+base+'/user/wb_news.htm">查看消息</a></li>';
		}
		if(parseInt(topnum7)>0){
			msg=msg+'<li>'+topnum7+' 个报名申请， <a onclick="clearNum(7)" href="'+base+'/user/cloud_batch.htm?uid='+uid+'">查看教学</a></li>';
		}
		if(msg!=""){
			$("#messageList").html(msg);
			$("#showMessage").show();
		}
	}
}
function topFocus(){
	toprunflag=1;
}
function topBlur(){
	toprunflag=0;
}
//先执行
$(document).ready(function(){
  getTopNum();
  	window.onload=function(){
		toprunflag=1;
	};
	window.onfocus=function(){
		toprunflag=1;
	};
	window.onblur=function(){
		toprunflag=0;
	}; 
});

function clearNum(id){
	var param=new Object();
	param["id"]=id;
	submitCommon(param,"clearNum","doClearNum");
}
function doClearNum(data){
}
