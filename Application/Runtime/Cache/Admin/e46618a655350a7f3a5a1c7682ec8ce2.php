<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
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
<body>
  <h1>
    <span class="action-span1"><a href="__MOUDLE__/Index/index">SHOP 管理中心 </a> </span><span id="search_id" class="action-span1"> - <?php if($addUser != null): ?>添加<?php else: ?>编辑<?php endif; ?> 客户信息</span>
    <div style="clear:both"></div>
  </h1>
  <div class="tab-div">   
    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" action="" method="post" name="theForm"> 
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
        <table width="90%" id="general-table" align="center" style="display: table;">
          <input type="hidden" name="user_id" value="<?php echo ($user[0]["user_id"]); ?>" />
         <tbody>
          <tr>
           <td class="label">用户名：</td>

           <td><input type="text" name="user_name" value="<?php echo ($user[0]["user_name"]); ?>" >
           </td>
         </tr> 
         <tr>
           <td class="label">密码：</td>
           <td><input type="password" name="password" id='password'>
           </td>
         </tr> 
         <tr>
           <td class="label">确认密码：</td>
           <td><input type="password" name="confirmPassword" id='confirmPassword'>
           </td>
         </tr>       
         <tr>
          <td class="label">邮箱：</td>
          <td><input type="text" name="email" value="<?php echo ($user[0]["email"]); ?>" >
           </td>
          </tr>
           <tr>
          <td class="label"><input type="submit" value=" 确定 " class="button" onclick="return confirm()"></td>
          <td> <input type="reset" value=" 重置 " class="button"></td>
          </tr>
          
         
        </tbody></table>
      </form>
    </div>
  </div>
</body>
<script type="text/javascript">
  function confirm() {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    if (password === confirmPassword && password && confirmPassword) {
      return true;
    }
    alert("两次输入的密码不同");
    return false;
  }
</script>
</html>