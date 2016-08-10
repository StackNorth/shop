<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
       $bestGoods = D('Goods')->getBestGoods(8);
       $newGoods  = D('Goods')->getNewGoods(8);
       $hotGoods  = D('Goods')->getHotGoods();
       $rightGoods  = D('Goods')->getHotGoods(8);
       $this->assign('best',$bestGoods);
       $this->assign('new',$newGoods);
       $this->assign('hot',$hotGoods);
        $this->assign('right',$rightGoods);
       $leftMenu = D('category')->Tree();
      
	     $this->assign('leftMenu',$leftMenu);

       $this->display();
    }




}
?>