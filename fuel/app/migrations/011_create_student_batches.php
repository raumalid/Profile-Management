<?php

namespace Fuel\Migrations;

class Create_student_batches
{
	public function up()
	{
		\DBUtil::create_table('student_batches', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'start_year' => array('type' => 'year'),
			'end_year' => array('type' => 'year'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('student_batches');
	}
}