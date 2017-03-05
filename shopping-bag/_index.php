<?php
session_start();

require_once('../dbconnect.inc');


session_register('session_id');//เก็บไอดี
session_register('session_code');//เก็บไอดี
session_register('session_name_th');//เก็บชื่อ
session_register('session_name_eng');//เก็บชื่อ
session_register('session_price');
session_register("session_num");//เก็บจำนวนชิ้น
session_register("session_size");//เก็บไซด์
session_register("session_color");//เก็บสี
session_register("session_type_th");//เก็บประเภทสินค้า
session_register("session_type_eng");//เก็บประเภทสินค้า



if ($_POST['pro_id'] != '' ) {
	
	$id_arr = $_POST['pro_id'];

	//SQL Product
	$select_product = "SELECT * FROM product_tb WHERE pid = '".$_POST['pro_id']."'";
	$result_product =@mysql_query($select_product, $connect);
	$data_product =@mysql_fetch_array($result_product);
	
	$_SESSION['session_id'][$id_arr] = $id_arr;	//เก็บไอดี
	$_SESSION['session_code'][$id_arr] = $data_product['p_code'];	//เก็บไอดี
	$_SESSION['session_img'][$id_arr] = "1.jpg";	//เก็บไอดี
	$_SESSION['session_size'][$id_arr] = $data_product['p_size'];	//เก็บไอดี
	$_SESSION['session_color'][$id_arr] = $data_product['p_color'];	//เก็บไอดี
	
	$_SESSION['session_name_th'][$id_arr] = $data_product['name'];	
	$_SESSION['session_name_eng'][$id_arr] = $data_product['name_eng'];	
	
	if($data_product['p_special'] != '0' ){
	$_SESSION['session_price'][$id_arr] = round($data_product['p_special']);//เก็บราคา
	}else{
	$_SESSION['session_price'][$id_arr] = round($data_product['p_price']);//เก็บราคา
	}
	
	

	
	$_SESSION['session_type_th'][$id_arr] = $data_product['p_category']; 
	$_SESSION['session_type_eng'][$id_arr] = $data_product['p_category']; 
	
	$product_qty = 1;

	if($_SESSION['session_id'][$id_arr] == $id_arr ){ //เช็คว่าไอดีที่เข้ามามีอยู่แล้วไหม ถ้ามีให้เพิ่มจากตัวเก่าไป 1 จำนวน
		
		$total_num = $_SESSION['session_num'][$id_arr] + $product_qty;
		$_SESSION['session_num'][$id_arr] =  $total_num;
		
		
	}else{ //ถ้าหากว่าเช็คแล้วไม่มีไอดีที่เข้ามาอยู่ก่อนหน้านี้ก็กำหนดให้เป็น 1 ชิ้น ใหม่

		$_SESSION['session_num'][$id_arr] =  $product_qty;
		
	}
	

}



if($_SESSION['session_id']){
	
	 foreach($_SESSION['session_id'] as $key5=> $i5){
		
		if($i5 != ''){
			$_SESSION['session_num'][$i5];
			$num_product_show += $_SESSION['session_num'][$i5];
		}
		
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
<!--Tap--> 
    <script src='../js/taps/jquery.min.js'></script>
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
                <h2>My Shopping Bag</h2>
            </hgroup>        
            <section class="paragraph03">
				<section class="blogOrder">
                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                        	<td align="center" valign="middle">
                            	<p>Products</p>
                                <span>สินค้า</span>
                            </td>
                            <td align="center" valign="middle">
                            	<p>Detail & Size</p>
                                <span>รายละเอียดและขนาด</span>
                            </td>
                            <td align="center" valign="middle">
                            	<p>Amount</p>
                                <span>จำนวนสินค้า</span>
                            </td>
                            <td align="center" valign="middle" >
                            	<p>Price</p>
                                <span>ยอดรวม(บาท)</span>
                            </td>
                            <td align="center" valign="middle" >&nbsp;
                            	
                            </td>
                        </tr>
						<?php
                        if ($_SESSION['session_id']) {
                    
                            foreach ($_SESSION['session_id'] as $key=> $i) {					
                    
                                if($i != ''){
                                
                                $po = $_SESSION['session_price'][$i];
                                $total_unit = $_SESSION['session_num'][$i] * $po ;	
                                $product_total = $product_total + $total_unit;
								$total_piece = $total_piece + $_SESSION['session_num'][$i];
                        ?>
                        <tr>
                        	<td align="center" valign="middle">
                            	<img alt="" title="" src="../images/products/<?php echo $_SESSION['session_code'][$i];?>/<?php echo $_SESSION['session_color'][$i];?>/1.jpg" height="100" />
                            </td>
                            <td align="center" valign="middle">
                            	<strong>#CODE :<?php echo $_SESSION['session_code'][$i];?> #SIZE : <?php echo $_SESSION['session_size'][$i];?> <?php echo ($_SESSION['sess_language'] == 'eng' ? $_SESSION['session_name_th'][$i] : $_SESSION['session_name_eng'][$i]);?></strong>
                            </td>
                            <td align="center" valign="middle">
                            	<INPUT TYPE="text" NAME="prd_num[<?php echo $i; ?>]"  VALUE="<?php echo $_SESSION['session_num'][$i];?>" SIZE='4'>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($_SESSION['session_price'][$i]);?></strong>
                            </td>
                            <td align="center" valign="middle">
                            	<nav>
                                	<a href="../products/detail/?id=<?php echo $_SESSION['session_id'][$i];?>" target="_blank"><img alt="" title="" src="images/icon-view.png" /></a>
                                    <a href="#"><img alt="" title="" src="images/icon-remove.png" /></a>
                                </nav>
                            </td>
                        </tr>
						<?php } } }?>
                        <tr class="twoTable">
                        	<td colspan="2">&nbsp;
                            	
                            </td>
                            <td align="center" valign="middle">
                            	<?php echo ($_SESSION['sess_language'] == 'eng' ? "Total Amount" : "ราคาสินค้าทั้งหมดรวม");?> 
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($product_total);?> <?php echo ($_SESSION['sess_language'] == 'eng' ? "Baht" : "บาท");?></strong>
                            </td>
                            <td align="center" valign="middle">&nbsp;
                            	
                            </td>
                        </tr>
                        <tr class="twoTable">
                        	<td colspan="2">&nbsp;
                            	
                            </td>
                            <td align="center" valign="middle">
                            	Delivery Charge
                            </td>
							<?php
							if($_SESSION['shipping'] == '' ){ 
                            $select_ship2 = "SELECT * FROM shipping_tb WHERE shipping_ranking = '1' ";
							}else{
                            $select_ship2 = "SELECT * FROM shipping_tb WHERE shipping_ranking = '".$_SESSION['shipping']."' ";
							}

                            $result_ship2 =@mysql_query($select_ship2, $connect);
                            $data_ship2 =@mysql_fetch_array($result_ship2);
							?>
                            <td align="center" valign="middle">
                            	<strong><?php echo $data_ship2['shipping_cost'];?>.-</strong>
                            </td>
                            <td align="center" valign="middle">
                            	<div class="choice-tabel">
                                	<ul>
									<?php 
									$select_ship = "SELECT * FROM shipping_tb WHERE shipping_ranking NOT IN ('','0') ORDER BY shipping_ranking ";
									$result_ship =@mysql_query($select_ship, $connect);
									$num_ship =@mysql_num_rows($result_ship);
									for($s=1;$s<=intval($num_ship);$s++){
                                    $data_ship =@mysql_fetch_array($result_ship);	
                                    ?>
                                    	<li>
                                        	<input name="shipping_type" type="radio" value="<?php echo $data_ship['shipping_id'];?>" <?php echo ($_SESSION['shipping']==$data_ship['shipping_id'] || ($_SESSION['shipping'] == '' && $s =='1')? "checked=checked" : '');?>
                                            total_piece <?php echo ($total_piece > 2 && $data_ship['shipping_id'] == '1' ? "disabled=disabled" : "");?>/>
                                            <label><?php echo ($_SESSION['sess_language'] == 'eng' ? $data_ship['shipping_name'] : $data_ship['shipping_name_th']);?></label>
                                        </li>
                                    <?php } ?>    

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2">&nbsp;
                            	
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	TOTAL
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	<strong>
                                <?php
                                $grand_total = $product_total + $data_ship2['shipping_cost'];
								echo number_format($grand_total);
								?>.-</strong>
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	<div class="buttonForm">
                                <input type="hidden" name="product_total" value="<?php echo $product_total;?>" />
                                <input type="hidden" name="grand_total" value="<?php echo $grand_total;?>" />
                                <input name="complete" type="submit" value="<?php echo ($_SESSION['sess_language'] == 'eng' ? "CHECK OUT" : "สั่งซื้อสินค้า");?>" />
                                </div>
                            </td>
                        </tr>
                    </table>
                </section>		
                <section class="paragraph03 blogOrder-t">
                	***เนื่องจากไม่มีการ Check Out แล้วรายการที่ลูกค้า Delete หรือรายการที่ไม่ได้รับการชำระเงินภายใน 3วัน<br />
                    รายการจะถูกยกเลิกคืนใส่สต๊อกโดยอัตโนมัติ กรณีที่ไม่มารับสินค้าเกิน 3 วัน ระบบจะทำการล๊อค login และยกเลิก Cash ที่ได้จากทางร้านทั้งหมด ขอบคุณสำหรับความร่วมมือนะค่ะ
                </section>	
                <section class="buttonRegister">
                <input name="productAll" type="button" value="<?php echo ($_SESSION['sess_language'] == 'eng' ? "CONTINUE SHOPPING" : "เลือกซื้อสินค้าต่อ");?>" onClick="window.location='../products/';">
                <input name="dellall" type="button" value="<?php echo ($_SESSION['sess_language'] == 'eng' ? "CANCEL" : "ยกเลิกการสั่งซื้อ");?>" onClick="window.location='order_del.php';">
                <input name="calculate" type="submit" value="<?php echo ($_SESSION['sess_language'] == 'eng' ? "CALCULATE OR MODIFY" : "คำนวณ หรือ ปรับปรุงใบสั่งซื้อ");?>" />
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
