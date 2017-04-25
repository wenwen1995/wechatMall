/*
	all.js
	by renwenji 
	2017/03/30
	功能：实现微信商城移动端商品详情页
 */
$(function(){
	 var ui = {
          $number: $('.number') //购物车数量
        , $addToCart: $('.addToCart') //添加到购物车
    };
var allClick = 1,num = 1;
var params = [];
var goodsId,nowTitle,price,img,imgSrc,filename;

var oPage = {
	//init初始化程序
	init: function() {
      this.selectGoods(); //选择商品加入购物车
	}
    ,selectGoods: function(){
            var clickTimes = 1;
            goodsId = $('#goodsId').val();
            imgSrc = $('.bigImg').attr('src');
            imgSrc= imgSrc.split("/");
            img = imgSrc[imgSrc.length-1];
            console.log(img)
            console.log(goodsId)

            ui.$addToCart.on('click',function(){
                var nowNumber = clickTimes++; //获得当前点击的商品数量
                allClick = num++; //获得总共点击数量
                nowTitle = $(this).siblings('.goodsTitle').text();  //获得当前点击的商品名称
                price = parseInt($(this).siblings().find('.unitPrice').text()); //获得价格
                if(allClick > 0){ //数量>0则显示角标
                    ui.$number.text(allClick).show(); //购物车角标显示总点击数量
                }else{
                    ui.$number.hide();
                }
                oPage.fajax();
                // console.log(allClick,nowTitle,price,img)
            });
    }
    ,fajax:function(){
        // http://localhost/wechatMall/index.php/Home/Shopcart/add_cart
        // var url = "{:U('Shopcart/add_cart')}";
        $.post(
            url,
            {
                goodsId:goodsId,
                name:nowTitle,
                price:price,
                quantity:allClick,
                img:img
            },
            function(data){
                console.log(data);
                if(data.status == 1){ //表示添加成功
                    console.log('success');
                    eval("'" + data.msg + "'");
                }else{
                    console.log('error');
                }
            },'json'
        );
    }
};
   oPage.init();
});

