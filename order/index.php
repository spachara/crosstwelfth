<?php
session_start();
require_once '../dbconnect.inc';
require("../class.phpmailer.php");
if (!isset($_SESSION['AUTH_PERMISSION_MEMID'])) {
   echo "<script>location.href='../register/login.php'</script>";
}
if($_GET['del'] != '' ){
	
		
		$sql_txt = "SELECT * FROM txt_tb WHERE txt_id = '23' ";
		$result_txt =@mysql_query($sql_txt, $connect);
		$data_txt =@mysql_fetch_array($result_txt);
		
		
		$sql_tmp = "SELECT * FROM temp_order_product WHERE order_number = '".$_GET['del']."' ";
		$result_tmp = @mysql_query($sql_tmp, $connect);
		$num_temp = @mysql_num_rows($result_tmp);
		
		for($t=1;$t<=intval($num_temp);$t++){
		$data_tmp = @mysql_fetch_array($result_tmp);
		
				/*  2012_02-27  แก้ ให้เช็คว่าถ้าทีคนจองสถานะ reserve อยู่ให้จ่ายของให้ ไม่ต้องคืน  stock
				if($data_tmp['buy_status'] == 'INSTOCK' && $data_tmp['sent_status'] == 'READY'){
					
					$update_product = "UPDATE product_tb SET p_stock = p_stock+".$data_tmp['product_number']." WHERE pid = '".$data_tmp['pid']."' ";
					@mysql_query($update_product, $connect);
					
				}elseif($data_tmp['buy_status'] == 'PREORDER' && $data_tmp['sent_status'] == 'READY'){
					
					$update_product = "UPDATE product_tb SET p_stock = p_stock+".$data_tmp['product_number']." WHERE pid = '".$data_tmp['pid']."' ";
					@mysql_query($update_product, $connect);

				}elseif($data_tmp['buy_status'] == 'PREORDER' && $data_tmp['sent_status'] == 'RESERVE'){
					
					$update_product = "UPDATE product_tb SET p_pre = p_pre+".$data_tmp['product_number']." WHERE pid = '".$data_tmp['pid']."' ";
					@mysql_query($update_product, $connect);
					if($data_tmp['product_recive'] > 0)
					{
						$update_product = "UPDATE product_tb SET p_stock = p_stock+".$data_tmp['product_recive']." WHERE pid = '".$data_tmp['pid']."' ";
						@mysql_query($update_product, $connect);
					}

				}elseif($data_tmp['buy_status'] == 'SPARE' && $data_tmp['sent_status'] == 'RESERVE'){
					
					$update_product = "UPDATE product_tb SET p_spare = p_spare+".$data_tmp['product_number']." WHERE pid = '".$data_tmp['pid']."' ";
					@mysql_query($update_product, $connect);
					if($data_tmp['product_recive'] > 0)
					{
						$update_product = "UPDATE product_tb SET p_stock = p_stock+".$data_tmp['product_recive']." WHERE pid = '".$data_tmp['pid']."' ";
						@mysql_query($update_product, $connect);
					}

				}elseif($data_tmp['buy_status'] == 'SPARE' && $data_tmp['sent_status'] == 'READY'){
					
					$update_product = "UPDATE product_tb SET p_stock = p_stock+".$data_tmp['product_number']." WHERE pid = '".$data_tmp['pid']."' ";
					@mysql_query($update_product, $connect);

				}
				*/
				$numbacktostock = 0;
				if($data_tmp['buy_status'] == 'INSTOCK' && $data_tmp['sent_status'] == 'READY'){
					$numbacktostock =  $data_tmp['product_number'];
					//$update_product = "UPDATE product_tb SET p_stock = p_stock+".$data_tmp['product_number']." WHERE pid = '".$data_tmp['pid']."' ";
					//@mysql_query($update_product, $connect);
					 
				}elseif($data_tmp['buy_status'] == 'PREORDER' && $data_tmp['sent_status'] == 'READY'){
					
					$numbacktostock =  $data_tmp['product_number'];
					//$update_product = "UPDATE product_tb SET p_stock = p_stock+".$data_tmp['product_number']." WHERE pid = '".$data_tmp['pid']."' ";
					//@mysql_query($update_product, $connect);

				}elseif($data_tmp['buy_status'] == 'PREORDER' && $data_tmp['sent_status'] == 'RESERVE'){
					
					$pro_num = $data_tmp['product_number'] -  $data_tmp['product_recive'];
					if($pro_num > 0)
					{
						$update_product = "UPDATE product_tb SET p_pre = p_pre+".$pro_num." WHERE pid = '".$data_tmp['pid']."' ";
						@mysql_query($update_product, $connect);
					}
					 if($data_tmp['product_recive'] > 0)
					{
						$numbacktostock =  $data_tmp['product_recive'];
						//$update_product = "UPDATE product_tb SET p_stock = p_stock+".$data_tmp['product_recive']." WHERE pid = '".$data_tmp['pid']."' ";
						//@mysql_query($update_product, $connect);
					}

				}elseif($data_tmp['buy_status'] == 'SPARE' && $data_tmp['sent_status'] == 'RESERVE'){
					
					$sql_product = "select * from product_tb WHERE pid = '".$data_tmp['pid']."' ";
					$result_pro = @mysql_query($sql_product, $connect);
					$data_pro =@mysql_fetch_array($result_pro);
					$pro_code =  $data_pro['p_code'];
					$pro_color =  $data_pro['p_color'];
					$pro_num = $data_tmp['product_number'] -  $data_tmp['product_recive'];
					if($pro_num > 0)
					{
					$update_product = "UPDATE product_tb SET p_spare = p_spare+".$pro_num." WHERE p_code = '".$pro_code."' and p_color = '" . $pro_color . "'";
					@mysql_query($update_product, $connect);
					}
					 if($data_tmp['product_recive'] > 0)
					{
						$numbacktostock =  $data_tmp['product_recive'];
						//$update_product = "UPDATE product_tb SET p_stock = p_stock+".$data_tmp['product_recive']." WHERE pid = '".$data_tmp['pid']."' ";
						//@mysql_query($update_product, $connect);
					}

				}elseif($data_tmp['buy_status'] == 'SPARE' && $data_tmp['sent_status'] == 'READY'){
					
					$numbacktostock =  $data_tmp['product_number'];
					//$update_product = "UPDATE product_tb SET p_stock = p_stock+".$data_tmp['product_number']." WHERE pid = '".$data_tmp['pid']."' ";
					//@mysql_query($update_product, $connect);

				}
				
				$real_recive = $numbacktostock;
						if($real_recive > 0)
						{
							$sql_reserve = "SELECT * FROM temp_order_product where pid ='".$data_tmp['pid']."'";
							$sql_reserve .= " AND sent_status = 'RESERVE' order by date_in asc";
							$result_reserve =@mysql_query($sql_reserve, $connect);
							
							$num_reserve =@mysql_num_rows($result_reserve);
							
							
							
							for($r=1;$r<=intval($num_reserve);$r++){
							
								$data_reserve =@mysql_fetch_array($result_reserve);
								
								if($real_recive != '' and $real_recive > 0 ){
									
									$real_recive = $real_recive - $data_reserve['product_number']+$data_reserve['product_recive'];
									
									if($real_recive > 0){
										
										 $update_num = $data_reserve['product_number'];
										 $update_status = "READY";
										
									}else{
									$update_num = $data_reserve['product_number'] + $real_recive;
										if($update_num > 0){
												
										 $update_num = $update_num;
										 
										 if($update_num == $data_reserve['product_number']){
										 $update_status = "READY";
										 }else{
										 $update_status = "RESERVE";
										 }
										 
										 
										}else{
										 $update_num =0;
										 $update_status = "RESERVE";
										}
									}
									
									$update_product_number = "UPDATE temp_order_product SET product_recive = '".$update_num."', sent_status = '".$update_status."'";
									$update_product_number .= " where temp_id = '".$data_reserve['temp_id']."'";
									$result_product_number =@mysql_query($update_product_number, $connect);	
									//echo $update_product_number."<br>";
								}
							
							
							
							}
							if($real_recive > 0)
							{
								$update_product = "UPDATE product_tb SET p_stock = p_stock+".$real_recive." WHERE pid = '".$data_tmp['pid']."' ";
								@mysql_query($update_product, $connect);
							}
						}
				
			$sql_delete_detail = "DELETE FROM temp_order_product WHERE temp_id = '".$data_tmp['temp_id']."' ";
			@mysql_query($sql_delete_detail, $connect);
		
		}
		
		$select_user = "SELECT * FROM user_tb WHERE u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."'";
		$result_user =@mysql_query($select_user);
		$data_user =@mysql_fetch_array($result_user);
		
		$edit_order = "UPDATE order_tb SET order_status = '0' WHERE order_number = '".$_GET['del']."' ";
		@mysql_query($edit_order, $connect);
		
					$messages = "เรียนคุณ ".$data_user['u_fname']."<br><br>";
					
					$messages .= 'อีเมลล์นี้เป็นการยืนยันว่าทางเราได้รับการยกเลิกออร์เดอร์ เลขที่ '.'"'.$_GET['val_order'].'" ของท่านแล้ว<br>';
					$messages .= "หากท่านมีความประสงค์ต้องการสินค้ารายการนี้  กรุณาทำรายการสั่งซื้อใหม่คะ<br>";
					$messages .= $data_txt['txt_detail_th'];
		

					//echo $messages;
					
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
					$mail->Subject = "Cross Twelfth :: Cancel Order"; // หัวข้อในการส่ง email นั้นๆ
					
					$body = $messages;
					$mail->MsgHTML($body);
					
					$mail->AddAddress($data_user['u_mail'], $data_user['u_fname']); // ผู้รับคนที่หนึ่ง , ชื่อผู้รับ ** กรุณีผู้สองคุณ สามารถเพิ่มบรรทัดนี้อีกได้
					$mail->AddBCC("amanichanon@gmail.com", "Orm");
					$mail->AddBCC("crosstwelfth@yahoo.com", "Crosstwelfth");
					$mail->AddBCC("cross12th@hotmail.com", "C12");
		
					if($mail->Send()){
		
					?>
								  <script>
									location.href='index.php';
								  </script>
					<?php
	
					}
}

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
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2>ประวัติการสั่งซื้อ</h2>
            </hgroup>        
            <section class="paragraph03">
				<section class="blogOrder" style="width:900px">
                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                        	<td width="25%" align="center" valign="middle">
                            	<p>Order Number</p>
                                <span>เลขที่ใบสั่งซื้อ</span>
                            </td>
                            <td width="13%" align="center" valign="middle">
                            	<p>Price</p>
                                <span>ยอดรวม(บาท)</span></td>
                            <td width="24%" align="center" valign="middle">
                            	<p>Status<span></span>
                                  <br />
                            	สถานะ</p></td>
                            <td width="22%" align="center" valign="middle" >สถานะการชำระเงิน</td>
                            <td width="12%" align="center" valign="middle" >สถานะการโอนเงิน</td>
                            <td width="4%" align="center" valign="middle" >&nbsp;
                              
                            </td>
                        </tr>
                        <!------------------------------------------>
						<?php                        
                        $sql_insert_order = "select * from order_tb where u_id <> '0' AND u_id  = '".$_SESSION['AUTH_PERMISSION_MEMID']."' Group by order_number order by date_in desc LIMIT 20";
                        $result_insert_order = @mysql_query($sql_insert_order, $connect);
                        $num_order = @mysql_num_rows($result_insert_order);
						
						   for($p=1;$p<=intval($num_order);$p++){
						   $data_order= @mysql_fetch_array($result_insert_order);
						   
						   
								$sql_insert_order4 = "select * from order_tb where order_number = '".$data_order['order_number']."'";
								$result_insert_order4 = @mysql_query($sql_insert_order4, $connect);
								$num_order4 = @mysql_num_rows($result_insert_order4);
								$data_order4= @mysql_fetch_array($result_insert_order4);
								
								if($num_order4 == 2){ 
									
									$val_order = $data_order4['order_number']."-IN <br> ".$data_order4['order_number']."-PRE";
										
										$select_order4 = "SELECT SUM(order_total) as total_order, SUM(order_transport_status) as sum_tran, order_promotion, order_point FROM order_tb WHERE order_number = '".$data_order['order_number']."'";
										$result_order4 =@mysql_query($select_order4, $connect);
										$num_order4 =@mysql_num_rows($result_order4);
										$data_order4 =@mysql_fetch_array($result_order4);


										$total_order_show =  $data_order4['total_order'];
										
										if($data_order4['order_promotion'] != '' ){
										$total_order_show =  $total_order_show - ($total_order_show * ($data_order4['order_promotion']/100));
										}
										$total_order_show =  $total_order_show + $data_order4['sum_tran'];
										if($data_order4['order_point'] != '' ){
										$total_order_show =  $total_order_show - $data_order4['order_point'];
										}
								
								}else{
									$val_order = $data_order4['order_number']."-".$data_order4['order_type'];
											
										
										
										$select_order4 = "SELECT SUM(order_total) as total_order, SUM(order_transport_status) as sum_tran, order_promotion, order_point FROM order_tb WHERE order_number = '".$data_order['order_number']."'";
										$result_order4 =@mysql_query($select_order4, $connect);
										$num_order4 =@mysql_num_rows($result_order4);
										$data_order4 =@mysql_fetch_array($result_order4);
										$total_order_show =  $data_order['order_total'];
										
										$total_order_show =  $data_order4['total_order'];
										
										if($data_order4['order_promotion'] != '' ){
										$total_order_show =  $total_order_show - ($total_order_show * ($data_order4['order_promotion']/100));
										}
										$total_order_show =  $total_order_show + $data_order4['sum_tran'];
										if($data_order4['order_point'] != '' ){
										$total_order_show =  $total_order_show - $data_order4['order_point'];
										}
								}
						   
							   $tracking_number = "";
														
								$sql_check_order_status = "SELECT * FROM order_product_tb WHERE order_number = '".$data_order['order_number']."' ";
								$result_check_order_status =@mysql_query($sql_check_order_status, $connect);
								$num_check_order_status =@mysql_num_rows($result_check_order_status);
								for ($chk=1; $chk<=$num_check_order_status; $chk++) {
									$data_check_order_status =@mysql_fetch_array($result_check_order_status);
									
									if ($data_check_order_status['tracking_number'] != "") {
										$tracking_number[] = "T";
									} else {
										$tracking_number[] = "F";
									}
								}
								//print_r($tracking_number);
                        ?>
                        <tr>
                        	<td align="center" valign="middle"><?php echo $val_order;?></td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($total_order_show);?></strong>
                            </td>
                            <td align="center" valign="middle">
                                                <?php 
												if (in_array("T", $tracking_number, true) && in_array("F", $tracking_number, true)) {
														echo "<font color=#F90>ค้างส่งสินค้าบางรายการ</font>";
												} else {
													if($data_order['order_status']==0){
														echo "<font color=#FF0000>ยกเลิกใบสั่งซื้อ</font>";
													}elseif($data_order['order_status']==1){
														echo "<font color=#000000>รอชำระค่าสินค้า</font>";
													}elseif($data_order['order_status']==5){
														echo "<font color=#6600CC>แจ้งชำระเงินแล้ว/กำลังรอตรวจสอบ</font>";
													}elseif($data_order['order_status']==2){
														echo "<font color=#6600CC>ได้รับชำระเงินแล้ว/รอจัดส่งสินค้า</font>";
													}elseif($data_order['order_status']==3){
														echo "<font color=#0000FF>จัดส่งสินค้าเรียบร้อยแล้ว</font>";
													}elseif($data_order['order_status']==4){
														echo "<font color=#00CC00>Complete</font>";
													}
												}
												?>
                            </td>
                            <td align="center" valign="middle">
                            <?php
								if($data_order['payment_status']==0){
									echo "<font color=#000000>ยังไม่ได้แจ้งขำระเงิน</font>";
								}else{
									echo "<font color=#6600CC>แจ้งชำระเงินแล้ว</font>";
								}
							?>
                            </td>

                            <td align="center" valign="middle">
                            <?php 
								if($data_order['tranfer_status']==1){
									//echo "<font color=#000000>โอนพอดี</font>";
								}elseif($data_order['tranfer_status']==2){
									echo "<font color=red>โอนขาด</font> : ".$data_order['tranfer_value'];
								}elseif($data_order['tranfer_status']==3){
									//echo "<font color=#FF6600>โอนเกิน</font>:".$data_order['tranfer_value'];
								}
							?>
                            </td>
                            <td align="center" valign="middle">
                            	<div style="overflow:hidden; width:65px;">
                            	<nav style="float:left;">
                               	<a href="view.php?n=<?php echo $data_order['order_number'];?>"><img alt="" title="" src="images/icon-view.png" width="16" /></a></nav>
                                <nav style="float:left; margin-left:10px;">
                                	
                                    
                                    <?php
									$date = substr($data_order['date_in'],0,10);
									$today = date('Y')."-".date('m')."-".date('d');
									$del_date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
									
                                    if($data_order['order_status']== 1 && ($del_date == $today || $date == $today) ){
									?>
                                    <a href="?del=<?php echo $data_order['order_number'];?>&val_order=<?php echo $val_order;?>" onClick="return confirm('คุณต้องการยกเลิกใบสั่งซื้อนี้ ใช่/ไม่ใช่?')">
                                    <img alt="" title="" src="images/icon-remove.png" width="16" /> 
                                    </a>
                                    <?php }else{ ?>
                                    <a href="#" onClick="return confirm('คุณไม่สามารถยกเลิกใบสั่งซื้อนี้ได้ค่ะ')"><img alt="" title="" src="images/icon-remove.png" width="16" /></a>
                                    <?php } ?>
                                </nav>
                                </div>
                            </td>
                        </tr>
                        <?php }?>
                        
                    </table>
                </section>		
                <section class="paragraph03 blogOrder-t"></section>		                                         	
          </section>
        </section>

        
        
		<?php include('../include/sitemap.php') ?>        
    </section>
</section>
<?php include('../include/footer.php') ;

?>

<script type="text/javascript" src="../js/accordion/script.js"></script>

<script type="text/javascript">

var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc","section",1,-1);

var nestedAccordion=new TINY.accordion.slider("nestedAccordion");
nestedAccordion.init("nested","section",1,-1,"acc-selected");

</script> 


</body>
</html>
