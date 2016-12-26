<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
 //    	public function getAllValidEvents()
 //    	{
 //    		return \DB::table('form')->select('*')->whereNotNull('form_close_time')->whereNotNull('form_delete_time')
 //    		->join('form_tcol', 'form.id', '=', 'form_col.form_col_form_id')->get();
 //    	}

 //    	public function getAllValidEventsBeMerged()
 //    	{
 //    		return $this->merge($this->getAllValidEvents());
 //    	}

 //    	public function insertEvent($data)
 //    	{
 //    		$form_name = $data['form_name'];

 //    		if(\DB::table('form')->select('*')->where('form_name','=',$event_name)->count()){
 //    			return "error: event name has existed ";
 //    		}

 //    		if(\DB::table('event')->insert(['event_name' => $event_name, 'isValid' => 1]) == 0){
 //    			return "insert event into table 'event' error";
 //    		}

 //    		$event_info  = \DB::table('event')->select('*')->where('event_name', '=', $event_name)->first();
 //    		if($event_info == null){
 //    			return "select from table error";
 //    		}

 //    		$event_id = $event_info->id;
 //    		foreach ($data['cols_name'] as $col_name) {
 //    			if(\DB::table('eventcol')->insert(['event_id' => $event_id, 'col_name' => $col_name]) == 0){
 //    				return "insert col_name into table 'eventcol' error";
 //    			}
 //    		}

 //    		return 'success';
 //    	}

 //    	public function deleteEvent($id)
 //    	{
 //    		return \DB::table('event')->where('id', '=', $id)->update(['isValid' => 0]);
 //    	}

 //    	private function merge($events)
	// {
	// 	$data = array();
	// 	foreach ($events as  $event) {
	// 		$event_name = $event->event_name;
	// 		$event_id = $event->event_id;
	// 		$col_id = $event->id;
	// 		if(isset($data[$event_id])){
	// 			$data[$event_id]->col_name[$col_id] = $event->col_name;
	// 		}else{
	// 			$tmp = $event;
	// 			$tmp->col_name = array("$col_id" => "$event->col_name");
	// 			$data[$event_id] = $tmp;
	// 		}
	// 	}
	// 	return $data;
	// }
}
