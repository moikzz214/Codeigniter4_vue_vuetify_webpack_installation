<?php namespace App\Controllers;

class Home extends BaseController
{
	protected $version = '1.0.0';
	public function index()
	{
		helper('html');
	 	$data['version'] = $this->version;
		 return view('welcome_message',$data);
		 return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
