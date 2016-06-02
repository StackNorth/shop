<?php 
namespace Home\Controller;
use Think\Controller;
class CategoryController extends BaseController {

	public function index() {
		$cat_id = I('id',0,'int');
		//获取面包屑导航
		$parentCats = D('category')->getParents($cat_id);
		//分配
		//dump($parentCats);
		$this->assign('parentCats',$parentCats);
		$this->display();

	}

}