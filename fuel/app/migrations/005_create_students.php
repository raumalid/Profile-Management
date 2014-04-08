<?php

namespace Fuel\Migrations;

class Create_students
{
	public function up()
	{
		\DBUtil::create_table('students', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'registration_no' => array('constraint' => 20, 'type' => 'int'),
			'roll_no' => array('constraint' => 20, 'type' => 'varchar'),
			'name' => array('constraint' => 100, 'type' => 'varchar'),
			'department' => array('constraint' => 100, 'type' => 'varchar'),
			'contact' => array('constraint' => 20, 'type' => 'varchar'),
			'email' => array('constraint' => 100, 'type' => 'varchar'),
			'image' => array('type' => 'mediumblob'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('students');
	}
}