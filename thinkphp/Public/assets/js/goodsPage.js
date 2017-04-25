/*
    goodsPage.js
    by renwenji 
    2017/04/12
    功能：实现微信商城后台管理商品信息页面
 */
$(function(){
var imgSrc,imgName,select2Val,select3Val;
var oPage = {
    //init初始化程序
    init: function() {
      this.view();
      this.validateForm();
    }
    ,view:function(){
       //商品图片上传
       $('#goods_file_upload').uploadify({
            'debug':true,
            'height': '40',
            'width':'300',
            'swf': root + 'uploadify/uploadify.swf',
            'uploader' : goodsUpUrl,
            'buttonText' : '选择图片上传',
            'onUploadSuccess' : function(file, data, response) {
                console.log(data);
                $('#goodsImg').attr('src',root +'uploads/items/'+ data);
                imgSrc = $('#goodsImg').attr('src');
                // console.log(imgSrc);
                imgName = imgSrc.substring(imgSrc.lastIndexOf('/')+1); //获取到img的图片名称
                $('#hideImgSrc').attr('value',imgName);
            },
        });

       //热销推荐选择
       $('#select2').change(function(){
            select2Val = $(this).children('option:selected').val();
            console.log(select2Val);
       });

       //商品李想选择
       $('#select3').change(function(){
            select3Val = $(this).children('option:selected').val();
            console.log(select3Val);
       });
    }
    ,validateForm:function(){
        //商品信息
        $('#goodsInfoForm').validate({
            onsubmit:true,
            submitHandler:function(form){ //通过之后回调
                var goodsName = $('#goodsName').val();
                console.log(adname);
                if(imgSrc != undefined){
                    var goodsImg = imgName;
                }
                // var  adImg = $('#file_upload').val();
                var price = $('#price').val();
                var select1 = $('#select1 > option:selected').val();
                var desc = $('#desc').val();
                var have = $('#have').val();
                var city = $('#city').val();
                $.post(
                        goodsUrl,
                        {
                          goodsName:goodsName,
                          goodsImg:goodsImg, 
                          price:price,
                          select1:select1,
                          select2Val:select2Val,
                          select3Val:select3Val,
                          desc:desc,
                          have:have,
                          city:city
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


