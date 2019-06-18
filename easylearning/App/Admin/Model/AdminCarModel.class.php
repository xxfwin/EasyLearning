<?php
namespace Admin\Model;
use Think\Model\RelationModel;
/*****
 *		文章模型
 *		editor	zhangxin
 *		date		2015-5-6 13:34:57
 *****/
class AdminCarModel extends RelationModel {
	const TBL_CAR="admin_car";
	const TBL_ADMIN="admin_admin";
	/*总数*/
	/*关联模型 car Belongs_to user*/
	// protected $_link = array(
	// 	'User' => array(
	// 		'mapping_type'		=> self::BELONGS_TO,
	// 		'class_name'		=> 'User',
	// 		'foreign_key'		=> 'userid',
	// 	)
	// );

	public function carCount($where){
		$count=M(self::TBL_CAR)->where($where)->count();
		return $count;
	}
	/*列表*/
	public function carList($firstRow,$listRows,$where){

		$list=M(self::TBL_CAR)
		->where($where)->order(array('id'=>'desc'))->limit($firstRow.','.$listRows)->select();
		foreach($list as $key => $v){
		
			$list[$key]['brand'] = M('admin_car_brand')->where(array('id'=>$v['brandid']))->getField('brand');
			$list[$key]['username'] = M('admin_user')->where(array('id'=>$v['userid']))->getField('username');
			
		}
		return $list;
	}
	/*查询用户名*/
	public function user($id){
		$username=M(self::TBL_ADMIN)->where(array('username'=>$username))->getField('username');
		return $username;
	}


}
?>
