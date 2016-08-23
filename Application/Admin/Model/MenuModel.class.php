<?php
namespace Admin\Model;
use Think\Model;
class MenuModel extends Model {
	
	public function menuTree() {
		$menus = $this->select();
		return  $this->genTree($menus);
	}

	public function genTree($menus, $pid = 0 ,$level = 0) {
		static $tree;
		foreach ($menus as $v) {
			if ($v['menu_parent_id'] == $pid) {
				//找到父类
				
				$v['level'] = $level;

				$v['menu_url'] = $v['menu_model'].'/'.$v['menu_controller'].'/'.$v['menu_action'];
				$tree[] = $v;
				$this->genTree($menus, $v['menu_id'],$level+1); 
			}
		}
		return $tree;
	}
	

}

