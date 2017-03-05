<?php
session_start();
require_once('../dbconnect.inc');
		$link = '';
		$order_number = isset($_SESSION['order_id']) ? $_SESSION['order_id'] :  $_SESSION['order_pre_id'];
		$sql_insert_order = "select link_url,order_number from order_tb where order_number = '".$order_number."'";
		$sql_insert_order .= "  group by order_number";
		$result_insert_order = @mysql_query($sql_insert_order, $connect);
		$num_order = @mysql_num_rows($result_insert_order);
		$data_order = @mysql_fetch_array($result_insert_order);
		$link= $data_order['link_url'];
		
		 
		$select_order = "SELECT SUM(order_total) as total_order, SUM(order_transport_status) as sum_tran, order_promotion, order_point FROM order_tb WHERE order_number = '". $data_order['order_number']."'";
		$result_order =@mysql_query($select_order, $connect);
		$num_order =@mysql_num_rows($result_order);
		$data_order2 =@mysql_fetch_array($result_order);
		
		$total_order =  $data_order2['total_order'];
		$sum_tran =  $data_order2['sum_tran'];
		
		if($data_order2['order_promotion'] != '' ){
		$total_order =  $total_order - ($total_order * ($data_order2['order_promotion']/100));
		}
		$total_order =  $total_order + $sum_tran ;
		if($data_order2['order_point'] != '' ){
		$total_order =  $total_order - $data_order2['order_point'];
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
                <h2></h2>
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
                       <h3>Copy ข้อความนี้ให้ลูกค้า</h3>

                  </p>
				     
					   <?php 
					   	$txt_sql = "SELECT txt_detail_th FROM txt_tb WHERE type_name = 'thankyou_admin_page' and txt_status = '0'";
						$result_txt =@mysql_query($txt_sql, $connect); 
						$data_txt =@mysql_fetch_array($result_txt);
					    $txt =  sprintf($data_txt['txt_detail_th']
								,$data_order['order_number']
								,$total_order.".".substr($data_order['order_number'],-2)
								,$sum_tran
								,$link);
													
						?>						
                    <textarea rows="8" cols="100"><?php echo $txt; ?></textarea>
				  
				  </center>
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