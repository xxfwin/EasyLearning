<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 文章控制器
 */
class ClasstipsController extends CommonController {
    private $model;
    private $pageAll;
    private $order;
    private $where;
    public function _initialize(){
        parent::_initialize();
        $this->model=M('classtips');
    }
    public function index(){
		if($_SESSION['id'] != 2) {
			$this->error("您没有权限访问该页面");
			
		}
		// 左join联查module course 和 page信息，只做一次查询
		$notemodel =M('classtips')->join("LEFT JOIN mdl_course_modules on mdl_classtips.pageid = mdl_course_modules.instance AND mdl_course_modules.module = 15")->join("LEFT JOIN mdl_course on mdl_course.id = mdl_course_modules.course")->join("LEFT JOIN mdl_page on mdl_page.id = mdl_classtips.pageid")->select();
		

		// var_dump($notemodel);
		$datas = json_encode($notemodel);

        $this->assign('datas',$datas);// 赋值输出
        $this->display();

    }
    public function add(){

        if(IS_POST){

            $data=I('post.');
			$data['tipcontent'] = $_POST['tipcontent'];
			$data['userid'] = $_SESSION['id'];
				
			if(!M("classtips")->where(array("type"=>$data["type"]))->where(array("pageid"=>$data["pageid"]))->find()){
				if($this->add_com($this->model,$data)){
					$this->success('添加成功',U('Classtips/index'));
				}else{
					$this->error('添加失败');
				}
			}
			else{
				$this->error("已经存在提示信息",U('Classtips/index'));
			}
        }else{
			$this->courseinfo = M('course')->select();
			
            $this->display();
        }

    }
    public function edit(){

        $id=I('id');
        $where['tipid']=$id;
		// var_dump($where);

        if(IS_POST){
            $data=I('post.');
			$data['tipcontent'] = $_POST['tipcontent'];
			// var_dump($data);
			// var_dump($data);
			$where['tipid']=$data['tipid'];
          if($this->update_com($this->model,$where,$data)){
            $this->success('修改成功',U('Classtips/index'));
          }else{
             $this->error('修改失败');
          }
        }else{

          $this->info=$this->edit_com($this->model,$where);

          $this->display();
        }
    }

   public function del(){
        $id=I('id',0,'intval');

        if($this->model->where("tipid=$id")->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }

    }
	
	public function getpage(){
		if(IS_POST){
			$data=I('post.');
			$allpageid = M("course_modules")->join("LEFT JOIN mdl_page on mdl_page.id = mdl_course_modules.instance")->where(array("mdl_course_modules.course"=>$data['courseid']))->where(array("module"=>15))->getField("instance,name,mdl_course_modules.course");
			// $existpages = M("classtips")->select();
			// // var_dump($allpageid);
			// // var_dump($existpages);
			// // $misspages = array_diff($allpageid,$existpages);
			// foreach($existpages as $k=>$v){
				// foreach($allpageid as $ak=>$av){
					// if($av['instance'] == $v['pageid']){
						// unset($allpageid[$ak]);
						// // var_dump($ak);
					// }
				// }
			// }
			// var_dump($allpageid);
			$this->ajaxReturn($allpageid);
		}
		else{
			$this->error("403 Forbidden");
		}
    }
	

}
