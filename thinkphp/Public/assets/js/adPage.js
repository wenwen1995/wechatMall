/*
    adPage.js
    by renwenji 
    2017/04/12
    功能：实现微信商城后台管理广告信息页面
 */
$(function(){
var imgSrc,imgName,selectOptionVal;
var oPage = {
    //init初始化程序
    init: function() {
      this.view();
      this.validateForm();
    }
    ,view:function(){
        //广告图片上传
       $('#file_upload').uploadify({
            'debug':true,
            'height': '40', //重写图片上传按钮的高度
            'width':'300',  //重写图片上传按钮的高度
            'swf': root + 'uploadify/uploadify.swf',
            'uploader' : adUpUrl,
            'buttonText' : '选择图片上传',
            'onUploadSuccess' : function(file, data, response) {
                console.log(data);
                $('#img').attr('src',root +'uploads/'+ data);
                imgSrc = $('#img').attr('src');
                // console.log(imgSrc);
                imgName = imgSrc.substring(imgSrc.lastIndexOf('/')+1); //获取到img的图片名称
                // console.log(imgName)
                $('#hideImgSrc').attr('value',imgName);
                // alert("图片上传成功！");
            },
        });
       $('#myselect').change(function(){
            selectOptionVal = $(this).children('option:selected').val();
            console.log(selectOptionVal);
       });
    }
    ,validateForm:function(){
        //广告图信息表单
        $('#adInfoForm').validate({
            onsubmit:true,
            submitHandler:function(form){ //通过之后回调
                var adName = $('#adName').val();
                console.log(adname);
                if(imgSrc != undefined){
                    var adImg = imgName;
                }
                $('#hideImgSrc').attr('value',imgName);
                // var  adImg = $('#file_upload').val();
                var desc1 = $('#desc1').val();
                var desc2 = $('#desc2').val();
                var selectOption = selectOptionVal;
                console.log(selectOption);
                var gourl = $('#gourl').val();
                $.post(
                        adurl,
                        {
                          adName:adName,
                          adImg:adImg, 
                          selectOption:selectOption,
                          desc1:desc1,
                          desc2:desc2,
                          gourl:gourl,
                        },
                        function(data){
                            if(data.status == 1){ //插入数据库成功

                            }
                        },'json'
                    );

            }
        });
    }
};
   oPage.init();
});


