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
            <a href="/shop/index.php/admin/Index/index" class="navbar-brand">mys<i class="iconfont" style="#000;font-size: 24px;">&#xe601;</i>op</a>
        </div>
        <!-- 屏幕宽度小于768px时，div.navbar-responsive-collapse容器里的内容都会隐藏，显示icon-bar图标，当点击icon-bar图标时，再展开。屏幕大于768px时，默认显示。 -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav pull-right">
                <li ><a href="javascript:window.document.location.reload()">刷新&nbsp;<i class="iconfont">&#xe665;</i></a></li>
                <li><a href="/shop/index.php/admin/User/index">管理员&nbsp;<i class="iconfont">&#xf003f;</i></a></li>
                <li><a href="/shop/index.php/admin/Index/clearCache" target="main-frame" class="fix-submenu">清除缓存</a></li>
                 <li><a href="/shop/index.php/admin/Login/logout">退出登录&nbsp;<i class="iconfont">&#xf0012;</i></a></li>
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
                                     <li>
                                        <span class="divider"></span>
                                        <a href="#">商品列表</a>
                                    </li> 
                                    <li style="float: right">
                                        <span class="divider"></span>
                                        <a href="/shop/index.php/admin/goods/add">添加商品</a>
                                    </li>
                                </ul>
                            </div>
							<!-- end -->
							

							<form action="search"  method="post" class="form-search">
    <label class="control-label" for=""></label>
    <input type="text" name="keyword" class="input-medium search-query">
    <button type="submit" class="btn btn-sm btn-danger">查询</button>
</form>


							<!-- list start -->
								<!-- start goods list -->
								<div class="container-fluid">
									<table class="table table-bordered table-hover">
										<tbody>
											<tr>
												<th>编号</th>
												<th>商品名称</th>
												<th>货号</th>
												<th>价格</th>
												<th>上架</th>
												<th>精品</th>
												<th>新品</th>
												<th>热销</th>
												<th>推荐排序</th>
												<th>库存</th>
												<th>操作</th>
											</tr>
											<tr></tr>
											<?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
												<td><?php echo ($vo["goods_id"]); ?></td>
													<td class="first-cell"><span><?php echo ($vo["goods_name"]); ?></span></td>
													<td><span><?php echo ($vo["goods_sn"]); ?></span></td>
													<td align="right"><span><?php echo ($vo["shop_price"]); ?></span></td>
													<td align="center"><?php echo ($vo["is_onsale"]); ?><img src="<?php echo (ADMIN_PUBLIC); ?>/images/yes.gif" onclick=""></td>
													<td align="center"><?php echo ($vo["is_best"]); ?><img src="<?php echo (ADMIN_PUBLIC); ?>/images/yes.gif" onclick=""></td>
													<td align="center"><?php echo ($vo["is_new"]); ?><img src="<?php echo (ADMIN_PUBLIC); ?>/images/yes.gif" onclick=""></td>
													<td align="center"><?php echo ($vo["is_hot"]); ?><img src="<?php echo (ADMIN_PUBLIC); ?>/images/yes.gif" onclick=""></td>
													<td align="center"><span onclick="">100</span></td>
													<td align="right"><span onclick=""><?php echo ($vo["goods_number"]); ?></span></td>
													<td align="center">
														<!-- <a href="../goods.php?id=32" target="_blank" title="查看"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon_view.gif" width="16" height="16" border="0"></a> -->
														<a href="/shop/index.php/admin/goods/edit/goods_id/<?php echo ($vo["goods_id"]); ?>" title="编辑"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon_edit.gif" width="16" height="16" border="0"></a>
														<a href="/shop/index.php/admin/goods/delete/goods_id/<?php echo ($vo["goods_id"]); ?>" onclick="javascript:return confirm('你确认要删除吗？')" title="删除"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon_trash.gif" width="16" height="16" border="0"></a>           
													</td>
												</tr><?php endforeach; endif; else: echo "" ;endif; ?>
										</tbody>
									</table>
									<!-- end goods list -->

									<!-- 分页 -->
									<table id="page-table" cellspacing="0">
										<tbody>
											<div class="page" style="float: right;">
      <?php echo ($page); ?>     
</div>

										</tbody>
									</table>
								</div>
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
</html>