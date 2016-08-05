<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
	//构造方法
	public function __construct(){
		parent::__construct(); //一定要调用父类的构造方法
		$this->checkLogin();
		
	}
	
	//验证是否登录
	public function checkLogin(){
		//通过session来验证
		if (!$_SESSION['admin']) {
			//没有登录
			$this->error('请先登录吧',U('Login/login'));
		}
	}

    protected function rmdirr($dirname) {
        if (!file_exists($dirname)) {
            return false;
        }
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);
        }
        $dir = dir($dirname);
        if ($dir) {
            while (false !== $entry = $dir->read()) {
                if ($entry == '.' || $entry == '..') {
                    continue;
                }
                //递归
                $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
            }
        }
        $dir->close();
        return rmdir($dirname);
    }
}