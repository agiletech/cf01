<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_User extends SQL_Model{
    public $table = 'user';
    function init(){
        parent::init();

        if (@$this->app->auth) $this->app->auth->addEncryptionHook($this);

        $this->addField('email');
        $this->addField('password')->type('password');

        $person = $this->join('person.user_id','id');
        $person->addField('name');
        $person->addField('surname');
        $person->addField('is_lead')->type('boolean');
        $person->addField('is_staff')->type('boolean');
        $person->addField('is_councelor')->type('boolean');
        $person->addField('is_trainee')->type('boolean');
        $person->addField('is_tutor')->type('boolean');
        $person->addField('is_donor')->type('boolean');
        $person->addField('is_admin')->type('boolean');
        $person->addField('is_superadmin')->type('boolean');
        $person->addField('is_client')->type('boolean');
        $person->addField('phone');
    }
}