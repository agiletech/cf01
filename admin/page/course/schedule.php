<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_course_schedule extends Page {

    public $title='Course Schedule';

    function init() {
        parent::init();
        $m = $this->add('Model_Course_Schedule');
        $cr = $this->add('CRUD');
        $cr->setModel($m);

        $cr->addRef('Course_Application');
    }
}
