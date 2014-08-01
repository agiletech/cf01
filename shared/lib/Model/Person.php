<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Person extends SQL_Model{
    public $table = 'person';
    function init(){
        parent::init();

        $this->addField('name');
        $this->addField('surname');
        $this->addField('is_lead')->type('boolean');
        $this->addField('is_staff')->type('boolean');
        $this->addField('is_councelor')->type('boolean');
        $this->addField('is_trainee')->type('boolean');
        $this->addField('is_tutor')->type('boolean');
        $this->addField('is_donor')->type('boolean');
        $this->addField('is_admin')->type('boolean');
        $this->addField('is_superadmin')->type('boolean');
        $this->addField('is_client')->type('boolean');
        $this->addField('user_id');
//        $this->hasOne('User');
        $this->addField('email');
        $this->addField('phone');
    }
}