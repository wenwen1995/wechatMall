<?php

namespace Home\Controller;
use Think\Controller;
use Home\Common\Cart;

class ShopcartController extends Controller{
	//添加进购物车的方法
	public function add_cart(){
		// dump($_POST)
		// echo '122';
		$goodsId = intval(I('post.goodsId'));//商品id
		$quantity = intval(I('post.quantity'));//购买数量
		echo $goodsId;
		echo $quantity;
		// 查询到该商品的信息
		$item = M('item')->field('id,name,img,price')->find($goodsId);
		// dump($item);
		//购物车对象
		$cart = new  Cart();

		if(!$item){
			//如果商品不存在
			$data = array(
					'status'=>0,
					'msg'=>'不存在该商品',
					'count'=>$cart->getCnt(),
					'sumPrice'=>$cart->getPrice()
					);
			$this->ajaxReturn($data,'JSON');
		}else{
			//有商品且默认是库存足够的
			$result = $cart->addItem($item['id'],$item['name'],$item['price'],$quantity,$item['img']);
			if($result == 1){
				//购物车已经存在该商品，在购物车该商品的原有数量增加即可
				$data = array(
						'result'=>$result,
						'status'=>1,
						'count'=>$cart->getCnt(),
						'sumPrice'=>$cart->getPrice(),
						'msg' => '该商品已经存在购物车'
						);
				$this->ajaxReturn($data,'JSON');
			}else{
				//添加成功
				$data = array(
						'result'=>$result,
						'status'=>1,
						'count'=>$cart->getCnt(),
						'sumPrice'=>$cart->getPrice(),
						'msg' => '该商品已经成功添加进购物车'
						);
				echo '22';
				$this->ajaxReturn($data,'JSON');
			}
		}
		//将数组换成JSON格式的字符串返回给模板页面
		echo json_encode($data);
	}
	public function index(){
		$this->assign('item',$_SESSION['cart']);
		// dump($item);
		$cart = new Cart();
		// $_SESSION['cart'] = array();
		// dump($cart);

		$this->assign('sumPrice',$cart->getPrice());

		// dump($sumPrice);
		$this->display();
	}
	//购物车页面点击加号数量增加
	public function plus(){
		$goodsId = intval(I('post.goodsId'));//商品id
		echo $goodsId;
		// echo $quantity;
		// 查询到该商品的信息
		$item = M('item')->field('id,name,img,price')->find($goodsId);
		$cart = new Cart();
		$cart->incNum($goodsId);
		$data = array(
					'status'=>1,
					'item'=>$cart->getItem($goodsId),
					'sumPrice'=>$cart->getPrice(),
			);
		//将返回信息转换成json字符串
		echo json_encode($data);
	}
	//购物车页面点击减号数量减少
	public function minus(){
		$goodsId = intval(I('post.goodsId'));//商品id
		echo $goodsId;
		// echo $quantity;
		// 查询到该商品的信息
		$item = M('item')->field('id,name,price')->find($goodsId);
		$cart = new Cart();
		$cart->decNum($goodsId);
		$data = array(
					'status'=>1,
					'item'=>$cart->getItem($goodsId),
					'sumPrice'=>$cart->getPrice(),
			);
		//将返回信息转换成json字符串
		echo json_encode($data);
	}
	//购物车页面点击删除,删除该商品
	public function del(){
		$goodsId = intval(I('post.goodsId'));//商品id
		echo $goodsId;
		// echo $quantity;
		// 查询到该商品的信息
		$item = M('item')->field('id,name,price')->find($goodsId);
		$cart = new Cart();
		$cart->delItem($goodsId);
		$data = array(
					'status'=>1,
					'item'=>$cart->getItem($goodsId),
					'sumPrice'=>$cart->getPrice(),
			);
		//将返回信息转换成json字符串
		echo json_encode($data);
	}
}