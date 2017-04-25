+function() {
  setTimeout(function() {
    $.ajax = function(options) {
      var dfd = $.Deferred()
        , data = {}
        , url = options.url
        , params = options.data
        , code = 0
        , message;
      
      if(url.indexOf('/itemMore') > -1) {
        message = 'success';
        code = 0;
        data = {
          list: '<li class="col-xs-12"><a href="#"><img src="../i/game1.png" class="game"></a><a href="#"><img src="../i/game2.png" class="game"></a><a href="#"><img src="../i/game3.png" class="game"></a><a href="#"><img src="../i/game4.png" class="game"></a></li>',
          loadMore : 1
        };
      }

      if(url.indexOf('/downloadList') > -1) {
        message = 'success';
        code = 0;
        data = {
          list: '<div class="item"><div class="gamepic"> <a href="#"> <img alt="永恒物语" src="../i/gamepic1.png"></a></div><div class="gameLink clearfix"><div class="gameName">永恒物语</div><div class="gameGoDown clearfix"><div class="downloadIcon"></div><a href="#"><span class="download">下载</span></a></div></div></div>',
          loadMore : 1
        };
      }

      console.log('$.ajax', url, options, {code: code, message: message, data:data});
      setTimeout(function() {
        dfd.resolve({code: code, message: message, data:data});
      }, 0);
      return dfd;
    };
  });
}();


