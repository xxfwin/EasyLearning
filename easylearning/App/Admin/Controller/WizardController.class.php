<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 快速添加
 */
class WizardController extends CommonController {
    private $model;
    private $pageAll;
    private $order;
    private $where;
	
    public function _initialize(){
        parent::_initialize();
        $this->model=D('AdminIncident');
		
    }
    public function index(){
        if(IS_POST){
			$data=I('post.');
			
			// 处理用户信息
			$user['username'] = $data['username'];
			//$user['idcard'] = $data['useridcard'];
			$user['phone'] = $data['userphone'];
			//$user['insurance'] = $data['userinsurance'];
			
			
			$userid = M('admin_user')->where($user)->getField('id');
			
			
			if(empty($userid)){
				
				// 验证码生成
				$authcode = '';
				do{
					//生成验证码
					$authcode= getRandomNum(6); 
					$exit_id = M('admin_user')->where(array('authcode'=>$authcode))->find();
					$mark= 1;
					if(empty($exit_id))//如果是空，说明没有相应的数据，该验证码可以用，不用循环了
						$mark = 0;
						M('admin_user')->where(array('id'=>$data['id']))->save(array('authcode'=>$authcode));
				}
				while($mark);
				$user['authcode'] = $authcode;
				
				// 推送消息到微信
				$weixinid = M('admin_admin')->where(array('id' => session('id')))->getfield('weixinid');
				$openid = M('follow')->where(array('id' => $weixinid ))->getfield('openid');
					
				$data['id'] = M('admin_user')->where(array('username' => $data['username'], 'idcard' => $data['idcard'], 'authcode' => $authcode))->getField('id');
					
				$msg = '您添加了一位客户\n 其信息为 id: ' . $data['id']  . '\n 姓名: ' . $data['username']  . '\n 手机号码 :' .$data['phone'] .  '\n 保单号 :' .$data['insurance'] .'\n认证码 :'.$authcode ;
					
				sendMessage($msg  , $openid);
				
				
				// 添加记录到数据库
				M('admin_user')->add($user);
				$userid = M('admin_user')->where($user)->getField('id');
			}
			
			$user['id'] = $userid;
			
			
			
			// 处理车辆信息
			$car['platenumber'] = $data['carplatenumber'];
			//$car['brandid'] = $data['carbrandid'];
			//$car['type'] = $data['cartype'];
			//$car['value'] = $data['carvalue'];
			$car['userid'] = $user['id'];  
			$data['candidatefactoryid'] = join(',',$data['candidatefactoryid']);
			if(!$data['factoryid']){
				$data['factoryid'] = NULL;
			}
			
			$carid = M('admin_car')->where($car)->getField('id');
			if(empty($carid)){
				
				M('admin_car')->add($car);
				$carid = M('admin_car')->where($car)->getField('id');
			}
			$car['id'] = $carid;
			
			$thirdparty = [];
			
			if($data['is_thirdparty']){
				
				$thirdparty['username'] = $data['thirdparty_name'];
				$thirdparty['phone'] = $data['thirdparty_phone'];
				$thirdparty['platenumber'] = $data['thirdparty_platenumber'];
				
				$thirdpartyid = M('admin_thirdparty')->where($thirdparty)->getField('id');
				if(empty($thirdpartyid)){
				
					M('admin_thirdparty')->add($thirdparty);
					$thirdpartyid = M('admin_thirdparty')->where($thirdparty)->getField('id');
				}
				$thirdparty['id'] = $thirdpartyid;
				
			}
			else{
				
				unset($thirdparty);
			}
			
			
			$incident['userid'] = $user['id'];
			$incident['carid'] = $car['id'];
			$incident['phone'] = $data['phone'];
			$incident['carposition'] = $data['carposition'];
			$incident['position'] = $data['position'];
			$incident['faultyid'] = $data['faultyid'];
			$incident['count'] = 1;
			$incident['date'] = $data['date'];
			$incident['status'] = 1;
			$incident['factoryid'] = $data['factoryid'];
			$incident['candidatefactoryid'] = $data['candidatefactoryid'];
			$incident['enddate'] = date('Y-m-d H:i:s',time());;
			$incident['is_thirdparty'] = $data['is_thirdparty'];
			if($data['is_thirdparty']){
				$incident['thirdparty_id'] = $thirdparty['id'];
			}
			
			if(M('admin_incident_faulty')->where(array('id'=>$data['faultyid']))->find()){
			
			}
			else {
				$this->error('该事故类型不存在');
			}
			
			$incident['id'] = getRandom(128);
			$incident['auditor_id'] = $_SESSION['id'];
			
			while(M('admin_incident')->where(array("id" => $incident['id']))->find())
				$data['id'] = getRandom(128);
			
            if($this->add_com($this->model,$incident)){
                $this->success('添加成功',U('Incident/index'));
            }else{
                $this->error('添加失败');
            }
			
        }else{
            // $this->list=$this->cate_list($this->modelCate,'',array('sort','id'=>'desc'));
			$this->faultyinfo=M('admin_incident_faulty')->select();
			$this->factorylist=M('admin_factory')->field('name,id')->select();
			//$this->carinfo=M('admin_car_brand')->field('id,brand')->select();
			
            $this->display();
            //$this->show("hello world");
        }
      

    }
	
	public function query(){
		if(IS_POST){
			// state 为回复状态，0为正常，1为错误，2为空
			//$query = json_decode()
			
			$where['platenumber'] = I('carplatenumber');
			
			$car_info = M('admin_car')->where($where)->select();
			
			if(count($car_info) > 1){
				$data['state'] = 1;
				$this->ajaxReturn($data);
			}
			else if(count($car_info) < 1){
				$data['state'] = 2;
				$this->ajaxReturn($data);
			}
			else {
				$user_info = M('admin_user')->where(array('id' => $car_info[0]['userid']))->select();
				$data['username'] = $user_info[0]['username'];
				$data['phone'] = $user_info[0]['phone'];
				$data['state'] = 0;
				$this->ajaxReturn($data);
			}

		}
		else{
			//$data['text'] = "test";
			//$this->ajaxReturn($data,"请求成功",1);
			$this->error('访问错误');
		}
	}
	


}
