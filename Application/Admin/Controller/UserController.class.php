<?php
namespace Admin\Controller;
class UserController extends BaseController {
	public function index() {
		$adminModel = M('Admin');	
		$this->search($adminModel,'admin');
		$this->display('index');
	}
	
	public function customer() {
		$userModel = M('user');
		$this->search($userModel,'user');	
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

	protected function search($objModel,$obj) {
		$count = $objModel->count();
		$page = new \Think\Page($count,5);
		$page->setConfig("prev","上一页");
		$page->setConfig("next","下一页");
		if (I('keyword') == NULL) {
			$objs = $objModel->limit($page->firstRow.','.$page->listRows)->select();		
		} else {
			$keyWord = I('keyword');
			
			$where = "{$obj}_id like '%{$keyWord}%' or {$obj}_name like '%{$keyWord}%' or email like '%{$keyWord}%' ";	
			$objs = $objModel->where($where)->limit($page->firstRow.','.$page->listRows)->select();
			
		if ($objs == NULL) {
			$error  = "alert('未找到搜索信息，请重新搜索'); ";
			$error .= "window.location.href = '1'";
			$this->assign('error',$error);
		}
			
		}
		$this->assign('page',$page->show());
		$this->assign('admins',$objs);
		
	}
}