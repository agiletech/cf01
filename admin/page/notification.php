<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_notification extends Page {

    public $title='Notifications';

    function init() {
        parent::init();
        $m = $this->add('Model_Notification');
        $cr = $this->add('CRUD');
        $cr->setModel($m);
    }
}
