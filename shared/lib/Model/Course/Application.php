<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Course_Application extends SQL_Model{
    public $table = 'course_application';
    function init(){
        parent::init();

        $this->addField('trainee_id');
//        $trainee = $this->leftJoin('trainee','trainee_id');//TODO can't add new record
//        $trainee->hasOne('Person','person_id')->caption('Trainee');

        $this->addField('course_id');
        $this->addField('applied_ts')->type('date');
        $this->addField('assigned_ts')->type('date');
        $this->addField('is_waiting');
        $this->addField('course_schedule_id');
        $this->addField('price');
        $this->addField('is_completed')->type('boolean');
        $this->addField('is_terminated')->type('boolean');
        $this->addField('location_preference')->type('text');
    }
}