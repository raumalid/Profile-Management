<?php
use Orm\Model;

class Model_Faculty extends Model
{
	protected static $_properties = array(
                'id',
		'title',
		'name',
		'designation',
		'department',
		'college',
		'phone',
		'email',
		'education',
		'research_interest',
		'image',
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
   protected static $_has_many = array('publication' => array(
    'model_to' => 'Model_Publication',
    'key_from' => 'id',
    'key_to' => 'id',
    'cascade_save' => true,
    'cascade_delete' => false,
    // there are some more options for specific relation types
));
     protected static $_has_one = array('user' => array(
    'model_to' => 'Model_User',
    'key_from' => 'id',
    'key_to' => 'faculty_id',
    'cascade_save' => true,
    'cascade_delete' => false,
    // there are some more options for specific relation types
));

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id', 'Id', 'required|max_length[50]');
		$val->add_field('name', 'Name', 'required|max_length[100]');
		$val->add_field('designation', 'Designation', 'required|max_length[100]');
		$val->add_field('department', 'Department', 'required|max_length[100]');
		$val->add_field('college', 'College', 'required|max_length[100]');
		$val->add_field('phone', 'Phone', 'required|max_length[20]|match_pattern[#^((\\+91-?)|0)?[0-9]{10}$#]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[100]');
		$val->add_field('education', 'Education', 'required|max_length[10000]');
		$val->add_field('research_interest', 'Research Interest', 'required|max_length[10000]');
		//$val->add_field('image', 'Image', required);

		return $val;
	}

}
