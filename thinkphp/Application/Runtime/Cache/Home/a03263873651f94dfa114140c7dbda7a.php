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
<p><?php echo ($_SESSION['admin_info']); ?></p>
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
    <?php if(count($_SESSION['admin_info']) == 0) {?>
     <script>
         window.reload();
     </script>
    <?php }else{ ?>
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
                        <a href="<?php echo U('Page/adPage');?>"><i class="fa fa-edit "></i>广告图管理 </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Page/goodsPage');?>"><i class="fa fa-table "></i>商品信息管理</a>
                    </li>
                </ul>
            </div>
        </nav>
<?php } ?>
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

        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
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
                                <input name="hideImgSrc" id="hideImgSrc" value="" type="hidden">
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
            </div>
        </div>
    </div>
    <script src="/thinkphp/Public/assets/js/lib/jquery.validate.min.js"></script>
    <script src="/thinkphp/uploadify/jquery.uploadify.min.js"></script>
    <script>
        var adurl = "<?php echo U('Page/adPage');?>";
        var root = '/thinkphp/';
        var adUpUrl = "<?php echo U('Page/adUploadify');?>";
    </script>
    <script src="/thinkphp/Public/assets/js/base.js"></script>
    <script src="/thinkphp/Public/assets/js/adPage.js"></script>
</body>
</html>