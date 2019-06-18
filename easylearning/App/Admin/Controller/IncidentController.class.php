<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 事故信息控制器
 */
class IncidentController extends CommonController {
    private $model;
    private $pageAll;
    private $order;
    private $where;
	
    public function _initialize(){
        parent::_initialize();
        // $this->model=D('AdminIncident');
		
    }
    public function index(){
        // $this->role =M('admin_admin')->where(array('username'=>$_SESSION['name']))->limit(1)->getfield('role_id');
        // $username =I('username');
        // $idcard=I('idcard');
		// $userid=I('userid');
		
		// //审核员只能看状态为4的
		// if($this->role==9){
			// $where['status']=4;
		// }
		
		//定损员只能看到自己的
		if($this->role==2){
			$where['auditor_id']=$_SESSION['id'];
		}
		//维修厂只能看到自己的
		if($this->role==8){
			$where['factoryid']=M('admin_factory')->where(array('accountid'=>$_SESSION['id']))->getField('id');
		}
        if($username){
            $where['userid']=M('admin_user')->where(array('username'=>$username))->getField('id');
        }
        if($idcard){
            $where['userid']=M('admin_user')->where(array('idcard'=>$idcard))->getField('id');
        }
		if($userid){
			$where['userid']=$userid;
		}
		
        // $count      = $this->model->incidentCount($where);// 查询满足要求的总记录数
        
		$Page       = new \Classs\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        // $this->list =$this->model->incidentList($Page->firstRow,$Page->listRows, $where);
		
		//dump($this->list);
		
		
        $this->assign('page',$show);// 赋值分页输出
        
		
		
        $this->display();
      

    }
    public function add(){
		$this->role =M('admin_admin')->where(array('username'=>$_SESSION['name']))->limit(1)->getfield('role_id');
			
		if(IS_POST){
            $data=I('post.');
				$data['candidatefactoryid'] = join(',',$data['candidatefactoryid']);
				$data['count'] = 1;
				$data['enddate'] = date('Y-m-d H:i:s',time());
				if(!$data['factoryid']){
					$data['factoryid'] = NULL;
				}
                if($this->isValid($data)){
					if(!$data['thirdparty_id'])
						unset($data['thirdparty_id']);
					$data['id'] = getRandom(128);
					$data['auditor_id'] = $_SESSION['id'];
					while(M('admin_incident')->where(array("id" => $data['id']))->find())
						$data['id'] = getRandom(128);
                    if($this->add_com($this->model,$data)){
                        $this->success('添加成功',U('Incident/index'));
                    }else{
                        $this->error('添加失败');
                    }
                }else {
                    //如果数据不合法，相应的操作在isValid方法中被作出
                }
        }else{
            // $this->list=$this->cate_list($this->modelCate,'',array('sort','id'=>'desc'));
			$this->faultyinfo=M('admin_incident_faulty')->select();
			$this->auditorlist=M('admin_admin')->where(array('role_id'=>'2'))->field('nickname,id')->select();
			$this->factorylist=M('admin_factory')->field('name,id')->select();
            $this->display();
            //$this->show("hello world");
        }

    }
    public function edit($id){
		$this->role =M('admin_admin')->where(array('username'=>$_SESSION['name']))->limit(1)->getfield('role_id');
		$this->auditorlist=M('admin_admin')->where(array('role_id'=>'2'))->field('nickname,id')->select();
		$this->factorylist=M('admin_factory')->field('name,id')->select();
        $where['id']=array('eq',$id);
		

        if(IS_POST){
			$this->info=$this->edit_com($this->model,$where);
            $data=I('post.');
			$data['candidatefactoryid'] = join(',',$data['candidatefactoryid']);
			$data['count'] = 1;
			$data['enddate'] = $this->info['enddate'];
			//unset($data['enddate']);
			if(!$data['factoryid']){
				$data['factoryid'] = NULL;
			}
		
            if($this->isValid($data)){
				if(!$data['thirdparty_id'])
						unset($data['thirdparty_id']);
				
                if($this->update_com($this->model,$where,$data)){
                    $this->success('修改成功',U('Incident/index'));
                }else{
                    $this->error('修改失败');
                }
            }else {
                //如果数据不合法，相应的操作在isValid方法中被作出
            }
        }else{
          // $this->list=$this->cate_list($this->modelCate,'',$this->order);

          $this->info=$this->edit_com($this->model,$where);
		  
		  $candidatefactoryid = explode(",",$this->info['candidatefactoryid']); 
			$list = $this->factorylist;
			
			foreach($list as $key=>$value){
				if(in_array($value['id'],$candidatefactoryid)){
					$list[$key]['check'] = '1';
				}else{
					$list[$key]['check'] = '0';
				}
			}
			$this->candidatefactorylist = $list;
			
			$this->faultyinfo=M('admin_incident_faulty')->select();
	      
          $this->display();
        }
    }

   public function del($userid=0){
       
       
       if($userid==0){
           $id=I('id',0,'intval');
           if($this->model->where("id=$id")->delete()){
               $this->success('删除成功');
           }else{
               $this->error('删除失败');
           }
       }else{
           if($this->model->where(array('userid'=>$userid))->find()){
               $this->model->where(array('userid'=>$userid))->delete();
           }
       }

    }
    //检查数据的合法性
    /*必须要保证投保人ID，事故类型，维修厂ID，车ID都是合法数据，
    且该车是否为该投保人所有
    且如果是否是三者车被标记为是，那么三者车ID也必须是合法数据*/
    public function isValid($data){
        //任一条件不满足则返回false,若查找成功不做任何事情
        if(M('admin_user')->where(array('id'=>$data['userid']))->find()){//查找是否存在该投保人
            if(M('admin_car')->where(array('id'=>$data['carid']))->find()){//查找车是否合法
                if(M('admin_car')->where(array('userid'=>$data['userid']))->find()){//查找该车是否为该用户所有
                    //
                }else {
                    $this->success('该车不属于该用户');
                    return false;
                }
            }else {
                $this->success("找不到该车");
                return false;
            }
        }else{
            $this->success('找不带该车');
            return false;
        }

        if(M('admin_incident_faulty')->where(array('id'=>$data['faultyid']))->find()){
            //查找事故类型是否合法
        }else {
            $this->success('该事故类型不存在');
            return false;
        }

        // if(M('admin_factory')->where(array('id'=>$data['factoryid']))->find()){
            // //查找维修场信息是否合法
        // }else {
            // $this->success('该维修厂不存在');
            // return false;
        // }

        if($data['is_thirdparty']==1){//如果是否是三者车被标记为是，那么三者车ID也必须是合法数据
            if(M('admin_thirdparty')->where(array('id'=>$data['thirdparty_id']))->find()){
                //查找三者车信息是否合法
            }else{
                $this->success('该三者车不存在');
                return false;
            }
        }

        return true;
    }
	
	
	public function outputcsv(){
		
		$role_id =M('admin_admin')->where(array('id'=>$_SESSION['id']))->getfield('role_id');
		
		$csvdata = [];
		
		if($role_id == 1){
			
			$list=M("Admin_incident")->select();
			
			//dump($list);
			
			foreach($list as $key => $value){
				$cardata = M('admin_car')->where(array('id'=>$list[$key]['carid']))->select();
				$csvdata[$key]['id'] = $list[$key]['userid'];
				$csvdata[$key]['name'] = M('admin_user')->where(array('id'=>$list[$key]['userid']))->getField('username');
				$csvdata[$key]['type'] = M('admin_incident_faulty')->where(array('id'=> $list[$key]['faultyid']))->getField('type');
				$csvdata[$key]['condition'] = M('admin_incident_faulty')->where(array('id'=> $list[$key]['faultyid']))->getField('condition');
				$csvdata[$key]['cost'] = (int)M('admin_incident_faulty')->where(array('id'=> $list[$key]['faultyid']))->getField('value') * (int)$list[$key]['count'];
				$csvdata[$key]['phone'] = $list[$key]['phone'];
				$csvdata[$key]['carposition'] = $list[$key]['carposition'];
				$csvdata[$key]['position'] = $list[$key]['position'];
				$csvdata[$key]['date'] = $list[$key]['date'];
				switch($list[$key]['status']){
					case 0:
						$csvdata[$key]['status'] = '已报案';
						break;
					case 1:
						$csvdata[$key]['status'] = '已处理';
						break;
					case 2:
						$csvdata[$key]['status'] = '已到达维修厂';
						break;
					case 3:
						$csvdata[$key]['status'] = '已完成维修';
						break;

				
				}
				$csvdata[$key]['author'] = M('admin_admin')->where(array('id'=>$list[$key]['auditor_id']))->getField('nickname');
				$csvdata[$key]['factory'] = M('admin_factory')->where(array('id'=>$list[$key]['factoryid']))->getField('name');
				$csvdata[$key]['platenumber'] = $cardata[0]['platenumber'];
				$csvdata[$key]['cartype'] = M('admin_car_brand')->where(array('id'=> $cardata[0]['brandid']))->getField('brand').$cardata[0]['type'];
				$csvdata[$key]['enddate'] = $list[$key]['enddate'];
				switch($list[$key]['is_thirdparty']){
					case 0:
						$csvdata[$key]['is_thirdparty'] = '否';
						break;
					case 1:
						$csvdata[$key]['is_thirdparty'] = '是';
						break;
				}
				$csvdata[$key]['thirdparty_id'] = M('admin_thirdparty')->where(array('id'=>$list[$key]['thirdparty_id']))->getField('platenumber');
				
				
			}
			
		}
		else if ($role_id == 2){
			
			$list=M("Admin_incident")->where(array('auditor_id' => $_SESSION['id']))->select();
			foreach($list as $key => $value){
				$cardata = M('admin_car')->where(array('id'=>$list[$key]['carid']))->select();
				$csvdata[$key]['id'] = $list[$key]['userid'];
				$csvdata[$key]['name'] = M('admin_user')->where(array('id'=>$list[$key]['userid']))->getField('username');
				$csvdata[$key]['type'] = M('admin_incident_faulty')->where(array('id'=> $list[$key]['faultyid']))->getField('type');
				$csvdata[$key]['condition'] = M('admin_incident_faulty')->where(array('id'=> $list[$key]['faultyid']))->getField('condition');
				$csvdata[$key]['cost'] = (int)M('admin_incident_faulty')->where(array('id'=> $list[$key]['faultyid']))->getField('value') * (int)$list[$key]['count'];
				$csvdata[$key]['phone'] = $list[$key]['phone'];
				$csvdata[$key]['carposition'] = $list[$key]['carposition'];
				$csvdata[$key]['position'] = $list[$key]['position'];
				$csvdata[$key]['date'] = $list[$key]['date'];
				switch($list[$key]['status']){
					case 0:
						$csvdata[$key]['status'] = '已报案';
						break;
					case 1:
						$csvdata[$key]['status'] = '已处理';
						break;
					case 2:
						$csvdata[$key]['status'] = '已到达维修厂';
						break;
					case 3:
						$csvdata[$key]['status'] = '已完成维修';
						break;

				
				}
				$csvdata[$key]['author'] = M('admin_admin')->where(array('id'=>$list[$key]['auditor_id']))->getField('nickname');
				$csvdata[$key]['factory'] = M('admin_factory')->where(array('id'=>$list[$key]['factoryid']))->getField('name');
				$csvdata[$key]['platenumber'] = $cardata[0]['platenumber'];
				$csvdata[$key]['cartype'] = M('admin_car_brand')->where(array('id'=> $cardata[0]['brandid']))->getField('brand').$cardata[0]['type'];
				$csvdata[$key]['enddate'] = $list[$key]['enddate'];
				switch($list[$key]['is_thirdparty']){
					case 0:
						$csvdata[$key]['is_thirdparty'] = '否';
						break;
					case 1:
						$csvdata[$key]['is_thirdparty'] = '是';
						break;
				}
				$csvdata[$key]['thirdparty_id'] = M('admin_thirdparty')->where(array('id'=>$list[$key]['thirdparty_id']))->getField('platenumber');
			}
			
		}
		
		else if($role_id == 8){
			
			$fac = M('Admin_factory')->where(array('accountid'=> $_SESSION['id'] ))->getField('id');
			
			$list=M("Admin_incident")->where(array('factoryid' => $fac))->select();
			
			foreach($list as $key => $value){
				$cardata = M('admin_car')->where(array('id'=>$list[$key]['carid']))->select();
				$csvdata[$key]['id'] = $list[$key]['userid'];
				$csvdata[$key]['name'] = M('admin_user')->where(array('id'=>$list[$key]['userid']))->getField('username');
				$csvdata[$key]['type'] = M('admin_incident_faulty')->where(array('id'=> $list[$key]['faultyid']))->getField('type');
				$csvdata[$key]['condition'] = M('admin_incident_faulty')->where(array('id'=> $list[$key]['faultyid']))->getField('condition');
				$csvdata[$key]['cost'] = (int)M('admin_incident_faulty')->where(array('id'=> $list[$key]['faultyid']))->getField('value') * (int)$list[$key]['count'];
				$csvdata[$key]['phone'] = $list[$key]['phone'];
				$csvdata[$key]['carposition'] = $list[$key]['carposition'];
				$csvdata[$key]['position'] = $list[$key]['position'];
				$csvdata[$key]['date'] = $list[$key]['date'];
				switch($list[$key]['status']){
					case 0:
						$csvdata[$key]['status'] = '已报案';
						break;
					case 1:
						$csvdata[$key]['status'] = '已处理';
						break;
					case 2:
						$csvdata[$key]['status'] = '已到达维修厂';
						break;
					case 3:
						$csvdata[$key]['status'] = '已完成维修';
						break;

				
				}
				$csvdata[$key]['author'] = M('admin_admin')->where(array('id'=>$list[$key]['auditor_id']))->getField('nickname');
				$csvdata[$key]['factory'] = M('admin_factory')->where(array('id'=>$list[$key]['factoryid']))->getField('name');
				$csvdata[$key]['platenumber'] = $cardata[0]['platenumber'];
				$csvdata[$key]['cartype'] = M('admin_car_brand')->where(array('id'=> $cardata[0]['brandid']))->getField('brand').$cardata[0]['type'];
				$csvdata[$key]['enddate'] = $list[$key]['enddate'];
				switch($list[$key]['is_thirdparty']){
					case 0:
						$csvdata[$key]['is_thirdparty'] = '否';
						break;
					case 1:
						$csvdata[$key]['is_thirdparty'] = '是';
						break;
				}
				$csvdata[$key]['thirdparty_id'] = M('admin_thirdparty')->where(array('id'=>$list[$key]['thirdparty_id']))->getField('platenumber');
			}
			
		}
		
		//dump($role_id);
		
		
		$csv=new \Classs\Csv();
		
        //$list=M("admin_incident")->select();
		
        $csv_title=array('用户ID','被保险人','类型','条件','总计','电话','故障部位','案件号','出险时间','状态','勘察员','修理厂','车牌号','车辆型号','是否三者车','三者车车牌');
		
        $csv->put_csv($csvdata,$csv_title);
		
		//$this->show(dump($role_id));
		
		
	}
	
	
	
	
	public function replywantpic($userid){
		
		
		$openid = M('follow')->where(array('bindid' => $userid))->getField('openid');
		
		$data = $this->model->get_text($openid);
		
		$access_token = $this->model->get_accessToken("wxa97e48cfa3e4a48f","d4624c36b6795d1d99dcf0547af5443d");
		$url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$access_token;
		
		$this->model->curlPost($data,$url);
		
		//$this->show($data);
		$this->redirect('/Admin/Incident');
		
	}
	
	public	function replyqr($userid,$data){
		if(!file_exists('/Public/qrcode/'.$data)){
			genQRcode($data);
			
		}
		
		$openid = M('follow')->where(array('bindid' => $userid))->getField('openid');
		$candidatefactorys = M('admin_incident')->where(array('id' => $data))->getField('candidatefactoryid');
		
		$webpath  = ['Url' => ('http://pingan.microbye.com/Public/qrcode/'.$data.'.png') , 'PicUrl' => ('http://pingan.microbye.com/Public/qrcode/'.$data.'.small.jpeg') , 'factorys' => $candidatefactorys];
		//dump($webpath);
		
		$data = $this->model->get_qrcode($openid,$webpath);
		
		$access_token = $this->model->get_accessToken("wxa97e48cfa3e4a48f","d4624c36b6795d1d99dcf0547af5443d");
		$url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".$access_token;
		
		$response = $this->model->curlPost($data,$url);
		//dump($response);
		//$this->show($data);
		$this->redirect('/Admin/Incident');
	
	} 
	
	
	public function pic(){

		$this->role =M('admin_admin')->where(array('username'=>$_SESSION['name']))->limit(1)->getfield('role_id');
		
		
		$this->picBase='http://weixin.microbye.com/';
		$incidentid = I('incidentid');
		$factoryid = I('factoryid');
		$userid = I('userid');
		
	
		// print_r("auditor_id:".$auditor_id);
		// print_r("factory_id:".$factoryid);
		
		
		if($incidentid){
			
			$userid = M('admin_incident')->where(array('id'=>$incidentid))->getField('auditor_id');
			$weixinid = M('admin_admin')->where(array('id'=>$userid))->getField('weixinid');
			
			$startdate = M('admin_incident')->where(array('id'=>$incidentid,'auditor_id' => $userid))->getField('enddate');
			//dump($startdate);
			$enddate = M('admin_incident')->where(array('enddate'=>array('GT',$startdate),'auditor_id' => $userid))->order('enddate desc')->limit(1)->getField('enddate');
			// dump($weixinid);
			//dump($enddate);
			$openid =M('follow')->where(array('id'=>$weixinid))->getField('openid');
			//dump($openid);
			
		}
		if($factoryid){
			$accountid = M('admin_factory')->where(array('factoryid'=>$factoryid))->getField('accountid');
			$weixinid = M('admin_admin')->where(array('id'=>accountid))->getField('weixinid');
			
			$startdate = M('admin_incident')->where(array('id'=>$incidentid,'factoryid' => $factoryid))->getField('enddate');
			//dump($startdate);
			$enddate = M('admin_incident')->where(array('enddate'=>array('GT',$startdate),'factoryid' => $factoryid))->order('enddate desc')->limit(1)->getField('enddate');
			// dump($weixinid);
			
			
			$openid = M('follow')->where(array('id'=>$weixinid))->getfield('openid');
		}
		// if($userid){
			
			// //$weixinid = M('admin_user')->where(array('id'=>$userid))->getField('weixinid');
			// // dump($weixinid);
			// $openid =M('follow')->where(array('bindid'=>$userid))->getField('openid');
			// // dump($openid);
		// }
		
		$this->openid=$openid;
		if(!empty($startdate)){
			$where['create_time'] = array('GT',strtotime($startdate));
		}
		if(!empty($enddate)){
			$where['create_time'] = array(array('GT',strtotime($startdate)),array('LT',strtotime($enddate)));
		}
		$where['openid'] = $openid;
		//dump($where);
		$this->list=M('picture')->where($where)->order('create_time desc')->field('create_time,path')->select();
		
		
		// dump($this->list);
		$this->display();
	
	}
	
	public function picupload(){
		
		$this->role =M('admin_admin')->where(array('username'=>$_SESSION['name']))->limit(1)->getfield('role_id');
		
		
		if(IS_POST){
		
		
			$path = "/var/www/weixin/Uploads/Picture/".date("Y-m-d")."/";	
			$relaventpath = "/Uploads/Picture/".date("Y-m-d")."/";
			if(!is_dir($path))
				mkdir($path);
			
			if (isset($_FILES)) {
				$incident = I('incident');
				//dump($_FILES);
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     3145728 ;// 设置附件上传大小
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath  =      $path; // 设置附件上传根目录
				$upload->savePath  =     '';
				$upload->autoSub   =     false;
				$upload->saveName  =     date("Ymd").getRandom(12);
				// 上传单个文件 
				$info   =   $upload->uploadOne($_FILES['pic']);
				if(!$info) {
					$this->error($upload->getError());
				}else{
					$auditorid = M('admin_incident')->where(array('id' => $incident))->getField('auditor_id');
					$weixinid = M('admin_admin')->where(array('id' => $auditorid))->limit(1)->getfield('weixinid');
					$openid = M('follow')->where(array('id' => $weixinid))->getfield('openid');	
					$data['create_time'] = strtotime(M('admin_incident')->where(array('id'=>$incident))->getField('enddate'))+1;
					$data['path'] = $relaventpath.$info['savename'];
					$data['status'] = 0;
					$data['openid'] = $openid;
					
					M('picture')->add($data);
					
					$this->success("上传成功");
				}
				
				

				// 
				// //得到上传的临时文件流
				// $tempFile = $_FILES['Filedata']['tmp_name'];
				
				// //允许的文件后缀
				// $fileTypes = array('jpg','jpeg','gif','png'); 
				
				// //得到文件原名
				// $fileName = date("Ymd").getRandom(12);
				// $fileParts = pathinfo($_FILES['Filedata']['name']);
				
				// //接受动态传值
				// $files=$_POST['typeCode'];
				
				// //最后保存服务器地址
				// if(!is_dir($path))
				   // mkdir($path);
				// if (move_uploaded_file($tempFile, $path.$fileName)){
					// 获取用户信息
					// $auditorid = M('admin_incident')->where(array('id' => $incident))->getField('auditor_id');
					// $weixinid = M('admin_admin')->where(array('id' => $auditorid))->limit(1)->getfield('weixinid');
					// $openid = M('follow')->where(array('id' => $weixinid))->getfield('openid');	
					// $data['create_time'] = strtotime(M('admin_incident')->where(array('id'=>$incident))->getField('date'))+1;
					// $data['path'] = $relaventpath.$fileName;
					// $data['status'] = 1;
					// $data['openid'] = $openid;
					
					// M('picture')->add($data);
					
					//echo $fileName."上传成功！";
					// $this->success("上传成功");
				// }else{
					// //echo $fileName."上传失败！";
					// $this->error("上传失败");
				// }
			}
			else{
				echo "error";
			}

			
			// header("Content-Type:text/html;charset=utf-8");
			// import('ORG.Net.UploadFile');
			// $upload = new UploadFile();
			// $upload->maxSize  = 3145728;
			// $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
			// $upload->autoSub=true;
			// $upload->subType='date';
			// $upload->dateFormat='Ym';	
			// $upload->savePath =  './Uploads/Picture/';
			
			// if(!$upload->upload()){
				// $error['error']=1;
				// $error['message']=$upload->getErrorMsg();
				// exit(json_encode($error));
			// }
			
			// $info=$upload->getUploadFileInfo();
			
			// $data=array(
				// 'url'=>str_replace('./','/',$upload->savePath).$info[0]['savename'],
				// 'error'=>0
			// );
	
			// exit(json_encode($data));
			
			// //dump(I('post.'));
			// //$pic=I('pic');
			// //$openid=I('openid');
			// //$createtime=I('createtime');
		}else{
			if ($this->role != 1){
				$where['auditor_id'] = M('admin_admin')->where(array('username'=>$_SESSION['name']))->limit(1)->getfield('id');
			}
			$incident = M('admin_incident')->where($where)->select();
			//dump($this->incident);
			foreach($incident as $key=>$list){
				$incident[$key]['username'] = M('admin_user')->where(array('id'=>$list['userid']))->getField('username');
				//echo M('admin_user')->where(array('id'=>$list['userid']))->getField('username');
			}
			//dump($incident);
			$this->incident = $incident;
			$this->display();
		}
		
	}
	

	
	public function changetodaishenhe(){
		
			$id=I('id');
			if($this->model->where(array('id'=>$id))->save(array('status'=>4))){
				$this->success("调整为待审核");
			}else{
				$this->error('调整失败');
			}
		
		
	}
	
	public function pass(){
		$id=I('id');
		if($this->model->where(array('id'=>$id))->save(array('status'=>3))){
			$this->success('通过');
		}else{
			$this->error('操作失败');
		}
		
	}
	
	public function notpass(){
		
		$id=I('id');
		if($this->model->where(array('id'=>$id))->save(array('status'=>5))){
			$this->success('未通过');
		}else{
			$this->error('操作失败');
		}
		
		
	}

}
