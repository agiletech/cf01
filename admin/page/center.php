<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_center extends Page {

    public $title='Centers';

    function init() {
        parent::init();
        $m = $this->add('Model_Center');
        $cr = $this->add('CRUD');
        $cr->setModel($m);
    }
}
