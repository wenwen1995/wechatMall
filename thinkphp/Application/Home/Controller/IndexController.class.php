<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	$username = I('param.username');
    	$userpwd = I('param.userpwd');
    	echo $username;
    	echo $userpwd;

    	$filter = array(
    		 'adminname' => $username,
    		 'password' => $userpwd
    	);

    	$admin = M('admin');
    	$adminInfo = $admin->where($filter)->find();
    	if($adminInfo){
    		$data = array(
    			'status'=>1//登录成功
    			);
    		$_SESSION['admin_info'] = $adminInfo;
    		// $_SESSION['admin_info'] = array();
    		// $this->ajaxReturn($data);
            $this->redirect('Page/welcome');
    	}else{
    		$data = array(
    			'status'=>0,
    			'msg'=>'登录失败，请检查登录名和密码是否正确'
    		);
    	}
        $this->display();
    }
}