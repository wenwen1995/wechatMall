<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>后台管理界面</title>
    <link href="/thinkphp/Public/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="/thinkphp/Public/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="/thinkphp/Public/assets/css/custom.css" rel="stylesheet" />
    
    <link href="/thinkphp/uploadify/uploadify.css" rel="stylesheet" />
    <link href="/thinkphp/Public/assets/css/info.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
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
                 <span class="logout-spn" >
                  <a href="#" style="color:#fff;">退出</a>  
                </span>
            </div>
        </div>

        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a><i class="fa fa-leaf "></i>首页</a>
                    </li>
                    <li>
                        <a><i class="fa fa-edit "></i>广告图管理 </a>
                    </li>
                    <li>
                        <a><i class="fa fa-table "></i>商品信息管理</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <!-- 首页 -->
                <div class="welcome">
                    <div class="row" >
                        <div class="col-md-12">
                         <h2>欢迎来到爱丽小屋后台管理系统!</h2>
                         <hr />
                        </div>
                    </div>
                </div>
                <!-- 广告图管理 -->
                <div class="ad">
                    <div class="row" >
                        <div class="col-md-12">
                         <h2>广告图管理</h2>
                         <hr />
                        </div>
                    </div>
                    <!-- 广告图管理具体内容 -->
                    <div class="adManage col-md-12">
                        <form  method="post" id="adInfoForm" >
                            <div class="adInfo clearfix">
                                <p>广告图名称：</p>
                                <input type="text" name="adName" class="adName" id="adName" required>
                            </div>
                            <div class="adInfo clearfix">
                                <p>广告图图片：</p> 
                                <input id="file_upload" name="file_upload" type="file" multiple="true" value="" required />
                                <div class="view">
                                    <img class="img" id="img" src="http://www.thinkphp.cn/Public/new/img/header_logo.png"  />
                                </div>
                                
                            </div>
                            <div class="adInfo clearfix">
                                <p>广告图描述1：</p>
                                <input type="text" name="desc1" class="desc1" id="desc1" required>
                            </div>
                            <div class="adInfo clearfix">
                                <p>广告图描述2：</p>
                                <input type="text" name="desc2" class="desc2" id="desc2" required>
                            </div>
                            <div class="adInfo clearfix">
                                <p>推荐状态：</p>
                                <select required id="myselect" name="myselect">
                                    <option value="2">选择状态</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="adInfo clearfix">
                                <p>图片跳转链接：</p>
                                <input type="text" name="gourl" class="gourl" id="gourl" required>
                            </div>
                            <input type="submit" class="submit" value="提交">
                        </form>
                    </div>
                </div>
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
                             <input type="submit" class="btn" value="提交">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQUERY SCRIPTS -->
    <script src="/thinkphp/Public/assets/js/lib/jquery-1.8.3.min.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="/thinkphp/Public/assets/js/lib/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="/thinkphp/Public/assets/js/lib/custom.js"></script>
    <script src="/thinkphp/Public/assets/js/lib/jquery.validate.min.js"></script>
    <script src="/thinkphp/uploadify/jquery.uploadify.min.js"></script>
    <script>
        var adurl = "<?php echo U('Page/adPage');?>";
        var goodsUrl = "<?php echo U('Page/goodsPage');?>";
        var root = '/thinkphp/';
        var adUpUrl = "<?php echo U('Page/adUploadify');?>";
        var goodsUpUrl = "<?php echo U('Page/goodsUploadify');?>";
    </script>
    <script src="/thinkphp/Public/assets/js/manage.js"></script>
</body>
</html>