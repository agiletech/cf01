<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_course_application extends Page {

    public $title='Course Application';

    function init() {
        parent::init();
        $m = $this->add('Model_Course_Application');
        $cr = $this->add('CRUD');
        $cr->setModel($m);
    }
}
