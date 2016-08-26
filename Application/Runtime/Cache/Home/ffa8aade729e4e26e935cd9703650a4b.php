<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>购物车页面</title>
	<link rel="stylesheet" href="/shop/Public/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_gouwuche.css" type="text/css" />
    <script type="text/javascript" src="/shop/Public/js/jquery.js" ></script>
    <script type="text/javascript" src="/shop/Public/js/topNav.js" ></script>



</head>
<style type="text/css">
    .shop_bd_shdz_title{width:1000px; margin-top: 10px; height:50px; line-height: 50px; overflow: hidden; background-color:#F8F8F8;}
    .shop_bd_shdz_title h3{width:120px; text-align: center; height:40px; line-height: 40px; font-size: 14px; font-weight: bold;  background:#FFF; border:1px solid #E8E8E8; border-radius:4px 4px 0 0; float: left;  position: relative; top:10px; left:10px; border-bottom: none;}
    .shop_bd_shdz_title p{float: right;}
    .shop_bd_shdz_title p a{margin:0 8px; color:#555555;}

	.shop_bd_shdz_lists{width:1000px;}
	.shop_bd_shdz_lists ul{width:1000px;}
	.shop_bd_shdz_lists ul li{width:980px; border-radius: 3px; margin:5px 0; padding-left:18px; line-height: 40px; height:40px; border:1px solid #FFE580; background-color:#FFF5CC;}
	.shop_bd_shdz_lists ul li label{color:#626A73; font-weight: bold;}
	.shop_bd_shdz_lists ul li label span{padding:10px;}
	.shop_bd_shdz_lists ul li em{margin:0 4px; color:#626A73;}

	.shop_bd_shdz{width:1000px; margin:10px auto 0;}
	.shop_bd_shdz_new{border:1px solid #ccc; width:998px;}
	.shop_bd_shdz_new div.title{width:990px; padding-left:8px; line-height:35px; height:35px; border-bottom:1px solid #ccc; background-color:#F2F2F2; font-color:#656565; font-weight: bold; font-size:14px;}
	.shdz_new_form{width:980px; padding:9px;}
	.shdz_new_form ul{width:100%;}
	.shdz_new_form ul li{clear:both; width:100%; padding:5px 0; height:25px; line-height: 25px;}
	.shdz_new_form ul li label{float:left;width:100px; text-align: right; padding-right: 10px;}
	.shdz_new_form ul li label span{color:#f00; font-weight: bold; font-size:14px; position: relative; left:-3px; top:2px;}
    </style>

	<script type="text/javascript">
	jQuery(function(){
		jQuery("#new_add_shdz_btn").toggle(function(){
			jQuery("#new_add_shdz_contents").show(500);
		},function(){
			jQuery("#new_add_shdz_contents").hide(500);
		});
	});
	</script>
<body>
		<!-- Header  -wll-2013/03/24 -->
		<!-- Header  -wll-2013/03/24 -->
<div class="shop_hd">
	<!-- Header TopNav -->
	<div class="shop_hd_topNav">
		<div class="shop_hd_topNav_all">
			<!-- Header TopNav Left -->
			<div class="shop_hd_topNav_all_left">
				<p>您好，欢迎来到<b><a href="/shop/index.php/Home/Order/index">XXXX商城</a></b>
					<?php if($_SESSION['user']== null): ?>[<a href="/shop/index.php/Home/Login/index">登录</a>][<a href="/shop/index.php/Home/Register/index">注册</a>]
						<?php else: ?>
						[<a href=""><?php echo ($_SESSION['user']['user_name']); ?></a>]
						[<a href="/shop/index.php/Home/Order/logout">退出</a>]<?php endif; ?>

				</p>

			</div>
			<!-- Header TopNav Left End -->

			<!-- Header TopNav Right -->
			<div class="shop_hd_topNav_all_right">
				<ul class="topNav_quick_menu">

					<li>
						<div class="topNav_menu">
							<a href="/shop/index.php/Home/User/index" class="">个人主页</a>
							<a href="/shop/index.php/Home/User/index" class="">已买到的商品</a>
							<!-- <div class="topNav_menu_bd" style="display:none;" >
								<ul>
									<li><a title="已买到的商品" target="_top" href="#">已买到的商品</a></li>
									<li><a title="个人主页" target="_top" href="/shop/index.php/Home/User/index">个人主页</a></li>
								</ul>
							</div> -->
						</div>
					</li>

					<li>
						<div class="topNav_menu">
							<a href="#" class="topNavHover">购物车<b><?php  if ($_SESSION['user']['shopNumber'] == null){ echo "0"; } else { echo ($_SESSION['user']['shopNumber']); } ; ?></b>种商品<i>123</i></a>
							<div class="topNav_menu_bd" style="display:none;">
								
					            <ul>
					             <!-- <li><a href="<?php echo U('Goods/index/goods_id/');?> ><img src='#'  target='_top' ">商品1</a></li> --> 
					              <?php
 foreach($_SESSION['user']['shoppingCat'] as $value){ $output = "<li><a href='/shop/index.php/Home/Goods/index/id/".$value['goods_id']."' ><img src='/shop".$value['goods_img']."' width='50px' height='30px' target='_top'/>".$value['goods_name']."</a></li>"; echo $output; $total += $value['shop_price']; $flag = 1; } ?>
					            </ul>
					        <?php
 if ($flag != 1) { echo "<p>还没有商品，赶快去挑选！</p>"; } else { echo '总共'.$total.'元'; echo "<p><a href='/shop/index.php/Home/Order/index'>去结算</a></p>"; } ?>
					        
					    </div>
					</div>
				</li>

				<!-- <li>
					<div class="topNav_menu">
						<a href="#" class="topNavHover">我的收藏<i></i></a>
						<div class="topNav_menu_bd" style="display:none;">
							<ul>
								<li><a title="收藏的商品" target="_top" href="#">收藏的商品</a></li>
								<li><a title="收藏的店铺" target="_top" href="#">收藏的店铺</a></li>
							</ul>
						</div>
					</div>
				</li> -->

				<!-- <li>
					<div class="topNav_menu">
						<a href="#">站内消息</a>
					</div>
				</li> -->

			</ul>
		</div>
		<!-- Header TopNav Right End -->
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
<!-- Header TopNav End -->

<!-- TopHeader Center -->
<div class="shop_hd_header">
	<div class="shop_hd_header_logo"><h1 class="logo"><a href="/"><img src="/shop/Public/images//logo.png" alt="ShopCZ" /></a><span>ShopCZ</span></h1></div>
	<div class="shop_hd_header_search">
		<ul class="shop_hd_header_search_tab">
			<li id="search" class="current">商品</li>
		</ul>
		<div class="clear"></div>
		<div class="search_form">
		<form method="post" action="/shop/index.php/Home/Goods/search">
				<div class="search_formstyle">
					<input type="text" class="search_form_text" name="search_content"  placeholder="搜索其实很简单！" />
					<input type="submit" class="search_form_sub" name="secrch_submit" value="" title="搜索" />
				</div>
			</form>
		</div>
		<div class="clear"></div>
		<!-- <div class="search_tag">
			<a href="">李宁</a>
			<a href="">耐克</a>
			<a href="">Kappa</a>
			<a href="">双肩包</a>
			<a href="">手提包</a>
		</div> -->

	</div>
</div>
<div class="clear"></div>
<!-- TopHeader Center End -->

<!-- Header Menu -->
<div class="shop_hd_menu">
	<!-- 所有商品菜单 -->

	<div class="shop_hd_menu_all_category <?php if(($index) == "true"): ?>shop_hd_menu_hover<?php endif; ?>" <?php if(($index) != "true"): ?>id="shop_hd_menu_all_category"<?php endif; ?>><!-- 首页去掉 id="shop_hd_menu_all_category" 加上clsss shop_hd_menu_hover -->
		<div class="shop_hd_menu_all_category_title"><h2 title="所有商品分类"><a href="javascript:void(0);">所有商品分类</a></h2><i></i></div>
		<div id="shop_hd_menu_all_category_hd" class="shop_hd_menu_all_category_hd">
			<ul class="shop_hd_menu_all_category_hd_menu clearfix">
				<!-- 单个菜单项 -->
				<?php if(is_array($cats)): $k = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k < 8): ?><li id="cat_1" class="">
							<h3><a href="/shop/index.php/Home/Category/index/id/<?php echo ($vo["cat_id"]); ?>" title="<?php echo ($vo["cat_name"]); ?>"><?php echo ($vo["cat_name"]); ?></a></h3>

							<div id="cat_1_menu" class="cat_menu clearfix" style="">
								<?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><dl class="clearfix">
										<dt><a href="/shop/index.php/Home/Category/index/id/<?php echo ($vo1["cat_id"]); ?>"><?php echo ($vo1["cat_name"]); ?></a></dt>
										<dd>
											<?php if(is_array($vo1["child"])): $i = 0; $__LIST__ = $vo1["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><a href="/shop/index.php/Home/Category/index/id/<?php echo ($vo2["cat_id"]); ?>"><?php echo ($vo2["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
										</dd>
									</dl><?php endforeach; endif; else: echo "" ;endif; ?>                                                     
							</div>

						</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				<!-- 单个菜单项 End -->

				<li class="more"><a href="">查看更多分类</a></li>
			</ul>
		</div>
	</div>
	<!-- 所有商品菜单 END -->

	<!-- 普通导航菜单 -->
	<ul class="shop_hd_menu_nav">
		<li class="current_link"><a href="/shop/index.php/Home/index/index"><span>首页</span></a></li>
		<li class="link"><a href=""><span>团购</span></a></li>
		<li class="link"><a href=""><span>品牌</span></a></li>
		<li class="link"><a href=""><span>优惠卷</span></a></li>
		<li class="link"><a href=""><span>积分中心</span></a></li>
		<li class="link"><a href=""><span>运动专场</span></a></li>
		<li class="link"><a href=""><span>微商城</span></a></li>
	</ul>
	<!-- 普通导航菜单 End -->
</div>
<!-- Header Menu End -->



</div>
<div class="clear"></div>
<!-- Header End -->
		<!-- end -->
	
	<div class="clear"></div>
	<!-- 面包屑 注意首页没有 -->
	<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="">首页</a>&nbsp;›&nbsp;
			<a href="">我的商城</a>&nbsp;›&nbsp;
			<a href="">我的购物车</a>
		</span>
	</div>
	<div class="clear"></div>
	<!-- 面包屑 End -->

	<!-- Header End -->
	
	<!-- 购物车 Body -->
	<div class="shop_gwc_bd clearfix" id="checkOrder" style="display: block">
		<!-- 在具体实现的时候，根据情况选择其中一种情况 -->
		<!-- 购物车为空 -->
		<?php if($_SESSION['user']['shopNumber'] == null): ?><div class="empty_cart mb10">
				<div class="message">
					<p>购物车内暂时没有商品，您可以<a href="index.html">去首页</a>挑选喜欢的商品</p>
				</div>
			</div><?php endif; ?>
		<!-- 购物车为空 end-->
		
		<!-- 购物车有商品 -->
		<div class="shop_gwc_bd_contents clearfix">
			<!-- 购物流程导航 -->
			<div class="shop_gwc_bd_contents_lc clearfix">
				<ul>
					<li class="step_a">确认购物清单</li>
					<li class="step_b">确认收货人资料及送货方式</li>
					<li class="step_c">购买完成</li>
				</ul>
			</div>
			<!-- 购物流程导航 End -->

			<!-- 购物车列表 -->
			<table>
				<thead>
					<tr>
						<th colspan="2"><span>商品</span></th>
						<th><span>单价(元)</span></th>
						<th><span>数量</span></th>
						<th><span>小计</span></th>
						<th><span>操作</span></th>
					</tr>
				</thead>
				<tbody>
					<!-- 循环 start -->
					<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td class="gwc_list_pic"><a href=""><img style="width: 50%" src="/shop<?php echo ($vo["goods_img"]); ?>" /></a></td>

						<td class="gwc_list_title"><a href="/shop/index.php/Home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>"><?php echo ($vo["goods_name"]); ?></a></td>

						<td class="gwc_list_danjia"><span>￥<strong id="danjia_001"><?php echo ($vo["shop_price"]); ?></strong></span></td>
						<td class="gwc_list_shuliang"><span>
							<a href="/shop/index.php/Home/Order/index/sub/<?php echo ($vo["goods_id"]); ?>">-</a>
							<input type="text" value="<?php echo ($vo["goods_nums"]); ?>"  name="goods_nums"/>
							<a href="/shop/index.php/Home/Order/index/add/<?php echo ($vo["goods_id"]); ?>" >+</a>
						</span></td>

						<td class="gwc_list_xiaoji"><span>￥<strong id="xiaoji_001" class="good_xiaojis"><?php echo ($vo["total"]); ?></strong></span></td>

						<td class="gwc_list_caozuo">
							<a href="">收藏</a>
							<a href="/shop/index.php/Home/Order/delete/id/<?php echo ($vo["goods_id"]); ?>">删除</a>
						</td>

					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<!-- end -->
				</tbody>
				<tfoot>
					<tr>
						<td colspan="6">
							<div class="gwc_foot_zongjia">商品总价(不含运费)<span>￥<strong ><?php echo ($totalAll); ?></strong></span></div>

							<div class="clear"></div>
							<div class="gwc_foot_links">
								<a href="/shop/index.php/Home/Index/index" class="go">继续购物</a>
								<a href="" class="op" id ="checkOrderButton">确认并填写订单</a>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
			<!-- 购物车列表 End -->
		</div>
		<!-- 购物车有商品 end -->
	</div>
	<!-- 购物车 Body End -->
	<div class="shop_gwc_bd clearfix" id="checkAddress" style="display: none">
		<div class="shop_gwc_bd_contents clearfix">

			<!-- 购物流程导航 -->
			<div class="shop_gwc_bd_contents_lc clearfix">
				<ul>
					<li class="step_a">确认购物清单</li>
					<li class="step_b hover_b">确认收货人资料及送货方式</li>
					<li class="step_c">购买完成</li>
				</ul>
			</div>
			<!-- 购物流程导航 End -->
			<div class="clear"></div>
			<!-- 收货地址 title -->
			<div class="shop_bd_shdz_title">
				<h3>收货人地址</h3>
				<p><!-- <a href="/shop/index.php/Home/Address/Add" id="new_add_shdz_btn">新增收货地址</a> --><a href="/shop/index.php/Home/Address/index">管理收货地址</a></p>
			</div>
			<div class="clear"></div>
			<!-- 收货人地址 Title End -->
			<div class="shop_bd_shdz clearfix">
				<div class="shop_bd_shdz_lists clearfix">
				<form action="/shop/index.php/Home/Order/checkout" method="post">
					<ul>
						<?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><label><span><input type="radio" name="address" value="<?php echo ($vo["address_id"]); ?>"/></span></label><em><?php echo ($vo["province"]); ?></em><em><?php echo ($vo["city"]); ?></em><em><?php echo ($vo["district"]); ?></em><em><?php echo ($vo["street"]); ?></em><em><?php echo ($vo["consignee"]); ?>(收)</em><em><?php echo ($vo["mobile"]); ?></em></li><?php endforeach; endif; else: echo "" ;endif; ?>				
					</ul>
				</div>
			</div>
			<div class="clear"></div>
			<!-- 购物车列表 -->
			<div class="shop_bd_shdz_title">
				<h3>确认购物清单</h3>
			</div>
			<div class="clear"></div>
			<table>
				<thead>
					<tr>
						<th colspan="2"><span>商品</span></th>
						<th><span>单价(元)</span></th>
						<th><span>数量</span></th>
						<th><span>小计</span></th>
						<th><span>操作</span></th>
					</tr>
				</thead>
				<tbody>
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td class="gwc_list_pic"><a href=""><img src="/shop<?php echo ($vo["goods_img"]); ?>" /></a></td>

						<td class="gwc_list_title"><a href="/shop/index.php/Home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>"><?php echo ($vo["goods_name"]); ?></a></td>

						<td class="gwc_list_danjia"><span>￥<strong id="danjia_001"><?php echo ($vo["shop_price"]); ?></strong></span></td>
						<td class="gwc_list_shuliang"><span>
							<a href="/shop/index.php/Home/Order/index/sub/<?php echo ($vo["goods_id"]); ?>">-</a>
							<input type="text" value="<?php echo ($vo["goods_nums"]); ?>"  name="goods_nums"/>
							<a href="/shop/index.php/Home/Order/index/add/<?php echo ($vo["goods_id"]); ?>" >+</a>
						</span></td>

						<td class="gwc_list_xiaoji"><span>￥<strong id="xiaoji_001" class="good_xiaojis"><?php echo ($vo["total"]); ?></strong></span></td>

						<td class="gwc_list_caozuo">
							<a href="">收藏</a>
							<a href="/shop/index.php/Home/Order/delete/id/<?php echo ($vo["goods_id"]); ?>">删除</a>
						</td>

					</tr><?php endforeach; endif; else: echo "" ;endif; ?>	


								
				</tbody>
				<tfoot>
				<tr>
						<td colspan="6">
							<div class="gwc_foot_zongjia">商品总价(不含运费)<span>￥<strong ><?php echo ($totalAll); ?></strong></span></div>
							<div class="clear"></div>
							<div class="gwc_foot_links">
								<a href="/shop/index.php/Home/Index/index" class="go">继续购物</a>
								<input type="hidden" name="totalAll" value="<?php echo ($totalAll); ?>"/>
								<input type="submit" value="确认生成订单" class="op">
							</div>
						</td>
					</tr>	
				</tfoot>
			</table>
			</form>
			<!-- 购物车列表 End -->

		</div>
	</div>
	<!-- 购物车 Body End -->

	<!-- Footer - wll - 2013/3/24 -->
	<!-- Footer - wll - 2013/3/24 -->
	<div class="clear"></div>
	<div class="shop_footer">
            <div class="shop_footer_link">
                <p>
                    <a href="/shop/index.php/Home/Index/index">首页</a>|
                    <a href="">招聘英才</a>|
                    <a href="">广告合作</a>|
                    <a href="">关于我们</a>
                </p>
            </div>
            <div class="shop_footer_copy">
               <p>Copyright MyShop,All rights reserved.</p>
            </div>
        </div>
	<!-- Footer End -->
	<!-- Footer End -->

</body>
<script type="text/javascript">
	 
	$('#checkOrderButton').click(function(){
		document.getElementById('checkOrder').style.display = 'none';
		document.getElementById('checkAddress').style.display = "block";

		return false;
		
	});
	$("#province").change(function(){
		var province = this.value;
		$.ajax({
			type     : 'GET',
			url      : '/shop/index.php/Home/Address/choose',
			data     : "parent_id="+province,
			dataType : 'html',
			success  : function (msg) {

				$('#city').html(msg);
				
			} ,
			error    : function() {
				alert("出错1");
			}

		})
	});
	$('#city').change(function(){
		var city = this.value;
		
		$.ajax({
			type     :  'get',
			url      :   '/shop/index.php/Home/Address/choose',
			data     :  "parent_id="+city,
			dataType :  'html',
			success  : function (msg) {

				$('#district').html(msg);
				
			},
			error    : function () {
				alert("Ajax出错2");
			}

		})
	});
	$("#submit").click(function(){
		
		if (document.getElementById('consignee').value == " " ) {
			alert("请填写收货人姓名");
			return false;
		}

		if (document.getElementById('province').value =='-1' || document.getElementById('city').value =='-1'
			|| document.getElementById('district').value =='-1') {
			alert("请先选择地区");
			return false;
		} else {
			return  true;
		}

		if (document.getElementById('street').value == " ") {
			alert("请填写地址的详细信息");
			return  false;
		}
	});
	
	</script>

</html>