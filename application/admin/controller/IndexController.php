<?php
namespace app\admin\controller;
use think\Controller;
class IndexController extends Controller
{
	
	public function __construct(){
		parent::__construct();
		if (!$this->isLogin()) {
			return $this->error('请登录','Login/index');
		}
		
	}
	public function index(){
		return $this->fetch();
	}
	public function welcome(){
		$info['PHP_OS'] = PHP_OS;
		$info['THINK_VERSION'] = THINK_VERSION;
		$this->assign('info',$info);
		return $this->fetch();
	}
	
    /**
     * 判断用户是否已登录
     * @return boolean 已登录true
     */
    static public function isLogin()
    {
        $userId = session('userId');
        // isset()和is_null()是一对反义词
        if (isset($userId)) {
            return true;
        } else {
            return false;
        }
    }
}
