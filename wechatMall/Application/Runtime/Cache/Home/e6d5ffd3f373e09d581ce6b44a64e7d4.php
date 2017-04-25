<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>爱丽小屋之购物车页</title>
  	<link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/cart.css">
</head>
<body>
	<!-- <p><?php echo ($_SESSION['cart']); ?></p> -->
	<div class="wrap">
		<p class="title">购物车</p>
		<?php if(count($_SESSION['cart']) == 0) {?>
			<div class="null_shopping">
				<h4>您还没有宝贝，赶快去逛逛吧！</h4>
				<p>
					<a href="/wechatMall/index.php/Home/All/all.html">马上去逛逛</a>
				</p>
			</div>
		<?php }else{ ?>
			<p><?php echo ($item["name"]); ?></p>
			<!-- 订单确认 -->
			<div class="orderForm">
				<div class="line">
					<p class="orderTitle">订单确认</p>
				</div>
				<div class="orderDetail">
					<?php if(is_array($item)): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="orderItem clearfix" id="<?php echo ($vo["id"]); ?>">
							<p class="goodsTitle"><?php echo ($vo["name"]); ?></p>
							<p class="pri">¥<span class="unitPrice"><?php echo ($vo["price"]); ?></span></p>
							<div class="amount">
								<div class="minus">-</div>
								<div class="result"><?php echo ($vo["num"]); ?></div>
								<div class="plus">+</div>
							</div>
							<div class="delete"></div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<p class="all">总计：¥
						<span class="allPrice"><?php echo sprintf("%01.2f",$vo['num']*$vo['price']); ?></span>
						元
					</p>
					<div class="next">
						<a href="<?php echo U('Address/addaddress');?>">立即购买</a>
					</div>
				</div>
			</div>
		<?php } ?>
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
                    <a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx554d0f4040a39dc1&redirect_uri=http://wenwen1995.6655.la/wechatMall/index.php/Home/Person/index&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect">
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

    <script>
  		var minusUrl = "<?php echo U('Shopcart/minus');?>";
  		var plusUrl = "<?php echo U('Shopcart/plus');?>";
  		var delUrl = "<?php echo U('Shopcart/del');?>";
	</script>

  	<script src="/wechatMall/Public/assets/js/cart.js"></script>
</body>
</html>