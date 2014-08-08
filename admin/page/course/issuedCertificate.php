<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_course_issuedCertificate extends Page {

    public $title='Issued Certificate';

    function init() {
        parent::init();
        $m = $this->add('Model_IssuedCertificate');
        $cr = $this->add('CRUD');
        $cr->setModel($m
            ,array('trainee_id','course_id','ts_issued','is_sent')//TODO can't add new record
            ,array('trainee','course','ts_issued','is_sent')
        );
    }
}
