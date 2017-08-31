<?php
namespace app\admin\model;
use think\Model;

/**
* nickname
* mobile
* tel
* avatar
* sex
*/
class User extends Model
{
	protected $field = ['nickname', 'mobile', 'email', 'tel', 'avatar', 'sex', 'ctime'];
	private $userAuth;
	protected function getCtimeAttr($value){
		return date('Y-m-d H:i:s',$value);
	}
	protected function setCtimeAttr($value){
		return strtotime($value);
	}
	protected function getSexAttr($value){
		if ($value == 0) {
			return "男";
		}
		if ($value == 1) {
			return "女";
		}
	}

	protected function setSexAttr($value){
		if ($value == "男") {
			return 0;
		}
		if ($value == "女") {
			return 1;
		}
		
	}
	
	public function userAuth(){
		return $this->hasMany('UserAuth');
	}
	public function update1($data,$where){
		if (is_array($data) && is_array($where)) {
			return $this->save($data,$where);
		}else{
			return false;
		}
	}

	public function showlist(){
		// return $this->paginate();
		return $this->relation('userAuth')->paginate();
		
		
	}
	public function userName(){
		$userId = $this->getData('id');
		$UserAuths = UserAuth::get($userId);
		return $UserAuths;
	}

}