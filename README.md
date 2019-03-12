# wechatMall
## 基于thinkphp的微信商城 ##


**2017年5月7号，续前面所写内容继续更新**

——————**完善了WEB端后台管理系统的功能不足的问题**——————————

原来的后台管理工作只是针对于广告图信息的上传、商品图片的信息的上传，显然这样是不足的。按理来说后台管理也可以看到**数据库表中的所有的广告图信息的列表数据和商品信息的列表数据，然后可以对它们进行对应的修改**，比如商品可以修改其库存、上下架、价格等等。

所以最终实现效果如下：

广告图信息管理：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-5-7/19019151-file_1494120430798_1055b.png)

点击对应的编辑图标，可进行对应内容的修改：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-5-7/6364087-file_1494120433448_a840.png)

商品信息管理（**这里实现了分页！**）：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-5-7/83480337-file_1494120436010_541e.png)

点击对应的编辑图标，可进行对应内容的修改：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-5-7/13774047-file_1494120438525_ff40.png)

效果还不错吧，这里表格样式使用的是bootstrap的：**table-striped**，然后弹出层使用的是bootstrap的**模态框**，分页的效果是仿照网上写的。

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-5-7/84704171-file_1494122004841_86d1.png)

这里**Application/Common/Common/function.php**里面是实现分页的方法

**InfoController.class.php**控制器方法里面含有操作广告图信息管理、商品信息管理的方法。

Info文件夹下的  **adInfo.html->广告图信息管理页面**、**goodsInfo.html->商品信息管理页面**

###function.php实现分页的方法：###

    <?php
	/**
	 * TODO 基础分页的相同代码封装，使前台的代码更少
	 * @param $count 要分页的总记录数
	 * @param int $pagesize 每页查询条数
	 * @return \Think\Page
	 */

	function getPage($count,$pagesize=10){
		$p = new Think\Page($count,$pagesize);
		$p->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
		$p->setConfig('prev','上一页');
		$p->setConfig('next','下一页');
		$p->setConfig('last', '末页');
	    $p->setConfig('first', '首页');
	    $p->setConfig('theme','%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
	    $p->lastSuffix = false;//最后一页不显示为总页数
	    return $p;
	}
	?>


###控制器中实现商品信息管理页面分页的方法：###
    
    //显示商品信息列表
    public function goodsInfo(){
      $itemInfo = M('item');
      $where = "id>10";
      $count = $itemInfo->where($where)->count();
      $p = getPage($count,10);//数据每10条进行分页
      $list = $itemInfo->field(true)->where()->order('id')->limit($p->firstRow,$p->listRows)->select();//将数据列表按id的数据取出
      $this->assign('item',$list); //赋值数据集
      $this->assign('page',$p->show());//赋值分页输出
      $this->display();
    }


###前端分页页面展示：###

     <!-- 分页 -->
     <div class="page">
       <div class="pages">
              {$page}
       </div>
     </div>

###对应的css样式：###

    /*分页效果*/
	.pages{
		text-align:center;
	}
	.rows{
		padding-left: 20px;
	}
	.pages a,.pages span {
	    display:inline-block;
	    padding:2px 5px;
	    margin:0 6px;
	    border:1px solid #f0f0f0;
	    -webkit-border-radius:3px;
	    -moz-border-radius:3px;
	    border-radius:3px;
	}
	.pages a,.pages li {
	    display:inline-block;
	    list-style: none;
	    text-decoration:none; color:#58A0D3;
	}
	.pages a.first,.pages a.prev,.pages a.next,.pages a.end{
	    margin:0;
	}
	.pages a:hover{
	    border-color:#50A8E6;
	}
	.pages span.current{
	    background:#50A8E6;
	    color:#FFF;
	    font-weight:700;
	    border-color:#50A8E6;
	}

最终分页效果就是如之前的图片所示了，这里分页参考的是这个链接，基本仿照来写的，写的很好很清楚：
[http://www.cnblogs.com/tianguook/p/4326613.html](http://www.cnblogs.com/tianguook/p/4326613.html)

###控制器中实现点击编辑，显示对应商品信息的方法：###

    //显示对应id的数据内容
     public function goodsShowOwnInfo(){
      $itemInfo = M('item');
      $id = I('post.infoId');
      $OwnInfo = $itemInfo->find($id);
      if(!$OwnInfo){
			$data = array(
			    'status' => 0,
			    'content' => '检索信息失败！',
			    'data' => $result,
		   );
		}else{
			$data = array(
			    'status' => 1,
			    'content' => '返回数据成功！',
			    'data' => $OwnInfo,
			);
		}
		$this->ajaxReturn($data);
    }

这里前端页面在商品列表展示时，有个**隐藏的包含商品id值的input框**，当点击编辑时，将此id值通过ajax传给后台，后台根据此id值找到唯一的这条记录，并将其返回，通过js将返回的数据渲染在页面上。

###前端页面:###

     <div class="adManage col-md-12">
                    <table class="table2 table table-striped">
                      <thead>
                        <tr>
                          <th>商品名称</th>
                          <th>图片名称</th>
                          <th>商品价格</th>
                          <th>热销状态</th>
                          <th>商品类型</th>
                          <th>商品描述</th>
                          <th>已买人数</th>
                          <th>商品产地</th>
                          <th>上架状态</th>
                          <th>操作</th>
                        </tr>
                      </thead>
                      <tbody>
                        <volist name="item" id="vo">
                            <tr>
                              <input type="hidden" value="{$vo.id}" class="infoId">
                              <td class="tdname">{$vo.name}</td>
                              <td class="tdpicname">{$vo.img}</td>
                              <td class="tdprice">{$vo.price}</td>
                              <if condition="($vo.hot eq 1)"> 
                                  <td class="tdhot">热销</td>
                                  <else/><td class="tdhot">热销</td>
                              </if>
                              <if condition="($vo.type eq 0)"> 
                                  <td class="tdtype">衣服</td>
                                  <elseif condition="$name eq 1"/><td class="tdtype">帽子</td>
                                  <else /><td class="tdtype">皮包</td>
                              </if>
                              <td><div class="brief">{$vo.brief}</div></td>
                              <td>{$vo.alreadybuy}</td>
                              <td class="tdcity">{$vo.city}</td>
                              <if condition="($vo.up eq 1)"> 
                                  <td class="tdup">上架</td>
                                  <else/><td class="tdup">下架</td>
                              </if>
                              <td><img class="edit" src="__img__/edit.png" data-toggle="modal" data-target="#myModal"></td>
                            </tr>
                        </volist>
                      </tbody>
                    </table>
                </div>
                <!-- 分页 -->
                <div class="page">
                    <div class="pages">
                        {$page}
                    </div>
                </div>

上述代码中class="infoId"就是含有商品id值的隐藏的input框。

###对应的goodsInfo.js：###

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
      this.showMask(); //显示遮罩层，每个商品id对应的信息显示在模态框里
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

上述js中的showMask方法就是点击编辑图标，显示遮罩层，并将对应商品id的信息显示在模态框里。



###控制器中实现修改商品信息的方法：###

     //修改商品内容
     public function editGoodsInfo(){
      $itemInfo = M('item');
      $id = I('post.id');
      $itemname = I('post.itemname');
      $itemprice = I('post.itemprice');
      $itemhot = I('post.itemhot');
      $itemtype = I('post.itemtype');
      $itembrief = I('post.itembrief');
      $itemcity = I('post.itemcity');
      $itemup = I('post.itemup');

      $data['id'] = $id;
      $data['name'] = $itemname;
      $data['price'] = $itemprice;
      $data['hot'] = $itemhot;
      $data['type'] = $itemtype;
      $data['brief'] = $itembrief;
      $data['city'] = $itemcity;
      $data['up'] = $itemup;

      if($itemInfo->save($data) == false){ //如果信息修改失败，
            $data = array(
                'status' => 0,
                'content' => '修改信息失败！',
                'data' => $data,
           );
        }else{
            $OwnInfo = $itemInfo->find($id);
            $data = array(
                'status' => 1,
                'content' => '修改信息成功！',
                'data' => $OwnInfo,
            );
        }
        $this->ajaxReturn($data);
    }


###前端页面的模态框部分：###

        <!-- 模态框（Modal） -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
           aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close"
                       data-dismiss="modal" aria-hidden="true">
                          &times;
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                       商品的基本信息
                    </h4>
                 </div>
                     <div class="modal-body">
                              <div class="form-group">
                                <label for="name">商品名称</label>
                                <input type="text" class="form-control itemname">
                              </div>
                              <div class="form-group">
                                <label for="name">商品价格</label>
                                <input type="text" class="form-control itemprice">
                              </div>
                              <div class="form-group">
                                <label for="name">热销状态</label>
                                <input type="text" class="form-control itemhot">
                              </div>
                              <div class="form-group">
                                <label for="name">商品类型</label>
                                <input type="text" class="form-control itemtype">
                              </div>
                              <div class="form-group">
                                <label for="name">商品描述</label>
                                <input type="text" class="form-control itembrief">
                              </div>
                              <div class="form-group">
                                <label for="name">商品产地</label>
                                <input type="text" class="form-control itemcity">
                              </div>
                              <div class="form-group">
                                <label for="name">上架状态</label>
                                <input type="text" class="form-control itemup">
                              </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                           data-dismiss="modal">关闭
                        </button>
                        <button type="button" class="btn btn-primary updateBtn">
                           修改
                        </button>
                     </div>
              </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>


上述goodsInfo.js中的changeInfo方法就是修改信息后，点击修改，隐藏遮罩层，将修改后的数据即时的显示在商品信息列表里。


> 于2017.5.7小记....感觉功能完善的差不多啦，收尾！！



----------------------------------


**2017年5月2号，续前面所写内容继续更新**

--------系统存在的一个问题解决啦!开心O(∩_∩)O~~-----

*问题：在全部商品列表里，如何实现在输入框内输入文字，点击搜索时，对应的商品能进行模糊搜索进行匹配，并显示在页面上？*

----------------------------------
答：分析了一下，这里使用到ajax技术，前端页面点击搜索时，通过ajax执行一个方法，并将输入框的值传递给后台， 后端拿到此数据后，进行对应的数据库操作，ThinkPHP3.2 将最终结果通过ajaxReturn返回给前端，前端再根据判断数据传回成功与否和数据长度来显示页面。

其中获得灵感思路的来自于这篇链接，写的不错：[http://blog.csdn.net/freeape/article/details/49467551](http://blog.csdn.net/freeape/article/details/49467551)

来看一下最终实现的代码吧，all.html包含输入框这部分和中间这个显示内容的大div:
![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-5-2/66300172-file_1493705730079_4c40.png)

对应的all.js是这样写的：

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
                                    '<span class="city">'+ data.data[i].city +'</span>'+'</p>'+'</div>'+'</div>';//html字符串拼接
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


对应的控制器方法AllController.class.php中的getKeyWords方法这样写：

    public function getKeywords(){
		// 输入框获取模糊查询结果集
		$item = M('item');
		$keywords = I('post.val'); //获取搜索的关键字 
		$where['name'] = array('like','%'.$keywords.'%');
		$result = M('item')->where($where)->select();
		if(!$result){
			$data = array(
			    'status' => 0,
			    'content' => '抱歉，没有搜索到对应的商品！',
			    'data' => $result,
		   );
		}else{
			$data = array(
			    'status' => 1,
			    'content' => '返回数据成功！',
			    'data' => $result,
			);
		}
		$this->ajaxReturn($data);
	}

这里在其中还遇到问题，就是模糊搜索返回的数据是个数组，有多个，但是刚开始每次只显示最后一个。后来发现原因：原来是

    var html =''；

这句话要放在for循环的外面，然后在循环里面进行
    
    html +=...；

循环结束后，在外面再进行

    $('..').html(html);

就好啦~解决方法来自于这个链接：[https://zhidao.baidu.com/question/199307232590915525.html](https://zhidao.baidu.com/question/199307232590915525.html)

看一下最终显示的结果：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-5-2/31455171-file_1493703851551_1e81.png)

没有搜到合适的商品时，显示如下，之后再通过语句

    window.location.reload();

进行页面的重新刷新。

搜到合适的商品，显示出来，这里侧边console台我打印了返回的结果信息：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-5-2/45767516-file_1493703935918_f07f.png)

最后动图演示一下，（这里不知道为什么，用GifGam录制时，chrome浏览器模拟的手机界面的那个点击的小图标在生成gif后，不见了。。），但是完成功能还是好开心~哈哈哈：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-5-2/59212108-file_1493704698447_ee87.gif)


![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-5-2/96431845-file_1493704709626_119b3.gif)

-----------------------------------

先看一下最终的微信商城移动端效果图，

首页：
![](http://i1.piimg.com/567571/5d70168d38074f69.jpg)


全部商品：
![](http://i2.muimg.com/567571/db132a56ad0c3a97.jpg)

商品详情页：
![](http://i4.buimg.com/567571/31f2cc9c23d6c86d.jpg)

购物车页之有商品：
![](http://i4.buimg.com/567571/9a2e0c0df55d65da.png)

购物车页之无商品：
![](http://i4.buimg.com/567571/d5d4507c5a6bc8fd.png)

个人页（与微信的我的个人信息是一致的）：
![](http://i1.piimg.com/567571/56ad88ea88167342.png)

收获地址列表：
![](http://i2.muimg.com/567571/90cce376868a793b.jpg)

编辑收货地址：
![](http://i4.buimg.com/567571/30e8e8dcf41df623.png)



**这里还需要有个后台管理系统，对于微信商城的广告图和商品信息进行管理，PC端后台管理系统共有3个界面，分别是这样的：**

登录页：
![](http://i2.muimg.com/567571/08bde475800f36e0.png)

广告图管理：
![](http://i1.piimg.com/567571/b9b3381c79afa137.png)


商品信息管理：
![](http://i1.piimg.com/567571/e2dd66390a02442e.png)


###这里来看一下具体实现了哪些功能： ###

1. 爱丽小屋服装销售系统移动端功能框图

![](http://i2.muimg.com/567571/3f48c27e65a2bfa7.png)


   
2. 后台管理系统PC端功能框图

![](http://i2.muimg.com/567571/fd7c967d2e64a9a7.png)
   


再来看一下项目目录结构吧，移动端的微信商城总体目录：

![](http://i1.piimg.com/567571/04e6b9de589af6bd.png)

细节目录1：

![](http://i1.piimg.com/567571/423c5704803a2f8f.png)

细节目录2：

![](http://i2.muimg.com/567571/18237892c8c990a1.png)

PC端后台管理系统的总体目录：

![](http://i4.buimg.com/567571/006ffa914c6dc3e0.png)

细节目录：

![](http://i4.buimg.com/567571/994561d999521008.png)

数据库设计，共有6张表：

![](http://i2.muimg.com/567571/6d0e788615932301.png)

现在来分别介绍每个表的含义及其设计时对应的字段、名称：

![](http://i1.piimg.com/567571/7cedb2c608977faf.png)

![](http://i2.muimg.com/567571/7c7e2ab3045ff0c1.png)

![](http://i1.piimg.com/567571/05768ecfce09de47.png)

![](http://i2.muimg.com/567571/902baccbd2b87090.png)

![](http://i2.muimg.com/567571/4beedfdbd961fd89.png)

![](http://i2.muimg.com/567571/1fb5618c74418863.png)




**做这个项目虽然是毕设所驱，一开始在写的过程中觉得很难。。完全没有方向和感觉，后来图书馆借了书，看网上的视频教程、查阅资料，最终做出来还是挺高兴的。这里微信支付没有实现，原因是用的测试号的原因，要实现微信支付啥的，还需要公众号认证...**



###在做的过程中，还是遇到很多的问题，现在来一一总结吧###

 

- *1、如何在Thinkphp页面include公共的页面，防止页面重写次数过多？*

答：在本系统中，底部的菜单栏为公共页面部分，放在了如下的目录结构中，

  ![](http://i4.buimg.com/567571/4a94ffdf31459f24.png)

在其他html引入该页面时使用语法：
    
    <include file="./Public/common/footer.html" />


- *2、页面的公共部分，包括图片，css样式表，js文件应该放在哪里，如何在页面引入？*

答：在Public文件夹新建一个assets的文件下，将这些文件分文件形式存放。本项目连接数据库的配置文件写在wechatMall/Applicaiton/Common/Cof/config.php下，代码如下，引用时，在config.php下配置信息：

    <?php
	//配置数据库连接信息
	return array(
		//'配置项'=>'配置值'
		'DB_TYPE' => 'mysql',  //数据库类型
		'DB_HOST' => '127.0.0.1', //服务器名称
		'DB_NAME' => 'wemall', //数据库名称
		'DB_USER' => 'root',  //用户名
		'DB_PWD'  => '',  //密码
		'DB_PORT' => '3306', //连接端口
		'DB_CHARSET' => 'utf8', //数据库字符集
	    'TMPL_PARSE_STRING' =>array(
	    	'__css__' => __ROOT__.'/Public/assets/css',
	    	'__js__' => __ROOT__.'/Public/assets/js',
	    	'__img__' => __ROOT__.'/Public/assets/image',
			),
	    'WECHAT_TOKEN' => 'weixin', //测试号的token
	    'WECHAT_APPID' => 'wx554d0f4040a39dc1', //测试号的appid
	    'WECHAT_APPSECRET' => '1936aeb5ef6103372450d480661676dc' //测试号的appsecret
	);

在html调用时，即像这样引入即可：

    <link rel="stylesheet" type="text/css" href="__css__/reset.css">



- *3、就是现在想做成这样的效果：*
  ![](http://i1.piimg.com/567571/485acce99b999244.png)

*- 从数据库中得到的数据有6个，让数据分成3组，每2个显示，但是这样写了以后，数据渲染出来应该每一屏的2个是不同的图片，现在却是同一个，该如何处理？*
    
原来页面上的代码是这样的：
![](http://i2.muimg.com/567571/207cf2f53383be40.png)

答：volist里写一个。每屏显示两个用swiper的设置。即要改变2处位置。

js变动：
![](http://i2.muimg.com/567571/841c80690d6a03e4.png)

页面上只需一个volist：
![](http://i4.buimg.com/567571/fcc7465147bd295f.png)


- *4、使用bootstrap轮播广告图时，图片数据是从数据库获得的，如何让其第一屏显示高亮的圆点图？*

答：代码这样写：
![](http://i2.muimg.com/567571/dbb64a3b06392882.png)

- *5、在后台管理界面中，图片上传会执行一个方法，点击提交时执行另一个方法，将获取到表单对应的值插入另一个表，但是现在点击提交时图片名称如何获取并和其他的信息一起插入数据库表中？*

答：可以在页面上写一个隐藏的input框，在图片上传执行一个方法回调后，拿到对应的图片上传后的名称，将其赋值给隐藏的input框下的Value值。之后点击提交时，则可将隐藏的input值和其他表单值通过post方法一起提交给后台处理。

-*6、如何在一个控制器中调用自定义的类方法？如：想在ShopcartController中调用自定义的方法Cart，但是不行？*

![](http://i1.piimg.com/567571/81acfe4bbca44f15.png)

答：查阅资料发现：ThinkPHP 3.2的环境下，要想使用：自己定义的类，没有命名空间的话，用的时候要定义根命名空间。

定义根命名空间意思是：

![](http://i4.buimg.com/567571/0f9e3700beb38470.png)

所以最终这样做：
![](http://i1.piimg.com/567571/6eb9018ae1bf1e4b.png)

![](http://i4.buimg.com/567571/9cdd265eff0a6254.png)

- *7、用户浏览商品，遇到喜欢的，添加进购物车，当跳转到其他页面继续浏览时，其购物车中所记录的商品信息如何能够跨页面保存下来？*

答：用到$_SESSION，当用户点击添加时，在session中创建一个以cart作为key的多维数组，在这个多维数组下，再按照商品的id来保存用户所添加的每个商品的信息。这样在每次在购物车增加商品时，先根据商品id查询该商品是否已经存在，若存在只需要增加商品数量即可，若不存在则新增一个商品id,并使该商品指向保存商品具体信息的一个关联数组。

- *8、在ThinkPHP中， js文件中U方法不被解析问题？*

答：如下面代码所示：

    <script type="text/javascript">
      var ajaxurl = "{:U(Index/index')}"; // index.js 中使用
    </script>
    <script type="text/javascript" src="__js__/index.js"></script>

这个变量在tpl中解析完毕之后，传入js文件中，这样在js里使用地址就正确了。

- *9、如何在ThinkPHP中实现图片的上传，上传的图片即时的显示在页面？*

 答：结合插件jquery,uploadify和ThinkPHP3.2所拥有的上传方法，实现图片上传，通过控制器方法传给页面js的data,拿到上传后图片数据，动态$(‘img’).attr(‘src’,data)，即可在页面显示出来。

- 如何在微信测试号中生成底部菜单？
答:这里使用的是方倍工作室的自定义生成菜单的网址：[http://www.fangbei.org/tool/menu](http://www.fangbei.org/tool/menu)

具体效果如下，填写测试号appid,appsecret,和要生成的菜单类型，地址啥的：

![](http://i1.piimg.com/567571/4212802f34ae9524.png)

此时查看微信测试号时，可以看到已经创建了菜单，并且因为设置的属性type为view,设置了url,即可以点击菜单按钮进行跳转：

![](http://i2.muimg.com/567571/0cd55bd86ad56692.png)


- *11、刚开始获取微信用户信息时，微信页面报错Scope无权限或者错误？*

答：原因是在一开始的微信测试号网页授权地址那里没有进行回调网址的修改，即这里：

![](http://i2.muimg.com/567571/536eb9c592921807.png)

![](http://i4.buimg.com/567571/90161cf354b15e75.png)


- *12、微信测试号如何获取用户的信息，并且拿到这些信息后，如何返回给页面上，页面可以渲染出这些数据呢？*

答：这里用到的框架是wechat-php-sdk。里面封装好了获取用户信息的类方法和自定义回复，验证token的php文件。是利用Oauth2.0网页授权拿到信息的。
OAuth允许用户提供一个令牌，而不是用户名和密码来访问他们存放在特定服务提供者的数据。每一个令牌授权一个特定的网站（例如，视频编辑网站)在特定的时段（例如，接下来的2小时内）内访问特定的资源（例如仅仅是某一相册中的视频）。这样，OAuth允许用户授权第三方网站访问他们存储在另外的服务提供者上的信息，而不需要分享他们的访问许可或他们数据的所有内容。

![](http://i2.muimg.com/567571/d981879f2b445aca.png)

为了更加方便的获取用户信息，查看结果如何，每次向微信测试号发送这样的信息：

    OAuth2.0网页授权演示 
	<a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx554d0f4040a39dc1&redirect_uri=http://wenwen1995.6655.la/wechatMall/Oauth/index&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect">点击这里体验</a>


此时微信界面上显示是这样的：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-4-25/30491457-file_1493099067437_13e23.png)

此时点击链接进去，如果获取到了用户信息，则会打印出所获得的信息：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-4-25/60535919-file_1493099105704_17b45.png)

反之，如果中间有错误的话，则要根据错误一遍遍的排查错误，找出错误原因，逐个解决。

下面就是如何将所获得信息通过一个控制器方法拿到，并赋值给模板变量，传递到页面中显示。
这里，运用到了**wechat-php-sdk**下的**Wxauth.class.php、wechat.class.php,TPWechat.class.php**文件，同时因为token,appid,appsecret获取信息一直都需要，

1. 所以首先把它们放在config.php中，通过C()方法进行获取。就像这样：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-4-25/25070492-file_1493099181836_798a.png)

2. 与此对应的文件放的位置在这里：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-4-25/25503346-file_1493099522058_a816.png)

**OauthController.class.php中代码如下，它的作用是实现点击底部菜单时，就静默获取到用户的信息，并把它存到一个session里**

    <?php
	// 实现获取到用户的openid
	namespace Home\Controller;
	use Think\Controller;
	use Home\Common\Wxauth;
	header('Content-type:text');

	class OauthController extends Controller {
    public function index(){
    	//获取config.php文件下的token,appid,appsecret信息
    	$options = array();
	  	$options['token'] = C('WECHAT_TOKEN');
	  	$options['appid'] = C('WECHAT_APPID');
	  	$options['appsecret'] = C('WECHAT_APPSECRET');

	  	//获取到用户的openid，和用户的具体信息
		$auth = new Wxauth($options);
		$open_id = $auth->open_id; //获得openid
		$userinfo = $auth->wxuser; //获得用户信息，是一个数组
		//对于用户昵称和省份中文乱码进行处理
		$username = preg_replace('/\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]/', '', $userinfo['nickname']);
		$location = preg_replace('/\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]/', '', $userinfo['location']);
	
		$userinfo['nickname'] = $username;
		$userinfo['location'] = $location;

		$openid = $open_id; //获取到用户的openid
		$nickname = $username; //微信昵称
		$sex = $userinfo['sex']; //微信性别
		$location = $userinfo['location']; //微信地点
		$avatar =  $userinfo['avatar']; //微信头像

		$user = M('user');
		$data['openid'] = $openid;
		$data['nickname'] = $nickname;
		$data['sex'] = $sex;
		$data['location'] = $location;
		$data['avatar'] = $avatar;

		//如果用户信息不存在,则插入数据库中
		if(!$user->where(array('openid'=>$openid))->find()){
			$user->data($data)->add();
		}else{ //如果存在的话，则取出将其置于session
			$me = $user->where(array('openid'=>$openid))->find();
			$data = array('status'=>1);
			$_SESSION['userinfo'] = $me;
		}

		$this->redirect('Index/index'); //重定向到主页
       }
	}


这里因为一开始点击就获取了用户信息，并且存到了session里，根据session的特性，所以在之后个人页面里，如果要将头型，性别，家乡之类的变量拿到，并通过模板输出，就直接从session中获取并赋值就好，如下：

**PersonController.class.php**
	<?php
	// 实现获取到用户的openid
	namespace Home\Controller;
	use Think\Controller;
	use Home\Common\Wxauth;
	header('Content-type:text');
	
	class PersonController extends Controller {
     public function index(){
		//点击商城菜单时已经将用户信息存入数据库和session中，这里模板变量直接从session中取得
		$nickname = $_SESSION['userinfo']['nickname']; //微信昵称
		$sex = $_SESSION['userinfo']['sex']; //微信性别
		$location = $_SESSION['userinfo']['location']; //微信地点
		$avatar = $_SESSION['userinfo']['avatar']; //微信头像

		//将得到的信息分别取出，赋值给模板变量
		$this->assign('nickname',$nickname);
		$this->assign('sex',$sex);
		$this->assign('location',$location);
		$this->assign('avatar',$avatar);

		$this->display();
      }
	}


`# 注意 #`：这里还改动了**wechat-php-sdk**下的**Wxauth.class.php、wechat.class.php,TPWechat.class.php**文件的部分内容

在Wxauth.class.php中，因为文件放的目录结构发生了变化，所以，在其头部加了2句代码，其次因为现在token,appid,appsecret定义在config.php里，所以参数是能被公共访问到的，将原来的private改为了public,如下图：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-4-25/82830688-file_1493100251894_183b8.png)

同理，因为这2个文件的目录结构发生了变化，
![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-4-25/87905984-file_1493100405436_175c8.png)

也在它们的头部加上这句

	namespace Home\Common;

- *13、添加地址时如果是重复的数据该如何处理？*

答：这个也弄了一上午终于解决了。试了ThinkPHP3.2关于插入记录时如果有重复的，进行覆盖的方法

    $this->add($data,array(),true);
  这个add方法里面第三个参数设为true后，**也不起作用！！**。
  
  果断寻找其他的方法。因为手机号是每个人唯一的，所以根据手机号来进行唯一性判断。即首先获取到当前用户对应的联系人收获地址的所有手机号，如果有多个的话是个数组。当然不论取得的数据是单个的还是个数据，都需要进行判断，即填写的手机号是否跟获取的数据中的某一个一致，如果一致，则进行update数据处理，反之则进行add插入数据处理。

- *14、原来处理的时候是点击个人时获取到openid,再得到用户的信息，当点击个人收获地址时获取唯一的openid，拿到对应的联系人收获地址，但这样的话，添加购物车后进行结算，下一步显示收货人地址，openid就拿不到了，如何处理？*

答：在页面一开始点击时获取openid，通过openid，将个人信息插入到user数据表中，同时将这份个人信息保存在session中，日后如果是同一个人登录的话，个人信息的获取直接从session中提取，而不用去数据库中查找比对，省时省力。这样，此时再点击购物车进行结算，获取收货人地址时也直接从session中寻找到openid，再查找对应的数据库记录就好。

- *15、后台管理模块中，ThinkPHP如何实现图片上传，保存在一个文件夹中，并将图片名称存放在数据库某张表中的某个字段？*

答：这里我是网上参考了好几个例子，最终完成的，好的例子可以参考这几个地址：

1、 [http://www.thinkphp.cn/topic/15565.html](http://www.thinkphp.cn/topic/15565.html)

2、 [http://www.thinkphp.cn/topic/4273.html](http://www.thinkphp.cn/topic/4273.html)

3、[http://www.thinkphp.cn/topic/27430.html](http://www.thinkphp.cn/topic/27430.html)

对应的目录结构是这样的：

![](https://wrapper-1258672812.cos.ap-chengdu.myqcloud.com/17-4-25/87604589-file_1493101624122_16df7.png)

PageController.class.php里有个为广告图上传**adUploadify方法**，

    //广告图像上传
    public function adUploadify()
    {
    	
        if (!empty($_FILES)) {
            //图片上传设置
            $fileName = date("Ymd")."_".mt_rand(); //文件保存名称是今天的日期_一个随机数
            $config = array(
                'maxSize'    =>    10145728, //文件上传最大的大小
                'savePath'   =>    '',  
                'saveName'   =>    $fileName,
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    false,
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
                $info=$images['Filedata']['savepath'].$images['Filedata']['savename'];
                //返回文件地址和名给JS作回调用
                echo $info;
            }
            else{
                $this->error($upload->getError());//获取失败信息
            }
        }
    }

**adPage方法**处理提交广告图信息表单到数据库表中：

    //添加广告图信息
    public function adPage(){
        if(!$_SESSION['admin_info']){
            $this->redirect('Index/index');//重定向到登录页面
            $this->display();
        }else{
        	if(IS_POST){ //post请求
        		$weixin_ad = M('weixin_ad');

        		$adName = I('post.adName');;
        		$adImg = I('post.hideImgSrc');
        		$desc1 =  I('post.desc1');
        		$desc2 =  I('post.desc2');
        		$selectOption =  intval(I('post.myselect'));
        		$gourl = I('post.gourl');

        		// $data['id'] = 0;
        		$data['name'] = $adName;
        		$data['ad_img'] = $adImg ;
        		$data['status'] = $selectOption;
        		$data['desc1'] = $desc1;
        		$data['desc2'] = $desc2;
        		$data['url'] = $gourl;


        		if($weixin_ad->data($data)->add() !== false){
        			//表示数据添加成功，则定向到首页欢迎界面
        			// dump($data);
        			$this->redirect('Page/welcome');
        		}
        	}
        }
        $this->display();
    }

View模块下的adPage.html（添加广告图信息）：

    <!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>后台管理之广告信息添加界面</title>
    <link href="__ROOT__/uploadify/uploadify.css" rel="stylesheet" />
    <link href="__css__/info.css" rel="stylesheet" />
	</head>
	<body>
	<p>{$_SESSION['admin_info']}</p>
    <div id="wrapper">
        <!-- 页面底部 -->
        <include file="./Public/common/page.html" />
        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <!-- 广告图管理 -->
                <div class="ad">
                    <div class="row" >
                        <div class="col-md-12">
                         <h2>广告图管理</h2>
                         <hr />
                        </div>
                    </div>
                    <!-- 广告图管理具体内容 -->
                    <div class="adManage col-md-12">
                        <form  method="post" id="adInfoForm" >
                            <div class="adInfo clearfix">
                                <p>广告图名称：</p>
                                <input type="text" name="adName" class="adName" id="adName" required>
                            </div>
                            <div class="adInfo clearfix">
                                <p>广告图图片：</p> 
                                <input id="file_upload" name="file_upload" type="file" multiple="true" value="" required />
                                <div class="view">
                                    <img class="img" id="img" src="http://www.thinkphp.cn/Public/new/img/header_logo.png"  />
                                </div>
                                <input name="hideImgSrc" id="hideImgSrc" value="" type="hidden">
                            </div>
                            <div class="adInfo clearfix">
                                <p>广告图描述1：</p>
                                <input type="text" name="desc1" class="desc1" id="desc1" required>
                            </div>
                            <div class="adInfo clearfix">
                                <p>广告图描述2：</p>
                                <input type="text" name="desc2" class="desc2" id="desc2" required>
                            </div>
                            <div class="adInfo clearfix">
                                <p>推荐状态：</p>
                                <select required id="myselect" name="myselect">
                                    <option value="2">选择状态</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="adInfo clearfix">
                                <p>图片跳转链接：</p>
                                <input type="text" name="gourl" class="gourl" id="gourl" required>
                            </div>
                            <input type="submit" class="submit" value="提交">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="__js__/lib/jquery.validate.min.js"></script>
    <script src="__ROOT__/uploadify/jquery.uploadify.min.js"></script>
    <script>
        var adurl = "{:U('Page/adPage')}";
        var root = '__ROOT__/';
        var adUpUrl = "{:U('Page/adUploadify')}";
    </script>
    <script src="__js__/base.js"></script>
    <script src="__js__/adPage.js"></script>
	</body>
	</html>

adPage.js代码：
    
	/*
    adPage.js
    by renwenji 
    2017/04/12
    功能：实现微信商城后台管理广告信息页面  */

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
            'swf': root + 'uploadify/uploadify.swf', //引入Uploadify核心flash文件
            'uploader' : adUpUrl, //PHP处理脚本地址
            'buttonText' : '选择图片上传',//选择文件提示文字
            'onUploadSuccess' : function(file, data, response) {
                console.log(data);//上传成功后，回调的data值
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

这里当然，也改动了下按钮样式，在页面引入原有的uploadify.css之后，在新的index.css里这样写：

    .uploadify:hover .uploadify-button{
		background:#0A91FF;
		color:#fff;
	}


以上就是做的过程中所出现的问题和解决方法，总结的差不多啦~

##  ##


## 系统还存在哪些缺陷及更好的解决方法？ ##

 1、关于图片上传时，数据库保存名称虽然实现了，但是名称保存方式是以日期+一个随机数实现的，没有做到图片名+日期+一个随机数实现。

  方案：应该要专门写一个方法，针对上传图片的名称进行处理。

 2、现在数据库全部商品的内容不是很多，页面没有一下子渲染很多数据，所以获得结果后没有进行分页处理。

  方案：如果后续数据多起来要进行分页处理。

 3、系统未做微信支付的处理，即没有支付订单等，分享到朋友圈等的功能也没有实现。

  方案：之后可以尝试做起来微信支付和分享到朋友圈。

 4、 系统在全部商品进行模糊查询搜索时，还存在问题，每次会搜到所有的商品。

  方案：进一步排查原因，进行解决。

 5、第一次进入商城时，整个页面渲染的速率还是有点慢的，要等待好几秒的时间才可以完全加载出来。
  
  方案：之后可以将这些图片资源，css，js资源托管到csdn平台上，或者对于图片进行懒加载或压缩处理，对于js等文件，如果功能确认无误后，也可进行对应的压缩处理，提升用户体验。

 6、管理员登录时，没有对密码进行md5等加密处理，安全性较差。



