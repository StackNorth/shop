<?php
namespace Home\Controller;
use Think\Controller;
class OrderController extends BaseController {
	public function __construct() {
		parent::__construct();
		if (empty(session('user'))) {
			$this->redirect('Login/index');
		}
	}

	public function index() {
		$user_id = $_SESSION['user']['user_id'];
		$address = M('address')->where('user_id = '.$user_id)->select();
		//加载用户的收货地址
		$address = $this->getAddress($address);

		$this->goodsNum();
		
		//获取省
		$this->getProvince();
		
		
		$this->assign('address',$address);
		$this->display('index');
	}

	/**
	 * 删除购物栏的商品
	 * @return [type] [description]
	 */
	public function delete() {
		$id = I('get.id');
		
		$data = $_SESSION['user']['shoppingCat'];

		foreach ($data as $key => $value) {
			if ($id == $key ) {
				
				unset($_SESSION['user']['shoppingCat'][$id]);
				$_SESSION['user']['shopNumber'] -= 1;
				if ($_SESSION['user']['shopNumber'] <= 0) {
					$_SESSION['user']['shopNumber'] = 0;
				}
				
			}
		} 
		
		$this->index();
	}

	/**
	 * 结账，生成订单
	 * @return [type] [description]
	 */
	public function checkout(){
		dump(I('post.'));
		dump($_SESSION['user']['shoppingCat']);
		$data['order_sn']  =  rand(0,999999999999);
		$data['user_id'] = $_SESSION['user']['user_id'];

		$orderModel = D('order');
		// 订单号重复
		while(!$orderModel->create($data)) {
			$data['order_sn']  =  rand(0,999999999999);
		}
		//创建成功，添加数据
		if ($orderModel->add()) {

		}
		
	}


	/**
	 * 商品数量加减，总价格的计算
	 * @return [type] [description]
	 */
	public function goodsNum(){
		if (I('sub')) {
			$goods_id_sub = I('sub');
			
		} else if(I('add')) {
			$goods_id_add = I('add');
			
		}
		$totalAll = 0;
		foreach ($_SESSION['user']['shoppingCat'] as $key => $value) {
			if ($key == $goods_id_add || $key == $goods_id_sub) {
				
				if (!empty($goods_id_sub)) {
					$value['goods_nums'] -= 1; 
				} else if (!empty($goods_id_add)) {
					$value['goods_nums'] += 1; 
				}
				if ($value['goods_nums'] <= 0) {
					$value['goods_nums'] = 1;
				}
			}

			$value['total'] = $value['goods_nums']*$value['shop_price'];
			
			$_SESSION['user']['shoppingCat'][$key] = $value;
			$totalAll += $value['total'];
		}
		$data = $_SESSION['user']['shoppingCat'];
		$this->assign("totalAll",$totalAll);
		$this->assign('data',$data);
		
	}
}

