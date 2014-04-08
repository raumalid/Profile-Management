<?php
use Orm\Model;

class Model_Student_Batch extends Model
{
	protected static $_properties = array(
		'id',
		'start_year',
		'end_year',
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
		$val->add_field('start_year', 'Start Year', 'required');
		$val->add_field('end_year', 'End Year', 'required');

		return $val;
	}

}
