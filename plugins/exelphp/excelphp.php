<?php
// header('Content-type: text/html; charset=utf8');
include 'PHPExcel/IOFactory.php';
// $x_r         = $_GET["x_r"].",";
$anketa      = $_GET["anketa"];
$filial_kodi      = $_GET["filial_kodi"];
// $kassir      = $_GET["kassir"];
$t_summa     = $_GET["tolov_summa"];
$tolov_summa = filter_var($t_summa, FILTER_SANITIZE_NUMBER_INT);
$mijoz_fish  = $_GET["mijoz_fish"];
$tel         = '+998997215555';
$tolov_turi  = ucfirst($_GET["tolov_turi"]);
$fileType 	 = 'Excel2007';
$template 	 = 'template/kvitansiya.xlsx';
$result 	 = 'result/kvitansiya.xlsx';


if ($anketa == "") {
	$anketa1 = "-";
}else{
	$anketa1 = $anketa;
}

	include('library/php_qr_code/qrlib.php'); // Include a library for PHP QR code

	//its a location where generated QR code can be stored.
	$qr_code_file_path = dirname(__FILE__).DIRECTORY_SEPARATOR.'qr_assets'.DIRECTORY_SEPARATOR;
	$set_qr_code_path = 'qr_assets/';

	// If directory is not created, the create a new directory 
	if(!file_exists($qr_code_file_path)){
    	mkdir($qr_code_file_path);
	}
	
	//Set a file name of each generated QR code
	$filename	=	$qr_code_file_path.time().'.png';
	
/* All the user generated data must be sanitize before the processing */
 //if (isset($_REQUEST['level']) && $_REQUEST['level']!='')
    $errorCorrectionLevel = 'M';

 //if (isset($_REQUEST['size']) && $_REQUEST['size']!='')
    $matrixPointSize = '4';
	
	$frm_link	=	" Mijoz raqami: ".$anketa."\n Mijoz FISH: ".$mijoz_fish."\n Tolov summasi: ".$t_summa."\n Murojat uchun: ".$tel;
	
	//$frm_link = "http://kassir.codejiay.group/buvayda/view_mijoz.php?mijoz_id=72875";
	
	// After getting all the data, now pass all the value to generate QR code.
	QRcode::png(utf8_encode($frm_link), $filename, $errorCorrectionLevel, $matrixPointSize, 2);




// Read the file
$objReader = PHPExcel_IOFactory::createReader($fileType);
$objPHPExcel = $objReader->load($template);

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5', $mijoz_fish);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H5', $t_summa);
// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H2', $kassir);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C9', $anketa);
// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', $filial_kodi);
// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C11', $x_r);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H12', $tolov_turi);

$objDrawing = new PHPExcel_Worksheet_Drawing();  
$signature = $set_qr_code_path.basename($filename);      
$objDrawing->setPath($signature);  
$objDrawing->setOffsetX(9);                     //setOffsetX works properly  
$objDrawing->setOffsetY(6);                     //setOffsetY works properly  
$objDrawing->setCoordinates('E1');             //set image to cell 
$objDrawing->setWidth(112);    
$objDrawing->setHeight(112);   
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  //save

$objDrawing = new PHPExcel_Worksheet_Drawing();  
$signature = $set_qr_code_path.basename($filename);      
$objDrawing->setPath($signature);  
$objDrawing->setOffsetX(9);                     //setOffsetX works properly  
$objDrawing->setOffsetY(6);                     //setOffsetY works properly  
$objDrawing->setCoordinates('E16');             //set image to cell 
$objDrawing->setWidth(112);    
$objDrawing->setHeight(112);   
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  //save


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