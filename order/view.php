<?php
session_start();
require_once '../dbconnect.inc';
if (!isset($_SESSION['AUTH_PERMISSION_MEMID'])) {
   echo "<script>location.href='../register/login.php'</script>";
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
<form action="order_add.php" method="post" name="myform" id="formID4" class="formular">
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2>
				<?php                        
                $sql_insert_order3 = "select * from order_tb where u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' and order_number = '".$_GET['n']."'";
                $result_insert_order3 = @mysql_query($sql_insert_order3, $connect);
                $num_order3 = @mysql_num_rows($result_insert_order3);

			   for($p3=1;$p3<=intval($num_order3);$p3++){
			   $data_order3= @mysql_fetch_array($result_insert_order3);


					$sql_insert_order2 = "select * from order_tb where order_number = '".$data_order3['order_number']."'";
					$result_insert_order2 = @mysql_query($sql_insert_order2, $connect);
					$num_order2 = @mysql_num_rows($result_insert_order2);
					$data_order2= @mysql_fetch_array($result_insert_order2);
					
					if($num_order2 == 2){ 
						
						$val_order = $data_order2['order_number']."-IN | ".$data_order2['order_number']."-PRE";
					}else{
						$val_order = $data_order2['order_number']."-".$data_order2['order_type'];
					}
			   }
                ?>
                
                ORDER NUMBER <?php echo $val_order;?></h2>
            </hgroup>        
            <section class="paragraph03">
				<section class="blogOrder">
			<?php
			
			$sql_insert_order4 = "select * from order_tb where u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' and order_number = '".$_GET['n']."'";
			$result_insert_order4 = @mysql_query($sql_insert_order4, $connect);
			$num_order4 = @mysql_num_rows($result_insert_order4);
			
			
			for($i=1;$i<=intval($num_order4);$i++){
			$data_order4= @mysql_fetch_array($result_insert_order4);
			
			if($data_order4['order_type'] == "IN"){ 
									
			
			?>
            <hgroup class="titleModule">
                <h2>IN-STOCK ITEM</h2>
            </hgroup>        
                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                        	<td align="center" valign="middle"><p>Buying Item</p><span>รายการที่ซื้อ</span></td>
                        	<td width="150" align="center" valign="middle">Tracking No.<br />เลขที่ส่งของ</td>
                        	<td width="100" align="center" valign="middle"><p>Amount</p><span>จำนวน</span></td>
                        	<td width="150" align="center" valign="middle" ><p>Price/Unit</p><span>ราคาต่อหน่วย</span></td>
                        	<td width="150" align="center" valign="middle" ><p>Total Price</p><span>ราคารวม</span></td>
                        </tr>
						<?php

						   $sql_insert_product = "select * from order_product_tb where order_number = '".$data_order4['order_number']."' and order_type = '".$data_order4['order_type']."'";
						   $result_insert_product = @mysql_query($sql_insert_product, $connect);
						   $num_product = @mysql_num_rows($result_insert_product);
						   
						   for($p=1;$p<=intval($num_product);$p++){
						   $data_order_product = @mysql_fetch_array($result_insert_product);
						   
						   $grand_total = $grand_total + ($data_order_product['order_p_price']*$data_order_product['order_p_stock']);
						   
						   $trancking_date = "";
						   if ($data_order_product['trancking_date'] != "") {
								$trancking_date = substr($data_order_product['trancking_date'], 8 , 2)."/".substr($data_order_product['trancking_date'], 5, 2)."/".substr($data_order_product['trancking_date'], 0, 4);
							}
                        ?>
                        <tr>
                        	<td align="center" valign="middle">
                        	  <strong><img alt="" title="" src="../images/products/<?php echo $data_order_product['pro_code'];?>/<?php echo $data_order_product['order_p_color'];?>/s.jpg" height="100" /><br />
                       	      #CODE :<?php echo $data_order_product['pro_code'];?> #SIZE : <?php echo $data_order_product['order_p_size'];?> <?php echo $data_order_product['order_p_name'];?></strong></td>
                        	<td align="center" valign="middle"><?php echo $data_order_product['tracking_number']."<br>".$trancking_date;?></td>
                            <td align="center" valign="middle">
                            	<?php echo $data_order_product['order_p_stock'];?>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($data_order_product['order_p_price']);?></strong>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($data_order_product['order_p_price'] * $data_order_product['order_p_stock']);?></strong>
                            </td>
                        </tr>
						<?php }  ?>
                        <tr>
                        	<td colspan="3">&nbsp;
                        	  
                      	  </td>
                        	<td class="hilight" align="center" valign="middle">
                            	TOTAL
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	<strong><?php echo number_format($grand_total);?></strong>
                                <strong><?php echo ($_SESSION['sess_language'] == 'eng' ? "Baht" : "บาท");?></strong>
                            </td>
                        </tr>
                    </table>
            <br />
            <br />
			<?php $inStock = '1'; } 
			
			
			if($data_order4['order_type'] == "PRE"){ 

			?>       
            <hgroup class="titleModule">
                <h2>PRE-ORDER ITEM</h2>
            </hgroup>        
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                    	  <td align="center" valign="middle"><p>Buying Item</p><span>รายการที่ซื้อ</span></td>
                    	  <td width="150" align="center" valign="middle">Tracking No.<br />เลขที่ส่งของ</td>
                        	<td width="100" align="center" valign="middle"><p>Amount</p><span>จำนวน</span></td>
                            <td width="150" align="center" valign="middle" ><p>Price/Unit</p><span>ราคาต่อหน่วย</span></td>
                        	<td width="150" align="center" valign="middle" ><p>Total Price</p><span>ราคารวม</span></td>
                        </tr>
						<?php

						   $sql_insert_product2 = "select * from order_product_tb where order_number = '".$data_order4['order_number']."' and order_type = '".$data_order4['order_type']."'";
						   $result_insert_product2 = @mysql_query($sql_insert_product2, $connect);
						   $num_product2 = @mysql_num_rows($result_insert_product2);
						   
						   for($p2=1;$p2<=intval($num_product2);$p2++){
						   $data_order_product2 = @mysql_fetch_array($result_insert_product2);
						   
						   $grand_total2 = $grand_total2 + ($data_order_product2['order_p_price']*$data_order_product2['order_p_stock']);
						   
						   $trancking_date2 = "";
						   if ($data_order_product2['trancking_date'] != "") {
							   $trancking_date2 = substr($data_order_product2['trancking_date'], 8 , 2)."/".substr($data_order_product2['trancking_date'], 5, 2)."/".substr($data_order_product2['trancking_date'], 0, 4);
							}
                        ?>
                        <tr>
                    	  <td align="center" valign="middle">
                    	    <strong><img alt="" title="" src="../images/products/<?php echo $data_order_product2['pro_code'];?>/<?php echo $data_order_product2['order_p_color'];?>/s.jpg" height="100" /><br />
               	          #CODE :<?php echo $data_order_product2['pro_code'];?> #SIZE : <?php echo $data_order_product2['order_p_size'];?> <?php echo $data_order_product2['order_p_name'];?></strong></td>
                    	  <td align="center" valign="middle"><?php echo $data_order_product2['tracking_number']."<br>".$trancking_date2;?></td>
                        	<td align="center" valign="middle">
                            	<?php echo $data_order_product2['order_p_stock'];?>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($data_order_product2['order_p_price']);?></strong>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($data_order_product2['order_p_price'] * $data_order_product2['order_p_stock']);?></strong>
                            </td>
                        </tr>
						<?php }  ?>
                        <tr>
                          <td colspan="3">&nbsp;</td>
                          <td class="hilight" align="center" valign="middle">
                           	  TOTAL
                          </td>
                            <td class="hilight" align="center" valign="middle">
                            	<strong>
                            <?php echo number_format($grand_total2);?> </strong>
                            <strong><?php echo ($_SESSION['sess_language'] == 'eng' ? "Baht" : "บาท");?></strong></td>
                        </tr>
                    </table>  
                    <input type="hidden" name="product_total_pre" value="<?php echo $product_total_pre;?>" />
                    <input type="hidden" name="grand_total_pre" value="<?php echo $grand_total_pre;?>" />
                    
                    <br /><br />
                    
            <?php 
			 $preStock = '1';
			 }
			
			
			
			} // end for
			if ($inStock == '1') {

		   $sql_order_instock = "select * from order_tb where u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' and order_number = '".$_GET['n']."' and order_type = 'IN'";
		   $result_order_instock = @mysql_query($sql_order_instock, $connect);
		   $data_order_instock = @mysql_fetch_array($result_order_instock);
				
				if($data_order_instock['order_transport'] == "Express shipping ( EMS )"){
					$tran_eng = "Express shipping ( EMS )";
					$tran_thai = "พัสดุลงทะเบียน ด่วนพิเศษ";
				}else{
					$tran_eng = "Registered air mail";
					$tran_thai = "พัสดุลงทะเบียนธรรมดา";
				}
				
			?>
            <hgroup class="titleModule">
                <h2>IN-STOCK SHIPPING</h2>
            </hgroup>        
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    
                        <tr class="twoTable">

                        	<td width="48%" align="center" valign="middle">
                                <?php echo $data_order_instock['order_transport'];?>
                            </td>
                            <td width="52%" align="center" valign="middle">
                            	<strong>
                                <?php echo $data_order_instock['order_transport_status'];?>
                                </strong>
                          </td>
                        </tr>

                    </table>  
			<?php
			
			 }
            if ($preStock == '1') {


		   $sql_order_instock2 = "select * from order_tb where  u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' and order_number = '".$_GET['n']."' and order_type = 'PRE'";
		   $result_order_instock2 = @mysql_query($sql_order_instock2, $connect);
		   $data_order_instock2 = @mysql_fetch_array($result_order_instock2);
				
				if($data_order_instock2['order_transport'] == "Express shipping ( EMS )"){
					$tran_eng2 = "Express shipping ( EMS )";
					$tran_thai2 = "พัสดุลงทะเบียน ด่วนพิเศษ";
				}else{
					$tran_eng2 = "Registered air mail";
					$tran_thai2 = "พัสดุลงทะเบียนธรรมดา";
				}

				 
			if ($data_order_instock['order_group'] != '') {?>
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
                                <?php echo $data_order_instock2['order_transport'];?>
                            </td>
                            <td width="52%" align="center" valign="middle">
                            	<strong>
                                <?php echo $data_order_instock2['order_transport_status'];?>
                                </strong>
                          </td>
                        </tr>
                  </table>  
                   <?php } ?>     
                    <br /><br />
                    
				   <?php   
                   $sql_order_address = "select * ,SUM(order_total) as total_order, SUM(order_transport_status) as sum_tran from order_tb where  u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' and order_number = '".$_GET['n']."'";
                   $result_order_address = @mysql_query($sql_order_address, $connect);
                   $data_order_address = @mysql_fetch_array($result_order_address);
				   
					$GTotal =  $data_order_address['total_order'] ;
					
					if($data_order_address['order_promotion'] != '' ){
					$GTotal =  $GTotal - ($GTotal * ($data_order_address['order_promotion']/100));
					}
					
					if($data_order_address['order_point'] != '' ){
					$GTotal =  $GTotal - $data_order_address['order_point'];
					}
				   
				   	$GTotal =  $GTotal + $data_order_address['sum_tran'] ;
				   
                   ?>
                    
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
					<?php
					 if($data_order_address['order_promotion'] != '' ){
					?>
                        <tr class="hilight">
                          <td class="hilight" align="center" valign="middle">
                          ได้รับส่วนลด
                          </td>
                          <td class="hilight" align="center" valign="middle"><?php echo $data_order_address['order_promotion'];?> %</td>
                        </tr>
                        <?php } ?>
                    <?php if($data_order_address['order_point'] != '' ){?>
                        <tr class="hilight">
                          <td class="hilight" align="center" valign="middle">ใช้แต้ม</td>
                          <td class="hilight" align="center" valign="middle"><?php echo $data_order_address['order_point'];?></td>
                        </tr>
                    <?php } ?>
                        <tr class="hilight">
                          <td width="48%" class="hilight" align="center" valign="middle">GRAND TOTAL</td>
                          <td width="52%" class="hilight" align="center" valign="middle">
                           <div id="tranCostPlus">
						  <?php
							  
						  echo number_format($GTotal);
						
						  ?>
                          </div>
                          
                          </td>
                        </tr>
                        
                    </table>  
                </section>
                <br /><br />

                    <table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td bgcolor="#EEEEEE" width="48%">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                <td><?php echo ($_SESSION['sess_language'] == 'eng' ? 'BILLING ADDRESS' : 'ที่อยู่ออกบิล');?></td>
                                </tr>
                                <tr>
                                <td><?php echo $data_order_address['order_address1'];?></td>
                                </tr>
                                </table>
                        </td>
                        <td bgcolor="#F5F5F5" width="52%">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                <td><?php echo ($_SESSION['sess_language']=='eng' ? 'SHIPPING ADDRESS' : 'ที่อยู่จัดส่ง' );?></td>
                                </tr>
                                <tr>
                                <td><?php echo $data_order_address['order_address2'];?></td>
                                </tr>
                                </table>
                        
                        </td>
                      </tr>
                    </table>
                        
                        	
                        	
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
