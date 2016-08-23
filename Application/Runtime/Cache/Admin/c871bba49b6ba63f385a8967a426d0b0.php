<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>myshop</title>
    <link rel="stylesheet" href="<?php echo (ADMIN_PUBLIC); ?>/css/bootstrap.min.css">
</head>
<body style="background-color: rgb(101,108,116);">
<div class="container-fluid text-center">
    <div style="min-height: 760px;">
        <img src="<?php echo (ADMIN_PUBLIC); ?>/images/success.png" class="img-responsive center-block" style="margin-top: 8%;">
        <div style="margin-top: 2%;">
            <span style="font-size: 24px;font-weight: bold;color: rgb(178,178,178);"> <?php echo($message); ?>！</span>
        </div>
        <div style="font-size: 20px;padding-top: 2%;color: rgb(178,178,178);">
            <p><b id="wait"><?php echo($waitSecond); ?></b> 秒后页面将自动跳转</p>
            <p><a id="href" id="btn-now" href="<?php echo($jumpUrl); ?>"></a> </p>
        </div>
    </div>
    <div class="footer" style="color: rgb(178,178,178);">
        <div>
            Copyright © 2016 imooc.com All Rights Reserved | 京ICP备 13046642号-2
        </div>
    </div>
</div>

<script src="<?php echo (ADMIN_PUBLIC); ?>/js/jquery-3.1.0.min.js"></script>
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/bootstrap.min.js"></script>
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