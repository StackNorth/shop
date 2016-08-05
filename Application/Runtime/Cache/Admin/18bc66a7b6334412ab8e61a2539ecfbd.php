<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SHOP 管理中心 - 订单列表 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/styles/general.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (ADMIN_PUBLIC); ?>/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="/shop/index.php/Admin/Order/add">添加订单</a></span>
<span class="action-span1"><a href="index.php?act=main">SHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品订单 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">
  <form action="javascript:search_brand()" name="searchForm">
    <img src="<?php echo (ADMIN_PUBLIC); ?>/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH">
     <input type="text" name="brand_name" size="15">
    <input type="submit" value=" 搜索 " class="button">
  </form>
</div>

<form method="post" action="" name="listForm">
<!-- start brand list -->
<div class="list-div" id="listDiv">

  <table cellpadding="3" cellspacing="1">
    <tbody>
		<tr>
			<th>订单号</th>
			<th>用户ID</th>
			<th>地址ID</th>
			<th>订单状态</th>
			<th>留言</th>
			<th>送货方式</th>
      <th>支付方式</th>
      <th>下单时间</th>
      <th>订单总金额</th>

    </tr>
      <?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td class="first-cell"><span style="float:right"><a href="../data/brandlogo/1240803062307572427.gif" target="_brank"><img src="<?php echo (ADMIN_PUBLIC); ?>/images/picflag.gif" width="16" height="16" border="0" alt="品牌LOGO"></a></span>
      <span onclick="javascript:listTable.edit(this, 'edit_brand_name', 1)" title="点击修改内容" style=""><?php echo ($vo["brand_name"]); ?></span>
      </td>
      <td><a href="http://<?php echo ($vo["url"]); ?>/" target="_brank"><?php echo ($vo["url"]); ?></a></td>
      <td align="left" ><?php echo ($vo["brand_desc"]); ?></td>
      <td align="right"><span onclick="javascript:listTable.edit(this, 'edit_sort_order', 1)"><?php echo ($vo["sort_order"]); ?></span></td>
      <td align="center"><img src='
      <?php if($vo["is_show"] == 1): echo (ADMIN_PUBLIC); ?>/images/yes.gif
      <?php else: ?>
      <?php echo (ADMIN_PUBLIC); ?>/images/no.gif<?php endif; ?>
      '></td>
      <td>1</td>
      <td>1</td>
      <td align="center">
        <a href="/shop/index.php/Admin/Order/edit/id/<?php echo ($vo["brand_id"]); ?>" title="编辑">编辑</a> |
        <a href="/shop/index.php/Admin/Order/delete/id/<?php echo ($vo["brand_id"]); ?>" onclick="javascript:return confirm('你确认要删除吗？')" title="编辑">移除</a> 
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
		<td align="right" nowrap="true" colspan="6">
            <div id="turn-page">
            <?php echo ($page); ?>
            <!--
			总计  <span id="totalRecords">11</span>
        个记录分为 <span id="totalPages">2</span>
        页当前第 <span id="pageCurrent">1</span>
        页，每页 <input type="text" size="3" id="pageSize" value="10" onkeypress="return listTable.changePageSize(event)">
        <span id="page-link">
          <a href="javascript:listTable.gotoPageFirst()">第一页</a>
          <a href="javascript:listTable.gotoPagePrev()">上一页</a>
          <a href="javascript:listTable.gotoPageNext()">下一页</a>
          <a href="javascript:listTable.gotoPageLast()">最末页</a>
          <select id="gotoPage" onchange="listTable.gotoPage(this.value)">
            <option value="1">1</option><option value="2">2</option>          </select>
        </span>
        -->
      </div>
      </td>
    </tr>
  </tbody></table>

<!-- end brand list -->
</div>
</form>


<div id="footer">
	版权所有 &copy; 翻版必究 </div>
</div>

</body>
</html>