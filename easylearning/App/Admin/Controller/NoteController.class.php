<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * �ʼǿ�����
 */
class NoteController extends CommonController {
	private $model;
    private $pageAll;
    private $order;
    private $where;
	public function _initialize(){
	 	parent::_initialize();
	 	$this->model=M('note');
	 
    }
    public function index(){
        
     
    	
        //$this->order=array('sort','id'=>'desc');

        //$this->list=$this->cate_list($this->model,'',$this->order);
       
    	$this->display();
    }
    
    public function add(){
         $this->metal='��ӽڵ�';
        if(IS_POST){
            $data=I('post.');
            $data['time']=time();
            if($this->add_com($this->model,$data)){
                $this->success('��ӳɹ�',U('Node/index'));
            }else{
                 $this->error('���ʧ��');
            }
        }else{
           
            $this->list=$this->cate_list($this->model,array('status'=>'����'),array('sort','id'=>'desc'));

            $this->display();
        }
    }
  
    public function edit(){
        $this->metal='�޸Ľڵ�';
        $id=I('id',0,'intval');
        $this->where=array('id'=>$id);
        if(IS_POST){
            $data=I('post.');
            $data['time']=time();
            if(empty($data['icon'])){
                unset($data['icon']);
            }
            if($this->update_com($this->model,$this->where,$data)){
                $this->success('�޸ĳɹ�',U('Node/index'));
            }else{
                 $this->error('�޸�ʧ��');
            }
        }else{
            $this->list=$this->cate_list($this->model,array('status'=>'����'),array('sort','id'=>'desc'));

            $this->info=$this->edit_com($this->model,$this->where);

            $this->display();
        }
    }
    public function del(){
        $id=I('id',0,'intval');
        $info=$this->info_com($this->model,array('pid'=>$id));
        if(empty($info)){
            if($this->del_com($this->model,array('id'=>$id))){
                $this->success('ɾ���ɹ�');
            }else{
                $this->error('ɾ��ʧ��');
            }
        }else{
             $this->error('�÷�������������,����ɾ������');
        }
        
    }
}