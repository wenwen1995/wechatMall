<?php
//购物车的功能:增减删除商品数量、计算总价
/*
  param int $id 商品主键
        string $name 商品名称
        float $price 商品价格
        int $number 商品数量
 */
namespace Home\Common;

class Cart{
 // 增加购物车商品数量
   public function incNum($id){
      // echo intval(I("param.id"));
      if(isset($_SESSION['cart'][$id])){
         $_SESSION['cart'][$id]['num'] += 1;
      }
   }

   //添加进购物车
   public function addItem($id,$name,$price,$num,$img){
      // session.start();
      //如果商品已经存在则直接添加数量
      if(isset($_SESSION['cart'][$id])){
         //增加购物车的数量
         $this->incNum($id,$num);
         //返回1通知调用方法表示该商品已存在
         return 1;
      }

      //新建商品信息数组
      $item = array();
      $item['id'] = $id;
      $item['name'] = $name;
      $item['price'] = $price;
      $item['num'] = $num;
      // dump($item);

      //把新建的商品信息数组添加进购物车中，key->商品id,value->商品具体的信息数组
      $_SESSION['cart'][$id] = $item;
    }

    // 减少购物车商品数量
	public function decNum($id){
	  	if(isset($_SESSION['cart'][$id])){
	  		$_SESSION['cart'][$id]['num'] -= 1;
	  	}
	  	//如果减少后数量为0，则吧这个商品删掉
	  	if($_SESSION['cart'][$id]['num']<1){
	  		$this->delItem($id);
	  	}
	}

	// 删除购物车商品数量
	public function delItem($id){
	  	unset($_SESSION['cart'][$id]);
	}

	// 获取单个商品的具体信息，返回值为该商品具体信息的一个关联数组
	public function getItem($id){
	  	return $_SESSION['cart'][$id];
	}

	// 查询购物车商品种类
	public function getCnt(){
		//返回购物车商品种类数目，购物车每个商品id代表一种商品，只需要count出id数即可知道种类数目
	  	return count($_SESSION['cart']);
	}

	// 查询购物车商品的总数
	public function getNum(){
		if($this->getCnt() == 0){
			//表示购物车为空，商品数量为0
			return 0;
		}

		$sum = 0;
		//$data是个多维关联数组
		$data = $_SESSION['cart'];
		dump($data);
		//$data中的每个元素的值就是一个商品具体信息的关联数组
		foreach ($data as $item) {
			//累积每种商品的数量
			$sum += $item['num'];
		}
		return $sum;
	}

	// 购物车商品的总金额
	public function getPrice(){
		if($this->getCnt() == 0){
			//表示购物车为空，商品数量为0
			return 0;
		}

		$price = 0.00;
		//$item是个多维关联数组
		$cartPri = $_SESSION['cart'];
		//一个商品的单价*数量得到该商品的总价，
		//各商品总价相加得到购物车所有商品的总金额
		foreach ($cartPri as $item) {
			//累积每种商品的数量
			$price += $item['num'] * $item['price'];
		}
		return sprintf("%01.2f",$price);
	}

	//清空购物车
	public function clear(){
	  	$_SESSION['cart'] = array();
	}

	//构造函数
	public function __construct(){
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}
	}
}
?>