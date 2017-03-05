<?php
session_start();

require_once('../dbconnect.inc');

session_register('session_in_ems');//เก็บไอดี
session_register('session_pre_ems');//เก็บไอดี
session_register('session_normal');//เก็บไอดี

session_register('session_ems_grand');//เก็บไอดี
session_register('session_normal_grand');//เก็บไอดี



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


session_register('session_pre_id');//เก็บไอดี
session_register('session_pre_code');//เก็บไอดี
session_register('session_pre_name_th');//เก็บชื่อ
session_register('session_pre_name_eng');//เก็บชื่อ
session_register('session_pre_price');
session_register("session_pre_num");//เก็บจำนวนชิ้น
session_register("session_pre_size");//เก็บไซด์
session_register("session_pre_color");//เก็บสี
session_register("session_pre_type_th");//เก็บประเภทสินค้า
session_register("session_pre_type_eng");//เก็บประเภทสินค้า


if ($_POST['pro_id'] != '' ) {
	

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



	$id_arr = $_POST['pro_id'];
	
	$select_product_stock = "SELECT * FROM product_tb WHERE pid = '".$_POST['pro_id']."' and p_stock = '0'";
	$result_product_stock =@mysql_query($select_product_stock, $connect);
	$num_stock =@mysql_fetch_array($result_product_stock);
	
	$select_product = "SELECT * FROM product_tb WHERE pid = '".$_POST['pro_id']."'";
	$result_product =@mysql_query($select_product, $connect);
	$data_product =@mysql_fetch_array($result_product);
	
	if($num_stock){
						
						$_SESSION['session_pre_id'][$id_arr] = $id_arr;	//เก็บไอดี
						$_SESSION['session_pre_code'][$id_arr] = $data_product['p_code'];	//เก็บไอดี
						$_SESSION['session_pre_img'][$id_arr] = "1.jpg";	//เก็บไอดี
						$_SESSION['session_pre_size'][$id_arr] = $data_product['p_size'];	//เก็บไอดี
						$_SESSION['session_pre_color'][$id_arr] = $data_product['p_color'];	//เก็บไอดี
						
						$_SESSION['session_pre_name_th'][$id_arr] = $data_product['name'];	
						$_SESSION['session_pre_name_eng'][$id_arr] = $data_product['name_eng'];	
						
						if($data_product['p_special'] != '0' ){
						$_SESSION['session_pre_price'][$id_arr] = round($data_product['p_special']);//เก็บราคา
						}else{
						$_SESSION['session_pre_price'][$id_arr] = round($data_product['p_price']);//เก็บราคา
						}
						
						
					
						
						$_SESSION['session_pre_type_th'][$id_arr] = $data_product['p_category']; 
						$_SESSION['session_pre_type_eng'][$id_arr] = $data_product['p_category']; 
						
						$product_qty_pre = 1;
					
						if($_SESSION['session_pre_id'][$id_arr] == $id_arr ){ //เช็คว่าไอดีที่เข้ามามีอยู่แล้วไหม ถ้ามีให้เพิ่มจากตัวเก่าไป 1 จำนวน
							
							$total_num_pre = $_SESSION['session_pre_num'][$id_arr] + $product_qty_pre;
							$_SESSION['session_pre_num'][$id_arr] =  $total_num_pre;
							
							
						}else{ //ถ้าหากว่าเช็คแล้วไม่มีไอดีที่เข้ามาอยู่ก่อนหน้านี้ก็กำหนดให้เป็น 1 ชิ้น ใหม่
					
							$_SESSION['session_pre_num'][$id_arr] =  $product_qty_pre;
							
						}
	
		
	}else{
						//SQL Product
						
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


<script>
function chkGroup(){
	

	if(document.getElementById('groupDelivery').checked == true){
		
		if(document.getElementById('TotalNumGrand').value > 1){
		var sumShip = document.getElementById('TotalNumPre').value * 10;
		}else{
		var sumShip = 0
		}
		
		document.getElementById('tranCost').innerHTML = sumShip;
		document.getElementById('tranCostPreChk').value = sumShip;
		
		
		document.getElementById('tranCostPlus').innerHTML = document.getElementById('grand_dis_js').value;
		
		var tran_p = document.getElementById('tranCostPlusHidden').value - document.getElementById('grand_ship_js').value + sumShip;
		
		document.getElementById('tranCostPlus').innerHTML = tran_p;
		document.getElementById('SubmitGrandTotal').value = tran_p;
		document.getElementById('tranCostPlusCal').value = tran_p;
		
		var rads = document.myform.shipping_type_pre;
	
		for(var y=0; y<rads.length;y++ )
		{
			document.myform.shipping_type_pre[y].disabled = true;
			if(document.getElementById('TotalNumGrand').value > 1){
			document.myform.shipping_type_pre[0].disabled = true;
			}
		}		

	}else{
		


		document.getElementById('tranCost').innerHTML = document.getElementById('grand_ship_js').value;
		document.getElementById('tranCostPlus').innerHTML = document.getElementById('grand_cal_js').value;
		document.getElementById('realShipPre').value = document.getElementById('grand_ship_js').value;
		document.getElementById('SubmitGrandTotal').value = document.getElementById('grand_cal_js').value;
		document.getElementById('tranCostPlusCal').value = document.getElementById('grand_cal_js').value;
		
		
		
		var rads = document.myform.shipping_type_pre;
	
		for(var y=0; y<rads.length;y++ )
		{
			
			document.myform.shipping_type_pre[y].disabled = false;
			if(document.getElementById('TotalNumGrand').value > 1){
			document.myform.shipping_type_pre[0].disabled = true;
			}

		}		
		
	}
}
</script>
 
<script language="javascript">
function chk_order(){
$(document).ready(function() {
	
	
	var rads = document.myform.shipping_type;
	for(var y=0; y<rads.length;y++ )
	{
		if(document.myform.shipping_type[y].checked == true ){
	
		$.ajax({type:'POST',
		url:"ajax.php",
		data: "shipping_type="+document.myform.shipping_type[y].value+"&type=chk_order",
		success:function(data){
			$("#shipCost").html(data);
			$("#realShip").val(data);
			$("#tranCostPlus").html(parseInt($("#grandTotalHidden").val())+ parseInt($("#realShip").val()));
			$("#SubmitGrandTotal").val(parseInt($("#grandTotalPreHidden").val())+ parseInt($("#realShipPre").val()));
			$("#tranCostPlusCal").val(parseInt($("#grandTotalPreHidden").val())+ parseInt($("#realShipPre").val()));

		}});
		
		}	
	
	}
	
	
});

}




function chk_order2(){
$(document).ready(function() {
	
	
	var rads = document.myform.shipping_type_pre;
	for(var y=0; y<rads.length;y++ )
	{
		if(document.myform.shipping_type_pre[y].checked == true ){
	
		$.ajax({type:'POST',
		url:"ajax.php",
		data: "shipping_type="+document.myform.shipping_type_pre[y].value+"&type=chk_order2",
		success:function(data){
			$("#tranCost").html(data);
			$("#realShipPre").val(data);
			$("#tranCostPlus").html(parseInt($("#grandTotalPreHidden").val())+ parseInt($("#realShipPre").val()));
			$("#SubmitGrandTotal").val(parseInt($("#grandTotalPreHidden").val())+ parseInt($("#realShipPre").val()));
			$("#tranCostPlusCal").val(parseInt($("#grandTotalPreHidden").val())+ parseInt($("#realShipPre").val()));

		}});
		
		}	
	
	}
	
	
});

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
		 
		 
		 
		$("#tranCostPlus").html(parseInt($("#SubmitGrandTotal").val())- parseInt(disC));
		$("#tranCostPlusCal").val(parseInt($("#SubmitGrandTotal").val())- parseInt(disC));
		
		if($("#PromotionDis").val() != '' ){
		var discount = parseInt($("#tranCostPlusCal").val()) - (parseInt($("#tranCostPlusCal").val())* (parseInt($("#PromotionDis").val())/100));

		$("#tranCostPlus").html(discount);
		$("#tranCostPlusCal").val(discount);
		}
		
	}
});
		
}

function chkCode(){
$(document).ready(function() {
	
	

		$.ajax({type:'POST',
		url:"ajax.php",
		data: "Code="+document.myform.CodeDis.value+"&type=chk_code",
		success:function(data){
			
			$("#textCode").html('ได้รับส่วนลด ( '+data+' % )');
			$("#PromotionDis").val(data);
			var discount = parseInt($("#tranCostPlusCal").val()) - (parseInt($("#tranCostPlusCal").val())* (data/100));
			$("#tranCostPlusCal").val(discount);
			$("#tranCostPlus").html(discount);

		}});
		

});

}

</script>

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
                
		<?php
        if ($_SESSION['session_id']) {
		?>
            <hgroup class="titleModule">
                <h2>IN-STOCK ITEM</h2>
            </hgroup>        
                
                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                    	  <td align="center" valign="middle">&nbsp;</td>
                        	<td align="center" valign="middle">
                        	  <p>Buying Item</p>
                       	    <span>รายการที่ซื้อ</span></td>
                            <td align="center" valign="middle">
                            	<p>Amount</p>
                                <span>จำนวน</span></td>
                            <td align="center" valign="middle" >
                            	<p>Price/Unit</p>
                                <span>ราคาต่อหน่วย</span></td>
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
                                    <a href="order_cal.php?prd_remove=<?php echo $_SESSION['session_id'][$i];?>"><img alt="" title="" src="images/icon-remove.png" /></a>
                                </nav>
                          </td>
                        	<td align="center" valign="middle">
                        	  <strong><img alt="" title="" src="../images/products/<?php echo $_SESSION['session_code'][$i];?>/<?php echo $_SESSION['session_color'][$i];?>/1.jpg" height="100" /><br />
                       	      #CODE :<?php echo $_SESSION['session_code'][$i];?> #SIZE : <?php echo $_SESSION['session_size'][$i];?> <?php echo ($_SESSION['sess_language'] == 'eng' ? $_SESSION['session_name_th'][$i] : $_SESSION['session_name_eng'][$i]);?></strong>                      	  </td>
                            <td align="center" valign="middle">
                            	<INPUT TYPE="text" NAME="prd_num[<?php echo $i; ?>]"  VALUE="<?php echo $_SESSION['session_num'][$i];?>" SIZE='4'>
                                <?php $total_num_ship = $total_num_ship + $_SESSION['session_num'][$i]?>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($_SESSION['session_price'][$i]);?></strong>
                            </td>
                        </tr>
						<?php } } ?>
                        <tr>
                          <td colspan="2">&nbsp;                          </td>
                        	<td align="center" valign="middle" class="hilight">
                            	TOTAL
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	<strong>
                                <?php
                                $grand_total = $product_total;
								echo number_format($grand_total);
								?> <?php echo ($_SESSION['sess_language'] == 'eng' ? "Baht" : "บาท");?></strong>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="product_total" value="<?php echo $product_total;?>" />
                    <input type="hidden" name="grand_total" value="<?php echo $grand_total;?>" />

     
            <br /><br /><br /><br />
             
            <?php } 
			
			 if ($_SESSION['session_pre_id']) {

			?>       
            <hgroup class="titleModule">
                <h2>PRE-ORDER ITEM</h2>
            </hgroup>        
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                    	  <td align="center" valign="middle">&nbsp;</td>
                        	<td align="center" valign="middle">
                        	  <p>Buying Item</p>
                       	    <span>รายการที่ซื้อ</span></td>
                            <td align="center" valign="middle">
                            	<p>Amount</p>
                                <span>จำนวน</span>
                            </td>
                            <td align="center" valign="middle" >
                            	<p>Price/Unit</p>
                                <span>ราคาต่อหน่วย</span>
                            </td>
                        </tr>
						<?php
                       
                    
                            foreach ($_SESSION['session_pre_id'] as $key=> $i) {					
                    
                                if($i != ''){
                                
                                $po_pre = $_SESSION['session_pre_price'][$i];
                                $total_unit_pre = $_SESSION['session_pre_num'][$i] * $po_pre ;	
                                $product_total_pre = $product_total_pre + $total_unit_pre;
								$total_piece_pre = $total_piece_pre + $_SESSION['session_pre_num'][$i];
                        ?>
                        <tr>
                          <td align="center" valign="middle">
                            	<nav>
                                	<a href="../products/detail/?id=<?php echo $_SESSION['session_pre_id'][$i];?>" target="_blank"><img alt="" title="" src="images/icon-view.png" /></a>
                                    <a href="order_cal.php?pre_remove=<?php echo $_SESSION['session_pre_id'][$i];?>"><img alt="" title="" src="images/icon-remove.png" /></a>
                                </nav>
                          
                          </td>
                        	<td align="center" valign="middle">
                        	  <strong><img alt="" title="" src="../images/products/<?php echo $_SESSION['session_pre_code'][$i];?>/<?php echo $_SESSION['session_pre_color'][$i];?>/1.jpg" height="100" /><br />
                       	      #CODE :<?php echo $_SESSION['session_pre_code'][$i];?> #SIZE : <?php echo $_SESSION['session_pre_size'][$i];?> <?php echo ($_SESSION['sess_language'] == 'eng' ? $_SESSION['session_pre_name_th'][$i] : $_SESSION['session_pre_name_eng'][$i]);?></strong>                      	  </td>
                            <td align="center" valign="middle">
                            	<INPUT TYPE="text" NAME="prd_pre_num[<?php echo $i; ?>]"  VALUE="<?php echo $_SESSION['session_pre_num'][$i];?>" SIZE='4'>
                                <?php $total_num_pre_ship = $total_num_pre_ship + $_SESSION['session_pre_num'][$i]?>
                            </td>
                            <td align="center" valign="middle">
                            	<strong><?php echo number_format($_SESSION['session_pre_price'][$i]);?></strong>
                            </td>
                        </tr>
						<?php } } ?>
                        <tr>
                          <td colspan="2">&nbsp;                          </td>
                        	<td class="hilight" align="center" valign="middle">
                            	TOTAL
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	<strong>
                            <?php
                                $grand_total_pre = $product_total_pre;
								echo number_format($grand_total_pre);
								?> </strong><strong><?php echo ($_SESSION['sess_language'] == 'eng' ? "Baht" : "บาท");?></strong></td>
                        </tr>
                    </table>  
                    <input type="hidden" name="product_total_pre" value="<?php echo $product_total_pre;?>" />
                    <input type="hidden" name="grand_total_pre" value="<?php echo $grand_total_pre;?>" />
                    
                    <br /><br />
                    
            <?php 
			 }
			 
			$grand_num = $total_num_ship + $total_num_pre_ship;

			$select_ship3 = "SELECT * FROM shipping_tb WHERE shipping_ranking = '2' ";
			$result_ship3 =@mysql_query($select_ship3, $connect);
			$data_ship3 =@mysql_fetch_array($result_ship3);

			$ems_price = $data_ship3['shipping_cost'] + ($data_ship3['shipping_p'] * $grand_num );


			$select_ship2 = "SELECT * FROM shipping_tb WHERE shipping_ranking = '1' ";
			$result_ship2 =@mysql_query($select_ship2, $connect);
			$data_ship2 =@mysql_fetch_array($result_ship2);

			$normal_price = $data_ship2['shipping_cost'];
			
			$in_stock_ems = $data_ship3['shipping_cost'] + ($data_ship3['shipping_p'] * $total_num_ship );
			$pre_ems = $data_ship3['shipping_cost'] + ($data_ship3['shipping_p'] * $total_num_pre_ship );

			
			
			if ($_SESSION['session_id']) {

			?>
            <hgroup class="titleModule">
                <h2>IN-STOCK SHIPPING</h2>
            </hgroup>        
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    
                        <tr class="twoTable">

                        	<td width="48%" align="center" valign="middle">
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
                                        	<input onclick="chk_order()" name="shipping_type" type="radio"  <?php echo ($grand_num > 1 && $data_ship['shipping_id'] == '1' ? "disabled=disabled" : "" );?> value="<?php echo $data_ship['shipping_id'];?>" <?php echo ($_SESSION['shipping']==$data_ship['shipping_id'] || ($_SESSION['shipping'] == '' && $s =='1') || ($grand_num > 1 && $data_ship['shipping_id'] == 2)? "checked=checked" : '');?>/>
                                            <label><?php echo ($_SESSION['sess_language'] == 'eng' ? $data_ship['shipping_name'] : $data_ship['shipping_name_th']);?></label>
                                        </li>
                                    <?php } ?>    

                                    </ul>
                                </div>
                            </td>
                            <td width="52%" align="center" valign="middle">
                            	<strong>
                                <div id="shipCost">
								<?php 
								if($_SESSION['shipping'] == 1){
								echo $old_tran = $normal_price;
								}else{
								echo $old_tran = $in_stock_ems;
								}
								?>
                                </div>
                                </strong>
                              <input type="hidden" name="realShip" id="realShip" value="<?php echo $old_tran;?>" />
                          </td>
                        </tr>

                    </table>  
			<?php
			
			 }
            if ($_SESSION['session_pre_id']) {
				 
			if ($_SESSION['session_id']) {?>
				<br /><br /><input type="checkbox" name="groupDelivery" id="groupDelivery" value="1" onclick="chkGroup();" <?php echo ($_SESSION['groupDelivery'] == '1' ? "checked=checked" : "");?> />
                 <font color="#FD8973" style="font-weight:bold">กรุณาคลิกที่นี่ ในกรณีที่ต้องการให้ทางร้านจัดส่งสินค้าทั้งหมดพร้อมกัน</font>
			<?php }  ?>
                    <br /><br />
                    <hgroup class="titleModule">
                        <h2>PRE-ORDER SHIPPING</h2>
                    </hgroup>        
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr class="twoTable">
                       	  <td width="48%" align="center" valign="middle">
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
                                        	<input onclick="chk_order2()"  name="shipping_type_pre" type="radio" <?php echo ($grand_num > 1 && $data_ship['shipping_id'] == '1' ? "disabled=disabled" : "" );?> id="<?php echo $s;?>" value="<?php echo $data_ship['shipping_id'];?>" <?php echo ($_SESSION['shipping_pre']==$data_ship['shipping_id'] || ($_SESSION['shipping_pre'] == '' && $s =='1')  || ($grand_num > 1 && $data_ship['shipping_id'] == 2) ? "checked=checked" : '');?>
                                             <?php echo ($_SESSION['groupDelivery'] == '1' ? "disabled=disabled" : "");?>/>
                                            <label><?php echo ($_SESSION['sess_language'] == 'eng' ? $data_ship['shipping_name'] : $data_ship['shipping_name_th']);?></label>
                                        </li>
                                    <?php } ?>    

                                    </ul>
                                </div>
                            </td>
							<?php
							if($_SESSION['shipping_pre'] == '' ){ 
                            $select_ship2 = "SELECT * FROM shipping_tb WHERE shipping_ranking = '1' ";
							}else{
                            $select_ship2 = "SELECT * FROM shipping_tb WHERE shipping_ranking = '".$_SESSION['shipping_pre']."' ";
							}

                            $result_ship2 =@mysql_query($select_ship2, $connect);
                            $data_ship2 =@mysql_fetch_array($result_ship2);
							if($_SESSION['groupDelivery'] == '1'){
							 $shipping_cost2 = 0;
							}else{
							 $shipping_cost2 = $data_ship2['shipping_cost'];
							 
							}
							//$grand_cal_js = $product_total_pre + $data_ship2['shipping_cost'];
							//$grand_dis_js = $product_total_pre;
							?>
                          <td width="52%" align="center" valign="middle">
                            	<div id="tranCost"><strong>
                               <?php
							   
							   
                               if($_SESSION['session_tranCostPreChk']){
									echo $old_tran_pre = $_SESSION['session_tranCostPreChk'];
								}else{
										if($grand_num > 1){
										    echo $old_tran_pre = $pre_ems;
										}elseif($_SESSION['shipping_pre'] != ''){
											echo $old_tran_pre = $pre_ems;
										}else{
											echo $old_tran_pre = $normal_price;
										}
								
								}
								?>

								</strong></div>
                                
                            <input type="hidden" name="realShipPre" id="realShipPre" value="<?php echo $old_tran_pre;?>" />

                          </td>
                        </tr>
                  </table>  
                   <?php } ?>     
                    <br /><br />
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    
                        <?php
                            $select_point = "SELECT sum(ppoint) as total_have FROM point_tb WHERE m_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
                            $result_point =@mysql_query($select_point, $connect);
                            $data_point =@mysql_fetch_array($result_point);


                            $select_use_point = "SELECT sum(order_point) as total_used FROM order_tb WHERE u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' and order_status <> 0 ";
                            $result_use_point =@mysql_query($select_use_point, $connect);
                            $data_use_point =@mysql_fetch_array($result_use_point);
							
							$grand_point  =  $data_point['total_have'] - $data_use_point['total_used'];
							
							if($grand_point > 0){
						?>
                        <tr class="hilight">
                          <td class="hilight" align="center" valign="middle">คุณมีแต้ม <strong><?php echo $grand_point;?></strong></td>
                          <td class="hilight" align="center" valign="middle"><input type="text" name="PointDis" id="PointDis" value="<?php echo $_SESSION['session_PointDis'];?>" onblur="chkPoint()" /></td>
                        </tr>
                        <input type="hidden" name="GrandPoint" id="GrandPoint" value="<?php echo $grand_point;?>" />
                        <?php
							}
							
                            $select_promotion = "SELECT * FROM promotion_tb WHERE promotion_id = '1' and promotion_status = '1'";
                            $result_promotion =@mysql_query($select_promotion, $connect);
                            $num_promotion =@mysql_num_rows($result_promotion);
							if($num_promotion != 0){
						?>
                        <tr class="hilight">
                          <td class="hilight" align="center" valign="middle" id="textCode">
                          <?php 
						  echo ($_SESSION['session_PromotionDis'] != '' ? "ได้รับส่วนลด ( ".$_SESSION['session_PromotionDis']." % )" : "CODE" );
						  ?>
                          
                          </td>
                          <td class="hilight" align="center" valign="middle">
                          <input type="text" name="CodeDis" id="CodeDis" value="<?php echo $_SESSION['session_CodeDisHidden'];?>" onblur="chkCode()" <?php echo ($_SESSION['session_PromotionDis'] != '' ? "disabled=disabled" : "" ); ?> />
                          <input type="hidden" name="CodeDisHidden" id="CodeDisHidden" value="<?php echo $_SESSION['session_CodeDisHidden'];?>"  />
                          <input type="hidden" name="PromotionDis" id="PromotionDis" value="<?php echo $_SESSION['session_PromotionDis'];?>" />
                          </td>
                        </tr>
                        <?php } ?>
                        <tr class="hilight">
                          <td width="48%" class="hilight" align="center" valign="middle">GRAND TOTAL</td>
                          <td width="52%" class="hilight" align="center" valign="middle">
                           <div id="tranCostPlus">
						   <?php
						   
						  if ($_SESSION['session_id']) {
							  
						  if($total_num_ship == 1 && $total_num_pre_ship == 0 && $_SESSION['shipping'] == '1'){
						  $GrandTotal = $grand_total + $normal_price;
						  }else{
						  $GrandTotal = $grand_total + $in_stock_ems;
						  }
						  
						  
                          $normal_grand = $grand_total + $normal_price;
						  $grand_dis_js = $grand_total + $in_stock_ems;
						  }
						  
						  //echo "<br>GrandTotal = ".$GrandTotal;

						  if ($_SESSION['session_pre_id']) {
							  
						  if($total_num_pre_ship == 1 && $total_num_ship == 0 && $_SESSION['shipping_pre'] == '1'){
						  $GrandTotal = $GrandTotal + $grand_total_pre + $normal_price;
						  }else{
						  $GrandTotal = $GrandTotal + $grand_total_pre + $pre_ems;
						  }
							  
                          $normal_grand = $grand_total_pre + $normal_price;
						  $grand_dis_js = $grand_dis_js + $grand_total_pre + $pre_ems;
						  }
						  
							// echo "<br>2GrandTotal = ".$GrandTotal."<br>";
							
							/*if($_SESSION['session_PointDis'] != '' || $_SESSION['session_CodeDis'] != '' ){
							echo "IN1 ".$_SESSION['session_tranCostPlusCal'];
							}elseif($_SESSION['session_SubmitGrandTotal'] != '' ){
							
							echo "IN2 ".$_SESSION['session_SubmitGrandTotal'];
							
							}else{
							
							}*/
						  if ($_SESSION['session_PromotionDis']) {
							  $GrandTotal = $GrandTotal - ($GrandTotal * $_SESSION['session_PromotionDis']/100);
						  }
						  if ($_SESSION['session_PointDis']) {
							  $GrandTotal = $GrandTotal - $_SESSION['session_PointDis'];
						  }


						  
						  echo $GrandTotal; 
						  ?>
                          </div>
                          
                          
                          <input type="text" name="tranCostPlusHidden" id="tranCostPlusHidden" value="<?php echo ($_SESSION['session_tranCostPlusHidden'] != '' ? $_SESSION['session_tranCostPlusHidden'] : $GrandTotal);?>" />
                          <input type="text" name="tranCostPlusCal" id="tranCostPlusCal" value="<?php echo ($_SESSION['session_tranCostPlusCal'] != '' ? $_SESSION['session_tranCostPlusCal'] : $GrandTotal);?>" />
                          
                          <input type="text" name="grandTotalHidden" id="grandTotalHidden" value="<?php echo $grand_total;?>" />
                          <input type="text" name="grandTotalPreHidden" id="grandTotalPreHidden" value="<?php echo $grand_total_pre;?>" />
                          
                          
                          
                          <input type="hidden" name="TotalNumPre" id="TotalNumPre" value="<?php echo $total_num_pre_ship;?>" />
                          <input type="hidden" name="TotalNumGrand" id="TotalNumGrand" value="<?php echo $grand_num;?>" />


                          <input type="text" name="tranCostPreChk" id="tranCostPreChk" value="<?php echo $_SESSION['session_tranCostPreChk'];?>" />
                          <input type="text" name="SubmitGrandTotal" id="SubmitGrandTotal" value="<?php echo $GrandTotal;?>" />
                          
                          </td>
                        </tr>
                    </table>  
                    <?php
                    
					$_SESSION['session_in_ems'] = $in_stock_ems;
					$_SESSION['session_pre_ems'] = $pre_ems;
					$_SESSION['session_normal'] = $normal_price;
					
					$_SESSION['session_ems_grand'] = $GrandTotal;
					$_SESSION['session_normal_grand'] = $normal_grand;
					
					?>
                    <input type="hidden" name="grand_ship_js" id="grand_ship_js" value="<?php echo $pre_ems;?>" />
                    <input type="hidden" name="grand_cal_js" id="grand_cal_js" value="<?php echo $GrandTotal;?>" />
                    <input type="hidden" name="grand_dis_js" id="grand_dis_js" value="<?php echo $grand_dis_js;?>" />

                    <input type="hidden" name="normal_ship" id="grand_dis_js" value="<?php echo $normal_price;?>" />
 
                    
                    
                    
                    
                    
                    
                </section>		
                <section class="paragraph03 blogOrder-t">
                	
                </section>	
                <section class="buttonRegister">
                <input name="productAll" type="button" value="<?php echo ($_SESSION['sess_language'] == 'eng' ? "CONTINUE SHOPPING" : "เลือกซื้อสินค้าต่อ");?>" onClick="window.location='../products/';">
                <input name="dellall" type="button" value="<?php echo ($_SESSION['sess_language'] == 'eng' ? "CANCEL" : "ยกเลิกการสั่งซื้อ");?>" onClick="window.location='order_del.php';">
                <input name="calculate" type="submit" value="<?php echo ($_SESSION['sess_language'] == 'eng' ? "CALCULATE OR MODIFY" : "คำนวณ หรือ ปรับปรุงใบสั่งซื้อ");?>" />
                <input name="complete" type="submit" value="<?php echo ($_SESSION['sess_language'] == 'eng' ? "CHECK OUT" : "สั่งซื้อสินค้า");?>" />
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
