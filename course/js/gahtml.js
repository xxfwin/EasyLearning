
var current_page=1;
function toPageNum(page,pagesize){
	if(page==-1){
		//prew
		current_page=current_page-1;
		if(current_page<1){
			current_page=1;
		}
		page=current_page;
	}else if(page==-2){
		//next
		current_page=current_page+1;
		if(current_page>pagesize){
			current_page=pagesize;
		}
		page=current_page;
	}else{
		current_page=page;
	}
	for(var i=1;i<=pagesize;i++){
		var name="page_end_"+i;
		var pname="page_"+i;
		if(i==page){
			//show
			$("#"+pname).show();
			$("a[name='"+name+"']").each(function(){
				 $(this).addClass("pages_opening");
			});
		}else{
			//hide
			$("#"+pname).hide();
			$("a[name='"+name+"']").each(function(){
				 $(this).removeClass("pages_opening");
			});
		}
	}
	//到头部
	location.hash="top";
	var d=document.getElementById("c_page_bg");//page
	d.scrollTop=d.scrollTop-35;
}


function toPage(id){
	var ids=id.split("_");
	var pagesize=ids[1];
	var page=ids[2];
	toPageNum(page,pagesize);
	location.hash=id;
	var d=document.getElementById("c_page_bg");//page
	d.scrollTop=d.scrollTop-35;
}

var gaid=0;
var gatype=0;
function reShowRight(){
	var param=new Object();
	param["id"]=gaid;
	param["type"]=gatype;
	submitCommon(param,"getGaMediaMsg","doGetMediaMsg");
}
function reShowRightNew(){
	var param=new Object();
	param["id"]=gaid;
	param["type"]=gatype;
	submitCommon(param,"getGaMediaMsg","doGetMediaMsgNew");
}
function showRight(type,id,url,burl){
	clearMedia();
	gaid=id;
	gatype=type;
	var msg="";
	if(type==0){
		//图片
		msg=getPicInfo(url,burl);
	}else if(type==1){
		//flash
		msg=getFlashInfo(url);
	}else if(type==2){
		//视频
		msg=getVideoInfo(url,burl);
	}else if(type==3){
		//音频
		msg=getAudioInfo(url);
	}else if(type==4){
		//案例
		msg=getExampleInfo(url);
	}
	$("#showeditinfo").html(msg);
	$("#showeditinfo").show();
	//进行高宽设置
	var dd=getScrollTop();
	var len=$(".course_video").length;
	var lenh=400;
	if(len>0){
		lenh=750;
	}
	var h=dd-lenh;
	if(h<0){
		h=0;
	}
	var hh=h+"px";
	$("#showeditinfo").css({"margin-top":hh});
	//获得信息
	var param=new Object();
	param["id"]=id;
	param["type"]=type;
	submitCommon(param,"getGaMediaMsg","doGetMediaMsg");
}

function doGetMediaMsg(data){
	$("#media_title").html(data["title"]);
	$("#media_msg").html(data["msg"]);
	$("#media_param").html(data["param"]);
	var mediaflag=data["mediaflag"];
	var mediapjflag=data["mediapjflag"];
	var pic=data["pic"];
	var people=data["people"];
	var jid=data["jid"];
	var mid=data["id"];
	$("#mediashow").html("");
	if(mediaflag==1){
		$("#mediashow").html(getMediashow(mediapjflag,pic,people,jid,mid));
		if(mediapjflag!=1){
			$("#ping_result").show();
		}
		
	}
}



function getPicInfo(url,burl){
var result="";
result=result+'<p class="close_bar"><a class="close" href="javascript:closeMedia();">关闭</a></p>';
result=result+'<div class="media_show">';
result=result+'<div class="media_pic" align="center">';
result=result+'<img src="'+url+'">';
result=result+'<div class="info_bar"><span id="media_param" class="parameter"></span><a class="check" href="'+burl+'" target="_blank">查看原图</a><div class="clear"></div></div>';
result=result+'</div>';
result=result+'<h5 class="title" id="media_title"></h5>';
result=result+'<div class="media_intro">';
result=result+'<p id="media_msg"></p>';
result=result+'</div>';
result=result+'</div>';
result=result+'<div class="media_score" id="mediashow">';
result=result+'</div>';
return result;
}

function getFlashInfo(url){
var bigurl=url.substring(0,url.indexOf("img"))+"flash.htm?url="+url.substring(url.indexOf("img"));
var result="";
result=result+'<p class="close_bar"><a class="close" href="javascript:closeMedia();">关闭</a></p>';
result=result+'<div class="media_show">';
result=result+'<div class="media_pic">';
result=result+'<embed src="'+url+'" width="336" height="252" type="application/x-shockwave-flash" loop="true" play="true" menu="false" bgcolor="#ffffff" quality="high" wmode="opaque" />';
result=result+'<div class="info_bar"><span id="media_param" class="parameter"></span><a class="check" href="'+bigurl+'" target="_blank">放大</a><div class="clear"></div></div>';
result=result+'</div>';
result=result+'<h5 class="title" id="media_title"></h5>';
result=result+'<div class="media_intro">';
result=result+'<p id="media_msg"></p>';
result=result+'</div>';
result=result+'</div>';
result=result+'<div class="media_score" id="mediashow">';
result=result+'</div>';
return result;
}

function getVideoInfo(url,type){
var result="";
result=result+'<p class="close_bar"><a class="close" href="javascript:closeMedia();">关闭</a></p>';
result=result+'<div class="media_show">';
result=result+'<div class="media_pic">';
if(type=="1"){
	result=result+'<embed src="'+url+'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="opaque" width="336" height="280"></embed>';
}else{
	if(url.toLowerCase().indexOf(".rm")!=-1){
		result=result+'<object id="RVOCX" classid="CLSID:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" width="336" height="320">';
		result=result+'<param name="SRC" value="'+url+'">';
		result=result+'<param name="CONTROLS" value="ImageWindow,ControlPanel">';
		result=result+'<param name="CONSOLE" value="cons">';
		result=result+'<param name="autostart" value="true">';
		result=result+'<embed src="'+url+'" type="audio/x-pn-realaudio-plugin" autostart="true" width="336" height="320" controls="ImageWindow,ControlPanel" console="cons"></embed>';
		result=result+'</object>';
	}else{
		result=result+'<embed src="'+url+'" width="336" height="320" type="application/x-mplayer2" autostart="true" enablecontextmenu="false" />';
	}
}
result=result+'</div>';
result=result+'<h5 class="title" id="media_title"></h5>';
result=result+'<div class="media_intro">';
result=result+'<p id="media_msg"></p>';
result=result+'</div>';
result=result+'</div>';
result=result+'<div class="media_score" id="mediashow">';
result=result+'</div>';
return result;
}

function getAudioInfo(url){
var result="";
result=result+'<p class="close_bar"><a class="close" href="javascript:closeMedia();">关闭</a></p>';
result=result+'<div class="media_show">';
result=result+'<div class="media_pic">';
result=result+'<embed src="'+url+'" width="336" height="45" type="application/x-mplayer2" autostart="true" enablecontextmenu="false" />';
result=result+'</div>';
result=result+'<h5 class="title" id="media_title"></h5>';
result=result+'<div class="media_intro">';
result=result+'<p id="media_msg"></p>';
result=result+'</div>';
result=result+'</div>';
result=result+'<div class="media_score" id="mediashow">';
result=result+'</div>';
return result;
}

function getExampleInfo(url){
var result="";
result=result+'<p class="close_bar"><a class="close" href="javascript:closeMedia();">关闭</a></p>';
result=result+'<div class="media_show">';
result=result+'<h5 class="title" id="media_title"></h5>';
result=result+'<div class="media_intro">';
result=result+'<p id="media_msg"></p>';
result=result+'</div>';
result=result+'</div>';
result=result+'<div class="media_score" id="mediashow">';
result=result+'</div>';
return result;
}

function getMediashow(showflag,pic,people,jid,mid){
if(pic==""){
	pic=' <img src=\"../images/course/mun/10_small.gif\" />';
}
var result="";
result=result+'<div id="ping_result" class="ping_number" style="display:none">';
result=result+'<h4>'+pic+'</h4>';
result=result+'<span class="left">参与评价人数 <span class="textBlue_2">'+people+'</span></span>';
result=result+'<div class="clear"></div>';
result=result+'</div>';
if(showflag==1){
	result=result+'<p class="ping_btn">';
	result=result+'<span><img src="../images/course/text_02.gif" /></span>';
	//result=result+'<input type="button" class="ping_btn_1" onclick="pjmedia('+mid+','+jid+',1);"/>';
	result=result+'<input type="button" class="ping_btn_1" onclick="pjmedia('+mid+','+jid+',1);"/>';
	result=result+'<input type="button" class="ping_btn_2" onclick="pjmedia('+mid+','+jid+',2);"/>';
	result=result+'<input type="button" class="ping_btn_3" onclick="pjmedia('+mid+','+jid+',3);"/>';
	//result=result+'<input type="button" class="ping_btn_5" onclick="pjmedia('+mid+','+jid+',5);"/>';
	result=result+'</p>';	
}
return result;
}

function closeMedia(){
	try{
		$("#showeditinfo").hide();
	}catch(e){}
	try{
		$("#showeditinfonew").hide();
	}catch(e){}
}
function clearMedia(){
	try{
		$("#showeditinfo").html("");
	}catch(e){}
	try{
		$("#showeditinfonew").html("");
	}catch(e){}
}



function showRightNew(type,id,url,burl){
	clearMedia();
	gaid=id;
	gatype=type;
	var msg="";
	if(type==0){
		//图片
		msg=getPicInfoNew(id,url,burl);
	}else if(type==1){
		//flash
		msg=getFlashInfoNew(id,url);
	}else if(type==2){
		//视频
		msg=getVideoInfoNew(id,url,burl);
	}else if(type==3){
		//音频
		msg=getAudioInfoNew(id,url);
	}else if(type==4){
		//案例
		msg=getExampleInfoNew(id,url);
	}
	$("#showeditinfonew").html(msg);
	$("#showeditinfonew").show();
	//进行高宽设置
	var dd=getScrollTop();
	var len=$(".course_video").length;
	var lenh=400;
	if(len>0){
		lenh=750;
	}
	var h=dd-lenh;
	if(h<0){
		h=0;
	}
	var hh=h+"px";
	$("#showeditinfonew").css({"margin-top":hh});
	//获得信息
	var param=new Object();
	param["id"]=id;
	param["type"]=type;
	submitCommon(param,"getGaMediaMsg","doGetMediaMsgNew");
}
function doGetMediaMsgNew(data){
	$("#media_title").html(data["title"]);
	$("#media_msg").html(data["msg"]);
	$("#media_param").html(data["param"]);
	var mediaflag=data["mediaflag"];
	var mediapjflag=data["mediapjflag"];
	var pic=data["pic"];
	var people=data["people"];
	var jid=data["jid"];
	var mid=data["id"];
	$("#mediashow").html("");
	if(mediaflag==1){
		$("#mediashow").html(getMediashowNew(mediapjflag,pic,people,jid,mid));
		if(mediapjflag!=1){
			$("#ping_result").show();
		}
		
	}
}


function getPicInfoNew(id,url,burl){
var result="";
result=result+'<div class="Marea_pad15"><div class="mBtn_bar"><a class="M_prev" title="上一个" href="javascript:preMedia('+id+');">上一个</a><a class="M_next" title="下一个" href="javascript:nextMedia('+id+');">下一个</a><a class="Mclose" title="关闭" href="javascript:closeMedia();"></a></div>';
result=result+'<div class="media_area">';
result=result+'<div class="mPic_block" align="center">';
result=result+'<img src="'+url+'">';
result=result+'</div>';
result=result+'<p class="mParam"><a class="mLook" href="'+burl+'" target="_blank">查看原图</a><span id="media_param"></span></p>';
result=result+'</div></div>';
result=result+' <h4 class="M_title" id="media_title"></h4>';
result=result+'<div class="M_intro"><p id="media_msg"></p></div>';
result=result+'<div class="M_score" id="mediashow"></div>';
return result;
}

function getFlashInfoNew(id,url){
var bigurl=url.substring(0,url.indexOf("img"))+"flash.htm?url="+url.substring(url.indexOf("img"));
var result="";
result=result+'<div class="Marea_pad15"><div class="mBtn_bar"><a class="M_prev" title="上一个" href="javascript:preMedia('+id+');">上一个</a><a class="M_next" title="下一个" href="javascript:nextMedia('+id+');">下一个</a><a class="Mclose" title="关闭" href="javascript:closeMedia();"></a></div>';
result=result+'<div class="media_area">';
result=result+'<div class="mPic_block">';
result=result+'<embed src="'+url+'" width="336" height="252" type="application/x-shockwave-flash" loop="true" play="true" menu="false" bgcolor="#ffffff" quality="high" wmode="opaque" />';
result=result+'</div>';
result=result+'<p class="mParam"><a class="mLook" href="'+bigurl+'" target="_blank">放大</a><span id="media_param"></span></p>';
result=result+'</div></div>';
result=result+' <h4 class="M_title" id="media_title"></h4>';
result=result+'<div class="M_intro"><p id="media_msg"></p></div>';
result=result+'<div class="M_score" id="mediashow"></div>';
return result;
}

function getVideoInfoNew(id,url,type){
var result="";
result=result+'<div class="Marea_pad15"><div class="mBtn_bar"><a class="M_prev" title="上一个" href="javascript:preMedia('+id+');">上一个</a><a class="M_next" title="下一个" href="javascript:nextMedia('+id+');">下一个</a><a class="Mclose" title="关闭" href="javascript:closeMedia();"></a></div>';
result=result+'<div class="media_area">';
result=result+'<div class="mPic_block">';
if(type=="1"){
	result=result+'<embed src="'+url+'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="opaque" width="336" height="280"></embed>';
}else{
	if(url.toLowerCase().indexOf(".rm")!=-1){
		result=result+'<object id="RVOCX" classid="CLSID:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA" width="336" height="320">';
		result=result+'<param name="SRC" value="'+url+'">';
		result=result+'<param name="CONTROLS" value="ImageWindow,ControlPanel">';
		result=result+'<param name="CONSOLE" value="cons">';
		result=result+'<param name="autostart" value="true">';
		result=result+'<embed src="'+url+'" type="audio/x-pn-realaudio-plugin" autostart="true" width="336" height="320" controls="ImageWindow,ControlPanel" console="cons"></embed>';
		result=result+'</object>';
	}else{
		result=result+'<embed src="'+url+'" width="336" height="320" type="application/x-mplayer2" autostart="true" enablecontextmenu="false" />';
	}
}
result=result+'</div>';
result=result+'</div></div>';
result=result+' <h4 class="M_title" id="media_title"></h4>';
result=result+'<div class="M_intro"><p id="media_msg"></p></div>';
result=result+'<div class="M_score" id="mediashow"></div>';
return result;
}

function getAudioInfoNew(id,url){
var result="";
result=result+'<div class="Marea_pad15"><div class="mBtn_bar"><a class="M_prev" title="上一个" href="javascript:preMedia('+id+');">上一个</a><a class="M_next" title="下一个" href="javascript:nextMedia('+id+');">下一个</a><a class="Mclose" title="关闭" href="javascript:closeMedia();"></a></div>';
result=result+'<div class="media_area">';
result=result+'<div class="mPic_block">';
result=result+'<embed src="'+url+'" width="336" height="45" type="application/x-mplayer2" autostart="true" enablecontextmenu="false" />';
result=result+'</div>';
result=result+'</div></div>';
result=result+' <h4 class="M_title" id="media_title"></h4>';
result=result+'<div class="M_intro"><p id="media_msg"></p></div>';
result=result+'<div class="M_score" id="mediashow"></div>';
return result;
}

function getExampleInfoNew(id,url){
var result="";
result=result+'<div class="Marea_pad15"><div class="mBtn_bar"><a class="M_prev" title="上一个" href="javascript:preMedia('+id+');">上一个</a><a class="M_next" title="下一个" href="javascript:nextMedia('+id+');">下一个</a><a class="Mclose" title="关闭" href="javascript:closeMedia();"></a></div>';
result=result+'</div>';
result=result+' <h4 class="M_title" id="media_title"></h4>';
result=result+'<div class="M_intro"><p id="media_msg"></p></div>';
result=result+'<div class="M_score" id="mediashow"></div>';
return result;
}

function getMediashowNew(showflag,pic,people,jid,mid){
if(pic==""){
	pic=' <img src=\"../images/course/mun/10_small.gif\" />';
}
var result="";
result=result+'<div class="Mping_num" id="ping_result" style="display:none">';
result=result+'<h4>'+pic+'</h4>';
result=result+'<span class="left">参与评价人数 <span class="textBlue_2">'+people+'</span></span>';
result=result+'<div class="clear"></div>';
result=result+'</div>';
if(showflag==1){
	result=result+'<p class="Mping_btn">';
	result=result+'<span><img src="../images/course/text_02.gif" /></span>';
	result=result+'<input type="button" class="ping_btn_1" onclick="pjmedianew('+mid+','+jid+',1);"/>';
	result=result+'<input type="button" class="ping_btn_2" onclick="pjmedianew('+mid+','+jid+',2);"/>';
	result=result+'<input type="button" class="ping_btn_3" onclick="pjmedianew('+mid+','+jid+',3);"/>';
	result=result+'</p>';
}
return result;
}

function preMedia(id){
	var ids="";
	$(".content_text").find("[id^=media_]").each(function() {  
          var name=$(this).attr("id");
		  if(ids==""){
		  	ids=name;
		  }else{
		  	ids=ids+","+name;
		  }
     });  
	var names=ids.split(",");
	var index=-1;
	for(var i=0;i<names.length;i++){
		if(names[i]=="media_"+id){
			index=i;
			break;
		}
	}
	var pid=index-1;
	if(pid<0){
		atInfo("已经是第一个");
	}else{
		var nm=names[pid];
		var pos = $("#"+nm).offset().top-40; 
		$("html,body").animate({scrollTop: pos}, 500,function(){$("#"+nm).click();});
	}
}
function nextMedia(id){
	var ids="";
	$(".content_text").find("[id^=media_]").each(function() {  
          var name=$(this).attr("id");
		  if(ids==""){
		  	ids=name;
		  }else{
		  	ids=ids+","+name;
		  }
     });  
	var names=ids.split(",");
	var index=-1;
	for(var i=0;i<names.length;i++){
		if(names[i]=="media_"+id){
			index=i;
			break;
		}
	}
	var pid=index+1;
	if(pid>=names.length){
		atInfo("已经是最后一个");
	}else{
		var nm=names[pid];
		var pos = $("#"+nm).offset().top-40; 
		$("html,body").animate({scrollTop: pos}, 500,function(){$("#"+nm).click();});		
	}
}
function checkMediaPj(bid){
	var ids="";
	$(".content_text").find("[id^=media_]").each(function() {  
          var id=$(this).attr("id");
		  if(ids==""){
		  	ids=id;
		  }else{
		  	ids=ids+","+id;
		  }
     }); 
	if(ids!=""){
		var param=new Object();
		param["bid"]=bid;
		param["ids"]=ids;
		submitCommon(param,"checkMediaPj","doCheckMediaPj");
	}
}
function doCheckMediaPj(data){
	var msg=data["msg"];
	if(msg!=""){
		var a=msg.split(",");
		for(var i=0;i<a.length;i++){
			var ids=a[i].split(":");
			var id=ids[0];
			var type=ids[1];
			var m="";
			if(type==1){
				m='<span class="pingD"></span>'+$("#"+id).html();
			}else{
				m='<span class="pingNo"></span>'+$("#"+id).html();
			}
			
			$("#"+id).addClass("m_read");
			$("#"+id).html(m);
		}
	}
}