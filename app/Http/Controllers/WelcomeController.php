<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * 主界面控制器
 */
class WelcomeController extends Controller
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
    		$notice = new NoticeController($data);
    		return $notice->index();
    	}

        // life

    	public function life_fund()
    	{
    		$data = [
    		'url' => 'life_fund',
    		'title' => '班费缴纳'
    		];
    		return view('life/fund', $data);
    	}

    	public function life_form()
    	{
    		$data = [
    		'url' => 'life_form',
    		'title' => '表格填写'
    		];
    		$form = new FormController($data);
    		return $form->index();
    	}

        // info

    	public function info_check()
    	{
    		$data = [
    		'url' => 'info_check',
    		'title' => '信息查看'
    		];

    		$user = new UserController($data);
    		return $user->checkOneInfo();
    	}

    	public function info_edit()
    	{
    		$data = [
    		'url' => 'info_edit',
    		'title' => '信息修改'
    		];

    		$user = new UserController($data);
    		return $user->editOneInfo();
    	}

                	public function info_password_edit()
                	{
                		$data = [
                		'url' => 'info_password_edit',
                		'title' => '密码修改'
                		];

                		$user = new UserController($data);
                		return $user->editOndePassword();
                	}

        //manage
        
    	public function manage_notice()
    	{
    		$data = [
    		'url' => 'manage_notice',
    		'title' => '通知管理'
    		];
    		$notice = new NoticeController($data);
    		return $notice->manage();    		
    	}

    	public function manage_user()
    	{
    		$data = [
    		'url' => 'manage_user',
    		'title' => '人员管理'
    		];
    		$user = new UserController($data);
    		return $user->manage();
    	}

        // else
    	public function logout()
    	{
    		session()->flush();
    		return redirect('/');
    	}
}
