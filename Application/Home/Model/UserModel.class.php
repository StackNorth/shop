<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {

	public function registerUser($user_name,$password,$email){
		$condition['user_name'] = $user_name;
		$condition['password'] = md5($password);
		$condition['email'] = $email;
		$condition['reg_time'] = time();
		if ($this->add($condition)) {
			return true;
		}
		return false;
	}
	//登陆
	public function checkUser($user_name, $password) {
		$condition['user_name'] = $user_name;
		$condition['password'] = md5($password);
		if ($user = $this->where($condition)->find()) {
			session('user',$user);
			return true;
		}
		return false;

	}

}