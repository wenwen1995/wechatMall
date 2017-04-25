<?php

namespace Home\Controller;
use Think\Controller;

class AddressController extends Controller{
	//显示地址
	public function address(){
		$user_address = M('contracts');
		//获取get参数
		$id = intval(I('get.id'));
		$type = I('get.type','edit','trim');
        $openid = $_SESSION['userinfo']['openid'];//获取到openid
		// echo $type;
		// echo $id;
		//如果有id参数,那么只可能是删除单条收货地址或者是查询单条收货地址
		if($id){
			if($type == 'del'){ //删除单条收货地址
				$user_address->where(array('id'=>$id))->delete();
				$msg = array(
						'status' =>1,
						'info' => L('delete success!'),
					);
				$this->assign('msg',$msg);
			}else{
				//查询单条收货地址信息
				$info = $user_address->find($id);
				// dump($info);
				// $this->assign('id',$id);
				$this->assign('info',$info);
			}
		}
		//如果没有id参数，也不是post请求，则是查询所有收货地址
		$address_list = $user_address->where(array('openid'=>$openid))->select();
		$this->assign('address_list',$address_list);
		$this->display();
	}
   //添加收货地址页面
   public function addaddress(){
   	  if(IS_POST){ //post请求，用户已经编辑好数据后提交的请求
   	  	$user_address = M('contracts');
        // $user = M('user');

   	  	$name = I('post.nameInput');//新增的姓名
   	  	$phone = I('post.phoneInput'); //新增的手机号码
		$address = I('post.addrInput'); //新增的收获地址

   	  	$data['name'] = $name;
   	  	$data['phone'] = $phone;
   	  	$data['address'] = $address;

        $openid = $_SESSION['userinfo']['openid'];//获取到openid
        $data['openid'] = $openid;

        // $arr['phone'] = array('eq',$phone);

        $arr = $user_address->where(array('openid' => $openid))->getField('phone',true); //如果是多个的话，得到的是个电话的数组
        if(is_array($arr)){
            $isin = in_array($phone,$arr); //判断新填写的电话是否在数据库表中已存在
        }else if($arr == $phone){ //单条记录的话判断跟数据库已有的这条记录是否一致
            $isin = true;
        }else{
            $isin = false;
        }

        if($isin){//如果存在，就直接更新对应的数据
            $user_address->where(array('phone' => $phone))->save($data);
            $this->redirect('Address/address');
        }else{
             //反之则插入这条新数据,如果地址新增成功，则重定向到收货地址列表页面，显示最新的地址列表
             $user_address->add($data);
             $this->redirect('Address/address');
        }
   	  }

   	  //如果是request请求，则显示模板让用户添加地址信息
      $this->display();
   }
   //更改收获地址保存至数据库
   public function updateAddress(){
   	if(IS_POST){ //post请求，用户已经编辑好数据后提交的请求
   	  	$user_address = M('contracts');

   	  	$id = intval(I('post.id'));
   	  	// echo $id;
   	  	$name = I('post.nameInput');//修改的姓名
   	  	$phone = I('post.phoneInput'); //修改的手机号码
		$address = I('post.addrInput'); //修改的收获地址
        $openid = $_SESSION['userinfo']['openid'];//获取到openid
         

		$data['id'] = $id;
   	  	$data['name'] = $name;
   	  	$data['phone'] = $phone;
   	  	$data['address'] = $address;
        $data['openid'] = $openid;

   	  if($user_address->save($data) !== false){
   	  		//如果信息修改成功，则重定向到收货地址列表页面，显示最新的地址列表
   	  		echo '数据更新成功！';
   	  		$this->redirect('Address/address');
   	  	}
   	  }

   	  //如果是request请求，则显示模板让用户添加地址信息
      $this->display();
   }
   //修改收货地址
   public function editAddress(){
   		$user_address = M('contracts');
   		$id = I('get.id','intval');
   	 	$vo = $user_address->find($id);
   	 	// dump($vo);
		$this->assign('vo',$vo);
		$this->assign('id',$id);
		$this->display();
		// 上海市曹安路1926号
   }
   //删除收货地址
   public function deleAddress(){
   	 	$this->display();
   }
}