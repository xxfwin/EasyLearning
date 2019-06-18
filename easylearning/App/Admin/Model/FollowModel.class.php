<?php
namespace Admin\Model;
use Think\Model;
/*****
 *		文章模型
 *		editor	zhangxin
 *		date		2015-5-6 13:34:57
 *****/
class FollowModel extends Model {
	const TBL_USER="follow";
	// const TBL_CATE="cate";
	const TBL_ADMIN="admin_admin";
	const TBL_INSURANCE="admin_user";
	/*总数*/

	public function userCount($where){
		$count=M(self::TBL_USER)->where($where)->count();
		return $count;
	}
	/*列表*/
	public function userList($firstRow,$listRows,$where){


		$list=M(self::TBL_USER)
		->where($where)->order(array('id'=>'desc'))->limit($firstRow.','.$listRows)->select();
		foreach ($list as $key => $v) {
			$list[$key]['insurance']=$this->insurance($v['bindid']);
			// $list[$key]['cate']=$this->cate($v['cate_id']);
		}
		return $list;
	}
	/*查询用户名*/
	public function user($id){
		$username=M(self::TBL_ADMIN)->where(array('id'=>$id))->getField('id');
		return $username;
	}
	
	public function insurance($id){
		$insurance=M(self::TBL_INSURANCE)->where(array('id'=>$id))->getField('insurance');
		return $insurance;
	}

}
?>
