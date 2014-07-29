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

        $this->addField('donor');
        $this->addField('donor_type')->setValueList(array('Trust','Individual','Business'));
        $this->addField('charity_no');
        $this->addField('town');
        $this->addExpression('grants')->set(function($m,$q){
            return $q->dsql()
                ->table('donation')
                ->field('sum(amount)')
                ->where('donation.donor_id',$q->getField('id'))
                ;
        });
        $this->addField('postcode');
    }
    function exportReport(){
        $phpexcel = $this->add('Controller_PHPExcel');
        $arr = $this->getRows();

        $countRows = 2;
        foreach($arr as $row){
            $countCols = 0;
            foreach($row as $key=>$val){
                if($key == 'id') continue;
                $phpexcel->setCellValue($countCols,$countRows,$val);
                $countCols++;
            }
            $countRows++;
        }
        $phpexcel->saveSheet();
        return 'ok';
    }
}