
//输入密码
function checkbookpassword(bid){
	var password=$("#password").val();
	if(password==""){
		parent.atInfo("请输入访问密码!");
	}else{
		var param=new Object();
		param["bid"]=bid;
		param["password"]=password;
		submitCore(param,"doCheckbookpassword","doCheckbookpassword");
	}
}
function doCheckbookpassword(data){
	var flag=data["flag"];
	if(flag==1){
		parent.location.reload();
		return;
	}else{
		msg="您输入的访问密码不正确,请重新输入!";
		$("#password").val("");
		parent.atInfo(msg);
	}
}

//答案
function submitAnswers(bid,jid,type){
	var msg="";
	if(type==0){
		$("input[name^='book_']").each(function(){
			var id=$(this).attr("id");
			var val=$(this).val();
			if(msg==""){
				msg=id+"&,&"+val;
			}else{
				msg=msg+"&;&"+id+"&,&"+val;
			}
		});
	}else if(type==1){
		$("input[name^='book_']").each(function(){
			var id=$(this).attr("id");
			var flag=toCheck($(this).attr("checked"));
			if(msg==""){
				msg=id+","+flag;
			}else{
				msg=msg+";"+id+","+flag;
			}
		});
	}else if(type==2){
		$("input[name^='book_']").each(function(){
			var id=$(this).attr("id");
			var flag=toCheck($(this).attr("checked"));
			if(msg==""){
				msg=id+","+flag;
			}else{
				msg=msg+";"+id+","+flag;
			}
		});
	}else if(type==3){
		$("input[name^='book_']").each(function(){
			var id=$(this).attr("id");
			var flag=toCheck($(this).attr("checked"));
			if(msg==""){
				msg=id+","+flag;
			}else{
				msg=msg+";"+id+","+flag;
			}
		});
	}
	atConfirm("确定要提交吗?",function(){
		var param=new Object();
		param["bid"]=bid;
		param["jid"]=jid;
		param["type"]=type;
		param["msg"]=msg;
		submitCore(param,"doSubmitAnswers","doAjaxReturn");
	});
}
//答案
function submitAllAnswers(bid,jid){
	var msg1="";
	var msg2="";
	var msg3="";
	var msg4="";
	
	$("input[name^='book1_']").each(function(){
			var id=$(this).attr("id");
			var val=$(this).val();
			if(msg1==""){
				msg1=id+"&,&"+val;
			}else{
				msg1=msg1+"&;&"+id+"&,&"+val;
			}
		});
	
	$("input[name^='book2_']").each(function(){
			var id=$(this).attr("id");
			var flag=toCheck($(this).attr("checked"));
			if(msg2==""){
				msg2=id+","+flag;
			}else{
				msg2=msg2+";"+id+","+flag;
			}
		});
	
	$("input[name^='book3_']").each(function(){
			var id=$(this).attr("id");
			var flag=toCheck($(this).attr("checked"));
			if(msg3==""){
				msg3=id+","+flag;
			}else{
				msg3=msg3+";"+id+","+flag;
			}
		});
	
		$("input[name^='book4_']").each(function(){
			var id=$(this).attr("id");
			var flag=toCheck($(this).attr("checked"));
			if(msg4==""){
				msg4=id+","+flag;
			}else{
				msg4=msg4+";"+id+","+flag;
			}
		});
	atConfirm("确定要提交吗?",function(){
		var param=new Object();
		param["bid"]=bid;
		param["jid"]=jid;
		param["msg1"]=msg1;
		param["msg2"]=msg2;
		param["msg3"]=msg3;
		param["msg4"]=msg4;
		submitCore(param,"doSubmitAllAnswers","doAjaxReturn");
	});
}
//重新做题
function resetExercise(bid,jid){
	atConfirm("确定要全部重做吗?",function(){
		var param=new Object();
		param["bid"]=bid;
		param["jid"]=jid;
		submitCore(param,"doResetExercise","doAjaxReturn");
	});
}

//重新错误题目
function resetExerciseError(bid,jid,type){
	atConfirm("确定要重做错误题目吗?",function(){
		var param=new Object();
		param["bid"]=bid;
		param["jid"]=jid;
		param["type"]=type;
		submitCore(param,"doResetExerciseError","doAjaxReturn");
	});
}

//评价
function pjmedia(mid,jid,type){
	var param=new Object();
	param["mid"]=mid;
	param["jid"]=jid;
	param["type"]=type;
	submitCore(param,"doPjmedia","doPjmedia");
}
function doPjmedia(data){
	var flag=data["flag"];
	if(flag==1){
		reloadAjax();
		reShowRight();
		atSuccess("评价成功");
	}else{
		atInfo(getCommonMsg(flag));
	}
}
function pjmedianew(mid,jid,type){
	var param=new Object();
	param["mid"]=mid;
	param["jid"]=jid;
	param["type"]=type;
	submitCore(param,"doPjmedia","doPjmedianew");
}
function doPjmedianew(data){
	var flag=data["flag"];
	if(flag==1){
		reloadAjax();
		reShowRightNew();
		atSuccess("评价成功");
	}else{
		atInfo(getCommonMsg(flag));
	}
}


//报名学习
function applyStudyBook(bid){
	atConfirm("确定要报名吗?",function(){
		var param=new Object();
		param["bid"]=bid;
		submitCore(param,"doApplyStudyBook","doApplyStudyBook");
	});
}
function doApplyStudyBook(data){
	var flag=data["flag"];
	if(flag==1){
		atInfo("您已成功报名!",function(){location.reload();});
	}else{
		msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
	
}

//交流
function saveBookForum(bid){
	var title=$("#title").val();
	var msg=getEditMsg();
	if(title==""){
		atInfo("请输入标题!");
	}else if(msg==""){
		atInfo("请输入内容!");
	}else{
		var param=new Object();
		param["bid"]=bid;
		param["title"]=title;
		param["msg"]=msg;
		submitCore(param,"doSaveBookForum","doSaveBookForum");
	}
}
function doSaveBookForum(data){
	var flag=data["flag"];
	var msg="";
	if(flag==1){
		window.location.hash="top";
		reloadAjax();
		atSuccess("操作成功");
		$("#title").val("");
		initEidtMsg("");
		return;
	}else{
		msg=getCommonMsg(flag);
		atInfo(msg);
	}
}

function saveBookForumReply(bid,pid){
	var msg=getEditMsg();
	if(msg==""){
		atInfo("请输入内容!");
	}else{
		var param=new Object();
		param["bid"]=bid;
		param["pid"]=pid;
		param["msg"]=msg;
		submitCore(param,"doSaveBookForumReply","doSaveBookForumReply");
	}
}
function doSaveBookForumReply(data){
	var flag=data["flag"];
	var msg="";
	if(flag==1){
		reloadAjax();
		atSuccess("操作成功");
		initEidtMsg("");
		return;
	}else{
		msg=getCommonMsg(flag);
		atInfo(msg);
	}
}
function deleteBookForumReply(bid,id){
	atConfirm("确定要删除回复吗?",function(){
		var param=new Object();
		param["bid"]=bid;
		param["id"]=id;
		submitCore(param,"doDeleteBookForumReply","doCommonReturn");
	});
}
function deleteBookForum(bid,id,jid){
	atConfirm("确定要删除此帖吗?",function(){
		var param=new Object();
		param["bid"]=bid;
		param["id"]=id;
		param["jid"]=jid;
		submitCore(param,"doDeleteBookForum","doDeleteBookForum");
	});
}
function doDeleteBookForum(data){
	var flag=data["flag"];
	var id=data["id"];
	var jid=data["jid"];
	var msg="";
	if(flag==1){
		location.href="forum.htm?id="+id+"&jid="+jid;
		return;
	}else{
		msg=getCommonMsg(flag);
		atInfo(msg);
	}
}
function setBookForumStatus(bid,id,type,status){
	atConfirm("确定要做此操作吗?",function(){
		var param=new Object();
		param["bid"]=bid;
		param["id"]=id;
		param["type"]=type;
		param["status"]=status;
		submitCore(param,"doSetBookForumStatus","doCommonReturn");
	});
}



function sendTTSms(bid,jid){
	var msg=$("#msg").val();
	if(jid==0){
		atInfo("请选择章节!");
	}else if(msg==""){
		atInfo("请输入发送内容!");
	}else{
		var param=new Object();
		param["bid"]=bid;
		param["jid"]=jid;
		param["msg"]=msg;
		submitCore(param,"doSendTTSms","doSendTTSms");
	}
}
function doSendTTSms(data){
	var flag=data["flag"];
	var msg="未知错误!";
	if(flag==1){
		//成功
		atSuccess("操作成功");
		//getAjaxList('id='+data["id"]+'&jid='+data["jid"],'book_tt.htm',1,'ttlist');
		ajaxpre('ajax_msg');
		$("#msg").val("");
		$("#word_count").text("140");
	}else{
		msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}
function bookTTVote(bid,jid,id,type){
	var param=new Object();
	param["bid"]=bid;
	param["jid"]=jid;
	param["id"]=id;
	param["type"]=type;
	submitCore(param,"doBookTTVote","doBookTTVote");
}
function doBookTTVote(data){
	var flag=data["flag"];
	var msg="未知错误!";
	if(flag==1){
		//成功
		atSuccess("操作成功");
		//getAjaxList('id='+data["id"]+'&jid='+jid,'book_tt.htm',1,'ttlist');
		ajaxpre('ajax_msg');
	}else{
		msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}
function sendTTReply(bid,jid,id){
	var msg=$("#msg_"+id).val();
	if(jid==0){
		atInfo("请选择章节!");
	}else if(msg==""){
		atInfo("请输入发送内容!");
	}else{
		var param=new Object();
		param["bid"]=bid;
		param["jid"]=jid;
		param["id"]=id;
		param["msg"]=msg;
		submitCore(param,"doSendTTReply","doSendTTReply");
	}
}
function doSendTTReply(data){
	var flag=data["flag"];
	var msg="未知错误!";
	if(flag==1){
		var id=data["id"];
		//成功
		atSuccess("回复成功");
		$("#msg_"+id).val("");
		$("#word_count_reply_"+id).text("140");
		$("#reply_txt_"+id).hide();
	}else{
		msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}

function deleteTT(bid,jid,id){
	atConfirm("确定要删除吗?",function(){
		var param=new Object();
		param["bid"]=bid;
		param["jid"]=jid;
		param["id"]=id;
		submitCore(param,"doDeleteTT","doDeleteTT");
	});
	
}
function doDeleteTT(data){
	var flag=data["flag"];
	var msg="未知错误!";
	if(flag==1){
		//成功
		atSuccess("操作成功");
		//getAjaxList('id='+data["id"]+'&jid='+data["jid"],'book_tt.htm',1,'ttlist');
		ajaxpre('ajax_msg');
	}else{
		msg=getCommonMsg(flag);
		atInfo(msg);
	}
}

function applyEndBookStudyPre(bid,score){
	var msg="当前成绩：<font color='red'>"+score+"</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;确定马上结业吗？";
	atConfirm(msg,function(){
		var url=base+"/lesson/course_complete.htm?id="+bid;
		toUrl(url);
	});
}
//领取任务
function applyEndBookStudy(bid,score){
	var password=$("#password").val();
	var msg="当前成绩：<font color='red'>"+score+"</font><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;确定马上结业吗？";
	parent.atConfirm(msg,function(){
		var param=new Object();
		param["bid"]=bid;
		param["password"]=password;
		submitCore(param,"doApplyEndBookStudy","doApplyEndBookStudy");
	});
}
function doApplyEndBookStudy(data){
	var flag=data["flag"];
	var msg="未知错误!";
	if(flag==1){
		var bt=data["batch"];
		parent.location.href=base+"/lesson/course_complete.htm?id="+data["id"];
		return;
	}else{
		msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}

//评价
function bookPj(bid,batch){
	var flag1=getRadioValue("flag1");
	var flag2=getRadioValue("flag2");
	var flag3=getRadioValue("flag3");
	var msg=$("#msg").val();
	if(flag1==""){
		atInfo("请评价:这门课对你是否有帮助?");
	}else if(flag2==""){
		atInfo("请评价:这门课的制作水平如何?");
	}else if(flag3==""){
		atInfo("请评价:你觉得教学团队管理如何?");
	}else if(msg==""){
		atInfo("请输入留言!");
	}else{
		atConfirm("确定要评价吗?",function(){
			var param=new Object();
			param["bid"]=bid;
			param["batch"]=batch;
			param["flag1"]=flag1;
			param["flag2"]=flag2;
			param["flag3"]=flag3;
			param["msg"]=msg;
			submitCore(param,"doBookPj","doBookPj");
		});
	}
	
}
function doBookPj(data){
	var flag=data["flag"];
	var msg="未知错误!";
	if(flag==1){
		location.reload();
		return;
	}else{
		msg=getCommonMsg(flag);
		atInfo(msg);
	}
}

function resetUserBook(bid){ 
	atConfirm("确定要重修吗,一旦重修当前课程获得的能力指数会清除?",function(){atPage('密码确认',base+'/user/study_course','id='+bid,350,150);});
}

function bookPingjia(bid,lx){ 
	if(lx==1){
		var star=$("#star").val();
		var msg=$("#msg").val();
		if(star==0){
			parent.atInfo("请选择评分");
		}else{
			var param=new Object();
			param["bid"]=bid;
			param["star"]=star;
			param["msg"]=msg;
			submitCore(param,"doBookPingjia","doBookPingjia");
		}
	}else if(lx==2){
		var msg=$("#msg").val();
		if(msg==""){
			parent.atInfo("请输入评价内容");
		}else{
			var param=new Object();
			param["bid"]=bid;
			param["star"]=0;
			param["msg"]=msg;
			submitCore(param,"doBookPingjia","doBookPingjia");
		}
	}
}
function doBookPingjia(data){
	var flag=data["flag"];
	if(flag==1){
		parent.reBookAjax();
		parent.atSuccess("评论成功");
		parent.atPageClose();
	}else{
		var msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}
function deleteBookPingjia(id){ 
	var param=new Object();
	param["id"]=id;
	submitCore(param,"doDeleteBookPingjia","doDeleteBookPingjia");
}
function doDeleteBookPingjia(data){
	var flag=data["flag"];
	if(flag==1){
		reBookAjax();
		atSuccess("删除成功");
	}else{
		var msg=getCommonMsg(flag);
		atInfo(msg);
	}
}

function applyBookOpen(){
	var name=$("#name").val();
	var memo=$("#memo").val();
	var uid=$("#uid").val();
	if(name.length==0||name=="输入你开设课程名称"){
		atInfo("请输入课程名称！");
	}else if(memo.length==0||memo=="便于审批人员理解的文字介绍"||memo.length>100){
		atInfo("请输入课程介绍，字数在100字以内！");
	}else if(uid==""){
		atInfo("请添加审核者！");
	}else{
		var param=new Object();
		param["name"]=name;
		param["memo"]=memo;
		param["uid"]=uid;
		submitCore(param,"doOpenBookApply","doApplyBookOpen");
	}
	
}
function doApplyBookOpen(data){
	var flag=data["flag"];
	var msg="";
	if(flag==1){
		atInfo("申请开课请求已成功递交,请等待管理员审核!",function(){location.href='index.htm';});
	}else{
		var msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}

function cloudBatchBm(cid,uid,batch){
	var tid=$("#tid").val();
	if(tid==""||tid==null){
		parent.atInfo("请选择辅导老师");
	}else{
		parent.atConfirm("确定要报名吗?",function(){
			var param=new Object();
			param["cid"]=cid;
			param["uid"]=uid;
			param["tid"]=tid;
			param["batch"]=batch;
			submitCore(param,"doCloudBatchBm","doCommonReloadReturn");
		});
	}
}
function cloudBatchBm2(cid,uid,batch,tid){
	parent.atConfirm("确定要报名吗?",function(){
		var param=new Object();
		param["cid"]=cid;
		param["uid"]=uid;
		param["tid"]=tid;
		param["batch"]=batch;
		submitCore(param,"doCloudBatchBm","doCommonReloadReturn");
	});
}
function cloudDjBatchBm(cid,uid,batch){
	parent.atConfirm("确定要报名吗?",function(){
		var param=new Object();
		param["cid"]=cid;
		param["uid"]=uid;
		param["batch"]=batch;
		submitCore(param,"doCloudDjBatchBm","doCommonReloadReturn");
	});
}
function cancelCloudBatchBm(cid,uid,batch){
	atConfirm("确定要撤销报名吗?",function(){
		var param=new Object();
		param["cid"]=cid;
		param["uid"]=uid;
		param["batch"]=batch;
		submitCore(param,"doCancelCloudBatchBm","doCommonReloadReturn");
	});
}

function cloudBatchBm3(cid,uid,batch){
	parent.atConfirm("确定要报名吗?",function(){
		var param=new Object();
		param["cid"]=cid;
		param["uid"]=uid;
		param["batch"]=batch;
		submitCore(param,"doCloudBatchBm3","doCommonReloadReturn");
	});
}

function deleteBatchOwnUser(cid,batch){
	atConfirm("更换任课老师需要先退出教学批次，然后重新报名，确定要退出教学批次吗?",function(){
		var param=new Object();
		param["cid"]=cid;
		param["batch"]=batch;
		submitCore(param,"doDeleteBatchOwnUser","doCommonReloadReturn");
	});
}
function updateBj(cid,batch){
	atConfirm("确定要立即变更吗?",function(){
		var param=new Object();
		param["cid"]=cid;
		param["batch"]=batch;
		submitCore(param,"doUpdateBj","doCommonReloadReturn");
	});
}
function applyCloudExam(cid,batch){
	var param=new Object();
	param["cid"]=cid;
	param["batch"]=batch;
	submitCore(param,"doApplyCloudExam","doApplyCloudExam");
}
function doApplyCloudExam(data){
	var flag=data["flag"];
	var no=data["no"];
	var batch=data["batch"];
	toUrl("batch_exam.htm?no="+no+"&batch="+batch);
}
function submitCloudExam(cid,batch){
	atConfirm("确定要提交吗?",function(){
		var param=new Object();
		param["cid"]=cid;
		param["batch"]=batch;
		submitCore(param,"doSubmitCloudExam","doSubmitCloudExam");
	});
}
function doSubmitCloudExam(data){
	var flag=data["flag"];
	var msg="";
	if(flag==1){
		var no=data["no"];
		var batch=data["batch"];
		atInfo("您已成功提交,点击确定查看试卷完成详细",function(){toUrl("batch_exam_ok.htm?no="+no+"&batch="+batch);});
		return;
	}else{
		msg=getCommonMsg(flag);
		atInfo(msg);
	}
}
function submitCloudExamQz(cid,batch){
	var param=new Object();
	param["cid"]=cid;
	param["batch"]=batch;
	submitCore(param,"doSubmitCloudExam","doSubmitCloudExamQz");
}
function doSubmitCloudExamQz(data){
	var flag=data["flag"];
	var msg="";
	if(flag==1){
		var no=data["no"];
		var batch=data["batch"];
		atInfo("由于时间已到,您已被强制交卷,点击确定查看试卷完成详细",function(){toUrl("batch_exam_ok.htm?no="+no+"&batch="+batch);});
		return;
	}else{
		msg=getCommonMsg(flag);
		atInfo(msg);
	}
}
function submitCloudExamAnswer(cid,batch,id,type){
	var msg="";
	if(type==1){
		msg=getInputValue("exam_"+id,"&,&");
	}else if(type==2){
		msg=getRadioValue("exam_"+id);
	}else if(type==3){
		msg=getCheckboxValue("exam_"+id);
	}else if(type==4){
		msg=getRadioValue("exam_"+id);
	}
	var param=new Object();
	param["cid"]=cid;
	param["batch"]=batch;
	param["id"]=id;
	param["type"]=type;
	param["msg"]=msg;
	submitCore(param,"doSubmitCloudExamAnswer","doSubmitCloudExamAnswer");
}
function doSubmitCloudExamAnswer(data){
	var flag=data["flag"];
	if(flag==1){
		var num=data["num"];
		$("#wc").html(num);
	}else{
		msg=getCommonMsg(flag);
		atInfo(msg);
	}
}