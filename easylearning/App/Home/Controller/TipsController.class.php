<?php
namespace Home\Controller;
use Think\Controller;
class TipsController extends Controller {
	public function facts(){
		$data = I('post.');
		$tid = $data['tid'];
		$where['mdl_course_modules.id'] = $tid;
		$where['mdl_classtips.type'] = 1;
		$result = M('course_modules')->join('mdl_page on mdl_course_modules.instance=mdl_page.id')->join('mdl_classtips on mdl_classtips.pageid=mdl_page.id')->where($where)->field('mdl_classtips.tipcontent')->select();		
		$this->ajaxReturn($result);
	}
	public function commonMistakes(){
		$data = I('post.');
		$tid = $data['tid'];
		$where['mdl_course_modules.id'] = $tid;
		$where['mdl_classtips.type'] = 2;
		$result = M('course_modules')->join('mdl_page on mdl_course_modules.instance=mdl_page.id')->join('mdl_classtips on mdl_classtips.pageid=mdl_page.id')->where($where)->field('mdl_classtips.tipcontent')->select();		
		
		$this->ajaxReturn($result);
	}
	public function otherSays(){
		$data = I('get.');
		$tid = $data['tid'];
		$where['mdl_course_modules.id'] = $tid;
		$where['mdl_classtips.type'] = 3;
		$result = M('course_modules')->join('mdl_page on mdl_course_modules.instance=mdl_page.id')->join('mdl_classtips on mdl_classtips.pageid=mdl_page.id')->where($where)->field('mdl_classtips.tipcontent')->select();		
		
		$this->ajaxReturn($result);
	}
}