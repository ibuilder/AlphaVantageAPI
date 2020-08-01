<?php


//echo "<pre>";
$topRows = json_decode($_POST['headers']);
//print_r($topRows);
$details = json_decode($_POST['values']);
//print_r($details);


require_once 'phpexcel/PHPExcel.php';
$objPHPExcel = new PHPExcel();
// Set document properties
$objPHPExcel->getProperties()->setCreator("AlphaVantage")
                                ->setLastModifiedBy("AlphaVantage")
                                ->setTitle($_POST['name'])
                                ->setSubject($_POST['name'])
                                ->setDescription($_POST['name'])
                                ->setKeywords($_POST['name'])
                                ->setCategory("AlphaVantage");


$styleArray = array(
    'font'  => array(
        'color' => array('rgb' => 'FFFFFF'),
        'name'  => 'Verdana'
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '34A370')		
    ),
    'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

$alignCenter = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );	



$alphas = range('A', 'Z');

foreach($topRows as $k => $value)
{
    $no = $k+1;
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[0].$no, (string)$value);
}
$objPHPExcel->getActiveSheet()->freezePaneByColumnAndRow(1);
foreach($details as $key => $row)
{
    $i = 1;
    foreach($row as $cNo => $values){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($alphas[$key+1].$i, (string)$values);
        $i++;
    }
}

foreach(range('A','Z') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
}

$styleSig = array(
    'font'  => array(
        'color' => array('rgb' => '777777'),
        'name'  => 'Verdana'
    )
    );



//$signitureRow = count($details)+5;


$objRichText = new PHPExcel_RichText();
$objRichText->createText('Report Generated on ');

$objBold = $objRichText->createTextRun(date("d M, Y", time()));
$objBold->getFont()->setBold(true);

$objRichText->createText(' by AlphaVantage');

//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$signitureRow, $objRichText);



    


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle($_POST['name']);
$objPHPExcel->setActiveSheetIndex(0);



// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$_POST['name'].' by AlphaVantage.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;