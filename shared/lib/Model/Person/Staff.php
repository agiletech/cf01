<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Person_Staff extends Model_Person{
    //public $table = 'trainee';
    function init(){
        parent::init();
        $this->addCondition('is_staff',true);
    }
}
