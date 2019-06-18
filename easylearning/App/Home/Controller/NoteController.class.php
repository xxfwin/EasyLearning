<?php
namespace Home\Controller;
use Think\Controller;
class NoteController extends Controller {
	public function index(){
		$text = I('text');
		//去除多余字符
		$text = str_replace(array('&lt;p&gt;','&lt;/p&gt;','&lt','nbsp;','&gt','br','&','amp',';','/',' '), '', $text);
		$tid = I('tid');
		$where['id'] = $tid;
		$pageid = M('course_modules')->where($where)->getField('instance');
		$data['text'] = $text;
		$wherePage['page_id'] = $pageid;
		M('note')->where($wherePage)->save($data);
		//$this->ajaxReturn($text);
	}
}
