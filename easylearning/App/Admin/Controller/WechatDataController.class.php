<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 文章控制器
 */
class WechatDataController extends CommonController {
    private $model;
    private $pageAll;
    private $order;
    private $where;
    public function _initialize(){
        parent::_initialize();
        $this->model=D('Follow');
        // $this->modelCate=M('admin_cate');
    }
    public function index(){
        $nickname   =I('nickname');
        $idcard     =I('idcard');
        $phone      =I('phone');
        $wechat     =I('wechat');
        $password   =I('password');
        $credit     =I('credit');
        $id         =I('id');

        if($username){
            $where['nickname']=$nickname;
        }
        if($id){
            $where['id']=$id;
        }
        if($idcard) {
            $where['idcard']=$idcard;
        }
        // if($password){
        //     $where['password']=array('eq',$password);

        // }
        $count      = $this->model->userCount($where);// 查询满足要求的总记录数
        $Page       = new \Classs\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性

        $this->list =$this->model->userList($Page->firstRow,$Page->listRows, $where);

        // dump($this->list);
        // $this->info=$this->cate_list($this->modelCate,'',array('sort','id'=>'desc'));
        //$this->role = M('admin_admin')->where(array('username'=>$_SESSION['name']))->limit(1)->getfield('role_id');

        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }



}
