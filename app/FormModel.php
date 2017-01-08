<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
	public function getAllFormInfo()
	{
		return \DB::table('form')
		->whereNull('form_delete_time')
		->select('*')
		->get();
	}

	public function getCreatedFormId($data)
	{
		return \DB::table('form')->insertGetId($data);
	}

	public function getAllFormInfoJoinUserOrderByCreateTime()
	{
		return \DB::table('form')
		->select('form.id', 'form_title', 'form_detail', 'user_name', 'form_create_time')
		->join('user', 'user.id', '=', 'form.form_create_user_id')
		->whereNull('form_delete_time')
		->orderBy('form_create_time')
		->get();
	}

	public function getFormInfoByFormId($formid)
	{
		return \DB::table('form')
		->select('form_title', 'form_detail')
		->where('id', '=', $formid)
		->whereNull('form_delete_time')
		->get();
	}

	public function getAllFormInfoJoinUserLeftJoinUserFormOrderByCreateTime()
	{
		return \DB::table('form')
		->select('form.id', 'form_title', 'form_detail', 'user_name', 'form_create_time', 'user_form_data')
		->join('user', 'user.id', '=', 'form.form_create_user_id')
		->leftjoin('user_form', 'form.id', '=', 'user_form.user_form_form_id')
		->where('user.id', '=', session()->get('user_info')->id)
		->whereNull('form_delete_time')
		->orderBy('form_create_time')
		->get();
	}

	public function getAllPluginsInfoOrderByNameLength()
	{
		return \DB::select('select id, plugin_name from plugin order by length(plugin_name)');
	}

	public function getPluginsUrlByPluginId($pluginid)
	{
		return \DB::table('plugin')
		->select('id', 'plugin_name', 'plugin_url')
		->where('id', $pluginid)
		->get();
	}

	public function getFormColJoinPluginByFormId($formid)
	{
		return \DB::table('form_col')
		->select('form_col_data', 'plugin_url', 'form_col_order_id')
		->where('form_col_form_id', $formid)
		->join('plugin', 'plugin.id', '=', 'form_col.form_col_plugin_id')
		->get();
	}

	public function insertInfoIntoUserForm($data)
	{
		return \DB::table('user_form')
		->insert($data);
	}

	public function insertInfoIntoFormCol($data)
	{
		return \DB::table('form_col')
		->insert($data);
	}

	public function updateInfoOnUserFormByFormId($data, $formid)
	{
		return \DB::table('user_form')
		->where('user_form_user_id', '=', session()->get('user_info')->id)
		->where('user_form_form_id', '=', $formid)
		->update($data);
	}

	public function getFormIsFilledByFormId($formid)
	{
		return \DB::table('user_form')
		->where('user_form_user_id', '=', session()->get('user_info')->id)
		->where('user_form_form_id', '=', $formid)
		->count() == 1 ? true : false;
	}

	public function getUserFormInfoByFormId($formid)
	{
		return \DB::table('user_form')
		->select('user_form_data')
		->where('user_form_user_id', '=', session()->get('user_info')->id)
		->where('user_form_form_id', '=', $formid)
		->get();
	}

	public function getFormIsExistByFormId($formid)
	{
		return \DB::table('form')
		->where('id', '=', $formid)
		->whereNull('form_delete_time')
		->count() == 1 ? true : false;
	}
	public function deleteFormByFormId($formid)
	{
		return \DB::table('form')
		->where('id', '=', $formid)
		->whereNull('form_delete_time')
		->update(['form_delete_time' => time()]);
	}

	public function getFormColInfoByFormId($formid)
	{
		return \DB::table('form_col')
		->select('*')
		->where('form_col_form_id', '=', $formid)
		->get();
	}

	public function getAllUserFormInfoRightJoinUserByFormId($formid)
	{
		return \DB::select("select user_sno, user_name, user_form_data from 
					 	(select user_form_data, user_form_user_id from user_form where user_form_form_id = $formid) as temp 
					 right join user on user.id = user_form_user_id");
	}

	public function getFormNotFillNumber()
	{
		$form_number = \DB::table('form')->whereNull('form_delete_time')->count();
		$fill_number = \DB::table('user_form')->where('user_form_user_id', '=', session()->get('user_info')->id)->count();
		return $form_number - $fill_number;
	}

	public function getAllFormColDataLabelByFormId($formid)
	{
		$all_form_cols = \DB::table('form_col')
		->select('form_col_data')
		->where('form_col_form_id', '=', $formid)
		->orderBy('form_col_order_id')
		->get();

		foreach ($all_form_cols as $key => $value) {
			$array[] = json_decode($value->form_col_data, true)['label'];
		}

		return $array;

	}

	public function replacePLuginPlaceholder($pluginhtml, $sourse, $idreplace, $flag = true)
	{
		foreach ($sourse as $key => $value) {
			$pluginhtml = str_replace('%'.$key.'%', $value, $pluginhtml);
		}

		$pluginhtml = str_replace('%id%', $idreplace, $pluginhtml);
		$pluginhtml = str_replace('%name%', $idreplace, $pluginhtml);

		$pluginhtml = '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-4">'.$sourse['label'].'</label>
							<div class="col-md-8 col-sm-8 col-xs-7">'.$pluginhtml.'</div>';
		if($flag)
		{
			$pluginhtml = $pluginhtml.'<button type="button" value="'.$idreplace.'" class="plugin-close btn btn-default">&times;</button>';

			$javascript = "<script>
						$('.plugin-close').click(function(e){
							console.log($(e.target).val());
							$(e.target).parent().remove();
							var t = $('#data').val().substring(4, $('#data').val().length).split('%%@@');
							var arr = \""."\";
							for (var i = 0; i < t.length; i++) {
								if(JSON.parse(t[i]).id != $(e.target).val()){
									arr+=\"%%@@\";
									arr+=(t[i]);
								}
							}
							$('#data').val(arr);
						});
					</script>";

			$pluginhtml = $pluginhtml.$javascript;
		}

		$pluginhtml = $pluginhtml.'</div>';

		return $pluginhtml;
	}

	public function getPluginByColInfo($pluginhtml, $sourse, $idreplace, $data = '')
	{
		$pluginhtml = $this->replacePLuginPlaceholder($pluginhtml, $sourse, $idreplace, false);

		if($data != '')
		{
			$array = json_decode($data);
			$script = '<script>';
			foreach ($array as $key => $value) {
				if((int)$key == (int)$idreplace)
					$script = $script."$('#$key').val('$value');";
			}
			$script = $script.'</script>';
			$pluginhtml = $pluginhtml.$script;
		}

		return $pluginhtml;
	}


}