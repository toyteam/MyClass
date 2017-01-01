<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Datatables;

class UserController extends Controller
{
	protected $data;
	protected $user_db;

	public function __construct($data = array())
	{
		$this->data = $data;
		$this->user_db = new \App\UserModel;
	}

	public function manage()
	{
		return view('manage.user', $this->data);
	}

            	public function ajax_manage()
            	{
            		return Datatables::of($this->user_db->getAllUserInfoQuery())
            		->editColumn('user_latest_login_time', '{{ date("Y-m-d H:i:s", $user_latest_login_time)}}')
            		->addColumn('operations', '
            			                  	<a title="修改信息" href="{{ url("manage/user/edit/$user_id") }}"><i class="fa fa-edit"></i>修改</a>
		                        	&nbsp;&nbsp;&nbsp;&nbsp;
		                        	<a title="删除" href="{{ url("manage/user/delete/$user_id") }}"><i class="fa fa-remove"></i>删除</a>
            			')
            		->make(true);
            	}

	public function importUsers()
	{
		$data = [
    		'url' => 'manage_user',
    		'title' => '人员管理'
    		];
		return view('manage.excel', $data);
	}

	/**
	 * [checkOneInfo description]
	 * @return [type] [description]
	 */
	public function checkOneInfo()
	{
		$this->data['user_info'] = $this->user_db->getUserInfoById(session()->get('user_info')->id);
		return view('info.check', $this->data);
	}

	/**
	 * [editOneInfo description]
	 * @return [type] [description]
	 */
	public function editOneInfo()
	{
		$this->data['user_info'] = $this->user_db->getUserInfoById(session()->get('user_info')->id);
		return view('info.edit', $this->data);
	}


	public function editInfo(Request $request)
	{

    		$validator = \Validator::make($request->input(),[
    			'user_phone' => 'required',
    			'user_postcode' =>'required',
    			'user_address' => 'required',
    			],[
    			'required' => ':attribute为必填项'
    			],[
    			'user_phone' => '手机',
    			'user_postcode' => '邮编',
    			'user_address' => '家庭住址'
    			]);	

    		if ($validator->fails()) {
    			return redirect()->back()->withErrors($validator)->withInput();
    		}

    		$id = $request->input('id');
    		$data = $request->all();

    		if (isset($data['_token'])) {
    			unset($data['_token']);
    		}

    		if ($this->user_db->updateUserInfo($id, $data)) {

    			return redirect(url('info/check'));
    		} else {
    			return redirect()->back()->withErrors('系统错误：修改失败，请及时联系管理员');
    		}
	}

	public function editOndePassword()
	{
		return view('info.password', $this->data);
	}

	public function editPassword(Request $request)
	{
    		$validator = \Validator::make($request->input(),[
    			'user_origin_pw' => 'required',
    			'user_new_pw' =>'required|confirmed',
    			'user_new_pw_confirmation' => 'required'
    			],[
    			'required' => ':attribute为必填项',
    			'confirmed' => '确认密码与:attribute不一致'
    			],[
    			'user_origin_pw' => '原密码',
    			'user_new_pw' => '新密码',
    			'user_new_pw_confirmation' => '确认密码'
    			]);
       		
       		if ($validator->fails()) {
    			return redirect()->back()->withErrors($validator)->withInput();
    		}

    		$id = $request->input('id');

    		if ($info = $this->user_db->getUserInfoById($id)) {
    			$origin_pw = $request->input('user_origin_pw');
    			if (! password_verify($origin_pw, $info->user_pw)) {
    				return redirect()->back()->withErrors("原密码输入有误")->withInput();
    			}
    		} else {
    			return redirect()->back()->withErrors('系统错误：找不到此人，请及时联系管理员');
    		}

    		$data['user_pw'] = password_hash($request->input('user_new_pw'), PASSWORD_DEFAULT);

    		if ($this->user_db->updateUserInfo($id, $data)) {

    			return redirect(url('info/check'));
    		} else {
    			return redirect()->back()->withErrors('系统错误：修改失败，请及时联系管理员');
    		}    					
	}
}
