<?php 
namespace Home\Controller;
use Think\Controller;
class CategoryController extends BaseController {

	public function index() {

		$cat_id = I('id',0,'int');
		$categoryModel = D('category');
		$goodsModel = D('goods');
		
		$count = $goodsModel->where("cat_id = {$cat_id}")->count();
		
		$page = new \Think\Page($count ,20);
		$page->setConfig("prev","上一页");
		$page->setConfig("next","下一页");
		$goods = $goodsModel->where("cat_id = {$cat_id} and is_onsale = 1")->limit($page->firstRow.','.$page->listRows)->select();
		
		$this->assign('goods',$goods);
		$this->assign('page',$page->show());
		$this->display();
	}

}