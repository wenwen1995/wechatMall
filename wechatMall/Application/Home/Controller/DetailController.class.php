<?php

namespace Home\Controller;
use Think\Controller;

class DetailController extends Controller{
   //商品详情页
   public function detail(){
   	$id= intval(I("get.id")); //获取商品的id
   	// dump($id);
   	!$id && $this->_404();

   	$item_Mod = M('item');
   	// dump($item_Mod);
   	$item = $item_Mod->field('id,name,img,price,brief')->where(array('id' => $id))->find();
   	!$item && $this->_404();

   	// 商品相册
   	$img_list = M('item_img')->field('url')->where(array('item_id'=>$id))->select();
   	// dump($item);

   	$this->assign('item',$item);
   	$this->assign('img_list',$img_list);
   	$this->display();
   }
   
}