<?php 
namespace Home\Controller;
use Think\Controller;
class CategoryController extends BaseController {

	public function index() {
		$cat_id = I('id',0,'int');
		$categoryModel = D('category');
		$goodsModel = D('goods');
		$count = $goodsModel->where("cat_id = {$cat_id}")->count();
		
		$page = new \Think\Page($count ,16);
		$page->setConfig("prev","上一页");
		$page->setConfig("next","下一页");

		
		$goods = $goodsModel->where("cat_id = {$cat_id} and is_onsale = 1")->limit($page->firstRow.','.$page->listRows)->select(); 
		$hotGoods = $goodsModel->getLeftHotGoods();
		$this->assign('hotGoods',$hotGoods);
		//获取面包屑导航
		$parentCats = $categoryModel->getParents($cat_id);
		
		$leftMenu = $categoryModel->Tree();
		$this->assign('leftMenu',$leftMenu);
		$this->assign('goods',$goods);
		$this->assign('parentCats',$parentCats);
		
		$this->assign('page',$page->show());
		$this->display();

	}

}