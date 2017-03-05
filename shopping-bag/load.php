<?php
session_start();
require_once('../dbconnect.inc');
require("../class.phpmailer.php");
		
		$sql_insert_order = "select * from order_tb where order_number = '".$_SESSION['order_id']."'";
		$sql_insert_order .= " AND  order_type = 'IN'";
		$result_insert_order = @mysql_query($sql_insert_order, $connect);
		$num_order = @mysql_num_rows($result_insert_order);
		$data_order = @mysql_fetch_array($result_insert_order);

		if($num_order){
		$messages .= "<table width=\"800\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#FFFFFF\" style=\" font-family:Tahoma;color:#000000; font-size:12px; \">
		<tr><td align=\"center\" style=\"font-size:14px; font-weight:bold;\">ใบสั่งซื้อสินค้า</td></tr>
		<tr><td align=\"right\" style=\"font-size:12px; font-weight:bold;\">เลขที่ใบสั่งซื้อ : ".$_SESSION['order_id']."-"."IN</td></tr>
		</table>
		<table width=\"800\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#FFFFFF\" style=\" font-family:Tahoma;color:#000000; font-size:12px; \">
		<tr>
		<td>
		".($_SESSION['sess_language'] == 'eng' ? 'BILLING ADDRESS' : 'ที่อยู่ออกบิล')."<br><br>".$data_order['order_address1']."
		</td>
		<td>
		".($_SESSION['sess_language']=='eng' ? 'SHIPPING ADDRESS' : 'ที่อยู่จัดส่ง' )."<br><br>".$data_order['order_address2']."
		</td>
		</tr>
		<tr >
		<td colspan=2><br>
		<b>วันที่สั่งซื้อ : </b>".$data_order['date_in']."<br>";
		$messages .= "
		<p>*****************************************************************************************************</p>
		<br>รายการสินค้าที่สั่งมีดังนี้ <br>
		<br>
		<p>";

								$messages .="<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" bordercolor=\"#000000\" bgcolor=\"#ffffff\" style='background-color:#000000; *width:800px !important; width:800px;font-family:Tahoma;color:#000000; font-size:12px;'>
                    <tr bgcolor=\"#ffffff\"  style=\"!important; font-weight:bold\">
                        <td align=\"center\" style=\"!important;*width:20% !important;width:18%\">".($_SESSION['sess_language'] == 'eng' ? 'Product name' : 'ชื่อสินค้า')."</td>
                        <td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Quantity' : 'จำนวน')."</td>
                        <td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Unit price' : 'ราคา/ชิ้น')."</td>
                        <td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Product value' : 'ราคารวมสินค้า')."</td>
                    </tr>";
						   $sql_insert_product = "select * from order_product_tb where order_number = '".$_SESSION['order_id']."'";
						   $sql_insert_product .= " AND order_type = 'IN'";

						   $result_insert_product = @mysql_query($sql_insert_product, $connect);
						   $num_product = @mysql_num_rows($result_insert_product);
						   
						   for($p=1;$p<=intval($num_product);$p++){
						   $data_order_product = @mysql_fetch_array($result_insert_product);

							$messages .= "
							<tr height='20px' style='background-color:".$tr." !important;color:white ' >
							<td style='background-color:#FFFFFF !important;*width:20% !important;width:18%;color:#000000' align='center'>&nbsp;".$data_order_product['pro_code']."&nbsp;".$data_order_product['order_p_size']."&nbsp;".$data_order_product['order_p_color']."&nbsp;".$data_order_product['order_p_name']."</td>										
							<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>&nbsp;".$data_order_product['order_p_stock']."</td>
							<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>&nbsp;".number_format($data_order_product['order_p_price'])."</td>
							<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>&nbsp;".number_format($data_order_product['order_p_total'])."</td>
							</tr>";
							$total = $total + $data_order_product['order_p_total'];
							
							}

							$messages .= "</table><br><br>";


							$messages .= "<table width=\"400\" align=\"right\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\" font-family:Tahoma;color:#000000; font-size:12px; \">";
							$messages .= "<tr>
							<td width=\"158\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Grand total" : "ราคาสินค้ารวม")."</b></td>
							<td align=\"right\" >".number_format($data_order['order_total']).($_SESSION['sess_language'] == 'eng' ?" Baht" : " บาท")."</td>
							</tr>";
										


							$sql_check_pre_order = "select * from order_tb where order_number = '".$_SESSION['order_pre_id']."'";
							$sql_check_pre_order .= " AND order_type = 'PRE'";
							$result_check_pre_order = @mysql_query($sql_check_pre_order, $connect);
							$num_check_order = @mysql_num_rows($result_check_pre_order);
							$data_check_order = @mysql_fetch_array($result_check_pre_order);
							
							$grang_total = $data_order['order_total'] + $data_check_order['order_total'];
							
							
							$messages .= "<tr>
							<td width=\"220\" height=\"22\" ><b>".$data_order['order_transport']."</b></td>
							<td align=\"right\" >".$data_order['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
							</tr>";
							$grang_total = $grang_total + $data_order['order_transport_status'];
							
							
							if($num_check_order){

							$messages .= "<tr>
							<td width=\"220\" height=\"22\" ><b>".$_SESSION['order_pre_id']."-PRE</b></td>
							<td align=\"right\" >".$data_check_order['order_total'].($_SESSION['sess_language'] == 'eng' ?" Baht" : " บาท")."</td>
							</tr>";
							
							
							}
							
							
							
							
							if($num_check_order){
							
								if($data_check_order['order_group'] != ''){
								$messages .= "<tr>
								<td width=\"220\" height=\"22\" ><b>ส่งพร้อมกับ ".$_SESSION['order_pre_id']."-PRE"."</b></td>
								<td align=\"right\" >".$data_check_order['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
								</tr>";
								
								$grang_total = $grang_total + $data_check_order['order_transport_status'];
								}else{
									
								$messages .= "<tr>
								<td width=\"220\" height=\"22\" ><b>".$data_check_order['order_transport']." ".$_SESSION['order_pre_id']."-PRE"."</b></td>
								<td align=\"right\" >".$data_check_order['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
								</tr>";
	
								$grang_total = $grang_total + $data_check_order['order_transport_status'];
								}
							
							}
					
					
							if($data_order['order_promotion'] != ''){
							$messages .= "<tr>
							<td width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Discount" : "ได้รับส่วนลด")."</b></td>
							<td align=\"right\" >".$data_order['order_promotion']." %"."</td>
							</tr>";
							
							$grang_total = $grang_total - ($grang_total * ($data_order['order_promotion'] / 100));
							}
							if($data_order['order_point'] != '' && $data_order['order_point'] != '0'){
							$messages .= "<tr>
							<td width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Point" : "ใช้แต้ม")."</b></td>
							<td align=\"right\" >".$data_order['order_point'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
							</tr>";

							$grang_total = $grang_total - $data_order['order_point'];
							}

							$messages .= "<tr>
							<td width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Grand total" : "ราคาสุทธิ")."</b></td>
							<td align=\"right\" >".number_format($grang_total).($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
							</tr>";

							$messages .="								
							</td>
							</tr>
							</table>";
							$messages .="								
							</td>
							</tr>
							</table>";
		}



		$sql_insert_pre_order = "select * from order_tb where order_number = '".$_SESSION['order_pre_id']."'";
		$sql_insert_pre_order .= " AND order_type = 'PRE'";
		$result_insert_pre_order = @mysql_query($sql_insert_pre_order, $connect);
		$num_pre_order = @mysql_num_rows($result_insert_order);
		$data_pre_order = @mysql_fetch_array($result_insert_pre_order);
		
		
		if($num_pre_order){
			
		$messages2 .= "<table width=\"800\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#FFFFFF\" style=\" font-family:Tahoma;color:#000000; font-size:12px; \">
		<tr><td align=\"center\" style=\"font-size:14px; font-weight:bold;\">ใบสั่งซื้อสินค้า</td></tr>
		<tr><td align=\"right\" style=\"font-size:12px; font-weight:bold;\">เลขที่ใบสั่งซื้อ : ".$_SESSION['order_pre_id']."-PRE</td></tr>
		</table>
		<table width=\"800\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#FFFFFF\" style=\" font-family:Tahoma;color:#000000; font-size:12px; \">
		<tr>
		<td>
		".($_SESSION['sess_language'] == 'eng' ? 'BILLING ADDRESS' : 'ที่อยู่ออกบิล')."<br><br>".$data_pre_order['order_address1']."
		</td>
		<td>
		".($_SESSION['sess_language']=='eng' ? 'SHIPPING ADDRESS' : 'ที่อยู่จัดส่ง' )."<br><br>".$data_pre_order['order_address2']."
		</td>
		</tr>
		<tr >
		<td colspan=2><br>
		<b>วันที่สั่งซื้อ : </b>".$data_pre_order['date_in']."<br>";
		$messages2 .= "
		<p>*****************************************************************************************************</p>
		<br>รายการสินค้าที่สั่งมีดังนี้ <br>
		<br>
		<p>";

								$messages2 .="<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" bordercolor=\"#000000\" bgcolor=\"#ffffff\" style='background-color:#000000; *width:800px !important; width:800px;font-family:Tahoma;color:#000000; font-size:12px;'>
                    <tr bgcolor=\"#ffffff\"  style=\"!important; font-weight:bold\">
                        <td align=\"center\" style=\"!important;*width:20% !important;width:18%\">".($_SESSION['sess_language'] == 'eng' ? 'Product name' : 'ชื่อสินค้า')."</td>
                        <td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Quantity' : 'จำนวน')."</td>
                        <td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Unit price' : 'ราคา/ชิ้น')."</td>
                        <td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Product value' : 'ราคารวมสินค้า')."</td>
                    </tr>";
						   $sql_insert_pre_product = "select * from order_product_tb where order_number = '".$_SESSION['order_pre_id']."'";
						   $sql_insert_pre_product .= " AND order_type = 'PRE'";
						   $result_insert_pre_product = @mysql_query($sql_insert_pre_product, $connect);
						   $num_product_pre = @mysql_num_rows($result_insert_pre_product);
						   
						   for($p=1;$p<=intval($num_product_pre);$p++){
						   $data_pre_order_product = @mysql_fetch_array($result_insert_pre_product);

							$messages2 .= "
							<tr height='20px' style='background-color:".$tr." !important;color:white ' >
							<td style='background-color:#FFFFFF !important;*width:20% !important;width:18%;color:#000000' align='center'>&nbsp;".$data_pre_order_product['pro_code']."&nbsp;".$data_pre_order_product['order_p_size']."&nbsp;".$data_pre_order_product['order_p_color']."&nbsp;".$data_pre_order_product['order_p_name']."</td>										
							<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>&nbsp;".$data_pre_order_product['order_p_stock']."</td>
							<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>&nbsp;".number_format($data_pre_order_product['order_p_price'])."</td>
							<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>&nbsp;".number_format($data_pre_order_product['order_p_total'])."</td>
							</tr>";
							$total2 = $total2 + $data_pre_order_product['order_p_total'];
							
							}

							$messages2 .= "</table><br><br>";
							
							$messages2 .= "<table width=\"400\" align=\"right\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\" font-family:Tahoma;color:#000000; font-size:12px; \">";
							$messages2 .= "<tr>
							<td width=\"158\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Total" : "ราคาสินค้ารวม")."</b></td>
							<td align=\"right\" >".number_format($data_pre_order['order_total']).($_SESSION['sess_language'] == 'eng' ?" Baht" : " บาท")."</td>
							</tr>";
										


							$sql_check_order = "select * from order_tb where order_number = '".$_SESSION['order_id']."'";
							$sql_check_order .= " AND order_type = 'IN'";
							$result_check_order = @mysql_query($sql_check_order, $connect);
							$num_check = @mysql_num_rows($result_check_order);
							$data_check = @mysql_fetch_array($result_check_order);
							
							$grang_total_pre = $data_pre_order['order_total'] + $data_check['order_total'];
							
							
							$messages2 .= "<tr>
							<td width=\"220\" height=\"22\" ><b>".$data_pre_order['order_transport']."</b></td>
							<td align=\"right\" >".$data_pre_order['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
							</tr>";
							$grang_total_pre = $grang_total_pre + $data_pre_order['order_transport_status'];
							
							
							if($num_check){

							$messages2 .= "<tr>
							<td width=\"220\" height=\"22\" ><b>".$_SESSION['order_id']."-IN</b></td>
							<td align=\"right\" >".$data_check['order_total'].($_SESSION['sess_language'] == 'eng' ?" Baht" : " บาท")."</td>
							</tr>";
							
							
							}
							
							
							
							
							if($num_check){

								if($data_pre_order['order_group'] != ''){
	
								$messages2 .= "<tr>
								<td width=\"220\" height=\"22\" ><b>ส่งพร้อมกับ ".$_SESSION['order_id']."-IN"."</b></td>
								<td align=\"right\" >".$data_check['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
								</tr>";
								
								$grang_total_pre = $grang_total_pre + $data_check['order_transport_status'];
								}else{
									
								$messages2 .= "<tr>
								<td width=\"220\" height=\"22\" ><b>".$data_check['order_transport']." ".$_SESSION['order_id']."-IN"."</b></td>
								<td align=\"right\" >".$data_check['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
								</tr>";
								
								$grang_total_pre = $grang_total_pre + $data_check['order_transport_status'];
	
								}
							
							}
					
					
							if($data_pre_order['order_promotion'] != ''){
							$messages2 .= "<tr>
							<td width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Discount" : "ได้รับส่วนลด")."</b></td>
							<td align=\"right\" >".$data_pre_order['order_promotion']." %"."</td>
							</tr>";
							
							$grang_total_pre = $grang_total_pre - ($grang_total_pre * ($data_pre_order['order_promotion'] / 100));
							}
							
							if($data_pre_order['order_point'] != '' && $data_pre_order['order_point'] != '0'){
							$messages2 .= "<tr>
							<td width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Point" : "ใช้แต้ม")."</b></td>
							<td align=\"right\" >".$data_pre_order['order_point'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
							</tr>";

							$grang_total_pre = $grang_total_pre - $data_pre_order['order_point'];
							}

							$messages2 .= "<tr>
							<td width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Grand total" : "ราคาสุทธิ")."</b></td>
							<td align=\"right\" >".number_format($grang_total_pre).($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
							</tr>";

							$messages2 .="								
							</td>
							</tr>
							</table>";
							$messages2 .="								
							</td>
							</tr>
							</table>";
							
							
							
							

		}


		require('../fpdf.php');
		include("MPDF54/mpdf.php");

							
		if($_SESSION['order_id']){	
		$pdf=new FPDF();
		$pdf->AddPage();
		$mpdf = new mPDF('th');
		$mpdf->SetDisplayMode('fullpage');
					
		$mpdf->WriteHTML($messages);	// The parameter 1 tells that this is css/style only and no body/html/text
		$mpdf->Output('../tmp/'.$_SESSION['order_id']."-".'IN.pdf' , 'F');


		$letter = $_SESSION['order_id']."-"."IN.pdf";
		$f_name='../tmp/'.$letter;    // use relative path OR ELSE big headaches. $letter is my file for attaching. 
		
		$sub_mit = substr($_SESSION['order_id'],-2);
		
		$view_total = number_format($grang_total).".".$sub_mit;
		}
		if($_SESSION['order_pre_id']){				
		sleep(2);
		
		$pdf=new FPDF();
		$pdf->AddPage();
		$mpdf = new mPDF('th');
		$mpdf->SetDisplayMode('fullpage');
		
		$mpdf->WriteHTML($messages2);	// The parameter 1 tells that this is css/style only and no body/html/text
		$mpdf->Output('../tmp/'.$_SESSION['order_pre_id']."-".'PRE.pdf' , 'F');
		

		$letter2 = $_SESSION['order_pre_id']."-".'PRE.pdf';
		$f_name2='../tmp/'.$letter2;    // use relative path OR ELSE big headaches. $letter is my file for attaching.
		
		$sub_mit = substr($_SESSION['order_pre_id'],-2);
		
		$view_total = number_format($grang_total_pre).".".$sub_mit;
		}



			$mail = new PHPMailer();
			
			$body = "PHPMailer."; /// ใส่ข้อความข้อคุณ
			
			$mail->CharSet = "utf-8";
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Host       = "smtp@gmail.com"; // SMTP server
			$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
			$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
			$mail->Port       = 465;                   // set the SMTP port for the GMAIL server 465
			$mail->Username   = "cross12mail@gmail.com";  // GMAIL username
			$mail->Password   = "cross2014";            // GMAIL password
			
			$mail->SetFrom("cross12mail@gmail.com", "Cross Twelfth");
			$mail->AddReplyTo("cross12mail@gmail.com", "No-Reply");
			$mail->Subject = "Cross Twelfth :: Order"; // หัวข้อในการส่ง email นั้นๆ
			
			if($_SESSION['order_id']){	

			$body = $messages;
			
			}
			
			if($_SESSION['order_pre_id']){	
			
			$body .= "<br><br><br>".$messages2;

			}

			$mail->MsgHTML($body);
			if($f_name){
			$mail->AddAttachment($f_name);
			}
			if($f_name2){
			$mail->AddAttachment($f_name2);
			}
			
			$mail->AddAddress($_SESSION['cus_email'], $_SESSION['cus_name']); // ผู้รับคนที่หนึ่ง , ชื่อผู้รับ ** กรุณีผู้สองคุณ สามารถเพิ่มบรรทัดนี้อีกได้
			$mail->AddBCC("pakamon.sum@gmail.com", "Pakamon");
			$mail->AddBCC("potchaya@thetreedesign.com", "Pitchaya");

			$mail->Send();

?>            
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross Twelfth</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
<link href="../css.css" rel="stylesheet" type="text/css" />
<script>
	document.createElement('header');
	document.createElement('nav');
	document.createElement('section');
	document.createElement('article');
	document.createElement('footer');
	document.createElement('hgroup');
	document.createElement('fieldset');
</script>





<link href="../css/gallery/gallery.css" rel="stylesheet" type="text/css" />
<script src="../js/gallery/jquery-1.10.2.min.js"></script>
<script>
	$(document).ready(function() {
		$('#gallery ul li img').click(function(e) {
			var newclass = $(this).attr('id');
			var oldclass = $('#full-size').attr('class');
				$('#full-size').fadeOut(function(){
					$('#full-size').removeClass(oldclass) .addClass(newclass) .fadeIn('slow');
                        
				})
		})
        
    });
</script>

<!--Accordion-->
<link rel="stylesheet" href="../css/accordion/accordion-style.css" type="text/css">
<!--End Accordion-->  
<!--////////////////////////////////////Banner Slide////////////////////////////////////-->
	<script type="text/javascript" src="../js/slide_main/jquery-1.2.6.min.js"></script>
    <link href="../css/slide_main/slide_main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/slide_main/jquery-slide_show2.js"></script>
<!--////////////////////////////////////End Banner Slide////////////////////////////////////-->
<!--/////Menu Drop Down/////-->
<script src="../js/dropdown/jquery-1.9.0.min.js"></script>
<script src="../js/dropdown/hoverIntent.js"></script>
<script src="../js/dropdown/superfish.js"></script>
<script>
// initialise plugins
jQuery(function(){
    jQuery('#example').superfish({
        //useClick: true
    });
});
</script>
<!--/////Menu Drop Down/////--> 
<!--Tap--> 
    <!--<script src='../js/taps/jquery.min.js'></script>-->
    <script src="../js/taps/organictabs.jquery.js"></script>
    <script>
        $(function() {
            $("#example-two").organicTabs({
                "speed": 200
            });
        });
    </script>
    <style>
		.current {
			background:#000 !important;
			border:#000 1px solid !important;
			font-weight:bold;
			color:#fff;
		}
	</style>
<!--End Tap-->  

<!--Thumb Slide-->
<link href="../css/slide_thumb1/slide_thumb1.css" rel="stylesheet" type="text/css">
<!--<script type="text/javascript" language="javascript" src="../js/slide_thumb1/jquery-1.8.2.min.js"></script>-->
<script type="text/javascript" language="javascript" src="../js/slide_thumb1/jquery.carouFredSel-6.0.6-packed.js"></script>
<script type="text/javascript" language="javascript" src="../js/slide_thumb1/foo3.js"></script>
<!--End Thumb Slide-->


<link rel="stylesheet" href="../css/accordion-style02/demo2.css" type="text/css" />
<!--<script type="text/javascript" src="../js/accordion-style02/jquery.min.js"></script>-->
<script type="text/javascript" src="../js/accordion-style02/highlight.pack.js"></script>
<script type="text/javascript" src="../js/accordion-style02/jquery.cookie.js"></script>
<script type="text/javascript" src="../js/accordion-style02/jquery.accordion.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        //syntax highlighter
        hljs.tabReplace = '    ';
        hljs.initHighlightingOnLoad();

        $.fn.slideFadeToggle = function(speed, easing, callback) {
            return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
        };

        //accordion
        $('.accordion').accordion({
            defaultOpen: '0',
            cookieName: 'accordion_nav',
            speed: 400,
            animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
                elem.next().stop(true, true).slideFadeToggle(opts.speed);
            },
            animateClose: function (elem, opts) { //replace the standard slideDown with custom function
                elem.next().stop(true, true).slideFadeToggle(opts.speed);
            }
        });

    });
</script>
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////-->
	<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>-->
	<script type="text/javascript" src="../js/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.1.js"></script>
    <script type="text/javascript" src="../js/fancybox/fancybox-jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////-->  
<!--////////////////////////////////////Scoll Bar Style X Y////////////////////////////////////-->
<link href="../css/scollbar-y/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<link href="../css/scollbar-y/scollbar-style.css" rel="stylesheet" type="text/css" />
<!--<script>!window.jQuery && document.write(unescape('%3Cscript src="../js/scollbar-y/jquery-1.7.2.min.js"%3E%3C/script%3E'))</script>-->
<script src="../js/scollbar-y/jquery-ui.min.js"></script>
<!--<script>!window.jQuery.ui && document.write(unescape('%3Cscript src="../js/scollbar-y/jquery-ui-1.8.21.custom.min.js"%3E%3C/script%3E'))</script>-->
<script src="../js/scollbar-y/jquery.mousewheel.min.js"></script>
<script src="../js/scollbar-y/jquery.mCustomScrollbar.js"></script>
<script src="../js/scollbar-y/jquery-scollbar.js"></script>
<!--////////////////////////////////////End Scoll Bar Style X Y////////////////////////////////////-->



 

</head>

<body>

<?php include('../include/header.php') ?>

<form name="myform" method="post" action="order_cal.php">
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2>THANK YOU FOR SHOPPING WITH US</h2>
            </hgroup>        
            <section class="paragraph03">
				<section class="boxload">
                	<div id="slideshow3">
                        <img alt="" title="" src="images/01.png" class="active3" />
                        <img alt="" title="" src="images/02.png" />
                        <img alt="" title="" src="images/03.png" />
                        <img alt="" title="" src="images/04.png" />
                        <img alt="" title="" src="images/05.png" />
                        <img alt="" title="" src="images/06.png" />
                        <img alt="" title="" src="images/07.png" />
                        <img alt="" title="" src="images/08.png" />
                    </div>
                </section>
                <section class="textload">
                	<header>
                	Please Wait, Loading...
                    </header>
                    <p>
                    	ระบบกำลังตรวจสอบรายการสินค้า กรุณารอสักครู่ ขอบคุณค่ะ
                    </p>
                </section>
          	</section>
        </section>
        
        
        
        
		<?php include('../include/sitemap.php') ?>        
    </section>
</section>

</form>
<?php include('../include/footer.php') ?>

<script type="text/javascript" src="../js/accordion/script.js"></script>

<script type="text/javascript">

var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc","section",1,-1);

var nestedAccordion=new TINY.accordion.slider("nestedAccordion");
nestedAccordion.init("nested","section",1,-1,"acc-selected");

</script> 


</body>
</html>
<?php

session_unregister("session_PointDis");
session_unregister("session_PromotionDis");
session_unregister("session_CodeDisHidden");
session_unregister("session_CostCal");

session_unregister("session_tranCostPlusHidden");
session_unregister("session_grandTotalHidden");
session_unregister("session_grandTotalPreHidden");
session_unregister("session_TotalNumPre");
session_unregister("session_TotalNumGrand");
session_unregister("session_tranCostPreChk");
session_unregister("session_SubmitGrandTotal");
session_unregister("session_tranCostPlusCal");
session_unregister("session_realShip");
session_unregister("session_realShipPre");
session_unregister("session_PointDis");
session_unregister("session_CodeDis");
session_unregister("session_CodeDisHidden");
session_unregister("session_PromotionDis");


session_unregister("session_shipping_send_free");//เก็บค่าขนส่งสินค้า
session_unregister("session_shipping_name");//เก็บค่าขนส่งสินค้า
session_unregister("session_shipping_name_th");//เก็บค่าขนส่งสินค้า
session_unregister("shipping");//เก็บค่าขนส่งสินค้า
session_unregister("product_total");//เก็บค่าขนส่งสินค้า
session_unregister("grand_total");//เก็บค่าขนส่งสินค้า


session_unregister("session_pre_shipping_send_free");//เก็บค่าขนส่งสินค้า
session_unregister("session_pre_shipping_name");//เก็บค่าขนส่งสินค้า
session_unregister("session_pre_shipping_name_th");//เก็บค่าขนส่งสินค้า
session_unregister("shipping_pre");//เก็บค่าขนส่งสินค้า
session_unregister("product_total_pre");//เก็บค่าขนส่งสินค้า
session_unregister("grand_total_pre");//เก็บค่าขนส่งสินค้า
session_unregister("groupDelivery");//เก็บค่าขนส่งสินค้า
session_unregister("shipping_p");//เก็บค่าขนส่งสินค้า



session_unregister('order_max_rank');//เก็บไอดี
session_unregister('session_id');//เก็บไอดี
session_unregister('session_code');//เก็บไอดี
session_unregister('session_name_th');//เก็บชื่อ
session_unregister('session_name_eng');//เก็บชื่อ
session_unregister('session_weight');//เก็บน้ำหนัก
session_unregister('session_price');
session_unregister("session_num");//เก็บจำนวนชิ้น
session_unregister("session_size");//เก็บไซด์
session_unregister("session_color");//เก็บสี
session_unregister("session_type_th");//เก็บประเภทสินค้า
session_unregister("session_type_eng");//เก็บประเภทสินค้า


session_unregister('session_pre_id');//เก็บไอดี
session_unregister('session_pre_code');//เก็บไอดี
session_unregister('session_pre_name_th');//เก็บชื่อ
session_unregister('session_pre_name_eng');//เก็บชื่อ
session_unregister('session_pre_weight');//เก็บน้ำหนัก
session_unregister('session_pre_price');
session_unregister("session_pre_num");//เก็บจำนวนชิ้น
session_unregister("session_pre_size");//เก็บไซด์
session_unregister("session_pre_color");//เก็บสี
session_unregister("session_pre_type_th");//เก็บประเภทสินค้า
session_unregister("session_pre_type_eng");//เก็บประเภทสินค้า


session_unregister('check_address');
		
session_unregister('cus_name');
session_unregister('cus_company');
session_unregister('cus_address');
session_unregister('cus_zipcode');
session_unregister('cus_phone');
session_unregister('cus_email');

session_unregister('cus_name2');
session_unregister('cus_lname2');
session_unregister('cus_company2');
session_unregister('cus_address2');
session_unregister('cus_zipcode2');
session_unregister('cus_phone2');
session_unregister('cus_fax2');
session_unregister('cus_email2');

session_unregister('groupDelivery');

?>