
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
				<tr>
				<td colspan=\"2\" align=center style=\"font-size:14px; font-weight:bold;\">
				<img src='http://www.crosstwelfth.com/shopping-bag/images/New-Logo.jpg' height='100' /></td>
				</tr>
				<tr>
				<td align=left style=\"font-size:12px; font-weight:bold;\"><strong>วันที่สั่งซื้อ </strong> : ".$data_order['date_in']."-"."IN</td>
				<td align=right style=\"font-size:12px; font-weight:bold;\">เลขที่ใบสั่งซื้อ : ".$_SESSION['order_id']."-"."IN</td>
				</tr>
				<tr>
				<td align=\"right\" style=\"font-size:12px; font-weight:bold;\">&nbsp;</td>
				<td align=\"right\" style=\"font-size:12px; font-weight:bold;\">&nbsp;</td>
				</tr>
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
				<p>";

					$messages .="<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" bordercolor=\"#000000\" bgcolor=\"#ffffff\" 
					style='background-color:#000000; *width:800px !important; width:800px;font-family:Tahoma;color:#000000; font-size:12px;'>
                    <tr bgcolor=\"#ffffff\"  style=\"!important; font-weight:bold\">
                        <td align=\"center\" style=\"!important;*width:20% !important;width:18%\">".($_SESSION['sess_language'] == 'eng' ? 'Product name' : 'ชื่อสินค้า')."</td>
                        <td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Quantity' : 'จำนวน')."</td>
                        <td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Unit price' : 'ราคา/ชิ้น')."</td>
                        <td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Product value' : 'ราคารวม')."</td>
                    </tr>";
						   $sql_insert_product = "select * from order_product_tb where order_number = '".$_SESSION['order_id']."'";
						   $sql_insert_product .= " AND order_type = 'IN'";

						   $result_insert_product = @mysql_query($sql_insert_product, $connect);
						   $num_product = @mysql_num_rows($result_insert_product);
						   
						   for($p=1;$p<=intval($num_product);$p++){
						   $data_order_product = @mysql_fetch_array($result_insert_product);
						   
							$product_color = "select name from color_tb where c_code = '".$data_order_product['order_p_color']."' ";
							$result_productcolor = @mysql_query($product_color, $connect);
							$data_productcolor =@mysql_fetch_array($result_productcolor);


							$messages .= "
							<tr height='20px' style='background-color:".$tr." !important;color:white ' >
							<td style='background-color:#FFFFFF !important;*width:20% !important;width:18%;color:#000000' align='center'>
							&nbsp;".$data_order_product['pro_code']."&nbsp;".$data_order_product['order_p_size']."
							&nbsp;".$data_productcolor['name']."&nbsp;".$data_order_product['order_p_name']."</td>										
							<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>
							&nbsp;".$data_order_product['order_p_stock']."</td>
							<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>
							&nbsp;".number_format($data_order_product['order_p_price'])."</td>
							<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>
							&nbsp;".number_format($data_order_product['order_p_total'])."</td>
							</tr>";
							$total = $total + $data_order_product['order_p_total'];
							$num += $data_order_product['order_p_stock'];
							}

							$messages .= "</table><br><font color=#FF0000>หมายเหตุ : กรุณาตรวจสอบรายการจองให้ถูกต้องก่อนทำการชำระเงิน</font><br><br>";


							$messages .= "<table width=\"400\" align=\"right\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" 
							style=\" font-family:Tahoma;color:#000000; font-size:12px; \">";
							$messages .= "<tr>
							<td align=\"right\" width=\"158\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "จำนวนสินค้าทั้งหมด" : "จำนวนสินค้าทั้งหมด")."</b></td>
							<td align=\"right\" >".$num.($_SESSION['sess_language'] == 'eng' ?" รายการ" : " รายการ")."</td>
							</tr>";
							$messages .= "<tr>
							<td align=\"right\" width=\"158\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Grand total" : "สินค้า IN-STOCK ราคารวม")."</b></td>
							<td align=\"right\" >".number_format($data_order['order_total']).($_SESSION['sess_language'] == 'eng' ?" Baht" : " บาท")."</td>
							</tr>";
										


							$sql_check_pre_order = "select * from order_tb where order_number = '".$_SESSION['order_pre_id']."'";
							$sql_check_pre_order .= " AND order_type = 'PRE'";
							$result_check_pre_order = @mysql_query($sql_check_pre_order, $connect);
							$num_check_order = @mysql_num_rows($result_check_pre_order);
							$data_check_order = @mysql_fetch_array($result_check_pre_order);
							
							$grang_total = $total + $data_check_order['order_total'];
							
							
							$messages .= "<tr>
							<td align=\"right\" width=\"220\" height=\"22\" ><b>ค่าจัดส่ง IN-STOCK ".$data_order['order_transport']."</b></td>
							<td align=\"right\" >".$data_order['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
							</tr>";
							
							
							if($num_check_order){

							$messages .= "<tr>
							<td align=\"right\" width=\"220\" height=\"22\" ><b>สินค้า PRE-ORDER ราคารวม</b></td>
							<td align=\"right\" >".$data_check_order['order_total'].($_SESSION['sess_language'] == 'eng' ?" Baht" : " บาท")."</td>
							</tr>";
							
							
							}
							
							
							
							
							if($num_check_order){
							
								if($data_check_order['order_group'] != ''){
								$messages .= "<tr>
								<td align=\"right\" width=\"220\" height=\"22\" ><b>ส่งพร้อม ค่าจัดส่ง PRE-ORDER</b></td>
								<td align=\"right\" >".$data_check_order['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
								</tr>";
								$pre_tran = $data_check_order['order_transport_status'];
								}else{
									
								$messages .= "<tr>
								<td align=\"right\" width=\"220\" height=\"22\" ><b>ค่าจัดส่ง PRE-ORDER</b></td>
								<td align=\"right\" >".$data_check_order['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
								</tr>";
	
								$pre_tran = $data_check_order['order_transport_status'];
								}
							
							}
					
					
							if($data_order['order_promotion'] != ''){
							$messages .= "<tr>
							<td align=\"right\" width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Discount" : "ได้รับส่วนลด")."</b></td>
							<td align=\"right\" >".$data_order['order_promotion']." %"."</td>
							</tr>";
							
							$grang_total = $grang_total - ($grang_total * ($data_order['order_promotion'] / 100));
							}
							
							
							$grang_total = $grang_total + $data_order['order_transport_status'] + $pre_tran;
							
							if($data_order['order_point'] != '' && $data_order['order_point'] != '0'){
							$messages .= "<tr>
							<td align=\"right\" width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Point" : "แต้มส่วนลด")."</b></td>
							<td align=\"right\" >".$data_order['order_point'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
							</tr>";

							$grang_total = $grang_total - $data_order['order_point'];
							}

							$messages .= "<tr>
							<td align=\"right\" width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Grand total" : "ราคาสุทธิ")."</b></td>
							<td align=\"right\" >".number_format($grang_total).($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
							</tr>";

							$messages .="								
							</td>
							</tr>
							</table>";
							
							
							$messages .= "<br><br><table width=\"800\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#FFFFFF\" style=\" 
							font-family:Tahoma;color:#000000; font-size:12px;\">
							<tr>
							<td height=\"25\" align=center style=\"font-size:14px; font-weight:bold;\">
							ยอดที่ต้องโอน ".number_format($grang_total).".".substr($data_order['order_number'],-2)." บาท
							</td>
							</tr>
							<tr>
							<td height=\"25\" align=\"center\" style=\"font-size:12px;\">
						   <font color=\"#FF0000\"> *กรุณาโอนเงินตามยอดเศษสตางค์นี้  เพื่อความรวดเร็วในการตรวจสอบยอดโอน และการจัดส่งสินค้า**</font>
							</td>
							</tr>
							<tr>
							  <td height=\"40\" align=\"left\" style=\"font-size:12px;\">
							  หากชำระเงินเรียบร้อยแล้ว   ท่านสามารถแจ้งชำระเงินได้ที่  เมนู 
							  &ldquo;แจ้งชำระเงิน&rdquo;  ในหน้าสมาชิกของ เวบไซต์  Crosstwelfth
							  และกรุณาเก็บหลักฐานการโอนเงินไว้ จนกว่าจะได้รับสินค้าคะ
							  </td>
							</tr>
							</tr>
							<tr>
							  <td height=\"100\" align=\"center\" style=\"font-size:12px;\">
							  
							  <table width=\"700\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" style=\" font-family:Tahoma;color:#000000; font-size:12px; \">
								<tr>
								  <td height=\"25\" colspan=\"2\" align=\"center\">
								  <strong>การชำระเงินชำระเงินผ่านบัญชีชื่อบัญชี :  คุณสรรเพชญ  ชินะโชติ </strong></td>
								</tr>
								<tr>
								  <td height=\"50\" valign=\"top\">
								  1. <img src='http://www.crosstwelfth.com/images/bank/20141011-142310.png' height='25' /> ธนาคารกสิกรไทย เลขที่บัญชี 758-2-80661-0<br>
								  2. <img src='http://www.crosstwelfth.com/images/bank/20141011-142356.png' height='25' /> ธนาคารกรุงศรีอยุธยาเลขที่บัญชี 053-1321365<br>
								  3. <img src='http://www.crosstwelfth.com/images/bank/20141011-142333.png' height='25' /> ธนาคารไทยพาณิชย์ เลขที่บัญชี 056-2408095<br>
								  </td>
								  <td valign=\"top\">
								  4. <img src='http://www.crosstwelfth.com/images/bank/20141011-142345.png' height='25' /> ธนาคาร กรุงไทย   เลขที่บัญชี 981-2-67356-3<br>
								  5. <img src='http://www.crosstwelfth.com/images/bank/20141011-142409.png' height='25' /> ธนาคารกรุงเทพ  เลขที่บัญชี 087-7-19313-6<br>
								  </td>
								</tr>
							  </table></td>
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
		$num_pre_order = @mysql_num_rows($result_insert_pre_order);
		$data_pre_order = @mysql_fetch_array($result_insert_pre_order);
		
		
		if($num_pre_order){
			
		$messages2 = "<table width=\"800\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#FFFFFF\" style=\" font-family:Tahoma;color:#000000; font-size:12px; \">
				<tr>
				<td colspan=\"2\" align=center style=\"font-size:14px; font-weight:bold;\">
				<img src='http://www.crosstwelfth.com/shopping-bag/images/New-Logo.jpg' height='100' /></td>
				</tr>
				<tr>
				<td align=left style=\"font-size:12px; font-weight:bold;\"><strong>วันที่สั่งซื้อ </strong> : ".$data_pre_order['date_in']."</td>
				<td align=right style=\"font-size:12px; font-weight:bold;\">เลขที่ใบสั่งซื้อ : ".$_SESSION['order_pre_id']."-"."PRE</td>
				</tr>
				<tr>
				<td align=\"right\" style=\"font-size:12px; font-weight:bold;\">&nbsp;</td>
				<td align=\"right\" style=\"font-size:12px; font-weight:bold;\">&nbsp;</td>
				</tr>
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
				<p>";
		

				$messages2 .="<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" bordercolor=\"#000000\" bgcolor=\"#ffffff\" 
				style='background-color:#000000; *width:800px !important; width:800px;font-family:Tahoma;color:#000000; font-size:12px;'>
				<tr bgcolor=\"#ffffff\"  style=\"!important; font-weight:bold\">
					<td align=\"center\" style=\"!important;*width:20% !important;width:18%\">".($_SESSION['sess_language'] == 'eng' ? 'Product name' : 'ชื่อสินค้า')."</td>
					<td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Quantity' : 'จำนวน')."</td>
					<td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Unit price' : 'ราคา/ชิ้น')."</td>
					<td align=\"center\" style=\"!important;*width:12% !important;width:14%\">".($_SESSION['sess_language'] == 'eng' ? 'Product value' : 'ราคารวม')."</td>
				</tr>";
			   $sql_insert_pre_product = "select * from order_product_tb where order_number = '".$_SESSION['order_pre_id']."'";
			   $sql_insert_pre_product .= " AND order_type = 'PRE'";
			   $result_insert_pre_product = @mysql_query($sql_insert_pre_product, $connect);
			   $num_product_pre = @mysql_num_rows($result_insert_pre_product);
			   
			   for($p=1;$p<=intval($num_product_pre);$p++){
			   $data_pre_order_product = @mysql_fetch_array($result_insert_pre_product);
			   
				$product_precolor = "select name from color_tb where c_code = '".$data_pre_order_product['order_p_color']."' ";
				$result_preproductcolor = @mysql_query($product_precolor, $connect);
				$data_preproductcolor =@mysql_fetch_array($result_preproductcolor);


				$messages2 .= "
				<tr height='20px' style='background-color:".$tr." !important;color:white ' >
				<td style='background-color:#FFFFFF !important;*width:20% !important;width:18%;color:#000000' align='center'>
				&nbsp;".$data_pre_order_product['pro_code']."&nbsp;".$data_pre_order_product['order_p_size']."
				&nbsp;".$data_preproductcolor['name']."&nbsp;".$data_pre_order_product['order_p_name']."</td>										
				<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>
				&nbsp;".$data_pre_order_product['order_p_stock']."</td>
				<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>
				&nbsp;".number_format($data_pre_order_product['order_p_price'])."</td>
				<td style='background-color:#FFFFFF !important;*width:12% !important;width:14%;color:#000000'  align='center'>
				&nbsp;".number_format($data_pre_order_product['order_p_total'])."</td>
				</tr>";
				$total2 = $total2 + $data_pre_order_product['order_p_total'];
				$num2 += $data_pre_order_product['order_p_stock'];
							
							}

			$messages2 .= "</table><br><font color=#FF0000>หมายเหตุ : กรุณาตรวจสอบรายการจองให้ถูกต้องก่อนทำการชำระเงิน</font><br><br>";
			
			$messages2 .= "<table width=\"400\" align=\"right\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\" font-family:Tahoma;color:#000000; font-size:12px; \">";
			
			
			$messages2 .= "<tr>
			<td align=\"right\" width=\"158\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "จำนวนสินค้าทั้งหมด" : "จำนวนสินค้าทั้งหมด")."</b></td>
			<td align=\"right\" >".$num2.($_SESSION['sess_language'] == 'eng' ?" รายการ" : " รายการ")."</td>
			</tr>";

			$messages2 .= "<tr>
			<td align=\"right\" width=\"158\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "PRE-ORDER TOTAL" : "สินค้า PRE-ORDER รวม")."</b></td>
			<td align=\"right\" >".number_format($data_pre_order['order_total']).($_SESSION['sess_language'] == 'eng' ?" Baht" : " บาท")."</td>
			</tr>";

			$sql_check_order = "select * from order_tb where order_number = '".$_SESSION['order_id']."'";
			$sql_check_order .= " AND order_type = 'IN'";
			$result_check_order = @mysql_query($sql_check_order, $connect);
			$num_check = @mysql_num_rows($result_check_order);
			$data_check = @mysql_fetch_array($result_check_order);
			
			$grang_total_pre = $data_pre_order['order_total'] + $data_check['order_total'];
			
			
			$messages2 .= "<tr>
			<td align=\"right\" width=\"220\" height=\"22\" ><b>ค่าจัดส่ง PRE-ORDER ".$data_pre_order['order_transport']."</b></td>
			<td align=\"right\" >".$data_pre_order['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
			</tr>";
							
							
			if($num_check){

			$messages2 .= "<tr>
			<td align=\"right\" width=\"220\" height=\"22\" ><b>สินค้า IN-STOCK ราคารวม</b></td>
			<td align=\"right\" >".$data_check['order_total'].($_SESSION['sess_language'] == 'eng' ?" Baht" : " บาท")."</td>
			</tr>";
			
			
			}
							
							
							
							
				if($num_check){

					if($data_pre_order['order_group'] != ''){

					$messages2 .= "<tr>
					<td align=\"right\" width=\"220\" height=\"22\" ><b>ส่งพร้อมกับ ค่าจัดส่ง IN-STOCK</b></td>
					<td align=\"right\" >".$data_check['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
					</tr>";
					
					$order_transport = $data_check['order_transport_status'];
					}else{
						
					$messages2 .= "<tr>
					<td align=\"right\" width=\"220\" height=\"22\" ><b>ค่าจัดส่ง IN-STOCK</b></td>
					<td align=\"right\" >".$data_check['order_transport_status'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
					</tr>";
					
					$order_transport = $data_check['order_transport_status'];

					}
				
				}
					
					
							if($data_pre_order['order_promotion'] != ''){
							$messages2 .= "<tr>
							<td align=\"right\" width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Discount" : "ได้รับส่วนลด")."</b></td>
							<td align=\"right\" >".$data_pre_order['order_promotion']." %"."</td>
							</tr>";
							
							$grang_total_pre = $grang_total_pre - ($grang_total_pre * ($data_pre_order['order_promotion'] / 100));
							}
							
							$grang_total_pre = $grang_total_pre + $data_pre_order['order_transport_status'] + $order_transport;
							
							if($data_pre_order['order_point'] != '' && $data_pre_order['order_point'] != '0'){
							$messages2 .= "<tr>
							<td align=\"right\" width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Point" : "แต้มส่วนลด")."</b></td>
							<td align=\"right\" >".$data_pre_order['order_point'].($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
							</tr>";

							$grang_total_pre = $grang_total_pre - $data_pre_order['order_point'];
							}

							$messages2 .= "<tr>
							<td align=\"right\" width=\"220\" height=\"22\" ><b>".($_SESSION['sess_language'] == 'eng' ? "Grand total" : "ราคาสุทธิ")."</b></td>
							<td align=\"right\" >".number_format($grang_total_pre).($_SESSION['sess_language'] == 'eng' ? " Baht" : " บาท")."</td>
							</tr>";

							$messages2 .="								
							</td>
							</tr>
							</table>";
							
							
							$messages2 .= "<br><br><table width=\"800\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" bgcolor=\"#FFFFFF\" style=\" 
							font-family:Tahoma;color:#000000; font-size:12px;\">
							<tr>
							<td height=\"25\" align=center style=\"font-size:14px; font-weight:bold;\">
							ยอดที่ต้องโอน ".number_format($grang_total_pre).".".substr($data_pre_order['order_number'],-2)." บาท
							</td>
							</tr>
							<tr>
							<td height=\"25\" align=\"center\" style=\"font-size:12px;\">
						   <font color=\"#FF0000\"> *กรุณาโอนเงินตามยอดเศษสตางค์นี้  เพื่อความรวดเร็วในการตรวจสอบยอดโอน และการจัดส่งสินค้า**</font>
							</td>
							</tr>
							<tr>
							  <td height=\"40\" align=\"left\" style=\"font-size:12px;\">
							  หากชำระเงินเรียบร้อยแล้ว   ท่านสามารถแจ้งชำระเงินได้ที่  เมนู 
							  &ldquo;แจ้งชำระเงิน&rdquo;  ในหน้าสมาชิกของ เวบไซต์  Crosstwelfth
							  และกรุณาเก็บหลักฐานการโอนเงินไว้ จนกว่าจะได้รับสินค้าคะ
							  </td>
							</tr>
							<tr>
							  <td height=\"100\" align=\"center\" style=\"font-size:12px;\">
							  
							  <table width=\"700\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" style=\" font-family:Tahoma;color:#000000; font-size:12px; \">
								<tr>
								  <td height=\"25\" colspan=\"2\" align=\"center\">
								  <strong>การชำระเงินชำระเงินผ่านบัญชีชื่อบัญชี :  คุณสรรเพชญ  ชินะโชติ </strong></td>
								</tr>
								<tr>
								  <td height=\"50\" valign=\"top\">
								  1. <img src='http://www.crosstwelfth.com/images/bank/20141011-142310.png' height='25' /> ธนาคารกสิกรไทย เลขที่บัญชี 758-2-80661-0<br>
								  2. <img src='http://www.crosstwelfth.com/images/bank/20141011-142356.png' height='25' /> ธนาคารกรุงศรีอยุธยาเลขที่บัญชี 053-1321365<br>
								  3. <img src='http://www.crosstwelfth.com/images/bank/20141011-142333.png' height='25' /> ธนาคารไทยพาณิชย์ เลขที่บัญชี 056-2408095<br>
								  </td>
								  <td valign=\"top\">
								  4. <img src='http://www.crosstwelfth.com/images/bank/20141011-142345.png' height='25' /> ธนาคาร กรุงไทย   เลขที่บัญชี 981-2-67356-3<br>
								  5. <img src='http://www.crosstwelfth.com/images/bank/20141011-142409.png' height='25' /> ธนาคารกรุงเทพ  เลขที่บัญชี 087-7-19313-6<br>
								  </td>
								</tr>
							  </table></td>
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

		if($_SESSION['order_pre_id'] != '' || $_SESSION['order_id'] != ''){	

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
			//$mail->AddBCC("amanichanon@gmail.com", "Orm");
			//$mail->AddBCC("crosstwelfth@yahoo.com", "Crosstwelfth");
			//$mail->AddBCC("cross12th@hotmail.com", "C12");

			$mail->Send();
		}
?>            
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K8BH2BP');</script>
<!-- End Google Tag Manager -->
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
				<section class="blogOrder">
				   <?php
                    if($_SESSION['order_pre_id'] == '' && $_SESSION['order_id'] == ''){	
                            echo "<center><font color='#FF0000'>สินค้าบางรายการที่สั่งเข้ามา มีจำนวนไม่พอกับการสั่งซื้อ <br>ทางเราจึงจำเป็นต้องยกเลิกรายการสินค้าดังกล่าว หากยังต้องการสั่งซื้อสินค้า กรุณาทำการสั่งซื้อใหม่อีกครั้งค่ะ</font></center>";
                    }else{
                   ?>
                   
                   
                    <center>
                    
                    <p>
                    <font style='font-size:18px; color:#FF3399;'>
                    ใบสั่งซื้อของท่าน  หมายเลข 
					<?php if($_SESSION['order_id'] != ''){?>
						<a href="../tmp/<?php echo $_SESSION['order_id'];?>-IN.pdf" target="_blank" style="font-size:18px; color:#FF3399;">
						<?php echo $_SESSION['order_id'];?>-IN</a>;
                    <?php } ?>
					<?php if($_SESSION['order_pre_id'] != ''){?>
						<a href="../tmp/<?php echo $_SESSION['order_pre_id'];?>-PRE.pdf" target="_blank" style="font-size:18px; color:#FF3399;">
						<?php echo $_SESSION['order_pre_id'];?>-PRE</a>;
                    <?php } ?> ท่านสามารถ ดาวน์โหลด ใบสั่งซื้อ ได้ด้วยการคลิกเลขที่ใบสั่งซื้อค่ะ<br />
                    </font>
                    <font style='font-size:22px; color:#FF3399; font-weight:bold;'>รวมยอดเงินที่ต้องชำระของคุณคือ <?php echo $view_total;?> บาท</font></p>
                    <p><br />
                    </p>
                    <p>**เพื่อความรวดเร็วในการตรวจสอบยอดเงินโอน  และการจัดส่งสินค้า  กรุณานำเลขท้าย  2 ตัว  ของเลขที่ใบสั่งซื้อมาใส่เป็นเศษสตางค์ในการโอนเงิน**<br />
                    <strong>กรุณาชำระเงินเข้าบัญชีชื่อ :  คุณสรรเพชญ  ชินะโชติ </strong></td><br/>
								</tr>
								<tr>
								  <td height=\"50\" valign=\"top\">
								  1. <img src='http://www.crosstwelfth.com/images/bank/20141011-142310.png' height='25' /> ธนาคารกสิกรไทย เลขที่บัญชี 758-2-80661-0<br>
								  2. <img src='http://www.crosstwelfth.com/images/bank/20141011-142356.png' height='25' /> ธนาคารกรุงศรีอยุธยาเลขที่บัญชี 053-1321365<br>
								  3. <img src='http://www.crosstwelfth.com/images/bank/20141011-142333.png' height='25' /> ธนาคารไทยพาณิชย์ เลขที่บัญชี 056-2408095<br>
								  4. <img src='http://www.crosstwelfth.com/images/bank/20141011-142345.png' height='25' /> ธนาคาร กรุงไทย   เลขที่บัญชี 981-2-67356-3<br>
								  5. <img src='http://www.crosstwelfth.com/images/bank/20141011-142409.png' height='25' /> ธนาคารกรุงเทพ  เลขที่บัญชี 087-7-19313-6<br><br />
                    สินค้าที่สั่งซื้อจะบันทึกในระบบ เพื่อรอชำระเงิน 2 วัน     กรุณาชำระเงินและแจ้งชำระเงินภายใน 2 วัน เพื่อรักษาสถานะใบสั่งซื้อนี้นะคะ</p>
                    <p>								  </p>
                    <p>&nbsp;</p>
                    <p>ทั้งนี้    ระบบได้จัดส่งใบสั่งซื้อให้ท่านทาง  อีเมล์ของท่านแล้ว  กรุณาตรวจสอบ Inbox รวมทั้ง Junk Box  ของ Email นะคะ<br /><br />
                    </p>
                    <p>หากมีข้อสงสัย ติดต่อ ทีมงาน ได้ที่ 02 4056562 และ 081 380 2212 หรือ <a href="../inbox/" style='color:#FF3399;'>คลิกที่นี่</a> เพื่อส่งข้อความมาพูดคุยกับทีมงานค่ะ <br />
                      <br />
                      ขอบคุณที่ไว้วางใจให้ Crosstwelfth ได้บริการลูกค้า นะคะ<br /><br />
                  </p></center>
              <?php } ?>
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

session_unregister("session_shipping_send_free");
session_unregister("session_shipping_name");
session_unregister("session_shipping_name_th");
session_unregister("shipping");
session_unregister("shipping_id");
session_unregister("product_total");
session_unregister("grand_total");


session_unregister("session_pre_shipping_send_free");
session_unregister("session_pre_shipping_name");
session_unregister("session_pre_shipping_name_th");
session_unregister("shipping_pre");
session_unregister("shipping_pre_id");
session_unregister("product_total_pre");
session_unregister("grand_total_pre");
session_unregister("groupDelivery");
session_unregister("shipping_p");


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

session_unregister("order_id");
session_unregister("order_pre_id");

?>