<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * 通知控制器
 */
class Notice extends Controller
{
    	protected $data;

    	public function __construct($data = array())
    	{
    		$this->data = $data;
    	}

    	public function index()
    	{
    		return view('notice', $this->data);
    	}

    	public function manage()
    	{
    		return view('manage.notice', $this->data);
    	}
}
