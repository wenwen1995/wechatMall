/*
	all.js
	by renwenji 
	2017/04/09
	功能：实现微信商城购物车页面数据渲染
 */
$(function(){
	 var ui = {
          $cart: $('.cart') //底部购物车图标
    };

var oPage = {
	//init初始化程序
	init: function() {
      this.view(); 
	}
    ,view:function(){
        ui.$cart.on('click',function(){
            oPage.fajax();
        });
    }
    ,fajax:function(){
        // var url = "{U(AddToCart/addItem)}"; //请求的url
        // var url = "http://localhost/wechatMall/index.php/Home/";
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: {},
            success: function(data) {
                // alert("发表成功！");
                console.log(data.status);
                if(data.status == 1){//表示添加成功

                }
            },
            error: function(data) {
                console.log('error')
            },
         });
    }
};
   oPage.init();
});

