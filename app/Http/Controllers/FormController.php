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
		return view('manage.form.form', $this->data);
	}

	public function create()
	{
		$plugins = $this->form_db->getPluginsOrderByNameLength();
		$data = [
        'url' => 'manage_form',
        'title' => '表格创建',
        'plugins' => $plugins
        ];
		return view('manage.form.create', $data);
	}

	public function getPluginSet(Request $request)
	{
		$path = $this->form_db->getViewPathById($request->get('plugin'));

		$data = view($path[0]->plugin_url .'modal');

		return str_replace(["%title%","%url%"], [$path[0]->plugin_name, $path[0]->plugin_url], $data);
    }

    public function getPlugin(Request $request)
    {
    	$replaced = view($request->get('plugin_url'));
    	$replace = $request->all();

    	return $this->form_db->getArrayPluginReplace($replaced, $replace);
    }

}
