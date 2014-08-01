<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_ActivityTrace extends SQL_Model{
    public $table = 'activity_trace';
    function init(){
        parent::init();

        $this->addField('user_id');
        $this->addField('ts')->type('datetime');
        $this->addField('model_class');
        $this->addField('model_id');
        $this->addField('model_name');
        $this->addField('action');
        $this->addField('old_data')->type('text');
        $this->addField('new_data')->type('text');
    }
}