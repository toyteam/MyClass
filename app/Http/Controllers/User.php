<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class User extends Controller
{
	protected $data;
	protected $user_db;

	public function __construct($data = array())
	{
		$this->data = $data;
		$this->user_db = new \App\User;
	}

	public function manage()
	{
		$all_user_info = $this->user_db->getAllUserInfo();
		$this->data['all_user_info'] = $all_user_info;
		return view('manage.user', $this->data);
	}
}
