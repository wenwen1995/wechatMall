<?php
/*
  显示全部商品，获取商品关键字
 */
namespace Home\Controller;
use Think\Controller;
class AllController extends Controller {
	public function all(){
		//获得衣服类别下的查询结果
		$clothes = M('item')->where('type = 0')->select();
		//获得帽子类别下的查询结果
		$caps = M('item')->where('type = 1')->select();
		//获得皮包类别下的查询结果
		$bags = M('item')->where('type = 2')->select();
		// dump($searchGoods);
		$this->assign('clothes',$clothes);
		$this->assign('caps',$caps);
		$this->assign('bags',$bags);
		$this->display();
	}
	public function getKeywords(){
		// 输入框获取模糊查询结果集
		$item = M('item');
		$keywords = I('post.key'); //获取搜索的关键字 
		// dump($keywords);
		echo $keywords;
		// if(isset($keywords) && $keywords!= ''){
			$where['name'] = array('like','%'.$keywords.'%');
			$searchGoods = M('item')->where($where)->select();
			// dump($searchGoods);
			// $this->assign('searchGoods',$searchGoods);
			// $this->display();
		// }
		$this->ajaxReturn($searchGoods);
	}
}