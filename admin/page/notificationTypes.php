<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_notificationTypes extends Page {

    public $title='Notification Types';

    function init() {
        parent::init();
        $m = $this->add('Model_Notification_Type');
        $cr = $this->add('CRUD');
        $cr->setModel($m);
    }
}
