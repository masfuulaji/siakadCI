<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PegawaiModel;

class User extends BaseController
{
	public function __construct()
	{
		$this->userModel = new UserModel();
		$this->pegawaiModel = new PegawaiModel();
	}
	public function data()
	{
		$this->userModel->join('ms_pegawai', 'ms_pegawai.pegawai_id = sys_user.user_pegawai_id');
		$this->userModel->select('ms_pegawai.pegawai_nama, ms_pegawai.pegawai_jabatan, ms_pegawai.pegawai_jk, ms_pegawai.pegawai_hp, ms_pegawai.pegawai_alamat');
		$this->userModel->select('sys_user.user_id');
		$user = $this->userModel->findAll();
		$data = [
			'user' => $user
		];
		return view('user\index', $data);
	}
	public function edit($id)
	{
		$this->userModel->join('ms_pegawai', 'ms_pegawai.pegawai_id = sys_user.user_pegawai_id');
		$this->userModel->select('ms_pegawai.pegawai_nama, ms_pegawai.pegawai_id, ms_pegawai.pegawai_jabatan, ms_pegawai.pegawai_jk, ms_pegawai.pegawai_hp, ms_pegawai.pegawai_alamat');
		$this->userModel->select('sys_user.user_id, sys_user.user_password');
		$user = $this->userModel->find($id);
		echo json_encode(array("status" => true, 'data' => $user));
	}

	public function updateUser()
	{
		$idUser = $this->request->getPost('edit-id-user');
		$idPegawai = $this->request->getPost('edit-id-pegawai');
		$this->pegawaiModel->update($idPegawai, [
			"pegawai_hp" => $this->request->getPost('edit-telp'),
			"pegawai_jk" => $this->request->getPost('edit-jk'),
			"pegawai_alamat" => $this->request->getPost('edit-alamat'),
		]);
		$newPass = $this->request->getPost('edit-newPass');
		if ($newPass != null) {
			$this->userModel->update($idUser, [
				"user_password"=>$newPass
			]);
		}
		echo json_encode(array("status" => true, 'data' => "allo"));
	}
}
