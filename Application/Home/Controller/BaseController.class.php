<?php 
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {

	public function __construct() {
		parent::__construct();
	   $cats = D('Category')->frontCats();
	   $this->init_leftMenu();
       $this->assign("cats",$cats);
       $this->assign('index',false);
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
}