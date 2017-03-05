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
$objPHPExcel->getActiveSheet()->setCellValue('A1', "ลำดับ");
$objPHPExcel->getActiveSheet()->setCellValue('B1', "Order Date");
$objPHPExcel->getActiveSheet()->setCellValue('C1', "Order Number");
$objPHPExcel->getActiveSheet()->setCellValue('D1', "ชื่อลูกค้า");
$objPHPExcel->getActiveSheet()->setCellValue('E1', "รายการสั่งซื้อ");
$objPHPExcel->getActiveSheet()->setCellValue('F1', "จำนวน");
$objPHPExcel->getActiveSheet()->setCellValue('G1', "ราคา/ชิ้น");
$objPHPExcel->getActiveSheet()->setCellValue('H1', "ส่วนลด");
$objPHPExcel->getActiveSheet()->setCellValue('I1', "ราคาหลังหักส่วนลด");
$objPHPExcel->getActiveSheet()->setCellValue('J1', "Total");
$objPHPExcel->getActiveSheet()->setCellValue('K1', "ค่าส่ง");
$objPHPExcel->getActiveSheet()->setCellValue('L1', "Grand Total");
$objPHPExcel->getActiveSheet()->setCellValue('M1', "ยอดโอน");
$objPHPExcel->getActiveSheet()->setCellValue('N1', "Payment Date");
$objPHPExcel->getActiveSheet()->setCellValue('O1', "Bank");
// Freeze panes 
$objPHPExcel->getActiveSheet()->freezePane('A2');


// Rows to repeat at top 
$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 1);
		
		$sql_payment = "select * from payment_tb where payment_status > 0";
		$sql_payment .= " and STR_TO_DATE(payment_date, '%d/%c/%Y') between '".$_GET['d']."' and '".$_GET['d2']."' order by STR_TO_DATE(payment_date, '%d/%c/%Y'), date_in";
		
		$result_payment = mysql_query($sql_payment, $connect);
		$num_payment =mysql_num_rows($result_payment);	 
		//echo $num_payment;
		$row = 2;
		for($i=0;$i<intval($num_payment);$i++){
			$data_payment =mysql_fetch_array($result_payment);
		
			$sql_order = "select max(date_in) date_in, order_number, MAX(order_employee) order_employee, sum(order_total) total , sum(order_transport_status) ship_total";
			$sql_order .= ", max(order_point) order_point , max(order_promotion) order_promotion from order_tb";
			$sql_order .= " where order_number like '" . substr($data_payment['order_number'],0,15) . "%'"   ;
			$sql_order .= " group by order_number";
			$result_order = mysql_query($sql_order, $connect);
			$num_order =mysql_num_rows($result_order);	
			if($num_order > 0)
			{
			$data_order =mysql_fetch_array($result_order); 
			$sql_pro = "select p.*,c.name as color_name from order_product_tb p inner join color_tb c on p.order_p_color = c.c_code  where order_number = '" . $data_order['order_number'] . "'";  
			$result_pro = mysql_query($sql_pro, $connect);
			$num_pro = mysql_num_rows($result_pro);	
				$total = 0;	
			for($j=0;$j<intval($num_pro);$j++){
				$data_pro =mysql_fetch_array($result_pro);
				
				$price_total = ($data_pro['order_p_price'] * $data_pro['order_p_stock']) * ((100 - (double)$data_order['order_promotion']) / 100 );
				$total += $price_total;	 
				if($j==0)
				{
				 $objPHPExcel->getActiveSheet()->setCellValue('A' . $row,  ($i+1))
				  ->setCellValue('B' . $row,  (date("d/m/Y", strtotime($data_order['date_in']))))
				  ->setCellValue('C' . $row, ($data_order['order_number']) )
				  ->setCellValue('D' . $row, ($data_order['order_employee']) )
				  ->setCellValue('E' . $row,  ($data_pro['pro_code'] . ' ' . $data_pro['color_name'] . ' ' . $data_pro['order_p_size']))
				  ->setCellValue('F' . $row, ((int)$data_pro['order_p_stock']))
				  ->setCellValue('G' . $row, ((double)$data_pro['order_p_price']) )
				  ->setCellValue('H' . $row, ((double)$data_order['order_promotion'] . '%'))
				  ->setCellValue('I' . $row, ((double)$price_total) )
				  ->setCellValue('N' . $row, ($data_payment['payment_date'] . ' ' .$data_payment['payment_time']));
				  $objPHPExcel->getActiveSheet()->getStyle('C' . $row)->getNumberFormat()->setFormatCode('0000');
								  
				//echo  $i+1 . date("d/m/Y", strtotime($data_order['date_in'])) . $data_order['order_number'] . $data_order['order_employee'] . '<br>';	
				 
				
				}
				else
				{
				
					$objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data_order['order_employee']) 
					  ->setCellValue('E' . $row,  $data_pro['pro_code'] . ' ' . $data_pro['color_name'] . ' ' . $data_pro['order_p_size'])
					  ->setCellValue('F' . $row, (int)$data_pro['order_p_stock'])
					  ->setCellValue('G' . $row, (double)$data_pro['order_p_price']) 
					  ->setCellValue('H' . $row, ((double)$data_order['order_promotion'] . '%'))
					  ->setCellValue('I' . $row, ((double)$price_total) )
					  ;
					 
					  
					  
				}
	 
			 $objPHPExcel->getActiveSheet()->getStyle("A" . $row . ":O" . $row)->applyFromArray(
					array(						 
						'font' => array(
										'name' =>'Tahoma', 
										'size' => 11
									)
					)
				);
			  if(intval($num_pro) == ($j + 1))
			  {
			   $objPHPExcel->getActiveSheet()->setCellValue('J' . $row,  (double)$total)
			  ->setCellValue('K' . $row,  (double)$data_order['ship_total'])
			  ->setCellValue('L' . $row, (double)($total + $data_order['ship_total']) )
			  ->setCellValue('M' . $row, (double)$data_payment['total_price']  ) 
			  ->setCellValue('O' . $row, $data_payment['bank_tranfer']);
			 
				 $objPHPExcel->getActiveSheet()->getStyle("A" . $row . ":O" . $row)->applyFromArray(
					array(
						'borders' => array(
							'bottom' => array(
								'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
								'color' => array('rgb' => '000000')
							)
						),
						'font' => array(
										'name' =>'Tahoma', 
										'size' => 11
									)
					)
				);
			  }	 
			  $objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(24);
				$row++;
			}
		
		
		
		}
		}
		  $objPHPExcel->getActiveSheet()->getStyle("A1:O1")->applyFromArray(
				array(
					 'font' => array(
									'name' =>'Tahoma',										
									'bold' => true ,
									'size' => 12
								),
					'alignment' => array(
						'horizontal' =>
							PHPExcel_Style_Alignment::HORIZONTAL_CENTER
					   
						)
					)
				
			);
			

// Rename worksheet 
 $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(24);
 $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
 $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
 $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
 $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
 $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
 $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
 $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(11);
 $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(17.5);
 $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20.5);
 $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(11);
 $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(14.5);
 $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(14);
 $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(14.5);
 $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
 $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(18.2);
$objPHPExcel->getActiveSheet()->setTitle('Sheet1');
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a clientโ€s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="SaleReport_'. $_WEB_NAME . '_' . str_replace('-','',$_GET['d']) . '_' .str_replace('-','',$_GET['d2']) . '.xlsx"');
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