<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>后台管理系统登录页面</title>
    <link href="/thinkphp/Public/assets/css/style_log.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/thinkphp/Public/assets/css/style.css">
</head>

<body class="login">
    <div class="login_m">
        <h1>爱丽小屋后台管理系统</h1>
        <div class="login_boder">
            <form method="post">
                <div class="login_padding" id="login_model">
                  <h2>用户名</h2>
                    <input type="text" name="username" id="username" class="txt_input txt_input2" placeholder="请输入账号">
                    <label></label>
                  <h2>密码</h2>
                    <input type="password" name="userpwd" id="userpwd" class="txt_input" placeholder="请输入密码">
                    <label></label>
                </div>
                <!-- 提交按钮 -->
                <input name="submit" value="登录" class="enter" type="submit">
            </form>
        </div>
    </div>
</body>
    <script>
        var url = "<?php echo U('Index/index');?>";
    </script>
    <script src="/thinkphp/Public/assets/js/lib/jquery-1.8.3.min.js"></script>
    <script src="/thinkphp/Public/assets/js/login.js"></script>
</html>