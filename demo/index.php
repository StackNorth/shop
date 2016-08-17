<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>myshop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- top-->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style=" background-color:  rgb(70,77,96);">
        <div class="navbar-header">
            　<!-- .navbar-toggle样式用于toggle收缩的内容，即nav-collapse collapse样式所在元素 -->
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- 确保无论是宽屏还是窄屏，navbar-brand都显示 -->
            <a href="##" class="navbar-brand">myShop</a>
        </div>
        <!-- 屏幕宽度小于768px时，div.navbar-responsive-collapse容器里的内容都会隐藏，显示icon-bar图标，当点击icon-bar图标时，再展开。屏幕大于768px时，默认显示。 -->
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav pull-right">
                <li ><a href="#">刷新</a></li>
                <li><a href="#">管理员</a></li>
                <li><a href="#">帮助</a></li>
                <li><a href="#">关于本店</a></li>
            </ul>
        </div>
    </div>

<!--    content-->

    <div class="main-container">
        
        <div class="container-sidebar navbar-collapse collapse">
            <div class="menu">
                <strong>菜单</strong>
            </div>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                商品管理
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="">商品类型</a></li>
                                <li class="list-group-item"><a href="">添加新商品</a></li>
                                <li class="list-group-item"><a href="">商品列表</a></li>
                                <li class="list-group-item"><a href="">商品分类</a></li>
                                <li class="list-group-item"><a href="">商品品牌</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                订单管理
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="">订单列表</a></li>
                                <li class="list-group-item"><a href="">添加订单</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                列表用户
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="">管理员列表</a></li>
                                <li class="list-group-item"><a href="">客户列表</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="main-content">
               <div class="container-fluid">
                   <div class="row-fluid">
                        <div class="span12">
                            <h3>
                                商品类型
                            </h3>
                        </div>
                   </div>
               </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        </div>



    <div class="footer">
        <div>
            Copyright © 2016 imooc.com All Rights Reserved | 京ICP备 13046642号-2
        </div>
    </div>


<script src="js/jquery-3.1.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

