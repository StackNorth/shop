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
            <a href="/shop/index.php/Admin/Index/index" class="navbar-brand">mys<i class="iconfont" style="#000;font-size: 24px;">&#xe601;</i>op</a>
        </div>
        <!-- 屏幕宽度小于768px时，div.navbar-responsive-collapse容器里的内容都会隐藏，显示icon-bar图标，当点击icon-bar图标时，再展开。屏幕大于768px时，默认显示。 -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav pull-right">
                <li ><a href="javascript:window.document.location.reload()">刷新&nbsp;<i class="iconfont">&#xe665;</i></a></li>
                <li><a href="/shop/index.php/Admin/User/index">管理员&nbsp;<i class="iconfont">&#xf003f;</i></a></li>
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
                                     <li>
                                        <span class="divider"></span>
                                        <a href="#">编辑商品</a>
                                    </li> 
                                    
                                </ul>
                            </div>
                            <!-- end -->

                            <!-- list start -->
                            <div class="container-fluid">
                                <form action="" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td >订单号</td>
                                                <td><font color="red"><?php echo ($orderGoods["order_id"]); ?></font></td>
                                            </tr>
                                            <tr>
                                                <td >商品名称</td>
                                                <td>
                                                   <?php echo ($orderGoods["goods_name"]); ?>
                                                </td>
                                            </tr>

                                            <tr id="measure_unit">
                                                <td> 商品价格</td>
                                                <td><input type="text" name="shop_price" id="shop_price" value="<?php echo ($orderGoods["shop_price"]); ?>" ></td>
                                            </tr>
                                            <tr>
                                                <td >购买数量</td>
                                                <td><input type="text" name="goods_number" id="goods_number" value="<?php echo ($orderGoods["goods_number"]); ?>"></td>
                                            </tr>

                                        
                                            <tr>
                                                <td>商品小计</td>
                                                <td><input type="text" name="subtotal"  disabled="true" id="subtotal" value="<?php echo ($orderGoods["subtotal"]); ?>"></td>
                                            </tr>
                                               
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <div class="button-div">
                                                        <input type="submit" value=" 确定 ">
                                                        <input type="reset" value=" 重置 ">
                                                    </div>
                                                </td>

                                            </tr>
                                            </tbody></table>
                                            
                                            <input type="hidden" name="rec_id" value="<?php echo ($orderGoods["rec_id"]); ?>">
                                        </form>
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

<script type="text/javascript">
    $('#goods_number').keyup(function(){
        var goods_number = this.value;
        document.getElementById('subtotal').value = goods_number*(document.getElementById('shop_price').value);
    });
    $('#shop_price').keyup(function(){
        var shop_price = this.value;
        document.getElementById('subtotal').value = shop_price*(document.getElementById('goods_number').value);
    });
</script>
</html>