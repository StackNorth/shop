<?php
namespace Admin\Controller;
use Think\Controller;
class EmptyController extends Controller {
	public function index(){
		$this->error('访问路径有误，请确定路径是否正确');
	}
	public function _empty(){
		$this->error('访问路径有误，请确定路径是否正确');
	}
} 