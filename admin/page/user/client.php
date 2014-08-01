<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_user_client extends Page {

    public $title='Clients';

    function init() {
        parent::init();
        $m = $this->add('Model_User_Client');
        $cr = $this->add('CRUD');
        $cr->setModel($m);
    }
}
