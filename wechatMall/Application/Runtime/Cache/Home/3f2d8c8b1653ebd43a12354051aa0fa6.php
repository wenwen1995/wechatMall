<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  	<title>爱丽小屋全部商品</title>
  	<link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/all.css">
</head>
<body>
	<div class="wrap">
		<!-- 搜索框 -->
		<div class="search clearfix">
			<form method="post">
				<input type="text" class="searchInput" name="key">
				<div class="searchIcon"></div>
			</form>
		</div>
		<!-- 全部商品展示 -->
		<p><?php echo ($searchGoods); ?></p>
		<div class="all">
			<!--顶部分类标题 -->
			<div class="typeList">
				<ul class="clearfix">
					<li class="highlight">衣服区</li>
					<li>帽子区</li>
					<li>皮包区</li>
				</ul>
			</div>
			<!-- 具体内容显示 -->
			<div class="showGoods clearfix">
				<!-- 衣服区  -->
				<div class="clothesArea">
					<?php if(is_array($clothes)): $i = 0; $__LIST__ = $clothes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$clothes): $mod = ($i % 2 );++$i;?><div class="project">
							<div class="showImg">
								<a href="<?php echo U('Detail/detail',array('id'=>$clothes['id']));?>">
									<img src="/thinkphp/uploads/items/<?php echo ($clothes["img"]); ?>">
								</a>
							</div>
							<div class="descri">
								<p class="title"><?php echo ($clothes["name"]); ?></p>
								<img src="/wechatMall/Public/assets/image/star.jpg" class="star">
								 <p class="price">￥<span class="money"><?php echo ($clothes["price"]); ?></span></p>
								 <p class="info">
								 	<span class="already"><?php echo ($clothes["alreadybuy"]); ?></span>人购买
								 	<span class="city"><?php echo ($clothes["city"]); ?></span>

								 </p>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<!-- 帽子区  -->
				<div class="capArea">
					<?php if(is_array($caps)): $i = 0; $__LIST__ = $caps;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$caps): $mod = ($i % 2 );++$i;?><div class="project">
							<div class="showImg">
								<a href="<?php echo U('Detail/detail',array('id'=>$caps['id']));?>">
									<img src="/thinkphp/uploads/items/<?php echo ($caps["img"]); ?>">
								</a>
							</div>
							<div class="descri">
								<p class="title"><?php echo ($caps["name"]); ?></p>
								<img src="/wechatMall/Public/assets/image/star.jpg" class="star">
								 <p class="price">￥<span class="money"><?php echo ($caps["price"]); ?></span></p>
								 <p class="info">
								 	<span class="already"><?php echo ($caps["alreadybuy"]); ?></span>人购买
								 	<span class="city"><?php echo ($caps["city"]); ?></span>

								 </p>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<!-- 皮包区 -->
				<div class="bagsArea">
					<?php if(is_array($bags)): $i = 0; $__LIST__ = $bags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bags): $mod = ($i % 2 );++$i;?><div class="project">
							<div class="showImg">
								<a href="<?php echo U('Detail/detail',array('id'=>$bags['id']));?>">
									<img src="/thinkphp/uploads/items/<?php echo ($bags["img"]); ?>">
								</a>
							</div>
							<div class="descri">
								<p class="title"><?php echo ($bags["name"]); ?></p>
								<img src="/wechatMall/Public/assets/image/star.jpg" class="star">
								 <p class="price">￥<span class="money"><?php echo ($bags["price"]); ?></span></p>
								 <p class="info">
								 	<span class="already"><?php echo ($bags["alreadybuy"]); ?></span>人购买
								 	<span class="city"><?php echo ($bags["city"]); ?></span>

								 </p>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
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
	</div>

	<script>
		var url = "<?php echo U('All/getKeywords');?>";
	</script>
  	<script src="/wechatMall/Public/assets/js/all.js"></script>
</body>
</html>