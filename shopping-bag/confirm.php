<?php
session_start();
require_once '../dbconnect.inc';
require("../class.phpmailer.php");

session_register("session_PointDis");
session_register("session_PromotionDis");
session_register("session_CodeDisHidden");
session_register("session_CostCal");
session_register("tokens");




$_SESSION['session_PointDis'] = $_POST['PointDis'];
$_SESSION['session_PromotionDis'] = $_POST['PromotionDis'];
$_SESSION['session_CodeDisHidden'] = $_POST['CodeDisHidden'];
$_SESSION['session_CostCal'] = $_POST['CostCal'];



function getToken(){
  $token = sha1(mt_rand());
  if(!isset($_SESSION['tokens'])){
    $_SESSION['tokens'] = array($token => 1);
  }
  else{
    $_SESSION['tokens'][$token] = 1;
  }
  return $token;
}

if($_SESSION['sess_paid']  == '' ){
	session_register('sess_paid');
	$_SESSION['sess_paid']=$_POST['paid'];
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
	 $("html, body").animate({ scrollTop: $(document).height() }, 1000);
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

<?php 

if (($_POST['u_user2'] == '' || $_POST['u_pass2'] == '') && $_SESSION['AUTH_PERMISSION_MEMID'] == "") {?>

	<script type="text/javascript">
		$(document).ready(function() {
			$.fancybox({
						href : 'popup.php?action=confirm_fail',
						type : 'iframe',
						width     : 370,
						height    : 400,
						minWidth  : 100,
						minHeight : 350,
						maxWidth  : 350,
						maxHeight : 9999,
						padding : 5,
						onClosed: function() {   
						window.location ='preorder.php';
						}
					});
				
			});

            </script>  	
<?php
}elseif ($_POST['u_user2'] != '' && $_POST['u_pass2'] != '' && $_SESSION['AUTH_PERMISSION_MEMID'] == '' ) {
	
	$insert_user = "INSERT INTO user_tb(u_id, u_user, u_pass, u_fname, u_lname, u_mobi, u_fax, u_mail, u_add, u_province, u_zipcode, u_facebook, line_id, line_name, date_in)";
	$insert_user .= "VALUES(NULL, '".mysql_real_escape_string($_POST['u_user2'])."', '".mysql_real_escape_string($_POST['u_pass2'])."', '".mysql_real_escape_string($_POST['contact_name'])."', '".mysql_real_escape_string($_POST['contact_surname'])."', '".mysql_real_escape_string($_POST['contact_phone'])."' "; 
	$insert_user .= " , '".mysql_real_escape_string($_POST['contact_fax'])."' , '".mysql_real_escape_string($_POST['contact_email'])."', '".mysql_real_escape_string($_POST['contact_address'])."', '".mysql_real_escape_string($_POST['contact_province'])."' "; 
	$insert_user .= " , '".mysql_real_escape_string($_POST['contact_zipcode'])."', '".mysql_real_escape_string($_POST['u_facebook'])."', '".mysql_real_escape_string($_POST['line_id'])."', '".mysql_real_escape_string($_POST['line_name'])."', NOW())";
	@mysql_query($insert_user, $connect);
	//echo $insert_user;
	
	$select_user_max = "SELECT MAX(u_id) AS max_id FROM user_tb ";
	$result_user_max =@mysql_query($select_user_max, $connect);
	$data_user_max =@mysql_fetch_array($result_user_max);
	
	$select_user = "SELECT * FROM user_tb WHERE u_id = '".$data_user_max['max_id']."' ";
	$result_user =@mysql_query($select_user);
	$data_user =@mysql_fetch_array($result_user);
	
	session_register("AUTH_PERMISSION_FNAME"); 
	session_register("AUTH_PERMISSION_LNAME"); 
	session_register("AUTH_PERMISSION_MEMID");
	
	$_SESSION['AUTH_PERMISSION_FNAME'] = $_POST['contact_name'];
	$_SESSION['AUTH_PERMISSION_LNAME'] = $_POST['contact_surname'];
	$_SESSION['AUTH_PERMISSION_MEMID'] = $data_user['u_id'];
	
		$messages = "<p>";
		$messages .= "เรียนคุณ ".$_POST['contact_name']." ".$_POST['contact_surname']."<br><br>";
		
		
		$messages .= "&nbsp;&nbsp;&nbsp;&nbsp;ขอบคุณที่สมัครสมาชิกกับ www.crosstwelfth.com ค่ะ<br>";
		$messages .= "ท่านสามารถสั่งซื้อสินค้า  แจ้งชำระเงิน  ตรวจสอบสถานะใบสั่งซื้อ  และติดต่อพูดคุยกับทีมงาน<br>";
		$messages .= "ได้ด้วยการ ไซต์  <a href=\"http://www.crosstwelfth.com/register/login.php\">login</a><br><br>";
		
		
		$messages .= "<b>Username</b> : ".$_POST['u_user2']."<br>";
		$messages .= "<b>Password</b> : ".$_POST['u_pass2']."<br><br>";
		$messages .= "เข้าชมและสั่งซื้อสินค้าในเว็บไซต์  <a href=\"http://www.crosstwelfth.com\">Crosstwelfth</a><br><br>";
		$messages .= "<b>C12  HOTLINE</b> :: 02 4056562,  081 3802212  (จันทร์-เสาร์   10.00 - 20.00 น.)<br><br>";
		$messages .= "<b>LINE</b>:: crosstwelfth_team<br>";
		$messages .= "<b>E-MAIL</b> :: info@crosstwelfth.com<br><br>";
		$messages .= "<img src=\"http://www.crosstwelfth.com/images/cross_twelfth-logo.png\"><br>";
		$messages .= "</p>";
			
	
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
		$mail->Subject = "Cross Twelfth :: Register"; // หัวข้อในการส่ง email นั้นๆ
		$body = $messages;
		$mail->MsgHTML($body);

		
		$mail->AddAddress($data_user['u_mail'],$_POST['contact_name']); // ผู้รับคนที่หนึ่ง , ชื่อผู้รับ ** กรุณีผู้สองคุณ สามารถเพิ่มบรรทัดนี้อีกได้


		$mail->Send();
		
		$email_send = 1;
	
}
					session_register('order_transfer');
					
					session_register('cus_name');
					session_register('cus_lname');
					session_register('cus_company');
					session_register('cus_address');
					session_register('cus_province');
					session_register('cus_zipcode');
					session_register('cus_phone');
					session_register('cus_fax');
					session_register('cus_email');
					
					session_register('cus_name2');
					session_register('cus_lname2');
					session_register('cus_company2');
					session_register('cus_address2');
					session_register('cus_province2');
					session_register('cus_zipcode2');
					session_register('cus_phone2');
					session_register('cus_fax2');
					session_register('cus_email2');
					
					$_SESSION['order_transfer'] = $_POST['order_transfer'];
					
					$_SESSION['cus_name']=$_POST['contact_name'];
					$_SESSION['cus_lname']=$_POST['contact_surname'];
					$_SESSION['cus_company'] = $_POST['contact_company'];
					$_SESSION['cus_address'] = $_POST['contact_address'];
					$_SESSION['cus_province'] = $_POST['contact_province'];
					$_SESSION['cus_zipcode'] = $_POST['contact_zipcode'];
					$_SESSION['cus_phone'] = $_POST['contact_phone'];
					$_SESSION['cus_fax'] = $_POST['contact_fax'];
					$_SESSION['cus_email'] = $_POST['contact_email'];
					
					$_SESSION['cus_name2'] = $_POST['contact_name2'];
					$_SESSION['cus_lname2'] = $_POST['contact_surname2'];
					$_SESSION['cus_company2'] = $_POST['contact_company2'];
					$_SESSION['cus_address2'] = $_POST['contact_address2'];
					$_SESSION['cus_province2'] = $_POST['contact_province2'];
					$_SESSION['cus_zipcode2'] = $_POST['contact_zipcode2'];
					$_SESSION['cus_phone2'] = $_POST['contact_phone2'];
					$_SESSION['cus_fax2'] = $_POST['contact_fax2'];
					$_SESSION['cus_email2'] = $_POST['contact_email2'];





include('../include/header.php') ?>
<form action="order_add.php" method="post" name="myform" id="formID4" class="formular">
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2>My Shopping Bag</h2>
            </hgroup>        
            <section class="paragraph03">
				<section class="blogOrder">
			<?php
            if ($_SESSION['session_id']) {
			?>
            <hgroup class="titleModule">
                <h2>IN-STOCK ITEM</h2>
            </hgroup>        
                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                        	<td width="80" align="center" valign="middle">
                           	<p>&nbsp;</p></td>
                        	<td align="center" valign="middle"><p>Buying Item</p>
                        	  <span>รายการที่ซื้อ</span></td>
                        	<td width="100" align="center" valign="middle"><p>Amount</p>
                        	  <span>จำนวน</span></td>
                        	<td width="150" align="center" valign="middle" ><p>Price/Unit</p>
                        	  <span>ราคาต่อหน่วย</span></td>
                            <td width="150" align="center" valign="middle" >
                            	<p>Total Price</p>
                                <span>ราคารวม</span></td>
                        </tr>
						<?php

                            foreach ($_SESSION['session_id'] as $key=> $i) {					
                    
                                if($i != ''){
                                
                                $po = $_SESSION['session_price'][$i];
                                $total_unit = $_SESSION['session_num'][$i] * $po ;	
                                $product_total = $product_total + $total_unit;
								$total_piece = $total_piece + $_SESSION['session_num'][$i];
                        ?>
                        <tr>
                        	<td align="center" valign="middle">
                            	<nav>
                                	<a href="../products/detail/?id=<?php echo $_SESSION['session_id'][$i];?>" target="_blank"><img alt="" title="" src="images/icon-view.png" /></a>
                                </nav>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><img alt="" title="" src="../images/products/<?php echo $_SESSION['session_code'][$i];?>/<?php echo $_SESSION['session_color'][$i];?>/s.jpg" height="100" /><br />
                            	#CODE :<?php echo $_SESSION['session_code'][$i];?> #SIZE : <?php echo $_SESSION['session_size'][$i];?> <?php echo ($_SESSION['sess_language'] == 'eng' ? $_SESSION['session_name_th'][$i] : $_SESSION['session_name_eng'][$i]);?></strong>
                            </td>
                            <td align="center" valign="middle">
                            	<?php echo $_SESSION['session_num'][$i];?>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($_SESSION['session_price'][$i]);?></strong>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($_SESSION['session_price'][$i] * $_SESSION['session_num'][$i]);?></strong>
                            </td>
                        </tr>
						<?php 
						$grand_total += $_SESSION['session_price'][$i] * $_SESSION['session_num'][$i];
						} } ?>
                        <tr>
                        	<td colspan="3">&nbsp;
                        	  
                      	  </td>
                            <td class="hilight" align="center" valign="middle">
                            	TOTAL
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	<strong>
								<?php 
								$_SESSION['grand_total'] = $grand_total;
								echo number_format($_SESSION['grand_total']);
								
								?>
                                </strong>
                            </td>
                        </tr>
                    </table>
            <br />
            <br />
			<?php } 
			if ($_SESSION['groupDelivery'] == '1') {?>
			<font color="#FD8973" style="font-weight:bold">จัดส่งสินค้าทั้งหมดพร้อมกัน</font> <br /><br />
			<?php
			}
			if ($_SESSION['session_pre_id']) {
			?>
            <hgroup class="titleModule">
                <h2>My Preorder</h2>
            </hgroup>        
                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                        	<td width="80" align="center" valign="middle">
                           	<p>&nbsp;</p></td>
                        	<td align="center" valign="middle"><p>Buying Item</p>
                        	  <span>รายการที่ซื้อ</span></td>
                        	<td width="100" align="center" valign="middle"><p>Amount</p>
                        	  <span>จำนวน</span></td>
                        	<td width="150" align="center" valign="middle" ><p>Price/Unit</p>
                        	  <span>ราคาต่อหน่วย</span></td>
                            <td width="150" align="center" valign="middle" >
                            	<p>Total Price</p>
                                <span>ราคารวม</span></td>
                        </tr>
						<?php
                        
                    
                            foreach ($_SESSION['session_pre_id'] as $key=> $i) {					
                    
                                if($i != ''){
                                
                                $po = $_SESSION['session_pre_price'][$i];
                                $total_unit = $_SESSION['session_pre_num'][$i] * $po ;	
                                $product_total = $product_total + $total_unit;
								$total_piece = $total_piece + $_SESSION['session_pre_num'][$i];
                        ?>
                        <tr>
                        	<td align="center" valign="middle">
                            	<nav>
                                	<a href="../products/detail/?id=<?php echo $_SESSION['session_pre_id'][$i];?>" target="_blank"><img alt="" title="" src="images/icon-view.png" /></a>
                                </nav>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><img alt="" title="" src="../images/products/<?php echo $_SESSION['session_pre_code'][$i];?>/<?php echo $_SESSION['session_pre_color'][$i];?>/s.jpg" height="100" /><br />
                            	#CODE :<?php echo $_SESSION['session_pre_code'][$i];?> #SIZE : <?php echo $_SESSION['session_pre_size'][$i];?> <?php echo ($_SESSION['sess_language'] == 'eng' ? $_SESSION['session_pre_name_th'][$i] : $_SESSION['session_pre_name_eng'][$i]);?></strong>
                            </td>
                            <td align="center" valign="middle">
                            	<?php echo $_SESSION['session_pre_num'][$i];?>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($_SESSION['session_pre_price'][$i]);?></strong>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($_SESSION['session_pre_price'][$i] * $_SESSION['session_pre_num'][$i]);?></strong>
                            </td>
                        </tr>
						<?php 
						$session_grandTotalPreHidden += $_SESSION['session_pre_price'][$i] * $_SESSION['session_pre_num'][$i];
						
						} }?>
                        <?php if($_SESSION['session_pre_shipping_send_free'] != 0 ){?>
                        <?php } ?>
                        <tr>
                        	<td colspan="3">&nbsp;
                        	  
                      	  </td>
                        	<td class="hilight" align="center" valign="middle">
                            	TOTAL
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	<strong>
								<?php 
								$_SESSION['session_grandTotalPreHidden'] = $session_grandTotalPreHidden;
								echo number_format($_SESSION['session_grandTotalPreHidden']);
								
								?></strong>
                            </td>
                        </tr>
                    </table>
                    
                    <?php } 
			if ($_SESSION['session_id']) {

			?>
            <hgroup class="titleModule">
                <h2>IN-STOCK SHIPPING</h2>
            </hgroup>        
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    
                        <tr class="twoTable">

                        	<td width="48%" align="center" valign="middle">
								<?php echo $_SESSION['session_shipping_name_th'];?>
                            </td>
                            <td width="52%" align="center" valign="middle">
                            	<strong>
                                <?php echo $_SESSION['session_realShip'];?>
                                </strong>
                          </td>
                        </tr>

                    </table>  
			<?php
			
			 }
            if ($_SESSION['session_pre_id']) {
				 
			if ($_SESSION['groupDelivery'] == '1') {?>
				<br /><br />
                 <font color="#FD8973" style="font-weight:bold">จัดส่งสินค้าทั้งหมดพร้อมกัน</font>
			<?php }  ?>
                    <br /><br />
                    <hgroup class="titleModule">
                        <h2>PRE-ORDER SHIPPING</h2>
                    </hgroup>        
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr class="twoTable">
                        	<td width="48%" align="center" valign="middle">
                              <?php 
								if ($_SESSION['groupDelivery'] == '1') {
								echo $_SESSION['session_shipping_name_th'];
								}else{
								echo $_SESSION['session_pre_shipping_name_th'];
								}
								?>
                            </td>
                            <td width="52%" align="center" valign="middle">
                            	<strong>
                                <?php 

								echo $_SESSION['session_realShipPre'];

								?>
                                </strong>
                          </td>
                        </tr>
                  </table>  
                   <?php } ?>     
                    <br /><br />
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr class="hilight">
                          <td class="hilight" align="center" valign="middle">ราคารวม (ค่าสินค้า)</td>
                          <td class="hilight" align="center" valign="middle"><?php echo number_format($_SESSION['grand_total']+$_SESSION['session_grandTotalPreHidden']);?></td>
                        </tr>
					<?php
					 if($_SESSION['session_PromotionDis'] != '' ){
					?>
                        <tr class="hilight">
                          <td class="hilight" align="center" valign="middle">
                          <?php 
						  echo ($_SESSION['session_PromotionDis'] != '' ? "ได้รับส่วนลด ( ".$_SESSION['session_PromotionDis']." % )" : "Discount Code" );
						  ?>
                          </td>
                          <td class="hilight" align="center" valign="middle"><?php echo $_SESSION['session_PromotionDis'];?> %</td>
                        </tr>
                        <?php } ?>
                    <?php if($_SESSION['session_PointDis'] != '' ){?>
                        <tr class="hilight">
                          <td class="hilight" align="center" valign="middle">ใช้แต้ม</td>
                          <td class="hilight" align="center" valign="middle"><?php echo $_SESSION['session_PointDis'];?></td>
                        </tr>
                    <?php } ?>
                        <tr class="hilight">
                          <td width="48%" class="hilight" align="center" valign="middle">ราคารวม (ค่าสินค้า + ค่าจัดส่ง)</td>
                          <td width="52%" class="hilight" align="center" valign="middle">
                           <div id="tranCostPlus">
						  <?php
							  
						  echo number_format($_SESSION['session_CostCal']);
						
						  ?>
                          </div>
                          
                          </td>
                        </tr>
                        
                    </table>  
                </section>
                
                	
                <section class="paragraph03">
                	<section class="addressUser">
                    	<section class="addressUser-l">
                        	<ul>
                            	<li>
                                	<header><?php echo ($_SESSION['sess_language'] == 'eng' ? 'BILLING ADDRESS' : 'ที่อยู่ออกบิล');?></header>
                                </li>
                            	<li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'Name' : 'ชื่อ' );?> :</label>
                                    <h6>
									<?php 
									echo $_SESSION['cus_name'];
                                    ?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'Surname' : 'นามสกุล' );?> :</label>
                                    <h6>
									<?php 
									echo $_SESSION['cus_lname'];
                                    ?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'Address' : 'ที่อยู่' );?> :</label>
                                    <h6>
                                    <?php echo $_SESSION['cus_address'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'Province' : 'จังหวัด' );?> :</label>
                                  <h6>
                                    <?php echo $_SESSION['cus_province'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'ZIP/POSTAL CODE' : 'รหัสไปรษณีย์' );?> :</label>
                                    <h6>
                                    <?php echo $_SESSION['cus_zipcode'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'PHONE NUMBER' : 'เบอร์โทรศัพท์' );?> :</label>
                                    <h6>
                                    <?php echo $_SESSION['cus_phone'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'EMAIL' : 'อีเมล์' );?> :</label>
                                    <h6>
                                    <?php echo $_SESSION['cus_email'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                            </ul>
                        </section>
                        <section class="addressUser-r">
                        	<ul>
                            	<li>
                                	<header><?php echo ($_SESSION['sess_language']=='eng' ? 'SHIPPING ADDRESS' : 'ที่อยู่จัดส่ง' );?></header>
                                </li>
                            	<li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'Name' : 'ชื่อ' );?> :</label>
                                    <h6>
                                    <?php echo $_SESSION['cus_name2'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'Surname' : 'นามสกุล' );?> :</label>
                                    <h6>
                                    <?php echo $_SESSION['cus_lname2'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'Address' : 'ที่อยู่' );?> :</label>
                                    <h6>
                                    <?php echo $_SESSION['cus_address2'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'Province' : 'จังหวัด' );?> :</label>
                                    <h6>
                                    <?php echo $_SESSION['cus_province2'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'ZIP/POSTAL CODE' : 'รหัสไปรษณีย์' );?> :</label>
                                    <h6>
                                    <?php echo $_SESSION['cus_zipcode2'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'PHONE NUMBER' : 'เบอร์โทรศัพท์' );?> :</label>
                                    <h6>
                                    <?php echo $_SESSION['cus_phone2'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                    <label>* <?php echo ($_SESSION['sess_language']=='eng' ? 'EMAIL' : 'อีเมล์' );?> :</label>
                                    <h6>
                                    <?php echo $_SESSION['cus_email2'];?>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                            </ul>
                        </section>
                    </section>
                    <section class="buttonRegister">
					<input name="uid" type="hidden" value="<?php echo ($_SESSION['AUTH_PERMISSION_MEMID'] );?>"/>
					<input type="hidden" name="token" value="<?php echo getToken();?>"/>
                        <input name="complete" type="button" value="กลับสู่รายการสั่งซื้อ" onClick="javascript:location.href='preorder.php'" />
                        <input name="back" type="button" value="กลับหน้าสั่งซื้อ" onClick="javascript:location.href='index.php'" />
						<?php if($_SESSION['AUTH_PERMISSION_MEMID'] == '') : ?>
                       <input name="back2" type="button" value="กรุณา Login ก่อน" onClick="javascript:location.href='preorder.php'" />
						<?php else : ?>
						 <input name="complete" type="submit" value="ยืนยันการสั่งซื้อ" />						 
						<?php endif; ?>
						<div style="text-align:center;">
						**กรุณาตรวจสอบข้อมูล และ กดยืนยันคำสั่งซื้อ
						</div>
                    </section>
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
