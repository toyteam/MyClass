<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FormController extends Controller
{
	protected $form_db;
	public $data;

	public function __construct($data = array())
	{
		$this->form_db = new \App\FormModel();
		$this->data = $data;
	}

	public function index()
	{
		$this->data['forms'] = $this->form_db->getAllFormInfoJoinUserOrderByCreateTime();
		return view('manage.form.form', $this->data);
	}

	public function lifeForm()
	{
		$this->data['forms'] = $this->form_db->getAllFormInfoJoinUserLeftJoinUserFormOrderByCreateTime();
		return view('life.form.form', $this->data);
	}

	public function create(Request $request)
	{
		$data = [
        'url' => 'manage_form',
        'title' => '表格创建',
        'plugins' => $this->form_db->getAllPluginsInfoOrderByNameLength(),
        'form' => $request->all()
        ];
		return view('manage.form.create', $data);
	}

	public function fill(Request $request)
	{
		if($request->has('formid'))
		{
			$form = $this->form_db->getFormColJoinPluginByFormId($request->get('formid'));
			
			$plugins = array();
			$value_data = '';
			
			if($this->form_db->getFormIsFilledByFormId($request->get('formid'))) {
				$temp_data = $this->form_db->getUserFormInfoByFormId($request->get('formid'));
				$value_data = is_array($temp_data) ? $temp_data[0]->user_form_data : '';
			}

			foreach ($form as $key => $value) {	
				$plugins[] = $this->form_db->getPluginByColInfo(view($value->plugin_url), json_decode($value->form_col_data, true), $value->form_col_order_id, $value_data);
			}

			$data = [
			'url' => 'life_form',
			'title' => '表格填写',
			'form_name' => $this->form_db->getFormInfoByFormId($request->get('formid'))[0]->form_title,
			'form_id' => $request->get('formid'),
			'plugins' => $plugins
			];
			return view('life.form.fill', $data);
		}
		return redirect('/life/form');
	}

	public function datatable(Request $request)
	{
		if($request->has('formid'))
		{
			$form_title = $this->form_db->getFormInfoByFormId($request->get('formid'))[0]->form_title;
			$plugins_label = $this->form_db->getAllFormColDataLabelByFormId($request->get('formid'));
			$all_user_form_data = $this->form_db->getAllUserFormInfoRightJoinUserByFormId($request->get('formid'));
			$data = [
			'url' => 'manage_form',
			'title' => $form_title.'表数据',
			'th' => $plugins_label,
			'data' => $all_user_form_data
			];
			return view('manage.form.datatable', $data);
		}
	}



	//////////////////////////////////////////////
	//后台处理

	public function createForm(Request $request)
	{
		$str = explode("%%@@", substr($request->get('data'), 4));

		$formid = $this->form_db->getCreatedFormId([
			'form_title' => $request->title,
			'form_detail' => $request->detail,
			'form_create_user_id' => session()->get('user_info')->id,
			'form_create_time' => time()
			]);

		$int = 1;
		foreach ($str as $key => $value) {
			$form_col_data = json_decode($value, true);
			$plugin_id = $form_col_data['plugin_id'];

			unset($form_col_data['_token']);
			unset($form_col_data['id']);
			unset($form_col_data['plugin_url']);
			unset($form_col_data['plugin_id']);
			
			$data = [
			'form_col_form_id' => $formid,
			'form_col_data' => json_encode($form_col_data),
			'form_col_plugin_id' => $plugin_id,
			'form_col_order_id' => $int
			];
			$this->form_db->insertInfoIntoFormCol($data);
			$int = $int + 1;
		}

		return redirect('manage/form');
	}

	public function fillForm(Request $request)
	{
		$all = $request->all();

		unset($all['submit']);
		unset($all['_token']);
		unset($all['form_id']);

		$data = [
		'user_form_user_id' => session()->get('user_info')->id,
		'user_form_form_id' => $request->get('form_id'),
		'user_form_data' => json_encode($all),
		'user_form_create_time' => time()
		];
		if($this->form_db->getFormIsFilledByFormId($request->get('form_id')))
			$this->form_db->updateInfoOnUserFormByFormId($data, $request->get('form_id'));
		else
			$this->form_db->insertInfoIntoUserForm($data);
		return redirect('/life/form');
	}

	public function getPluginSet(Request $request)
	{
		$path = $this->form_db->getPluginsUrlByPluginId($request->get('plugin'));

		$data = view($path[0]->plugin_url .'Model');

		return str_replace(["%title%","%plugin_url%", "%plugin_id%"], [$path[0]->plugin_name, $path[0]->plugin_url, $path[0]->id], $data);
    }

	public function getPlugin(Request $request)
	{
		$pluginhtml = view($request->get('plugin_url'));
		$sourse = $request->all();

		return array($this->form_db->replacePLuginPlaceholder($pluginhtml, $sourse, time()), json_encode($sourse));
	}

	public function deleteForm(Request $request)
	{
		if($request->has('formid'))
		{
			if($this->form_db->getFormIsExistByFormId($request->get('formid')))
			{
				$this->form_db->deleteFormByFormId($request->get('formid'));
			}
		}
		return redirect('/manage/form');
	}


}