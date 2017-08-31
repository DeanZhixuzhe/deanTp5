<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Area;
use think\Request;

/**
* 
*/
class AreaController extends IndexController
{
	private function infinite($arr=[],$name='',$showtop=1){
		if (empty($name) || null == $name) {
			$init['id'] = 0;
			$init['tier'] = 0;
		}else{
			$init = Area::get(['name' => $name]);
			$init['tier'] = substr_count($init['path'],'-')+1;
		}
		if ($init['id'] == 0) {
			$showtop = 1;
		}
		foreach ($arr as $key => &$value) {
			$num = substr_count($value['path'],'-');
			if ($init['tier']-$num>0) {
				unset($arr[$key]);
			}elseif (explode('-',$value['path'])[$init['tier']] != $init['id']) {
				unset($arr[$key]);
			}else{
				if ($showtop == 0) {
					if ($value['parent_id'] == $init['id']) {
						$pre = '|-';
					}else{
						$pre = '|'.str_repeat('-',$num-$init['tier']+1);
					}
				}else{
					if ($value['parent_id'] == $init['id']) {
						$pre = '';
					}else{
						$pre = '|'.str_repeat('-',$num-$init['tier']);
					}
				}
				$value['tree'] = $pre.$value['name'];
			}
		}
		if ($showtop == 0) {
			$init['tree'] = $init['name'];
			$arr[] = $init;
		}
		foreach ($arr as $v) {
			$sort[] = $v['path'].'-'.$v['id'];
		}
		array_multisort($sort,$arr);
		return $arr;
	}

	public function showlist(){
		$list = $this->infinite(Area::all(),'亚洲');
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function liandong(Request $request){
		if ($request->isAjax()) {
			$areas = Area::getList2($request->param('name'));
			return $areas;
		}else{
			return false;
		}
	}
	function add(){

	}

	function del(){
		
	}

}