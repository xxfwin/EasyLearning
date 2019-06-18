<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
		
		$mdlsession = $_COOKIE['MoodleSession'];
		$data = M('sessions')->where(array('sid'=>$mdlsession))->select();
		if ($data[0] != null){
			$userid = $data[0]['userid'];
			$username = M('user')->where(array('id'=>$userid))->select();
			if($username[0] != null){
				//var_dump($username[0]);
				session_start();
				session(array('name'=>'name','expire'=>360));
				session(array('name'=>'ip','expire'=>360));
				session(array('name'=>'id','expire'=>360));
				session('name',$username[0]['username']);
				session('ip',get_client_ip());
				session('id',$userid = $data[0]['userid']);
			}
			else{
				redirect('/moodle/login/');
			}
			redirect(U('Index/index'));
		}
		else{
			redirect('/moodle/login/');
       	 // $this->display();
		}
    }
     /**
     * 处理登录
     */
    public function reLogin(){
    	// $username=I('name');
    	// $password=md5(I('password'));
      // $verify=I('verify');
      // if(!$this->check_verify($verify)){
        // $this->error("验证码不正确");
      // }else{
        // $where=array(
            // 'username'=>$username,
            // 'password'=>$password,
        // );
        // $userInfo=M('admin_admin')->where($where)->find();
        
    
      // if(empty($userInfo)){
        // $this->error('用户名或密码不正确',U('Login/index'));
       // }else{
        // //判断用户是否被锁定
        // if($userInfo['lock']=='锁定'){$this->error('用户被锁定');}
            // $data=array(
                // 'logintime'=>time(),
                // 'loginip'=>get_client_ip(),
                // );
            // M('admin_admin')->where(array('id'=>$userInfo['id']))->save($data);

			// //session_set_cookie_params(3600*24*7);
			// session_start();
			
			
			// session(array('name'=>'id','expire'=>3600*24*7));
            // session(array('name'=>'name','expire'=>3600*24*7));
            // session(array('name'=>'ip','expire'=>3600*24*7));
	
	
            // session('id',$userInfo['id']);
            // session('name',$userInfo['username']);
            // session('ip',$data['loginip']);
			

      
            // redirect(U('Index/index'));
       // }
      // }   
	  
	  		
		$mdlsession = $_COOKIE['MoodleSession'];
		$data = M('sessions')->where(array('sid'=>$mdlsession))->select();
		if ($data[0] != null){
			$userid = $data[0]['userid'];
			$username = M('user')->where(array('id'=>$userid))->select();
			// var_dump($username[0]['username']);
			session_start();
			session(array('name'=>'name','expire'=>1800));
			session(array('name'=>'ip','expire'=>1800));
			session('name',$username[0]['username']);
			session('ip',get_client_ip());
			
			// redirect(U('Index/index'));
		}
		else{
			redirect('/moodle');
       	 // $this->display();
		}
    }
    
    public function checkName(){
      $name=I('name');
      $userInfo=M('admin_admin')->where(array('username'=>$name))->find();
      if(!empty($userInfo)){
        if($userInfo['lock'] !=0){
           exit('2');
        }else{
          exit('1');
        }
      }else{
        exit('0');
      }
    }
    
    public function check_verify($code, $id = ''){
      $verify = new \Think\Verify();
      return $verify->check($code, $id);
    }
    
    public function verify(){
     $config =    array(
        'fontSize'    =>    30,    // 验证码字体大小
        'length'      =>    4,     // 验证码位数
        'useNoise'    =>    false, // 关闭验证码杂点
      );
      $Verify =     new \Think\Verify($config);
      $Verify->entry();
    }
    /**
     * 退出
     */
    public function logout(){
        session_unset();
        session_destroy();
        $this->redirect('Login/index');
    }
}
