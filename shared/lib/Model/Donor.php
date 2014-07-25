<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 24.07.14
 * Time: 19:20
 */
class Model_Donor extends SQL_Model{
    public $table = 'donor';
    function init(){
        parent::init();

        $this->addField('donor_type')->setValueList(array('Trust','Individual','Business'));
        $this->addField('donor');
        $this->addField('charity_no');
        $this->addField('town');
        $this->addField('postcode');

        $this->addExpression('grants')->set(function($m,$q){
            return $q->dsql()
                ->table('donation')
                ->field('sum(amount)')
                ->where('donation.donor_id',$q->getField('id'))
                ;
        });
    }
    function exportReport(){
        $reader = $this->add('Controller_ExcelReader');
//        $writer = $this->add('Controller_ExcelWriter');
        return $reader->getData();
//        return 'This function is not read yet';
    }
}