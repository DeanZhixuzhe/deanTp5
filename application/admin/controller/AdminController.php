<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Url;
use app\admin\model\User;
use app\admin\model\UserAuth;
/**
* 
*/
class AdminController extends IndexController
{
	protected $request;
	protected $user;
	protected $userAuth;
	public function __construct(Request $request,User $user,UserAuth $userAuth){
		parent::__construct();
		$this->request = $request;
		$this->user = $user;
		$this->userAuth = $userAuth;
	}

	public function luyoutest(Request $request,$name,$city='chongqing'){
		
		echo 'Hello:' . $name . '! You from ' . $city . '!' . '<br>';
		
		echo Url::build('admin/Admin/base','id=55&name=tp');
		return $request->param('name','city');
	}
	public function add(){

	}
	public function delete(){

	}
	public function edit(){
		if ($this->request->isAjax()) {
			$where['id'] = $this->request->session('userId');
			if ($this->user->update1($this->request->param(),$where)) {
				return "修改成功";
			}else{
				return "修改失败";
			}
		}else{
			return "错误";
		}		
	}

	public function admin_list(){
		$adminList = $this->user->showlist();
		// $username = $this->user->userAuth->get(['type' => 'username']);
		// $username = $this->user->userAuth->where('type','username')-find();
		// $data['type'] = 'username';
		// $data['user_id'] = $adminList->id;
		// $users = User::all();
		// echo $users->getData('id');
		$username = UserAuth::get(1);
		$username = $this->user->userName();
		$this->assign('username',$username);
		$this->assign('volist',$adminList);
		return $this->fetch();
	}

    public function myinfo(){	
    	$user = $this->user->get($this->request->session('userId'));
    	$userAuths = $user->userAuth;
    	$this->assign('userAuths',$userAuths);
    	$this->assign('user',$user);
    	return $this->fetch('');
    }


}