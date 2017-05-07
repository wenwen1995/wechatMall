/*
    adInfo.js
    by renwenji 
    2017/05/06
    功能：实现后台管理之广告图信息管理页面
 */
$(function(){
     var ui = {
          $edit: $('.edit')
        , $desc1: $('.desc1')
        , $desc2: $('.desc2')
        , $tdDesc1: $('.tdDesc1')
        , $tdDesc2: $('.tdDesc2') 
        , $status: $('.status')
        , $tdStatus: $('.tdStatus')
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
            //实现将每个广告图id对应的信息显示在模态框里
            $.ajax({
                url: showOwnUrl,
                type: 'POST',
                dataType: 'json',
                data: {'infoId': infoId}
            })
            .done(function(data) {
                var desc1 = data.data.desc1;
                var desc2 = data.data.desc2;
                var status = data.data.status;
                ui.$desc1.val(desc1);
                ui.$desc2.val(desc2);
                ui.$status.val(status);
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
            var desc1 = ui.$desc1.val();
            var desc2 = ui.$desc2.val();
            var status = ui.$status.val();
            console.log(desc1,desc2,status);
            $.ajax({
                url: editAdInfo,
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    desc1: desc1,
                    desc2: desc2,
                    status: status
                },
            })
            .done(function(data) {
                console.log(data);
                $('#myModal').modal('hide');
                var desc1 = data.data.desc1;
                var desc2 = data.data.desc2;
                var status = data.data.status;
                $('.infoId').each(function(){ //将修改的信息显示在对应的页面上
                    var val = $(this).val();
                    if(id == val){
                        var index = $(this).parent().index()+1;
                        $('.table1').find('tr').eq(index).find('.tdDesc1').text(desc1);
                        $('.table1').find('tr').eq(index).find('.tdDesc2').text(desc2);
                        if(status == 0){
                          $('.table1').find('tr').eq(index).find('.tdStatus').text('不推荐');
                        }else{
                          $('.table1').find('tr').eq(index).find('.tdStatus').text('推荐');
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


