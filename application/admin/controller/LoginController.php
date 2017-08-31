<?php
namespace app\admin\controller;
use think\Input;
use think\Controller;
use Captcha;
use app\admin\model\UserAuth;
class LoginController extends Controller
{
    public function index(){
        if (session('userId') === null) {
            return $this->fetch('index');
        }else{
            return $this->error('请不要重复登录','index/index');
        }
    }

    public function login(){
        $param = input('post.');
    	if (!captcha_check($param['code'])) {
    		return $this->error("验证码错误","index");
    	}
        if (UserAuth::login($param['username'],$param['password'])) {
            return $this->success('登录成功',url('Index/index'));
        }else{
            return $this->success('用户名或密码错误',url('index'));
        }
    }

    public function logout(){
        session('userId',null);
        return $this->success('退出成功','index');
    }
}