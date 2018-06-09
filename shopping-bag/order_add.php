<?php 
session_start();
require_once('../dbconnect.inc');
session_register('order_id');
session_register('order_pre_id');
session_register('order_max_rank');
session_register('fix_time');


date_default_timezone_set('Asia/Bangkok');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}

$_SESSION['fix_time'] = date('y').date('m').date('d').date('H')."-".date('i').date('s').str_pad(rand(0, pow(10, 2)-1), 2, '0', STR_PAD_LEFT);
	
function isTokenValid($token){
  if(!empty($_SESSION['tokens'][$token])){
    unset($_SESSION['tokens'][$token]);
    return true;
  }
  return false;
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

<form name="myform" method="post" action="order_cal.php">
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2>PLEASE WAIT, LOADING...</h2>
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
<?php
$postedToken = filter_input(INPUT_POST, 'token');
if(!empty($postedToken)){
  if(isTokenValid($postedToken)){  

	foreach ($_SESSION['session_id'] as $key=> $i) {					

		if($i != ''){
		$sql_product = "SELECT * FROM product_tb where pid = '".$_SESSION['session_id'][$i]."'";
		$result_product =@mysql_query($sql_product, $connect);
		$data_product =@mysql_fetch_array($result_product);
		
		if($data_product['p_stock'] < $_SESSION['session_num'][$i]){
			
		  
		  unset($_SESSION['session_id'][$_SESSION['session_id'][$i]]);
		  unset($_SESSION['session_num'][$_SESSION['session_id'][$i]]);
		  unset($_SESSION['session_price'][$_SESSION['session_id'][$i]]);
		?>
		
		<script type="text/javascript">
		$(document).ready(function() {
			$.fancybox({
					'href' : 'popup.php?action=forder',
					'width'				: 400,
					'height'			: 200,
					'autoScale'			: false,
					'transitionIn'		: 'none',
					'transitionOut'		: 'none',
					'transitionIn'	: 'fade',
					'transitionOut'	: 'fade',				
					'type'				: 'iframe',
					'onClosed': function() {   
					 window.location = "index.php"; 
					}
					});
			});
			</script>
		<?php

		}


		}
	}


	foreach ($_SESSION['session_pre_id'] as $key2=> $i2) {					

		if($i2 != ''){
		$sql_product = "SELECT * FROM product_tb where pid = '".$_SESSION['session_pre_id'][$i2]."'";
		$result_product =@mysql_query($sql_product, $connect);
		$data_product =@mysql_fetch_array($result_product);
		
		if($data_product['p_pre'] >  0 ){
			$buy_status[$i2] = "PREORDER";
			$checkproduct = $data_product['p_pre'];
			
			//echo "PREORDER";
		}else{
			$buy_status[$i2] = "SPARE";
			$checkproduct = $data_product['p_spare'];
			
			//echo "SPARE";
		}
		
		
		if($checkproduct < $_SESSION['session_pre_num'][$i2]){
			
			
		 unset($_SESSION['session_pre_id'][$_SESSION['session_pre_id'][$i2]]);
		 unset($_SESSION['session_pre_num'][$_SESSION['session_pre_id'][$i2]]);
		 unset($_SESSION['session_pre_price'][$_SESSION['session_pre_id'][$i2]]);
		?>
		
		<script type="text/javascript">
		$(document).ready(function() {
			$.fancybox({
					'href' : 'popup.php?action=fporder',
					'width'				: 400,
					'height'			: 200,
					'autoScale'			: false,
					'transitionIn'		: 'none',
					'transitionOut'		: 'none',
					'transitionIn'	: 'fade',
					'transitionOut'	: 'fade',				
					'type'				: 'iframe',
					'onClosed': function() {   
					 window.location = "index.php"; 
					}
					});
			});
		</script>
		<?php

		}


		}
	}
	
	
	
	
	$sql_max = "select MAX(order_number_rank) as maxRank from order_tb where order_number = '".$_SESSION['order_id']."'";
	$result_max =@mysql_query($sql_max, $connect);
	$num_max = @mysql_num_rows($result_max);
	$data_max = @mysql_fetch_array($result_max);
	
	if($num_max == NULL ){
		$order_max_rank = "1";
	}else{
		$order_max_rank = $data_max['maxRank'] + 1;
	}
	
	$_SESSION['order_max_rank']= $order_max_rank;





if($_SESSION['session_id']){
	
$_SESSION['order_id']= $_SESSION['fix_time'];

if ($_SESSION['groupDelivery'] == '1') {
	$pro_group = $_SESSION['order_pre_id']."-PRE";	
}

	foreach($_SESSION['session_id'] as $key=> $i){
	$aa = explode(':',$i);
	
		if($i != ''){//ถ้าหากไม่พบ $i ก็ไม่ต้องแสดงข้อมูล ($i คือ ไอดีที่กำหนดไว้ตอน Foreach >>> foreach($_SESSION['session_id'] as $key=> $i) )

					
			$total_unit = $_SESSION['session_num'][$i] * $_SESSION['session_price'][$i];
			$grand_total = $grand_total + $total_unit;
			
			$order_id = $data_order['id']."<br>";
			$order_id += 1;
			
				//Insert Table Order Product
				$insert_order_product = "INSERT INTO order_product_tb (order_p_id, order_number, order_number_rank, order_type, pro_id, pro_code, order_p_name";
				$insert_order_product .= ", order_p_stock, order_p_size, order_p_color , order_p_send, order_p_price ";
				$insert_order_product .= " , order_p_total, order_p_type, order_p_employee, date_in, date_update) ";
				
				$insert_order_product .= "VALUES (NULL, '".$_SESSION['order_id']."', '', 'IN', '".$i."', '".$_SESSION['session_code'][$i]."'";
				$insert_order_product .= ", '".($_SESSION['sess_language'] == 'eng' ? mysql_real_escape_string($_SESSION['session_name_eng'][$i]) : mysql_real_escape_string($_SESSION['session_name_th'][$i]))."'"; 
				$insert_order_product .= ", '".$_SESSION['session_num'][$i]."' , '".$_SESSION['session_size'][$i]."', '".$_SESSION['session_color'][$i]."'"; 
				$insert_order_product .= ", '".$_SESSION['session_cost_send'][$i]."', '".$_SESSION['session_price'][$i]."', '".$total_unit."' "; 
				$insert_order_product .= ", '".($_SESSION['sess_language'] == 'eng' ? $_SESSION['session_type_eng'][$i] : $_SESSION['session_type_th'][$i])."'";
				$insert_order_product .= ", '".mysql_real_escape_string($_SESSION['cus_name'])."', NOW(), NOW())";
				@mysql_query($insert_order_product, $connect);
				
				$update_product = "UPDATE product_tb SET p_stock = p_stock - ".$_SESSION['session_num'][$i]." where pid = '".$i."' ";
				@mysql_query($update_product, $connect);
				
				
				$insert_temp_product = "INSERT INTO  temp_order_product (temp_id ,pid ,order_number ,product_number ,order_type ,buy_status ,sent_status ,date_in)";
				$insert_temp_product .= "VALUES (NULL ,  '".$i."',  '".$_SESSION['order_id']."', '".$_SESSION['session_num'][$i]."', 'IN',  'INSTOCK',  'READY',  NOW())";
				@mysql_query($insert_temp_product, $connect);
				
				//echo "INSTOCK = ".$update_product."<br><br>";
				//echo "INSTOCK = ".$insert_temp_product."<br>";
				
				$a += $total_unit; 
			} 
	} 
	
}
			if($_SESSION['cus_company']==""){ //ถ้าไม่ได้ใส่ชื่อบริษัท
			
			$address1 = "ชื่อ : ".$_SESSION['cus_name']." ".$_SESSION['cus_lname']."<br>".
			"ที่อยู่ : ".$_SESSION['cus_address']."<br>".
			"จังหวัด : ".$_SESSION['cus_province']."<br>".
			"รหัสไปรษณีย์ : ".$_SESSION['cus_zipcode']."<br>".
			"เบอร์โทรศัพท์ : ".$_SESSION['cus_phone']."<br>".
			"อีเมล์ : ".$_SESSION['cus_email']."<br><br>";
			
			}elseif($_SESSION['cus_fax']==""){ //ถ้าไม่ได้ใส่เบอร์แฟกซ์
			
			$address1 = "ชื่อ : ".$_SESSION['cus_name']." ".$_SESSION['cus_lname']."<br>".
			"บริษัท : ".$_SESSION['cus_company']."<br>".
			"ที่อยู่ : ".$_SESSION['cus_address']."<br>".
			"รหัสไปรษณีย์  : ".$_SESSION['cus_zipcode']."<br>".
			"เบอร์โทรศัพท์ : ".$_SESSION['cus_phone']."<br>".
			"อีเมล์ : ".$_SESSION['cus_email']."<br><br>";	
						
			}else{
				
			$address1 = "ชื่อ : ".$_SESSION['cus_name']." ".$_SESSION['cus_lname']."<br>".
			"บริษัท : ".$_SESSION['cus_company']."<br>".
			"ที่อยู่ : ".$_SESSION['cus_address']."<br>".
			"จังหวัด : ".$_SESSION['cus_province']."<br>".
			"Country : ".$_SESSION['cus_country']."<br>".
			"รหัสไปรษณีย์ : ".$_SESSION['cus_zipcode']."<br>".
			"เบอร์โทรศัพท์ : ".$_SESSION['cus_phone']."<br>".
			"อีเมล์ : ".$_SESSION['cus_email']."<br><br>";	
			}
			
			//Address Employee ที่อยู่จัดส่ง
			if($_SESSION['cus_company2']==""){ //ถ้าไม่ได้ใส่ชื่อบริษัท
			
			$address2 = "ชื่อ : ".$_SESSION['cus_name2']." ".$_SESSION['cus_lname2']."<br>".
			"ที่อยู่ : ".$_SESSION['cus_address2']."<br>".
			"จังหวัด : ".$_SESSION['cus_province2']."<br>".
			"รหัสไปรษณีย์ : ".$_SESSION['cus_zipcode2']."<br>".
			"เบอร์โทรศัพท์ : ".$_SESSION['cus_phone2']."<br>".
			"อีเมล์ : ".$_SESSION['cus_email2']."<br><br>";	
			
			}elseif($_SESSION['cus_fax2']==""){ //ถ้าไม่ได้ใส่เบอร์แฟกซ์
			
			$address2 = "ชื่อ : ".$_SESSION['cus_name2']." ".$_SESSION['cus_lname2']."<br>".
			"บริษัท : ".$_SESSION['cus_company2']."<br>".
			"ที่อยู่ : ".$_SESSION['cus_address2']."<br>".
			"จังหวัด : ".$_SESSION['cus_province2']."<br>".
			"รหัสไปรษณีย์  : ".$_SESSION['cus_zipcode2']."<br>".
			"เบอร์โทรศัพท์ : ".$_SESSION['cus_phone2']."<br>".
			"อีเมล์ : ".$_SESSION['cus_email2']."<br><br>";	
			
			}else{
				
			$address2 = "ชื่อ : ".$_SESSION['cus_name2']." ".$_SESSION['cus_lname2']."<br>".
			"บริษัท : ".$_SESSION['cus_company2']."<br>".
			"ที่อยู่ : ".$_SESSION['cus_address2']."<br>".
			"จังหวัด : ".$_SESSION['cus_province2']."<br>".
			"รหัสไปรษณีย์ : ".$_SESSION['cus_zipcode2']."<br>".
			"เบอร์โทรศัพท์ : ".$_SESSION['cus_phone2']."<br>".
			"อีเมล์ : ".$_SESSION['cus_email2']."<br><br>";
			}
			$address1 = mysql_real_escape_string($address1);
			$address2 = mysql_real_escape_string($address2);
			//Insert Table Order
			if($_SESSION['id_user'] != ''){
				$u_id = $_SESSION['id_user'];
			} else if ($_SESSION['id_user'] == "") {
				$u_id = "NULL";
			}
if($_SESSION['session_id']){
	
			$insert_order = "INSERT INTO order_tb (order_id, u_id, order_number, order_number_rank, order_type, order_address1, order_address2";
			$insert_order .= ", order_total, order_promotion, order_point, order_transport, order_transport_status, order_province, order_country ";			
			$insert_order .= " , order_type_pay, order_employee, order_email, order_phone, order_group, date_in, date_update,order_shipping)";
			$insert_order .= "VALUES('', '".$_SESSION['AUTH_PERMISSION_MEMID']."', '".$_SESSION['order_id']."', '', 'IN'";
			$insert_order .= ", '".$address1."', '".$address2."', '".$grand_total."', '".$_SESSION['session_PromotionDis']."'";
			$insert_order .= ", '".$_SESSION['session_PointDis']."', '".mysql_real_escape_string($_SESSION['session_shipping_name_th'])."' ";
			$insert_order .= " , '".mysql_real_escape_string($_SESSION['session_realShip'])."', '".mysql_real_escape_string($_SESSION['cus_province'])."', '".$_SESSION['cus_country']."'";
			$insert_order .= ", '".$_SESSION['sess_paid']."', '".mysql_real_escape_string($_SESSION['cus_name'])." ".mysql_real_escape_string($_SESSION['cus_lname'])."' ";
			$insert_order .= " , '".mysql_real_escape_string($_SESSION['cus_email'])."', '".mysql_real_escape_string($_SESSION['cus_phone'])."', '".$pro_group."', NOW(), NOW(), '".mysql_real_escape_string($_SESSION['session_shipping'])."' )"; 
			@mysql_query($insert_order, $connect);
			if(mysql_real_escape_string($_SESSION['session_shipping']) == '3'){
				$update_order = "UPDATE order_tb set order_status = '6' ,tranfer_status = '6' ,payment_status = '6' Where order_shipping = '3' ";
				@mysql_query($update_order, $connect);
				}
			
			//echo "<br><br><br>".$insert_order;
}


if($_SESSION['session_pre_id']){

$_SESSION['order_pre_id']= $_SESSION['fix_time'];

	
if ($_SESSION['groupDelivery'] == '1') {
	$pre_group = $_SESSION['order_id']."-IN";	
}


	foreach($_SESSION['session_pre_id'] as $key=> $i){
	$aa = explode(':',$i);
	
		if($i != ''){//ถ้าหากไม่พบ $i ก็ไม่ต้องแสดงข้อมูล ($i คือ ไอดีที่กำหนดไว้ตอน Foreach >>> foreach($_SESSION['session_pre_id'] as $key=> $i) )

					
			$total_unit_pre = $_SESSION['session_pre_num'][$i] * $_SESSION['session_pre_price'][$i];
			$grandTotalPre = $grandTotalPre + $total_unit_pre;
			
			$order_id = $data_order['id']."<br>";
			$order_id += 1;
			
				//Insert Table Order Product
				$insert_order_product2 = "INSERT INTO order_product_tb (order_p_id, order_number, order_number_rank, order_type, pro_id, pro_code, order_p_name";
				$insert_order_product2 .= " , order_p_stock, order_p_size, order_p_color";
				$insert_order_product2 .= " , order_p_send, order_p_price ";
				$insert_order_product2 .= " , order_p_total, order_p_type, order_p_employee, date_in, date_update) ";
				
				$insert_order_product2 .= "VALUES (NULL, '".$_SESSION['order_pre_id']."', '', 'PRE', '".$i."', '".$_SESSION['session_pre_code'][$i]."'";
				$insert_order_product2 .= ", '".($_SESSION['sess_language'] == 'eng' ? mysql_real_escape_string($_SESSION['session_pre_name_eng'][$i]) : mysql_real_escape_string($_SESSION['session_pre_name_th'][$i]))."'";
				$insert_order_product2 .= ", '".$_SESSION['session_pre_num'][$i]."' "; 
				$insert_order_product2 .= ", '".$_SESSION['session_pre_size'][$i]."', '".$_SESSION['session_pre_color'][$i]."'"; 
				$insert_order_product2 .= ", '".$_SESSION['session_pre_cost_send'][$i]."', '".$_SESSION['session_pre_price'][$i]."', '".$total_unit_pre."' "; 
				$insert_order_product2 .= ", '".($_SESSION['sess_language'] == 'eng' ? $_SESSION['session_pre_type_eng'][$i] : $_SESSION['session_pre_type_th'][$i])."'";
				$insert_order_product2 .= ", '".mysql_real_escape_string($_SESSION['cus_name'])."', NOW(), NOW())";
				@mysql_query($insert_order_product2, $connect);
				
				
				if($buy_status[$i] == 'SPARE' ){
				$update_product2 = "UPDATE product_tb SET p_spare = p_spare - ".$_SESSION['session_pre_num'][$i]." where p_code = '".$_SESSION['session_pre_code'][$i]."' and p_color = '" . $_SESSION['session_pre_color'][$i] . "'";
				@mysql_query($update_product2, $connect);
				}else{
				$update_product2 = "UPDATE product_tb SET p_pre = p_pre - ".$_SESSION['session_pre_num'][$i]." where pid = '".$i."'";
				@mysql_query($update_product2, $connect);
				}
				
				
				$insert_temp_product2 = "INSERT INTO  temp_order_product (temp_id ,pid ,order_number ,product_number ,order_type ,buy_status ,sent_status ,date_in)";
				$insert_temp_product2 .= "VALUES ('' ,  '".$i."',  '".$_SESSION['order_pre_id']."', '".$_SESSION['session_pre_num'][$i]."', 'PRE',  '".$buy_status[$i]."',  'RESERVE',  NOW())";
				@mysql_query($insert_temp_product2, $connect);
				
				//echo "PRE = ".$update_product2."<br><br>";
				//echo "PRE = ".$insert_temp_product2."<br>";
				
				
				//echo $insert_order_product."<br>";
				
				$a += $total_unit_pre; 
			} 
	} 
	
}
if($_SESSION['session_pre_id']){

if ($_SESSION['groupDelivery'] == '1') {
$pre_shipping =  $_SESSION['session_shipping_name_th'];
}else{
$pre_shipping =  $_SESSION['session_pre_shipping_name_th'];
}

$cost_ship = $_SESSION['session_realShipPre'];

	
	
			$insert_order2 = "INSERT INTO order_tb (order_id, u_id, order_number, order_number_rank, order_type, order_address1, order_address2";
			$insert_order2 .= ", order_total, order_promotion, order_point, order_transport, order_transport_status, order_province, order_country ";			
			$insert_order2 .= " , order_type_pay, order_employee, order_email, order_phone, order_group, date_in, date_update,order_shipping)";
			$insert_order2 .= "VALUES('', '".$_SESSION['AUTH_PERMISSION_MEMID']."', '".$_SESSION['order_pre_id']."', '', 'PRE'";
			$insert_order2 .= ", '".$address1."', '".$address2."', '".$grandTotalPre."', '".$_SESSION['session_PromotionDis']."'";
			$insert_order2 .= ", '".$_SESSION['session_PointDis']."', '".$pre_shipping."' ";
			$insert_order2 .= " , '".$cost_ship."', '".mysql_real_escape_string($_SESSION['cus_province'])."', '".$_SESSION['cus_country']."', '".$_SESSION['sess_paid']."', '".mysql_real_escape_string($_SESSION['cus_name2'])." ".mysql_real_escape_string($_SESSION['cus_lname2'])."' ";
			$insert_order2 .= " , '".mysql_real_escape_string($_SESSION['cus_email'])."', '".mysql_real_escape_string($_SESSION['cus_phone'])."', '".$pre_group."', NOW(), NOW(), '".mysql_real_escape_string($_SESSION['session_shipping'])."' )"; 
			@mysql_query($insert_order2, $connect);
			
			if(mysql_real_escape_string($_SESSION['session_shipping']) == '3'){
				$update_order = "UPDATE order_tb set order_status = '6' ,tranfer_status = '6' ,payment_status = '6' Where order_shipping = '3' ";
				@mysql_query($update_order, $connect);
				}
			
			//echo "<br><br><br>".$insert_order;
}
}
}
?>
	<script>location='thankyou.php'</script>