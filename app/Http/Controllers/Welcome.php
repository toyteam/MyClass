<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * 主界面控制器
 */
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
    		$notice = new Notice($data);
    		return $notice->index();
    	}

    	public function life_fund()
    	{
    		$data = [
    		'url' => 'life_fund',
    		'title' => '缴纳班费'
    		];
    		return view('life/fund', $data);
    	}

    	public function life_form()
    	{
    		$data = [
    		'url' => 'life_form',
    		'title' => '填写表格'
    		];
    		$form = new Info($data);
    		return $form->index();
    	}

    	public function manage_notice()
    	{
    		$data = [
    		'url' => 'manage_notice',
    		'title' => '通知管理'
    		];
    		$notice = new Notice($data);
    		return $notice->manage();    		
    	}

    	public function logout()
    	{
    		session()->flush();
    		return redirect('/');
    	}
}
