<?php 
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {

	public function __construct() {
		parent::__construct();
	   $cats = D('Category')->frontCats();
       $this->assign("cats",$cats);
       $this->assign('index',false);
	}
		//生成验证码
	public function code(){
		// 使用tp自带的验证码类
		$Verify = new \Think\Verify();
		$Verify->entry();
	}
	public function logout() {
		session('[destroy]'); // 销毁session
		$this->success("",U('index/index'),1);
	}
}