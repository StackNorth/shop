<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>myshop</title>
    <link rel="stylesheet"  type="text/css" href="<?php echo (ADMIN_PUBLIC); ?>/styles/bootstrap.min.css">

    <link rel="stylesheet"  type="text/css" href="<?php echo (ADMIN_PUBLIC); ?>/styles/swiper.min.css">

    

    <link rel="stylesheet" href="<?php echo (ADMIN_PUBLIC); ?>/styles/main.css">
    
	<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery-3.1.0.min.js"></script>

	<script src="<?php echo (ADMIN_PUBLIC); ?>/js/bootstrap.min.js"></script>

	<script src="<?php echo (ADMIN_PUBLIC); ?>/js/main.js"></script>

    <script src="<?php echo (ADMIN_PUBLIC); ?>/js/swiper.min.js"></script>


</head>
</head>
<body>
    <!-- top start-->
      <div class="navbar navbar-inverse navbar-fixed-top head" role="navigation" >
        <div class="navbar-header">
            　<!-- .navbar-toggle样式用于toggle收缩的内容，即nav-collapse collapse样式所在元素 -->
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- 确保无论是宽屏还是窄屏，navbar-brand都显示 -->
            <a href="##" class="navbar-brand">mys<i class="iconfont" style="#000;font-size: 24px;">&#xe601;</i>op</a>
        </div>
        <!-- 屏幕宽度小于768px时，div.navbar-responsive-collapse容器里的内容都会隐藏，显示icon-bar图标，当点击icon-bar图标时，再展开。屏幕大于768px时，默认显示。 -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav pull-right">
                <li ><a href="javascript:window.top.frames['main-frame'].document.location.reload();window.top.frames['header-frame'].document.location.reload()">刷新&nbsp;<i class="iconfont">&#xe665;</i></a></li>
                <li><a href="#">管理员&nbsp;<i class="iconfont">&#xf003f;</i></a></li>
                <li><a href="#">帮助&nbsp;<i class="iconfont">&#xf0012;</i></a></li>
                <li><a href="/shop/index.php/Admin/Index/clearCache" target="main-frame" class="fix-submenu">清除缓存</a></li>
            </ul>
        </div>
    </div>

<!--    content-->

    <div class="main-container">
        
        <!-- left Menu  start -->
        <div class="container-sidebar navbar-collapse">
            <div class="menu">
                <strong>菜单&nbsp;<i class="iconfont">&#x343c;</i></strong>
                <div id="type" data-type="off">
                    <strong > <i class="iconfont">&#xe66b;</i> </strong>
                </div>
            </div>

            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <?php if(is_array($menu)): foreach($menu as $key=>$vo): ?><!-- for start -->
                        <?php if($vo["level"] == 0): ?><div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo ($vo["menu_class"]); ?>">
                                        <span><?php echo ($vo["menu_name"]); ?>&nbsp;</span><i class="iconfont"><?php echo ($vo["menu_icon"]); ?></i>
                                    </a>
                                </h4>
                            </div>
                            
                          
                            <div id="<?php echo ($vo["menu_class"]); ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="list-group">
                                    <?php if(is_array($menu)): foreach($menu as $key=>$vo1): if(($vo["menu_id"] == $vo1["menu_parent_id"] ) AND ($vo1["level"] == 1) ): ?><a href="<?php echo ($vo1["menu_url"]); ?>"><li class="<?php echo ($vo1["menu_class"]); ?>"><?php echo ($vo1["menu_name"]); ?></li></a><?php endif; endforeach; endif; ?>
                                    </ul>
                                </div>
                            </div><?php endif; endforeach; endif; ?>
                    <!-- end -->
                </div>
            </div>
</div>
        <!-- end -->

        <div class="main-content">

            <div class="container-fluid">

               <div class="row-fluid">
                    <div class="content" style="margin-left: 0;">
                        <div class="row-fluid">
                          <!-- start -->
                            <div class="modal-title">
                                后台管理
                            </div>
                            <!--面包屑 导航栏 -->
                            <div class="navbar-default">
                                <ul class="breadcrumb">
                                    <li>
                                        <a href="#"><i class="iconfont">&#xe604;</i>首页</a>
                                    </li>
                                    <!-- <li>
                                        <span class="divider"></span>
                                        <a href="#">XXX</a>
                                    </li> -->
                                </ul>
                            </div>
              <!-- end -->
                            <div>
                            

                        <form enctype="multipart/form-data" action="" method="post" name="theForm"> 
                                <!-- Nav tabs -->

                                <ul class="nav nav-tabs" role="tablist" style="height: 50px; ">
                                    <li  class="active"><a href="#g-info" aria-controls="g-info" data-toggle="tab">通用信息</a>
                                    <li><a href="#detail" aria-controls="detail" data-toggle="tab">详细描述</a>
                                    <li><a href="#other-info" aria-controls="other-info" data-toggle="tab">其他信息</a>
                                    <li><a href="#attribute" aria-controls="attribute" data-toggle="tab">商品属性</a>
                                    <!-- <li><a href="#photo" aria-controls="photo" data-toggle="tab">商品相册</a> -->
                                </ul>


                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="g-info">
                                        <table class="table table-bordered table-hover">
                                          <tbody>
                                            <tr>
                                                <td  >商品名称：</td>
                                                <td><input type="text" name="goods_name"  size="30"><span class="require-field">*</span></td>
                                            </tr>
                                            <tr>
                                                <td  >商品货号： </td>
                                                <td><input type="text" name="goods_sn"  size="20" onblur="checkGoodsSn(this.value,'32')"><span id="goods_sn_notice"></span><br>
                                                    <span class="notice-span" style="display:block" id="noticeGoodsSN">如果您不输入商品货号，系统将自动生成一个唯一的货号。</span></td>
                                                </tr>
                                                <tr>
                                                    <td  >商品分类：</td>
                                                    <td>
                                                        <select name="cat_id" onchange="hideCatDiv()">
                                                            <option value="0">请选择...</option>
                                                            <?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cat_id"]); ?>">
                                                                    <?php echo (str_repeat("&nbsp;&nbsp;",$vo["level"])); ?>
                                                                    <?php echo ($vo["cat_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td  >商品品牌：</td>
                                                        <td>
                                                            <select name="brand_id" onchange="hideBrandDiv()">
                                                                <option value="0">请选择...</option>
                                                                <?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["brand_id"]); ?>"><?php echo ($vo["brand_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td  >选择供货商：</td>
                                                        <td>
                                                            <select name="suppliers_id" id="suppliers_id">
                                                                <option value="0">不指定供货商属于本店商品</option>
                                                                <option value="1">北京供货商</option>
                                                                <option value="2">上海供货商</option>      
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td  >本店售价：</td>
                                                        <td><input type="text" name="shop_price" value="3010.00" size="20" onblur="priceSetted()">
                                                            <input type="button" value="按市场价计算" onclick="marketPriceSetted()">
                                                            <span class="require-field">*</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td  >会员价格：</td>
                                                            <td><input type="text" name="user_price" value="3010.00" size="20" onblur="priceSetted()"></td>
                                                        </tr>

                                                        <tr>
                                                            <td  >市场售价：</td>
                                                            <td><input type="text" name="market_price" value="3612.00" size="20">
                                                              <input type="button" value="取整数" onclick="integral_market_price()">
                                                          </td>
                                                      </tr>

                                                      <tr>
                                                        <td  ><label for="is_promote"><input type="checkbox" id="is_promote" name="is_promote" value="1" checked="checked" onclick="handlePromote(this.checked);"> 促销价：</label></td>
                                                        <td id="promote_3"><input type="text" id="promote_1" name="promote_price" value="2750.00" size="20"></td>
                                                    </tr>
                                                    <tr id="promote_4">
                                                        <td   id="promote_5">促销日期：</td>
                                                        <td id="promote_6">
                                                          <input name="promote_start_time" type="text" id="promote_start_date" size="12" value="2009-06-01" readonly="readonly"><input name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('promote_start_date', '%Y-%m-%d', false, false, 'selbtn1');" value="选择" class="button"> - <input name="promote_end_time" type="text" id="promote_end_date" size="12" value="2014-11-30" readonly="readonly"><input name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('promote_end_date', '%Y-%m-%d', false, false, 'selbtn2');" value="选择" class="button">
                                                      </td>
                                                  </tr>
                                                  <tr>
                                                    <td  >上传商品图片：</td>
                                                    <td>
                                                      <input type="file" name="goods_img" size="35">
                                                      <a href="goods.php?act=show_image&amp;img_url=<?php echo (ADMIN_PUBLIC); ?>//<?php echo (ADMIN_PUBLIC); ?>//images/200905/goods_img/32_G_1242110760868.jpg" target="_blank"><img src="<?php echo (ADMIN_PUBLIC); ?>//<?php echo (ADMIN_PUBLIC); ?>//images/yes.gif" border="0"></a>
                                                      <br><input type="text" size="40" value="商品图片外部URL" style="color:#aaa;" onfocus="if (this.value == '商品图片外部URL'){this.value='http://';this.style.color='#000';}" name="goods_img_url">
                                                  </td>
                                              </tr>
                                              <tr id="auto_thumb_1">
                                                <td  > 上传商品缩略图：</td>
                                                <td id="auto_thumb_3">
                                                  <input type="file" name="goods_thumbs[]" size="35" multiple>
                                                  <a href="goods.php?act=show_image&amp;img_url=<?php echo (ADMIN_PUBLIC); ?>//<?php echo (ADMIN_PUBLIC); ?>//images/200905/thumb_img/32_thumb_G_1242110760196.jpg" target="_blank"><img src="<?php echo (ADMIN_PUBLIC); ?>//<?php echo (ADMIN_PUBLIC); ?>//images/yes.gif" border="0"></a>
                                                  <br><input type="text" size="40" value="商品缩略图外部URL" style="color:#aaa;" onfocus="if (this.value == '商品缩略图外部URL'){this.value='http://';this.style.color='#000';}" name="goods_thumb_url" disabled="">
                                                  <br><label for="auto_thumb"><input type="checkbox" id="auto_thumb" name="auto_thumb" checked="true" value="1" onclick="handleAutoThumb(this.checked)">自动生成商品缩略图</label>            </td>
                                              </tr>
                                          </tbody></table>
                                    </div>
                                    <div class="tab-pane" id="detail">
                                    <!-- 详细描述 start -->
                                    <table class="table table-bordered table-hover"
                                    >
                                      <tbody><tr>
                                        <td><input type="hidden" id="goods_desc" name="goods_desc" value="" style="display:none"><input type="hidden" id="goods_desc___Config" value="" style="display:none"><iframe id="goods_desc___Frame" src="<?php echo (ADMIN_PUBLIC); ?>/fckeditor/editor/fckeditor.html?InstanceName=goods_desc&amp;Toolbar=Normal" width="100%" height="320" frameborder="0" scrolling="no" style="margin: 0px; padding: 0px; border: 0px; background-color: transparent; background-image: none; width: 100%; height: 320px;"></iframe></td>
                                    </tr>
                                </tbody></table>





                                    </div>
                                    <div class="tab-pane" id="other-info">
                                    <!-- 其他信息 start-->
                                        <!-- 其他信息 -->
                                <table class="table table-bordered table-hover">
                                    <tbody><tr>
                                        <td  >商品重量：</td>
                                        <td><input type="text" name="goods_weight" value="" size="20"> <select name="weight_unit"><option value="1">千克</option><option value="0.001" selected="">克</option></select></td>
                                    </tr>
                                    <tr>
                                        <td  ><a href="javascript:showNotice('noticeStorage');" title="点击此处查看提示信息"><img src="<?php echo (ADMIN_PUBLIC); ?>//<?php echo (ADMIN_PUBLIC); ?>//images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 商品库存数量：</td>
                                        <!--            <td><input type="text" name="goods_number" value="4" size="20" readonly="readonly" /><br />-->
                                        <td><input type="text" name="goods_number" value="4" size="20"><br>
                                            <span class="notice-span" style="display:block" id="noticeStorage">库存在商品为虚货或商品存在货品时为不可编辑状态，库存数值取决于其虚货数量或货品数量</span></td>
                                        </tr>
                                        <tr>
                                            <td  >库存警告数量：</td>
                                            <td><input type="text" name="warn_number" value="1" size="20"></td>
                                        </tr>
                                        <tr>
                                            <td  >加入推荐：</td>
                                            <td><input type="checkbox" name="is_best" value="1" checked="checked">精品 <input type="checkbox" name="is_new" value="1" checked="checked">新品 <input type="checkbox" name="is_hot" value="1" checked="checked">热销</td>
                                        </tr>
                                        <tr id="alone_sale_1">
                                            <td   id="alone_sale_2">上架：</td>
                                            <td id="alone_sale_3"><input type="checkbox" name="is_onsale" value="1" checked="checked"> 打勾表示允许销售，否则不允许销售。</td>
                                        </tr>
                                        <tr>
                                            <td  >能作为普通商品销售：</td>
                                            <td><input type="checkbox" name="is_alone_sale" value="1" checked="checked"> 打勾表示能作为普通商品销售，否则只能作为配件或赠品销售。</td>
                                        </tr>
                                        <tr>
                                            <td  >是否为免运费商品</td>
                                            <td><input type="checkbox" name="is_shipping" value="1"> 打勾表示此商品不会产生运费花销，否则按照正常运费计算。</td>
                                        </tr>
                                        <tr>
                                            <td  >商品关键词：</td>
                                            <td><input type="text" name="keywords" value="2008年10月 GSM,850,900,1800,1900 黑色" size="40"> 用空格分隔</td>
                                        </tr>
                                        <tr>
                                            <td  >商品简单描述：</td>
                                            <td><textarea name="goods_brief" cols="40" rows="3"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td  >
                                                <a href="javascript:showNotice('noticeSellerNote');" title="点击此处查看提示信息"><img src="<?php echo (ADMIN_PUBLIC); ?>//<?php echo (ADMIN_PUBLIC); ?>//images/notice.gif" width="16" height="16" border="0" alt="点击此处查看提示信息"></a> 商家备注： </td>
                                                <td><textarea name="seller_note" cols="40" rows="3"></textarea><br>
                                                    <span class="notice-span" style="display:block" id="noticeSellerNote">仅供商家自己看的信息</span></td>
                                                </tr>
                                            </tbody></table>  
                                    </div>
                                    <div class="tab-pane" id="attribute">
                                    <!-- 商品属性start -->
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                            <td >商品类型：</td>
                                                <td>
                                                    <select name="type_id" id="sw_type">
                                                        <option value="0">请选择商品类型</option>
                                                        <?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["type_id"]); ?>"><?php echo ($vo["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>            
                                                    </select><br>
                                                    <span class="notice-span" style="display:block" id="noticeGoodsType">请选择商品的所属类型，进而完善此商品的属性</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="tbody-goodsAttr" colspan="2" style="padding:0">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>




                                    </div>
                                   <!--  <div class="tab-pane" id="photo">
                                                                      ..商品相册. start
                                   </div> -->

                                </div>
                                <div style="float:center">
                                  <input type="hidden" name="goods_id" value="32">
                                  <input type="submit" value=" 确定 " class="button">
                                  <input type="reset" value=" 重置 " class="button">
                                  <input type="hidden" name="act" value="update">
                                </div>
                            </div>
                           </form>
                          
              <!-- list start -->
                            
                            <!-- end -->
                        </div>
                    </div>
               </div>

            </div>

        </div>

    </div>



    <!-- footer start -->
    <div class="footer">
        <div>
            Copyright © 2016 imooc.com All Rights Reserved | 京ICP备 13046642号-2
        </div>
    </div>
  <!-- end -->

</body>


<script type="text/javascript">
	function addImg(obj){
      var src  = obj.parentNode.parentNode;
      var idx  = rowindex(src);
      var tbl  = document.getElementById('gallery-table');
      var row  = tbl.insertRow(idx + 1);
      var cell = row.insertCell(-1);
      cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addImg)(.*)(\[)(\+)/i, "$1removeImg$3$4-");
  	}

    function removeImg(obj){
      var row = rowindex(obj.parentNode.parentNode);
      var tbl = document.getElementById('gallery-table');
      tbl.deleteRow(row);
  	}

   	function dropImg(imgId){
    	Ajax.call('goods.php?is_ajax=1&act=drop_image', "img_id="+imgId, dropImgResponse, "GET", "JSON");
  	}

  	function dropImgResponse(result){
      if (result.error == 0){
          document.getElementById('gallery_' + result.content).style.display = 'none';
      }
  	}

</script>

<script type="text/javascript">
//jq方法获取id为sw_type的值,然后使用ajax动态获取
	$("#sw_type").change(function(){
    var type_id = this.value;
		$.ajax({
			type : "GET",//传输方式
			url : "/shop/index.php/Admin/Attribute/getAttrs",//路径，此控制器下的模型attribute的getAttrs方法方法
			data : "type_id="+type_id,//传输的数据
			dataType : 'html',//传输类型
			//成功后加载id为tbody-goodsAttr的框架中
			success : function(msg){
          
        		$("#tbody-goodsAttr").html(msg); 
			},
			 error : function(){alert('出错');}
			})
     
   
  });
    
</script>
</body>
</html>