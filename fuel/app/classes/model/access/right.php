<?php
use Orm\Model;

class Model_Access_Right extends Model
{
	protected static $_properties = array(
		'id',
		'page',
		'admin',
		'faculty',
		'user',
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
		$val->add_field('page', 'Page', 'required|max_length[100]');
		$val->add_field('admin', 'Admin', 'required');
		$val->add_field('faculty', 'Faculty', 'required');
		$val->add_field('user', 'User', 'required');

		return $val;
	}

}
