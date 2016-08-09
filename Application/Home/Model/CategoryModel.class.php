<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model {

	//构造一个递归函数，查找所有的分类
	public function childList ($attr ,$index=0) {

		$res = array();
		foreach ($attr as $v) {
			
			if ($v['parent_id'] == $index) {
				//找到父节点后，继续寻找子类节点
				$v['child'] = $this->childList($attr,$v['cat_id']);//遍历所有节点
				$res[] = $v; //存储一个节点的信息
			}

		}
		return $res;
	}

	public function frontCats() {
		$attr = $this->select();
		return $this->childList($attr);
	}

	//获取当前子类的父类id 迭代
	public function getParents($cat_id) {
		$res = array();
		while ($cat_id) {
			$cat = $this->where("cat_id=$cat_id")->find();
			$res[] = array(
				'cat_id' => $cat['cat_id'],
				'cat_name' => $cat['cat_name']
	 			);
			$cat_id = $cat['parent_id'];
		}
		return array_reverse($res);//数组前后倒置
	}
	/**
	 * 获取所有的category 信息
	 */
	public function Tree() {
		$obj = $this->select();
		return $this->getMenuTree($obj);
	}

	public function getMenuTree($obj ,$pid = 0 , $level = 0) {
		static $tree;
		foreach ($obj as $v) {
			if ($v['parent_id'] == $pid) {
				$v['level'] = $level;
				$tree[] = $v;
				$this->getMenuTree($obj ,$v['cat_id'] , $level+1);
			}
		}
		return $tree;
	}


	
}
