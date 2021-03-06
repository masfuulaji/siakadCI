<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StudentsSeed extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama' => 'budi',
				'gender' => 0,
				'telp' => 12345,
				'alamat' => 'malang'
			],
			[
				'nama' => 'udin',
				'gender' => 0,
				'telp' => 111222,
				'alamat' => 'surabaya'
			]
		];
		$this->db->table('students')->insertBatch($data);
	}
}
