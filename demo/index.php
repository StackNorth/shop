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
                <li ><a href="#">刷新&nbsp;<i class="iconfont">&#xe665;</i></a></li>
                <li><a href="#">管理员&nbsp;<i class="iconfont">&#xf003f;</i></a></li>
                <li><a href="#">帮助&nbsp;<i class="iconfont">&#xf0012;</i></a></li>
                <li><a href="#">关于本店&nbsp;<i class="iconfont">&#xe67a;</i></a></li>
            </ul>
        </div>
    </div>

<!--    content-->

    <div class="main-container">
        
        <div class="container-sidebar navbar-collapse">
            <div class="menu">
                <strong>菜单&nbsp;<i class="iconfont">&#x343c;</i></strong>
                <div id="type" data-type="off">
                    <strong > <i class="iconfont">&#xe66b;</i> </strong>
                </div>
            </div>

            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title" id="title1">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <span>商品管理&nbsp;</span><i class="iconfont">&#xe612;</i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href="#"><li class="list-group-item">商品类型</li></a>
                                <a href="#"><li class="list-group-item">添加新商品</li></a>
                                <a href="#"><li class="list-group-item">商品列表</li></a>
                                <a href="#"><li class="list-group-item">商品分类</li></a>
                                <a href="#"><li class="list-group-item">商品品牌</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title" id="title2">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <span>订单管理&nbsp;</span><i class="iconfont">&#xe6e5;</i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href=""><li class="list-group-item">订单列表</li></a>
                                <a href=""><li class="list-group-item">添加订单</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title" id="title3">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <span>列表用户&nbsp;</span><i class="iconfont">&#xe666;</i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="list-group">
                                <a href=""><li class="list-group-item">管理员列表</li></a>
                                <a href=""><li class="list-group-item">客户列表</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="main-content">

            <div class="container-fluid">

               <div class="row-fluid">
                    <div class="content" style="margin-left: 0;">
                        <div class="row-fluid">
                            <div class="modal-title">
                                <h3 >商品管理</h3>
                            </div>
                            <div class="navbar-default">
                                <ul class="breadcrumb">
                                    <li>
                                        <a href="#"><i class="iconfont">&#xe604;</i>首页</a>
                                    </li>
                                    <li>
                                        <span class="divider"></span>
                                        <a href="#">XXX</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="block" style="border: 1px solid #d3d3d3;">
                                <div class="block-content collapse in">
                                    <div class="search" style="margin: 1% 1%;">
                                        <form action="" class="form-search">
                                            <label class="control-label" for="">XXX</label>
                                            <input type="text" class="input-medium search-query">
                                            <button type="submit" class="btn btn-sm btn-danger">查询</button>
                                        </form>
                                    </div>
                                    <div class="container-fluid">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <th>dsaaaaaaa</th>
                                            <th>dsaaaaaaa</th>
                                            <th>dsaaaaaaa</th>
                                            <th>dsaaaaaaa</th>
                                            <th>dsaaaaaaa</th>
                                            <th>dsaaaaaaa</th>
                                            <th>dsaaaaaaa</th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr><tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>
                                            <tr>
                                                <td>asd</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                                <td>ads</td>
                                                <td>ad</td>
                                                <td>dsfa</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="page" style="float: right;">
                                        <ul class="pagination">
                                            <li><a href="#">&laquo;</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
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
<script src="js/demo.js"></script>
</body>
</html>

