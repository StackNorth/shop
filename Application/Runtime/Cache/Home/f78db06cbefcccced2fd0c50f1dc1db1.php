<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="/shop/Public/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_manager.css" type="text/css" />
    <script type="text/javascript" src="/shop/Public/js/jquery.js" ></script>
    <script type="text/javascript" src="/shop/Public/js/topNav.js" ></script>
</head>
<body>
	<!-- Header  -wll-2013/03/24 -->
<div class="shop_hd">
	<!-- Header TopNav -->
	<div class="shop_hd_topNav">
		<div class="shop_hd_topNav_all">
			<!-- Header TopNav Left -->
			<div class="shop_hd_topNav_all_left">
				<p>您好，欢迎来到<b><a href="/shop/index.php/Home/Index/index">XXXX商城</a></b>
					<?php if($_SESSION['user']== null): ?>[<a href="/shop/index.php/Home/Login/index">登录</a>][<a href="/shop/index.php/Home/Register/index">注册</a>]
						<?php else: ?>
						[<a href=""><?php echo ($_SESSION['user']['user_name']); ?></a>]
						[<a href="/shop/index.php/Home/User/logout">退出</a>]<?php endif; ?>

				</p>

			</div>
			<!-- Header TopNav Left End -->

			<!-- Header TopNav Right -->
			<div class="shop_hd_topNav_all_right">
				<ul class="topNav_quick_menu">

					<li>
						<div class="topNav_menu">
							<a href="/shop/index.php/Home/User/index" class="">个人主页</a>
							<a href="/shop/index.php/Home/User/purchase" class="">已买到的商品</a>
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
	<div class="shop_hd_header_logo"><h1 class="logo"><a href="<?php echo U(Index/index);?>"><img src="/shop/Public/images//logo.png" alt="ShopCZ" /></a><span>ShopCZ</span></h1></div>
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
	<!-- 面包屑 注意首页没有 -->
	<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="">首页</a>&nbsp;›&nbsp;
			<a href="">我的商城</a>&nbsp;›&nbsp;
			<a href="">已买到商品</a>
		</span>
	</div>
	<div class="clear"></div>
	<!-- 面包屑 End -->

	<!-- Header End -->	

	<!-- 我的个人中心 -->
	<div class="shop_member_bd clearfix">
		<!-- 左边导航 -->
		<!-- 左边导航 -->
		<div class="shop_member_bd_left clearfix">
			
			<div class="shop_member_bd_left_pic">
				<a href="javascript:void(0);"><img src="/shop/Public/images/avatar.png" /></a>
			</div>
			<div class="clear"></div>
			<dl>
				<dt>我的账户</dt>
				<dd><span><a href="/shop/index.php/Home/User/index">个人资料</a></span></dd>
				<dd><span><a href="/shop/index.php/Home/User/password">密码修改</a></span></dd>
				<dd><span><a href="/shop/index.php/Home/Address/index">收货地址</a></span></dd>
			</dl>
			<dl>
				<dt>我的交易</dt>
				<dd><span><a href="/shop/index.php/Home/User/purchase">已购买商品</a></span></dd>
				<dd><span><a href="">我的收藏</a></span></dd>
				<dd><span><a href="">评价管理</a></span></dd>
			</dl>

			

		</div>
		<!-- 左边导航 End -->
		<!-- 左边导航 End -->
		
		<!-- 右边购物列表 -->
		<div class="shop_member_bd_right clearfix">
			
			<div class="shop_meber_bd_good_lists clearfix">
				<div class="title"><h3>订单列表</h3></div>
				<table>
					<thead class="tab_title">
						<th style="width:410px;"><span>商品信息</span></th>
						<th style="width:100px;"><span>单价</span></th>
						<th style="width:80px;"><span>数量</span></th>
						<th style="width:100px;"><span>订单总价</span></th>
						<th style="width:115px;"><span>状态与操作</span></th>
					</thead>
					<tbody>
						<?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td colspan="5">
									<table class="good">
										<thead >
											<tr><th colspan="6">
												<span><strong>订单号码：</strong><?php echo ($vo["order_sn"]); ?></span>
											</th></tr>
										</thead>
										<tbody>
											<tr>
												<td class="dingdan_pic"><img src="/shop<?php echo ($vo["goods_img"]); ?>" /></td>
												<td class="dingdan_title"><span><a href="/shop/index.php/Home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>"><?php echo ($vo["goods_name"]); ?></a></span><br /><!-- 鞋码:37 颜色:黑色  --></td>
												<td class="dingdan_danjia">￥<strong><?php echo ($vo["shop_price"]); ?></strong></td>
												<td class="dingdan_shuliang"><?php echo ($vo["goods_number"]); ?></td>
												<td class="dingdan_zongjia">￥<strong><?php echo ($vo["subtotal"]); ?></strong><br />(免运费)</td>
												<td class="digndan_caozuo"><a href=""><?php echo ($vo["pay"]); ?>|<?php echo ($vo["order_status"]); ?></a></td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- 右边购物列表 End -->

	</div>
	<!-- 我的个人中心 End -->

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
</html>