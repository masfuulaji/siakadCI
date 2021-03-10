<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
	protected $studentModel;
	public function __construct()
	{
		$this->pegawaiModel = new PegawaiModel();
	}
	public function index()
	{
		$pegawai = $this->pegawaiModel->findAll();
		$data = [
			'pegawai' => $pegawai
		];
		return view('test\index',$data);
	}

	public function profile($id)
	{
		$pegawai = $this->pegawaiModel->find($id);
		$data = [
			'profile' => $pegawai
		];
		echo json_encode(array("status"=>true, 'data'=>$data));
	}

	public function updateProfile(){
		$id = $this->request->getPost('edit-id');
		$this->pegawaiModel->update($id, [
			"pegawai_hp"=>$this->request->getPost('edit-telp'),
			"pegawai_alamat"=>$this->request->getPost('edit-alamat')
		]);
		echo json_encode(array("status"=>true, 'data'=>$id));
	}

}
