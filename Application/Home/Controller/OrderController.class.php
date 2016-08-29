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
		
		$data['order_sn']  =  rand(1000000000,9999999999);//订单id
		$data['user_id'] = $_SESSION['user']['user_id'];//用户id
		$data['address_id'] = I('address');//收获地址id
		$data['order_status'] = '待付款';//订单状态 代发货

		$data['postscripts'] = '空运';
		$data['shipping'] = '韵达';//送货方式
		$data['pay'] = '货到付款';//支付方式
		$data['order_amount'] = I('totalAll');//订单总金额
		$data['order_time'] = date("Y-m-d H:i:s");//下单时间
		$orderModel = D('order');

		// 订单号重复
		while(!$orderModel->create($data)) {
			$data['order_sn']  =  rand(1000000000,9999999999);
	
		} 

		//创建成功，添加数据
		if ($orderModel->add()) {
			//循环读取session中的商品信息，存储到order_goods表中
			
			$order_id = $orderModel->where('order_sn = '.$data['order_sn'])->getField('order_id');
			foreach($_SESSION['user']['shoppingCat'] as $key => $value) {
				 $goods['order_id']     = $order_id;//订单id
				 $goods['goods_id']     = $value['goods_id'];//商品id
				 $goods['goods_name']   = $value['goods_name'];//商品名称
				 $goods['goods_img']    = $value['goods_img'];//商品图片url
				 $goods['shop_price']   = $value['shop_price'];//商品价格
				 $goods['goods_number'] = $value['goods_nums'];//商品数量
				 $goods['subtotal']     = $value['total'];	//商品总价
				

				 if(!M('order_goods')->add($goods)) {
				 	
				 	$this->error('商品添加失败');
				 	
				 	return ;
				 }
			}
			unset($_SESSION['user']['shoppingCat']);
			$_SESSION['user']['shopNumber'] = 0;
			$this->success('下单成功','Index/index');
		} else {
			$this->error('订单添加失败');
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

