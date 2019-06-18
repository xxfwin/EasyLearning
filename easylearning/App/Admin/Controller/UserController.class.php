<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 笔记控制器
 */
class UserController extends CommonController {
	private $model;
    private $pageAll;
    private $order;
    private $where;
	public function _initialize(){
	 	parent::_initialize();
	 	$this->model=M('note');
	 
    }
    public function index(){
	  $this->list=$this->model->join('mdl_page on mdl_note.page_id = mdl_page.id')->join('mdl_course on mdl_page.course = mdl_course.id')->order('mdl_course.id asc')->field('mdl_note.id,mdl_page.name,mdl_course.fullname')->select();
	  //dump($this->list);
	  //转化一下方便模板输出
	  $data = array();
	  for($i=0;$i<count($this->list);$i++){
		 $m = $this->list[$i]['fullname'];
		 $d = $this->list[$i]['name'];
		 $e = $this->list[$i]['id'];
		 $data[$m][] =array('id'=>$e,'content'=>$d); 	 
	  }
	  //dump($data);
	  $this->list = $data;  
		$this->display();
    }
    //添加笔记
    public function add($course){
        if(IS_POST){
			$data=I('post.');
			//过滤掉<p></p>标签
			$text = str_replace(array('&lt;p&gt;','&lt;/p&gt;'), '', $data['editorValue']);
			$add['text'] = $text;
			$add['page_id'] = $data['pid'];
            $add['time'] = time();
			$add['userid'] = 2;
            if($this->add_com($this->model,$add)){
                $this->success('添加成功',U('User/index'));
            }else{
                 $this->error('添加失败');
            }
        }else{
			//选出某一个课程中可以添加的章节
			$course = str_replace('+',' ',$course);//把+换成空格
			$where['fullname']=$course;
			//不会写子查询=0= 小飞来改改=-=
			$this->exId  = M('course')->where($where)->join('mdl_page on mdl_course.id=mdl_page.course')->join('mdl_note on mdl_note.page_id=mdl_page.id')->field('mdl_page.id')->select();
			$exId=array();
			for($i=0;$i<count($this->exId);$i++){
				$exId[$i]=$this->exId[$i]['id'];
			}
			$whereId['mdl_page.id'] = array('not in',$exId);
			$this->list = M('course')->where($where)->join('mdl_page on mdl_course.id=mdl_page.course')->where($whereId)->select();
			
			//单独绑定了一个课程名字
			$this->course = $course;			
            $this->display();
        }
    }
	//修改笔记
    public function edit($id){
        if(IS_POST){
            $data=I('post.');
			//过滤掉<p></p>标签
			$text = str_replace(array('&lt;p&gt;','&lt;/p&gt;'), '', $data['editorValue']);
			$set['id'] = $id;
			$set['text'] = $text;
            if($this->model->save($set)){
                $this->success('修改成功',U('User/show',array('id'=>$id)));
            }else{
                 $this->error('修改失败');
            }	
        }else{
			//找到笔记所属章节，课程
			$id=I('id',0,'intval');
			$condition['mdl_note.page_id'] = $id;
			$data=$this->model->join('mdl_page on mdl_note.page_id = mdl_page.id')->join('mdl_course on mdl_page.course = mdl_course.id')->where($condition)->field('name,fullname,text')->find();
			$data['id'] = $id;
			$this->list = $data;
            $this->display();
        }
    }
	//删除笔记
    public function del(){
        $id=I('id',0,'intval');
        $condition['id']=$id;
		if($this->model->where($condition)->delete()){
			$this->success('删除成功',U('User/index'));
        }else{
            $this->error('删除失败');
		}
    }
	//查看笔记
	public function show(){
		//找到笔记所属章节，课程
		$id=I('id',0,'intval');
		$condition['mdl_note.id'] = $id;
		$data=$this->model->join('mdl_page on mdl_note.page_id = mdl_page.id')->join('mdl_course on mdl_page.course = mdl_course.id')->where($condition)->field('name,fullname,text')->find();
		$data['id']=$id;
		//dump($data);
		$this->list = $data;
		$this->display();
	}
}