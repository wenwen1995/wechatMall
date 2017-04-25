<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>爱丽小屋之地址列表页面</title>
  	<link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/wechatMall/Public/assets/css/address.css">
</head>
<body>
	<div class="wrap">
		<p class="title">我的收货地址</p>
		<!-- 收获信息 --> 
        <div class="add">
            <a href="<?php echo U('Address/addaddress');?>">新增地址</a>
        </div>
        <?php if(is_array($address_list)): $i = 0; $__LIST__ = $address_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="addressInfo" id="<?php echo ($vo["id"]); ?>">
                <div class="info info1 clearfix">
                    <p>姓名:</p>
                    <span><?php echo ($vo["name"]); ?></span>
                </div>
                <div class="info info2 clearfix">
                    <p>手机:</p>
                    <span><?php echo ($vo["phone"]); ?></span>
                </div>
                <div class="info info3 clearfix">
                    <p>地址:</p>
                    <span><?php echo ($vo["address"]); ?></span>
                </div>
                <div class="foot clearfix">
                    <!-- 编辑地址 -->
                    <a href="<?php echo U('Address/editAddress',array('id'=>$vo['id']));?>" class="edit">
                        <div>编辑</div>
                    </a>
                    <!-- 删除地址 -->
                    <a href="<?php echo U('Address/address',array('id'=>$vo['id'],'type'=>'del'));?>" class="delete">
                        <div>删除</div>
                    </a>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
</body>
</html>