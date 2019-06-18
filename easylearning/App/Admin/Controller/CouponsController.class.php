<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 电子券控制器
 */
class CouponsController extends CommonController {
	private $model;
    private $pageAll;
    private $order;
    private $where;
	public function _initialize(){
	 	parent::_initialize();
		// 	$this->model=M('admin_Coupons');
		$this->model=M('admin_coupons');
    }
    public function index(){
        $id     =I('id');
        $date   =I('date');
        $enddate=I('enddate');
        $userid =I('userid');
        $status =I('status');
        $value  =I('value');
        if($userid){
            $where['userid']=$userid;
        }

        $count      =$this->model->where($where)->count();// 查询满足要求的总记录数
        $Page       = new \Classs\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->list =$this->model->where($where)->order(array('id'=>'desc'))->limit($Page->firstRow.','.$Page->listRows)->select();
        // $this->list =$this->model->CouponsList($Page->firstRow,$Page->listRows, $where);
        // $this->info=$this->cate_list($this->modelCate,'',array('sort','id'=>'desc'));

        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }
    public function add(){

        if(IS_POST){
			if ($this->isValid(I('userid'))) {
				$data=I('post.');


				//把时间换成datetime类型存入数据库
				$datetimes=strtotime(I('date'));
				$enddatetimes=strtotime(I('enddate'));

				$date=date('Y-m-d H:i:s',$datetimes);
				$enddate=date('Y-m-d H:i:s',$enddatetimes);

				$data['date']   =$date;
				$data['enddate']=$enddate;


				if($this->add_com($this->model,$data)){
					$this->success('添加成功',U('Coupons/index'));
				}else{
					$this->error('添加失败');
				}
			}else{//外键处理
				//没找到ID为userid的用户
				$this->success("不存在".I('userid')."的用户");
			}
        }else{
            $this->display();
        }

    }
    public function edit(){
		$id=I('id',0,'intval');
        $where['id']=array('eq',$id);
        // dump($where);
        if(IS_POST){

            $data=I('post.');
	        if($this->model->where($where)->save($data)){
	            $this->success('修改成功',U('Coupons/index'));
	        }else{
	            $this->success('修改失败或并未作出修改');
	        }
        }else{

          $this->info=$this->edit_com($this->model,$where);

          $this->display();
        }
    }

   public function del($userid=0){

	   if($userid==0){
		   $id=I('id',0,'intval');
		   if($this->del_com($this->model,array('id'=>$id))){
			   $this->success('删除成功');
		   }else{
			   $this->error('删除失败');
		   }
	   }else{
		   if($this->model->where("userid=$userid")->find()){
			  $this->model->where("userid=$userid")->delete();
		  }
	   }



    }
//合法性检查，电子券绑定的用户必须要存在
	public function isValid($userid=-1){

		if(userid<0) return false;

		return M('admin_user')->find($userid);
	}

}
