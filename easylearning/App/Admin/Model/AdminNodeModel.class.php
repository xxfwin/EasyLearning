<?php
namespace Admin\Model;
use Think\Model;
/*****
 *		Node模型
 *		editor	wxy
 *		date		2015-5-6 13:34:57
 *****/
class AdminNodeModel extends Model {
	const TBL_NODE="admin_node";
	const TBL_ADMIN="user";
	const TBL_ACCESS="admin_access";
	const TBL_ROLE="admin_role";
	
	public function getRbac($id){
		$where['n.status']=array('eq','开启');
	    $where['a.id']=array('eq',$id);
		$menu=M(self::TBL_ADMIN)->alias('a')
		->join(' left join '.C('DB_PREFIX').self::TBL_ROLE.' r on r.id=a.role_id')
		->join(' left join '.C('DB_PREFIX').self::TBL_ACCESS.' ac on ac.role_id=r.id')
		->join(' left join '.C('DB_PREFIX').self::TBL_NODE.' n on n.id=ac.node_id')
		->field('n.name,n.title,n.id,n.pid,n.icon')
		->where($where)->order('n.sort')->select();
		// var_dump($menu);
		// echo M(self::TBL_ADMIN)->getLastSql();exit;
		return $menu;
	}

	//获取菜单			@wxy	2015-5-7 09:03:49
	public function getMenu($id){
		$where['n.status']=array('eq','开启');
	    $where['n.type']=array('eq','是');
	    $where['a.id']=array('eq',$id);
		$menu=M(self::TBL_ADMIN)->alias('a')
		->join(' left join '.C('DB_PREFIX').self::TBL_ROLE.' r on r.id=a.role_id')
		->join(' left join '.C('DB_PREFIX').self::TBL_ACCESS.' ac on ac.role_id=r.id')
		->join(' left join '.C('DB_PREFIX').self::TBL_NODE.' n on n.id=ac.node_id')
		->field('n.name,n.title,n.id,n.pid,n.icon')
		->where($where)->order('n.sort')->select();
		// var_dump($menu);
		// echo M(self::TBL_ADMIN)->getLastSql();exit;
		return $menu;
	}

	//获取&整理权限	@wxy	2015-5-7 14:14:10
	public function getAllNode($where=null){
		$status='del = 0';
		if(empty($where)){
			$where=$status;
		}else{
			$where=$status.' AND '.$where;
		}
		$AllNode=M(self::TBL_NODE)
			->field('id,name,title,status,sort,pid,level,type')
			->where($where)
			->order('sort')
			->select();
		for($i=0; $i<count($AllNode); $i++){
			if($AllNode[$i]['pid']==0&&$AllNode[$i]['level']==1){
				$new_node[]=$AllNode[$i];
				for($j=0; $j<count($AllNode); $j++){
					if($AllNode[$i]['id']==$AllNode[$j]['pid']&&$AllNode[$j]['level']==2){
						$new_node[]=$AllNode[$j];
					}
				}
			}
		}
		return $new_node;
	}
	
	//检查表单数据：ActionName		@wxy		2015-5-11 09:54:13
	public function checkActionName($pid,$name){
		$nameStr=$name;
		settype($nameStr,"int");
		if($nameStr===0){
			if($pid==0){
				return ucfirst($name);
			}else{
				return lcfirst($name);
			}
		}else{
			return false;
		}
	}

	//检查表单数据：ActionName	是否存在	@wxy		2015-5-11 09:54:13
	public function isSetActionName($pid,$name){
		$info=M(self::TBL_NODE)
			->field('name')
			->where('pid = '.$pid.' AND name = "'.$name.'"')
			->select();
		return $info;
	}

	//检查表单数据：自动排序	@wxy		2015-5-11 10:40:14
	public function getSort($pid){
		$info=M(self::TBL_NODE)
			->field('sort')
			->where('pid = '.$pid)
			->order('sort desc')
			->limit(1)
			->select();
		return $info;
	}

	//检查表单数据：排序是否存在	@wxy		2015-5-11 10:40:14
	public function isSetSort($pid,$sort){
		$info=M(self::TBL_NODE)
			->where('pid = '.$pid.' AND sort = '.$sort)
			->select();
		return $info;
	}

}
?>
