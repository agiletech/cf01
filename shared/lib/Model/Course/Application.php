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

        $this->hasOne('Person','trainee_id');
        //$this->addField('trainee_id');
//        $trainee = $this->leftJoin('trainee','trainee_id');//TODO can't add new record
//        $trainee->hasOne('Person','person_id')->caption('Trainee');

        $this->hasOne('Course_Schedule');
        //$this->hasOne('Course_Schedule');

        $this->addField('applied_ts')->type('date');
        $this->addField('assigned_ts')->type('date');
        $this->addField('is_waiting')->type('boolean');
        $this->addField('price')->hint('Actual offered cource price');
        $this->addField('location_preference')->type('text');
        $this->addField('is_completed')->type('boolean');
        $this->addField('is_terminated')->type('boolean');
    }
}
