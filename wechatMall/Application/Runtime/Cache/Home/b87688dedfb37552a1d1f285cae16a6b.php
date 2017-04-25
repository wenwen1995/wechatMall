<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>爱丽小屋之收货地址</title>
  	<link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/c/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/c/reset.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/c/address.css">
</head>
<body>
	<div class="wrap">
		<p class="title">收货地址</p>
		<!-- 收获信息 -->
        <div class="addressInfo">
            <form method="post" action="<?php echo U('AddAddress/addAddress');?>">
                <div class="info info1">
                    <span class="name">姓名:</span>
                    <input type="text" class="nameInput">
                    <span class="vali"></span>
                </div>
                <div class="info info2">
                    <span class="name">手机:</span>
                    <input type="text" class="phoneInput">
                    <span class="vali"></span>
                </div>
                <div class="info info3">
                    <span class="name">地址:</span>
                    <input type="text" class="addrInput">
                    <span class="vali"></span>
                </div>
            </form>
        </div>
        <!-- 提交订单 -->
        <div class="submit">提交</div>
	</div>
    <!-- 页面底部 -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>爱丽小屋之页面底部</title>
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/c/reset.css">
</head>
<body>
    <!-- 固定的菜单栏 -->
        <div class="menu">
            <ul class="menuList clearfix">
                <li>
                    <a href="<?php echo U('Index/index');?>">
                        <img src="/wechatMall/Public/assets/i/home.png">
                        <p>首页</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('All/all');?>">
                        <img src="/wechatMall/Public/assets/i/shopping.png">
                        <p>全部</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Shopcart/index');?>">
                        <div style="position: relative;" class="cart">
                            <img src="/wechatMall/Public/assets/i/cart.png">
                            <span class="number"></span>
                        </div>
                        <p>购物车</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Person/person');?>">
                        <img src="/wechatMall/Public/assets/i/person.png">
                        <p>个人</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="empty"></div>
        
        <!-- 引入的插件 -->
        <script src="/wechatMall/Public/assets/j/lib/jquery-1.8.3.min.js"></script>
        
        <script src="/wechatMall/Public/assets/j/ViewAdaptor.js"></script>
        <script src="/wechatMall/Public/assets/j/base.js"></script>
</body>
</html>

  	<script src="/wechatMall/Public/assets/j/address.js"></script>
</body>
</html>