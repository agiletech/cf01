<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Course extends SQL_Model{
    public $table = 'course';
    public $table_alias = '_cr';
    function init(){
        parent::init();

        $this->addField('name');
        $this->hasOne('Course','next_course_id');
        $this->addField('current_price');

        $next_course = $this->leftJoin('course.id','next_course_id');
        $next_course->addField('next','name');
    }
}