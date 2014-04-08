<?php
use Orm\Model;

class Model_Subject extends Model
{
	protected static $_properties = array(
		'id',
		'faculty_id',
		
		'course',
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
	//	$val->add_field('faculty_id', 'Faculty  Id', 'required|max_length[50]');
		//$val->add_field('course_id', 'Course Id', 'required|max_length[20]');
		$val->add_field('course', 'Course', 'required|max_length[255]');

		return $val;
	}

}
