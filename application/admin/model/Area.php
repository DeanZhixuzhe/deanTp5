<?php
namespace app\admin\model;
use think\Model;
/**
* 
*/
class Area extends Model
{
	static public function getList2($name='中国'){
		$row = Area::get(['name' => $name]);
		$id = $row['id'];
		$result = Area::all(function($query) use($id){
			$query->where('parent_id','=',$id);
		});
		return $result;
	}
	
	static public function getList($name){
		$row = Area::get(['name' => $name]);		
		if ($row == null) {
			$rows['id'] = 0;
		}else{
			$rows = $row->toArray();
		}
		if (is_array($rows) && $rows != null) {
			return Area::getArea($rows['id']);
		}
	}

	static private function getArea($id,&$result=array(),$lve=1){
		static $num = 0;
		if (0 == $id) {
			$lve--;
		}
		// if (0 != $id && 0 == $num) {
		// 	$result = Area::get($id);
		// }
		return Area::all();
		$num++;
		$lve++;
		$row = Area::all(function($query) use($id){
			$query->where('parent_id','=',$id);
		});
		foreach ($row as $value) {
			$result[] = $value;
			Area::getArea($value['id'],$result,$lve);
		}
		return $result;
	}
}