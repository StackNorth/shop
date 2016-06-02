<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
       

       $goods = D('Goods')->getBestGoods();
       $this->assign('goods',$goods);
       $this->display();
    }
}
?>