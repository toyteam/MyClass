<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Welcome extends Controller
{
    	public function __construct()
    	{

    	}

    	public function index()
    	{
    		$data = [
    		'url' => 'notice',
    		'title' => '班级通知'
    		];
    		return view('notice', $data);
    	}

    	public function life_fund()
    	{
    		$data = [
    		'url' => 'fund',
    		'title' => '缴纳班费'
    		];
    		return view('life/fund', $data);
    	}

    	public function life_form()
    	{
    		$data = [
    		'url' => 'form',
    		'title' => '填写表格'
    		];
    		$form = new Info($data);
    		return $form->index();
    	}

    	public function logout()
    	{
    		session()->flush();
    		return redirect('/');
    	}
}
