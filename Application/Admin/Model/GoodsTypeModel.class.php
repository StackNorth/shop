<?php
//商品类型模型
namespace Admin\Model;
use Think\Model;
class GoodsTypeModel extends Model{

	//自动验证
	protected $_validate = array(
		array('type_name','require','商品类型名称不能为空'),
		array('type_name','','商品类型名称已经存在！',0,'unique',1)
		
	);
}