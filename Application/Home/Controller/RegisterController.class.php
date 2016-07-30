<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends BaseController {
	public function index() {
		if (IS_POST) {
			$user_name = I('user_name');
			$password = I('password');
			$email = I('email');
			$captcha = I('captcha');

			$verify = new \Think\Verify();
			if (!$verify->check($captcha)) {
				$this->error('验证码错误');
			}
			if (D('user')->registerUser($user_name,$password,$email)) {
				$this->success("注册成功",U('Login/index'),1);
				return ;
			} 
		}
		$this->display();
	}

}