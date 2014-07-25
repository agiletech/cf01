<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 25.07.14
 * Time: 11:03
 */
class Controller_ExcelReader extends AbstractController{
    public $data;
    function init(){
        parent::init();

//        $data = new Spreadsheet_Excel_Reader($this->app->pathfinder->public_location->getPath()."/xls/example.xls");
        $this->data = new Spreadsheet_Excel_Reader($this->app->pathfinder->public_location->getPath()."/xls/donor_report.xls");

    }
    function getData(){
        return $this->getSheetInfo(1);
    }
    private function getSheetInfo($sheet=0){
        $rows = $this->data->rowcount($sheet_index=$sheet);
        $cols = $this->data->colcount($sheet_index=$sheet);
        return array('cols'=>$cols,'rows'=>$rows);
    }
}