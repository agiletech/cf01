<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_IssuedCertificate extends SQL_Model{
    public $table = 'issued_certificate';
    function init(){
        parent::init();

        $this->addField('trainee_id');
        $trainee = $this->leftJoin('trainee','trainee_id');//TODO can't add new record
        $trainee->hasOne('Person','person_id')->caption('Trainee');
        $this->hasOne('Course');
        $this->addField('ts_issued')->type('date');
        $this->addField('is_sent')->type('boolean');
    }
}