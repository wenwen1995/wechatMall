<?php
namespace Home\Controller;
use Think\Controller;
import('ORG.Util.Page');// 导入分页类

class InfoController extends Controller {
	//把广告图信息列表显示在页面上
    public function adInfo(){
      $weixin_ad = M('weixin_ad');
      $adInfo = $weixin_ad->where(array())->select();
      // dump($adInfo);
      $this->assign('adInfo',$adInfo);
      $this->display();
    }
    //显示对应id的数据内容
     public function adShowOwnInfo(){
      $weixin_ad = M('weixin_ad');
      $id = I('post.infoId');
      $OwnInfo = $weixin_ad->find($id);
      if(!$OwnInfo){
			$data = array(
			    'status' => 0,
			    'content' => '检索信息失败！',
			    'data' => $result,
		   );
		}else{
			$data = array(
			    'status' => 1,
			    'content' => '返回数据成功！',
			    'data' => $OwnInfo,
			);
		}
		$this->ajaxReturn($data);
    }
     //修改数据内容
     public function editAdInfo(){
      $weixin_ad = M('weixin_ad');
      $id = I('post.id');
      $desc1 = I('post.desc1');
      $desc2 = I('post.desc2');
      $status = I('post.status');

      $data['id'] = $id;
   	  $data['desc1'] = $desc1;
   	  $data['desc2'] = $desc2;
   	  $data['status'] = $status;

   	  // echo($data);

      if($weixin_ad->save($data) == false){ //如果信息修改失败，
			$data = array(
			    'status' => 0,
			    'content' => '修改信息失败！',
			    'data' => $data,
		   );
		}else{
			$OwnInfo = $weixin_ad->find($id);
			$data = array(
			    'status' => 1,
			    'content' => '修改信息成功！',
			    'data' => $OwnInfo,
			);
		}
		$this->ajaxReturn($data);
    }
    //显示商品信息列表
    public function goodsInfo(){
      $itemInfo = M('item');
      $where = "id>10";
      $count = $itemInfo->where($where)->count();
      $p = getPage($count,10);
      $list = $itemInfo->field(true)->where()->order('id')->limit($p->firstRow,$p->listRows)->select();
      // $item = $itemInfo->where(array())->select();
      $this->assign('item',$list); //赋值数据集
      $this->assign('page',$p->show());//赋值分页输出
      $this->display();
    }
     //显示对应id的数据内容
     public function goodsShowOwnInfo(){
      $itemInfo = M('item');
      $id = I('post.infoId');
      $OwnInfo = $itemInfo->find($id);
      if(!$OwnInfo){
			$data = array(
			    'status' => 0,
			    'content' => '检索信息失败！',
			    'data' => $result,
		   );
		}else{
			$data = array(
			    'status' => 1,
			    'content' => '返回数据成功！',
			    'data' => $OwnInfo,
			);
		}
		$this->ajaxReturn($data);
    }
     //修改商品内容
     public function editGoodsInfo(){
      $itemInfo = M('item');
      $id = I('post.id');
      $itemname = I('post.itemname');
      $itemprice = I('post.itemprice');
      $itemhot = I('post.itemhot');
      $itemtype = I('post.itemtype');
      $itembrief = I('post.itembrief');
      $itemcity = I('post.itemcity');
      $itemup = I('post.itemup');

      $data['id'] = $id;
      $data['name'] = $itemname;
      $data['price'] = $itemprice;
      $data['hot'] = $itemhot;
      $data['type'] = $itemtype;
      $data['brief'] = $itembrief;
      $data['city'] = $itemcity;
      $data['up'] = $itemup;

      // echo($data);

      if($itemInfo->save($data) == false){ //如果信息修改失败，
            $data = array(
                'status' => 0,
                'content' => '修改信息失败！',
                'data' => $data,
           );
        }else{
            $OwnInfo = $itemInfo->find($id);
            $data = array(
                'status' => 1,
                'content' => '修改信息成功！',
                'data' => $OwnInfo,
            );
        }
        $this->ajaxReturn($data);
    }
}