<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends BaseController {
	
	//显示商品
	public function index(){
		$goodsModel = M('goods');

		$count = $goodsModel->count();
		
		
		$where = '';
		if (I('keyword')) {
			$keyWord = I('keyword');
			$where .= "goods_id like '%{$keyWord}%' or goods_name like '%{$keyWord}%' or goods_sn like '%{$keyWord}%' or shop_price like '%{$keyWord}%' ";	
			$count = count($goodsModel->where($where)->select());
			/*echo $goodsModel->getLastSql();
			  exit;
			  echo $count;*/
			
		}
		$page = new \Think\Page($count,5);
		$page->setConfig('prev',"上一页");
		$page->setConfig('next',"下一页");
		$goods = $goodsModel->where($where)->limit($page->firstRow.','.$page->listRows)->select();
		

		$show = $page->show();
		$this->assign("page",$show);
		$this->assign("goods",$goods);
		$this->display();
	}	

	//添加商品
	public function add(){
		if (IS_POST) {
			//入库		 
			if (I('goods_sn')) {
				$data['goods_sn'] = I('goods_sn'); 
			} else {
				$data['goods_sn'] = rand(0,99999999);
			}
			$data['goods_name'] = I('goods_name');
			$data['cat_id'] = I('cat_id'); 
			$data['brand_id'] = I('brand_id'); 
			$data['shop_price'] = I('shop_price'); 
			$data['market_price'] = I('market_price'); 
			$is_promote = I('is_promote');
			//echo dirname('../');
			if ($is_promote == 1){
				$data['promote_start_time'] = I('promote_start_time'); 
				$data['promote_end_time'] = I('promote_end_time'); 
			}

			//处理上传图片
			if ($_FILES['goods_img']['tmp_name'] != '') {
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize  = 3145728 ;// 设置附件上传大小
				$upload->exts     = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath = "./"; //注意，一定要设置这个/home/wwwroot/www.stackwin.cn/shop/Public
				$upload->savePath  =  './Public/Uploads/'; // 设置附件上传目录/home/wwwroot/www.stackwin.cn/shop
				//var_dump($upload);
				$info  =  $upload->uploadOne($_FILES['goods_img']);
				//var_dump($info);
				if ($info) {
					// 上传成功
					$data['goods_img'] = $info['savepath'].$info['savename'];
				} else {
					echo $upload->getError();die();
				}
			}
			//处理上传图片
	
			if ($_FILES['goods_thumbs']['tmp_name'] != '') {
				import("Org.Net.UploadFile");  
				$upload = new \UploadFile();// 实例化上传类
				$upload->maxSize  = 3145728 ;// 设置附件上传大小
				$upload->exts     = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath = "/home/wwwroot/www.stackwin.cn/shop/Public"; //注意，一定要设置这个
				$upload->savePath  =  '/home/wwwroot/www.stackwin.cn/shop/Public/Uploads/thumb/'.date("Y/m/d/H/i/s").'/'; // 设置附件上传目录
				if ($upload->upload('goods_thumbs')) {
					// 上传成功
					$thumbs = $upload->getUploadFileInfo();
					$goodsThumbModel = M('goods_thumb');
					foreach ($thumbs as $thumb) {
						$arr['thumb_img']  = $thumb['savepath'].$thumb['savename'];
						$arr['goods_sn']   = $data['goods_sn'];
						$arr['thumb_time'] = time();
						if (!M('goods_thumb')->add($arr)) {
							$this->error('添加失败，写入地址失败');
						}
					}
					
				}
			}
			

			$data['goods_desc']   = I('goods_desc'); 
			$data['goods_number'] = I('goods_number'); 
			$data['goods_brief']  = I('goods_brief'); 
			$data['goods_desc']   = I('goods_desc'); 
			$data['is_best']      = I('is_best'); 
			$data['is_new']       = I('is_new'); 
			$data['is_hot']       = I('is_hot'); 
			$data['is_onsale']    = I('is_onsale'); 
			$data['add_time']     = time();
			$goodsModel = D('goods');
			//var_dump($data);exit;
			if ($goodsModel->create($data)) {
				//创建成功
				if ($goods_id = $goodsModel->add()) {
					//添加成功，添加其他表数据
					$attr_ids    = I('attr_id_list');
					$attr_values = I('attr_value_list');
					$attr_prices = I('attr_price_list');
					$attrs = array();
					foreach ($attr_ids as $k => $v) {
						$attrs = array(
							"goods_id"   => $goods_id,
							"attr_price" => $attr_prices[$k],
							"attr_id"    => $v,
							"attr_value" => $attr_values[$k]
							);
					}
					M('goods_attr')->addAll($attrs);
					$this->success('商品添加成功',U('index'),1);
		
	} else {
					$this->error("商品添加失败");
				} 
			} else {
					$this->error($goodsModel->getError());
			}

			return;
		} 
		//载入添加页面
		$cats = D('category')->catTree();
		$brands = M('brand')->select();
		$types = M('goods_type')->select();
		$this->assign('cats',$cats);
		$this->assign('brands',$brands);
		$this->assign('types',$types);
		$this->display();
	}
	//编辑商品
	public function edit(){
			$data['goods_id'] = I('get.goods_id');
			$goodsModel = D('goods');
			$goods = $goodsModel->where($data)->select();
			$this->assign('goods',$goods);
			//入库
			if (IS_POST) {
			//入库
			$data['goods_name'] = I('goods_name'); 
			if (I('goods_sn')) {
				$data['goods_sn'] = I('goods_sn'); 
			} else {
				$data['goods_sn'] = rand(0,99999999);
			}

			$data['cat_id'] = I('cat_id'); 
			$data['brand_id'] = I('brand_id'); 
			$data['shop_price'] = I('shop_price'); 
			$data['market_price'] = I('market_price'); 
			$is_promote = I('is_promote');

			if ($is_promote == 1){
				$data['promote_start_time'] = I('promote_start_time'); 
				$data['promote_end_time'] = I('promote_end_time'); 
			}

			//处理上传图片
			if ($_FILES['goods_img']['tmp_name'] != '') {
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize  = 3145728 ;// 设置附件上传大小
				$upload->exts     = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath = "./"; //注意，一定要设置这个/home/wwwroot/www.stackwin.cn/shop
				$upload->savePath  =  './Public/Uploads/'; // 设置附件上传目录
				$info  =  $upload->uploadOne($_FILES['goods_img']);
				if ($info) {
					// 上传成功
					$data['goods_img'] = $info['savepath'].$info['savename'];
				}
			}
			//缩略图处理
				
			if ($_FILES['goods_thumbs']['tmp_name'] != '') {
				import("Org.Net.UploadFile");  
				$upload = new \UploadFile();// 实例化上传类
				$upload->maxSize  = 3145728 ;// 设置附件上传大小
				$upload->exts     = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
				$upload->rootPath = "./"; //注意，一定要设置这个
				$upload->savePath  =  './Public/Uploads/thumb/'.date("Y/m/d/H/i/s").'/'; // 设置附件上传目录
				if ($upload->upload('goods_thumbs')) {
					// 上传成功
					$thumbs = $upload->getUploadFileInfo();
					$goodsThumbModel = M('goods_thumb');
					$goodsThumbModel->where('goods_sn = '.$data['goods_sn'])->delete();
					foreach ($thumbs as $thumb) {
						$arr['thumb_img'] = $thumb['savepath'].$thumb['savename'];
						$arr['goods_sn'] = $data['goods_sn'];
						$arr['thumb_time'] = time();
						if (!M('goods_thumb')->add($arr)) {
							$this->error('添加失败，写入地址失败');
						}
					}
				}
			}			
			
			$data['goods_desc'] = I('goods_desc'); 
			$data['goods_number'] = I('goods_number'); 
			$data['goods_brief'] = I('goods_brief'); 
			$data['goods_desc'] = I('goods_desc'); 
			$data['is_best'] = I('is_best'); 
			$data['is_new'] = I('is_new'); 
			$data['is_hot'] = I('is_hot'); 
			$data['is_onsale'] = I('is_onsale'); 
			$data['add_time'] = time();
			//$goodsModel = D('goods');

			if ($goodsModel->create($data)) {
				//创建成功
				if ($goods_id = $goodsModel->save()) {
					//添加成功，添加其他表数据
					$attr_ids = I('attr_id_list');
					$attr_values = I('attr_value_list');
					$attr_prices = I('attr_price_list');
					$attrs = array();
					foreach ($attr_ids as $k => $v) {
						$attrs = array(
							"goods_id" => $goods_id,
							"attr_price" => $attr_prices[$k],
							"attr_id" => $v,
							"attr_value" => $attr_values[$k]
							);
					}
					M('goods_attr')->addAll($attrs);
					$this->success('商品修改成功',U('index'),1);
				} else {
					$this->error("商品修改失败");
				} 
			} else {
					$this->error($goodsModel->getError());
			}

			return;
		} 
		//载入添加页面
		$cats = D('category')->catTree();
		$brands = M('brand')->select();
		$types = M('goods_type')->select();
		$this->assign('cats',$cats);
		$this->assign('brands',$brands);
		$this->assign('types',$types);
		//载入编辑页面
		$this->display(); 
	}

	//删除商品
	public function delete(){
		$data['goods_id'] = I('get.goods_id');
		$goodsModel = M('goods');
		$goods = $goodsModel->where($data)->select();

		if ($goodsModel->where($data)->delete()) {
			if (M('goods_thumb')->where('goods_sn ='.$goods['goods_sn'])->delete()){
				$this->success('删除成功',U('Goods/index'),3);
			} else {
				$this->error('该商品没有缩略图',U('index'),2);
			}
		} else {
			$this->error('删除失败',U('index'),3);
		}
		
	}

	public function search(){
		$this->assign('goods',parent::search(M('goods'),'goods'));
		
		$this->display('index');

	}
}

