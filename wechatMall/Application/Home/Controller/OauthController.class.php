<?php
// 实现获取到用户的openid
namespace Home\Controller;
use Think\Controller;
use Home\Common\Wxauth;
header('Content-type:text');

class OauthController extends Controller {
    public function index(){
    	//获取config.php文件下的token,appid,appsecret信息
    	$options = array();
	  	$options['token'] = C('WECHAT_TOKEN');
	  	$options['appid'] = C('WECHAT_APPID');
	  	$options['appsecret'] = C('WECHAT_APPSECRET');

	  	//获取到用户的openid，和用户的具体信息
		$auth = new Wxauth($options);
		$open_id = $auth->open_id; //获得openid
		$userinfo = $auth->wxuser; //获得用户信息，是一个数组
		//对于用户昵称和省份中文乱码进行处理
		$username = preg_replace('/\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]/', '', $userinfo['nickname']);
		$location = preg_replace('/\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]/', '', $userinfo['location']);
	
		$userinfo['nickname'] = $username;
		$userinfo['location'] = $location;

		$openid = $open_id; //获取到用户的openid
		$nickname = $username; //微信昵称
		$sex = $userinfo['sex']; //微信性别
		$location = $userinfo['location']; //微信地点
		$avatar =  $userinfo['avatar']; //微信头像

		$user = M('user');
		$data['openid'] = $openid;
		$data['nickname'] = $nickname;
		$data['sex'] = $sex;
		$data['location'] = $location;
		$data['avatar'] = $avatar;

		//如果用户信息不存在,则插入数据库中
		if(!$user->where(array('openid'=>$openid))->find()){
			$user->data($data)->add();
		}else{ //如果存在的话，则取出将其置于session
			$me = $user->where(array('openid'=>$openid))->find();
			$data = array('status'=>1);
			$_SESSION['userinfo'] = $me;
		}

		$this->redirect('Index/index'); //重定向到主页
    }
}
