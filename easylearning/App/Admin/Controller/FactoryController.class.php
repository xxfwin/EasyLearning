<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 维修厂控制器
 */
class FactoryController extends CommonController {
    private $model;
    private $pageAll;
    private $order;
    private $where;
    public function _initialize(){
        parent::_initialize();
        $this->model=M('admin_factory');
    }
    public function index(){
        $name       =I('name');
        $star       =I('star');
        // dump($name);
		
		
		//维修厂只能看自己的信息
		
		// dump(getRole($_SESSION['name']));
		if(getRole($_SESSION['name'])==8){		
			$where['id']=M('admin_factory')->where(array('accountid'=>$_SESSION['id']))->getField('id');
		}
		// dump($where);
        if($name){
            $where['name']=$name;
        }
        // dump($star);
        if($star){
            $where['star']=$star;
        }

        $count      = $this->model->where($where)->count();// 查询满足要求的总记录数
        // $count      = $this->model->FactoryCount($where);
        $Page       = new \Classs\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->list =$this->model->where($where)->order(array('id'=>'desc'))->limit($Page->firstRow.','.$Page->listRows)->select();
        // $this->list =$this->model->FactoryList($Page->firstRow,$Page->listRows, $where);
        //info是按星级查找的信息，直接写死。        
        $this->role =M('admin_admin')->where(array('username'=>$_SESSION['name']))->limit(1)->getfield('role_id');
        $this->info=array(
            array('star'=>1),
            array('star'=>2),
            array('star'=>3),
            array('star'=>4),
            array('star'=>5)
        );
        
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }
    public function add(){

        if(IS_POST){

            $data=I('post.');
            // dump($_POST);
            // $data['Factoryid']=$_SESSION['id'];
            // $data['time']=time();
            // $data['content']=$_POST['content'];
			if($this->isValid($data)){
				if($this->add_com($this->model,$data)){
					$this->success('添加成功',U('Factory/index'));
				}else{
					$this->error('添加失败');
				}
			}
        }else{
            // $this->list=$this->cate_list($this->modelCate,'',array('sort','id'=>'desc'));

            $this->display();
        }

    }



    public function edit(){

        $id=I('id',0,'intval');
        $where['id']=array('eq',$id);
        // $id=I('id');
        // $where['id']=$id;
	
        if(IS_POST){
            $data=I('post.');
            // dump($data);
			if($this->isValid($data)){
				if($this->update_com($this->model,$where,$data)){
					$this->success('修改成功',U('Factory/index'));
				}else{
					$this->success('修改失败或未修改');
				}
			}
        }else{
            $this->info=$this->edit_com($this->model,$where);

            $this->display();
        }
    }
    
  //删除维修厂时会删除与之相关的维修厂品牌
   public function del(){
        $id=I('id',0,'intval');

        if($this->model->where("id=$id")->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }

    }
	
	public function isValid($data){
		
		if(!M('admin_admin')->where(array('id'=>$data['accountid']))->find()){
			$this->success("找不到该账户");
			return false;
		}
		
		$role_id=M('admin_admin')->where(array('id'=>$data['accountid']))->getField('role_id');
		//判断对应的账户是否是维修厂
		if($role_id!=8){
			$this->success("该账户不是一个维修厂");
			return false;
		}
		
		$existAccountid=M('admin_factory')->getField('accountid');
		foreach($existAccountid as $account){
			if($data['accountid']==$account){
				$this->success('一个维修厂只能对应一个账号');
				return false;
			}
			
		}
		
		return true;
		
		
	}
	
}
