<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Course_Schedule extends SQL_Model{
    public $table = 'course_schedule';
    function init(){
        parent::init();

//        $this->addField('center_id');
        $this->hasOne('Center');
//        $this->addField('course_id');
        $this->hasOne('Course');
        $this->addField('start_date')->type('date');
        $this->addField('is_completed')->type('boolean');
    }
}