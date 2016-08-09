<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
       $bestGoods = D('Goods')->getBestGoods();
       $newGoods  = D('Goods')->getNewGoods();
       $hotGoods  = D('Goods')->getHotGoods();
       $this->assign('best',$bestGoods);
       $this->assign('new',$newGoods);
       $this->assign('hot',$hotGoods);
       $leftMenu = D('category')->Tree();
      
	   $this->assign('leftMenu',$leftMenu);
       $this->display();
    }




}
?>