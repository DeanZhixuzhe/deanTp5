<?php
namespace app\admin\model;
use think\Model;

/**
* 
*/
class UserAuth extends Model
{
	/**
    * 用户登录
    * @param  string $username 用户名
    * @param  string $password 密码
    * @return bool  成功返回true，失败返回false。
    */
    static public function login($username,$password)
    {
    	$usernameStr = array('identifier' => $username);
    	$userAuth = UserAuth::get($usernameStr);
    	if (!is_null($userAuth)) {
    		if ($userAuth->checkPassword($password)) {
    			session('userId',$userAuth->getData('user_id'));
    			return true;
    		}
    	}
        return false;
    }

    /**
     * 验证密码是否正确
     * @param  string $password 密码
     * @return bool           
     */
    public function checkPassword($password)
    {
    	if ($this->getData('credential') === $this::encryptPassword($password)) {
    		return true;
    	}else{
    		return false;
    	}
    }

    /**
    * 密码加密算法
    * @param    string                   $password 加密前密码
    * @return   string                             加密后密码
    * @author author
    * @DateTime 2017-10-21T09:26:18+0800
    */
    static public function encryptPassword($password)
    {
        // 实际的过程中，我还还可以借助其它字符串算法，来实现不同的加密。
        return strtoupper(sha1(strtoupper(md5($password))));
    }
}