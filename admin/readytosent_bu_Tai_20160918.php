<?php
session_start();
require_once '../dbconnect.inc';


if(isset($_SESSION['AUTH_PERMISSION_ID'])==false) {
	echo "<script>location.href='index.php'</script>";
}


if($_POST['submit'] == 'Save' ){
	
$date_check = date('Y')."-".date('m')."-".date('d');
$sql_max = "select max(round_update) as max_round from order_product_tb where ready_time = '".$date_check ."'";
$result_max = @mysql_query($sql_max, $connect);
$data_max=@mysql_fetch_array($result_max);
$maxx_date = $data_max['max_round']+1;

		if($_POST['trackingProId']){
			
		foreach ($_POST['trackingProId'] as $v) {
			
			
			if($_POST['tracking'][$v] == '1'){
					$sql_update_payment = "UPDATE order_product_tb SET ready_sent = '".$_POST['tracking'][$v]."', status_tracking = '1', ready_time = NOW()";
					$sql_update_payment .= ", round_update = '".$maxx_date."' , round_comment = '".$_POST['round_comment']."'";
					$sql_update_payment .= " where order_p_id = '".$_POST['trackingProId'][$v]."'";
					$result_update_payment = @mysql_query($sql_update_payment, $connect);
										
			}
		}
		
		}
		
		if($_POST['chkDone']){
			foreach ($_POST['chkDone'] as $r) {
		
			$sql_update_done = "UPDATE order_tb SET status_ready = '1'";
			$sql_update_done .= " where order_number = '".$r."'";
			$result_update_done = @mysql_query($sql_update_done, $connect);
			//echo $sql_update_done;
			
			}
		}
session_unregister('AllID');
session_unregister('AllNUMBERID');
?>		 
		<script>
			location.href='readytosent.php'; //รีเฟสหน้า
		</script>
<?php

}

if($_POST['submit2'] == 'Update' ){


if($_POST['type_submit'] == 'Search' || $_POST['type_submit3'] == 'View select order' ){
	
	
	
		if($_POST['trackingProId']){
			session_unregister('AllID');
			session_register('AllID');
			foreach ($_POST['trackingProId'] as $v) {
				
				if($_POST['tracking'][$v] == '1'){
				$_SESSION['AllID'] .= $_POST['all_id'].$v.",";
				}
				
	
			}
		
		}

		if($_POST['number_id']){
			session_unregister('AllNUMBERID');
			session_register('AllNUMBERID');
			foreach ($_POST['number_id'] as $p) {
				
				if($_POST['number'][$p] == '1'){
				$_SESSION['AllNUMBERID'] .= $_POST['all_number'].$p.",";
				}
	
			}
		
		}

}else{
	
		if($_POST['trackingProId']){
			session_unregister('AllID');
			session_register('AllID');
			foreach ($_POST['trackingProId'] as $v) {
				if($_POST['tracking'][$v] == '1'){
				$_SESSION['AllID'] .= $v.",";
				}
				
	
			}
		
		}
	
		if($_POST['number_id']){
			session_unregister('AllNUMBERID');
			session_register('AllNUMBERID');
			foreach ($_POST['number_id'] as $p) {
				
				if($_POST['number'][$p] == '1'){
				$_SESSION['AllNUMBERID'] .= $p.",";
				}
	
			}
		
		}
}
?>		 
		<script>
			location.href='readytosent.php'; //รีเฟสหน้า
		</script>
<?php

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
<title>::Crosstwelfth::</title>
<link rel="stylesheet" href="jquery_ui/development-bundle/themes/base/jquery.ui.all.css">
<script src="jquery_ui/development-bundle/jquery-1.7.2.js"></script>
<script src="jquery_ui/development-bundle/ui/jquery.ui.core.js"></script>
<script src="jquery_ui/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="jquery_ui/development-bundle/ui/jquery.ui.button.js"></script>
<script src="jquery_ui/js/jquery-ui-1.8.22.custom.min.js"></script>
<link rel="stylesheet" href="jquery_ui/development-bundle/demos/demos.css">
<script>
$(function() {
    $( "input:submit, a, button", ".demo" ).button();
    $( "a", ".demo" ).click(function() { return false; });
    
    $( ".tabs" ).tabs();
});
function chKenable3(val){
	
	if( document.getElementById('enable3').checked){

    	document.getElementById('member_f_fname').disabled = false;
    	document.getElementById('member_f_lname').disabled = false;
    	document.getElementById('member_f_id').disabled = false;
    	document.getElementById('member_f_phone').disabled = false;
	
	}else{
		
    	document.getElementById('member_f_fname').disabled = true;
    	document.getElementById('member_f_lname').disabled = true;
    	document.getElementById('member_f_id').disabled = true;
    	document.getElementById('member_f_phone').disabled = true;

	}
}


function chKenable4(val){
	
	if( document.getElementById('enable4').checked){

    	document.getElementById('member_s_fname').disabled = false;
    	document.getElementById('member_s_lname').disabled = false;
    	document.getElementById('member_s_id').disabled = false;
    	document.getElementById('member_s_phone').disabled = false;
	
	}else{
		
    	document.getElementById('member_s_fname').disabled = true;
    	document.getElementById('member_s_lname').disabled = true;
    	document.getElementById('member_s_id').disabled = true;
    	document.getElementById('member_s_phone').disabled = true;

	}
}
</script>
<!--Fancy Box-->
<!--<script type="text/javascript" src="../js/fancy_box/jquery-1.8.2.min.js"></script>-->
<script type="text/javascript" src="js/fancy_box/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="css/fancy_box/jquery.fancybox.css?v=2.1.2" media="screen" />
	
<link rel="stylesheet" type="text/css" href="css/fancy_box/jquery.fancybox-buttons.css" />
<script type="text/javascript" src="js/fancy_box/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="js/fancy_box/button-helper.js"></script>
<style type="text/css">
	.fancybox-custom .fancybox-skin {
		box-shadow: 0 0 50px #222;
	}
</style>    
<!--End Fancy Box-->
<link rel="stylesheet" href="../js/datepicker/css/ui-darkness/jquery-ui-1.10.3.custom.css" type="text/css">
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

$('#datepicker2').datepicker({
	yearRange: "1950:+0",
	changeMonth: true,
	changeYear: true,
	dateFormat: 'yy-mm-dd'

});
	
});


$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 

        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});



</script>
<link href="cssstyle.css" rel="stylesheet" type="text/css" />
</head>

<body> 
	<div class="page_container">
    <div class="shadow_l"></div>
	<div class="shadow_r"></div>  
    	<!--Header--> 
    	<div class="header">
    	<?php include('header.php');?>
        </div>
        <!--Header-->
        <div class="container_content">
            <!--Main Menu-->
            <?php include('mainmenu.php');?>
            <!--End Main Menu-->
            <div class="content_r">
            
                                	<!--Edit Navigator-->
                                   <div class="navigator">
                                        <a href="readytosent.php">อัพเดท รายการจัดส่ง</a>
                                        
                                   </div>
                                   <!--End Navigator-->            
            
            	<!--Block Frame-->
            	<div class="block_style2">
                	<div class="block_style2_top">
                    	<div class="block_style2_top-l"></div>
                        <div class="block_style2_top-r"></div>
                        <div class="block_style2_top-t">อัพเดท รายการจัดส่ง</div>
                    </div>
                    <div class="block_style2_content">

                <form method="post" enctype="multipart/form-data" name="myform">
                <input type="hidden" name="all_number" value="<?php echo $_SESSION['AllNUMBERID'];?>" />
                <input type="hidden" name="all_id" value="<?php echo $_SESSION['AllID'];?>" />
                <input type="hidden" name="type_submit" value="<?php echo $_POST['Search'];?>" />
                <input type="hidden" name="type_submit3" value="<?php echo $_POST['submit3'];?>" />
                
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">
                      <tr>
                        <td width="8%">รหัสสินค้า</td>
                        <td width="29%"><input type="text" name="product_code" value="<?php echo $_POST['product_code'];?>" /></td>
                        <td width="10%">Color </td>
                        <td width="23%">
                        
                        <select name="color">
                        <option></option>
						<?php
                        $sql_color = "SELECT distinct(name) as name FROM color_tb ";
                        $result_color = @mysql_query($sql_color, $connect);
                        $num_color =@mysql_num_rows($result_color);
                        
                        for($i=1;$i<=intval($num_color);$i++){
                        $data_color =@mysql_fetch_array($result_color);
                        ?>
                        	<option value="<?php echo $data_color['name']; ?>" <?php echo ($_POST['color'] == $data_color['name'] ? "selected=selected" : "" );?> ><?php echo $data_color['name']; ?></option>
                        <?php } ?>
                        </select>                        
                        </td>
                        <td width="6%">Size</td>
                        <td width="24%">
                        <select name="size">
                        <option></option>
						<?php
                        $sql_size = "SELECT distinct(name) as name FROM size_tb ";
                        $result_size = @mysql_query($sql_size, $connect);
                        $num_size =@mysql_num_rows($result_size);
                        
                        for($i=1;$i<=intval($num_size);$i++){
                        $data_size =@mysql_fetch_array($result_size);
                        ?>
                        	<option value="<?php echo $data_size['name']; ?>" <?php echo ($_POST['size'] == $data_size['name'] ? "selected=selected" : "" );?>><?php echo $data_size['name']; ?></option>
                        <?php } ?>
                        </select>                        
                        </td>
                      </tr>
                      <tr>
                        <td>ชื่อ</td>
                        <td><input type="text" name="order_employee" value="<?php echo $_POST['order_employee'];?>" /></td>
                        <td>เลขที่ใบสั่งซื้อ</td>
                        <td colspan="3" style=" color:#FF0000;"><input type="text" name="order_number" value="<?php echo $_POST['order_number'];?>" />
                       *ใส่เฉพาะตัวเลข ไม่ต้องใส่ -IN -PRE
                       </td>
                      </tr>
                      <tr>
                        <td>วิธีการส่ง</td>
                        <td>
                        
                        <select name="order_status" >
                          <option value="" <?php echo ($_POST['order_status'] == '' ? "selected=selected" : "");?>></option>
                          <option value="ไปรษณีย์ส่งด่วน พิเศษ ( EMS )" <?php echo ($_POST['order_status'] == 'ไปรษณีย์ส่งด่วน พิเศษ ( EMS )' ? "selected=selected" : "");?>>EMS</option>
                          <option value="ลงทะเบียน" <?php echo ($_POST['order_status'] == 'ลงทะเบียน' ? "selected=selected" : "");?>>ลงทะเบียน</option>
                        </select>
                        
                        </td>
                        <td>วันที่ชำระเงิน</td>
                        <td><input type="text" name="order_date" id="datepicker2" value="<?php echo $_POST['order_date'];?>" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>จังหวัด</td>
                        <td>
                        <select name="u_province" id="u_province" class="validate[required]">
                        <option value="">กรุณาเลือกจังหวัด</option>
                        <?php 
                        $select_country = "SELECT * FROM province order by PROVINCE_NAME";
                        $result_country =@mysql_query($select_country, $connect);
                        $num_country =@mysql_num_rows($result_country);
                        for($c=1;$c<=intval($num_country);$c++){
                        $data_country =@mysql_fetch_array($result_country);	
                        ?>
                        <option value="<?php echo $data_country['PROVINCE_NAME'];?>" <?php echo ($_POST['u_province'] == $data_country['PROVINCE_NAME'] ? "selected=selected" : "");?>><?php echo $data_country['PROVINCE_NAME'];?></option>
                        <?php } ?>
                        </select>                        
                        </td>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Search" id="Search" value="Search" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>                
                <div class="demo" style="text-align:right">
                  <table width="100%" border="0" cellspacing="5" cellpadding="0" style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">
                    <tr>
                      <td width="34%" align="center"><input type="submit" name="submit3" value="View select order" /></td>
                      <td width="34%" align="center"><span class="demo" style="text-align:center">
                        <input type="submit" name="submit2" value="Update" />
                      </span></td>
                      <td width="8%" align="right" bgcolor="#F8F8F8">Comment :</td>
                      <td width="18%" align="right" bgcolor="#F8F8F8"><textarea name="round_comment" id="round_comment"><?php echo $_POST['round_comment'];?></textarea></td>
                      <td width="6%" bgcolor="#F8F8F8"><span class="demo" style="text-align:right">
                        <input type="submit" name="submit" value="Save" />
                      </span></td>
                    </tr>
                  </table>
                </div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td bgcolor="#000000">
                    
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="table_3cell">
                      <tr>
                        <td width="5%" height="25" align="center" bgcolor="#CCCCCC">ลำดับ</td>
                        <td width="17%" align="center" bgcolor="#CCCCCC">ใบสั่งซื้อ</td>
                        <td width="13%" align="center" bgcolor="#CCCCCC">ชื่อ</td>
                        <td width="9%" align="center" bgcolor="#CCCCCC">วันที่ชำระเงิน</td>
                        <td width="54%" align="center" bgcolor="#CCCCCC"><input type="checkbox" id="selecctall"/> Selecct All</td>
                        <td width="2%" align="center" bgcolor="#CCCCCC">&nbsp;</td>
                      </tr>
                      <?php 

                                   
									if($_POST['Search'] == 'Search'){
										
										
										
										 $sql_order = "SELECT * FROM order_tb where payment_status in( '1', '3') and tranfer_status in( '1', '3')";
										 $sql_order .= " and status_ready = '0'";
							
										 if($_POST['product_code'] != '' ){
											 
											 $sql_product = "select * from order_product_tb where pro_code like '%".$_POST['product_code']."%' ";
											 
											 
												 if($_POST['size'] != '' ){
													 
												 $sql_product .= " AND order_p_size = '".$_POST['size']."'";
												 
												 }


												 if($_POST['color'] != '' ){
													$product_t = "select * from color_tb where name = '".$_POST['color']."' ";
													$result_t = @mysql_query($product_t, $connect);
													$num_t = @mysql_num_rows($result_t);
													
													for($t=1;$t<=intval($num_t);$t++){
														
													$data_t =@mysql_fetch_array($result_t);
													$colorArrName .= "'".$data_t['c_code']."',";
													
													}
													
													 $colorArrName =  substr($colorArrName,0,-1);
													
												 $sql_product .= " AND order_p_color in (".$colorArrName.") ";
												 
												 }
										 
											 $result_product =@mysql_query($sql_product, $connect);
											 $num_product =@mysql_num_rows($result_product);

											 for($t=1;$t<=intval($num_product);$t++){
												$data_product=@mysql_fetch_array($result_product);
												
												$all_number .=  "'".$data_product['order_number']."',";
											 }
										 $all_number = substr($all_number,0,-1);
										 $sql_order .= " AND order_number in (".$all_number.")";
										 
										 }
										 

										 if($_POST['order_employee'] != '' ){
											 
										 $sql_order .= " AND order_employee like '%".$_POST['order_employee']."%'";
										 
										 }
										 
										 if($_POST['order_status'] != '' ){
											 
										 $sql_order .= " AND order_transport like '%".$_POST['order_status']."%'";
										 
										 }
							
										 if($_POST['u_province'] != '' ){
											 
										 $sql_order .= " AND order_province like '%".$_POST['u_province']."%'";
										 
										 }
										 if($_POST['order_date'] != '' ){
											 
										 $sql_order .= " AND payment_date like '%".$_POST['order_date']."%'";
										 
										 }
										 if($_POST['order_number'] != '' ){
											 
										 explode(',',$_POST['order_number']);
											 
										 $sql_order .= " AND order_number like '%".$_POST['order_number']."%' ";
										 
										 }
										 $sql_order .= " GROUP BY order_number ORDER BY date_in ASC";
									}elseif($_POST['submit3']){
										
										$arr_numId = explode(',',$_SESSION['AllNUMBERID']);
										
										foreach ($arr_numId as $r) {


												$arr_num .= "'".$r."',";


								
										}
										
										$arr_num = substr($arr_num,0,-1);
										 
										$sql_order = "SELECT * FROM order_tb where payment_status in( '1', '3') and tranfer_status in( '1', '3') and status_ready = '0'";
										$sql_order .= " AND order_number in (".$arr_num.")";
										$sql_order .= " GROUP BY order_number ORDER BY payment_date ASC";
										
										//echo $sql_order;


									}else{

									
                                    $sql_order = "SELECT * FROM order_tb where payment_status in( '1', '3') and tranfer_status in( '1', '3') and status_ready = '0'";
									$sql_order .= " GROUP BY order_number ORDER BY payment_date ASC";
									
									}
								   
								    //echo $sql_product;
								   
								    $result_order =@mysql_query($sql_order, $connect);
                                    $num_order =@mysql_num_rows($result_order);
                                    $num_page = 1;
									
									$count_product = 1;
                                    for($i=1;$i<=intval($num_order);$i++){
                                    $data_order=@mysql_fetch_array($result_order);
									
									
									if($data_order['order_status'] != 0){

                                    $sql_user = "SELECT * FROM user_tb where u_id = '".$data_order['u_id']."' ";
                                    $result_user2 =@mysql_query($sql_user, $connect);
                                    $data_user=@mysql_fetch_array($result_user2);
									
									
									

                                    ?>
                      <tr>
                        <td height="25" align="center" valign="top" bgcolor="#F5F5F5">
						
						<?php 
							echo $num_page;
							$aaa = $f+$num_page;
                        
							$arr_number_id = explode(',',$_SESSION['AllNUMBERID']);
							$chkOk = '';
							if(in_array($data_order['order_number'], $arr_number_id)){
								$chkOk = 'ok';
							}
							?>

                        <input type="checkbox" name="number[<?php echo $data_order['order_number'];?>]" value="1" <?php echo ($chkOk == 'ok' ? "checked=checked" : "" );?>/>
                        <input type="hidden" name="number_id[<?php echo $data_order['order_number'];?>]" value="<?php echo $data_order['order_number'];?>" />
                        </td> <!-- 1 -->
                        <td valign="top" bgcolor="#F5F5F5">
								<?php 
                            
                                $sql_insert_order2 = "select * from order_tb where order_number = '".$data_order['order_number']."'";
                                $result_insert_order2 = @mysql_query($sql_insert_order2, $connect);
                                $num_order2 = @mysql_num_rows($result_insert_order2);
                                $data_order2= @mysql_fetch_array($result_insert_order2);
								
                                
                                if($num_order2 == 2){ 
                                    $val_order1 = $data_order2['order_number']."-IN";
                                    $val_order2 = $data_order2['order_number']."-PRE";
									if($data_order2['order_group'] != '' ){
										$group = "Y";
									}
                                    
                                    $sql_order1 = "select * from order_tb where order_number = '".$data_order2['order_number']."' and order_type = 'IN' ";
                                    $result_order1 = @mysql_query($sql_order1, $connect);
                                    $data_o1= @mysql_fetch_array($result_order1);
									
                                    $order_group1 = $data_o1['order_number']."-IN";
                                    $order_total1 = $data_o1['order_total'];
                                    $order_id1 = $data_o1['order_id'];
                                    $order_tran1 = $data_o1['order_transport_status'];
                                    $order_dis1 = $data_o1['order_promotion'];
                                    $order_transport1 = $data_o1['order_transport'];
									
                                    
                                    
                                    

                                    $sql_order2 = "select * from order_tb where order_number = '".$data_order2['order_number']."' and  order_type = 'PRE' ";
                                    $result_order2 = @mysql_query($sql_order2, $connect);
                                    $data_o2= @mysql_fetch_array($result_order2);
                                    
                                    $order_group2 = $data_o2['order_group'];
                                    $order_total2 = $data_o2['order_total'];
                                    $order_id2 = $data_o2['order_id'];
                                    $order_tran2 = $data_o2['order_transport_status'];
                                    $order_dis2 = $data_o2['order_promotion'];
                                    $order_transport2 = $data_o2['order_transport'];

                                    $total_order = $order_total1 + $order_total2;
                                    
                                    $discount = $total_order - ($total_order * $order_dis1 / 100);
                                    
                                    $total_price = $discount + $order_tran1 + $order_tran2;
                                    
                                    
                                    $sql_update2 = "select * from order_product_tb where order_number = '".$data_order2['order_number']."'";
                                    $result_update2 = @mysql_query($sql_update2, $connect);
                                    $num_update2 =@mysql_num_rows($result_update2);
                                    
                                    for($i5=0;$i5<intval($num_update2);$i5++){
                                        
                                    $data_update2 =@mysql_fetch_array($result_update2);
                                    
                                    $arrProduct[$exV2][$i5] = $data_update2['pro_code'].":".$data_update2['order_p_color'].":".$data_update2['order_p_size'];
                                        
                                    }

                                    $sql_traking1 = "select * from order_product_tb where order_number = '".$data_order2['order_number']."'";
                                    $sql_traking1 .= " round_update = '0'";
                                    $result_traking1 = @mysql_query($sql_traking1, $connect);
                                    $num_traking1 =@mysql_num_rows($result_traking1);
                                    
                                    
                                    for($i7=0;$i7<intval($num_traking1);$i7++){
                                        
                                        $data_traking1 =@mysql_fetch_array($result_traking1);
                                    
                                        $arrProduct2[$exV2][$i7] = $data_order2['order_number'];
                                        
                                    }
                                }else{
                                    $order_group1 = $data_order2['order_number']."-".$data_order2['order_type'];
                                    $val_order1 = $data_order2['order_number']."-".$data_order2['order_type'];
                                    $order_total1 = $data_order['order_total'];
                                    $order_id1 = $data_order['order_id'];
                                    $order_dis1 = $data_order['order_promotion'];
                                    $order_transport1 = $data_order['order_transport'];

                                    $discount = $order_total1 - ($order_total1 * $order_dis1 / 100);

                                    $val_order2 = '';
                                    $total_price = $discount  + $data_order2['order_transport_status'];
                                    
                                    $sql_update2 = "select * from order_product_tb where order_number = '".$data_order2['order_number']."'";
                                    $result_update2 = @mysql_query($sql_update2, $connect);
                                    $num_update2 =@mysql_num_rows($result_update2);
                                    
                                    
                                    for($i5=0;$i5<intval($num_update2);$i5++){
                                        
                                    $data_update2 =@mysql_fetch_array($result_update2);
                                    
                                    $arrProduct[$exV2][$i5] = $data_update2['pro_code'].":".$data_update2['order_p_color'].":".$data_update2['order_p_size'];
                                        
                                    }
                                    
                                    
                                    $sql_traking1 = "select * from order_product_tb where order_number = '".$data_order2['order_number']."'";
                                    $sql_traking1 .= "and  round_update = '0'";
                                    $result_traking1 = @mysql_query($sql_traking1, $connect);
                                    $num_traking1 =@mysql_num_rows($result_traking1);
                                    
                                    
                                    for($i7=0;$i7<intval($num_traking1);$i7++){
                                        
                                        $data_traking1 =@mysql_fetch_array($result_traking1);
                                    
                                        $arrProduct2[$exV2][$i7] = $data_order2['order_number'];
                                        
                                    }
                                    

                                }


                            
                          ?>
                          <a href="<?php echo $url_pic;?>/tmp/<?php echo $val_order1;?>.pdf" target="_blank"><?php echo $val_order1." ".$order_transport1;?></a>
                          <?php if($val_order2 != '' ){?>
                          <div style="border-top:#ffffff 1px solid;"> <a href="<?php echo $url_pic;?>/tmp/<?php echo $val_order2;?>.pdf" target="_blank">
						  <?php 
						  echo $val_order2." ".$order_transport2;

						  if($order_group2 != $order_group1){

							  echo "<br><b>(ส่งแยกกัน)</b>";

						  }
							  
						  
						  ?></a> </div>
                          <?php } ?>
                        </td><!-- 2 -->
                        <td align="center" valign="top" bgcolor="#F5F5F5">
						
						<?php 
						
						$name = explode('<br>',$data_order['order_address2']);
						
						echo str_replace('ชื่อ : ','',$name[0])."<br>";
						echo str_replace('จังหวัด : ','',$name[2])."<br>";
						echo str_replace('เบอร์โทรศัพท์ : ','',$name[4])."<br>";

						?>
                        
                        
                        
                        </td><!-- 3 -->
                        <td align="center" valign="top" bgcolor="#F5F5F5"><?php echo $data_order['payment_date'];?></td><!-- 4 -->
                        <td valign="top" bgcolor="#F5F5F5"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                          <tr height="20">
                            <td width="150" bgcolor="#CCCCCC">รหัสสินค้า</td>
                            <td width="40" align="center" bgcolor="#CCCCCC">มีสินค้า</td>
                            <td width="40" align="center" bgcolor="#CCCCCC">สั่งสินค้า</td>
                            <td bgcolor="#CCCCCC">&nbsp;</td>
                            <td bgcolor="#CCCCCC">&nbsp;</td>
                          </tr>
                          <?php 
						  $num_readySend = 0;
						  $all_P = 0;
                                           //print_r($arrProduct);
                                            foreach($arrProduct as $y){
                                                foreach($y as $g){

                                                
                                                $proEx = explode(':',$g);
                                                $sql_update3 = "select * from order_product_tb where order_number = '".$data_order['order_number']."'";
                                                $sql_update3 .= " and pro_code  = '".$proEx[0]."' and order_p_size  = '".$proEx[2]."'";
												$sql_update3 .= " and order_p_color  = '".$proEx[1]."'";
                                                $result_update3 = @mysql_query($sql_update3, $connect);
                                                $num_update3 =@mysql_num_rows($result_update3);
                                                $data_update3 =@mysql_fetch_array($result_update3);

                                                if($num_update3 != 0){
                                                    
                                                $sql_color = "select name from color_tb where c_code = '".$data_update3['order_p_color']."' ";
                                                $result_color = @mysql_query($sql_color, $connect);
                                                $data_color =@mysql_fetch_array($result_color);
												
												$sql_product_hand = "SELECT * FROM product_tb WHERE pid = '".$data_update3['pro_id']."' ";
												$result_product_hand =@mysql_query($sql_product_hand, $connect);
												$data_product_hand =@mysql_fetch_array($result_product_hand);
												
												$product_stock = $data_product_hand['p_stock'];
												//echo "p_stock ".$data_product_hand['p_stock']."<br>";
												
												$product_temp_stock = 0;
												
												$sql_temp_order_hand = "SELECT * FROM temp_order_product WHERE pid = '".$data_update3['pro_id']."' and buy_status = 'INSTOCK' ";
												$result_temp_order_hand =@mysql_query($sql_temp_order_hand, $connect);
												$num_temp_order_hand =@mysql_num_rows($result_temp_order_hand);
												for ($t_h=1; $t_h<=$num_temp_order_hand; $t_h++) {
													$data_temp_order_hand =@mysql_fetch_array($result_temp_order_hand);
													
													$product_temp_stock += $data_temp_order_hand['product_number'];
													
												}
												//echo "product_temp_stock ".$product_temp_stock."<br>";
											$product_temp_stock_pre = 0;
											$sql_temp_order_hand_pre = "SELECT * FROM temp_order_product WHERE pid = '".$data_update3['pro_id']."' and buy_status = 'PREORDER' ";
											$sql_temp_order_hand_pre .= "AND sent_status = 'READY'";
											$result_temp_order_hand_pre =@mysql_query($sql_temp_order_hand_pre, $connect);
											$num_temp_order_hand_pre =@mysql_num_rows($result_temp_order_hand_pre);
											
											for ($t_h2=1; $t_h2<=$num_temp_order_hand_pre; $t_h2++) {
												$data_temp_order_hand_pre =@mysql_fetch_array($result_temp_order_hand_pre);
												
												$product_temp_stock_pre += $data_temp_order_hand_pre['product_number'];
												
											}

											$product_temp_stock_spare = 0;
											$sql_temp_order_hand_spare = "SELECT * FROM temp_order_product WHERE pid = '".$data_update3['pro_id']."' and buy_status = 'SPARE' ";
											$sql_temp_order_hand_spare .= "AND sent_status = 'READY'";
											$result_temp_order_hand_spare =@mysql_query($sql_temp_order_hand_spare, $connect);
											$num_temp_order_hand_spare =@mysql_num_rows($result_temp_order_hand_spare);
											
											for ($t_h3=1; $t_h3<=$num_temp_order_hand_spare; $t_h3++) {
												$data_temp_order_hand_spare =@mysql_fetch_array($result_temp_order_hand_spare);
												
												$product_temp_stock_spare += $data_temp_order_hand_spare['product_number'];
												
											}
												$product_send = 0;
												
												$sql_order_product_hand = "SELECT * FROM order_product_tb WHERE "; //order_number = '".$data_update3['order_number']."'
												$sql_order_product_hand .= " pro_id = '".$data_update3['pro_id']."' ";
												$result_order_product_hand =@mysql_query($sql_order_product_hand, $connect);
												$num_order_product_hand =@mysql_num_rows($result_order_product_hand);
												for ($o_h=1; $o_h<=$num_order_product_hand; $o_h++) {
													$data_order_product_hand =@mysql_fetch_array($result_order_product_hand);
													
													if ($data_order_product_hand['tracking_number'] != "") {
														$product_send += $data_order_product_hand['order_p_stock'];
													}

												}
												
												
												/*echo "product_stock ".$product_stock."<br>";
												echo "product_temp_stock ".$product_temp_stock."<br>";
												echo "product_temp_stock_pre ".$product_temp_stock_pre."<br>";*/
												
												//if ($data_update3['order_type'] == "IN") {
													/*echo $product_stock."<br>";
													echo $product_temp_stock."<br>";
													echo $product_temp_stock_pre."<br>";
													echo $product_temp_stock_spare."<br>";
													echo $product_send."<br>xxx";*/
													$product_on_hand = ($product_stock + $product_temp_stock + $product_temp_stock_pre + $product_temp_stock_spare) - $product_send;
													//echo "(".$product_stock." + ".$product_temp_stock.") - ".$product_send;
												//} else if ($data_update3['order_type'] == "PRE") {
													//$product_on_hand = 0;
												//}

												$order_p_stock = 0;

												$sql_product_in_order = "SELECT * FROM order_product_tb WHERE order_number = '".$data_update3['order_number']."'";
												$sql_product_in_order .= " AND pro_id = '".$data_update3['pro_id']."' ";
												$result_product_in_order =@mysql_query($sql_product_in_order, $connect);
												$num_product_in_order =@mysql_num_rows($result_product_in_order);
												for ($o_h2=1; $o_h2<=$num_product_in_order; $o_h2++) {
													$data_product_in_order =@mysql_fetch_array($result_product_in_order);
													
													$order_p_stock += $data_product_in_order['order_p_stock'];
														

												}
                                            ?>
                          <tr height="20">
                            <td width="126" bgcolor="#FFFFFF"><?php echo $data_update3['pro_code']." ".$data_color['name']." ".$data_update3['order_p_size'].$data_product_hand['pro_code'];?></td>
                            <td width="48" align="center" bgcolor="#FFFFFF"><span style="color:#FF9900; font-weight:bold;" title="<?php echo $data_update3['pro_id'];?>"><?php echo $product_on_hand;?></span></td>
                            <td width="56" align="center" bgcolor="#FFFFFF">
											  <?php
											  $sql_temp = "select * from temp_order_product where order_number = '".$data_order['order_number']."' ";
                                                $sql_temp .= "and pid  = '".$data_update3['pro_id']."'";
                                                $result_temp = @mysql_query($sql_temp, $connect);
                                                $data_temp =@mysql_fetch_array($result_temp);

                                                if($data_temp['sent_status'] == 'READY'){
                                                    $show_status =  "<font color=#00CC00>พร้อมส่ง</font>";
													$all_P = $all_P + 1;
                                                }else{
													$all_P = $all_P + 1;
													$kard = $data_temp['product_number'] - $data_temp['product_recive'];
													if($kard > 1 ){
													$disa = 1;
                                                    $show_status =  "<font color=#FF0000>รอของ ขาด ".$kard." ตัว</font>";
													}else{
													$disa = 1;
                                                    $show_status =  "<font color=#FF0000>รอของ ".$kard." ตัว</font>";
													}
                                                }
												echo " <b>".$order_p_stock."</b>";
                                            ?></td>
                            <td width="74" bgcolor="#FFFFFF"><?php echo $show_status; ?></td>
                            <td width="38" bgcolor="#FFFFFF">
							<?php if($data_update3['ready_sent'] == '0'){
								
							$arr_id = explode(',',$_SESSION['AllID']);
							$chk = '';
							if(in_array($data_update3['order_p_id'], $arr_id)){
								$chk = 'ok';
							}
							?>
                              <input type="checkbox" name="tracking[<?php echo $data_update3['order_p_id'];?>]" value="1" <?php echo ($disa == '1' ? "disabled=disabled" : "" );?>  <?php echo ($chk == 'ok' ? "checked=checked" : "" );?>   />
                            <?php }else{
							$num_readySend = $num_readySend+1;
							}
							?>
                            </td>
                          </tr>
                          <tr>
                            <input type="hidden" name="trackingProId[<?php echo $data_update3['order_p_id'];?>]" value="<?php echo $data_update3['order_p_id'];?>"/>
                            <?php $disa=0 ;} }  }
												
												
												 unset($arrProduct);
												 
												
												 ?>
                          </tr>
                          <tr height="20" align="right">
                            <td height="25" colspan="5" align="right" bgcolor="#F8F8F8">
							
							 <?php
                             //echo $all_P." = ".$num_readySend;
                             if(  $all_P == $num_readySend ){ ?>
                             <input type="checkbox" class="checkbox1" name="chkDone[<?php echo $data_order['order_number'];?>]" value="<?php echo $data_order['order_number'];?>" /> 
                             <font color=red><b>DONE</b></font>
                             <?php
                             //echo "<a href=?done=".$data_order['order_number']."><font color=red><b>DONE</b></font>&nbsp;&nbsp; "; 
							 }
                             ?></td>
                          </tr>
                        </table></td><!-- 5 -->
                        <td valign="top" bgcolor="#F5F5F5">
                            <a href="order_comment.php?n=<?php echo $data_order['order_number'];?>" target="_blank">  
                            <?php if($data_order['order_comment'] == '' ){?>  
                            <img src="images/1.png" width="14" height="14" />
                            <?php }else{ ?>
                            <img src="images/2.png" width="14" height="14" />
                            <?php } ?>
                            </a>
                        </td><!-- 6 -->
                      </tr>
                      <?php  $num_page++; } $val_order2 == '' ; } ?>
                    </table></td>
                  </tr>
                </table>
                </form>
                    </div>
                    <div class="block_style2_bottom">
                        <div class="block_style2_bottom-l"></div>
                        <div class="block_style2_bottom-r"></div>
                    </div>                    
                </div>
                <!-- End Block Frame-->

            </div>
            <div class="clear"></div>                        
		</div>            
            







        </div>
<!--Page Footer-->

<?php 
include('footer.php');?>

<!--End Page Footer-->        
    </div>
</div>    
</body>
</html>
