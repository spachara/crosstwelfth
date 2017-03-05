<?php

session_start();
require_once '../dbconnect.inc';
   
$promotion_sql = "SELECT *  FROM promotion_tb WHERE promotion_status = '1'";
$promotion_results = mysql_query($promotion_sql, $connect);
$promotion_data = mysql_fetch_array($promotion_results);

$_SESSION['session_PromotionStatus']= $promotion_data['promotion_status'];

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
<script type="text/javascript" language="javascript" src="../js/slide_thumb1/jquery-1.8.2.min.js"></script>
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
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////-->
	<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>-->
	<script type="text/javascript" src="../js/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.1.js"></script>
    <script type="text/javascript" src="../js/fancybox/fancybox-jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////-->

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
	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
	}
</script>
  
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

<link rel="stylesheet" href="../css/validationEngine.jquery.css" />
<script type="text/javascript" src="../js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../js/languages/jquery.validationEngine-en.js"></script>
<script>
	jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#formID2").validationEngine();
		jQuery("#formID1").validationEngine();
	});


</script>
<!--////////////////////////////////////Tool tip////////////////////////////////////-->
<link href="../css/tooltip/tooltip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/tooltip/tooltip.js"></script>
<!--////////////////////////////////////Tool tip////////////////////////////////////-->
<script>
function movetochk2(val){
	
	if(document.formID2.chk1.checked == true){
		
		document.formID2.contact_name2.value = document.formID2.contact_name.value;
		document.formID2.contact_surname2.value = document.formID2.contact_surname.value;
		document.formID2.contact_address2.value = document.formID2.contact_address.value;
		document.formID2.contact_province2.value = document.formID2.contact_province.value;  
		document.formID2.contact_zipcode2.value = document.formID2.contact_zipcode.value;
		document.formID2.contact_phone2.value = document.formID2.contact_phone.value;
		document.formID2.contact_email2.value = document.formID2.contact_email.value;
		
	}else{
		document.formID2.contact_name2.value = '';
		document.formID2.contact_surname2.value = '';
		document.formID2.contact_address2.value = '';
		document.formID2.contact_province2.value = '';
		document.formID2.contact_zipcode2.value = '';
		document.formID2.contact_phone2.value = '';
		document.formID2.contact_email2.value = '';
	
	}
}

function chkPoint(){
$(document).ready(function() {
	
	if(parseInt($("#PointDis").val()) > parseInt($("#GrandPoint").val())){
		$("#PointDis").val(0);
	}else{
		 var disC;
		 if($("#PointDis").val() == '' ){
			 disC = 0;
		 }else{
			 disC = $("#PointDis").val();
		 }
		 
		 
		 
		
		if($("#PromotionDis").val() != '' ){
			
		var sumTotal = parseInt($("#SubmitGrandTotal").val()) - parseInt($("#Sum_Ship").val());
		var discount = (sumTotal - (sumTotal * (parseInt($("#PromotionDis").val())/100))) + parseInt($("#Sum_Ship").val());
			
		//var discount = parseInt($("#SubmitGrandTotal").val()) - (parseInt($("#SubmitGrandTotal").val())* (parseInt($("#PromotionDis").val())/100));

		$("#tranCostPlus").html(discount - parseInt(disC));
		$("#CostCal").val(discount - parseInt(disC));

		}else{

		$("#tranCostPlus").html(parseInt($("#SubmitGrandTotal").val())- parseInt(disC));
		$("#CostCal").val(parseInt($("#SubmitGrandTotal").val())- parseInt(disC));
		}
		
	}
});
		
}

function chkCode(){

$(document).ready(function() {

		$.ajax({type:'POST',
		url:"ajax.php",
		data: "Code="+$("#CodeDis").val()+"&type=chk_code",
		success:function(data){
			if(data != ''){
			$("#textCode").html('ได้รับส่วนลด ( '+data+' % )');
			$("#PromotionDis").val(data);
			var sumTotal = parseInt($("#SubmitGrandTotal").val()) - parseInt($("#Sum_Ship").val());
			var discount = (sumTotal - (sumTotal* (data/100))) + parseInt($("#Sum_Ship").val());
			$("#CostCal").val(discount);
			$("#tranCostPlus").html(discount);
			$("#CodeDis").attr('disabled','disabled');
			}

		}});
		

});

}
</script>

 

</head>

<body>

<?php

if ($_POST['complete'] == "Login") {
	
	$select_user = "SELECT * FROM user_tb WHERE u_user = '".$_POST['u_user']."' AND u_pass = '".mysql_real_escape_string($_POST['u_pass'])."' ";
	$result_user =@mysql_query($select_user);
	$num_user =@mysql_num_rows($result_user);
	
	if ($num_user == 1) {
		$data_user =@mysql_fetch_array($result_user);
		session_register("AUTH_PERMISSION_FNAME"); 
		session_register("AUTH_PERMISSION_LNAME"); 
		session_register("AUTH_PERMISSION_MEMID");
		session_register("AUTH_PERMISSION_ADMIN");
		
		$_SESSION['AUTH_PERMISSION_FNAME'] = $data_user['u_fname'];
		$_SESSION['AUTH_PERMISSION_LNAME'] = $data_user['u_lname'];
		$_SESSION['AUTH_PERMISSION_MEMID'] = $data_user['u_id'];
		$_SESSION['AUTH_PERMISSION_ADMIN'] = $data_user['admin'];
		echo "<script>location.href='preorder_admin.php'</script>";
	}else{?>
	<script type="text/javascript">
		$(document).ready(function() {
			$.fancybox({
						href : 'popup.php?action=Login_fail',
						type : 'iframe',
						width     : 370,
						height    : 400,
						minWidth  : 100,
						minHeight : 350,
						maxWidth  : 350,
						maxHeight : 9999,
						padding : 5,
						onClosed: function() {   
						//parent.location.reload(true); 
						}
					});
				
			});

            </script>  	
	<?php }
	
	
}
 
if($_POST['sub'] == '1' ){
					
					session_register('cus_phone');
					
					$_SESSION['cus_phone'] = $_POST['contact_phone'];
}

include('../include/header.php') ?>
 <section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph overflowNone">
            <hgroup class="titleModule">
                <h2>My Shopping Bag</h2>
            </hgroup>   
            <script>
			function display_block(){
				
				if(document.getElementById('r1').checked){
					document.getElementById('regis').style.display = 'block';
					document.getElementById('login_user').style.display = 'none';
				}else{
					document.getElementById('regis').style.display = 'none';
					document.getElementById('login_user').style.display = 'block';
				}
				
			}
			</script>    
            <?php if ($_SESSION['AUTH_PERMISSION_MEMID'] == "") {?>

             <form method="post" id="formID1" name="formID1" action="preorder_admin.php">

                <section class="paragraph03 overflowNone">
                    <section class="blogRegister">
                        <header>
                        <input name="r_type" id="r2" type="radio" class="rad_type" checked="checked" value="1" onclick="display_block(this);" /> Login  
                        <input name="r_type" id="r1" type="radio" class="rad_type" value="0" onclick="display_block(this);" /> Register
                        </header>
                      </section>
                        
                </section>
               <center> สมาชิกกรุณากรอก Username/Password เพื่อ Login ทุกครั้งในการสั่งซื้อ <br />กรณีไม่ใช่สมาชิก กรุณาเลือก Register และกรอกข้อมูลในแบบฟอร์มก่อนนะคะ</center>
                <div id="login_user" style="display:block">
                <section class="paragraph03 overflowNone">
                    <section class="blogRegister">
                        <fieldset>
                            <ul>
                                <li>
                                    <label style="text-align:center;">Username</label>
                                    <input name="u_user" type="text" id="u_user" class="validate[required]"/>
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label style="text-align:center;">Password</label>
                                    <input name="u_pass" type="password" id="password_name" class="validate[required]"/>
                                    <div class="clear"></div>
                                </li>
                            </ul>
                        </fieldset>
                        <section class="buttonRegister">
                                <input name="complete" type="submit" value="Login"  class="input_login">
                        </section>                        
                        </form>                   
                    </section>   
                </section> 
                </div>
                <?php }  ?>
                
                
 <form method="post" id="formID2" name="formID2" action="confirm_admin.php" >
                
            <?php if ($_SESSION['AUTH_PERMISSION_MEMID'] == "") {?>
                <div id="regis" style="display:none">
                <section class="paragraph03 overflowNone">
                    <section class="blogRegister">
                        <fieldset>
                            <ul>
                                <li>
                                    <label style="text-align:center;">Username</label>
                                    <input name="u_user2" type="text" id="u_user2" class="validate[required]"/> &nbsp;<font color="#FF0000">*</font>
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label style="text-align:center;">Password</label>
                                    <input name="u_pass2" type="password" id="u_pass2" class="validate[required,minSize[4],maxSize[10]]"/> &nbsp;<font color="#FF0000">*</font>
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label style="text-align:center;">Re-Password</label>
                                    <input name="re_pass" type="password" id="re_pass" class="validate[required, equals[u_pass2]]"/> &nbsp;<font color="#FF0000">*</font>
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label style="text-align:center;">Facebook</label>
                                    <input name="u_facebook" type="text" id="u_facebook" />
                                    <span class="hint">ชื่อ Facebook ของลูกค้า ที่แสดงเวลาส่งข้อความ เพื่อทีมงานจะติดต่อลูกค้าผ่านกล่องข้อความของ Facebook ค่ะ<span class="hint-pointer">&nbsp;</span></span>
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label style="text-align:center;">Line ID</label>
                                    <input name="line_id" type="text" id="line_id" />
                                    <span class="hint">LINE ID ของลูกค้าเพื่อทีมงานจะติดต่อผ่านช่องทาง LINE<span class="hint-pointer">&nbsp;</span></span>
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label style="text-align:center;">Line name</label>
                                    <input name="line_name" type="text" id="line_name" />
                                    <span class="hint">ชื่อที่ลูกค้าใช้ใน LINE เพื่อค้นหา และติดต่อกับลูกค้าได้รวดเร็วขึ้น และหากมีการเปลี่ยนแปลงในภายหลัง อย่าลืมอัพเดทในหน้าสมาชิกนะคะ เพื่อเราจะไม่พลาดการติดต่อกันค่ะ<span class="hint-pointer">&nbsp;</span></span>
                                    <div class="clear"></div>
                                </li>
                            </ul>
                        </fieldset>
                    </section>   
                </section> 
				</div>
                <?php } ?>
                 
            <section class="paragraph03">
			  <section class="blogOrder">
			<?php
            if ($_SESSION['session_id']) { ?>
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
						
						} }  ?>
                        <tr>
                        	<td colspan="3">&nbsp;
                        	  
                      	  </td>
                        	<td class="hilight" align="center" valign="middle">
                            	TOTAL
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	<strong>
								<?php 
								
								echo number_format($_SESSION['session_grandTotalHidden']);
								
								?></strong>
                            </td>
                        </tr>
                    </table>

			<br /><br />
			<?php } 
			if ($_SESSION['groupDelivery'] == '1') {?>
			<font color="#FD8973" style="font-weight:bold">จัดส่งสินค้าทั้งหมดพร้อมกัน</font> <br /><br />
			<?php
			}
			if ($_SESSION['session_pre_id']) {?>
            <hgroup class="titleModule">
                <h2>PRE-ORDER ITEM</h2>
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
                                <span>ราคารวม</span>
                            </td>
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
                            	<strong"><?php echo number_format($_SESSION['session_pre_price'][$i] * $_SESSION['session_pre_num'][$i]);?></strong>
                            </td>
                        </tr>
						<?php } }  ?>
                        <?php if($_SESSION['session_pre_shipping_send_free'] != 0 ){?>
                        <?php } ?>
                        <tr>
                        	<td colspan="3">&nbsp;
                        	  
                      	  </td>
                        	<td class="hilight" align="center" valign="middle">
                            	TOTAL
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	<strong><?php echo number_format($_SESSION['session_grandTotalPreHidden']);?></strong>
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
                    
                  <?php
                            $select_point = "SELECT sum(ppoint) as total_have FROM point_tb WHERE m_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
                            $result_point =@mysql_query($select_point, $connect);
                            $data_point =@mysql_fetch_array($result_point);


                            $select_use_point = "SELECT sum(order_point) as total_used FROM order_tb WHERE u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' and order_status <> 0 ";
                            $result_use_point =@mysql_query($select_use_point, $connect);
                            $data_use_point =@mysql_fetch_array($result_use_point);
							
							$grand_point  =  $data_point['total_have'] - $data_use_point['total_used'];
				  
				if($_SESSION['session_PromotionStatus']  == 1 || $grand_point > 0){
				?>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">

                      <tr>
                          <td align="center" valign="middle">
                              <font color="#FF0000">** หากลูกค้ามีบัตรส่วนลด หรือรหัสส่วนลด กรุณากรอกรหัสส่วนลดที่ช่องด้านล่างนี้ เพื่อรับส่วนลดค่ะ **</font></td>
                      </tr>
                        
                  </table>
                 <?php } ?>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
					<?php 
					if($_SESSION['session_PromotionStatus']  == 1){
					?>
                      <tr class="hilight">
                          <td class="hilight" align="center" valign="middle" id="textCode">
                          Discount Code
                          </td>
                          <td align="center" valign="middle" class="hilight">
                          <input type="text" name="CodeDis" id="CodeDis" value="<?php echo $_SESSION['session_CodeDisHidden'];?>" onblur="chkCode()" <?php echo ($_SESSION['session_PromotionDis'] != '' ? "disabled=disabled" : "" ); ?> />
                      </tr>
                        <?php
						}
							if($grand_point > 0){
						?>
                      <tr class="hilight">
                        <td class="hilight" align="center" valign="middle">
                        คุณมีแต้ม <strong><?php echo $grand_point;?></strong>
                        </td>
                          <td align="center" valign="middle" class="hilight">
                          <input type="text" name="PointDis" id="PointDis" value="<?php echo $_SESSION['session_PointDis'];?>" onblur="chkPoint()" /></td>
                      </tr>
                        <input type="hidden" name="GrandPoint" id="GrandPoint" value="<?php echo $grand_point;?>" />
					  <?php } ?>
                      <tr class="hilight">
                        <td width="48%" class="hilight" align="center" valign="middle">ราคารวม (ค่าสินค้า + ค่าจัดส่ง)</td>
                        <td width="52%" class="hilight" align="center" valign="middle">
                          <div id="tranCostPlus">
						   <?php
						 // if($_SESSION['session_PointDis'] != '' || $_SESSION['session_PromotionDis'] != ''){
							  
						 // echo $_SESSION['session_tranCostPlusCal'];

						 //}else{
							  
						  echo number_format($_SESSION['session_SubmitGrandTotal']);
						  $Sum_Ship =  $_SESSION['session_realShip'] + $_SESSION['session_realShipPre'];
						  //}
						  ?>
                          </div>
                          
                        </td>
                      </tr>
                        
                  </table>
                <input type="hidden" name="CodeDisHidden" id="CodeDisHidden" value="<?php echo $_SESSION['session_CodeDisHidden'];?>"  />
                <input type="hidden" name="PromotionDis" id="PromotionDis" value="<?php echo $_SESSION['session_PromotionDis'];?>" /></td>
                  
                <input type="hidden" name="Sum_Ship" id="Sum_Ship" value="<?php echo $Sum_Ship;?>" />
                <input type="hidden" name="CostCal" id="CostCal" value="<?php echo $_SESSION['session_SubmitGrandTotal'];?>" />
                <input type="hidden" name="SubmitGrandTotal" id="SubmitGrandTotal" value="<?php echo $_SESSION['session_SubmitGrandTotal'];?>" />
 
                </section>
<!--  </form>-->
              
                
                <input type="hidden" name="sub" value="1" />
                <section class="paragraph03">
                	<section class="addressUser">
                        	<ul>                            	
                                <li>
                                    <label> <h2>* <?php echo ($_SESSION['sess_language']=='eng' ? 'CUSTOMER PHONE NUMBER' : 'กรอกเบอร์โทรศัพท์ลูกค้า ' );?> : </h2></label>
                                    
                                    <input style="  width: 80%;height: 50px; font-size: 30px;"  name="contact_phone" id="contact_phone" class="validate[required]"  onkeypress="return isNumber(event)" type="text" value="<?php echo (isset($_SESSION['cus_phone'])  ? $_SESSION['cus_phone']: '');?>"/>
                                    
                                	<div class="clear"></div>
                                </li>
                            </ul>
                    </section>
                    <section class="buttonRegister">
					<input name="uid" type="hidden" value="<?php echo ($_SESSION['AUTH_PERMISSION_MEMID'] == "" );?>"/>
                    <input name="complete1" type="button" value="<?php echo ($_SESSION['sess_language']=='eng' ?  'BACK TO ORDER PAGE' : 'กลับสู่หน้าหลักรายการสั่งซื้อ' );?>" onClick="javascript:location.href='index.php'" />
                    <input name="complete" type="submit" value="<?php echo ($_SESSION['sess_language']=='eng' ? 'CHECK OUT' : 'สั่งซื้อสินค้า'  );?>"  onClick="javascript:check_form2();" >
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
