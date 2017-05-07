<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>后台管理之广告信息添加界面</title>
    <link href="/thinkphp/uploadify/uploadify.css" rel="stylesheet" />
    <link href="/thinkphp/Public/assets/css/info.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <!-- 页面底部 -->
        ﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>后台管理界面</title>
    <link href="/thinkphp/Public/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="/thinkphp/Public/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="/thinkphp/Public/assets/css/custom.css" rel="stylesheet" />
</head>
<body>
    <!-- <?php if(count($_SESSION['admin_info']) == 0) {?>
     <script>
         window.reload();
     </script>
    <?php }else{ ?> -->
     <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="/thinkphp/Public/assets/image/logo.png" />
                </a>
            </div>
             <span class="logout-spn">
               <a href="<?php echo U('Page/destory');?>" style="color:#fff;">退出</a> </span>
        </div>
    </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="<?php echo U('Page/welcome');?>"><i class="fa fa-leaf "></i>首页</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Page/adPage');?>"><i class="fa fa-edit "></i>广告图信息上传</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Info/adInfo');?>"><i class="fa fa-coffee "></i>广告图信息管理</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Page/goodsPage');?>"><i class="fa fa-smile-o "></i>商品信息上传</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Info/goodsInfo');?>"><i class="fa fa-beer "></i>商品信息管理</a>
                    </li>
                </ul>
            </div>
        </nav>
<!-- <?php } ?> -->
    <script>
        var url ="<?php echo U('Page/destory');?>";
    </script>

    <!-- JQUERY SCRIPTS -->
    <script src="/thinkphp/Public/assets/js/lib/jquery-1.8.3.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="/thinkphp/Public/assets/js/lib/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="/thinkphp/Public/assets/js/lib/custom.js"></script>
</body>
</html>

        <div id="page-wrapper" >
            <div id="page-inner">
                <!-- 商品信息管理 -->
                <div class="goods">
                    <div class="row" >
                        <div class="col-md-12">
                         <h2>商品信息管理</h2>
                         <hr />
                        </div>
                    </div>
                    <div class="goodsManage col-md-12">
                        <form  method="post" id="goodsInfoForm">
                            <div class="goodsInfo clearfix">
                                <p>商品名称：</p>
                                <input type="text" name="goodsName" class="goodsName" id="goodsName" required>
                            </div>
                            <div class="goodsInfo clearfix">
                                <p>商品图片：</p> 
                                <input id="goods_file_upload" name="file_upload" type="file" multiple="true" value="" required />
                                <div class="view">
                                    <img class='img' id="goodsImg" src="http://www.thinkphp.cn/Public/new/img/header_logo.png"  />
                                </div>
                                <input name="hideImgSrc" id="hideImgSrc" value="" type="hidden">
                            </div>
                            <div class="goodsInfo clearfix">
                                <p>商品价格：</p>
                                <input type="text" name="price" class="price" id="price" required>
                            </div>
                            <div class="goodsInfo clearfix">
                                <p>有效状态：</p>
                                <select required id="select1" name="select1">
                                    <option value="1" selected>1</option>
                                </select>
                            </div>
                            <div class="goodsInfo clearfix">
                                <p>热销推荐：</p>
                                <select required id="select2" name="select2">
                                    <option value="2">选择状态</option>
                                    <option value="0">不推荐</option>
                                    <option value="1">推荐</option>
                                </select>
                            </div>
                            <div class="goodsInfo clearfix">
                                <p>商品类型：</p>
                                <select required id="select3" name="select3">
                                    <option>选择类型</option>
                                    <option value="0">衣服区</option>
                                    <option value="1">帽子区</option> 
                                    <option value="2">皮包区</option>
                                </select>
                            </div>
                            <div class="goodsInfo clearfix">
                                <p>商品描述：</p>
                                <input type="text" name="desc" class="desc" id="desc" required>
                            </div>
                            <div class="goodsInfo clearfix">
                                <p>库存数量：</p>
                                <input type="text" name="have" class="have" id="have" required>
                            </div>
                            <div class="goodsInfo clearfix">
                                <p>商品产地：</p>
                                <input type="text" name="city" class="city" id="city" required>
                            </div>
                             <input type="submit" class="goodsBtn" value="提交">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/thinkphp/Public/assets/js/lib/jquery.validate.min.js"></script>
    <script src="/thinkphp/uploadify/jquery.uploadify.min.js"></script>
    <script>
        var goodsUrl = "<?php echo U('Page/goodsPage');?>";
        var root = '/thinkphp/';
        var goodsUpUrl = "<?php echo U('Page/goodsUploadify');?>";
    </script>
    <script src="/thinkphp/Public/assets/js/base.js"></script>
    <script src="/thinkphp/Public/assets/js/goodsPage.js"></script>
</body>
</html>