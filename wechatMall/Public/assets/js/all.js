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
var str,kind;

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
                if(data.status == 0){ 
                    //表示模糊搜索后没有查找到对应的数据，则提示用户没有搜到合适的结果
                    $('.showGoods').children().hide();
                    $('.showGoods').text(data.content).css({
                        textAlign: 'center',
                        paddingTop: '3.5rem',
                        fontSize:'.35rem'
                    });
                    window.location.reload();//页面自动重新刷新
                }else{
                    //表示模糊搜索后查找到对应的数据，显示对应的结果
                    console.log(data.data.length);
                    var html = '';
                    for(var i=0; i< data.data.length;i++){
                         var route = '/thinkphp/uploads/items/'+data.data[i].img;
                         var id = data.data[i].id;
                         var cloUrl = "/wechatMall/index.php/Home/Detail/detail/id/"+id+".html";
                         var type = data.data[0].type;//获取得到数据的类型，0表示衣服，1表示帽子，2表示皮包
                         html += '<div class="project">'+'<div class="showImg">'+
                                    '<a href='+ cloUrl +'>'+
                                        '<img src='+ route +' alt="图片">'+
                                    '</a>'+'</div>'+'<div class="descri">'+'<p class="title">'+ data.data[i].name +'</p>'
                                    +'<img src="/wechatMall/Public/assets/image/star.jpg" class="star">'+
                                     '<p class="price">'+'￥'+'<span class="money">'+ data.data[i].price +'</span>'+'</p>'
                                     +'<p class="info">'+'<span class="already">'+data.data[i].alreadybuy+'</span>'+'人购买'+
                                    '<span class="city">'+ data.data[i].city +'</span>'+'</p>'+'</div>'+'</div>';
                        str = html,kind = type;
                        if(type == 0){//是衣服类型
                            oPage.changeContent(type);
                        }else if(type == 1){
                            oPage.changeContent(type);
                        }else{
                            oPage.changeContent(type);
                        }
                    }
                }
                console.log("success");
                console.log(data)
            })
            .fail(function() {
                alert('出错了！')
            })
        });
    }
    ,changeContent: function(kind){ //实现搜索到对应的内容后，对应的顶部导航栏高亮和对应的模块显示
       ui.$typeList.find('ul li').eq(kind).addClass('highlight').siblings().removeClass('highlight');
       $('.showGoods > div').eq(kind).show().siblings().hide();
       if(kind == 0){
          $('.clothesArea').children().hide();
          $('.clothesArea').append(str).show();
       }else if(kind == 1){
          $('.capArea').children().hide();
          $('.capArea').append(str).show();
       }else{
          $('.bagsArea').children().hide();
          $('.bagsArea').append(str).show();
       }
    }
};
   oPage.init();
});

