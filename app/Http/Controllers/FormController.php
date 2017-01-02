<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FormController extends Controller
{
	protected $user_db;
	protected $form_db;
	public $data;

	public function __construct($data = array())
	{
		$this->user_db = new \App\UserModel();
		$this->form_db = new \App\FormModel();
		$this->data = $data;
	}

	public function index()
	{
		$this->data['forms'] = $this->form_db->getAllForm();
		return view('manage.form.form', $this->data);
	}

	public function getCreatePage(Request $request)
	{
		$plugins = $this->form_db->getPluginsOrderByNameLength();
		$data = [
        'url' => 'manage_form',
        'title' => '表格创建',
        'plugins' => $plugins,
        'form' => $request->all()
        ];
		return view('manage.form.create', $data);
	}

	public function createForm(Request $request)
	{
		$str = explode("%%@@", substr($request->get('data'), 4));

		$form_id = $this->form_db->createFormAndGetId($request->title, $request->detail);

		foreach ($str as $key => $value) {
			$form_col_data = json_decode($value);
			$plugin_id = $form_col_data->plugin_id;
			unset($form_col_data->_token);
			unset($form_col_data->id);
			unset($form_col_data->plugin_url);
			unset($form_col_data->plugin_id);
			
			$data = [
			'form_col_form_id' => $form_id,
			'form_col_data' => json_encode($form_col_data),
			'form_col_plugin_id' => $plugin_id
			];
			$this->form_db->insertFormCol($data);
		}

		return redirect('manage/form');
	}

	public function getPluginSet(Request $request)
	{
		$path = $this->form_db->getViewPathById($request->get('plugin'));

		$data = view($path[0]->plugin_url .'modal');

		return str_replace(["%title%","%plugin_url%", "%plugin_id%"], [$path[0]->plugin_name, $path[0]->plugin_url, $path[0]->id], $data);
    }

    public function getPlugin(Request $request)
    {
    	$replaced = view($request->get('plugin_url'));
    	$replace = $request->all();

    	return $this->form_db->getArrayPluginReplace($replaced, $replace);
    }

    

}
