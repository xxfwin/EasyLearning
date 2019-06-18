<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 文章控制器
 */
class FactorybrandController extends CommonController {
    private $model;
    private $pageAll;
    private $order;
    private $where;
    public function _initialize(){
        parent::_initialize();
        $this->model=M('admin_factory_brand');
    }
    public function index(){
        $factoryname = I('factoryname');
        $car_brandname = I('car_brandname');
        if($factoryname){
            $where['factoryid']=M('admin_factory')->where("name=$factoryname")->field('id')->select();
        }
        if($car_brandname){
            $id=M('admin_car_brand')->where("brand=$car_brandname")->field('id')->select();
			dump($id);
			
		}

        $count      = $this->model->where($where)->count();// 查询满足要求的总记录数
        $Page       = new \Classs\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list =$this->model->where($where)->order(array('factoryid'=>'desc'))->limit($Page->firstRow.','.$Page->listRows)->select();
		foreach($list as $key => $v){
			$list[$key]['factoryname'] = M('admin_factory')->where(array('id'=>$v['factoryid']))->getField('name');
			$list[$key]['brandname'] = M('admin_car_brand')->where(array('id'=>$v['car_brandid']))->getField('brand');
		}
		$this->list=$list;
        $this->role =M('admin_admin')->where(array('username'=>$_SESSION['name']))->limit(1)->getfield('role_id');
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
        
    }
    public function add(){
       
        if(IS_POST){
            $data=I('post.');
            if($this->isValid($data)){
                if($this->add_com($this->model,$data)){
                    $this->success('添加成功',U('Factorybrand/index'));
                }else{
                    $this->error('添加失败');
                }
            }else{
                //不合法的操作直接放在isvalid
            }
        }else{
			$this->factorylist=M('admin_factory')->field('name,id')->select();
			$this->carbrandlist = M('admin_car_brand')->field('brand,id')->select();
            $this->display();
        }
        
    }
    // public function edit(){
        
        // $factoryid=I('factoryid',0,'intval');
        // $where['factoryid']=array('eq',$factoryid);

        // if(IS_POST){
            // $data=I('post.');
			
            // if($this->isValid($data)){
                // if($this->update_com($this->model,$where,$data)){
                    // $this->success('修改成功',U('Factorybrand/index'));
                // }else{
                    // $this->success('修改失败');
                // }
            // }else{
                // //不合法的操作直接放在isValid中做
            // }
        // }else{
          // $this->info=$this->edit_com($this->model,$where);
          // $this->factorylist=M('admin_factory')->field('name,id')->select();
          // $this->display();  
        // }
    // }
  
   public function del(){
        $factoryid=I('factoryid',0,'intval');
		$car_brandid=I('car_brandid');
        if($this->model->where(array('factoryid'=>$factoryid,'car_brandid'=>$car_brandid))->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
        
    }
    
    
    //关键是要判断有无该维修厂和有无该车辆品牌
    public function isValid($data){
    
        if(!M('admin_factory')->where(array('id'=>$data['factoryid']))->find()){
            $this->error('不存在该维修厂');
            return false;
        }
        
        if(!M('admin_car_brand')->where(array('id'=>$data['car_brandid']))->find()){
            $this->error('不存在该车辆品牌');
            return false;
        }
        return true;    
    }
    
}