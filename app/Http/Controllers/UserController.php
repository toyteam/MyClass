<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
		$all_user_info = $this->user_db->getAllUserInfo();
		$this->data['all_user_info'] = $all_user_info;
		return view('manage.user', $this->data);
	}

	public function import_users()
	{
		$data = [
    		'url' => 'manage_user',
    		'title' => '人员管理'
    		];
		return view('manage.excel', $data);
	}
}
