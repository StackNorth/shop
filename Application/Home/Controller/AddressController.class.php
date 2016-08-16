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
		$region = M('region');
		foreach($address as $k =>$v) {
			foreach ($v as $key => $value) {
				switch($key) {
					case 'province':
						$address[$k]['province'] = $region->where("region_id = '$value'")->getField('region_name');break;

					case 'city':
						$address[$k]['city'] = $region->where("region_id = '$value'")->getField('region_name');
					break;

					case 'district':
						$address[$k]['district'] = $region->where("region_id = '$value'")->getField('region_name');
					break;
				}
			}
			
		}
		//获取省
		
		$this->assign('address',$address);
		
		

		$this->display();
	}

	public function edit() {
		$address_id = I('get.address_id');
		$addressModel = M('address');
		$address = $addressModel->where('address_id = '.$address_id)->select();
		$hidden = I('hidden')?'edit':'add';
		//编辑或添加数据
		if (IS_POST) {
			$data['street']    = I('street');
			$data['consignee'] = I('consignee');
			$data['province']  = I('province');
			$data['city']      = I('city');
			$data['district']  = I('district');
			$data['zipcode']   = I('zipcode');
			$data['user_id']   = $_SESSION['user']['user_id'];
			$data['telephone'] = I('telephone');
			$data['mobile']    = I('mobile');	
			if ($hidden == "edit") {
				//更新数据
				if ($addressModel->where('address_id = '.$address_id)->save($data)) {
					//更新成功
					$this->redirect('Address/index');
				} else {
					//更新失败
					$message ="更新失败";
					$this->error($message);
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




	/**
	 * 处理前台ajax返回信息
	 * @return [type] [description]
	 */
	public function choose() {
		$data['parent_id'] = I('parent_id');
		$output = '';
		$data = M('region')->where($data)->select();
		$output .= "<option value='-1'>请选择</option>";
		foreach ($data as $value) {

				$output .= "<option value='".$value['region_id']."'>".$value['region_name']."</option>";
		}
		
		$this->ajaxReturn($output,'eval');

	}



	/**
	 * 获取地区三级联动信息
	 * @return [type] [description]
	 */
	public function getProvince(){
		$region = M('region');
		$province = $region->where('parent_id = 0')->select();
		$this->assign('province',$province);	
	}
}