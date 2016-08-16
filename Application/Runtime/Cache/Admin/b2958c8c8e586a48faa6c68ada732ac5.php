<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>错误提示页面</title>
	<link rel="stylesheet" href="/shop/Public/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/shop/Public/css/shop_list.css" type="text/css" />
   
    <script type="text/javascript" src="/shop/Public/js/jquery.js" ></script>
    <script type="text/javascript" src="/shop/Public/js/topNav.js" ></script>
    <style type="text/css">
		.shop_bd_error{width:1000px; height:50px; padding:100px 0; margin:10px auto 0; border:1px solid #ccc;}
		.shop_bd_error p{height:45px; line-height:45px; width:980px; text-align: center; font-size:14px; font-weight: bold; color:#55556F;}
		.shop_bd_error p span{display:inline-block;width:45px; height:45px; line-height:45px; overflow:hidden; text-indent: 99em; vertical-align:top; padding-right:10px; background:url('/shop/Public/images/error.jpg') no-repeat left top;}
    </style>
</head> 
<body>
	<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link href="<?php echo (ADMIN_PUBLIC); ?>/styles/general.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo (ADMIN_PUBLIC); ?>/styles/main.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo (ADMIN_PUBLIC); ?>/js/utils.js"></script>
	<script type="text/javascript" src="<?php echo (ADMIN_PUBLIC); ?>/js/selectzone.js"></script>
	<script type="text/javascript" src="<?php echo (ADMIN_PUBLIC); ?>/js/colorselector.js"></script>
	<script type="text/javascript" src="/shop/Public/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?php echo (ADMIN_PUBLIC); ?>/js/calendar.php?lang="></script>
</head>
	<div class="clear"></div>
	

	<!-- Header End -->

	<!-- Body -->
	<div class="shop_bd_error">
		<p><span></span><?php echo($error); ?>！</p>
		<p><b id="wait"><?php echo($waitSecond); ?></b> 秒后页面将自动跳转</p>
		<p><a id="href" id="btn-now" href="<?php echo($jumpUrl); ?>">立即跳转</a> </p>
	</div>
	<!-- Body End -->

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
                <p>Copyright 2007-2013 ShopCZ Inc.,All rights reserved.<br />d by ShopCZ 2.4 </p>
            </div>
        </div>
	<!-- Footer End -->
</body>

<script type="text/javascript">
(function(){
 var wait = document.getElementById('wait'),href = document.getElementById('href').href;
 var interval = setInterval(function(){
     	var time = --wait.innerHTML;
     	if(time <= 0) {
     		location.href = href;
     		clearInterval(interval);
     	};
     }, 1000);
  window.stop = function (){
         console.log(111);
            clearInterval(interval);
 }
 })();
</script>
</html>