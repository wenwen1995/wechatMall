<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>爱丽小屋之编辑收货地址</title>
  	<link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/address.css">
</head>
<body>
	<div class="wrap">
		<p class="title">编辑收货地址</p>
		<!-- 收获信息 --> 
        <div class="addressInfo">
            <form method="post" action="<?php echo U('Address/updateAddress');?>">
                <input type="hidden" value="<?php echo ($id); ?>" name='id'>
                <div class="info info1">
                    <span class="name">姓名:</span>
                    <input type="text" class="nameInput" name="nameInput" value="<?php echo ($vo["name"]); ?>" />
                    <span class="vali"></span>
                </div>
                <div class="info info2">
                    <span class="name">手机:</span>
                    <input type="text" class="phoneInput" name="phoneInput" value="<?php echo ($vo["phone"]); ?>" />
                    <span class="vali"></span>
                </div>
                <div class="info info3">
                    <span class="name">地址:</span>
                    <input type="text" class="addrInput" name="addrInput" value="<?php echo ($vo["address"]); ?>" />
                    <span class="vali"></span>
                </div> 
                <!-- 修改地址 -->
                <input type="submit" value="修改" class="submit">
            </form>
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
	</div>
  	<script src="/wechatMall/Public/assets/js/address.js"></script>
</body>
</html>