<?php
namespace Home\Controller;
use Think\Controller;
class PageController extends Controller {
   public function destory(){
       $_SESSION['admin_info'] = array();
       session_destroy();
       redirect('/thinkphp', 3, '页面跳转中...');
    }
    //首页
	public function welcome(){
        if(!$_SESSION['admin_info']){
            $this->redirect('Index/index');//重定向到登录页面
            $this->display();
        }else{
           $this->display();
        }
	}
	//添加广告图信息
    public function adPage(){
        if(!$_SESSION['admin_info']){
            $this->redirect('Index/index');//重定向到登录页面
            $this->display();
        }else{
        	if(IS_POST){ //post请求
        		$weixin_ad = M('weixin_ad');

        		$adName = I('post.adName');;
        		$adImg = I('post.hideImgSrc');
        		$desc1 =  I('post.desc1');
        		$desc2 =  I('post.desc2');
        		$selectOption =  intval(I('post.myselect'));
        		$gourl = I('post.gourl');

        		// $data['id'] = 0;
        		$data['name'] = $adName;
        		$data['ad_img'] = $adImg ;
        		$data['status'] = $selectOption;
        		$data['desc1'] = $desc1;
        		$data['desc2'] = $desc2;
        		$data['url'] = $gourl;


        		if($weixin_ad->data($data)->add() !== false){
        			//表示数据添加成功，则定向到首页欢迎界面
        			// dump($data);
        			$this->redirect('Page/welcome');
        		}
        	}
        }
        $this->display();
    }
    //添加商品图像信息
    public function goodsPage(){
        if(!$_SESSION['admin_info']){
            $this->redirect('Index/index');//重定向到登录页面
            $this->display();
        }else{
            if(IS_POST){ //post请求
                $goods = M('item');
                $goodsName = I('post.goodsName');
                $goodsImg = I('post.hideImgSrc');
                $price =  I('post.price');
                $select1 =  intval(I('post.select1'));
                $select2 =  intval(I('post.select2'));
                $select3 =  intval(I('post.select3'));
                $desc =  I('post.desc');
                $have =  I('post.have');
                $city = I('post.city');

                // $data['id'] = 0;
                $data['name'] = $goodsName;
                $data['img'] = $goodsImg ;
                $data['price'] = $price;
                $data['status'] = $select1;
                $data['hot'] = $select2;
                $data['type'] = $select3;
                $data['brief'] = $desc;
                $data['alreadybuy'] = $have;
                $data['city'] = $city;

                if($goods->data($data)->add()!== false){
                    //表示数据添加成功，则定向到首页欢迎界面
                   $this->redirect('Page/welcome'); 
                }
            }
        }
        $this->display();
    }
    //广告图像上传
    public function adUploadify()
    {
    	
        if (!empty($_FILES)) {
            //图片上传设置
            $fileName = date("Ymd")."_".mt_rand();
            $config = array(
                'maxSize'    =>    10145728,
                'savePath'   =>    '',  
                'saveName'   =>    $fileName,
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    false,
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
                $info=$images['Filedata']['savepath'].$images['Filedata']['savename'];
                //返回文件地址和名给JS作回调用
                echo $info;
            }
            else{
                $this->error($upload->getError());//获取失败信息
            }
        }
    }
    //商品图像上传
    public function goodsUploadify()
    {
        $item_img = M('item_img');
        if (!empty($_FILES)) {
            //图片上传设置
            $fileName = date("Ymd")."_".mt_rand();
            $config = array(
                'maxSize'    =>    10145728,
                'rootPath'   =>    './uploads/items/',
                'savePath'   =>    '',
                'saveName'   =>    $fileName,
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    false,
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();


            //判断是否有图
            if($images){
                $info=$images['Filedata']['savepath'].$images['Filedata']['savename'];

                $imgName = $images['Filedata']['savename'];
                $data['url'] = $imgName;

                $item_img->create($data);
                $result = $item_img->add();
                //返回文件地址和名给JS作回调用
                echo $info;
                // echo $result;
            }
            else{
                $this->error($upload->getError());//获取失败信息
            }
        }
    }
}