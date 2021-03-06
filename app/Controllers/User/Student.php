<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class Student extends BaseController
{
	protected $studentModel;
	public function __construct()
	{
		$this->studentModel = new StudentModel();
	}
	public function index()
	{
		//
	}
	public function show(){
		$data = $this->studentModel->findAll();
		dd($data);
	}
}
