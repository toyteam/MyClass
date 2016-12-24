<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Manage extends Controller
{
	protected $stu_db;
	protected $event_db;

	public function __construct()
	{
		$this->stu_db = new \App\StuInfo();
		$this->event_db = new \App\EventInfo();
	}

    	public function index()
    	{
    		return view('manage.index');
    	}

    	public function getAllInfo()
    	{
    		$data =  $this->stu_db->getAllInfo();
    		$data = $this->merge($data);
    		
    		return view('manage.showInfo',['data' => $data]);
    	}

    	public function getWhoNotFill()
    	{
     		$data =  $this->stu_db->getNullInfo();
    		$data = $this->merge($data);

    		return view('manage.showInfo',['data' => $data]);   		
    	}

    	private function merge($info)
    	{
    		$data = array();

    		foreach ($info  as $value) {
    			$event_id = $value->event_id;
    			$stu_id = $value->stu_id;
    			$data[$event_id][$stu_id] = $value;
    		}

    		return $data;
    	}

    	public function event()
    	{
    		$events = $this->event_db->getAllValidEventsBeMerged(); 
    		return view('manage.event', ['events' => $events]);
    	}

    	public function event_add()
    	{
    		return view('manage.event_add');
    	}

    	public function event_add_check(Request $request)
    	{
    		$event_name = $request->input('event_name');
    		$cols_name = $request->input('cols_name');

    		$cols_name = explode(':',$cols_name);

    		$data = array(
    			'event_name' =>  $event_name,
    			'cols_name' => $cols_name
    			);

    		return $this->event_db->insertEvent($data);
    	}

    	public function event_delete($id)
    	{
    		if($this->event_db->deleteEvent($id)){
    			return "delete success";
    		}else{
    			return "delete error";
    		}
    	}
}
