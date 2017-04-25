<?php
//实现添加进购物车的功能
/*
  param int $id 商品主键
        string $name 商品名称
        float $price 商品价格
        int $num 商品数量
 */
 public function addItem($id,$name,$price,$num,$img){
 	//如果商品已经存在则直接添加数量
 	if(isset($_SESSION['cart'][$id]){
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
 	$item['img'] = $img;

 	//把新建的商品信息数组添加进购物车中，key->商品id,value->商品具体的信息数组
 	$_SESSION['cart'][$id] = $item;
 }
