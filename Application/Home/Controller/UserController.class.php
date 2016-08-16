<?php 
namespace Home\Controller;
class UserController extends BaseController {
	public function index() {
		$data['user_id'] = $_SESSION['user']['user_id'];
		$userModel = M('user');
		$userInfo = $userModel->where($data)->select(); 
		$this->assign('userInfo',$userInfo);
		if (IS_POST) {
			$data['email'] = I('email');
			$data['sex'] = I('sex','男');
			if (M('user')->where('user_id = '.$data['user_id'])->save($data)) {
				$this->redirect('User/index');

			}
		}
		$this->display();
	}

	public function password() {
		if (IS_POST) {
			$data['password'] = I('password');
			$data['newPassword'] = I('newPassword');
			$data['user_name'] = $_SESSION['user']['user_name'];
			$data['user_id'] = $_SESSION['user']['user_id'];
			$userModel = D('user');
			if ($userModel->checkPassword($data)) {
				$this->redirect('User/index');
			} else {
				$this->error("密码输入错误") ;
			}
			return;
		}
		$this->display();
	}
}