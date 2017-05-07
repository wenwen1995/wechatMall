/*
    manage.js
    by renwenji 
    2017/04/12
    功能：实现微信商城后台管理页面
 */
$(function(){
     var ui = {
          $nav: $('.nav') //侧边栏
        , $pageInner:$('#page-inner') //内容
        , $logoutSpan: $('.logout-spn')
    };
var oPage = {
    //init初始化程序
    init: function() {
      this.showContent(); //切换内容
    }
    ,showContent:function(){
        ui.$nav.find('li').each(function(){
            $(this).on('click',function(){
                var index = $(this).index();
                ui.$pageInner.children('div').eq(index).show().siblings().hide();
                console.log($(this).index());
            })
        });
    }
};
   oPage.init();
});


