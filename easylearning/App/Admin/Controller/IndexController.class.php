<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
	public function _initialize(){
       parent::_initialize();
    }
    public function index(){
    	// dumP($_SESSION);
		
    	// $this->redirect(U('Admin/Index'));
		$this->display();
    }
}