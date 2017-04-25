<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
  	<title>爱丽小屋首页</title>
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/index.css">
 </head>
 <body>
 	<div class="wrap">
        <!-- 头部 -->
        <div class="header clearfix">
           <div class="headerTitle">爱丽小屋</div>
           <div class="menuBtn"></div>
        </div>
        <!-- 轮播图 -->
        <div id="myCarousel" class="carousel-fade carousel slide">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators clearfix">
                <?php if(is_array($ad)): $i = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-target="#myCarousel" data-slide-to="<?php echo ($i-1); ?>" class="<?php if($i == 1 ): ?>active<?php endif; ?>"></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
            	<?php if(is_array($ad)): $i = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item <?php if($i == 1 ): ?>active<?php endif; ?>">
	                    <p class="line1"><?php echo ($vo["desc1"]); ?></p>
	                    <p class="line2"><?php echo ($vo["desc2"]); ?></p>
	                    <a href="<?php echo ($vo["url"]); ?>">
	                    	<img src="/thinkphp/uploads/<?php echo ($vo["ad_img"]); ?>">
	                    </a>
	                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!-- 轮播（Carousel）导航 -->
            <a class="carousel-control left" href="#myCarousel" 
                data-slide="prev">&lsaquo;
            </a>
            <a class="carousel-control right" href="#myCarousel" 
                data-slide="next">&rsaquo;
            </a>
        </div>
        <!-- 中部商品轮播 -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
            	<?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hotItem): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
		                    <a href="<?php echo U('Detail/detail',array('id'=>$hotItem['id']));?>" class="goodsItem">
		                        <div>
		                            <img src="/thinkphp/uploads/items/<?php echo ($hotItem["img"]); ?>">
		                            <p class="title"><?php echo ($hotItem["name"]); ?></p>
		                            <div class="star"></div>
		                            <p class="price">￥<span class="money"><?php echo ($hotItem["price"]); ?></span></p>
		                        </div>
		                    </a>
		                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!-- Add Pagination -->
            <div class="pagination"></div>
        </div>
        <!-- 介绍 -->
        <div class="intro">
            <p class="aboutUs">关于我们</p>
            <p class="summary">公司创于2014年，经营至今，线下门店已有3家，线上关注粉丝接近200万。爱丽小屋着重打造时尚青年的衣橱间，带给用户最好最美的体验。</p>
        </div>
        <!-- 底部 -->
        <div class="footer">
            <p>© 2016 ailixiaowu.com All Rights Reserved Freestyle版权所有 杭州ICP备12345678号</p>
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
    <script src="/wechatMall/Public/assets/js/lib/bootstrap.min.js"></script>
    <script src='/wechatMall/Public/assets/js/lib/swiper-3.4.1.jquery.min.js'></script>

  	<script src="/wechatMall/Public/assets/js/index.js"></script>
 </html>