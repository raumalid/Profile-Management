<?php
use Orm\Model;

class Model_Contact extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'email',
		'phone_no',
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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('phone_no', 'Phone No', 'required|max_length[20]');
		$val->add_field('description', 'Description', 'required');

		return $val;
	}

}
