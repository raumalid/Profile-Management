<?php

namespace Fuel\Migrations;

class Create_subjects
{
	public function up()
	{
		\DBUtil::create_table('subjects', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'faculty__id' => array('constraint' => 50, 'type' => 'varchar'),
			'course_id' => array('constraint' => 20, 'type' => 'varchar'),
			'course_name' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('subjects');
	}
}