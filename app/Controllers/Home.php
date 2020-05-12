<?php namespace App\Controllers;

use App\Models\HomeModel;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------


	public function test()
	{
		echo 'test';
		$model = new HomeModel();

		$data['users'] = $model->getUsers();
		print_r($data);
	}

}
