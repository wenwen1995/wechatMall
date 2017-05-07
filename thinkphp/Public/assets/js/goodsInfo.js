/*
    goodsInfo.js
    by renwenji 
    2017/05/06
    功能：实现后台管理之商品信息管理页面
 */
$(function(){
     var ui = {
          $edit: $('.edit')
        , $itemname: $('.itemname')
        , $itemprice: $('.itemprice')
        , $itemhot: $('.itemhot')
        , $itemtype: $('.itemtype') 
        , $itembrief: $('.itembrief')
        , $itemcity: $('.itemcity')
        , $itemup: $('.itemup')
        , $updateBtn: $('.updateBtn')
    };

var id;
var oPage = {
    //init初始化程序
    init: function() {
      this.showMask(); //显示遮罩层
      this.changeInfo();//修改数据
    }
    ,showMask:function(){
       ui.$edit.each(function(){
        $(this).on('click',function(){
            var index = $(this).parent().parent().index();//获得td当前所在索引值
            var infoId = $(this).parent().parent().find('.infoId').val();//获得当前数据在数据库中的id值
            id = infoId;
            //实现将每个商品id对应的信息显示在模态框里
            $.ajax({
                url: goodsShowOwnInfo,
                type: 'POST',
                dataType: 'json',
                data: {'infoId': infoId}
            })
            .done(function(data) {
                var itemname = data.data.name;
                var itemprice = data.data.price;
                var itemhot = data.data.hot;
                var itemtype = data.data.type;
                var itembrief = data.data.brief;
                var itemcity = data.data.city;
                var itemup = data.data.up;
                ui.$itemname.val(itemname);
                ui.$itemprice.val(itemprice);
                ui.$itemhot.val(itemhot);
                ui.$itemtype.val(itemtype);
                ui.$itembrief.val(itembrief);
                ui.$itemcity.val(itemcity);
                ui.$itemup.val(itemup);
                console.log("success");
            })
            .fail(function(data) {
                alert(data.data.content);
            })
          });
       });
    }
    ,changeInfo: function(){
        ui.$updateBtn.on('click',function(){
            var itemname = ui.$itemname.val();
            var itemprice = ui.$itemprice.val();
            var itemhot = ui.$itemhot.val();
            var itemtype = ui.$itemtype.val();
            var itembrief = ui.$itembrief.val();
            var itemcity = ui.$itemcity.val();
            var itemup = ui.$itemup.val();
            $.ajax({
                url: editGoodsInfo,
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    itemname: itemname,
                    itemprice: itemprice,
                    itemhot: itemhot,
                    itemtype: itemtype,
                    itembrief: itembrief,
                    itemcity: itemcity,
                    itemup: itemup
                },
            })
            .done(function(data) {
                console.log(data);
                $('#myModal').modal('hide');
                var itemname = data.data.name;
                var itemprice = data.data.price;
                var itemhot = data.data.hot;
                var itemtype = data.data.type;
                var itembrief = data.data.brief;
                var itemcity = data.data.city;
                var itemup = data.data.up;
                $('.infoId').each(function(){ //将修改的信息显示在对应的页面上
                    var val = $(this).val();
                    if(id == val){
                        var index = $(this).parent().index()+1;
                        console.log(index)
                        $('.table2').find('tr').eq(index).find('.tdname').text(itemname);
                        $('.table2').find('tr').eq(index).find('.tdprice').text(itemprice);
                        $('.table2').find('tr').eq(index).find('.brief').text(itembrief);
                        $('.table2').find('tr').eq(index).find('.tdcity').text(itemcity);
                        if(itemhot == 0){
                          $('.table2').find('tr').eq(index).find('.tdhot').text('不热销');
                        }else{
                          $('.table2').find('tr').eq(index).find('.tdStatus').text('热销');
                        }
                        if(itemtype == 0){
                          $('.table2').find('tr').eq(index).find('.tdtype').text('衣服');
                        }else if(itemtype == 1){
                          $('.table2').find('tr').eq(index).find('.tdtype').text('帽子');
                        }else{
                          $('.table2').find('tr').eq(index).find('.tdtype').text('皮包');
                        }
                        if(itemup == 1){
                          $('.table2').find('tr').eq(index).find('.tdup').text('上架');
                        }else{
                          $('.table2').find('tr').eq(index).find('.tdup').text('下架');
                        }

                        console.log($(this).parent().index());
                    }
                })
                console.log("success");
            })
            .fail(function(data) {
                 alert(data.data.content);
            })
        });
    }
};
   oPage.init();
});


