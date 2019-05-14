

/* ajax callback*/
var reply = function(data){
if (data != null) {
		try{
			var fun=data["callback"];
			eval(fun+"(data)");
		}catch(e){}
		
	}
}
//获得页面所有数据(id),返回json
function getAllParam(){
	var result=new Object();
	//1.遍历input
	$("input").each(function(){
		var type=$(this).attr("type").toLowerCase();
		var name=$(this).attr("name").toLowerCase();
		if(type=="text"){
			//输入框
			var val=$(this).val();
			result[name]=val;
		}else if(type=="hidden"){
			//hidden
			var val=$(this).val();
			result[name]=val;
		}else if(type=="password"){
			//password
			var val=$(this).val();
			result[name]=val;
		}else if(type=="file"){
			//file
			var val=$(this).val();
			result[name]=val;
		}else if(type=="radio"){
			//单选框
			var val=getRadioValue(name);
			result[name]=val;
		}else if(type=="checkbox"){
			//多选框
			var val=getCheckboxValue(name);
			result[name]=val;
		}
	});
	
	//1.遍历select
	$("select").each(function(){
		var name=$(this).attr("name").toLowerCase();
		var val=$(this).val();
		result[name]=val;
	});
	
	//1.遍历textarea
	$("textarea").each(function(){
		var name=$(this).attr("name").toLowerCase();
		var val=$(this).val();
		result[name]=val;
	});
	return result;
	
}

//提交
function submitCommon(param,name,refun){
	if(refun==undefined||refun=="") {
		refun="doCommonReturn";
	}
	eval("zsClass.commonAjax(name,param,refun,{callback:reply,exceptionHandler:exceptionHandler})");
}
//提交
function submitCore(param,name,refun){
	if(refun==undefined||refun=="") {
		refun="doCommonReturn";
	}
	eval("zsClass.coreAjax(name,param,refun,{callback:reply,exceptionHandler:exceptionHandler})");
}
//提交
function submitDot(param,name,refun){
	if(refun==undefined||refun=="") {
		refun="doCommonReturn";
	}
	eval("zsClass.dotAjax(name,param,refun,{callback:reply,exceptionHandler:exceptionHandler})");
}
//提交
function submitZs(param,name,refun){
	if(refun==undefined||refun=="") {
		refun="doCommonReturn";
	}
	eval("zsClass.ZsAjax(name,param,refun,{callback:reply,exceptionHandler:exceptionHandler})");
}

//提交
function submitUpload(name,fold,index,ispic,refun){
	var val=$("#"+name).val();
	if(val==""){
		atInfo("请选择上传文件!");
	}else{
		var param=new Object();
		param.name=name;
		param.fun=refun;
		param.fold=fold;
		param.index=index;
		param.ispic=ispic;
		submitCommon(param,"doUpload","doReturnUpload");
	}
}
function doReturnUpload(data){
	var flag=data["flag"];
	if(flag==1){
		var uid=data["uid"];
		var no=data["no"];
		var md5=data["md5"];
		var name=data["name"];
		var fun=data["fun"];
		var index=data["index"];
		var ispic=data["ispic"];
		var url=data["url"];
		var action=url+"?uid="+uid+"&no="+no+"&md5="+md5+"&ispic="+ispic+"&fun="+fun+"&index="+index;
		var form1="form_"+index;
		$("#"+form1).attr("action",action);
		$("#"+form1).submit();
		//每1秒执行 
		$('body').everyTime('1s',"upload",function(){ 
			getUploadProgress(no,"doGetUploadProgress");
		}); 
	}else{
		var msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}
function doGetUploadProgress(data){
	var flag=data["flag"];
	var errFlag=data["errFlag"];
	var index=data["index"];
	if(errFlag==1){
		if(flag>=100){
			$('body').stopTime('upload');
			//获得信息
			doAddFile(data);
			parent.$("#img"+index).val("");
		}
		try{
			uploadProgressReturn(flag);
		}catch(e){}
	}else{
		parent.$("#img"+index).val("");
		$('body').stopTime('upload');
		parent.atPageClose("upload");
		var msg=getCommonMsg(errFlag);
		parent.atInfo(msg);
	}
}
function getUploadProgress(no,refun){
	if(refun==undefined||refun=="") {
		refun="doCommonReturn";
	}
	var param=new Object();
	param["no"]=no;
	submitCommon(param,"getUploadProgress",refun);
}

//获得信息
function getCommonMsg(flag){
	var msg="";
	if(flag==1000){
		msg="由于长时间未进行操作,请先登录!";
	}else if(flag==1001){
		msg="本帐号尚未绑定手机或身份证!";
	}else if(flag==1002){
		msg="本帐号尚未绑定手机或身份证!";
	}else if(flag==1003){
		msg="只有系统管理员才能进行操作!";
	}else if(flag==9999){
		msg="请求方法不存在!";
	}else if(flag==0){
		msg="未知错误!";
	}else if(flag==1){
		msg="操作成功!";
	}else if(flag==2){
		msg="操作失败!";
	}else if(flag==3){
		msg="您还没有登录，请先登录!";
	}else if(flag==4){
		msg="您的等级不够，请重新登录!";
	}else if(flag==5){
		msg="您不是管理员，不能进行操作!";
	}else if(flag==6){
		msg="用户不存在!";
	}else if(flag==7){
		msg="文件超过规定大小,请重新选择!";
	}else if(flag==8){
		msg="用户取消成功,请重新上传!";
	}else if(flag==9){
		msg="上传失败!";
	}else if(flag==10){
		msg="上传校验失败!";
	}else if(flag==11){
		msg="不能进行上传!";
	}else if(flag==12){
		msg="课程不存在!";
	}else if(flag==13){
		msg="该课程未完善,不能进行添加!";
	}else if(flag==14){
		msg="用户不存在!";
	}else if(flag==15){
		msg="用户等级不够，不能添加!";
	}else if(flag==16){
		msg="批次已结束不能进行操作!";
	}else if(flag==20){
		msg="验证码不正确,请重新输入!";
	}else if(flag==21){
		msg="用户名或密码错误,请重新输入!";
	}else if(flag==22){
		msg="用户被冻结!";
	}else if(flag==23){
		msg="用户被冻结!";
	}else if(flag==24){
		msg="你发邮件频率过快,请稍等后再发!";
	}else if(flag==25){
		msg="该账号已经激活!";
	}else if(flag==26){
		msg="用户名不存在!";
	}else if(flag==27){
		msg="该用户名的忘记密码邮件已发送，请不要重复提交!";
	}else if(flag==28){
		msg="答案不正确!";
	}else if(flag==29){
		msg="重置密码链接时间已失效!";
	}else if(flag==30){
		msg="邮箱已存在!";
	}else if(flag==31){
		msg="旧密码不正确，请重新输入!";
	}else if(flag==32){
		msg="新密码位数不正确，请重新输入!";
	}else if(flag==33){
		msg="昵称不能为纯数字!";
	}else if(flag==34){
		msg="昵称已存在!";
	}else if(flag==35){
		msg="姓名不正确,请重新输入!";
	}else if(flag==36){
		msg="身份证号已经认证,不能重复认证!";
	}else if(flag==37){
		msg="身份证号校验失败,请重新输入!";
	}else if(flag==38){
		msg="身份证号已存在,请重新输入!";
	}else if(flag==40){
		msg="短信发送失败!";
	}else if(flag==41){
		msg="手机号码已存在,请重新输入!";
	}else if(flag==42){
		msg="您的帐号已经超过当日最大短信下发次数,请明天在进行验证!";
	}else if(flag==43){
		msg="该手机号码已经超过当日最大短信下发次数,请明天在进行验证!";
	}else if(flag==44){
		msg="每次短信下发需等待5分钟后才能再次发送!";
	}else if(flag==45){
		msg="验证码不正确,请重新输入!";
	}else if(flag==46){
		msg="手机号码已存在,请重新输入!";
	}else if(flag==50){
		msg="您输入的充值卡密码已被使用!";
	}else if(flag==51){
		msg="您输入的充值卡密码不正确!";
	}else if(flag==52){
		msg="您充值的卡密码一个帐号只能充值一次!";
	}else if(flag==53){
		msg="支付地址生成错误!";
	}else if(flag==54){
		msg="根据对方设置，你不能进行该操作。";
	}else if(flag==55){
		msg="不能关注自己!";
	}else if(flag==56){
		msg="已关注!";
	}else if(flag==57){
		msg="对方已把你列为黑名单,无法关注!";
	}else if(flag==58){
		msg="分组名已存在!";
	}else if(flag==59){
		msg="身份证未绑定，不能进行此操作!";
	}else if(flag==60){
		msg="昵称不存在!";
	}else if(flag==61){
		msg="不能发给自己!";
	}else if(flag==62){
		msg="无此记录!";
	}else if(flag==70){
		msg="该部门您已加入!";
	}else if(flag==71){
		msg="您已经申请，请耐心等待管理员审核!";
	}else if(flag==72){
		msg="终极部门才能申请加入!";
	}else if(flag==73){
		msg="部门最多申请加入1个!";
	}else if(flag==74){
		msg="部门管理员已有人申请!";
	}else if(flag==80){
		msg="班级已存在,请核对!";
	}else if(flag==81){
		msg="您已申请其它班级，请先撤销后才能进行申请!";
	}else if(flag==82){
		msg="班级已被申请,请核对!";
	}else if(flag==83){
		msg="该帖已关闭,不允许回复!";
	}else if(flag==90){
		msg="班级已存在,请核对!";
	}else if(flag==91){
		msg="云教学名称已存在!";
	}else if(flag==92){
		msg="该用户已经是超级管理员,不能进行添加!";
	}else if(flag==93){
		msg="试用期间不能进行申请!";
	}else if(flag==94){
		msg="您已申请,请耐心等待管理员审核!";
	}else if(flag==95){
		msg="该管理员已添加!";
	}else if(flag==96){
		msg="云教学名称已存在!";
	}else if(flag==100){
		msg="您的等级不够，本操作需要绑定手机";
	}else if(flag==101){
		msg="您的等级不够，本操作需要绑定手机及认证身份证信息";
	}else if(flag==102){
		msg="相同内容请间隔10分钟再进行发布";
	}else if(flag==103){
		msg="网址解析失败!";
	}else if(flag==104){
		msg="您不是管理员!";
	}else if(flag==110){
		msg="名称已存在!";
	}else if(flag==111){
		msg="管理员已添加!";
	}else if(flag==112){
		msg="班级已存在,请核对!";
	}else if(flag==113){
		msg="该用户已经是该部门管理员,不能进行添加!";
	}else if(flag==120){
		msg="系统暂时不能进行创建!";
	}else if(flag==121){
		msg="名称已存在,请更换名称!";
	}else if(flag==122){
		msg="审核中，不允许进行操作!";
	}else if(flag==130){
		msg="认证等级2的用户才能评价!";
	}else if(flag==131){
		msg="您已评价!";
	}else if(flag==132){
		msg="请选择评分!";
	}else if(flag==133){
		msg="请填写评论内容!";
	}else if(flag==134){
		msg="徽章不存在!";
	}else if(flag==140){
		msg="标签已存在!";
	}else if(flag==141){
		msg="已经超过最大标签添加数!";
	}else if(flag==142){
		msg="标签不存在!";
	}else if(flag==143){
		msg="您已申请!";
	}else if(flag==144){
		msg="不符合升级条件!";
	}else if(flag==150){
		msg="不能添加自己!";
	}else if(flag==160){
		msg="您已经加入支部";
	}else if(flag==161){
		msg="您已申请，请等待审核!";
	}else if(flag==162){
		msg="邀请学生必须加入某一个部门";
	}else if(flag==170){
		msg="信息填写不全，请检查!";
	}else if(flag==171){
		msg="你已申请，请耐心等待老师审核!";
	}else if(flag==180){
		msg="批次未开始不能进行操作!";
	}else if(flag==181){
		msg="批次已结束不能进行操作!";
	}else if(flag==182){
		msg="该任务您已接!";
	}else if(flag==183){
		msg="该任务已超过提交期限!";
	}else if(flag==184){
		msg="实习汇报已超过提交期限!";
	}else if(flag==185){
		msg="学习卡不足不能开通学生!";
	}else if(flag==190){
		msg="您已添加";
	}else if(flag==191){
		msg="开始时间不能小于等于今天";
	}else if(flag==192){
		msg="结束时间要小于等于开始时间";
	}else if(flag==200){
		msg="只有在读学生才能进行次操作!";
	}else if(flag==201){
		msg="该课程你已报名，不能重复报名!";
	}else if(flag==202){
		msg="用户等级必须大于等于1才可以进行报名!";
	}else if(flag==203){
		msg="必须是该单位用户才可以发言!";
	}else if(flag==204){
		msg="本课程探讨已关闭!";
	}else if(flag==205){
		msg="您已投票过!";
	}else if(flag==206){
		msg="只有发布者才能删除!";
	}else if(flag==207){
		msg="您目前不能进行评价!";
	}else if(flag==208){
		msg="您已评价,无需再评价!";
	}else if(flag==210){
		msg="认证等级2的用户才能评价!";
	}else if(flag==211){
		msg="您已评价!";
	}else if(flag==212){
		msg="请选择评分!";
	}else if(flag==213){
		msg="请填写评论内容!";
	}else if(flag==214){
		msg="课程不存在!";
	}else if(flag==215){
		msg="审核者不能为自己!";
	}else if(flag==220){
		msg="请先进行课程报名!";
	}else if(flag==231){
		msg="该课程已经提交审核,内容无法编辑!";
	}else if(flag==232){
		msg="抱歉,没有找到该网址的视频信息,请确认粘贴视频播放页地址是否正确!";
	}else if(flag==240){
		msg="您的能力分配指数大于剩余能力分配指数!";
	}else if(flag==241){
		msg="考核成绩设置需要等于100!";
	}else if(flag==250){
		msg="超过创建最大数，最多只能创建20个课程标签!";
	}else if(flag==251){
		msg="课程标签名称已存在，请输入其它标签名称!";
	}else if(flag==260){
		msg="系统标签最多添加5个";
	}else if(flag==261){
		msg="标签最多添加10个";
	}else if(flag==262){
		msg="系统标签不能添加";
	}else if(flag==263){
		msg="该标签您已添加";
	}else if(flag==264){
		msg="词条名已添加,请重新输入";
	}else if(flag==265){
		msg="您申请的计费模式处于审核状态";
	}else if(flag==266){
		msg="您已申请,请耐心等待管理员审核";
	}else if(flag==270){
		msg="您已申请了学费方案!";
	}else if(flag==271){
		msg="您已申请,请耐心等待管理员审核!";
	}else if(flag==272){
		msg="可分配金额未分配完!";
	}else if(flag==273){
		msg="分配方案平台已设置!";
	}else if(flag==274){
		msg="您的能力分配指数大于剩余能力分配指数!";
	}else if(flag==280){
		msg="登录密码不正确";
	}else if(flag==281){
		msg="您已申请";
	}else if(flag==282){
		msg="转移用户必须等级大于等于2";
	}else if(flag==283){
		msg="免费课程不能转移给单位";
	}else if(flag==284){
		msg="课程价格不再单位帐号允许价格范围内";
	}else if(flag==285){
		msg="子帐号未授权";
	}else if(flag==290){
		msg="您的等级必须大于等于1!";
	}else if(flag==291){
		msg="该课程目前不允许购买!";
	}else if(flag==292){
		msg="该课程你已购买!";
	}else if(flag==293){
		msg="该课程不是付费课程!";
	}else if(flag==294){
		msg="支付地址生成错误!";
	}else if(flag==300){
		msg="该渠道不能添加用户!";
	}else if(flag==301){
		msg="该用户已添加!";
	}else if(flag==302){
		msg="批次已结束不能进行操作!";
	}else if(flag==303){
		msg="有渠道使用不能删除!";
	}else if(flag==304){
		msg="名称已添加!";
	}else if(flag==305){
		msg="该用户已经是该渠道管理员,不能进行添加!";
	}else if(flag==306){
		msg="该用户已经是更上一级管理员!";
	}else if(flag==310){
		msg="批次已结束不能进行操作!";
	}else if(flag==320){
		msg="试卷设置不能进行操作";
	}else if(flag==321){
		msg="考试日期不能超过批次结束日期";
	}else if(flag==322){
		msg="发卷时间不正确";
	}else if(flag==323){
		msg="考试时长大于0的数字";
	}else if(flag==324){
		msg="题目中未包含（）";
	}else if(flag==330){
		msg="该用户已经是渠道成员";
	}else if(flag==340){
		msg="密码输入不正确";
	}else if(flag==341){
		msg="课程结业后才能重修申请";
	}else if(flag==342){
		msg="您已申请过重修";
	}else if(flag==350){
		msg="课程卡不足";
	}else if(flag==360){
		msg="该分组已添加";
	}else if(flag==370){
		msg="邮件发送失败!";
	}else if(flag==371){
		msg="手机号码不存在!";
	}else if(flag==372){
		msg="请过5分钟后继续找回密码!";
	}else if(flag==373){
		msg="超过3次验证次数!";
	}else if(flag==374){
		msg="验证码不正确!";
	}else if(flag==375){
		msg="身份证和姓名不正确!";
	}else if(flag==376){
		msg="手机号码已存在，请更换其它手机号码!";
	}else if(flag==377){
		msg="邮箱已存在，请更换其它邮箱!";
	}else if(flag==378){
		msg="该号码验证码发送已达上限，请明日再试!";
	}else if(flag==379){
		msg="该号码今天已验证，请明日再试!";
	}else if(flag==380){
		msg="该号码验证码验证次数已达上限，请明日再试!";
	}else if(flag==390){
		msg="渠道单位不存在!";
	}else if(flag==391){
		msg="该渠道单位已被添加!";
	}else if(flag==400){
		msg="该用户已经在学习计划名单中";
	}else if(flag==500){
		msg="选择课程已有进行中计划,课程对应计划结束后才能创建!";
	}else if(flag==501){
		msg="该计划对应的课程您已有其它计划报名，请完成该课程对应的计划后才能报名!";
	}else if(flag==502){
		msg="树下有知识点不能删除，请脱离知识点后才能删除!";
	}else if(flag==510){
		msg="该课程不允许重修!";
	}else if(flag==520){
		msg="密码不正确!";
	}else if(flag==521){
		msg="班级成员才能进行操作!";
	}else if(flag==530){
		msg="您不是班级管理员!";
	}else if(flag==531){
		msg="超过最大友好班级申请!";
	}else if(flag==532){
		msg="您的班级已申请!";
	}else if(flag==533){
		msg="职务名称已存在!";
	}else if(flag==534){
		msg="本班成员才能申请成为管理员!";
	}else if(flag==535){
		msg="超过管理员最大数!";
	}else if(flag==536){
		msg="您已申请!";
	}else if(flag==537){
		msg="30天内不允许发起多次罢免!";
	}else if(flag==538){
		msg="最多只能上传5张图片!";
	}else if(flag==539){
		msg="本校学生才能成为管理员!";
	}else if(flag==540){
		msg="只能添加一个管理员!";
	}else if(flag==541){
		msg="竞选中不能添加!";
	}else if(flag==542){
		msg="本校学生才能进行操作!";
	}else if(flag==543){
		msg="管理员助理只能添加2个!";
	}else if(flag==544){
		msg="投票已结束!";
	}else if(flag==545){
		msg="大二，大三学生才能参加竞选!";
	}else if(flag==546){
		msg="用户目前为管理员，要辞职管理员身份才能退出或删除!";
	}else if(flag==547){
		msg="今日您已投票，若需变更请明日再来!";
	}else if(flag==548){
		msg="您已投票!";
	}else if(flag==549){
		msg="非本院系成员无权操作!";
	}else if(flag==550){
		msg="非本班成员无权操作!";
	}else if(flag==600){
		msg="超级管理员已存在!";
	}else if(flag==601){
		msg="社团名称已存在!";
	}else if(flag==602){
		msg="您已申请!";
	}else if(flag==603){
		msg="您已是社团会员!";
	}else if(flag==604){
		msg="超过最大友好社团申请!";
	}else if(flag==605){
		msg="您的社团已申请!";
	}else if(flag==606){
		msg="您不是该社团管理员!";
	}else if(flag==607){
		msg="您已关注!";
	}else if(flag==608){
		msg="非本社团会员无权操作!";
	}else if(flag==609){
		msg="今日您已评价，若需变更请明日再来!";
	}else if(flag==610){
		msg="您已评价!";
	}else if(flag==611){
		msg="本社团仅限本校在校生申请，请先加入班级!";
	}else if(flag==612){
		msg="超级管理员已添加!";
	}else if(flag==613){
		msg="该社团名称已被申请!";
	}else if(flag==700){
		msg="获得相应的徽章后才能申请!";
	}else if(flag==710){
		msg="金钥匙已用完!";
	}else if(flag==720){
		msg="您不是马克思主义学院学生!";
	}else if(flag==721){
		msg="您已报名!";
	}else if(flag==722){
		msg="微课不存在!";
	}else if(flag==730){
		msg="用户已添加!";
	}else if(flag==731){
		msg="ZZ不存在!";
	}else if(flag==732){
		msg="名称已存在!";
	}else if(flag==733){
		msg="已被关联无法删除!";
	}else if(flag==734){
		msg="床号已有人";
	}else if(flag==735){
		msg="记录已添加";
	}else if(flag==740){
		msg="方案在审核中";
	}else if(flag==741){
		msg="视频地址不正确";
	}else if(flag==750){
		msg="剩余邀请次数不足，不能发起邀请";
	}else if(flag==751){
		msg="剩余邀请次数不足，请单独邀请";
	}else if(flag==752){
		msg="至善币不足,发送1次需要1枚至善币";
	}else if(flag==760){
		msg="您已点赞";
	}else if(flag==770){
		msg="部门不是终极不能加入";
	}else if(flag==771){
		msg="您已加入部门";
	}else if(flag==772){
		msg="您已申请加入部门，请耐心等待审核";
	}else if(flag==780){
		msg="教师已添加";
	}else if(flag==790){
		msg="您已申请或房间人已满";
	}else if(flag==791){
		msg="您不是学生不能申请";
	}else if(flag==792){
		msg="用户不存在";
	}
	return msg;
}

//获得出错信息
function getErrMsg(name){
	var msg="请先登录";
	if(name=="UserRoleException"){
		msg="由于长时间未进行操作,请先登录!";
	}else if(name=="UserRole2Exception"){
		//msg="您的等级不够，本操作需要绑定手机及认证身份证信息!";
		msg="本帐号尚未绑定手机或身份证";
	}else if(name=="UserRoleSysException"){
		msg="只有系统管理员才能进行操作!";
	}
	return msg;
}

//异常返回
function exceptionHandler(errorString,exception){
	var name=exception["cause"].message;
	var msg=getErrMsg(name);
	var url=base+"/index.htm";
	atInfo(msg,function(){location.href=url;});
}
//普通返回
function doCommonReturn(data){
	var flag=data["flag"];
	if(flag==1){
		parent.reloadAjax();
		parent.showSuccess();
		try{
			parent.atPageClose();
		}catch(e){}
		return;
	}else{
		var msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}

function doCommonReturn2(data){
	var flag=data["flag"];
	if(flag==1){
		parent.reloadAjax();
		ajaxreload();
		showSuccess();
		return;
	}else{
		var msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}

function doCommonReturn3(data){
	var flag=data["flag"];
	if(flag==1){
		location.reload();
		return;
	}else{
		var msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}

function doCommonReloadReturn(data){
	var flag=data["flag"];
	var msg="";
	if(flag==1){
		parent.location.reload();
		return;
	}else{
		msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}
function doCommonReloadInfoReturn(data){
	var flag=data["flag"];
	var msg="";
	if(flag==1){
		parent.atInfo("操作成功",function(){parent.location.reload();});
		return;
	}else{
		msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}
function doCommonDeleteReturn(data){
	var flag=data["flag"];
	var msg="";
	if(flag==1){
		hideDelete("msg_"+data["id"]);
		return;
	}else{
		msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}


function doCommonIframeReturn(data){
	var flag=data["flag"];
	var msg="";
	if(flag==1){
		try{
			var url=parent.getIframeUrl();
			var ifobj=parent.document.getElementById("ajaxiframe");
			ifobj.src=url;
		}catch(e){}
		try{
			parent.reloadAjax();
		}catch(e){}
		parent.showSuccess();
		try{
			parent.atPageClose();
		}catch(e){}
		return;
	}else{
		msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}
function doCommonSuccessReturn(data){
	var flag=data["flag"];
	var msg="";
	if(flag==1){
		try{
			parent.reloadAjax();
		}catch(e){}
		parent.showSuccess();
		return;
	}else{
		msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}
function doAjaxReturn(data){
	reloadAjax();
}

function doCommonPopReturn(data){
	var flag=data["flag"];
	var msg="";
	if(flag==1){
		var pageiframe=$("#pageiframe");
		var url=$("#pageiframe",parent.document.body).attr("src"); 
		$("#pageiframe",parent.document.body).attr("src",url); 
		return;
	}else{
		msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}


function doCommonOkReturn(data){
	var flag=data["flag"];
	if(flag==1){
		parent.reloadAjax();
		parent.showSuccess();
		try{
			parent.atPageClose();
		}catch(e){}
		return;
	}else{
		var msg=getCommonMsg(flag);
		parent.atInfo(msg);
	}
}


