<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>爱丽小屋之购物车页</title>
  	<link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/c/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/c/reset.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/c/cart.css">
</head>
<body>
	<div class="wrap">
		<p class="title">购物车</p>
		<?php if(count($_SESSION['cart']) == 0) {?>
			<div class="null_shopping">
				<h4>您还没有宝贝，赶快去逛逛吧！</h4>
				<p>
					<a href="/wechatMall/index.php/Home/Index/index.html">马上去逛逛</a>
				</p>
			</div>
		<?php }else{ ?>
		<?php if(is_array($item)): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><p><?php echo ($item); ?></p>
			<!-- 订单确认 -->
			<div class="orderForm">
				<div class="line">
					<p class="orderTitle">订单确认</p>
				</div>
				<div class="orderDetail">
					<div class="orderItem clearfix">
						<p class="goodsTitle"><?php echo ($item["name"]); ?></p>
						<p class="pri">¥<span class="unitPrice"><?php echo ($item["price"]); ?></span></p>
						<div class="amount">
							<div class="minus">-</div>
							<div class="result"><?php echo ($item["num"]); ?></div>
							<div class="plus">+</div>
						</div>
						<div class="delete"></div>
					</div>
					<p class="all">总计：¥
						<span class="allPrice"><?php echo ($sumPrice); ?></span>
						元
					</p>
					<div class="next">下一步</div>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php } ?>
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
                    <a href="<?php echo U('Shopcart/cart');?>">
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

  	<script src="/wechatMall/Public/assets/j/cart.js"></script>
</body>
</html>