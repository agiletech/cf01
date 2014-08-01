<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Course_Payment extends SQL_Model{
    public $table = 'course_payment';
    function init(){
        parent::init();

        $this->addField('ts')->type('date');
        $this->addField('amount');
        $this->addField('course_application_id');
    }
}