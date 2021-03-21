<?php

namespace App\Controllers;
use App\Models\PegawaiModel;
class Home extends BaseController
{
	public function index()
	{
		return view('layout/layout');
	}
}
