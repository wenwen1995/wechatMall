<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  	<title>爱丽小屋之商品详情页</title>
  	<link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/detail.css">
</head>
<body>
<!-- <p><?php echo ($item["name"]); echo ($item["brief"]); echo ($item["price"]); ?></p> -->
	<!-- <p><?php echo ($aa); ?></p> -->
	<div class="wrap">
		<!-- 商品详情 -->
		<p class="detailTitle">商品详情</p>
		<div class="detail" >
			<input  value="<?php echo ($item["id"]); ?>" type="hidden" id="goodsId"/>
			<?php if(is_array($img_list)): $i = 0; $__LIST__ = $img_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><img class="bigImg" src="/thinkphp/uploads/items/<?php echo ($img['url']); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
			<p class="goodsTitle"><?php echo ($item["name"]); ?></p>
            <p class="brief"><?php echo ($item["brief"]); ?></p>
			<div class="price">¥<span class="unitPrice"><?php echo ($item["price"]); ?></span></div>
			<div class="addToCart">添加到购物车</div>
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
                    <a href="<?php echo U('Person/index');?>">
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
	<!-- 引入的插件 -->
  	<script src="/wechatMall/Public/assets/js/lib/jquery-1.8.3.min.js"></script>

	<script>
  		var url = "<?php echo U('Shopcart/add_cart');?>";
	</script>
  	<script src="/wechatMall/Public/assets/js/detail.js"></script>
</body>
</html>