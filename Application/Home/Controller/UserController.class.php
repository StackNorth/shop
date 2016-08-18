<?php 
namespace Home\Controller;
class UserController extends BaseController {
	public function __construct() {
		parent::__construct();
		if (empty(session('user'))) {
			$this->redirect('Login/index');
		}
	}
	public function index() {
		$data['user_id'] = $_SESSION['user']['user_id'];
		$userModel = M('user');
		$userInfo = $userModel->where($data)->select(); 
		$this->assign('userInfo',$userInfo);
		if (IS_POST) {
			$data['email'] = I('email');
			$data['sex'] = I('sex','男','string');
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



	//购物车
	 public function shoppingCat() {
    	if (IS_POST) {
    		$goods_id = I('post.goods_id');
    		if ($goods_id == $_SESSION['user']['shoppingCat'][$goods_id]['goods_id']) {
    			$_SESSION['user']['shoppingCat'][$goods_id]['goods_nums'] = I('post.goods_nums');
    		} else {
	    		foreach($_POST as $key => $value) {
	    			//将添加购物车的值存入session中
	    			$_SESSION['user']['shoppingCat'][$goods_id][$key] = $value;
	    		}
	    		$_SESSION['user']['shopNumber'] += 1; 
    		}
    		$this->redirect('Goods/index',array('id' => $goods_id));
    	}
    	
    }

}
