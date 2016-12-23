<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Login extends Controller
{
	protected $stu_db ;
	private $stu_info;

	public function __construct()
	{
		$this->stu_db = new \App\StuInfo();
	}

    	public function index()
    	{
    		return view('login');
    	}

    	public function check(Request $request)
    	{

    		$validator = \Validator::make($request->input(),[
    			'stu_sno' => 'required',
    			'stu_pw' =>'required'
    			],[
    			'required' => ':attribute为必填项'
    			],[
    			'stu_sno' => '学号',
    			'stu_pw' => '密码'
    			]);

    		if ($validator->fails()) {
    			return redirect()->back()->withErrors($validator)->withInput();
    		}

    		$stu_sno = $request->input('stu_sno');
    		$stu_pw = $request->input('stu_pw');
    		$stu_info = $this->stu_db->getStuInfoBySno($stu_sno);

    		if(! ($stu_info = $this->stu_db->getStuInfoBySno($stu_sno))){
    			return redirect()->back()->withInput($request->except('stu_pw'))->withErrors('此学号不存在！');
    		}
    		
    		if(! password_verify($stu_pw, $stu_info->stu_pw)){
    			return redirect()->back()->withInput($request->except('stu_pw'))->withErrors('学号或密码错误！');
    		}

    		return $this->afterLogin($stu_info);
    	}

    	private function afterLogin($stu_info)
    	{
    		$stu_info->stu_last_login_time = time();
    		$stu_info->stu_last_login_ip = $this->getIP();

    		if($this->stu_db->updateStuInfo($stu_info->id, $stu_info)){
    			session()->put('isLogin', 1);
    			session()->put('stu_info', $stu_info);
    			return redirect('welcome');
    		} else {
    			return redirect()->back()->withInput($request->except('stu_pw'))->withErrors('系统错误：登录失败，请及时联系管理员');
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
