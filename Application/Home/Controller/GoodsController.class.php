<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends BaseController {

	public function index() {
		$goods_id = I('id',0,'int');
		$condition['goods_id'] = $goods_id;
		$goods = D('goods')->find($goods_id);
		$attr = M('goods_attr')->where($condition)->select();
		$this->assign('attr',$attr);
		$this->assign('goods',$goods);  
		$this->display();
	}

	 public function search() {
	 	
    	$search_content = I('search_content');
    	$goodsModel = M('goods');
    	$where = "goods_name like '%$search_content%' or goods_brief like '%$search_content%' or cat_name like '%$search_content%'";
    	$join  = 'cz_category ON cz_category.cat_id = cz_goods.cat_id';
    	
		$count = count($goodsModel->where($where)->join($join)->select());



    	$page = new \Think\Page($count ,20);
		$page->setConfig("prev","上一页");
		$page->setConfig("next","下一页");
    	
    	$goods = $goodsModel->where($where)->join($join)->limit($page->firstRow.','.$page->listRows)->select();
    	
    	$this->assign('page',$page->show());
    	$this->assign('goods',$goods);
    	$this->display();
    	
    }

}