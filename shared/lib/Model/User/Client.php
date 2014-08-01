<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_User_Client extends SQL_Model{
    public $table = 'client';
    function init(){
        parent::init();

//        $this->addField('person_id');
        $this->hasOne('Person');
        $this->hasOne('User_Company');
//        $this->addField('company_id');
    }
}