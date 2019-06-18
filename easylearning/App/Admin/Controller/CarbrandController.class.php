<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 文章控制器
 */
class CarbrandController extends CommonController {
    private $model;
    private $pageAll;
    private $order;
    private $where;
    public function _initialize(){
        parent::_initialize();
        $this->model=M('admin_car_brand');
    }
    public function index(){

        $brand=I('brand');
        $id=I('id');
        if ($id) {
            $where['id']=$id;
        }
        if ($brand) {
            $where['brand']=$brand;
        }

        $count      = $this->model->where($where)->count();// 查询满足要求的总记录数
        $Page       = new \Classs\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->list =$this->model->where($where)->order(array('id'=>'desc'))->limit($firstRow.','.$listRows)->select();
        $this->role =M('admin_admin')->where(array('username'=>$_SESSION['name']))->limit(1)->getfield('role_id');
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }
    public function add(){

        if(IS_POST){
            $data=I('post.');
            if($this->add_com($this->model,$data)){
                $this->success('添加成功',U('Carbrand/index'));
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->display();
        }

    }
    public function edit(){

        $id=I('id',0,'intval');
        $where['id']=array('eq',$id);

        if(IS_POST){
            $data=I('post.');

          if($this->update_com($this->model,$where,$data)){
            $this->success('修改成功',U('Incidentfaulty/index'));
          }else{
             $this->success('修改失败');
          }
        }else{
          $this->info=$this->edit_com($this->model,$where);

          $this->display();
        }
    }


    //删除车辆品牌会造成与之相关的维修厂品牌也被删除（在数据库中是级联的）
    //当存在该车辆品牌的车时，删除失败。仅当不存在该品牌的车，即该品牌暂无
    //意义时允许被删除
   public function del(){
        $id=I('id',0,'intval');

        if(M('admin_car')->where(array('brandid'=>$id))->find()){
            $this->success('删除失败，该品牌有意义');
        }else {
            if($this->model->where("id=$id")->delete()){
                $this->success('删除成功');
            }else{
                $this->error('删除失败');
            }
        }
    }
}
