<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\PegawaiModel;

class StudentController extends BaseController
{
	protected $studentModel;
	public function __construct()
	{
		$this->studentModel = new StudentModel();
		$this->pegawaiModel = new PegawaiModel();
	}
	public function index()
	{
		return view('pages\student\index');
	}
	public function dataTable(){
		$student=$this->studentModel->findAll();
		echo json_encode(array("status" => true,'data' => $student));
	}

	public function create()
	{
		$this->studentModel->insert([
			"nama" => $this->request->getPost('nama'),
			"gender" => $this->request->getPost('gender'),
			"telp" => $this->request->getPost('telp'),
			"alamat" => $this->request->getPost('alamat')

		]);
		return $this->index();
	}

	public function edit($id)
	{
		$student = $this->studentModel->find($id);
		$data = [
			'student' => $student
		];
		echo json_encode(array("status" => true, 'data' => $data));
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
