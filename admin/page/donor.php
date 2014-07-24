<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_donor extends Page {

    public $title='Donors';

    function init() {
        parent::init();
        $m = $this->add('Model_Donor');
        $cr = $this->add('CRUD');
        $cr->setModel($m);

        $cr->addAction('exportReport','column');

    }

}
