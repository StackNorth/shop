<?php
namespace Home\Model;
use Think\Model;
class FooterModel extends Model {
	public function getTree() {
		$tree = $this->select();
		return $this->Tree($tree);

	}

	public function Tree($tree , $pid = 0) {
		 $data = array();
		foreach( $tree as $key => $value) {
			if ($value['parent_id'] == $pid) {
				$value['child'] = $this->Tree($tree,$value['id']);
				$data[] = $value;
			}
		}
		return $data;
	}


	public function getFooterHtml(){
		$output ='';
		$data = $this->getTree();
		foreach($data as $value) {
			$output .= "<dl><dt>".$value['value']."</dt>";
		
			foreach ($value['child'] as $child) {
				$output .= "<dd><a href=''><span>".$child['value']."</span></a></dd>";
				
			}  
			$output .= '</dl>';
		}
		
		return $output;
	}
}
