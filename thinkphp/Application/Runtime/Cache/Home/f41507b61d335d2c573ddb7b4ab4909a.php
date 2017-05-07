<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>后台管理之商品信息管理界面</title>
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

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <!-- 广告图信息管理 -->
                <div class="welcome">
                    <div class="row" >
                        <div class="col-md-12">
                         <h2>商品信息管理</h2>
                         <hr />
                        </div>
                    </div>
                </div>
                <div class="adManage col-md-12">
                    <table class="table2 table table-striped">
                      <thead>
                        <tr>
                          <th>商品名称</th>
                          <th>图片名称</th>
                          <th>商品价格</th>
                          <th>热销状态</th>
                          <th>商品类型</th>
                          <th>商品描述</th>
                          <th>已买人数</th>
                          <th>商品产地</th>
                          <th>上架状态</th>
                          <th>操作</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(is_array($item)): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                              <input type="hidden" value="<?php echo ($vo["id"]); ?>" class="infoId">
                              <td class="tdname"><?php echo ($vo["name"]); ?></td>
                              <td class="tdpicname"><?php echo ($vo["img"]); ?></td>
                              <td class="tdprice"><?php echo ($vo["price"]); ?></td>
                              <?php if(($vo["hot"] == 1)): ?><td class="tdhot">热销</td>
                                  <?php else: ?><td class="tdhot">热销</td><?php endif; ?>
                              <?php if(($vo["type"] == 0)): ?><td class="tdtype">衣服</td>
                                  <?php elseif($name == 1): ?><td class="tdtype">帽子</td>
                                  <?php else: ?><td class="tdtype">皮包</td><?php endif; ?>
                              <td><div class="brief"><?php echo ($vo["brief"]); ?></div></td>
                              <td><?php echo ($vo["alreadybuy"]); ?></td>
                              <td class="tdcity"><?php echo ($vo["city"]); ?></td>
                              <?php if(($vo["up"] == 1)): ?><td class="tdup">上架</td>
                                  <?php else: ?><td class="tdup">下架</td><?php endif; ?>
                              <td><img class="edit" src="/thinkphp/Public/assets/image/edit.png" data-toggle="modal" data-target="#myModal"></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                      </tbody>
                    </table>
                </div>
                <!-- 分页 -->
                <div class="page">
                    <div class="pages">
                        <?php echo ($page); ?>
                    </div>
                </div>
            </div>
        </div>
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
                       商品的基本信息
                    </h4>
                 </div>
                     <div class="modal-body">
                              <div class="form-group">
                                <label for="name">商品名称</label>
                                <input type="text" class="form-control itemname">
                              </div>
                              <div class="form-group">
                                <label for="name">商品价格</label>
                                <input type="text" class="form-control itemprice">
                              </div>
                              <div class="form-group">
                                <label for="name">热销状态</label>
                                <input type="text" class="form-control itemhot">
                              </div>
                              <div class="form-group">
                                <label for="name">商品类型</label>
                                <input type="text" class="form-control itemtype">
                              </div>
                              <div class="form-group">
                                <label for="name">商品描述</label>
                                <input type="text" class="form-control itembrief">
                              </div>
                              <div class="form-group">
                                <label for="name">商品产地</label>
                                <input type="text" class="form-control itemcity">
                              </div>
                              <div class="form-group">
                                <label for="name">上架状态</label>
                                <input type="text" class="form-control itemup">
                              </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                           data-dismiss="modal">关闭
                        </button>
                        <button type="button" class="btn btn-primary updateBtn">
                           修改
                        </button>
                     </div>
              </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
    </div>
    <script>
        var goodsShowOwnInfo = "<?php echo U('Info/goodsShowOwnInfo');?>";
        var editGoodsInfo =  "<?php echo U('Info/editGoodsInfo');?>";
    </script>
    <script src="/thinkphp/Public/assets/js/base.js"></script>
    <script src="/thinkphp/Public/assets/js/goodsInfo.js"></script>
</body>
</html>