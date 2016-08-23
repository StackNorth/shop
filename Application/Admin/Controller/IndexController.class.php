<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
    	//载入模板页面
    	$this->display();
    }


   
    public function clearCache() {
        $result = 0;

        if (is_dir(RUNTIME_PATH) && $this->rmdirr(RUNTIME_PATH)) {
            $result = 1;
            $this->success('缓存清除成功',U('Index/index'),1);
            return ;
        }
        $this->error('缓存清除失败',U('Index/index'),1);
        return;

    }
}