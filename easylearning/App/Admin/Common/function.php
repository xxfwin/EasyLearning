<?php
/**
 * 清空缓存
 */
function sp_clear_cache(){
		$dirs = array ();
		// runtime/
		$rootdirs = sp_scan_dir( RUNTIME_PATH."*" );
		//$noneed_clear=array(".","..","Data");
		$noneed_clear=array(".","..");
		$rootdirs=array_diff($rootdirs, $noneed_clear);
		foreach ( $rootdirs as $dir ) {
			
			if ($dir != "." && $dir != "..") {
				$dir = RUNTIME_PATH . $dir;
				if (is_dir ( $dir )) {
					//array_push ( $dirs, $dir );
					$tmprootdirs = sp_scan_dir ( $dir."/*" );
					foreach ( $tmprootdirs as $tdir ) {
						if ($tdir != "." && $tdir != "..") {
							$tdir = $dir . '/' . $tdir;
							if (is_dir ( $tdir )) {
								array_push ( $dirs, $tdir );
							}else{
								@unlink($tdir);
							}
						}
					}
				}else{
					@unlink($dir);
				}
			}
		}
		$dirtool=new \Think\Dir("");
		foreach ( $dirs as $dir ) {
			$dirtool->delDir ( $dir );
		}
		
}
/**
 * 替代scan_dir的方法
 * @param string $pattern 检索模式 搜索模式 *.txt,*.doc; (同glog方法)
 * @param int $flags
 */
function sp_scan_dir($pattern,$flags=null){
	$files = array_map('basename',glob($pattern, $flags));
	return $files;
}
/**
 * 递归重组节点信息
 */
function node_merge($node,$access=null,$pid=0){
	$arr=array();
	foreach ($node as $v) {
	   
		if($v['pid']==$pid){
			$v['child']=node_merge($node,$access,$v['id']);

			$arr[]=$v;
		}
	}
	return $arr;
}
/**
 * 递归重组节点信息
 */
function node_merges($node,$access=null,$pid=0){
	$arr=array();
	foreach ($node as $v) {
	   if(is_array($node)){
	   		$v['access']=in_array($v['id'], $access)?1:0;
		}
		if($v['pid']==$pid){
			$v['child']=node_merges($node,$access,$v['id']);

			$arr[]=$v;
		}
	}
	return $arr;
}

 /**
 *	生成随机数
 */
function getRandom($param){
	$str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$key = "";
	for($i=0;$i<$param;$i++){
		$key .= $str{mt_rand(0,32)};
	}
	return $key;
 }
 
 function getRandomNum($param){
	$str="0123456789";
	$key = "";
	for($i=0;$i<$param;$i++){
		$key .= $str{mt_rand(0,9)};
	}
	return $key;
 }
 
/**
 *	修剪图片
*/

function cut($background, $cut_x, $cut_y, $cut_width, $cut_height, $location){
	$back=imagecreatefrompng($background);
	$new=imagecreatetruecolor($cut_width, $cut_height);
	imagecopyresampled($new, $back, 0, 0, $cut_x, $cut_y, $cut_width, $cut_height,$cut_width,$cut_height);
	imagejpeg($new, $location);
	imagedestroy($new);
	imagedestroy($back);
}

function thumn($background, $width, $height, $newfile) {
	  list($s_w, $s_h)=getimagesize($background);//获取原图片高度、宽度
	   //if ($width && ($s_w < $s_h)) {
	//	    $width = ($height / $s_h) * $s_w;
	//	     } else {
	//		      $height = ($width / $s_w) * $s_h;
	//		       }
	   $new=imagecreatetruecolor($width, $height);
	   $img=imagecreatefrompng($background);
	    imagecopyresampled($new, $img, 0, 0, 0, 0, $width, $height, $s_w, $s_h);
	    imagejpeg($new, $newfile);
	     imagedestroy($new);
	     imagedestroy($img);
}

  /**
 *	生成二维码
 */
function genQRcode($incident,$level=3,$size=2){
	Vendor('phpqrcode.phpqrcode');
	$errorCorrectionLevel =intval($level) ;//容错级别 
	$matrixPointSize = intval($size);//生成图片大小 
	//生成二维码图片 
	//echo $_SERVER['REQUEST_URI'];
	$object = new \QRcode();
	//$object->png('http://pingan.microbye.com/index.php/Home/factory/getincident/incident/'.$incident, '/Public/qrcode/'.$incident, $errorCorrectionLevel, $matrixPointSize, 2);   
	$object->png('http://pingan.microbye.com/index.php/Home/factory/getincident/incident/'.$incident, 'Public/qrcode/'.$incident.'.png', QR_ECLEVEL_H, $matrixPointSize, 2);   
	//thumn('Public/qrcode/'.$incident.'.png',450,250,'Public/qrcode/'.$incident.'.small.jpeg');
}
 
 /**
 *	得到权限id
 */
 function getRole($username){
	
	$role_id = M('admin_admin')->where(array('username'=>$username))->getField('role_id');
	
	return $role_id;	 
	 
 }
 
 
 	
 /*获取access_token
   *@return objectStr
   */
 function get_accessToken($appid,$secret){ 
		$url_get = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$secret;
		/*函数首选会在数据库中查找已经保存好的token，并且检查当前时间和token获取的事件是否超过了
		2小时,即7200s，如果超过，那么重新获取该tokrn后写入数据库，如果没有，那么直接获取后返回
		
		*/
		$token = M('access_token');//实例化token用户表对象用户表对象
		$tokendata = $token->where(array('name' => 'token'))->find(); //获取用户信息
		if(time()-$tokendata['create_date']<=1800){
			return $tokendata['access_token'];
		}
		$ch1 = curl_init ();
		$timeout = 5;
		curl_setopt ( $ch1, CURLOPT_URL, $url_get );
		curl_setopt ( $ch1, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch1, CURLOPT_CONNECTTIMEOUT, $timeout );
		curl_setopt ( $ch1, CURLOPT_SSL_VERIFYPEER, true );
		curl_setopt ( $ch1, CURLOPT_SSL_VERIFYHOST, true );
		$accesstxt = curl_exec ( $ch1 );
		curl_close ( $ch1 );
		$access = json_decode ( $accesstxt, true );
		if (empty ( $access ['access_token'] )) {
			return  '获取access_token失败,请确认AppId和Secret配置是否正确,然后再重试。' ;
		}
		$tokendata['access_token'] = $access ['access_token'];
		$tokendata['create_date'] = time() ;
		$tokendata['name']='token';
		$token->where(array('name'=>'token'))->save($tokendata);
		return $access ['access_token'];
  }
			
//调用客服id主动推送消息	
 function curlPost($data,$url){
	 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, TRUE);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
		$info = curl_exec($ch);
 
		if (curl_errno($ch)) {
			return 'Errno';
		}
 
		curl_close($ch);
		return json_decode($info);
	}
	
	
// 微信推送文字消息
// 参数openid与string内容
function sendMessage($msg , $openid){



	$data = '{
		"touser":"%s",
		"msgtype":"text",
		"text":
			{
			"content":"%s"
			}
		}';
				
	$jdata = sprintf($data,$openid,$msg);
	//调用客服接口直接发送给定损员确认信息
	$access_token= get_accessToken("wxa97e48cfa3e4a48f","d4624c36b6795d1d99dcf0547af5443d");
	$url = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token;
	
	curlPost($jdata,$url);
}
	
//+++++++++++++++++++++++++++微信部分	
//微信实现用户分组，传入数据为openid和分组类型，1为定损员，2为修理厂
	
function userDivide($openid, $type){
		$access_token  = get_accessToken('wxa97e48cfa3e4a48f','d4624c36b6795d1d99dcf0547af5443d');
		$data = '{
			"openid":"%s","to_groupid":%s
					}';
		switch($type){
			case 1:
					$jdata = sprintf($data,$openid,'100');break; // 100是定损员的分类
			case 2:
					$jdata = sprintf($data,$openid,'103');break; //  103是4s店的分类
			default:return "你的类型有误";
		}
		$url = 'https://api.weixin.qq.com/cgi-bin/groups/members/update?access_token='.$access_token;
		
		
		return curlPost($jdata,$url);
		
	}
 

?>
