<?php

namespace Fuel\Migrations;

class Create_faculties
{
	public function up()
	{
		\DBUtil::create_table('faculties', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'faculty__id' => array('constraint' => 50, 'type' => 'varchar'),
			'name' => array('constraint' => 100, 'type' => 'varchar'),
			'designation' => array('constraint' => 100, 'type' => 'varchar'),
			'department' => array('constraint' => 100, 'type' => 'varchar'),
			'college' => array('constraint' => 100, 'type' => 'varchar'),
			'phone' => array('constraint' => 50, 'type' => 'varchar'),
			'email' => array('constraint' => 100, 'type' => 'varchar'),
			'education' => array('constraint' => 10000, 'type' => 'varchar'),
			'research_interest' => array('constraint' => 10000, 'type' => 'varchar'),
			'image' => array('type' => 'mediumblob'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('faculties');
	}
}