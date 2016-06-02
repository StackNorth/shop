<?php
namespace Admin\Model;
use Think\Model\RelationModel;
//属性模型
class AttributeModel extends RelationModel  {
	
	//自动验证规则
	protected $_validate = array(
		array('attr_name','require','属性名称不能为空'),
	);
	//定义关联
	protected $_link = array(
		'rel1' => array(
			'mapping_type' => self::BELONGS_TO,
			'class_name' => 'goods_type',
			'foreign_key' => 'type_id',
			// 'mapping_fields' => 'type_name',
			'as_fields' => 'type_name',
		),
	);

	//获取指定类型下的所有属性，并构成表单
	public function getAttrForm($type_id){
		//获取所有的属性
		$condition['type_id'] = $type_id;
		$attrs = $this->where($condition)->select();
		//拼接字符串操作
		$res = "<table width='100%' id='attrTable'>";
		$res .="<tbody>";
		foreach ($attrs as $data) {
			$res .= "<tr>";
			$res .= "<td class='label'>{$data['attr_name']}</td>";
			$res .= "<td>";
			$res .= "<input type='hidden' name='attr_id_list[]' value='{$data['attr_id']}'>";
			switch ($data['attr_input_type']) {
				case 0:
					#手工录入
					$res .="<input name='attr_value_list[]' type='text' size='40'>";
					break;
				case 1:
					# 列表选择
					$res .="<select name='attr_value_list[]'>
						<option value='>请选择...</option>
						";
					//将属性值取出，在存入数据库时通过换行存入，取出是通过分割符进行分割取出
					$opts = explode(PHP_EOL, $data['attr_value']);
					foreach ($opts as $opt) {
						//循环取出存入的值
						$res .= "<option value='{$opt}'>{$opt}</option>";
					}	
					$res .="</select>";
					break;
				case 2:
					
					break;
				
			}
			$res .= "<input type='hidden' name='attr_price_list[]' value='0'>";
			$res .= "</td>";
			$res .="</tr>";	

		}
		$res .="</tbody>";
		$res .="</table>";
		return $res;

		
	}


}

