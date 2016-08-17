<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>管理收货地址</title>
	<link rel="stylesheet" href="/shop/Public/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_manager.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_shdz_835.css" type="text/css" />
    <script type="text/javascript" src="/shop/Public/js/jquery.js" ></script>
    <script type="text/javascript" src="/shop/Public/js/topNav.js" ></script>
    
</head>
<body>
		<!-- Header  -wll-2013/03/24 -->
	<!-- Header  -wll-2013/03/24 -->
<div class="shop_hd">
	<!-- Header TopNav -->
	<div class="shop_hd_topNav">
		<div class="shop_hd_topNav_all">
			<!-- Header TopNav Left -->
			<div class="shop_hd_topNav_all_left">
				<p>您好，欢迎来到<b><a href="/shop/index.php/Home/Address/index">XXXX商城</a></b>
					<?php if($_SESSION['user']== null): ?>[<a href="/shop/index.php/Home/Login/index">登录</a>][<a href="/shop/index.php/Home/Register/index">注册</a>]
						<?php else: ?>
						[<a href=""><?php echo ($_SESSION['user']['user_name']); ?></a>]
						[<a href="/shop/index.php/Home/Address/logout">退出</a>]<?php endif; ?>

				</p>

			</div>
			<!-- Header TopNav Left End -->

			<!-- Header TopNav Right -->
			<div class="shop_hd_topNav_all_right">
				<ul class="topNav_quick_menu">

					<li>
						<div class="topNav_menu">
							<a href="/shop/index.php/Home/User/index" class="topNavHover">我的商城<i></i></a>
							<div class="topNav_menu_bd" style="display:none;" >
								<ul>
									<li><a title="已买到的商品" target="_top" href="#">已买到的商品</a></li>
									<li><a title="个人主页" target="_top" href="#">个人主页</a></li>
								</ul>
							</div>
						</div>
					</li>

					<li>
						<div class="topNav_menu">
							<a href="#" class="topNavHover">购物车<b>0</b>种商品<i>123</i></a>
							<div class="topNav_menu_bd" style="display:none;">
								
					            <ul>
					              <li><img src="#"  target="_top" href="#">商品1</a></li>
					              <li><img src="#" target="_top" href="#">商品2</a></li>
					            </ul>
					        
					        <p>还没有商品，赶快去挑选！</p>
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
		

	
	<div class="clear"></div>
	<!-- 面包屑 注意首页没有 -->
	<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="/shop/index.php/Home/Index/index">首页</a>&nbsp;›&nbsp;
			<a href="">我的商城</a>&nbsp;›&nbsp;
			<a href="">我的地址</a>
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
				<dt>我的交易</dt>
				<dd><span><a href="">已购买商品</a></span></dd>
				<dd><span><a href="">我的收藏</a></span></dd>
				<dd><span><a href="">评价管理</a></span></dd>
			</dl>

			<dl>
				<dt>我的账户</dt>
				<dd><span><a href="/shop/index.php/Home/User/index">个人资料</a></span></dd>
				<dd><span><a href="/shop/index.php/Home/User/password">密码修改</a></span></dd>
				<dd><span><a href="/shop/index.php/Home/Address/index">收货地址</a></span></dd>
			</dl>

		</div>
		<!-- 左边导航 End -->
		<!-- 左边导航 End -->
		
		<!-- 右边购物列表 -->
		<div class="shop_member_bd_right clearfix">
			
			<div class="shop_meber_bd_good_lists clearfix">
				<div class="title"><h3>管理收货地址<a style="float:right;" href="javasrcipt:void(0);" id="new_add_shdz_btn">新增收货地址</a></h3></div>
				<div class="clear"></div>
			<!-- 收货人地址 Title End -->
			<div class="shop_bd_shdz clearfix">
				<div class="shop_bd_shdz_lists clearfix">
					<ul>
						<?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><label><span><input type="radio" name="shdz" /></span></label><em><?php echo ($vo["province"]); ?></em><em><?php echo ($vo["city"]); ?></em><em><?php echo ($vo["district"]); ?></em><em><?php echo ($vo["street"]); ?></em><em><?php echo ($vo["consignee"]); ?>(收)</em><em><?php echo ($vo["mobile"]); ?></em><span class="admin_shdz_btn"><a href="/shop/index.php/Home/Address/edit/address_id/<?php echo ($vo["address_id"]); ?>">编辑</a><a href="/shop/index.php/Home/Address/delete/address_id/<?php echo ($vo["address_id"]); ?>"  onclick="javaScript:return confirm('您确定要删除吗？');">删除</a></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<!-- 新增收货地址 -->
				<div id="new_add_shdz_contents" style="display:none;" class="shop_bd_shdz_new clearfix">
					<div class="title">新增收货地址</div>
					<div class="shdz_new_form">
						<form action="/shop/index.php/Home/Address/add" method="post">
							<ul>
								<li><label for=""><span>*</span>收货人姓名：</label><input type="text" class="name" name="consignee" id="consignee" /></li>
								<li><label for=""><span>*</span>所在地址：</label>
									<select id="province" name="province">
										<option value="-1" selected>请选择</option>
										<?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><option value="<?php echo ($pro["region_id"]); ?>"><?php echo ($pro["region_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>省/市
									<select id="city" name="city">
										<option value="-1">请选择</option>
									</select>市
									<select id="district" name="district">
										<option value="-1">请选择</option>
									</select>县/区
								</li>
								<li><label for=""><span>*</span>详细地址：</label><input type="text" class="xiangxi" name="street" id="street" /></li>
								<li><label for=""><span></span>邮政编码：</label><input type="text" class="youbian" name="zipcode"/></li>
								<li><label for=""><span></span>电话：</label><input type="text" class="dianhua" name="telephone"/></li>
								<li><label for=""><span></span>手机号：</label><input type="text" class="shouji" name="mobile" /></li>
								<li><label for="">&nbsp;</label><input type="submit" id="submit" value="增加收货地址" /></li>
							</ul>
						</form>
					</div>
				</div>
				<!-- 新增收货地址 End -->
			</div>
			<div class="clear"></div>
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
	<script type="text/javascript">
		$("#new_add_shdz_btn").toggle(function(){
		$("#new_add_shdz_contents").show(500);
		},function(){
		$("#new_add_shdz_contents").hide(500);
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
</body>
</html>