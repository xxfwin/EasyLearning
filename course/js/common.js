
//自动翻页
function autoPage(num){
if(num<=0){
	getPageUrl();
}
}

//select
function selected(name,value){
	$("select[@name='"+name+"'] option").each(function(){
		var val=$(this).val();
		//判断是否有
		if(val==value){
			$(this).attr("selected",true);
		}
	});
}


//select
function selectall(name){
	$("input[name='"+name+"']").each(function(){
		$(this).attr("checked",true);
	});
}

//select
function unselectall(name){
	$("input[name='"+name+"']").each(function(){
		$(this).attr("checked",false);
	});
}

//select
function getRadioValue(name){
	var val="";
	$("input[name='"+name+"']").each(function(){
		if($(this).attr("checked")){
			val=$(this).val();
		}
	});
	return val;
}
//select
function getCheckboxValue(name){
	var val="";
	$("input[name='"+name+"']").each(function(){
		if($(this).attr("checked")){
			if(val==""){
				val=$(this).val();
			}else{
				val=val+","+$(this).val();
			}
			
		}
	});
	return val;
}
//select
function getCheckboxAllValue(name){
	var val="";
	$("input[name='"+name+"']").each(function(){
		if($(this).attr("checked")){
			if(val==""){
				val=$(this).val();
			}else{
				val=val+","+$(this).val();
			}
		}else{
			if(val==""){
				val="false";
			}else{
				val=val+",false";
			}
		}
	});
	return val;
}
//input
function getInputValue(name,sp){
	var val="";
	$("input[name='"+name+"']").each(function(){
		if(val==""){
			val=$(this).val();
		}else{
			val=val+sp+$(this).val();
		}
	});
	return val;
}

//select
function setRadioValue(name,val){
	$("input[name='"+name+"']").each(function(){
		if(val==$(this).val()){
			$(this).attr("checked",true);
		}else{
			$(this).attr("checked",false);
		}
	});
}
//select
function setCheckboxValue(name,val){
	var vals=val.split(",");
	$("input[name='"+name+"']").each(function(){
		var v=$(this).val();
		var flag=0;
		for(var i=0;i<vals.length;i++){
			if(v==vals[i]){
				flag=1;
				break;
			}
		}
		if(flag==1){
			$(this).attr("checked",true);
		}else{
			$(this).attr("checked",false);
		}
	});
}




//ajax变量(用于刷新)
var ajax_param="";
var ajax_pagename="";
var ajax_page=1;
var ajax_showmsg="";
/*
var totopflag=0;
function setTopStop(){
	totopflag=1;
}
function setTopFlag(flag){
	totopflag=flag;
}
function toTop(id){
	if(totopflag==0){
		var top= 0;
		try{
			top=$("#"+id).offset().top-50;
			if(top<0){
				top=0;
			}
		}catch(e){}
		try{
			//$('html,body').animate({scrollTop:top}, 500);
		}catch(e){}
	}
}
*/
//ajax分页
function getAjaxList(param,pagename,page,showmsg,saveflag){
	if(saveflag==undefined){
		saveflag=true;
	}
	if(saveflag){
		ajax_param=param;
		ajax_pagename=pagename;
		ajax_page=page;
		if(showmsg==undefined) {
			showmsg="showajaxinfo";
			ajax_showmsg=showmsg;
		}else{
			if(showmsg==""){
				showmsg=ajax_showmsg;
			}else{
				ajax_showmsg=showmsg;
			}
		}
	}else{
		if(showmsg==undefined) {
			showmsg="showajaxinfo";
		}
	}
	var map=new Object();
	map["param"]=param;
	map["pagename"]=pagename;
	map["currentpage"]=page;
	map["showmsg"]=showmsg;
	submitCommon(map,"getAjaxList","doGetAjaxList");	
}
function doGetAjaxList(data){
$("#"+data["showmsg"]).html(data["msg"]);
//tb_load_init();
}
function reloadAjax(){
	//toTop(ajax_showmsg);
	getAjaxList(ajax_param,ajax_pagename,ajax_page,ajax_showmsg);
}
function reloadEndAjax(){
	//toTop(ajax_showmsg);
	getAjaxList(ajax_param,ajax_pagename,10000,ajax_showmsg);
}

function resetPagename(pagename,showmsg){
	ajax_pagename=pagename;
	ajax_showmsg=showmsg;
}

function preAjaxPage(){
	ajax_page=ajax_page-1;
	if(ajax_page<1){
		ajax_page=1;
	}
	reloadAjax();
}
function nextAjaxPage(){
	ajax_page=ajax_page+1;
	reloadAjax();
}
function toAjaxPage(page){
if(page>=1){
	ajax_page=page;
	reloadAjax();
}
}
function nextAjaxPageWithPageCount(pagecount){
	ajax_page=ajax_page+1;
	if(ajax_page>pagecount){
		ajax_page=pagecount;
	}
	reloadAjax();
}

function resetAjaxParam(param,value){
	if(param!=""){
		ajax_param=param+value;
		ajax_page=1;
		reloadAjax();
	}
}

function resetAjaxParam2(param,name){
	if(param!=""){
		ajax_param=param+$("#"+name).val();
		ajax_page=1;
		reloadAjax();
	}
}

function reloaddivajax(pn,showmsg,param){
	if(param==undefined) {
		var url=location.href;
		if(url.indexOf("?")!=-1){
			param=url.substring(url.indexOf("?")+1);
		}
	}
	var map=new Object();
	map["param"]=param;
	map["pagename"]=pn;
	map["currentpage"]=1;
	map["showmsg"]=showmsg;
	submitCommon(map,"getAjaxList","doGetAjaxList");	
}


var ajax_showid="";
//ajax
function ajax(name,param,pagename,page){
$(document).ready(function() {   
	ajax_showid=name;				   
	$("#"+name).ajax(param,pagename,page);
});
}
function ajaxreload(name){
	if(name==undefined||name=="") {
		name=ajax_showid;
	}
	$("#"+name).ajaxreload();
}
function ajaxnext(name,pages){
$("#"+name).ajaxnext(pages);
}
function ajaxpre(name){
$("#"+name).ajaxpre();
}
function ajaxpage(name,page){
$("#"+name).ajaxpage(page);
}
function ajaxparam(name,param){
$("#"+name).ajaxparam(param);
}
//ajax end


/*
重新获得验证码
*/
function reloadrand(id,image){
var img = document.getElementById(id);
var nowTime = new Date()
img.src = image+"?r="+nowTime;
}

//flash导航加载
function toFlashUrl(index){
	 var url=location.href;
	 var s=url.indexOf("?id=");
	 if(s==-1){
	 	s=url.indexOf("&id=");
	 }
	 if(s!=-1){
		 var id="";
	 	 var e=url.indexOf("&",s+1);
		 if(e==-1){
		 	id=url.substring(s+4);
		 }else{
		 	id=url.substring(s+4,e);
		 }
		 if(id!=""){
		 	if(index=="b1"){
				//首页
				location.href="index.htm?id="+id;
			}else if(index=="b2"){
				//动态
				location.href="news.htm?id="+id;
			}else if(index=="b3"){
				//成员
				location.href="users.htm?id="+id;
			}else if(index=="b4"){
				//交流
				location.href="forum.htm?id="+id;
			}else if(index=="b8"){
				//管理
				location.href="unit_admin.htm?id="+id;
			}
		 }
	 }
	 
}

function toUrl(url,id){
	var flag=true;
	if(id!=undefined){
		var vid=$("#"+id).val();
		url=url+vid;
		if(vid==""||vid=="0"){
			flag=false;
		}
		
	}
	if(flag){
		location.href=url;
	}
	
}

//省份城市
function showProCity(id,lay,p){
	var param=new Object();
	param["id"]=id;
	param["lay"]=lay;
	param["p"]=p;
	submitCommon(param,"showProCity","doShowProCity");
}
function doShowProCity(data){
	var msg=data["msg"];
	var id=data["id"];
	var lay=data["lay"];
	if(lay==0){
		$("#p1").html("");
		$("#p1").append(msg);
	}else if(lay==1){
		$("#p2").html("");
		$("#p3").html("<option value=''>请选择</option>");
		$("#p3").show();
		$("#p2").append(msg);
	}else if(lay==2){
		if(msg=="0"){
			$("#p3").hide();
		}else{
			if(msg==""){
				msg="<option value=''>请选择</option>";
			}
			$("#p3").show();
			$("#p3").html("");
			$("#p3").append(msg);
		}
		
	}
}




function getScrollTop(){
	/*
    var scrollTop=0;
    if(document.documentElement&&document.documentElement.scrollTop)
    {
        scrollTop=document.documentElement.scrollTop;
    }
    else if(document.body)
    {
        scrollTop=document.body.scrollTop;
    }
	*/
	var result=window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
	if(result==0){
		result=$("#sm_header").scrollTop();
	}
    return result;
}

function showSuccess(id){
	atSuccess("操作成功");
	/*
	if(id==undefined){
		id="#sm_header";
		var a=$(id).html();
		if(a==undefined){
			id="#user_main";
			var b=$(id).html();
			if(b==undefined){
				id="#page";
			}
		}
	}
   var el="winsuccess";
   if($("#"+el).html()==null){
   		$(id).append('<div><img id="winsuccess" src="'+base+'/images/success.gif" style="display:block"/></div>');
		
   	}
	var s=getScrollTop()+400;
	var h=s+"px";
    var timer;
    $("#"+el).css({ 
		opacity: "0.1",
	    top:h,
		left:'300px',
		position: 'absolute',
		zIndex:999999,
		display: 'none'
	});
	$("#"+el).show().animate({opacity: "1", top: "-=300"}, 800,function(){timer = setTimeout(function(){$("#"+el).fadeOut(); },1000);});
    clearTimeout(timer);
	*/
}


function openwin(url,id,name){
	if(id!=undefined){
		if(id!=""){
			url=url+$("#"+id).val();
		}
	}
	if(name==undefined){
		window.open(url);
	}else{
		if(name!=""){
			window.open(url, name);
		}
	}
}

function openwindows(name,url,width,height){
	window.open(url,name, 'height='+height+',width='+width+',status=no,toolbar=no,menubar=no,location=no,scrollbars=no');
}

function copy(meintext) {
  	obj=document.getElementById(meintext);
	obj.select(); 
	document.execCommand("Copy");
	alertInfoClose("复制成功!",1000);
 }








function toDownUrl(type,bid,id,url){
	var param=new Object();
	param["type"]=type;
	param["bid"]=bid;
	param["id"]=id;
	submitCommon(param,"getDownCount","doToDownUrl");
	openwin(url);
}

//获得节列表
function getGaJList(id,selectid,bid,show){
	var param=new Object();
	param["id"]=id;
	param["selectid"]=selectid;
	param["bid"]=bid;
	param["show"]=show;
	submitCore(param,"getGaJList","doGetGaJList");
}
function doGetGaJList(data){
	var flag=data["flag"];
	var show=data["show"];
	var msg="未知错误,请重新尝试!";
	if(flag==1){
		//$("#"+show).empty();
 		//$(data['msg']).appendTo("#"+show);
		toUrl('?id='+data["bid"]+'&jid='+data["jid"]);
		return;
	}else{
		msg=getCommonMsg(flag);
		atInfo(msg);
	}
}


//获得节列表
function getEditJList(id,selectid,bid,show){
	var param=new Object();
	param["id"]=id;
	param["selectid"]=selectid;
	param["bid"]=bid;
	param["show"]=show;
	submitCore(param,"getEditJList","doGetEditJList");
}
function doGetEditJList(data){
	var flag=data["flag"];
	var show=data["show"];
	var msg="未知错误,请重新尝试!";
	if(flag==1){
		//$("#"+show).empty();
 		//$(data['msg']).appendTo("#"+show);
		toUrl('?id='+data["bid"]+'&jid='+data["jid"]);
		return;
	}else{
		msg=getCommonMsg(flag);
		atInfo(msg);
	}
}

function getExt(name){
var ext=name.substring(name.lastIndexOf(".")+1);
return ext;
}

function colseWdatePicker(){
	$dp.hide();
}


function closeTips(type){
	var param=new Object();
	param["type"]=type;
	submitCommon(param,"saveTips","doCloseTips");
}
function doCloseTips(data){
	$("#show_tips").hide();
}

//email判断
function isEmail(str){
	var reg = /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
    return reg.test(str);
}

//ajax前置处理
function ajaxPreLoad(name){
	if(name==undefined){
		name="showajaxinfo";
	}
	$("#"+name).html('<div class="loading_block"><span class="loading">数据加载中，请稍候……</span></div>');	
}
//操作前置处理
var doingname="";
var doinghtml="";
function doPreLoad(name){
	if(name==undefined){
		name="doing";
	}
	doingname=name;
	doinghtml=$("#"+name).html();
	$("#"+name).html('<span class="doing">操作进行中,请勿关闭</span>');	
}
//操作前置处理关闭
function doPreLoadClose(){
	$("#"+doingname).html(doinghtml);	
}

var fileload=0;
function doCommonUpload(fold,ispic,index,xext){
	fileload=0;
	var name="img"+index;
	var img=$("#"+name).val();
	var ext=getExt(img).toLowerCase();
	if(xext==""){
		if(ispic=="false"||(ext=="png"||ext=="jpg"||ext=="gif")){
			atPage("",base+"/upload",'fold='+fold+'&file='+name+'&index='+index+'&ispic='+ispic,300,60,false,"upload",19998);
		}else{
			atInfo("请选择图片上传!");
		}
	}else{
		var flag=0;
		var x=xext.split(",");
		for(var i=0;i<x.length;i++){
			if(ext==x[i]){
				flag=1;
				break;
			}
		}
		if(flag==1){
			atPage("",base+"/upload",'fold='+fold+'&file='+name+'&index='+index+'&ispic='+ispic,300,60,false,"upload",19998);
		}else{
			atInfo("请上传文件格式："+xext);
		}
	}
	
}
function doAddFile(data){
	var flag=data["flag"];
	var index=data["index"];
	var name=data["name"];
	var no=data["no"];
	var filename=data["filename"];
	var url=data["url"];
	var path=data["path"];
	var fun=data["fun"];
	try{
		uploadProgressReturn(100);
		uploadCallBack(filename,no,url,index,name,path);
	}catch(e){}
}

function uploadProgressReturn(flag){
	fileload=flag;
}
function getFileLoad(){
	return fileload;
}


//ajax分页（微博）

function preLoading(name){
	var msg='<div class="loading"><span>正在加载中，请稍后...</span></div>';
	$("#"+name).html(msg);
}


function checkUserid(){
	var userid=$("#userid").val();
	if(isNaN(userid)){
		parent.atInfo("请输入数字格式的管理员编号");
	}else{
		var param=new Object();
		param["uid"]=userid;
		submitCore(param,"doCheckUserid","doCheckUserid");
	}

}
function doCheckUserid(data){
	var name=data["name"];
	var type=data["type"];
	if(type==1){
		$("#show1").hide();
		$("#show2").show();
		$("#user_id").html($("#userid").val());
		$("#user_name").html(name);
		try{
			callOneBack();
		}catch(e){}
		return;
	}else if(type==2){
		msg="用户不存在";
	}else if(type==3){
		msg="用户不可添加";
	}else if(type==21){
		msg="认证等级2的用户才能添加!";
	}
	parent.atInfo(msg);
}

function toCheck(c){
	if(c=="checked"){
		return true;
	}else{
		return false;
	}
}
function showCommonExamImg(url,showId){
	var w1=200;
	var h1=200;
	imgReady(url, function () {
			var width=this.width;
			var height=this.height;
			if(w1>width){
				w1=width;
			}
			if(h1>height){
				h1=height;
			}
			var h=h1;
			var w=parseInt((width*h1)/height);
			if(w>w1){
				h=parseInt((h*w1)/w);
				w=w1;
			}
			var msg='<a href="'+url+'" target="_blank"><img src="'+url+'" width="'+w+'" height="'+h+'"/></a>';
			$("#"+showId).html(msg);
		});	
}

function closeTips(id){
	$("#"+id).hide();
}
function resetWord(id,msg){
	var m=$("#"+id).val();
	if(m==msg){
		$("#"+id).val("");
	}
}
function trim(str){
　　  return str.replace(/(^\s*)|(\s*$)/g, "");
}


function checkBookPicSmallAtuo(){
	$(".media_1>img").each(function() {  
          var url=$(this).attr("src");
     }); 
}