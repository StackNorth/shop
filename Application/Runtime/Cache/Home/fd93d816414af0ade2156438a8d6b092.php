<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>商品列表页</title>
	<link rel="stylesheet" href="/shop/Public/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_header.css" type="text/css" />
    <link rel="stylesheet" href="/shop/Public/css/shop_list.css" type="text/css" />
    <script type="text/javascript" src="/shop/Public/js/jquery.js" ></script>
    <script type="text/javascript" src="/shop/Public/js/topNav.js" ></script>
    <script type="text/javascript" src="/shop/Public/js/shop_list.js" ></script>
</head>
<body>
	<!-- Header  -wll-2013/03/24 -->
<div class="shop_hd">
	<!-- Header TopNav -->
	<div class="shop_hd_topNav">
		<div class="shop_hd_topNav_all">
			<!-- Header TopNav Left -->
			<div class="shop_hd_topNav_all_left">
				<p>您好，欢迎来到<b><a href="/shop/index.php/Home/Category/index">XXXX商城</a></b>
					<?php if($_SESSION['user']== null): ?>[<a href="/shop/index.php/Home/Login/index">登录</a>][<a href="/shop/index.php/Home/Register/index">注册</a>]
						<?php else: ?>
						[<a href=""><?php echo ($_SESSION['user']['user_name']); ?></a>]
						[<a href="/shop/index.php/Home/Category/logout">退出</a>]<?php endif; ?>

				</p>

			</div>
			<!-- Header TopNav Left End -->

			<!-- Header TopNav Right -->
			<div class="shop_hd_topNav_all_right">
				<ul class="topNav_quick_menu">

					<li>
						<div class="topNav_menu">
							<a href="#" class="topNavHover">我的商城<i></i></a>
							<div class="topNav_menu_bd" style="display:none;" >
								<ul>
									<li><a title="已买到的商品" target="_top" href="#">已买到的商品</a></li>
									<li><a title="个人主页" target="_top" href="#">个人主页</a></li>
									<li><a title="我的好友" target="_top" href="#">我的好友</a></li>
								</ul>
							</div>
						</div>
					</li>

					<li>
						<div class="topNav_menu">
							<a href="#" class="topNavHover">购物车<b>0</b>种商品<i></i></a>
							<div class="topNav_menu_bd" style="display:none;">
								<!--
					            <ul>
					              <li><a title="已售出的商品" target="_top" href="#">已售出的商品</a></li>
					              <li><a title="销售中的商品" target="_top" href="#">销售中的商品</a></li>
					            </ul>
					        -->
					        <p>还没有商品，赶快去挑选！</p>
					    </div>
					</div>
				</li>

				<li>
					<div class="topNav_menu">
						<a href="#" class="topNavHover">我的收藏<i></i></a>
						<div class="topNav_menu_bd" style="display:none;">
							<ul>
								<li><a title="收藏的商品" target="_top" href="#">收藏的商品</a></li>
								<li><a title="收藏的店铺" target="_top" href="#">收藏的店铺</a></li>
							</ul>
						</div>
					</div>
				</li>

				<li>
					<div class="topNav_menu">
						<a href="#">站内消息</a>
					</div>
				</li>

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
	<!-- 面包屑 注意首页没有 -->
	<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="/shop/index.php/Home/Index/index">首页</a>&nbsp;›&nbsp;
			<?php if(is_array($parentCats)): $i = 0; $__LIST__ = $parentCats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- <a href="/shop/index.php/Home/Category/index/id/<?php echo ($vo["cat_id"]); ?>"> -->
					<?php echo ($vo["cat_name"]); ?></a> <?php if($i != count($parentCats)): ?>&nbsp;›&nbsp;<?php endif; ?>
				</if><?php endforeach; endif; else: echo "" ;endif; ?>
		</span>
	</div>
	<div class="clear"></div>
	<!-- 面包屑 End -->

	<!-- Header End -->
	<div class="shop_bd clearfix">

	<!-- List Body 2013/03/27 -->
	
	<div class="shop_bd_list_left clearfix">
			<!-- 左边商品分类 -->
			<div class="shop_bd_list_bk clearfix">
				<div class="title">商品分类</div>
				<?php if(is_array($leftMenu)): $i = 0; $__LIST__ = $leftMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["level"] == 1): ?><div class="contents clearfix">
								<dl class="shop_bd_list_type_links clearfix">
									<dt><strong><?php echo ($vo["cat_name"]); ?></strong></dt>
									<?php if(is_array($leftMenu)): $i = 0; $__LIST__ = $leftMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if($vo1["level"] == 2 AND $vo["cat_id"] == $vo1["parent_id"] ): ?><dd><span><a href="/shop/index.php/Home/Category/index/id/<?php echo ($vo1["cat_id"]); ?>"><?php echo ($vo1["cat_name"]); ?></a></span></dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</dl>
							</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<!-- 左边商品分类 End -->

			<!-- 热卖推荐商品 -->
			<div class="shop_bd_list_bk clearfix">
				<div class="title">热卖推荐商品</div>
				<div class="contents clearfix">
					<ul class="clearfix">
						<?php if(is_array($hotGoods)): $i = 0; $__LIST__ = $hotGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hotGood): $mod = ($i % 2 );++$i;?><li class="clearfix">
							<div class="goods_name"><a href=""><?php echo ($hotGood["goods_name"]); ?>|<?php echo ($hotGood["goods_sn"]); ?>|原价<?php echo ($hotGood["shop_price"]); ?>元</a></div>
							<div class="goods_pic"><span class="goods_price"><?php echo ($hotGood["promote_price"]); ?> </span><a href=""><img src="/shop/<?php echo ($hotGood["goods_img"]); ?>" /></a></div>
							<div class="goods_xiaoliang">
								<span class="goods_xiaoliang_link"><a href="/shop/index.php/Home/Goods/index/id/{hotGood.goods_id}">去看看</a></span>
							<!-- 	<span class="goods_xiaoliang_nums">已销售<strong>99</strong>笔</span> -->
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
						

					</ul>
				</div>
			</div>
			<!-- 热卖推荐商品 -->
			<div class="clear"></div>

			

		</div>
		
		
	<div class="shop_bd_list_right clearfix">
			<!-- 条件筛选框 -->
			<!-- <div class="module_filter">
				<div class="module_filter_line">
					<dl>
						<dt>尺码：</dt>
						<dd>
							<span><a href="">XXS</a></span>
							<span><a href="">XS</a></span>
							<span><a href="">S</a></span>
							<span><a href="">M</a></span>
							<span><a href="">L</a></span>
							<span><a href="">XL</a></span>
							<span><a href="">XXL</a></span>
							<span><a href="">XXXL</a></span>
							<span><a href="">加大XXXL</a></span>
							<span><a href="">均码</a></span>
						</dd>
					</dl>
			
					<dl>
						<dt>品牌：</dt>
						<dd>
							<span><a href="">彪马</a></span>
							<span><a href="">安踏</a></span>
							<span><a href="">阿迪达斯</a></span>
							<span><a href="">李宁</a></span>
							<span><a href="">匡威</a></span>
							<span><a href="">耐克</a></span>
							<span><a href="">卡帕</a></span>
							<span><a href="">鸿星尔克</a></span>
							<span><a href="">沃特</a></span>
							<span><a href="">垃圾</a></span>
						</dd>
					</dl>
			
					<dl>
						<dt>款式：</dt>
						<dd>
							<span><a href="">长袖</a></span>
							<span><a href="">短袖</a></span>
							<span><a href="">无袖</a></span>
							<span><a href="">两件套</a></span>
							<span><a href="">宽松</a></span>
							
						</dd>
					</dl>
			
					<dl>
						<dt>材质：</dt>
						<dd>
							<span><a href="">纯棉</a></span>
							<span><a href="">真丝</a></span>
							<span><a href="">聚酯</a></span>
							<span><a href="">棉+氨纶</a></span>
							<span><a href="">卡莱</a></span>
							<span><a href="">人造棉</a></span>
							<span><a href="">其它</a></span>
						</dd>
					</dl>
			
			
				</div>
				<div class="bottom"></div>
			</div> -->
			<!-- 条件筛选框 -->

			<!-- 显示菜单 -->
			<!-- <div class="sort-bar">
				<div class="bar-l"> 
					            查看方式S
					            <div class="switch"><span class="selected"><a title="以方格显示" ecvalue="squares" nc_type="display_mode" class="pm" href="javascript:void(0)">大图</a></span><span style="border-left:none;"><a title="以列表显示" ecvalue="list" nc_type="display_mode" class="lm" href="javascript:void(0)">列表</a></span></div>
					            查看方式E 
					            排序方式S
					            <ul class="array">
					              <li class="selected"><a title="默认排序" class="nobg" href="javascript:void(0)">默认</a></li>
					              <li><a title="点击按销量从高到低排序" onclick="javascript:replaceParam('sale');" href="javascript:void(0)">销量</a></li>
					              <li><a title="点击按人气从高到低排序" onclick="javascript:replaceParam('click');" href="javascript:void(0)">人气</a></li>
					              <li><a title="点击按信用从高到低排序" onclick="javascript:replaceParam('credit');" href="javascript:void(0)">信用</a></li>
					              <li><a title="点击按价格从高到低排序" onclick="replaceParam('price');" href="javascript:void(0)">价格</a></li>
					            </ul>
					            排序方式E 
					            价格段S
					            <div class="prices"> <em>¥</em>
					              <input type="text" value="" class="w30">
					              <em>-</em>
					              <input type="text" value="" class="w30">
					              <input type="submit" value="确认" id="search_by_price">
					            </div>
					            价格段E 
					          </div>
			</div>
			<div class="clear"></div>
			显示菜单 End -->

			<!-- 商品列表 -->
			<div class="shop_bd_list_content clearfix">
				<ul>
				<?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><li>
						<dl>
							<dt><a href="/shop/index.php/Home/Goods/index/id/<?php echo ($good["goods_id"]); ?>"><img src="/shop/<?php echo ($good["goods_img"]); ?>" /></a></dt>
							<dd class="title"><a href="/shop/index.php/Home/Goods/index/id/<?php echo ($good["goods_id"]); ?>"><?php echo ($good["goods_brief"]); ?></a></dd>
							<dd class="content">
								<span class="goods_jiage">￥<strong><?php echo ($good["shop_price"]); ?></strong></span>
							</dd>
						</dl>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="pagination" > 
				<ul >
					<li><span class="currentpage"><?php echo ($page); ?></span></li>
				</ul> 
			</div>
			<!-- 商品列表 End -->


		</div>
	</div>
	<!-- List Body End -->

	<!-- Footer - wll - 2013/3/24 -->
	<div class="clear"></div>
	<div class="shop_footer">
            <div class="shop_footer_link">
                <p>
                    <a href="">首页</a>|
                    <a href="">招聘英才</a>|
                    <a href="">广告合作</a>|
                    <a href="">关于ShopCZ</a>|
                    <a href="">关于我们</a>
                </p>
            </div>
            <div class="shop_footer_copy">
                <p>Copyright 2004-2013 itcast Inc.,All rights reserved.</p>
            </div>
        </div>
	<!-- Footer End -->
	
</body>
<script type="text/javascript">
	 function replaceParam(key){
		var href = window.location.href;
		alert(href.substr(href.indexOf('/id/')));
		//href += '/key/'+key+'/order/'+'desc';
		//window.location.href = href;
	}
http://localhost/shop/index.php/Home/Category/index/id/4
</script>
</html>

<!--
					<li>
						<dl>
							<dt><a href=""><img src="/shop/Public/images/21151da3bdefc6d9a7120c991fe59800.jpg_small.jpg" /></a></dt>
							<dd class="title"><a href="">OCIAIZO春装水洗做旧短外套复古磨白短款牛仔外套春01C1417</a></dd>
							<dd class="content">
								<span class="goods_jiage">￥<strong>249.00</strong></span>
								<span class="goods_chengjiao">最近成交5笔</span>
							</dd>
						</dl>
					</li>

				
-->