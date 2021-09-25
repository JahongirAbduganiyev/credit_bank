<?php
header('Content-type: text/html; charset=utf-8');
include 'PHPExcel/IOFactory.php';
$x_r         = $_GET["x_r"].",";
$anketa      = $_GET["anketa"];
$kassir      = $_GET["kassir"];
$t_summa     = $_GET["tolov_summa"];
$tolov_summa = filter_var($t_summa, FILTER_SANITIZE_NUMBER_INT);
$mijoz_fish  = $_GET["mijoz_fish"];
$tel         = $_GET["tel"];
$fileType 	 = 'Excel2007';
$template 	 = 'template/ariza.xlsx';
$result 	 = 'result/ariza.xlsx';

if ($anketa == "") {
	$anketa1 = "-";
}else{
	$anketa1 = $anketa;
}

// Read the file
$objReader = PHPExcel_IOFactory::createReader($fileType);
$objPHPExcel = $objReader->load($template);

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B2',  $anketa);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C11', $mijoz_fish);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B14', $t_summa);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C16', $tel);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C12', $x_r);

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F3', "_______________________ бошлиги/бошқарувчиси");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F4', "____________________________________________га");



// Write the file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
$objWriter->save($result);


header("Cache-Control: no-store");
header("Content-Type: application/octet-stream");
header('Content-Disposition: attachment; filename="'. basename($result) . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: '. filesize($result));
ob_clean();
flush();
readfile($result);
exit();
?>