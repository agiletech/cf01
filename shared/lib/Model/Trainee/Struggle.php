<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Trainee_Struggle extends SQL_Model{
    public $table = 'trainee_struggle';
    function init(){
        parent::init();

        $this->addField('trainee_id');
        $this->addField('course_application_id');
        $this->addField('ts')->type('date');
        $this->addField('type');
        $this->addField('details')->type('text');
    }
}