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
		$plugins = \DB::select('select id, plugin_name from plugin order by length(plugin_name)');
		$data = [
        'url' => 'manage_form',
        'title' => '表格创建',
        'plugins' => $plugins
        ];
		return view('manage.form.create', $data);
	}

	public function getPluginSet(Request $request)
	{
		$path = \DB::table('plugin')
		->select('plugin_name', 'plugin_url')
		->where('id', $request->get('plugin'))
		->get();
		$data = view($path[0]->plugin_url .'modal');
		return str_replace(["%title%","%url%"], [$path[0]->plugin_name, $path[0]->plugin_url], $data);
    }

    public function getPlugin(Request $request)
    {
    	$data = view($request->get('plugin_url'));
    	$arr = $request->all();
    	foreach ($arr as $key => $value) {
    		$data = str_replace('%'.$key.'%', $value, $data);
    	}
    	$time = time();
    	$data = str_replace('%id%', $time, $data);
    	$data = str_replace('%name%', $time, $data);
    	$arr['id'] = $time;
    	return array($data,json_encode($arr));
    }

}
