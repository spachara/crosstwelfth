<?php
session_start();
require_once '../dbconnect.inc';
$order_number = $_GET['o'];
$phone_number = $_GET['p']; 
						
if(isset($_GET['o']) && isset($_GET['p']))
{	
$sql_insert_order = "select *  from order_tb where order_number = '" .  $order_number . "' and order_phone = '".  $phone_number ."' GROUP BY order_number order by date_in desc ";
  $result_insert_order = @mysql_query($sql_insert_order, $connect);
$num_order = @mysql_num_rows($result_insert_order);
 $data_order= @mysql_fetch_array($result_insert_order);
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

if($_POST['order_number_real']){

 
			
	
			$address1 = "ชื่อ : ".$_POST['contact_name']." ".$_POST['contact_surname']."<br>".
			"ที่อยู่ : ".$_POST['contact_address']."<br>".
			"จังหวัด : ".$_POST['contact_province']."<br>".
			"รหัสไปรษณีย์ : ".$_POST['contact_zipcode']."<br>".
			"เบอร์โทรศัพท์ : ".$_POST['contact_tel']."<br>";
			if(isset($_POST['contact_email']) && $_POST['contact_email'] != '')
			{
				$address1 .= "อีเมล์ : ".$_POST['contact_email']."<br><br>";
			}
				$sql_update = "UPDATE order_tb SET payment_status = '1', order_status = '5', order_address1 = '" . mysql_real_escape_string($address1) . "' , order_address2 = '" . mysql_real_escape_string($address1) . "' , order_employee ='" . mysql_real_escape_string($_POST['contact_name'])." ".mysql_real_escape_string($_POST['contact_surname']) . "' , order_email= '" . mysql_real_escape_string($_POST['contact_email']) . "' where order_number = '".$_POST['order_number_real']."'"  ;
				$result_update = @mysql_query($sql_update, $connect);
 
	

} 
	
	$sql = "INSERT INTO payment_tb (id, u_id, order_number, total_price, real_price, order_name, tel";
	$sql .= ", payment_date, payment_time, bank_tranfer, more_bank, date_in)";
	$sql .= " VALUES ('','".$_POST['order_uid']."', '".$_POST['order_number']."', '". mysql_real_escape_string($_POST['total_price']) ."', '".mysql_real_escape_string($_POST['real_price']) ."'";
	$sql .= ", '".mysql_real_escape_string($_POST['contact_name']." ".$_POST['contact_surname'])."', '".mysql_real_escape_string($_POST['contact_tel'])."', '".mysql_real_escape_string($_POST['payment_date'])."'";
	$sql .= ", '".mysql_real_escape_string($_POST['payment_time'])."', '".$_POST['bank_tranfer']."', '".mysql_real_escape_string($_POST['more_bank'])."', NOW())";	
	$result = @mysql_query($sql, $connect);
			 
	require_once 'gen_invoice.php';
	?>
	
	<?php
	echo	"<script>window.location='index.php?o=" .   $_POST['order_number_real'] . "&p=" . $_POST['order_tel']  . "'</script>";
}
 ?>
<form method="post" id="formID2" action="index.php" enctype="multipart/form-data">
<section class="container">
	<section class="container_content">
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2><?php echo ($data_order['order_status'] != '1' ? 'ตรวจสอบสถานะ' : 'แจ้งชำระเงิน/ที่อยู่จัดส่ง');  ?></h2>
            </hgroup>        
            <section class="paragraph03 overflowNone">
				<section class="blogOrder">
                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                    	  <!--<td width="9%" align="center" valign="middle">&nbsp;</td>-->
                        	<td width="38%" align="center" valign="middle">
                            	<p>Order Number</p>
                                <span>เลขที่ใบสั่งซื้อ</span>
                            </td>
                            <td width="13%" align="center" valign="middle">
                            	<p>Price</p>
                                <span>ยอดชำระ(บาท)</span></td>
                            <td width="15%" align="center" valign="middle">
                            	<p>Status<span></span>
                                  <br />
                            	สถานะ</p></td>
							<td width="20%" align="center" valign="middle">
                            	<p>Tracking No.</p>
                                <span>เลขที่พัสดุ</span></td>
                            <td width="14%" align="center" valign="middle" > 
                              <p>Detail (Click)</p><span>รายละเอียด(กด)</span>
                                 
                            	 
                            </td>
                        </tr>
                        <!------------------------------------------>
						<?php 
						
						   

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
								
								 $sql_product_tb = "select distinct tracking_number,trancking_date from order_product_tb where order_number = '".$data_order['order_number']."'  and tracking_number <> '' order by trancking_date" ;
						   $result_product = @mysql_query($sql_product_tb, $connect);
						   $num_product = @mysql_num_rows($result_product);
						   $tracking_str = '';
						   for($p=1;$p<=intval($num_product);$p++){
							    $data_order_product = @mysql_fetch_array($result_product);
								
								$tracking_str .= $data_order_product['trancking_date'] . " : " . $data_order_product['tracking_number'];
								if($p< intval($num_product))
								{									
									$tracking_str .= '<br>';
								}
						   }
						   
						   
                        ?>
                        <tr>
                        	<td  style="font-size: 1.2em;" align="center" valign="middle"><b><?php echo $val_order;?></b></td>
                            <td  style="font-size: 1.2em;" align="center" valign="middle">
                            	<strong>
								<?php 
								echo number_format($total_order_show).".".substr($data_order['order_number'],-2);?>
                                </strong>
                            </td>
                            <td align="center" valign="middle">
                                                <?php 
		
													if($data_order['order_status']==0){
														echo "<font color=#6600CC>ยกเลิก</font>";
													}elseif($data_order['order_status']==1){
														echo "<font color=#000000>รอชำระค่าสินค้า</font>";
													}elseif($data_order['order_status']==2){
														echo "<font color=#FF0000>ได้รับชำระเงินแล้ว/เตรียมจัดส่งสินค้า</font>";
													}elseif($data_order['order_status']==3){
														echo "<font color=#0000FF>จัดส่งสินค้าเรียบร้อยแล้ว</font>";
													}elseif($data_order['order_status']==5){
														echo "<font color=#00CC00>แจ้งโอนเงิน/รอตรวจสอบยอดเงิน</font>";
													}
												
												?>
                            </td>
							<td align="center" valign="middle">
							<?php echo $tracking_str;?>
							</td>
                            <td align="center" valign="middle">
                            	<nav>
                               	<a href="view.php?n=<?php echo $data_order['order_number'];?>"><img alt="" title="" src="../order/images/icon-view.png" /></a></nav>
                            </td>
                        </tr>
                        
                    </table>
					<article class="boxInfer-t" style="color:red">
                </article>
                </section>		
                	
				 <section style="<?php echo $data_order['order_status'] == '1' ? 'display:none;' : '';  ?>" class="paragraph03">
                    <section class="blogStyle">
						<p style="color:red">*** ท่านสามารถอัพเดทสถานะออเดอร์ และ เลขพัสดุ ได้ที่ลิ้งเดิมนี้คะ ***</p>
					<article class="boxInfer-t">
						<br>
						<header>การจัดส่งสินค้าของทางร้าน </header>
<br>
						<p>-  สินค้าจัดส่งทุกวัน  (ยกเว้น วันอาทิตย์ และวันหยุดนักขัตฤกษ์)  นะคะ</p>
<br>
						<p>- สินค้าพร้อมส่ง  จัดส่งออกจากร้านภายใน 2วัน หลังชำระเงิน  และสินค้าพรีออเดอร์  จัดส่ง 15วัน หลังชำระเงิน นะคะ</p>
<br>
						<p>เลขพัสดุ ที่ขึ้นต้นด้วย RMA  SUK  จัดส่งโดย Kerry Express เช็คสถานะได้ที่ <a style="color:blue" target="_blank" href="https://th.kerryexpress.com/en/track/">https://th.kerryexpress.com/en/track/</a></p>
<br>
					<p>เลขพัสดุ  ตัวเลข 6 หลัก  จัดส่งโดย Alpha Fast   เช็คสถานะได้ที่ <a style="color:blue" target="_blank" href="http://www.alphafast.com/th/track">http://www.alphafast.com/th/track</a> </p>

<br>
				<p>เลขพัสดุที่ขึ้นต้น  RE  RI จัดส่งโดยไปรษณีย์ไทย  เช็คสถานะ ได้ที่  <a style="color:blue" target="_blank" href="http://track.thailandpost.com/tracking/default.aspx">http://track.thailandpost.com/tracking/default.aspx</a></p>
				  </article>			
                    </section>                      
                    
                </section> 
				
                <section style="<?php echo $data_order['order_status'] != '1' ? 'display:none;' : '';  ?>" class="paragraph03">
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
                <section style="<?php echo $data_order['order_status'] != '1' ? 'display:none;' : '';  ?>" class="paragraph03 overflowNone">
                    <section class="blogRegister">
                        <fieldset>
						
								 
							<h2 style="margin-bottom: 0.5em;">แจ้งชำระเงิน</h2>
							<div class="clear"></div>      
                            <ul style="width:80%"> 
                            	<li>
                                    <label>ใบสั่งซื้อ*</label>
                                    <section>
                                    <input   type="text" value="<?php echo $val_order; ?>" disabled="disabled"/>
                                    <input name="order_number" id="order_number" type="hidden" value="<?php echo $val_order; ?>" />
                                    <input name="order_number_real" id="order_number_real" type="hidden" value="<?php echo $data_order['order_number']; ?>" />
                                    <input name="order_tel" id="order_tel" type="hidden" value="<?php echo $phone_number; ?>" />
                                         <input name="order_uid" id="order_uid" type="hidden" value="<?php echo $data_order['u_id']; ?>" />    
                                   </section>
                                        <div class="clear"></div>                                
                                </li>
                               <li>
                                    <label>ยอดชำระ</label>
									<?php
									$select_order = "SELECT SUM(order_total) as total_order, SUM(order_transport_status) as sum_tran, order_promotion, order_point FROM order_tb WHERE order_number = '". $data_order['order_number']."'";
									$result_order =@mysql_query($select_order, $connect);
									$num_order =@mysql_num_rows($result_order);
									$data_order2 =@mysql_fetch_array($result_order);
									
									$total_order =  $data_order2['total_order'];
									
									if($data_order2['order_promotion'] != '' ){
									$total_order =  $total_order - ($total_order * ($data_order2['order_promotion']/100));
									}
									$total_order =  $total_order + $data_order2['sum_tran'] ;
									if($data_order2['order_point'] != '' ){
									$total_order =  $total_order - $data_order2['order_point'];
									}
									?>
                                    <input name="total_price2" id="total_price2" type="text" value="<?php echo $total_order.".".substr($data_order['order_number'],-2); ?>" disabled="disabled"/>
                                    <input name="real_price" id="real_price" type="hidden" value="<?php echo $total_order; ?>" />
                                    
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
								<article class="paragraph02" style="text-align:center;">
									กรณีโอนมากกว่า 1 ธนาคาร กรุณากรอกข้อมูลด้านล่าง
								</article>
								<textarea name="more_bank" cols="" rows="" class="textArea-new"></textarea>
								 
                            </ul>
							 
							<h2 style="margin-bottom: 0.5em;">ที่อยู่จัดส่ง</h2>                                                          
							<div class="clear"></div>    
                            <ul style="width:80%"> 
								<li>
                                    <label>ชื่อผู้รับ*</label>
                                    <input name="contact_name" type="text" class="validate[required]"/>
                                    <div class="clear"></div>
                                </li>
								<li>
                                    <label>นามสกุล*</label>
                                    <input name="contact_surname" type="text" class="validate[required]"/>
                                    <div class="clear"></div>
                                </li>
								<li>
                                    <label>ที่อยู่*</label>
                                    <textarea name="contact_address" id="contact_address" cols="" rows="" class="validate[required]"></textarea>
                                    <div class="clear"></div>
                                </li>
								<li>
                                    <label>เบอร์โทรผู้รับ*</label>
                                    <input name="contact_tel" type="text" class="validate[required]" value="<?php echo $data_order['order_phone'];?>"/>
                                    <div class="clear"></div>
                                </li>
								<li>
                                    <label>จังหวัด*</label>
                                    <h6>
                                                <select name="contact_province" id="contact_province" class="validate[required]">
                                                    <option value="">กรุณาเลือกจังหวัด</option>
                                                    <?php 
                                                    $select_country = "SELECT * FROM province order by PROVINCE_NAME";
                                                    $result_country =@mysql_query($select_country, $connect);
                                                    $num_country =@mysql_num_rows($result_country);
                                                    for($c=1;$c<=intval($num_country);$c++){
                                                    $data_country =@mysql_fetch_array($result_country);	
                                                    ?>
                                                    <option value="<?php echo $data_country['PROVINCE_NAME'];?>"><?php echo $data_country['PROVINCE_NAME'];?></option>
                                                    <?php } ?>
                                                </select>                                    
                                    
                                    
                                    </h6>
                                	<div class="clear"></div>
                                </li>
								 <li>
                                    <label>รหัสไปรษณีย์*</label>
                                    <h6>
                                    <input name="contact_zipcode" id="contact_zipcode" class="validate[required]" type="text" value=""/>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
								<li>
                                    <label>E-mail</label>
                                    <h6>
                                    <input name="contact_email" id="contact_email"  type="text" value=""/>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                            </ul>
                        </fieldset>
                    </section>                                                          
                    <nav class="buttonRegister">
                        <input name="submit" type="submit" value="แจ้งชำระเงิน" />
                    </nav>   
                    <div class="clear"></div>  
                </section>
                
				<section  class="paragraph03">  
				<br>
            	<article  style=" font-size: 19px; " class="boxInfer-t">
            		<strong>เลือกชมสินค้าเพิ่มเติมได้ที่ <a style="color:blue" target="_blank" href="http://www.crosstwelfth.com">www.crosstwelfth.com</a>
					<br> ขอบคุณคะ Crosstwelth ยินดีให้บริการคะ</strong>
                </article>						
				</section> 	
				<section style="<?php echo $data_order['order_status'] != '1' ? 'height:400px' : '';  ?>" class="paragraph03">	
				</section>    
            	<div class="clear"></div>    
			</section>			
			                                     	
        </section>
        
        
        
             
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
