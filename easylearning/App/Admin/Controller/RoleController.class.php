<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 角色控制器
 */
class RoleController extends CommonController {
	private $model;
	private $pageAll;
	private $where;
	private $order;
	public function _initialize(){
       parent::_initialize();
        $this->model=M('admin_role');
        $this->modelNode=M('admin_node');
        $this->modelAccess=M('admin_access');
    }
    public function index(){
    	$this->metal="角色列表";
    	$this->order=array('sort','id'=>'desc');
    	$this->data=$this->page_com($this->model,$this->order);
    	$this->display();
    }
    public function add(){
    	$this->metal="添加角色";
    	if(IS_POST){
    		$data=I('post.');
    		$data['time']=time();
    		if($this->add_com($this->model,$data)){
    			$this->success('添加成功',U('Role/index'));
    		}else{
    			$this->error('删除失败');
    		}
    	}else{
    		$this->display();
    	}

    }
    public function rbac(){
         $id=I('id',0,'intval');
        if(IS_POST){
            $infoNode=$this->modelAccess->where(array('role_id'=>$id))->select();
            if(!empty($infoNode)){
                $this->modelAccess->where(array('role_id'=>$id))->delete();
            }
            $info=I('node');

            foreach ($info as $key => $v) {
                $data[$key]['node_id']=$v;
                $data[$key]['role_id']=$id;
            }
           if($this->modelAccess->addAll($data)){
              $this->success('授权成功',U('Role/index'));
           }else{
              $this->error('授权失败');
           }
        }else{


            $access= $this->modelAccess->where(array('role_id'=>$id))->getField('node_id',true);


            $this->order=array('sort','id'=>'desc');
            $node=$this->info_com($this->modelNode,'',$this->order);
            $this->list=node_merges($node,$access);

            $this->id=$id;
            $this->display();
        }


    }
    public function edit(){

        $id=I('id',0,'intval');
        $this->where=array('id'=>$id);
        if(IS_POST){
            $data=I('post.');
            $data['create_time']=time();
            if($this->update_com($this->model,$thsi->where,$data)){
                $this->success('修改成功',U('Role/index'));
            }else{
                 $this->error('修改失败');
            }
        }else{

            $this->info=$this->edit_com($this->model,$this->where);

            $this->display();
        }
    }
    public function del(){
    	$id=I('id',0,'intval');
		
		if(IS_POST){
			if($this->del_com($this->model,array('id'=>$id))){
				$this->success('删除成功',U('Role/index'));
			}else{
				$this->error('删除失败');
			}
		}
    }
}
