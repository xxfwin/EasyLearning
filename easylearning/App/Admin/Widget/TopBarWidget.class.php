<?php
// +----------------------------------------------------------------------
// | Descrption ： 顶部插件类
// +----------------------------------------------------------------------
// | Date 		： 2015年5月5日
// +----------------------------------------------------------------------
// | Licensed	： http://www.yaopengtao.com
// +----------------------------------------------------------------------
// | Author 	： yaopengtao <1754000861@qq.com>
// +----------------------------------------------------------------------
namespace Admin\Widget;
use Think\Controller;
class TopBarWidget extends Controller {

	/**
	 * desc   后台框架页面顶部菜单栏
	 * author yaopengtao <1754000861@qq.com>
	 * date   2015年5月5日
	 */
    public function topbar()
    {
		//查询当前用户未读消息
		// $notice=M('notice');
		// $info=$notice->where('status="default" AND to_id = '.$_SESSION['id'])->select();
		// $this->assign('notice_count',count($info));
		
		
     	$this->display('Public:header');
    }
    /**
	 * desc   后台框架页面左边单栏
	 * author yaopengtao <1754000861@qq.com>
	 * date   2015年5月5日
	 */
    public function leftbar()
    {
		/**
		*	rewrite	生成左侧菜单栏		@wxy	2015-5-7 10:28:31
		**/
		//实例化公共控制器
		 $common=new \Admin\Controller\CommonController;
		// //查询当前用户权限
		 $menu=$common->getWhere();

		
		$rbac=D('AdminNode');
		$open=$rbac->where(array('name'=>CONTROLLER_NAME))->getField('pid');
		
		$load = sys_getloadavg();
		$disk = intval(disk_free_space("/")/1024/1024/1024);
		
		$this->assign('load',$load[0]);
	    $this->assign('disk',$disk);
	
		// //所有菜单
		$node=D('AdminNode');
		$nodeInfo=$node->getMenu();
		
		$active=array('controller'=>CONTROLLER_NAME,'action'=>ACTION_NAME);
		$this->assign('open',$open);
	    $this->assign('menu',$menu);
     	$this->display('Public:menu');
    }

	
	

}