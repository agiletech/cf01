<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Trainee extends SQL_Model{
    public $table = 'trainee';
    function init(){
        parent::init();

//        $this->addField('person_id');
        $this->hasOne('Person');
        $this->hasOne('Person','supervisor_id');

//        $this->addField('supervisor_id');
    }
}
