<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Form extends Controller
{
	protected $user_db;
	protected $form_db;
	public $data;

	public function __construct($data = array())
	{
		$this->user_db = new \App\User();
		$this->form_db = new \App\Form();
		$this->data = $data;
	}

	public function index()
	{
		return view('life/form', $this->data);
	}

	public function fill(Request $request)
	{
		// TODO when fill the form
	}
}
