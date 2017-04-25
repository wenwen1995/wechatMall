<?php
namespace Home\Controller;
use Think\Controller;
// use demo\test\auth;

class IndexController extends Controller {
    public function index(){
      //首页广告
      //实例化数据库表wexin_ad的模型类对象
      $ad = M('weixin_ad');
      //进行基本的数据库操作(查询到广告图信息)
      $ads = $ad->field('url,ad_img,desc1,desc2')->where('status = 1')->select();
      $counts = $ad->where('status = 1')->count();
      // dump($counts);
      //查询推荐商品信息
      $hot = M('item')->where('hot=1 and status =1')->select();
      // dump($hot);
      // 把查询的结果赋值给模板变量
      $this->assign('ad',$ads);
      $this->assign('hot',$hot);
      $this->assign('counts',$counts);
      $this->display ();
 }
}
