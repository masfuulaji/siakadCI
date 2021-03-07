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
		$student = $this->studentModel->findAll();
		$data = [
			'student' => $student
		];
		return view('pages\student\index',$data);
	}
	public function show(){


	}
}
