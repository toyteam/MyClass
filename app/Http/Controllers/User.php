<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class User extends Controller
{
	protected $data;

	public function __construct($data = array())
	{
		$this->data = $data;
	}
}
