<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_donation extends Page {

    public $title='Donations';

    function init() {
        parent::init();
        $m = $this->add('Model_Donation');
        $cr = $this->add('CRUD');
        $cr->setModel($m);

    }

}
