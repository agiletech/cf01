<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 28.07.14
 * Time: 17:51
 */
class Controller_PHPExcel extends AbstractController{
    public $objPHPExcel;
    public $inputFileName;
    function init(){
        parent::init();

        $this->inputFileName = $this->app->pathfinder->public_location->getPath()."/xls/donor_report.xls";

        $objReader = new PHPExcel_Reader_Excel5();
        $this->objPHPExcel = $objReader->load($this->inputFileName);
        $this->objPHPExcel->setActiveSheetIndex(1);
    }
    function getCellValue($col,$row){
        $val = $this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow($col, $row)->getValue();
        return $val;
    }
    function setCellValue($col,$row,$val){
        $this->objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $val);
    }
    function saveSheet(){
        $objWriter = new PHPExcel_Writer_Excel5($this->objPHPExcel);
        $objWriter->save($this->inputFileName);
    }
    function downloadFile(){
        // redirect output to client browser
//        header('Content-Type: application/vnd.ms-excel');
//        header('Content-Disposition: attachment;filename='.$this->inputFileName);
//        header('Cache-Control: max-age=0');
        /*$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');*/

        // redirect output to client browser
//        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        header('Content-Disposition: attachment;filename="myfile.xlsx"');
//        header('Cache-Control: max-age=0');
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//        $objWriter->save('php://output');
    }
}