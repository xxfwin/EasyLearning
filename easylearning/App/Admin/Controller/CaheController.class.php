<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 更新缓存
 */
class CaheController extends CommonController {
	private $model;
    private $pageAll;
    private $order;
    private $where;
	public function _initialize(){
	 	parent::_initialize();
	 	
    }
    /*更新缓存*/
    public function index(){
         sp_clear_cache();
        $this->success('缓存更新成功',U('Index/index'));
     
    }
   
 
}