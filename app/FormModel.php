<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
	public function createForm($form_title, $form_detail)
	{
		$data = [
		'form_title' => $form_title,
		'form_detail' => $form_detail,
		'form_create_user_id' => session()->get('user_info')->id,
		'form_create_time' => time()
		];

		return \DB::table('form')->insertGetId($data);
	}

	public function getAllFrom()
	{
		return \DB::table('from')
		->select('from_title', 'form_detail', 'user_name')
		->join('user', 'user.id', '=', 'form.form_create_user_id')
		->whereNull('user_delete_time')
		->orderBy('form_create_time')
		->get();
	}

	public function getPluginsOrderByNameLength()
	{
		return \DB::select('select id, plugin_name from plugin order by length(plugin_name)');
	}

	public function getViewPathById($id)
	{
		return \DB::table('plugin')
		->select('plugin_name', 'plugin_url')
		->where('id', $id)
		->get();
	}

	public function getArrayPluginReplace($replaced, $replace)
	{
		foreach ($replace as $key => $value) {
    		$replaced = str_replace('%'.$key.'%', $value, $replaced);
    	}

    	$time = time();
    	$replaced = str_replace('%id%', $time, $replaced);
    	$replaced = str_replace('%name%', $time, $replaced);
    	$replace['id'] = $time;

    	return array($replaced,json_encode($replace));
	}

}
