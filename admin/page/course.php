<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_course extends Page {

    public $title='Courses';

    function init() {
        parent::init();
        $m = $this->add('Model_Course');
        $cr = $this->add('CRUD');
        $cr->setModel($m
            ,array(
                'name',
                'next_course_id',
                'current_price',
        )
            ,array(
                'name',
                'next',
                'current_price',
        )
        );
    }
}
