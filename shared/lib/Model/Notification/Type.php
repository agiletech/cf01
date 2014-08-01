<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Notification_Type extends SQL_Model{
    public $table = 'notification_type';
    function init(){
        parent::init();

        $this->addField('name');
        $this->addField('short_name');
        $this->addField('template')->type('text');
    }
}