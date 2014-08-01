<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Center extends SQL_Model{
    public $table = 'center';
    function init(){
        parent::init();

        $this->addField('name');
        $this->addField('address')->type('text');
        $this->addField('availability')->type('text');
        $this->addField('contact_info')->type('text');
    }
}