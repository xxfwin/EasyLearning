<?php
namespace Admin\Model;
use Think\Model;
/*****
 *		文章模型
 *		editor	zhangxin
 *		date		2015-5-6 13:34:57
 *****/
class AdminUserModel extends Model {
	const TBL_USER="admin_user";
	// const TBL_CATE="cate";
	const TBL_ADMIN="admin_admin";
	/*总数*/

	public function userCount($where){
		$count=M(self::TBL_USER)->where($where)->count();
		return $count;
	}
	/*列表*/
	public function userList($firstRow,$listRows,$where){


		$list=M(self::TBL_USER)
		->where($where)->order(array('id'=>'desc'))->limit($firstRow.','.$listRows)->select();
		// foreach ($list as $key => $v) {
		// 	$list[$key]['username']=$this->user($v['name']);
		// 	// $list[$key]['cate']=$this->cate($v['cate_id']);
		// }
		return $list;
	}
	/*查询用户名*/
	public function user($id){
		$username=M(self::TBL_ADMIN)->where(array('id'=>$id))->getField('id');
		return $username;
	}
	
	
	function sendMessage($data,$openid){
	$access_token = get_accessToken('wxa97e48cfa3e4a48f','d4624c36b6795d1d99dcf0547af5443d');

	$url = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token 

;
	$jdata =  '{
		"touser":"%s",
		"msgtype":"text",
		"text":
		{
			"content":"%s"
		}
		}';
	
	$jdata = sprintf($jdata,$openid,$data);
	curlPost($jdata,$url);

	}
	
	 /*
   *获取access_token
   *@return objectStr
   */
	public function get_accessToken($appid,$secret){ 
		$url_get = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$secret;
		/*函数首选会在数据库中查找已经保存好的token，并且检查当前时间和token获取的事件是否超过了
		2小时,即7200s，如果超过，那么重新获取该tokrn后写入数据库，如果没有，那么直接获取后返回
		
		*/
		$token = M('access_token');//实例化token用户表对象用户表对象
		$tokendata = $token->where(array('name' => 'token'))->find(); //获取用户信息
		if(time()-$tokendata['create_date']<=7000){
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
			
	
	public function curlPost($data,$url){
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
	
	
}
?>
