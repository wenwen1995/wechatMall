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
		$keywords = I('post.val'); //获取搜索的关键字 
		$where['name'] = array('like','%'.$keywords.'%');
		$result = M('item')->where($where)->select();
		if(!$result){
			$data = array(
			    'status' => 0,
			    'content' => '抱歉，没有搜索到对应的商品！',
			    'data' => $result,
		   );
		}else{
			$data = array(
			    'status' => 1,
			    'content' => '返回数据成功！',
			    'data' => $result,
			);
		}
		$this->ajaxReturn($data);
	}
}