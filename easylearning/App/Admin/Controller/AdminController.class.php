<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {
	private $model;
    private $pageAll;
    private $order;
    private $where;
	public function _initialize(){
	 	parent::_initialize();
	 	// $this->model=M('admin_admin');
	 	// $this->modelRole=M('admin_role');
    }
    public function index(){

        // $this->order=array('sort','id'=>'desc');

        // $data=$this->page_com($this->model,$this->order);

        // foreach ($data['list'] as $k => $v) {
        //     $data['list'][$k]['name']=$this->modelRole->where(array('id'=>$v['role_id']))->getField('name');
        // }
        // $this->data=$data;
        $this->display();
    	
    }
    public function add(){
     
        if(IS_POST){
            $data=I('post.');
            $data['password']=md5($data['password']);
            $data['time']=time();
            if($this->add_com($this->model,$data)){
                $this->success('添加成功',U('Admin/index'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->info=$this->info_com($this->modelRole);
            $this->display();
        }
        
    }
    public function edit(){
        
        $id=I('id',0,'intval');
        $where['id']=array('eq',$id);
        if(IS_POST){
          $data=I('post.');
          $data['time']=time();
          if($this->update_com($this->model,$where,$data)){
             $this->success('修改成功',U('Admin/index'));
          }else{
             $this->success('修改失败',U('Admin/index'));
          }
        }else{
          $this->infoRole=$this->info_com($this->modelRole);
          $this->info=$this->edit_com($this->model,$where);
          
          $this->display();  
        }
    }
    public function check_user(){
        $name=I('username');

        $info=$this->model->where(array('username'=>$name))->find();
       
        if(empty($info)){
            exit('0');
        }else{
            exit('1');
        }
    }
    public function del(){
        $id=I('id',0,'intval');
        if($this->del_com($this->model,array('id'=>$id))){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    } 
	
	
	public function bindweixin(){
        $id=I('id',0,'intval');
        $where['id']=array('eq',$id);
        if(IS_POST){
          $data=I('post.');
          $data['time']=time();
		  
		  if($data['weixinid'] == '0')
			  $data['weixinid'] = NULL;
		  //判断是否已经被绑定
		  if(M('admin_admin')->where(array('weixinid' => $data['weixinid']))->find()){
			  $this->success('该微信号已被绑定');
			  
		  }
		  
          if($this->update_com($this->model,$where,$data)){
			  
			  // 获取对应的权限信息
			  $weidata = M('follow')->where(array('id' => $data['weixinid']))->find();
			  $role = M('admin_admin')->where(array('id' => $id))->find();
			  if($role['role_id'] == 2) $menu = 1;
			  else if($role['role_id'] == 8) $menu = 2;
			  else $this->success('该用户无权限使用微信平台');
			  
			  //绑定微信
			  userDivide($weidata['openid'] , $menu);
			  
             $this->success('修改成功',U('Admin/index'));
          }else{
             $this->success('修改失败',U('Admin/index'));
          }
        }
		else{
		  $wherew['nickname'] = array('NEQ' , '');
          $this->infoRole=M('follow')->where($wherew)->select();
          $this->info=$this->edit_com($this->model,$where);
          
          $this->display();  
        }
	}
	



	
	
	
}