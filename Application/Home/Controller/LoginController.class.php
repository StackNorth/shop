<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends BaseController {

	public function index() {
		if (IS_POST) {
			//获取验证码、用户名和密码
			$username = I('user_name');
			$password = I('password');
			$captcha = I('captcha');
			//验证,注意顺序
			//先检查验证码
			$verify = new \Think\Verify();
			if (!$verify->check($captcha)){
				$this->error('验证码错误');
			}
			
			//再来检查用户名和密码,调用模型来完成
			if (D('user')->checkUser($username,$password)) {
				$this->success('登录成功',U('Index/index'),1);
			} else {
				$this->error('用户名或密码错误');
			}
			return;
		} 
		// 载入登录页面
		$this->display();
	}



}