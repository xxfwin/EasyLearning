<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 网站设置控制器
 */
class SettingController extends CommonController {
	private $model;
    private $pageAll;
    private $order;
    private $where;
	public function _initialize(){
	 	parent::_initialize();
	 	$this->model=M('admin_system');
        
    }
    /*修改用户名*/
    public function index(){
       
        if(IS_POST){
            $id=I('id',0,'intval');
            $data=I('post.');
           
            unset($data['id']);
           if($this->update_com($this->model,array('id'=>$id),$data)){
               
                $this->success('修改成功',U('Setting/index'));
              }else{
                 $this->success('修改失败');
              }

        }else{
           
            $this->info=$this->model->find();
            $this->display(); 
        }
    }
   
 
}