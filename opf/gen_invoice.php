<?php
		$sql_insert_order = "select * from order_tb where order_number = '".$_POST['order_number_real']."'";
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
				<td align=right style=\"font-size:12px; font-weight:bold;\">เลขที่ใบสั่งซื้อ : ".$_POST['order_number_real']."-"."IN</td>
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
						   $sql_insert_product = "select * from order_product_tb where order_number = '".$_POST['order_number_real']."'";
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
										


							$sql_check_pre_order = "select * from order_tb where order_number = '".$_POST['order_number_real']."'";
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



		$sql_insert_pre_order = "select * from order_tb where order_number = '".$_POST['order_number_real']."'";
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
				<td align=right style=\"font-size:12px; font-weight:bold;\">เลขที่ใบสั่งซื้อ : ".$_POST['order_number_real']."-"."PRE</td>
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
			   $sql_insert_pre_product = "select * from order_product_tb where order_number = '".$_POST['order_number_real']."'";
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

			$sql_check_order = "select * from order_tb where order_number = '".$_POST['order_number_real']."'";
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

							
		if($_POST['order_number_real']){	
		$pdf=new FPDF();
		$pdf->AddPage();
		$mpdf = new mPDF('th');
		$mpdf->SetDisplayMode('fullpage');
					
		$mpdf->WriteHTML($messages);	// The parameter 1 tells that this is css/style only and no body/html/text
		$mpdf->Output('../tmp/'.$_POST['order_number_real']."-".'IN.pdf' , 'F');


		$letter = $_POST['order_number_real']."-"."IN.pdf";
		$f_name='../tmp/'.$letter;    // use relative path OR ELSE big headaches. $letter is my file for attaching. 
		
		$sub_mit = substr($_POST['order_number_real'],-2);
		
		$view_total = number_format($grang_total).".".$sub_mit;
		}
		
		if($_POST['order_number_real']){				
		
		$pdf=new FPDF();
		$pdf->AddPage();
		$mpdf = new mPDF('th');
		$mpdf->SetDisplayMode('fullpage');
		
		$mpdf->WriteHTML($messages2);	// The parameter 1 tells that this is css/style only and no body/html/text
		$mpdf->Output('../tmp/'.$_POST['order_number_real']."-".'PRE.pdf' , 'F');
		

		$letter2 = $_POST['order_number_real']."-".'PRE.pdf';
		$f_name2='../tmp/'.$letter2;    // use relative path OR ELSE big headaches. $letter is my file for attaching.
		
		$sub_mit = substr($_POST['order_number_real'],-2);
		
		$view_total = number_format($grang_total_pre).".".$sub_mit;
		}

?>  