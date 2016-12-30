<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
	protected $user_db ;

	public function __construct()
	{
		$this->user_db = new \App\UserModel();
	}

    	public function index()
    	{
    		return view('login');
    	}

    	public function check(Request $request)
    	{

    		$validator = \Validator::make($request->input(),[
    			'user_sno' => 'required',
    			'user_pw' =>'required'
    			],[
    			'required' => ':attribute为必填项'
    			],[
    			'user_sno' => '学号',
    			'user_pw' => '密码'
    			]);

    		if ($validator->fails()) {
    			return redirect()->back()->withErrors($validator)->withInput();
    		}

    		$user_sno = $request->input('user_sno');
    		$user_pw = $request->input('user_pw');

    		if(! ($user_info = $this->user_db->getUserInfoBySno($user_sno))){
    			return redirect()->back()->withInput($request->except('user_pw'))->withErrors('此学号不存在！');
    		}
    		
    		if(! password_verify($user_pw, $user_info->user_pw)){
    			return redirect()->back()->withInput($request->except('user_pw'))->withErrors('学号或密码错误！');
    		}

    		return $this->afterLogin($user_info);
    	}

    	private function afterLogin($user_info)
    	{
    		// 保存上次的信息
    		$user_latest_login_time = $user_info->user_latest_login_time;
    		$user_latest_ip = $user_info->user_latest_ip;

    		$user_info->user_latest_login_time = time();
    		$user_info->user_latest_ip = $this->getIP();

    		if($this->user_db->updateUserInfo($user_info->id, $user_info)){
    			session()->put('isLogin', 1);  			
    			session()->put('user_info', $user_info);
                                                        session()->put('user_latest_login_time', $user_latest_login_time);
                                                        session()->put('user_latest_ip', $user_latest_ip);
    			return redirect('welcome');
    		} else {
    			return redirect()->back()->withErrors('系统错误：登录失败，请及时联系管理员');
    		}
    	}

    	private function getIP(){ 

		if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
			$ip = getenv("HTTP_CLIENT_IP"); 
		} else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")){
			$ip = getenv("HTTP_X_FORWARDED_FOR"); 
		} else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
			$ip = getenv("REMOTE_ADDR"); 
		} else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")){ 
			$ip = $_SERVER['REMOTE_ADDR']; 
		} else { 
			$ip = "unknown";
		}

		return $ip ; 
	}
}
