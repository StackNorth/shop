<?php
namespace Home\Controller;

class AddressController extends BaseController {
	
	public function __construct() {
		parent::__construct();
		$this->getProvince();
		if (empty(session('user'))) {
			$this->redirect('Login/index');
		}
	}

	public function index() {
		//获取登陆用户的id,在登陆后存储在session中
		$user_id = $_SESSION['user']['user_id'];
		$address = M('address')->where('user_id = '.$user_id)->select();
		//加载用户的收货地址
		$address = $this->getAddress($address);
		//获取省
		
		$this->assign('address',$address);
		$this->display();
	}

	public function edit() {
		$address_id = I('get.address_id');
		$addressModel = M('address');
		$address = $addressModel->where('address_id = '.$address_id)->select();
		$hidden = '';
		//编辑或添加数据
		if (IS_POST) {
			$data['user_id']   = $_SESSION['user']['user_id'];
			foreach ($_POST as $key => $value) {
				if ($key == 'hidden') {
					$hidden = $value?'edit':'add';
				} else {
					$data[$key] = $value;
				}
			}
			
			/*$data['street']    = I('street');
			$data['consignee'] = I('consignee');
			$data['province']  = I('province');
			$data['city']      = I('city');
			$data['district']  = I('district');
			$data['zipcode']   = I('zipcode');
			
			$data['telephone'] = I('telephone');
			$data['mobile']    = I('mobile');	*/
			if ($hidden == "edit") {
				//更新数据
				if ($addressModel->where('address_id = '.$address_id)->save($data)) {
					//更新成功
					$this->redirect('Address/index');
				} else {
					//更新失败
					$this->error("更新失败");
				}
			} else {
				//插入数据
				if ($addressModel->data($data)->add()) {
					//添加成功
					$this->success('插入成功',U('Address/index'),2);
				} else {
					//添加失败
					$this->error('插入失败');
				}
				
			}
		}
		$this->assign('address',$address);
		$this->display();
	}

	public function add() {
		$this->edit();
	}

	public function delete() {
		$data['address_id'] = I('address_id');
		
		if (M('address')->where($data)->delete()) {
			$this->redirect('Address/index');
		} else {
			
			$this->error('删除失败');
		}
	}


	/**
	 * 处理前台ajax返回信息
	 * @return [type] [description]
	 */
	public function choose() {
		if (IS_AJAX){
			$data['parent_id'] = I('parent_id');
			$output = '';
			$data = M('region')->where($data)->select();
			$output .= "<option value='-1'>请选择</option>";
			foreach ($data as $value) {

					$output .= "<option value='".$value['region_id']."'>".$value['region_name']."</option>";
			}
			
			$this->ajaxReturn($output,'eval');
		}
	}

	

	
}