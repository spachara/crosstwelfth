<?php
session_start();
require_once '../dbconnect.inc';

session_register("session_PointDis");
session_register("session_PromotionDis");
session_register("session_CodeDisHidden");
session_register("session_CostCal");
session_register("tokens");
session_register('cus_phone');




$_SESSION['session_PointDis'] = $_POST['PointDis'];
$_SESSION['session_PromotionDis'] = $_POST['PromotionDis'];
$_SESSION['session_CodeDisHidden'] = $_POST['CodeDisHidden'];
$_SESSION['session_CostCal'] = $_POST['CostCal'];
$_SESSION['cus_phone'] = str_replace(" ", "",$_POST['contact_phone']);


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
	
<?php include('../include/header.php') ?>
<form action="order_add_admin.php" method="post" name="myform" id="formID4" class="formular">
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
                	<section class="addressUser" style="text-align: center;margin-bottom: .5em;">
                    	<section  >
                        	 
                                     <label> <h2>* <?php echo ($_SESSION['sess_language']=='eng' ? 'CUSTOMER PHONE NUMBER' : 'เบอร์โทรศัพท์ลูกค้า' );?> :   <?php echo $_SESSION['cus_phone'];?></h2></label>
                                    
                                  
                                     
                                	<div class="clear"></div>
                                
                        </section>
                        	
                    </section>
                    <section class="buttonRegister">
					<input name="uid" type="hidden" value="<?php echo ($_SESSION['AUTH_PERMISSION_MEMID'] );?>"/>
					<input type="hidden" name="token" value="<?php echo getToken();?>"/>
                        <input name="complete" type="button" value="กลับสู่รายการสั่งซื้อ" onClick="javascript:location.href='preorder_admin.php'" />
                        <input name="back" type="button" value="กลับหน้าสั่งซื้อ" onClick="javascript:location.href='index.php'" />
						<?php if($_SESSION['AUTH_PERMISSION_MEMID'] == '') : ?>
                       <input name="back2" type="button" value="กรุณา Login ก่อน" onClick="javascript:location.href='preorder_admin.php'" />
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
