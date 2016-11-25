<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>ShopCZ-首页</title>
	<link rel="stylesheet" href="/shop/Public/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_header.css" type="text/css" />
        <link rel="stylesheet" href="/shop/Public/css/shop_home.css" type="text/css" />
        <script type="text/javascript" src="/shop/Public/js/jquery.js" ></script>
        <script type="text/javascript" src="/shop/Public/js/topNav.js" ></script>
        <script type="text/javascript" src="/shop/Public/js/focus.js" ></script>
        <script type="text/javascript" src="/shop/Public/js/shop_home_tab.js" ></script>
</head>
<body>
	
	<!-- Header  -wll-2013/03/24 -->
<div class="shop_hd">
	<!-- Header TopNav -->
	<div class="shop_hd_topNav">
		<div class="shop_hd_topNav_all">
			<!-- Header TopNav Left -->
			<div class="shop_hd_topNav_all_left">
				<p>您好，欢迎来到<a href="/shop/index.php/home/Index/index">张铁军珠宝</a>
					<?php if($_SESSION['user']== null): ?>[<a href="/shop/index.php/home/Login/index">登录</a>][<a href="/shop/index.php/home/Register/index">注册</a>]
						<?php else: ?>
						[<a href=""><?php echo ($_SESSION['user']['user_name']); ?></a>]
						[<a href="/shop/index.php/home/index/logout">退出</a>]<?php endif; ?>

				</p>

			</div>
			<!-- Header TopNav Left End -->

			<!-- Header TopNav Right -->
			<div class="shop_hd_topNav_all_right">
				<ul class="topNav_quick_menu">

					<li>
						<div class="topNav_menu">
							<a href="/shop/index.php/home/User/index" class="">个人主页</a>
							<a href="/shop/index.php/home/User/purchase" class="">已买到的商品</a>
							<!-- <div class="topNav_menu_bd" style="display:none;" >
								<ul>
									<li><a title="已买到的商品" target="_top" href="#">已买到的商品</a></li>
									<li><a title="个人主页" target="_top" href="/shop/index.php/home/User/index">个人主页</a></li>
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
 foreach($_SESSION['user']['shoppingCat'] as $value){ $output = "<li><a href='/shop/index.php/home/Goods/index/id/".$value['goods_id']."' ><img src='/shop/".$value['goods_img']."' width='50px' height='30px' target='_top'/>".$value['goods_name']."</a></li>"; echo $output; $total += $value['shop_price']; $flag = 1; } ?>
					            </ul>
					        <?php
 if ($flag != 1) { echo "<p>还没有商品，赶快去挑选！</p>"; } else { echo '总共'.$total.'元'; echo "<p><a href='/shop/index.php/home/Order/index'>去结算</a></p>"; } ?>
					        
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
	<div class="shop_hd_header_logo" ><h1 class="logo"><a href="/shop/index.php/home/Index/index"><img src="/shop/Public/images//logo.png" alt="张铁军"   style="width: 188px;height: 70px;"/></a><span>张铁军珠宝</span></h1></div>
	<div class="shop_hd_header_search">
		<ul class="shop_hd_header_search_tab">
			<li id="search" class="current">商品</li>
		</ul>
		<div class="clear"></div>
		<div class="search_form">
		<form method="post" action="/shop/index.php/home/Goods/search">
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
							<h3><a href="/shop/index.php/home/Category/index/id/<?php echo ($vo["cat_id"]); ?>" title="<?php echo ($vo["cat_name"]); ?>"><?php echo ($vo["cat_name"]); ?></a></h3>

							<div id="cat_1_menu" class="cat_menu clearfix" style="">
								<?php if(is_array($vo["child"])): $i = 0; $__LIST__ = $vo["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><dl class="clearfix">
										<dt><a href="/shop/index.php/home/Category/index/id/<?php echo ($vo1["cat_id"]); ?>"><?php echo ($vo1["cat_name"]); ?></a></dt>
										<dd>
											<?php if(is_array($vo1["child"])): $i = 0; $__LIST__ = $vo1["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><a href="/shop/index.php/home/Category/index/id/<?php echo ($vo2["cat_id"]); ?>"><?php echo ($vo2["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
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
		<li class="current_link"><a href="/shop/index.php/home/index/index"><span>首页</span></a></li>
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


	<!-- Body -wll-2013/03/24 -->
	<div class="shop_bd clearfix">
            <!-- 第一块区域  -->
            <div class="shop_bd_top clearfix">
                <div class="shop_bd_top_left"></div>
                <div class="shop_bd_top_center">
                    <!-- 图片切换  begin  -->
                    <div class="xifan_sub_box">
                      <div id="p-select" class="sub_nav"><div class="sub_no" id="xifan_bd1lfsj"> <ul></ul></div></div>
                      <div id="xifan_bd1lfimg">
                        <div>
                            <?php if(is_array($config)): $i = 0; $__LIST__ = $config;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><dl class="">
                                    <dt><a href="<?php echo ($c["url"]); ?>" title="" target="_blank"><img src="/shop<?php echo ($c["img"]); ?>" alt="<?php echo ($c["title"]); ?>"></a></dt>
                                    <dd><h2><a href="<?php echo ($c["url"]); ?>" target="_blank"><?php echo ($c["title"]); ?></a></h2></dd>
                                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                      </div>
                    </div>
                    <script type="text/javascript">movec();</script> 
                    <!-- 图片切换  end --> 
                    <div class="clear"></div>
                    <div class="shop_bd_top_center_hot"><img src="/shop/Public/images//index.guanggao.png" /></div>
                </div>
                
                <!-- 右侧 -->
                <div class="shop_bd_top_right clearfix">
                    <div class="shop_bd_top_right_quickLink">
                        <a href="/shop/index.php/home/Login/index" class="login" title="会员登录"><i></i>会员登录</a>
                        <a href="/shop/index.php/home/Register/index" class="register" title="免费注册"><i></i>免费注册</a>
                        <a href="" class="join" title="商家开店" ><i></i>帮助中心</a>
                    </div>
                    
                    <div class="shop_bd_top_right-style1 nc-home-news">
                        <ul class="tabs-nav">
                            <li><a href="javascript:void(0);" class="hover">商城广告</a></li>
                            <li><a href="javascript:void(0);">关于我们</a></li>
                        </ul>
                        <div class="clear"></div>
                         <div class="tabs-panel">
                            <ul class="list-style01">
                                <li><a title="商城商品推荐" href="article-14.html">商城商品推荐</a><span>(2016-01-11)</span></li>
                                <li><a title="如何发货" href="article-13.html">如何发货</a><span>(2011-01-11)</span></li>
                                <li><a title="查看售出商品" href="article-12.html">查看售出商品</a><span>(2011-01-11)</span></li>
                               <li><a title="商城商品推荐" href="article-14.html">商城商品推荐</a><span>(2016-01-11)</span></li>
                                <li><a title="如何发货" href="article-13.html">如何发货</a><span>(2011-01-11)</span></li>
                                <li><a title="查看售出商品" href="article-12.html">查看售出商品</a><span>(2011-01-11)</span></li>
                                <li><a title="商城商品推荐" href="article-14.html">商城商品推荐</a><span>(2011-01-11)</span></li>
                                
                                
                                
                            </ul>
                        </div> 
                    </div>
                    
                    
                </div>
                <!-- 右侧 End -->
            </div>
            <div class="clear"></div>
            <!-- 第一块区域 End -->
            
            <!-- 第二块区域 -->
            <div class="shop_bd_2 clearfix">
                <!-- 特别推荐 -->
                <div class="shop_bd_tuijian">
                    <ul class="tuijian_tabs">
                        <li class="hover"  onmouseover="easytabs('1', '1');" onfocus="easytabs('1', '1');" onclick="return false;" id="tuijian_content_btn_1"><a href="javascript:void(0);">特别推荐</a></li>
                        <li onmouseover="easytabs('1', '2');" onfocus="easytabs('1', '2');" onclick="return false;" id="tuijian_content_btn_2" ><a href="javascript:void(0);">热门商品</a></li>
                        <li onmouseover="easytabs('1', '3');" onfocus="easytabs('1', '3');" onclick="return false;" id="tuijian_content_btn_3"><a href="javascript:void(0);">新品上架</a></li>
                    </ul>
                    <div class="tuijian_content">
                        <div id="tuijian_content_1" class="tuijian_shangpin" style="display: block;">
                            <ul>
                            <?php if(is_array($best)): $i = 0; $__LIST__ = array_slice($best,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                    <dl>
                                        <dt><a href="/shop/index.php/home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>"><img src="/shop/<?php echo ($vo["goods_img"]); ?>" style="width:100%;height: auto;"/></a></dt>
                                        <dd><a href="/shop/index.php/home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>"><?php echo ($vo["goods_name"]); ?></a></dd>
                                        <dd> 商城价：<em><?php echo ($vo["shop_price"]); ?></em>元</dd>
                                    </dl>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?> 
                            </ul>
                        </div>
                        
                        <div id="tuijian_content_2" class="tuijian_shangpin">
                            <ul>
                            <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?><li>
                                    <dl>
                                        <dt><a href="/shop/index.php/home/Goods/index/id/<?php echo ($hot["goods_id"]); ?>"><img src="/shop/<?php echo ($hot["goods_img"]); ?>" style="width:100%;height: auto;"/></a></dt>
                                        <dd><a href="/shop/index.php/home/Goods/index/id/<?php echo ($hot["goods_id"]); ?>"><?php echo ($hot["goods_name"]); ?></a></dd>
                                        <dd> 商城价：<em><?php echo ($hot["shop_price"]); ?></em>元</dd>
                                    </dl>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div id="tuijian_content_3" class="tuijian_shangpin tuijian_content">
                            <ul>
                                <?php if(is_array($new)): $i = 0; $__LIST__ = $new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><li>
                                    <dl>
                                        <dt><a href="/shop/index.php/home/Goods/index/id/<?php echo ($new["goods_id"]); ?>"><img src="/shop/<?php echo ($new["goods_img"]); ?>" style="width:100%;height: auto;"/></a></dt>
                                        <dd><a href="/shop/index.php/home/Goods/index/id/<?php echo ($new["goods_id"]); ?>"><?php echo ($new["goods_name"]); ?></a></dd>
                                        <dd> 商城价：<em><?php echo ($new["shop_price"]); ?></em>元</dd>
                                    </dl>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                
                            </ul>
                        </div>
                        
                    </div>

                </div>
                <!-- 特别推荐 End -->
                
                <!-- 首发 -->
                <div class="shop_bd_shoufa"><img src="/shop/Public/images//shoufa.jpg" /></div>
                <!-- 首发 End -->
                
            </div>
            <div class="clear"></div>
            <!-- 第二块区域 End -->
            
            <!-- 第三块区域 男女服饰 -->
            <div class="shop_bd_home_block clearfix">
                
                <!-- 左边 -->
                 <div class="shop_bd_home_block_left">
                    <!-- <div class="shop_bd_home_block_left_logo block_nvzhuang_logo"></div> -->
                    <div class="shop_hd_home_block_left_class clearfix">
                    <?php if(is_array($leftMenu)): $i = 0; $__LIST__ = $leftMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["level"] == 1): ?><dl class="clearfix">
                            <dt><a href="/shop/index.php/home/Category/index/id/<?php echo ($vo["cat_id"]); ?>"><?php echo ($vo["cat_name"]); ?></a></dt>
                           
                                <?php if(is_array($leftMenu)): $i = 0; $__LIST__ = $leftMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if($vo1["level"] == 2 AND $vo["cat_id"] == $vo1["parent_id"] ): ?><dd><span><a href="/shop/index.php/home/Category/index/id/<?php echo ($vo1["cat_id"]); ?>"><?php echo ($vo1["cat_name"]); ?></a></span></dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            
                            </dl><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    
                </div>
                <!-- 左边 End -->
                
                <!-- 中间 -->
                <div class="shop_bd_home_block_center">
                    <ul class="tabs-nav">
                        <li><a href="javascript:void(0);">商品推荐</a></li>
                    </ul>
                    <div class="tabs-panel">
                        <ul>
                           <?php if(is_array($best)): $i = 0; $__LIST__ = array_slice($best,0,9,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>

                                    <dl>
                                        <dt><a href="/shop/index.php/home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>"><img src="/shop/<?php echo ($vo["goods_img"]); ?>" style="width:100%;height: auto;"/></a></dt>
                                        <dd><a href="/shop/index.php/home/Goods/index/id/<?php echo ($vo["goods_id"]); ?>"><?php echo ($vo["goods_name"]); ?></a></dd>
                                        <!--<dd>商城价：<em><?php echo ($vo["shop_price"]); ?></em>元</dd>-->
                                    </dl>

                                </li><?php endforeach; endif; else: echo "" ;endif; ?> 
                        </ul>
                    </div>
                </div>
                <!-- 中间 End -->
                
                <!-- 右边商品排行 -->
                <div class="shop_bd_home_block_right">
                    <div class="title"><h3>商品排行</h3></div>
                    <ol class="saletop-list">

                        <?php if(is_array($right)): $k = 0; $__LIST__ = array_slice($right,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$right): $mod = ($k % 2 );++$k; if($k < 4): ?><li class="top clearfix">
                                    <dl>
                                        <dt class="goods-name">
                                        <a href="/shop/index.php/home/Goods/index/id/<?php echo ($right["goods_id"]); ?>"><?php echo ($right["goods_name"]); ?></a>
                                        </dt>
                                        <dd class="nokey"><?php echo ($k); ?></dd>
                                        <dd class="goods-pic">
                                            <a href=""><span class="thumb size60"><img src="/shop/<?php echo ($right["goods_img"]); ?>" /></span></a>
                                        </dd>
                                        <dd class="goods-price"><em><?php echo ($right["market_price"]); ?></em></dd>
                                    </dl>
                                </li>
                                <?php else: ?>

                                <li class="normal">
                                    <i><?php echo ($k); ?></i>
                                    <a href="/shop/index.php/home/Goods/index/id/<?php echo ($right["goods_id"]); ?>"><?php echo ($right["goods_name"]); ?></a>
                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                    </ol>
                    <div class="saletop-list_adv_pic"><a href=""><img src="/shop/Public/images//web-3-38_ff9bd2d724f7138cec1b1937000f4feb.jpg" /></a></div>
                </div>
                <!-- 右边商品排行 -->
                
                <!-- 品牌展示 -->
              <!--  <div class="shop_bd_home_block_bottom">
                    <ul class="">
                        <?php if(is_array($footer)): $i = 0; $__LIST__ = $footer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f): $mod = ($i % 2 );++$i;?><li><a href=""><img src="/shop<?php echo ($f["img"]); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?> 
                    </ul>
                </div>-->
                <!-- 品牌展示 End -->
                
            </div>
            <div clas="clear"></div>
            <!-- 第三块区域 End -->
            
          
            <div class="faq">
                <?php echo ($foo); ?>
            </div>
            <div class="clear"></div>
	</div>
	<!-- Body End -->

	<!-- Footer - wll - 2013/3/24 -->
	<!-- Footer - wll - 2013/3/24 -->
	<div class="clear"></div>
	<div class="shop_footer">
            <div class="shop_footer_link">
                <p>
                    <a href="/shop/index.php/home/Index/index">首页</a>|
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