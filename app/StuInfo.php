<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StuInfo extends Model
{

	public function getStuInfoBySno($stu_sno)
	{
		return \DB::table('student')
		->select('*')
		->where('stu_sno', '=' , $stu_sno)
		->whereNull('stu_delete_time')
		->first();
	} 

    	public function getAllinfo()
    	{
    		return \DB::table("information")
    		->join('student','information.stu_id','=','student.id')
    		->join('event','information.event_id','=','event.id')
                                    ->where('isValid', '=', '1')
    		->select("*")
                                    ->orderBy('stu_sno','asc')
                                    ->get();
    	}

    	public function getNullinfo()
    	{
    		// return \DB::table("information")
    		// ->rightjoin('student','information.stu_id','=','student.id')
    		// ->rightjoin('event','information.event_id','=','event.id')
    		// ->select("*")->get();

    		return \DB::table('student')
    		->select('*','event.id as event_id', 'student.id as stu_id')
    		->join('event','stu_sno','=','stu_sno')
                                    ->where('isValid', '=', '1')
    		->whereNotExists(function($query){
    			$query->select('*')->from('information')
    			->whereRaw('information.event_id = event.id')
    			->whereRaw('information.stu_id = student.id');
    		})
    		->get();	
    		
    	}

    	public function getId($stu_sno, $stu_name)
    	{
    		$row = \DB::table('student')->select('id')->where([
    			'stu_sno' => $stu_sno,
    			'stu_name' => $stu_name
    			])->first();

    		if($row){
    			return $row->id;
    		}else{
    			return false;
    		}
    	}

    	public function findInfoByStuId($stu_id, $event_id)
    	{
    		return \DB::table('information')->select('*')->where(['stu_id'=>$stu_id,'event_id'=>$event_id])->first();
    	}

    	public function insertToinformation($data)
    	{
                                    $data['create_at'] = time();
    		return \DB::table('information')->insert($data);
    	}

    	public function updateStuInfo($id, $data)
    	{
    		$data = $this->changeObjtoArr($data);

    		if(isset($data['id'])){
    			unset($data['id']);
    		}

    		return \DB::table('student')
    		->where('id' , '=', $id)
    		->update($data);
    	}

    	private function changeObjtoArr($obj)
    	{
    		if(is_array($obj)) {
    			return $obj;
    		}

    		if(is_object($obj)){
    			$res =  array();
    			foreach ($obj as $key => $value) {
    				$res[$key] = $value;
    			}
    			return $res;
    		}

    		return array();
    	}
}
