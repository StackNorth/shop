<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends BaseController {

	public function index() {
		$goods_id = I('id',0,'int');
		$condition['goods_id'] = $goods_id;
		$goods = M('goods')->find($goods_id);
		$attr = M('goods_attr')->where($condition)->select();
		$this->assign('attr',$attr);
		$this->assign('goods',$goods);	
		$this->display();
	}

	 public function search() {
    	$search_content = I('search_content');
    	$goodsModel = M('goods');
    	$where = "goods_name like '{%$search_content%}' or goods_brief like '{%$search_content%}'";
    	
    }

}