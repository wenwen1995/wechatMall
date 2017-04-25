/*
	all.js
	by renwenji 
	2017/03/30
	功能：实现微信商城移动端商品分类的功能
 */
$(function(){
	 var ui = {
          $typeList: $('.typeList') //分类菜单
        , $searchIcon: $('.searchIcon')
        , $searchInput: $('.searchInput')
    };
var allClick = 1,num = 1;
var params = [];

var oPage = {
	//init初始化程序
	init: function() {
      this.view(); //点击顶部分类，显示对应的内容
      this.showSearch(); //查看搜索的结果
	}
    ,view: function(){
        var $typeListLi = ui.$typeList.find('ul li');
        //顶部分类菜单点击时显示对应的内容
        $typeListLi.on('click',function(){
            $(this).addClass('highlight').siblings().removeClass('highlight');
            var index = $typeListLi.index(this); //获得当前点击的索引值
            console.log(index);
            $('.showGoods > div').eq(index).show().siblings().hide();
        });
        $typeListLi.each(function(){
            if($(this).hasClass('highlight')){
                var index = $(this).index();
                $('.showGoods > div').eq(index).show().siblings().hide();
            }
        });
    }
    ,showSearch: function(){
        //搜索按钮点击
        ui.$searchIcon.on('click',function(){
            var val = ui.$searchInput.val();
            // console.log(val)
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {'val': val}
            })
            .done(function(data) {
                console.log("success");
                console.log(data)
            })
            .fail(function() {
                console.log('出错了！')
            })
        });
        //
        // ui.$searchInput.on('keyup',function(){
        //     var val = $(this).val();
        //     $.ajax({
        //         url: 'http://localhost/wechatMall/index.php/Home/All/all',
        //         type: 'POST',
        //         dataType: 'json',
        //         data: {'val': val}
        //     })
        //     .done(function() {
        //         console.log("success");
        //     })
        //     .fail(function() {
        //         console.log('出错了！')
        //     })
        // });
    }
};
   oPage.init();
});

