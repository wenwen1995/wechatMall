<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>爱丽小屋之个人页</title>
  	<link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/person.css">
</head>
<body>
	<div class="wrap">
		<p class="title">我</p>
		<!-- 个人内容 -->
        <div class="aboutMe">
            <div class="meImg"></div>
            <p class="type">基础会员</p>
            <div class="allLine">
                <div class="line line1">我的昵称：
                    <span class="name">r.w.j</span>
                </div>
                <a href="<?php echo U('Address/address');?>">
                    <div class="line line2">我的地址
                        <span class="arrow">></span>
                    </div>
                </a>
                <div class="line line2">我的账户：
                    <span class="account">0元</span>
                </div>
                <div class="line line2">我的积分：
                    <span class="points">0分</span>
                </div>
            </div>
        </div>
	</div>
    <!-- 页面底部 -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>爱丽小屋之页面底部</title>
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/reset.css">
</head>
<body>
    <!-- 固定的菜单栏 -->
        <div class="menu">
            <ul class="menuList clearfix">
                <li>
                    <a href="<?php echo U('Index/index');?>">
                        <img src="/wechatMall/Public/assets/image/home.png">
                        <p>首页</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('All/all');?>">
                        <img src="/wechatMall/Public/assets/image/shopping.png">
                        <p>全部</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Shopcart/index');?>">
                        <div style="position: relative;" class="cart">
                            <img src="/wechatMall/Public/assets/image/cart.png">
                            <span class="number"></span>
                        </div>
                        <p>购物车</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Person/person');?>">
                        <img src="/wechatMall/Public/assets/image/person.png">
                        <p>个人</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="empty"></div>
        
        <!-- 引入的插件 -->
        <script src="/wechatMall/Public/assets/js/lib/jquery-1.8.3.min.js"></script>
        
        <script>
            var url = "<?php echo U('Shopcart/index');?>";
        </script>
        <script src="/wechatMall/Public/assets/js/ViewAdaptor.js"></script>
        <script src="/wechatMall/Public/assets/js/base.js"></script>
</body>
</html>

    <!-- <script src="/wechatMall/Public/assets/js/personAddress.js"></script> -->

</body>
</html>