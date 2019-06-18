<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 文章控制器
 */
class CarController extends CommonController {
	private $model;
    private $pageAll;
    private $order;
    private $where;
	public function _initialize(){
	 	parent::_initialize();
	 	$this->model=D('AdminCar');
    }
    public function index(){

    	// 查询的字段 开启了输入所有字段都可以查询
        $platenumber=I('platenumber');
 		$brandid	=I('brandid');
 		$type 		=I('type');
 		$value		=I('value');
 		$userid		=I('userid');


 		if($platenumber) {
 			$where['platenumber']=array('eq',$platenumber);
 		}
        if($userid) {
            $where['userid']=$userid;
        }

 		// if($brandid) {
 		// 	$where['brandid']=$brandid;
 		// }
 		// if($type) {
 		// 	$where['type']=$type;
 		// }
 		// if($value) {
 		// 	$where['value']=$value;
 		// }
 		// if($userid) {
 		// 	$userid['userid']=$value;
 		// }

        $count      = $this->model->carCount($where);// 查询满足要求的总记录数
        // $count =$this->model->where($where)->count();
        $Page       = new \Classs\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // dump($Page);
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性

        $this->list =$this->model->carList($Page->firstRow,$Page->listRows,$where);
		$this->role =M('admin_admin')->where(array('username'=>$_SESSION['name']))->getfield('role_id');

        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }
    public function add(){

        if(IS_POST){
			$data=I('post.');

            if($this->isValid($data)){
                if($this->add_com($this->model,$data)){
                    $this->success('添加成功',U('Car/index'));
                }else{
                    $this->error('添加失败');
                }
            }else{
                //不合法的操作在isValid方法中被做作出
            }

        }else{
			//$this->carinfo=M('admin_car_brand')->field('id,brand')->select();
            $this->display();
        }

    }
    public function edit(){

        $id=I('id',0,'intval');
        $where['id']=array('eq',$id);
        if(IS_POST){
            $data=I('post.');
			// dump($data);
    		if($this->isValid($data)){
				if($this->update_com($this->model,$where,$data)){
				  $this->success('修改成功',U('Car/index'));
				}else{
				   $this->success('修改失败');
				}
			}else{
				//数据不合法相应的操作放在isValid函数中
			}

        }else{
          // $this->list=$this->cate_list($this->modelCate,'',$this->order);

          $this->info=$this->edit_com($this->model,$where);
		  //$this->carinfo=M('admin_car_brand')->field('id,brand')->select();
		  // dump($this->carinfo);

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


    //合法性检测 只有当userid和brandid同时存在的时候才会增加或者修改数据成功
	public function isValid($data){
		if(M('admin_user')->where(array('id'=>$data['userid']))->find()){
            // if (M('admin_car_brand')->where(array('id'=>$data['brandid']))->find()){
                 // //do nothing
            // }else{
                // $this->success('找不到该车品牌');
				// return false;
            // }
        }else{
             $this->success('找不到该用户ID');
			 return false;
        }

        return true;

	}





}
