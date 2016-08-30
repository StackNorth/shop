<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends BaseController {
	
	public function index() {
		$orderModel = M('order');
		$count = $orderModel->count();
		$orders = $this->setPage($count,$orderModel,5);
		$this->assign('orders',$orders);
		$this->display();
	}

	public function edit(){
		$order_id = I('get.id');
		$order = M('order')->where('order_id = '.$order_id)->select();

		if (IS_POST) {
			foreach(I('post.') as $key => $value) {
				$data[$key] = $value;
			}
			if (M('order')->where('order_id = '.$order_id)->save($data) >= 0) {
				$this->success('订单修改成功',U('Order/index'));
				return ;
			}

			$this->error('订单修改失败',U('Order/index'));
			return ;
		}
		$this->assign('order',$order[0]);
		$this->display();
	}



	/**
	 * 订单中所含的商品列表
	 * @return [type] [description]
	 */
	public function goods() {
		$orderGoodsModel = M('order_goods');
		$count = $orderGoodsModel->count();
		$orderGoods = $this->setPage($count,$orderGoodsModel,5);
		$this->assign('orderGoods',$orderGoods);
		$this->display();
	}
	/**
	 * 编辑订单中所含的商品列表
	 * @return [type] [description]
	 */
	public function goodsEdit() {
		$rec_id = I('get.id');
		$orderGoods = M('order_goods')->where('rec_id = '.$rec_id)->select();

		if (IS_POST) {
			foreach(I('post.') as $key => $value) {
				$data[$key] = $value;
			}
			if (M('order_goods')->where('rec_id = '.$rec_id)->save($data) >= 0) {
				$this->success('订单修改成功',U('Order/goods'));
				return ;
			}

			$this->error('订单修改失败',U('Order/goods'));
			return ;
		}
		$this->assign('orderGoods',$orderGoods[0]);
		$this->display();
	}

	public function goodsDelete() {
		$id = I('get.id');
		if (M('order_goods')->where('rec_id = '.$id)->delete()) {
			$this->success('订单删除成功',U('Order/goods'));
			return ;
		}
		$this->error('订单删除失败',U('Order/goods'));
		return ;
	}


	/**
	 * 删除订单
	 * @return [type] [description]
	 */
	public function delete(){
		$id = I('get.id');
		if (M('order')->where('order_id = '.$id)->delete()) {
			$this->success('订单删除成功',U('Order/index'));
			return ;
		}
		$this->error('订单删除失败',U('Order/index'));
		return ;
	}


	/**
	 * 设置分页
	 * @param [type] $count   [description]
	 * @param [type] $model   [description]
	 * @param [type] $pageNum [description]
	 */
	public function setPage($count, $model, $pageNum) {
		$page = new \Think\Page($count,$pageNum);
		$page->setConfig('prev',"上一页");
		$page->setConfig('next',"下一页");
		$data = $model->order('order_id asc')->limit($page->firstRow.','.$page->listRows)->select();
		
		$this->assign('page',$page->show());
		return $data;
	}
}