<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_course_trainee extends Page {

    public $title='Trainee';

    function init() {
        parent::init();
        $m = $this->add('Model_Trainee');
        $cr = $this->add('CRUD');
        $cr->setModel($m);
    }
}
