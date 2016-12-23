<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Info extends Controller
{
	protected $stu_db;
	protected $event_db;
	public $data;

	public function __construct($data = array())
	{
		$this->stu_db = new \App\StuInfo();
		$this->event_db = new \App\EventInfo();
		$this->data = $data;
	}

	public function index()
	{
		$events = $this->event_db->getAllValidEventsBeMerged();
		$this->data['events'] = $events;
		return view('life/form', $this->data);
	}

	public function fill(Request $request)
	{
		$validator = \Validator::make($request->input(),[
			'stu_sno' => 'required',
			'stu_name' => 'required',
			],[
			'required' => ':attribute 为必填项'
			],[
			'stu_sno' => '学号',
			'stu_name' => '姓名'
			]);

		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$stu_sno = $request->input('stu_sno');
		$stu_name = $request->input('stu_name');
		$event_id = $request->input('event_id');



		if (! ($stu_id =  $this->stu_db->getId($stu_sno, $stu_name))){
			return "失败：学号和姓名不匹配";
		}

		if($this->stu_db->findInfoByStuId($stu_id, $event_id)){
			return "失败：你已经填过此表";	
		}

		$data = [
		'stu_id' => $stu_id,
		'event_id'=> $event_id,
		'data'=> json_encode($request->input('data'))
		];

		if($this->stu_db->insertToinformation($data)){
			return "提交成功";
		}else{
			return "提交失败";
		}
	}
}
