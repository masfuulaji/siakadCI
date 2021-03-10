<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\PegawaiModel;

class Student extends BaseController
{
	protected $studentModel;
	public function __construct()
	{
		$this->studentModel = new StudentModel();
		$this->pegawaiModel = new PegawaiModel();
	}
	public function index()
	{
		$student = $this->studentModel->findAll();
		$data = [
			'student' => $student
		];
		return view('pages\student\index',$data);
	}

	public function create(){
		 $this->studentModel->insert([
			"nama"=>$this->request->getPost('nama'),
			"gender"=>$this->request->getPost('gender'),
			"telp"=>$this->request->getPost('telp'),
			"alamat"=>$this->request->getPost('alamat')
		]);

		return $this->index();
	}
	public function profile($id)
	{
		$pegawai = $this->pegawaiModel->findAll();
		$data = [
			'student' => $pegawai
		];
		return view('test\profile');
	}
}
