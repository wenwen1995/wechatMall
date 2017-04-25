function _initRem() {
  var pxUnit = 100;     // 在px2rem中预设rem的值 即 1rem = ? px
  var designWid = 750;  // 设计稿宽度
  var winWid = document.body.clientWidth;
  var winHei = document.body.clientHeight;
  var bl = winWid / designWid;
  document.querySelector('html').style.fontSize = (bl * pxUnit) + 'px';
}
_initRem();