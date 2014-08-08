<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_person extends Page {

    public $title='Users';

    function init() {
        parent::init();
        $m = $this->add('Model_Person');
        $cr = $this->add('CRUD');
        $cr->setModel($m,array(
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
            'is_staff',
            'is_councelor',
            'is_trainee',
            'is_tutor',
            'is_donor',
            'is_admin',
        ));

    }

}
