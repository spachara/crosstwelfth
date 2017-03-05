<?php 
		
/*--------- DATABASE CONNECTION INFO---------*/ 
require_once "../site-private.inc.php";
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once 'Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator($_WEB_NAME)
							 ->setLastModifiedBy($_WEB_NAME)
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");



$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setCellValue('A1', "Shipment Order ID");
$objPHPExcel->getActiveSheet()->setCellValue('B1', "Consignee Name");
$objPHPExcel->getActiveSheet()->setCellValue('C1', "Full Address");
$objPHPExcel->getActiveSheet()->setCellValue('D1', "Postal Code");
$objPHPExcel->getActiveSheet()->setCellValue('E1', "District");
$objPHPExcel->getActiveSheet()->setCellValue('F1', "Phone Number");
// Freeze panes 
$objPHPExcel->getActiveSheet()->freezePane('A2');


// Rows to repeat at top 
$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);
		
		
		
		$sql_update2 = "select order_number from order_product_tb where ready_time = '".$_GET['d']."' and round_update = '".$_GET['r']."'";
		$result_update2 = @mysql_query($sql_update2, $connect);
		$num_update2 =@mysql_num_rows($result_update2);
		$arrProduct = array();
		for($i5=0;$i5<intval($num_update2);$i5++){
			
		$data_update2 =@mysql_fetch_array($result_update2);		
			$arrProduct[$i5] = $data_update2['order_number'];			
		}
						
		$arrProduct = array_unique( $arrProduct );
		$i=2;
		foreach($arrProduct as $y => $key){

		$sql_order = "select order_transport,order_address2 from order_tb where order_number = '".$key."' group by order_number";
		$result_order = @mysql_query($sql_order, $connect);
		$data_order =@mysql_fetch_array($result_order);
		 $exName = explode('เบอร์โทรศัพท์',$data_order['order_address2']);
                                
                                $exPhone = explode('อีเมล์',$exName[1]);
								 $name = explode('ที่อยู่ : ',$exName[0]); 
								  $addr = explode('รหัสไปรษณีย์',preg_replace("/\r\n|\r|\n/",'',$name[1]));
								$code = explode('รหัสไปรษณีย์ :',$exName[0]); 
								$distinct_ls = explode(' ' , $addr[0]); 
								$distinct =''; 
								$next=false;
								foreach($distinct_ls as $d){
									$d = str_replace('<br>จังหวัด','',$d);	
									if($next)
									{
										$distinct = $d;	
										$next = false;										
									}
										
									$pos = strpos($d, 'แขวง/เขต');
									if ($pos !== false) {
										$distinct = trim(preg_replace("/^.*(แขวง\/เขต)/",'',$d));
										if(trim($distinct) == '')	
											$next = true;
									}
									$pos = strpos($d, 'เขต');
									if ($pos !== false) {
										$distinct = trim(preg_replace("/^.*เขต/",'',$d));
										if(trim($distinct) == '')	
											$next = true;
									}
									$pos = strpos($d, 'อำเภอ');
									if ($pos !== false) {
										$distinct = trim(preg_replace("/^.*อำเภอ/",'',$d));
										if(trim($distinct) == '')	
											$next = true;
									}
									$pos = strpos($d, 'อ.');
									if ($pos !== false) {
										$distinct = trim(preg_replace('/^.*(อ\.)/','',$d));
										if(trim($distinct) == '')	
											$next = true;
									}
								}
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $i,  str_replace('-','',$key))
	                              ->setCellValue('B' . $i, str_replace('<br>','', preg_replace("/ {2,}/", " ", trim(str_replace('ชื่อ : ','',$name[0])))))
									->setCellValue('C' . $i, str_replace('<br>','', preg_replace("/ {2,}/", " ", trim(str_replace('<br>จังหวัด :','  จ.',$addr[0]))))) 
	                              ->setCellValue('D' . $i, (int)str_replace('<br>','',$code[1]))
	                              ->setCellValue('E' . $i,  $distinct)
	                              ->setCellValue('F' . $i,  str_replace('<br>','',str_replace('-','',str_replace(':','',$exPhone[0]))));
								  $objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getNumberFormat()->setFormatCode('0000'); 
					$i++;			 
		} 
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Sheet1');
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="DHL_'. $_WEB_NAME . '_' . str_replace('-','',$_GET['d']) . '_' . $_GET['r'] . '.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>