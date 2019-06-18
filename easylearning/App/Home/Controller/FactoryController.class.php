<?php
namespace Home\Controller;
use Think\Controller;
class FactoryController extends Controller {
    public function getincident($incident){
    	
		if(IS_POST){
			$username = I('username');
			$passwd = md5(I('password'));
			
			if(M('admin_incident')->where(array('id' => $incident))->getField('factoryid'))
				$this->error('该账号已经由其他维修厂处理。');
			
			$data = M('admin_admin')->where(array('username' => $username))->select();
			
			//dump($data[0]['password']);
			//dump($passwd);
			
			if($data[0]['password'] == $passwd && $data[0]['role_id'] == 8){
				
				$inci['factoryid'] = M('admin_factory')->where(array('accountid' => $data[0]['id']))->getField('id');
				$inci['status'] = 2;
				M('admin_incident')->where(array('id' => $incident))->save($inci);
				$this->success("添加用户案件成功，即将跳转。",'/index.php/Admin');
			}
			else{
				
				$this->error('用户名或密码错误或您的权限错误。');
			}
			
		}
		else{
			$this->display();
		}
	}
}
