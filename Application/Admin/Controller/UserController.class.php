<?php
namespace Admin\Controller;
class UserController extends BaseController {
	public function index() {
		$adminModel = M('Admin');	
		$this->assign('admins',parent::search($adminModel,'admin'));
		$this->display('index');
	}
	
	public function customer() {
		$userModel = M('user');
		$this->assign('admins',parent::search($userModel,'user'));	
		$this->assign('user','1');
		$this->display('index');
	}

	public function addAdmin() {
		$this->assign("addAdmin","添加管理员");
		$this->editAdmin();
	}

	public function addUser() {
		$this->assign("addUser","添加用户");
		$this->editUser();
	}

	

	public function editAdmin() {

		$data['admin_id'] = I('get.admin_id');
		$adminModel = M('admin');
		$admin = $adminModel->where($data)->select();
		$this->assign('admin',$admin);
		//编辑信息
		if (IS_POST) {
			$data['admin_id'] = I('post.admin_id');
			$data['admin_name'] = I('post.admin_name');
			$data['password'] = md5(I('post.password'));
			$data['email'] = I('post.email');
			$userModel = D('Admin');
			
			if ($userModel->updateUser($data)) {
				$this->success('更新成功',U('index'),3);
				return ;
			} else {
				$this->error('更新失败',U('index'),3);
				return ;
			}
		}
		$this->display('editAdmin');
	}

	public function editUser() {

		$data['user_id'] = I('get.user_id');
		$userModel = M('User');
		$user = $userModel->where($data)->select();
		$this->assign('user',$user);
		//编辑信息
		if (IS_POST) {
			$data['user_id'] = I('post.user_id');
			$data['user_name'] = I('post.user_name');
			$data['password'] = md5(I('post.password'));
			$data['email'] = I('post.email');
			$data['sex'] = I('post.sex');
			if ($userModel->where($data['user_id'])->save($data)) {
				$this->success('用户更新成功',U('customer'),3);
				return ;
			} else {
				$this->error('用户更新失败',U('customer'),3);
				return ;
			}
		}
		$this->display('editUser');
	}

	public function search(){
		$model = trim(strrchr($_SERVER['HTTP_REFERER'],"/"),'/');
		echo $model;
		if($model == 'index') {
			$this->assign('admins', $flag = parent::search(M('Admin'),'admin'));
			if (!$flag) {
				$this->index();
				return ;
			}		
		} else if($model == 'user'){
			$this->assign('admins', $flag = parent::search(M('user'),'user'));	
			$this->assign('user','1');
			if (!$flag) {
				$this->customer();
				return ;
			}
		}	
		$this->display('index');

	}
	
}