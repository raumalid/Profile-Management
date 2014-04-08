<?php

namespace Fuel\Migrations;

class Create_departments
{
	public function up()
	{
		\DBUtil::create_table('departments', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'department_id' => array('constraint' => 3, 'type' => 'int'),
			'department_name' => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('constraint' => 10000, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('departments');
	}
}