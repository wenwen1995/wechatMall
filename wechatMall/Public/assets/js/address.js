/*
    address.js
    by renwenji 
    2017/03/30
    功能：实现微信商城移动端收货信息提交
 */
$(function(){
     var ui = {
          $submit: $('.submit') //提交订单
        , $phoneInput: $('.phoneInput')
        , $addressInfo: $('.addressInfo') //收货信息
    };

var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;

var oPage = {
    //init初始化程序
    init: function() {
      this.view(); 
    }
    ,view:function(){
        ui.$submit.on('click',function(){
            $('.addressInfo input').each(function(){
                console.log($(this).val());
                if($(this).val() == ''){
                    $(this).siblings('.vali').text('不可为空').show();
                }
            });
        });
         $('.addressInfo input').focus(function(){
             $(this).siblings('.vali').text('').hide();
         });
         //手机号码失去焦点时验证
        ui.$phoneInput.blur(function(){
            if($(this).val() == ''){
                $(this).siblings('.vali').text('不可为空').show();
            }else if(!myreg.test($(this).val())){
                $(this).siblings('.vali').text('号码不正确').show();
            }
        });
    }
};
   oPage.init();
});

