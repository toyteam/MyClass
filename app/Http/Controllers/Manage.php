<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Manage extends Controller
{
	protected $user_db;
	protected $form_db;

	public function __construct()
	{
		$this->user_db = new \App\User();
		$this->form_db = new \App\Form();
	}

    	public function index()
    	{
    		return view('manage.index');
    	}
}
