<?php
namespace Admin\Model;
use Think\Model;
//商品模型
class OrderModel extends Model  {
	
	//自动验证规则
	protected $_validate = array(
		array('order_sn','','repeat',0,'unique',1)
	);
}