<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_user_company extends Page {

    public $title='Companies';

    function init() {
        parent::init();
        $m = $this->add('Model_User_Company');
        $cr = $this->add('CRUD');
        $cr->setModel($m);
    }
}
