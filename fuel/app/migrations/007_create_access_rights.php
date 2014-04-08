<?php

namespace Fuel\Migrations;

class Create_access_rights
{
	public function up()
	{
		\DBUtil::create_table('access_rights', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'page' => array('constraint' => 100, 'type' => 'varchar'),
			'admin' => array('constraint' => '"0","1"', 'type' => 'enum'),
			'faculty' => array('constraint' => '"0","1"', 'type' => 'enum'),
			'user' => array('constraint' => '"0","1"', 'type' => 'enum'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('access_rights');
	}
}