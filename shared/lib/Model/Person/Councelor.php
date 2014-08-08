<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Person_Councelor extends Model_Person{
    function init(){
        parent::init();

        $this->addCondition('is_councelor',true);
    }
}
