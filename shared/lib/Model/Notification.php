<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Notification extends SQL_Model{
    public $table = 'notification';
    function init(){
        parent::init();

        $this->hasOne('Notification_Type','notification_type_id');
        $this->hasOne('Person');
        $this->addField('is_sent')->type('boolean');
        $this->addField('ts')->type('date');
    }
}