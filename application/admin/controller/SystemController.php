<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

/**
* 
*/
class SystemController extends IndexController
{
	public function base(){
		return $this->fetch();
	}

	public function dataDict(){
		return $this->fetch();
	}

	public function category(){
		return $this->fetch();
	}

	public function categoryAdd(){
		return $this->fetch();
	}
	public function shielding(){
		return $this->fetch();
	}

	public function log(){
		return $this->fetch();
	}
}