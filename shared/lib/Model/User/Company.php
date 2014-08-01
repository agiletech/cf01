<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_User_Company extends SQL_Model{
    public $table = 'company';
    function init(){
        parent::init();

        $this->addField('payment_info');
    }
}