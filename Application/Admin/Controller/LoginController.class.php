<?php
namespace Admin\Controller;
use Think\Controller;
//登录控制器
class LoginController extends Controller {
	//显示登录页面并验证
	public function login(){

		if (IS_POST) {
			$rememberMe = I('post.rememberMe');
			
			//获取验证码、用户名和密码
			$username = I('username');
			$password = I('password');
			
			//$captcha = I('captcha');
			//验证,注意顺序
			//先检查验证码
			/*$verify = new \Think\Verify();
			if (!$verify->check($captcha)){
				$this->error('验证码错误','login',2);
			}*/
			
			//再来检查用户名和密码,调用模型来完成
			if (D('admin')->checkUser($username,$password)) {
				//记住账号密码
				if ($rememberMe == 'on') {
					cookie('username',I('post.username'),3600 * 24 * 7);
					cookie('password',I('post.password'),3600 * 24 * 7);
				} 	
				$this->success('登录成功',U('Index/index'),1);
			} else {
				$this->error('用户名或密码错误','login',2);
			}
			return;
		} 
		// 载入登录页面
		$this->display();
	}

	//生成验证码
	public function code(){
		// 使用tp自带的验证码类
		$Verify = new \Think\Verify();
		$Verify->entry();
	}

	//注销
	public function logout(){
		session('[destroy]'); // 销毁session
		cookie('username',null);
		cookie('password',null);
		$this->success('注销成功',U('Login/login'),1);
	}

}