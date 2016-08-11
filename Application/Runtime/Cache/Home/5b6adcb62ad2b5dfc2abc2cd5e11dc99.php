<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>用户登录</title>
	<link rel="stylesheet" href="/shop/Public/css/base.css" />
	<link rel="stylesheet" href="/shop/Public/css/global.css" />
	<link rel="stylesheet" href="/shop/Public/css/login-register.css" />
	<script type="text/javascript" src="/shop/Public/js/jquery-1.11.2.min.js"></script>
</head>
<body>

	
	<div class="header wrap1000">
		<a href=""><img src="/shop/Public/images/logo.png" alt="" /></a>
	</div>
	
	<div class="main">
		<div class="login-form fr">
			<div class="form-hd">
				<h3>用户登录</h3>
			</div>
			<div class="form-bd">
				<form action="" method="POST" id="actForm">
					
					<dl>
						<dt>用户名</dt>
						<dd><input type="text" name="user_name" class="text" /></dd>
						
					</dl>
					<dl>
						<dt>密&nbsp;&nbsp;&nbsp;&nbsp;码</dt>
						<dd><input type="password" name="password" class="text"/></dd>
						
					</dl>
					<dl>
						<dt>验证码</dt>
						<dd><input type="text" name="captcha" id="captcha" class="text" size="10" > <img src="/shop/index.php/Home/Login/code" alt="CAPTCHA" border="1" onclick= this.src="/shop/index.php/Home/Login/code/"+Math.random() style="cursor: pointer;" title="看不清？点击更换另一个验证码。" /></dd>
						
					</dl>
					<dl align="center">
						<div id="error" style="color:#F00"></div>
						
					</dl>
					<dl>
						<dt>&nbsp;</dt>
						<dd><input type="submit" value="登  录" class="submit"/> <a href="" class="forget">忘记密码?</a></dd>
					</dl>
				</form>
				<dl>
					<dt>&nbsp;</dt>
					<dd> 还不是本站会员？立即 <a href="/shop/index.php/Home/Register/index" class="register">注册</a></dd>
				</dl>
				<dl class="other">
					<dt>&nbsp;</dt>
					<dd>
						<p>您可以用合作伙伴账号登录：</p>
						<a href="" class="qq"></a>
						<a href="" class="sina"></a>
					</dd>
				</dl>
			</div>
			<div class="form-ft">
			
			</div>		
		</div>
		
		<div class="login-form-left fl">
			<img src="/shop/Public/images/left.jpg" alt="" />
		</div>
	</div>
	
	<div class="footer clear wrap1000">
		<p> <a href="">首页</a> | <a href="">招聘英才</a> | <a href="">广告合作</a> | <a href="">关于ShopCZ</a> | <a href="">联系我们</a></p>
		<p>Copyright 2004-2013 itcast Inc.,All rights reserved.</p>
	</div>
	
	
</body>
<script type="text/javascript">

	<?php echo ($error); ?>
	$('#captcha').blur(
		function() {
			var captcha = this.value;
			$.ajax({
				type : "GET",//传输方式
				url : "/shop/index.php/Home/Login/checkCaptcha",//路径，此控制器下的模型attribute的getAttrs方法方法
				data : "captcha="+captcha,//传输的数据
				dataType : 'html',//传输类型
				//成功后加载id为tbody-goodsAttr的框架中
				success : function(msg){
					
	        		$("#error").html(msg); 
	        		$("#actForm").preventDefault();
				},
				 error : function(){alert('出错');}
				})

		}
		);
</script>
</html>