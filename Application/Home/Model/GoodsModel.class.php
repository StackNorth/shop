<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model {
	//查找最好的商品
	public function getBestGoods() {
		$condition['is_best'] = 1;
		$condition['is_onsale'] = 1;
		return $this->where($condition)->order('goods_id asc')->limit(4)->select();
	}
	public function getHotGoods() {
		$condition['is_hot'] = 1;
		$condition['is_onsale'] = 1;
		return $this->where($condition)->order('goods_id asc')->limit(4)->select();
	}
	public function getNewGoods() {
		$condition['is_new'] = 1;
		$condition['is_onsale'] = 1;
		return $this->where($condition)->order('goods_id asc')->limit(4)->select();
	}
	/**
	 * 获取左侧热卖商品推荐
	 * @return [type] [description]
	 */
	public function getLeftHotGoods() {
		$condition['is_best'] = 1;
		$condition['is_onsale'] = 1;
		$condition['is_hot'] = 1;
		$condtion['is_new'] = 1;
		return $this->where($condition)->order('goods_id asc')->limit(4)->select();
	}	
}
