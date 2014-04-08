<?php

use Orm\Model;

class Model_Student extends Model {

    protected static $_properties = array(
        
        'id',
        'roll_no',
        'name',
       
        'contact',
        'email',
        'cgpa',
        'image',
        'year',
        'created_at',
        'updated_at',
    );
    protected static $_conditions = array(
        'order_by' => array('id' => 'asc'),
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

    public static function validate($factory) {
        $val = Validation::forge($factory);
      //  $val->add_field('registration no', 'Registration No', 'required|valid_string[numeric]');
        $val->add_field('roll_no', 'Roll No', 'required|max_length[20]');
        $val->add_field('name', 'Name', 'required|max_length[100]');
        $val->add_field('cgpa', 'cgpa', 'required|valid_string[decimal]');
        $val->add_field('contact', 'Contact', 'required|valid_phone');
        $val->add_field('email', 'Email', 'required|valid_email|max_length[100]');
        //$val->add_field('image', 'Image', 'required');
        $val->add_field('year', 'Year', 'required');

        return $val;
    }

}
