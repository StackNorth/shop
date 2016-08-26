<?php 
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {

	public function __construct() {
		parent::__construct();
	   $cats = D('Category')->frontCats();
	   $this->init_leftMenu();
	   $this->init_upMenu();
       $this->assign("cats",$cats);
       $this->assign('index',false);
	}

	public function init_upMenu() {
		$upMenu = M('homeMenu')->select();
		$this->assign('upMenu',$upMenu);
		
	}
	public function init_leftMenu() {
     
        $hotGoods =  D('goods')->getLeftHotGoods();
        $this->assign('hotGoods',$hotGoods);
        $data= D('goods')->field('cat_id')->find($goods_id);
        $leftMenu = D('category')->Tree();
        $this->assign('leftMenu',$leftMenu);
        //获取面包屑导航
        $parentCats = D('category')->getParents($data['cat_id']);
        $this->assign('parentCats',$parentCats);
    }
		//生成验证码
	public function code(){
		// 使用tp自带的验证码类
		$Verify = new \Think\Verify();
		$Verify->entry();
	}
	public function logout() {
		session('[destroy]'); // 销毁session
		$this->redirect('Login/index');
	}

	//获取用户的地址
	public function getAddress($address) {
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

		return $address;
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