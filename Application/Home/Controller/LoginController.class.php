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
				$error = "alert('请先填写正确的验证码信息');";
				$this->assign('error',$error);

			} else {
			
				//再来检查用户名和密码,调用模型来完成
				if (D('user')->checkUser($username,$password)) {
					$this->redirect('Index/index');
					return;
				} else {
					$error = "alert('账号或用户名错误');";
					$this->assign('error',$error);

				}
			}
			
		} 
		// 载入登录页面
		$this->display();
	}


	public function checkCaptcha() {
		$verify = new \Think\Verify();
		if (!$verify->check($captcha)){
			$this->ajaxReturn("验证码错误",'eval');
		}
		
	}
}