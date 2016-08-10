<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model {
	//查找最好的商品
	public function getBestGoods($limit = 4) {
		$condition['is_best']   = 1;
		$condition['is_onsale'] = 1;
		return $this->where($condition)->order('goods_id asc')->limit($limit)->select();
	}
	public function getHotGoods($limit = 4) {
		$condition['is_hot']    = 1;
		$condition['is_onsale'] = 1;
		return $this->where($condition)->order('goods_id asc')->limit($limit)->select();
	}
	public function getNewGoods($limit = 4) {
		$condition['is_new']    = 1;
		$condition['is_onsale'] = 1;
		return $this->where($condition)->order('goods_id asc')->limit($limit)->select();
	}
	/**
	 * 获取左侧热卖商品推荐
	 * @return [type] [description]
	 */
	public function getLeftHotGoods() {
		$condition['is_best']   = 1;
		$condition['is_onsale'] = 1;
		$condition['is_hot']    = 1;
		$condtion['is_new']     = 1;
		return $this->where($condition)->order('goods_id asc')->limit(4)->select();
	}	
}
