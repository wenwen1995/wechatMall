# wechatMall
## 基于thinkphp的微信商城 ##

先看一下最终的微信商城移动端效果图，

首页：
![](http://i1.piimg.com/567571/5d70168d38074f69.jpg)


全部商品：
![](http://i2.muimg.com/567571/db132a56ad0c3a97.jpg)

商品详情页：
![](http://i4.buimg.com/567571/31f2cc9c23d6c86d.jpg)

购物车页之有商品：
![](http://i4.buimg.com/567571/9a2e0c0df55d65da.png)

购物车页之无商品：
![](http://i4.buimg.com/567571/d5d4507c5a6bc8fd.png)

个人页（与微信的我的个人信息是一致的）：
![](http://i1.piimg.com/567571/56ad88ea88167342.png)

收获地址列表：
![](http://i2.muimg.com/567571/90cce376868a793b.jpg)

编辑收货地址：
![](http://i4.buimg.com/567571/30e8e8dcf41df623.png)



**这里还需要有个后台管理系统，对于微信商城的广告图和商品信息进行管理，PC端后台管理系统共有3个界面，分别是这样的：**

登录页：
![](http://i2.muimg.com/567571/08bde475800f36e0.png)

广告图管理：
![](http://i1.piimg.com/567571/b9b3381c79afa137.png)


商品信息管理：
![](http://i1.piimg.com/567571/e2dd66390a02442e.png)


###这里来看一下具体实现了哪些功能： ###

1. 爱丽小屋服装销售系统移动端功能框图

![](http://i2.muimg.com/567571/3f48c27e65a2bfa7.png)


   
2. 后台管理系统PC端功能框图

![](http://i2.muimg.com/567571/fd7c967d2e64a9a7.png)
   


再来看一下项目目录结构吧，移动端的微信商城总体目录：

![](http://i1.piimg.com/567571/04e6b9de589af6bd.png)

细节目录1：

![](http://i1.piimg.com/567571/423c5704803a2f8f.png)

细节目录2：

![](http://i2.muimg.com/567571/18237892c8c990a1.png)

PC端后台管理系统的总体目录：

![](http://i4.buimg.com/567571/006ffa914c6dc3e0.png)

细节目录：

![](http://i4.buimg.com/567571/994561d999521008.png)

数据库设计，共有6张表：

![](http://i2.muimg.com/567571/6d0e788615932301.png)

现在来分别介绍每个表的含义及其设计时对应的字段、名称：

![](http://i1.piimg.com/567571/7cedb2c608977faf.png)

![](http://i2.muimg.com/567571/7c7e2ab3045ff0c1.png)

![](http://i1.piimg.com/567571/05768ecfce09de47.png)

![](http://i2.muimg.com/567571/902baccbd2b87090.png)

![](http://i2.muimg.com/567571/4beedfdbd961fd89.png)

![](http://i2.muimg.com/567571/1fb5618c74418863.png)




**做这个项目虽然是毕设所驱，一开始在写的过程中觉得很难。。完全没有方向和感觉，后来图书馆借了书，看网上的视频教程、查阅资料，最终做出来还是挺高兴的。这里微信支付没有实现，原因是用的测试号的原因，要实现微信支付啥的，还需要公众号认证...**



###在做的过程中，还是遇到很多的问题，现在来一一总结吧###

 

- *1、如何在Thinkphp页面include公共的页面，防止页面重写次数过多？*

答：在本系统中，底部的菜单栏为公共页面部分，放在了如下的目录结构中，

  ![](http://i4.buimg.com/567571/4a94ffdf31459f24.png)

在其他html引入该页面时使用语法：
    
    <include file="./Public/common/footer.html" />


- *2、页面的公共部分，包括图片，css样式表，js文件应该放在哪里，如何在页面引入？*

答：在Public文件夹新建一个assets的文件下，将这些文件分文件形式存放。本项目连接数据库的配置文件写在wechatMall/Applicaiton/Common/Cof/config.php下，代码如下，引用时，在config.php下配置信息：

    <?php
	//配置数据库连接信息
	return array(
		//'配置项'=>'配置值'
		'DB_TYPE' => 'mysql',  //数据库类型
		'DB_HOST' => '127.0.0.1', //服务器名称
		'DB_NAME' => 'wemall', //数据库名称
		'DB_USER' => 'root',  //用户名
		'DB_PWD'  => '',  //密码
		'DB_PORT' => '3306', //连接端口
		'DB_CHARSET' => 'utf8', //数据库字符集
	    'TMPL_PARSE_STRING' =>array(
	    	'__css__' => __ROOT__.'/Public/assets/css',
	    	'__js__' => __ROOT__.'/Public/assets/js',
	    	'__img__' => __ROOT__.'/Public/assets/image',
			),
	    'WECHAT_TOKEN' => 'weixin', //测试号的token
	    'WECHAT_APPID' => 'wx554d0f4040a39dc1', //测试号的appid
	    'WECHAT_APPSECRET' => '1936aeb5ef6103372450d480661676dc' //测试号的appsecret
	);

在html调用时，即像这样引入即可：

    <link rel="stylesheet" type="text/css" href="__css__/reset.css">



- *3、就是现在想做成这样的效果：*
  ![](http://i1.piimg.com/567571/485acce99b999244.png)

*- 从数据库中得到的数据有6个，让数据分成3组，每2个显示，但是这样写了以后，数据渲染出来应该每一屏的2个是不同的图片，现在却是同一个，该如何处理？*
    
原来页面上的代码是这样的：
![](http://i2.muimg.com/567571/207cf2f53383be40.png)

答：volist里写一个。每屏显示两个用swiper的设置。即要改变2处位置。

js变动：
![](http://i2.muimg.com/567571/841c80690d6a03e4.png)

页面上只需一个volist：
![](http://i4.buimg.com/567571/fcc7465147bd295f.png)


- *4、使用bootstrap轮播广告图时，图片数据是从数据库获得的，如何让其第一屏显示高亮的圆点图？*

答：代码这样写：
![](http://i2.muimg.com/567571/dbb64a3b06392882.png)

- *5、在后台管理界面中，图片上传会执行一个方法，点击提交时执行另一个方法，将获取到表单对应的值插入另一个表，但是现在点击提交时图片名称如何获取并和其他的信息一起插入数据库表中？*

答：可以在页面上写一个隐藏的input框，在图片上传执行一个方法回调后，拿到对应的图片上传后的名称，将其赋值给隐藏的input框下的Value值。之后点击提交时，则可将隐藏的input值和其他表单值通过post方法一起提交给后台处理。

-*6、如何在一个控制器中调用自定义的类方法？如：想在ShopcartController中调用自定义的方法Cart，但是不行？*

![](http://i1.piimg.com/567571/81acfe4bbca44f15.png)

答：查阅资料发现：ThinkPHP 3.2的环境下，要想使用：自己定义的类，没有命名空间的话，用的时候要定义根命名空间。

定义根命名空间意思是：

![](http://i4.buimg.com/567571/0f9e3700beb38470.png)

所以最终这样做：
![](http://i1.piimg.com/567571/6eb9018ae1bf1e4b.png)

![](http://i4.buimg.com/567571/9cdd265eff0a6254.png)

- *7、用户浏览商品，遇到喜欢的，添加进购物车，当跳转到其他页面继续浏览时，其购物车中所记录的商品信息如何能够跨页面保存下来？*

答：用到$_SESSION，当用户点击添加时，在session中创建一个以cart作为key的多维数组，在这个多维数组下，再按照商品的id来保存用户所添加的每个商品的信息。这样在每次在购物车增加商品时，先根据商品id查询该商品是否已经存在，若存在只需要增加商品数量即可，若不存在则新增一个商品id,并使该商品指向保存商品具体信息的一个关联数组。

- *8、在ThinkPHP中， js文件中U方法不被解析问题？*

答：如下面代码所示：

    <script type="text/javascript">
      var ajaxurl = "{:U(Index/index')}"; // index.js 中使用
    </script>
    <script type="text/javascript" src="__js__/index.js"></script>

这个变量在tpl中解析完毕之后，传入js文件中，这样在js里使用地址就正确了。

- *9、如何在ThinkPHP中实现图片的上传，上传的图片即时的显示在页面？*

 答：结合插件jquery,uploadify和ThinkPHP3.2所拥有的上传方法，实现图片上传，通过控制器方法传给页面js的data,拿到上传后图片数据，动态$(‘img’).attr(‘src’,data)，即可在页面显示出来。

- 如何在微信测试号中生成底部菜单？
答:这里使用的是方倍工作室的自定义生成菜单的网址：[http://www.fangbei.org/tool/menu](http://www.fangbei.org/tool/menu)

具体效果如下，填写测试号appid,appsecret,和要生成的菜单类型，地址啥的：

![](http://i1.piimg.com/567571/4212802f34ae9524.png)

此时查看微信测试号时，可以看到已经创建了菜单，并且因为设置的属性type为view,设置了url,即可以点击菜单按钮进行跳转：

![](http://i2.muimg.com/567571/0cd55bd86ad56692.png)


- *11、刚开始获取微信用户信息时，微信页面报错Scope无权限或者错误？*

答：原因是在一开始的微信测试号网页授权地址那里没有进行回调网址的修改，即这里：

![](http://i2.muimg.com/567571/536eb9c592921807.png)

![](http://i4.buimg.com/567571/90161cf354b15e75.png)


- *12、微信测试号如何获取用户的信息，并且拿到这些信息后，如何返回给页面上，页面可以渲染出这些数据呢？*

答：这里用到的框架是wechat-php-sdk。里面封装好了获取用户信息的类方法和自定义回复，验证token的php文件。是利用Oauth2.0网页授权拿到信息的。
OAuth允许用户提供一个令牌，而不是用户名和密码来访问他们存放在特定服务提供者的数据。每一个令牌授权一个特定的网站（例如，视频编辑网站)在特定的时段（例如，接下来的2小时内）内访问特定的资源（例如仅仅是某一相册中的视频）。这样，OAuth允许用户授权第三方网站访问他们存储在另外的服务提供者上的信息，而不需要分享他们的访问许可或他们数据的所有内容。

![](http://i2.muimg.com/567571/d981879f2b445aca.png)

为了更加方便的获取用户信息，查看结果如何，每次向微信测试号发送这样的信息：

    OAuth2.0网页授权演示 
	<a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx554d0f4040a39dc1&redirect_uri=http://wenwen1995.6655.la/wechatMall/Oauth/index&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect">点击这里体验</a>


此时微信界面上显示是这样的：

![](http://om4hi8hop.bkt.clouddn.com/17-4-25/30491457-file_1493099067437_13e23.png)

此时点击链接进去，如果获取到了用户信息，则会打印出所获得的信息：

![](http://om4hi8hop.bkt.clouddn.com/17-4-25/60535919-file_1493099105704_17b45.png)

反之，如果中间有错误的话，则要根据错误一遍遍的排查错误，找出错误原因，逐个解决。

下面就是如何将所获得信息通过一个控制器方法拿到，并赋值给模板变量，传递到页面中显示。
这里，运用到了**wechat-php-sdk**下的**Wxauth.class.php、wechat.class.php,TPWechat.class.php**文件，同时因为token,appid,appsecret获取信息一直都需要，

1. 所以首先把它们放在config.php中，通过C()方法进行获取。就像这样：

![](http://om4hi8hop.bkt.clouddn.com/17-4-25/25070492-file_1493099181836_798a.png)

2. 与此对应的文件放的位置在这里：

![](http://om4hi8hop.bkt.clouddn.com/17-4-25/25503346-file_1493099522058_a816.png)

**OauthController.class.php中代码如下，它的作用是实现点击底部菜单时，就静默获取到用户的信息，并把它存到一个session里**

    <?php
	// 实现获取到用户的openid
	namespace Home\Controller;
	use Think\Controller;
	use Home\Common\Wxauth;
	header('Content-type:text');

	class OauthController extends Controller {
    public function index(){
    	//获取config.php文件下的token,appid,appsecret信息
    	$options = array();
	  	$options['token'] = C('WECHAT_TOKEN');
	  	$options['appid'] = C('WECHAT_APPID');
	  	$options['appsecret'] = C('WECHAT_APPSECRET');

	  	//获取到用户的openid，和用户的具体信息
		$auth = new Wxauth($options);
		$open_id = $auth->open_id; //获得openid
		$userinfo = $auth->wxuser; //获得用户信息，是一个数组
		//对于用户昵称和省份中文乱码进行处理
		$username = preg_replace('/\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]/', '', $userinfo['nickname']);
		$location = preg_replace('/\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]/', '', $userinfo['location']);
	
		$userinfo['nickname'] = $username;
		$userinfo['location'] = $location;

		$openid = $open_id; //获取到用户的openid
		$nickname = $username; //微信昵称
		$sex = $userinfo['sex']; //微信性别
		$location = $userinfo['location']; //微信地点
		$avatar =  $userinfo['avatar']; //微信头像

		$user = M('user');
		$data['openid'] = $openid;
		$data['nickname'] = $nickname;
		$data['sex'] = $sex;
		$data['location'] = $location;
		$data['avatar'] = $avatar;

		//如果用户信息不存在,则插入数据库中
		if(!$user->where(array('openid'=>$openid))->find()){
			$user->data($data)->add();
		}else{ //如果存在的话，则取出将其置于session
			$me = $user->where(array('openid'=>$openid))->find();
			$data = array('status'=>1);
			$_SESSION['userinfo'] = $me;
		}

		$this->redirect('Index/index'); //重定向到主页
       }
	}


这里因为一开始点击就获取了用户信息，并且存到了session里，根据session的特性，所以在之后个人页面里，如果要将头型，性别，家乡之类的变量拿到，并通过模板输出，就直接从session中获取并赋值就好，如下：

**PersonController.class.php**
	<?php
	// 实现获取到用户的openid
	namespace Home\Controller;
	use Think\Controller;
	use Home\Common\Wxauth;
	header('Content-type:text');
	
	class PersonController extends Controller {
     public function index(){
		//点击商城菜单时已经将用户信息存入数据库和session中，这里模板变量直接从session中取得
		$nickname = $_SESSION['userinfo']['nickname']; //微信昵称
		$sex = $_SESSION['userinfo']['sex']; //微信性别
		$location = $_SESSION['userinfo']['location']; //微信地点
		$avatar = $_SESSION['userinfo']['avatar']; //微信头像

		//将得到的信息分别取出，赋值给模板变量
		$this->assign('nickname',$nickname);
		$this->assign('sex',$sex);
		$this->assign('location',$location);
		$this->assign('avatar',$avatar);

		$this->display();
      }
	}


`# 注意 #`：这里还改动了**wechat-php-sdk**下的**Wxauth.class.php、wechat.class.php,TPWechat.class.php**文件的部分内容

在Wxauth.class.php中，因为文件放的目录结构发生了变化，所以，在其头部加了2句代码，其次因为现在token,appid,appsecret定义在config.php里，所以参数是能被公共访问到的，将原来的private改为了public,如下图：

![](http://om4hi8hop.bkt.clouddn.com/17-4-25/82830688-file_1493100251894_183b8.png)

同理，因为这2个文件的目录结构发生了变化，
![](http://om4hi8hop.bkt.clouddn.com/17-4-25/87905984-file_1493100405436_175c8.png)

也在它们的头部加上这句

	namespace Home\Common;

- *13、添加地址时如果是重复的数据该如何处理？*

答：这个也弄了一上午终于解决了。试了ThinkPHP3.2关于插入记录时如果有重复的，进行覆盖的方法

    $this->add($data,array(),true);
  这个add方法里面第三个参数设为true后，**也不起作用！！**。
  
  果断寻找其他的方法。因为手机号是每个人唯一的，所以根据手机号来进行唯一性判断。即首先获取到当前用户对应的联系人收获地址的所有手机号，如果有多个的话是个数组。当然不论取得的数据是单个的还是个数据，都需要进行判断，即填写的手机号是否跟获取的数据中的某一个一致，如果一致，则进行update数据处理，反之则进行add插入数据处理。

- *14、原来处理的时候是点击个人时获取到openid,再得到用户的信息，当点击个人收获地址时获取唯一的openid，拿到对应的联系人收获地址，但这样的话，添加购物车后进行结算，下一步显示收货人地址，openid就拿不到了，如何处理？*

答：在页面一开始点击时获取openid，通过openid，将个人信息插入到user数据表中，同时将这份个人信息保存在session中，日后如果是同一个人登录的话，个人信息的获取直接从session中提取，而不用去数据库中查找比对，省时省力。这样，此时再点击购物车进行结算，获取收货人地址时也直接从session中寻找到openid，再查找对应的数据库记录就好。

- *15、后台管理模块中，ThinkPHP如何实现图片上传，保存在一个文件夹中，并将图片名称存放在数据库某张表中的某个字段？*

答：这里我是网上参考了好几个例子，最终完成的，好的例子可以参考这几个地址：

1、 [http://www.thinkphp.cn/topic/15565.html](http://www.thinkphp.cn/topic/15565.html)

2、 [http://www.thinkphp.cn/topic/4273.html](http://www.thinkphp.cn/topic/4273.html)

3、[http://www.thinkphp.cn/topic/27430.html](http://www.thinkphp.cn/topic/27430.html)

对应的目录结构是这样的：

![](http://om4hi8hop.bkt.clouddn.com/17-4-25/87604589-file_1493101624122_16df7.png)

PageController.class.php里有个为广告图上传**adUploadify方法**，

    //广告图像上传
    public function adUploadify()
    {
    	
        if (!empty($_FILES)) {
            //图片上传设置
            $fileName = date("Ymd")."_".mt_rand(); //文件保存名称是今天的日期_一个随机数
            $config = array(
                'maxSize'    =>    10145728, //文件上传最大的大小
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

**adPage方法**处理提交广告图信息表单到数据库表中：

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

View模块下的adPage.html（添加广告图信息）：

    <!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>后台管理之广告信息添加界面</title>
    <link href="__ROOT__/uploadify/uploadify.css" rel="stylesheet" />
    <link href="__css__/info.css" rel="stylesheet" />
	</head>
	<body>
	<p>{$_SESSION['admin_info']}</p>
    <div id="wrapper">
        <!-- 页面底部 -->
        <include file="./Public/common/page.html" />
        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <!-- 广告图管理 -->
                <div class="ad">
                    <div class="row" >
                        <div class="col-md-12">
                         <h2>广告图管理</h2>
                         <hr />
                        </div>
                    </div>
                    <!-- 广告图管理具体内容 -->
                    <div class="adManage col-md-12">
                        <form  method="post" id="adInfoForm" >
                            <div class="adInfo clearfix">
                                <p>广告图名称：</p>
                                <input type="text" name="adName" class="adName" id="adName" required>
                            </div>
                            <div class="adInfo clearfix">
                                <p>广告图图片：</p> 
                                <input id="file_upload" name="file_upload" type="file" multiple="true" value="" required />
                                <div class="view">
                                    <img class="img" id="img" src="http://www.thinkphp.cn/Public/new/img/header_logo.png"  />
                                </div>
                                <input name="hideImgSrc" id="hideImgSrc" value="" type="hidden">
                            </div>
                            <div class="adInfo clearfix">
                                <p>广告图描述1：</p>
                                <input type="text" name="desc1" class="desc1" id="desc1" required>
                            </div>
                            <div class="adInfo clearfix">
                                <p>广告图描述2：</p>
                                <input type="text" name="desc2" class="desc2" id="desc2" required>
                            </div>
                            <div class="adInfo clearfix">
                                <p>推荐状态：</p>
                                <select required id="myselect" name="myselect">
                                    <option value="2">选择状态</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="adInfo clearfix">
                                <p>图片跳转链接：</p>
                                <input type="text" name="gourl" class="gourl" id="gourl" required>
                            </div>
                            <input type="submit" class="submit" value="提交">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="__js__/lib/jquery.validate.min.js"></script>
    <script src="__ROOT__/uploadify/jquery.uploadify.min.js"></script>
    <script>
        var adurl = "{:U('Page/adPage')}";
        var root = '__ROOT__/';
        var adUpUrl = "{:U('Page/adUploadify')}";
    </script>
    <script src="__js__/base.js"></script>
    <script src="__js__/adPage.js"></script>
	</body>
	</html>

adPage.js代码：
    
	/*
    adPage.js
    by renwenji 
    2017/04/12
    功能：实现微信商城后台管理广告信息页面  */

	$(function(){
	var imgSrc,imgName,selectOptionVal;
	var oPage = {
    //init初始化程序
    init: function() {
      this.view();
      this.validateForm();
    }
    ,view:function(){
        //广告图片上传
       $('#file_upload').uploadify({
            'debug':true,
            'height': '40', //重写图片上传按钮的高度
            'width':'300',  //重写图片上传按钮的高度
            'swf': root + 'uploadify/uploadify.swf', //引入Uploadify核心flash文件
            'uploader' : adUpUrl, //PHP处理脚本地址
            'buttonText' : '选择图片上传',//选择文件提示文字
            'onUploadSuccess' : function(file, data, response) {
                console.log(data);//上传成功后，回调的data值
                $('#img').attr('src',root +'uploads/'+ data);
                imgSrc = $('#img').attr('src');
                // console.log(imgSrc);
                imgName = imgSrc.substring(imgSrc.lastIndexOf('/')+1); //获取到img的图片名称
                // console.log(imgName)
                $('#hideImgSrc').attr('value',imgName);
                // alert("图片上传成功！");
            },
        });
       $('#myselect').change(function(){
            selectOptionVal = $(this).children('option:selected').val();
            console.log(selectOptionVal);
       });
    }
    ,validateForm:function(){
        //广告图信息表单
        $('#adInfoForm').validate({
            onsubmit:true,
            submitHandler:function(form){ //通过之后回调
                var adName = $('#adName').val();
                console.log(adname);
                if(imgSrc != undefined){
                    var adImg = imgName;
                }
                $('#hideImgSrc').attr('value',imgName);
                // var  adImg = $('#file_upload').val();
                var desc1 = $('#desc1').val();
                var desc2 = $('#desc2').val();
                var selectOption = selectOptionVal;
                console.log(selectOption);
                var gourl = $('#gourl').val();
                $.post(
                        adurl,
                        {
                          adName:adName,
                          adImg:adImg, 
                          selectOption:selectOption,
                          desc1:desc1,
                          desc2:desc2,
                          gourl:gourl,
                        },
                        function(data){
                            if(data.status == 1){ //插入数据库成功

                            }
                        },'json'
                    );

            }
        });
       }
	};
   		oPage.init();
	});

这里当然，也改动了下按钮样式，在页面引入原有的uploadify.css之后，在新的index.css里这样写：

    .uploadify:hover .uploadify-button{
		background:#0A91FF;
		color:#fff;
	}


以上就是做的过程中所出现的问题和解决方法，总结的差不多啦~

##  ##


## 系统还存在哪些缺陷及更好的解决方法？ ##

 1、关于图片上传时，数据库保存名称虽然实现了，但是名称保存方式是以日期+一个随机数实现的，没有做到图片名+日期+一个随机数实现。

  方案：应该要专门写一个方法，针对上传图片的名称进行处理。

 2、现在数据库全部商品的内容不是很多，页面没有一下子渲染很多数据，所以获得结果后没有进行分页处理。

  方案：如果后续数据多起来要进行分页处理。

 3、系统未做微信支付的处理，即没有支付订单等，分享到朋友圈等的功能也没有实现。

  方案：之后可以尝试做起来微信支付和分享到朋友圈。

 4、 系统在全部商品进行模糊查询搜索时，还存在问题，每次会搜到所有的商品。

  方案：进一步排查原因，进行解决。

 5、第一次进入商城时，整个页面渲染的速率还是有点慢的，要等待好几秒的时间才可以完全加载出来。
  
  方案：之后可以将这些图片资源，css，js资源托管到csdn平台上，或者对于图片进行懒加载或压缩处理，对于js等文件，如果功能确认无误后，也可进行对应的压缩处理，提升用户体验。

 6、管理员登录时，没有对密码进行md5等加密处理，安全性较差。



