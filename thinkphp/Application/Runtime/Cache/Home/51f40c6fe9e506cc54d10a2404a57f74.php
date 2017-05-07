<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>后台管理之广告信息添加界面</title>
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
                        <a href="<?php echo U('Info/adInfo');?>"><i class="fa fa-table "></i>广告图信息管理</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Page/goodsPage');?>"><i class="fa fa-edit "></i>商品信息上传</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Info/goodsInfo');?>"><i class="fa fa-table "></i>商品信息管理</a>
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

        <!-- 模态框（Modal） -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
           aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close"
                       data-dismiss="modal" aria-hidden="true">
                          &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                       广告图基本信息
                    </h4>
                 </div>
                 <div class="modal-body">
                      <input type="hidden" value="<?php echo ($OwnInfo["id"]); ?>" class="infoId">
                      <div class="form-group">
                        <label for="name">广告图描述语1</label>
                        <input type="text" class="form-control" value="<?php echo ($OwnInfo["desc1"]); ?>">
                      </div>
                      <div class="form-group">
                        <label for="name">广告图描述语2</label>
                        <input type="text" class="form-control" value="<?php echo ($OwnInfo["desc2"]); ?>">
                      </div>
                      <div class="form-group">
                        <label for="name">推荐状态</label>
                        <input type="text" class="form-control" value="<?php echo ($OwnInfo["status"]); ?>">
                      </div>
                 </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                       data-dismiss="modal">关闭
                    </button>
                    <button type="button" class="btn btn-primary">
                       修改
                    </button>
                 </div>
              </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    </div>
    <script>
        var showOwnUrl = "<?php echo U('Info/adShowOwnInfo');?>";
    </script>
    <script src="/thinkphp/Public/assets/js/base.js"></script>
    <script src="/thinkphp/Public/assets/js/adInfo.js"></script>
</body>
</html>