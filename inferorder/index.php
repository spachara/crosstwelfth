<?php
session_start();
require_once '../dbconnect.inc';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Google Tag Manager -->
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

<!--Accordion-->
<link rel="stylesheet" href="../css/accordion/accordion-style.css" type="text/css">
<!--End Accordion-->  
<!--/////Menu Drop Down/////-->
<!--<script src="../js/dropdown/jquery-1.9.0.min.js"></script>-->
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


<link rel="stylesheet" href="../css/validationEngine.jquery.css" />
<script type="text/javascript" src="../js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../js/languages/jquery.validationEngine-en.js"></script>
<script>
	jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#formID2").validationEngine();
	});

	/**
	*
	* @param {jqObject} the field where the validation applies
	* @param {Array[String]} validation rules for this field
	* @param {int} rule index
	* @param {Map} form options
	* @return an error string if validation failed
	*/
	function checkHELLO(field, rules, i, options){
		if (field.val() != "HELLO") {
			// this allows to use i18 for the error msgs
			return options.allrules.validate2fields.alertText;
		}
	}
</script>
<link rel="stylesheet" href="../js/datepicker/css/mine-theme/jquery-ui-1.9.2.custom.css">
<script type="text/javascript" src="../js/datepicker/js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript">
			$(function(){

				
				// Datepicker
				$('#datepicker').datepicker({
					yearRange: "1950:+0",
					changeMonth: true,
					changeYear: true,
					dateFormat: 'dd/mm/yy'

				});
				
				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); },
					function() { $(this).removeClass('ui-state-hover'); }
				);

			});
</script>				
<script language="javascript">
function chk_order(){

$(document).ready(function() {
	$.ajax({type:'POST',
	url:"ajax.php",
	data: "order_number="+$("#order_number").val()+"&type=chk_order",
	success:function(data){
		$("#total_price2").val(data);
		$("#real_price").val(data);
	}});
	
});

}
</script>

</head>

<body>

<?php 

if($_POST['total_price'] != '' ){

if($_POST['order_number']){


	$paymentArr = explode(" | ",$_POST['order_number']);
	
	foreach ($paymentArr as $v) {
			    
				$exV =  explode(":",$v);
			
				$sql_update = "UPDATE order_tb SET payment_status = '1', order_status = '5' where order_number = '".$exV[0]."' and order_type = '".$exV[1]."'";
				$result_update = @mysql_query($sql_update, $connect);

	}
	

}
	if(!ereg(" | ",$_POST['order_number'])){
	$ex_order_2 = explode(":",$_POST['order_number']);
	
	$value_db = $ex_order_2[0]."-".$ex_order_2[1];
	}else{
	$ex_order = explode(" | ",$_POST['order_number']);
	$ex_order_2 = explode(":",$ex_order[0]);
	$ex_order_3 = explode(":",$ex_order[1]);
	
	$value_db = $ex_order_2[0]."-"."IN"." | ".$ex_order_3[0]."-"."PRE";
	}
	
	$sql = "INSERT INTO payment_tb (id, u_id, order_number, total_price, real_price, order_name, tel";
	$sql .= ", payment_date, payment_time, bank_tranfer, more_bank, date_in)";
	$sql .= " VALUES ('','".$_SESSION['AUTH_PERMISSION_MEMID']."', '".$value_db."', '". mysql_real_escape_string($_POST['total_price']) ."', '".mysql_real_escape_string($_POST['real_price']) ."'";
	$sql .= ", '".mysql_real_escape_string($_POST['order_name'])."', '".mysql_real_escape_string($_POST['tel'])."', '".mysql_real_escape_string($_POST['payment_date'])."'";
	$sql .= ", '".mysql_real_escape_string($_POST['payment_time'])."', '".$_POST['bank_tranfer']."', '".mysql_real_escape_string($_POST['more_bank'])."', NOW())";	
	$result = @mysql_query($sql, $connect);
	
	//echo $sql;
	
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			$.fancybox({
					'href' : 'popup.php',
					'width'				: 400,
					'height'			: 200,
					'autoScale'			: false,
					'transitionIn'		: 'none',
					'transitionOut'		: 'none',
					'transitionIn'	: 'fade',
					'transitionOut'	: 'fade',				
					'type'				: 'iframe',
					'onClosed': function() {   
					 parent.location.href='index.php';
					}
				});
			});
	</script>
	<?php

}


include('../include/header.php') ?>
<form method="post" id="formID2" action="index.php" enctype="multipart/form-data">
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2>ยอดชำระเงิน</h2>
            </hgroup>        
            <section class="paragraph03 overflowNone">
            	<article class="boxInfer-t">
            		<strong>ขอบคุณที่ให้โอกาสและความไว้วางใจสั่งซื้อสินค้ากับทาง Crosstwelfth สรุปยอดรายการโอนตามด้านล่างค่ะ</strong>
                </article>
				<section class="blogOrder">
                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                    	  <!--<td width="9%" align="center" valign="middle">&nbsp;</td>-->
                        	<td width="41%" align="center" valign="middle">
                            	<p>Order Number</p>
                                <span>เลขที่ใบสั่งซื้อ</span>
                            </td>
                            <td width="33%" align="center" valign="middle">
                            	<p>Price</p>
                                <span>ยอดรวม(บาท)</span></td>
                            <td width="8%" align="center" valign="middle">
                            	<p>Status<span></span>
                                  <br />
                            	สถานะ</p></td>
                            <td width="9%" align="center" valign="middle" >&nbsp;
                              
                            </td>
                        </tr>
                        <!------------------------------------------>
						<?php 
						
						                       
                        $sql_insert_order = "select * from order_tb where order_status = '1' and u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' GROUP BY order_number order by date_in desc ";
                        $result_insert_order = @mysql_query($sql_insert_order, $connect);
                        $num_order = @mysql_num_rows($result_insert_order);
						
						   for($p=1;$p<=intval($num_order);$p++){
						   $data_order= @mysql_fetch_array($result_insert_order);
						   

								$sql_insert_order4 = "select * from order_tb where order_number = '".$data_order['order_number']."'";
								$result_insert_order4 = @mysql_query($sql_insert_order4, $connect);
								$num_order4 = @mysql_num_rows($result_insert_order4);
								$data_order4= @mysql_fetch_array($result_insert_order4);
								
								if($num_order4 == 2){ 
									
									$val_order = $data_order4['order_number']."-IN | ".$data_order4['order_number']."-PRE";
										
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
										
										$total_order_show =  $data_order4['total_order'] + $data_order4['sum_tran'];
										
										if($data_order4['order_promotion'] != '' ){
										$total_order_show =  $total_order_show - ($total_order_show * ($data_order4['order_promotion']/100));
										}
										
										if($data_order4['order_point'] != '' ){
										$total_order_show =  $total_order_show - $data_order4['order_point'];
										}
								}
						   
						   
                        ?>
                        <tr>
                            <!--<td align="center" valign="middle">
                            <input name="new_payment[<?php echo $data_order['order_number'];?>]" type="checkbox" id="new_payment " value="<?php echo $data_order['order_number'];?>">
                            </td>-->
                        	<td align="center" valign="middle"><?php echo $val_order;?></td>
                            <td align="center" valign="middle">
                            	<strong>
								<?php 
								echo number_format($total_order_show);?>
                                </strong>
                            </td>
                            <td align="center" valign="middle">
                                                <?php 
		
													if($data_order['order_status']==0){
														echo "<font color=#6600CC>Cancle</font>";
													}elseif($data_order['order_status']==1){
														echo "<font color=#000000>Open</font>";
													}elseif($data_order['order_status']==2){
														echo "<font color=#FF0000>Paid</font>";
													}elseif($data_order['order_status']==3){
														echo "<font color=#0000FF>Delivery</font>";
													}elseif($data_order['order_status']==4){
														echo "<font color=#00CC00>Complete</font>";
													}
												
												?>
                            </td>
                            <td align="center" valign="middle">
                            	<nav>
                               	<a href="../order/view.php?n=<?php echo $data_order['order_number'];?>"><img alt="" title="" src="images/icon-view.png" /></a></nav>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </table>
                </section>		
                
                <section class="paragraph03 overflowNone">
                    <section class="blogRegister">
                        <fieldset>
                            <ul>
                            	<li>
                                    <label>ใบสั่งซื้อ*</label>
                                    <section>
									<?php                        
                                    $sql_insert_order3 = "select * from order_tb where order_status = '1' and u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' GROUP BY order_number order by date_in desc";
                                    $result_insert_order3 = @mysql_query($sql_insert_order3, $connect);
                                    $num_order3 = @mysql_num_rows($result_insert_order3);
									?>
                                      <h4>
                                            <select name="order_number" id="order_number" class="validate[required]" onchange="chk_order()" style="width:300px;">
                                            <option></option>
                                            
                                               <?php
                                               for($p3=1;$p3<=intval($num_order3);$p3++){
                                               $data_order3= @mysql_fetch_array($result_insert_order3);


													$sql_insert_order2 = "select * from order_tb where order_number = '".$data_order3['order_number']."' ";
													$result_insert_order2 = @mysql_query($sql_insert_order2, $connect);
													$num_order2 = @mysql_num_rows($result_insert_order2);
													$data_order2= @mysql_fetch_array($result_insert_order2);
													
													if($num_order2 == 2){ 
														
														$val_order = $data_order2['order_number']."-IN | ".$data_order2['order_number']."-PRE";
														$value_order = $data_order2['order_number'].":IN | ".$data_order2['order_number'].":PRE";
													}else{
														$val_order = $data_order2['order_number']."-".$data_order2['order_type'];
														$value_order = $data_order2['order_number'].":".$data_order2['order_type'];
													}
                                            ?>
                                              <option value="<?php echo $value_order;?>"><?php echo $val_order;?></option>
                                              <?php  }?>
                                          </select>
                                        </h4>
                                        </section>
                                        <div class="clear"></div>                                
                                </li>
                               <li>
                                    <label>ยอดเงินที่ต้องจ่าย</label>
                                    <input name="total_price2" id="total_price2" type="text" value="" disabled="disabled"/>
                                    <input name="real_price" id="real_price" type="hidden" value="" />
                                    
                                    <span>
                                    	บาท
                                    </span>
                                    <div class="clear"></div>
                                </li>
                               <li>
                                    <label>ยอดเงินที่โอน*</label>
                                    <input name="total_price" id="total_price" type="text" class="validate[required]" value=""/>
                                    <span>
                                    	บาท
                                    </span>
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label>ชื่อ*</label>
                                    <input name="order_name" type="text" class="validate[required]" value="<?php echo $_SESSION['AUTH_PERMISSION_FNAME']." ".$_SESSION['AUTH_PERMISSION_LNAME'];?>" />
                                    <div class="clear"></div>
                                </li>
                                <?php
								$select_user = "SELECT * FROM user_tb WHERE u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
								$result_user =@mysql_query($select_user, $connect);
								$data_user =@mysql_fetch_array($result_user);
								?>
                                <li>
                                    <label>เบอร์โทร*</label>
                                    <input name="tel" type="text" class="validate[required]" value="<?php echo $data_user['u_mobi'];?>"/>
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label>วันที่โอน*</label>
                                    <input name="payment_date" type="text" id="datepicker" class="validate[required]"/>
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label>เวลา*</label>
                                    <input name="payment_time" type="text" class="validate[required]"/>
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label>ธนาคาร*</label>
                                    <section>
                                      <h4>
                                            <select name="bank_tranfer" class="validate[required]">
                                            <option value=""></option>
											<?php
                                             
                                            $sql_bank2 = "SELECT * FROM bank_tb where ranking not in ('','0') ORDER BY ranking";
                                            $result_bank2 =@mysql_query($sql_bank2, $connect);
                                            $num_bank2 =@mysql_num_rows($result_bank2);
                                                                
                                            for($bk2=1;$bk2<=intval($num_bank2);$bk2++){
                                            $data_bank2 =@mysql_fetch_array($result_bank2);
                                            ?>
                                              <option value="<?php echo $data_bank2['name'];?>"><?php echo $data_bank2['name'];?></option>
                                          	<?php } ?>    
                                              
                                              
                                          </select>
                                        </h4>   
                                        </section>   
                                        <div class="clear"></div>                          
                                </li>
                            </ul>
                            <article class="paragraph02" style="text-align:center;">
                            	กรณีโอนมากกว่า 1 ธนาคาร กรุณากรอกข้อมูลด้านล่าง
                            </article>
                            <textarea name="more_bank" cols="" rows="" class="textArea-new"></textarea>
                        </fieldset>
                    </section>                                                          
                    <nav class="buttonRegister">
                        <input name="submit" type="submit" value="แจ้งชำระเงิน" />
                    </nav>   
                    <div class="clear"></div>                               	
                </section>
                
						
                
                <section class="paragraph03">
                    <section class="blogStyle">
                        <header>
                            หมายเลขบัญชีในการชำระเงิน
                        </header>
                        <ul class="contentBank">
                        <?php
						 
						$sql_bank = "SELECT * FROM bank_tb where ranking not in ('','0') ORDER BY ranking";
						$result_bank =@mysql_query($sql_bank, $connect);
						$num_bank =@mysql_num_rows($result_bank);
											
						for($bk=1;$bk<=intval($num_bank);$bk++){
						$data_bank =@mysql_fetch_array($result_bank);
						?>
                        	<li>
                            	<section>
                                	<figure><img alt="" title="" src="../../images/bank/<?php echo $data_bank['picture'];?>" /></figure>
                                    <article>
                                    	<strong style="color:#008f47;">&bull;&nbsp;<?php echo $data_bank['name'];?></strong><br />
                                        <?php echo $data_bank['detail'];?>
                                    </article>
                                </section>
                            </li>
						<?php } ?>
                        </ul>
                    </section>                      
                    
                </section>            
            	<div class="clear"></div>    
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
