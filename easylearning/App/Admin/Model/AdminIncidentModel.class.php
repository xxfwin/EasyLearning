<?php
namespace Admin\Model;
use Think\Model\RelationModel;
/*****
 *		案件模型
 *		editor	nakamura,csd
 *		date		2016-5-17 20:34:57
 *****/
class AdminIncidentModel extends RelationModel {
	const TBL_Incident="admin_incident";
	/*总数*/
	public function incidentCount($where){
		//dump($where);
		$count=M(self::TBL_Incident)->where($where)->count();
		
		return $count;
	}
	/*列表*/
	public function incidentList($firstRow,$listRows,$where){

		$list=M(self::TBL_Incident)
		->where($where)->order(array('id'=>'desc'))->limit($firstRow.','.$listRows)->select();
		// dump($list);
		foreach($list as $key => $v){
		
			$list[$key]['username'] = M('admin_user')->where(array('id'=>$v['userid']))->getField('username');
			$list[$key]['faultytype'] = M('admin_incident_faulty')->where(array('id'=>$v['faultyid']))->getField('type');
			$list[$key]['faultycondition'] = M('admin_incident_faulty')->where(array('id'=>$v['faultyid']))->getField('condition');
			$list[$key]['factoryname'] = M('admin_factory')->where(array('id'=>$v['factoryid']))->getField('name');
			$list[$key]['auditorname'] = M('admin_admin')->where(array('id' => $v['auditor_id']))->getField('nickname');
			$list[$key]['carplatenumber'] = M('admin_car')->where(array('id'=>$v['carid']))->getField('platenumber');
			$list[$key]['thirdpartyplatenumber'] = M('admin_thirdparty')->where(array('id'=>$v['thirdparty_id']))->getField('platenumber');
			//转换：显示是否三者车；将is_thirdparty中的int值转换成'是','否'
			if($list[$key]['is_thirdparty']==1){
				//显示的isthridparty变量的值 is_thirdparty不显示
				$list[$key]['isthirdparty']="是";
			}else{
				$list[$key]['isthirdparty']="否";
			}
			//转换：显示事故类型；同上
			// if($list[$key]['faultyid']>=0)	
		}
		// dump($list);
		return $list;
	}
	
	

	
	//发送二维码给微信,传组装xml，xml中唯一需要提供的参数是需要传给的微信的openid，二维码图片的链接地址即可
	//object中包含基本发送对象的openid ，第二个是需要发送的图文消息的信息
	public function get_qrcode($openid,$newsContent){
		//需要发送的二维码的json代码
		$candidatefactoryid = explode(",",$newsContent['factorys']); 
		
		foreach ($candidatefactoryid as $key => $data){
			$fac = M('admin_factory')->where(array('id' => $data))->select();
			$facdata[$key] = $fac[0];
		}
		//dump($facdata);
		// $facdata = M('admin_factory')->select();
		$content='4S店信息：\n ';
		foreach ($facdata as $key => $data){
			$data['phone'] = M('admin_admin')->where(array('id' => $data['accountid']))->getField('phone');
			$content = $content.($key+1).".". $data['name']."\n". '地址:'.$data['address']  . '\n 联系电话' . $data['phone']."\n";
			
		}
		
		
		$data = '{
				"touser": "%s", 
				"msgtype": "news", 
				"news": {
					"articles": [
					{
						"title": "您的二维码，点击可获取", 
						"description": "提示：二维码是您的唯一业务凭证，请注意妥善保管，请勿告诉他人！\n %s ", 
						"url": "%s"
					}
					]
				}
			}';
		$jdata = sprintf($data,$openid,$content,$newsContent['Url']);
		return $jdata;
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
	
	
	
	// /*查询用户名*/
	// public function user($id){
	// 	$username=M(self::TBL_ADMIN)->where(array('username'=>$username))->getField('username');
	// 	return $username;
	// }
}
?>
