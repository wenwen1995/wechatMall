/*
	all.js
	by renwenji 
	2017/03/30
	功能：实现微信商城移动端商品购物车功能
 */
$(function(){
	 var ui = {
          $orderDetail: $('.orderDetail')
        , $result: $('.result') //增减数量
        , $allPrice: $('.allPrice') //总价
    };

var goodsId,nowTitle,price,result;

var oPage = {
	//init初始化程序
	init: function() {
      this.view(); //点击加减，购物车数量增加减
      this.total(); //计算总价
	}
    ,view: function(){
        $('.orderDetail > .orderItem').each(function(index,ele){
            //点击减号，数量对应减少
            $(this).find('.minus').on('click',function(){
                goodsId = $(this).parents('.orderItem').attr('id');//获得该商品对应的id值
                // price = parseInt($(this).parent().siblings().find('.unitPrice').text());//获得该商品对应的价格
                result = parseInt($(this).siblings('.result').text());//该商品加入购物车的数量
                // nowTitle = $(this).parent().siblings('.goodsTitle').text();//获得点击时对应的名称
                result--;
                $(this).siblings('.result').text(result);
                // url = "http://localhost/wechatMall/index.php/Home/Shopcart/minus";
                if(result< 1){
                    $(this).siblings('.result').text(0);
                     oPage.fajax(goodsId,minusUrl);
                     oPage.total();
                    $(this).parent().parent().hide();
                }else{
                    $(this).siblings('.result').text(result);
                    oPage.fajax(goodsId,minusUrl);
                    oPage.total();
                }
            });
            //点击加号，数量对应增加
            $(this).find('.plus').on('click',function(){
                var goodsId = $(this).parents('.orderItem').attr('id');//获得该商品对应的id值
                // var price = parseInt($(this).parent().siblings().find('.unitPrice').text());//获得该商品对应的价格
                var result = parseInt($(this).siblings('.result').text());//该商品加入购物车的数量
                // var nowTitle = $(this).parent().siblings('.goodsTitle').text();//获得点击时对应的名称
                result++;
                $(this).siblings('.result').text(result);
                // url = "http://localhost/wechatMall/index.php/Home/Shopcart/plus";
                oPage.fajax(goodsId,plusUrl);
                oPage.total();
            });
            //点击删除，对应项目隐藏不见
            $(this).find('.delete').on('click',function(){
               var goodsId = $(this).parents('.orderItem').attr('id');//获得该商品对应的id值
               $(this).parent().hide();
               $(this).siblings().find('.result').text(0);
               url = "http://localhost/wechatMall/index.php/Home/Shopcart/del";
               oPage.fajax(goodsId,delUrl);
               oPage.total();
            });
        });
    }
    ,total: function(){
        var allPrice = 0; //总价
        $('.orderDetail').each(function(){
            var totalPrice = 0; //每个商品 的总价
            $('.orderItem').each(function(){
                var num = parseInt($(this).find('.result').text());
                // console.log(num)
                var unitPrice = parseInt($(this).find('.unitPrice').text());
                var total = num * unitPrice;
                totalPrice += total;
                // console.log(totalPrice)
            });
            allPrice += totalPrice;
            // console.log(allPrice);
            ui.$allPrice.text(allPrice)
        })
    }
    ,fajax:function(goodsId,url){
        $.post(
            url,
            {
                goodsId:goodsId
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

