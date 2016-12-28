<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
	/**
	 * 根据学号查找用户
	 * @param  [type] $user_sno [description]
	 * @return [type]           [description]
	 */
	public function getUserInfoBySno($user_sno)
	{
		return \DB::table('user')
		->select('*')
		->where('user_sno', '=' , $user_sno)
		->whereNull('user_delete_time')
		->first();
	} 

	/**
	 * 获得所有用户信息
	 * @return [type] [description]
	 */
	public function getAllUserInfo()
	{
		return \DB::table('user')
		->join('role', 'user.user_role_id', '=', 'role.id')
		->join('class', 'user.user_class_id', '=', 'class.id')
		->select('*')
		->get();
	}

	/**
	 * 根据id更新用户信息
	 * @param  [type] $id   [description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function updateUserInfo($id, $data)
	{
		$data = $this->changeObjtoArr($data);

		if(isset($data['id'])){
			unset($data['id']);
		}

		return \DB::table('user')
		->where('id' , '=', $id)
		->update($data);
	}

	/**
	 * 插入用户信息
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function insertUserInfo($value=array())
	{
		return \DB::table('user')->insert($value);
	}

	/**
	* [changeObjtoArr 把object变量转成array变量]
	* @param  [object] $obj [description]
	* @return [array]      [description]
	*/
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
