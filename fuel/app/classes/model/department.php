<?php
use Orm\Model;

class Model_Department extends Model
{
	protected static $_properties = array(
		'id',
		'department_id',
		'department_name',
		'description',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('department_id', 'Department Id', 'required|valid_string[numeric]');
		$val->add_field('department_name', 'Department Name', 'required|max_length[255]');
		$val->add_field('description', 'Description', 'required|max_length[10000]');

		return $val;
	}

}
