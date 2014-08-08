<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Person_Trainee extends Model_Person{
    //public $table = 'trainee';
    function init(){
        parent::init();

        $tr=$this->join('trainee.person_id');
//        $this->addField('person_id');
        //$this->hasOne('Person');
        $tr->hasOne('Person','supervisor_id');
        $this->addCondition('is_trainee',true);

//        $this->addField('supervisor_id');
    }
}
