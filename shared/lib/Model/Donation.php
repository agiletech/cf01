<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Donation extends SQL_Model{
    public $table = 'donation';
    function init(){
        parent::init();

        $this->hasOne('Donor','donor_id','donor');
        $this->addField('date')->type('datetime');
        $this->addField('amount');
    }
}