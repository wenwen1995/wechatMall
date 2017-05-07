/*
    login.js
    by renwenji 
    2017/04/12
    功能：实现微信商城后台管理系统登录页面
 */
$(function(){
     var ui = {
          $username: $('#username') //用户名
        , $userpwd: $('#userpwd') //密码
        , $enter: $('.enter') //登录按钮
    };

var oPage = {
    //init初始化程序
    init: function() {
      this.view();
    }
    ,view:function(){
        //点击登录按钮
        ui.$enter.on('click',function(){
            oPage.fajax();
        });
    }
    ,fajax:function(){
        var username = ui.$username.val();
        var userpwd = ui.$userpwd.val();
        var flag = false;
        $('.login_padding').find('input').each(function(){
            // console.log($(this).val())
            if($(this).val() == ''){
                $(this).next('label').text('不能为空！');
                // console.log($(this).next())
                var self = this;
                $(self).on('focus',function(){
                     oPage.focusEmpty(self);
                });
            }else{
                flag = true;
            }
        });

         if(flag){
                $.post(
                    url,
                    {
                        username:username,
                        userpwd: userpwd
                    },
                    function(data){
                        console.log(data);
                        if(data.status == 1){//表示登录成功
                            // location.href = gourl;
                            alert("登录成功！");
                        }else{
                            alert('登录失败，请检查登录名和密码是否正确！');
                        }
                    },'json'
                );
            }
    }
    ,focusEmpty:function(self){
        $(self).next('label').hide();
    }
};
   oPage.init();
});
