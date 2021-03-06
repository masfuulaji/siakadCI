<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Students extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'gender'      => [
				'type'           => 'char',
				'comment'     => '0 :laki-laki; 1 :perempuan'
			],
			'telp' => [
				'type'           => 'INT',
				'constraint'     => '20'
			],
			'alamat'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'create_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'update_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		]);

		$this->forge->addKey('id', TRUE);

		$this->forge->createTable('students', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('students');
	}
}
