<?php
// 实现获取到用户的openid
namespace Home\Controller;
use Think\Controller;
use Home\Common\Wxauth;
header('Content-type:text');

class PersonController extends Controller {
    public function index(){
		//点击商城菜单时已经将用户信息存入数据库和session中，这里模板变量直接从session中取得
		$nickname = $_SESSION['userinfo']['nickname']; //微信昵称
		$sex = $_SESSION['userinfo']['sex']; //微信性别
		$location = $_SESSION['userinfo']['location']; //微信地点
		$avatar = $_SESSION['userinfo']['avatar']; //微信头像

		//将得到的信息分别取出，赋值给模板变量
		$this->assign('nickname',$nickname);
		$this->assign('sex',$sex);
		$this->assign('location',$location);
		$this->assign('avatar',$avatar);

		$this->display();
    }
}
