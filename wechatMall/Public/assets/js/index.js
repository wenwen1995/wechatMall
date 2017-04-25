/*
	index.js
	by renwenji 
	2017/03/29
	功能：实现微信商城移动端主页的功能
 */
$(function(){
	 var ui = {
         $carousel: $('.carousel')
    };

var oPage = {
	//init初始化程序
	init: function() {
      this.view(); //显示中间商品滚动
      this.bannerSlide(); //顶部轮播滚动
	}
    ,view:function(){
        var mySwiper = new Swiper ('.swiper-container', {
            loop:true,
            pagination: '.pagination',
            paginationClickable: true,
            slidesPerView:2,
            slidesPerGroup:2
          });
    }
    ,bannerSlide: function(){
        ui.$carousel.carousel({interval:4000}); //每隔4s滚动
    }
};
   oPage.init();
});

