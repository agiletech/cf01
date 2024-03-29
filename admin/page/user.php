<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_user extends Page {

    public $title='Users';

    function init() {
        parent::init();
        $m = $this->add('Model_User');
        $cr = $this->add('CRUD');
        $cr->setModel($m,array(
            'email',
            'password',
            'name',
            'surname',
            'phone',
            'is_lead',
            'is_staff',
            'is_councelor',
            'is_trainee',
            'is_tutor',
            'is_donor',
            'is_admin',
            'is_superadmin',
            'is_client'
        ),array(
            'name',
            'surname',
            'email',
            'phone'
        ));

    }

}
