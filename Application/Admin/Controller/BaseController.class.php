<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
	//构造方法
	public function __construct(){
		parent::__construct(); //一定要调用父类的构造方法
		$this->checkLogin();
		$this->_initMenu();

	}


	public function _initMenu() {
        $datas = D('menu')->menuTree();
       
        $this->assign('menu',$datas);
    }
	//验证是否登录
	public function checkLogin(){
		//通过session来验证
		if (!$_SESSION['admin']) {
			//没有登录
			$this->error('请先登录',U('Login/login'),1);
		}
	}
    /**
     * 删除文件函数
     * @param  [type] $dirname [description]
     * @return [type]          [description]
     */
    protected function rmdirr($dirname) {
        echo "3";
	 if (!file_exists($dirname)) {
            return false;
        }
	echo "2";
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);
        }
	echo "0";
        $dir = dir($dirname);
        if ($dir) {
            while (false !== $entry = $dir->read()) {
		echo "1";
                if ($entry == '.' || $entry == '..') {
                    continue;
                }
		echo "4";
                //递归
            //    $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
		dump($dir);
		 $this->rmdirr($dirname .  $entry);
	
            }
        }
exit;
        $dir->close();
        return rmdir($dirname);
    }

    protected function search($objModel,$obj) {
          
        
      
        if (I('keyword') == NULL) {
            $objs = $objModel->limit($page->firstRow.','.$page->listRows)->select();  
            $count = $objModel->count();      
        } else {
            $keyWord = I('keyword');
            
            $where = "{$obj}_id like '%{$keyWord}%' or {$obj}_name like '%{$keyWord}%' ";  
            $objs = $objModel->where($where)->limit($page->firstRow.','.$page->listRows)->select();
            $count = count($objs);
        if ($objs == NULL) {
            $error  = "alert('未找到搜索信息，请重新搜索'); ";
            //$error .= "window.location.href = ''";
            $this->assign('error',$error);
        }
            
        }

        
        $page = new \Think\Page($count,5);  
        $page->setConfig("prev","上一页");
        $page->setConfig("next","下一页");    
        $this->assign('page',$page->show());
        //$this->assign($obj,$objs);
        return $objs;
    }

  
}
