<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 个人信息控制器
 */
class UserInfoController extends CommonController {
	private $model;
    private $pageAll;
    private $order;
    private $where;
	public function _initialize(){
	 	parent::_initialize();
	 	$this->model=M('admin_admin');
    }
    /*修改用户名*/
    public function index(){
        $uid=I('id',0,'intval');
        $id=empty($uid)?$_SESSION['uid']:$uid;
        if(IS_POST){
            $data=I('post.');
            unset($data['id']);
       		if($this->update_com($this->model,array('id'=>$id),$data)){
            session_unset();
            session_destroy();
            $this->success('修改成功',U('UserInfo/index',array('id'=>$id)));
	      	}else{
	             $this->success('修改失败');
          	}

        }else{

            $this->info=$this->info_com($this->model,'','',array('id'=>$id));

            $this->display();
        }
    }

  /*修改密码*/
    public function pass(){
        $uid=I('id',0,'intval');
        $id=empty($uid)?$_SESSION['uid']:$uid;
        if(IS_POST){
            $data['password']=md5(I('password'));

           if($this->update_com($this->model,array('id'=>$id),$data)){
                session_unset();
                session_destroy();
              $this->success('修改成功',U('UserInfo/index',array('id'=>$id)));
            }else{
                 $this->success('修改失败');
           }

          }else{

            $this->info=$this->info_com($this->model,'','',array('id'=>$id));

            $this->display();
        }
    }
    /*检测密码是否正确*/
    public function check_pass(){
        $pass=md5(I('password1'));
        //print_r($pass);exit;
        $info=$this->model->where(array('id'=>$_SESSION['id']))->getField('password');
        if($info==$pass){

            exit('0');
        }else{
            exit('1');
        }
    }
}
