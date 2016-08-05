<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link href="<?php echo (ADMIN_PUBLIC); ?>/tyles/general.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo (ADMIN_PUBLIC); ?>/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
	<span class="action-span"><?php if($user == 1): ?><a href="/shop/index.php/Admin/User/addUser"> 添加用户<?php else: ?><a href="/shop/index.php/Admin/User/addAdmin">添加管理员<?php endif; ?></a></span>
	<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - <?php if($user == 1): ?>用户列表<?php else: ?>管理员列表<?php endif; ?> </span>
	<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="" name="searchForm">
    <img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
		关键字 <input type="text" name="keyword" size="15">
		<input type="submit" value=" 搜索 " class="button">
  </form>
</div>

<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
  <!-- start goods list -->
	<div class="list-div" id="listDiv">
		<table cellpadding="3" cellspacing="1">
			<tbody>
				<tr>
					<th>编号</th>
					<th>用户名</th>
					<th>邮箱</th>
					<th>操作</th>
				</tr>
				<tr></tr>
				<?php if(is_array($admins)): $i = 0; $__LIST__ = $admins;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td align="center"><?php if($user == 1): echo ($vo["user_id"]); else: echo ($vo["admin_id"]); endif; ?></td>
					<td class="first-cell" align="center"><span><?php if($user == 1): echo ($vo["user_name"]); else: echo ($vo["admin_name"]); endif; ?></span></td>
					<td align="center"><span ><?php echo ($vo["email"]); ?></span></td>
					<td align="center">
						<a href="
						<?php if($user != 1): ?>/shop/index.php/Admin/User/editAdmin/admin_id/<?php echo ($vo["admin_id"]); else: ?>
						/shop/index.php/Admin/User/editUser/user_id/<?php echo ($vo["user_id"]); endif; ?>
						" title="编辑"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon_edit.gif" width="16" height="16" border="0"></a>
						<a href="/shop/index.php/Admin/User/delete/admin_id/<?php echo ($vo["admin_id"]); ?>" onclick="javascript:return confirm('你确认要删除吗？')" title="删除"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon_trash.gif" width="16" height="16" border="0"></a> 
						      
					</td>
					
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				
  </tbody>
 </table>
<!-- end goods list -->

	<!-- 分页 -->
	<table id="page-table" cellspacing="0">
		<tbody>
			<tr>
				<td align="right" nowrap="true" style="background-color: rgb(255, 255, 255);">
					<!-- $Id: page.htm 14216 2008-03-10 02:27:21Z testyang $ -->
					<div id="turn-page">
						<?php echo ($page); ?>
						
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>


</form>

<div id="footer">
	版权所有 &copy; 翻版必究 
</div>

</body>
</html>