<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 文章控制器
 */
class ThirdpartyController extends CommonController {
    private $model;
    private $pageAll;
    private $order;
    private $where;
    public function _initialize(){
        parent::_initialize();
        $this->model=M('note_model');
    }
    public function index(){
		$notemodel =M('note_model')->where(array('userid'=>$_SESSION['id']))->select();
		foreach($notemodel as $k => $n){
			$modeldata = $n["model"];
			$split = explode("-",$modeldata);
			$modelstr = "";
			foreach($split as $s){
				$ss = "";
				if($s == 0){
					$ss = "Notes";
				}
				if($s == 1){
					$ss = "Facts";
				}
				if($s == 2){
					$ss = "CommonMistakes";
				}
				if($s == 3){
					$ss = "OtherSays";
				}
				$modelstr = $modelstr . " ". $ss;
			}
			$notemodel[$k]["modelstr"] = $modelstr;
		}
		// var_dump($notemodel);
		$datas = json_encode($notemodel);
        // $id =I('id');
        // $platenumber =I('platenumber');
        // if($id){
            // $where['id']=$id;
        // }

        // if($platenumber){
            // $where['platenumber']=$platenumber;
        // }
		

        // $count      = $this->model->where($where)->count();// 查询满足要求的总记录数
        // $Page       = new \Classs\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性

        //$this->list =$this->model->where($where)->order(array('id'=>'desc'))->limit($firstpage.','.$firstrow)->select();

        // $this->info=$this->cate_list($this->modelCate,'',array('sort','id'=>'desc'));

        $this->assign('datas',$datas);// 赋值分页输出
        $this->display();

    }
    public function add(){

        if(IS_POST){

            $data=I('post.');
			$isfinal = false;
			$data["model"] = "";
			$data['userid'] = $_SESSION['id'];
			// var_dump($data);
			foreach($data as $k => $v){
				// echo $v." ";
				if($v == "cut"){
					$isfinal = true;
					
				}
				if($isfinal == false){
					// var_dump( $k);
					if($k === 0|| $k === 1|| $k === 2|| $k === 3){
						// var_dump($k);
						if($data["model"] == ""){
							$data["model"] = $v;
							
						}
						else{
							$data["model"] = $data["model"]."-".$v;
							
						}
					}
				}
			}
            // dump($_POST);
            // $data['Thirdpartyid']=$_SESSION['id'];
            // $data['time']=time();
            // $data['content']=$_POST['content'];
            if($this->add_com($this->model,$data)){
                $this->success('添加成功',U('Thirdparty/index'));
            }else{
                $this->error('添加失败');
            }
        }else{
            // $this->list=$this->cate_list($this->modelCate,'',array('sort','id'=>'desc'));

            $this->display();
        }

    }
    public function edit(){

        // $id=I('id',0,'intval');
        // $where['id']=array('eq',$id);
        $id=I('id');
        $where['id']=$id;

        if(IS_POST){
            $data=I('post.');
			
			$isfinal = false;
			$data["model"] = "";
			// var_dump($data);
			foreach($data as $k => $v){
				// echo $v." ";
				if($v == "cut"){
					$isfinal = true;
					
				}
				if($isfinal == false){
					// var_dump( $k);
					if($k === 0|| $k === 1|| $k === 2|| $k === 3){
						// var_dump($k);
						if($data["model"] == ""){
							$data["model"] = $v;
							
						}
						else{
							$data["model"] = $data["model"]."-".$v;
							
						}
					}
				}
			}
			//var_dump($data);
          if($this->update_com($this->model,$where,$data)){
            $this->success('修改成功',U('Thirdparty/index'));
          }else{
             $this->error('修改失败');
          }
        }else{

          $this->info=$this->edit_com($this->model,$where);
		  $modelarray = array();
		  $split = explode("-",$this->info['model']);
		  foreach($split as $s){
				if($s == 0){
					array_push($modelarray,"Notes");
				}
				else if($s == 1){
					array_push($modelarray,"Facts");
				}
				else if($s == 2){
					array_push($modelarray,"CommonMistakes");
				}
				else if($s == 3){
					array_push($modelarray,"OtherSays");
				}
				$modelstr = $modelstr . " ". $ss;
			}
			
			$nmodelarray = array_diff(array("Notes","Facts","CommonMistakes","OtherSays"),$modelarray);
			// var_dump($modelarray);
			// var_dump($nmodelarray);
			$this->modelarray = $modelarray;
			$this->nmodelarray = $nmodelarray;
          $this->display();
        }
    }

   public function del(){
        $id=I('id',0,'intval');

        if($this->model->where("id=$id")->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }

    }
	
	// public function outputcsv(){
		
		// $role_id =M('admin_admin')->where(array('id'=>$_SESSION['id']))->getfield('role_id');
		
		// $csvdata = [];
		
		// if($role_id == 1){
			
			// $list=M("Admin_thirdparty")->select();
			
			// //dump($list);
			
			// foreach($list as $key => $value){
				// $csvdata[$key]['username'] = $list[$key]['username'];
				// $csvdata[$key]['phone'] = $list[$key]['phone'];
				// $csvdata[$key]['platenumber'] = $list[$key]['platenumber'];
				
			// }
			
		// }
		
		
		// //dump($role_id);
		
		
		// $csv=new \Classs\Csv();
		
        // //$list=M("admin_incident")->select();
		
        // $csv_title=array('车主姓名','电话号码','车牌号码');
		
        // $csv->put_csv($csvdata,$csv_title);
		
		// //$this->show(dump($role_id));
		
		
	// }
}
