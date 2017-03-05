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
					$sql_update_payment .= ", round_update = '".$maxx_date."' where order_p_id = '".$_POST['trackingProId'][$v]."'";
					$result_update_payment = @mysql_query($sql_update_payment, $connect);
										
			}
		}
		
		}
	
?>		 
		<script>
			location.href='readytosent.php'; //รีเฟสหน้า
		</script>
<?php

}
if($_GET['done'] != '' ){
	


	$sql_update_done = "UPDATE order_tb SET status_ready = '1'";
	$sql_update_done .= " where order_number = '".$_GET['done']."'";
	$result_update_done = @mysql_query($sql_update_done, $connect);
	//echo $sql_update_done;
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
                                        <a href="readytosent.php">Update สินค้าพร้อมส่ง</a>
                                        
                                   </div>
                                   <!--End Navigator-->            
            
            	<!--Block Frame-->
            	<div class="block_style2">
                	<div class="block_style2_top">
                    	<div class="block_style2_top-l"></div>
                        <div class="block_style2_top-r"></div>
                        <div class="block_style2_top-t">Update สินค้าพร้อมส่ง</div>
                    </div>
                    <div class="block_style2_content">

                <form method="post" enctype="multipart/form-data" name="myform">
                <div class="demo" style="text-align:right">
                <input type="submit" name="submit" value="Save" />
                </div>                                   

    

         	<table width="100%" border="0" cellpadding="0" cellspacing="1" class="table_3cell">
                                      <tr>
                                        <td width="16%" height="25" align="center" bgcolor="#CCCCCC">ลำดับ</td>
                                        <td width="26%" align="center" bgcolor="#CCCCCC">ใบสั่งซื้อ</td>
                                        <td width="23%" align="center" bgcolor="#CCCCCC">ชื่อ</td>
                                        <td width="35%" align="center" bgcolor="#CCCCCC">&nbsp;</td>
                                      </tr>
									<?php 

                                    $sql_order = "SELECT * FROM order_tb where payment_status in( '1', '3') and tranfer_status in( '1', '3') and status_ready = '0' GROUP BY order_number ORDER BY date_in desc";
                                    $result_order =@mysql_query($sql_order, $connect);
                                    $num_order =@mysql_num_rows($result_order);
                                    
                                    for($i=1;$i<=intval($num_order);$i++){
                                    $data_order=@mysql_fetch_array($result_order);
                                    

                                    $sql_user = "SELECT * FROM user_tb where u_id = '".$data_order['u_id']."' ";
                                    $result_user2 =@mysql_query($sql_user, $connect);
                                    $data_user=@mysql_fetch_array($result_user2);
									
									
									

                                    ?>
                                      <tr>
                                        <td height="25" align="center" valign="top" bgcolor="#F5F5F5"> <?php echo $f+$i;?></td>
                                        <td valign="top" bgcolor="#F5F5F5"><?php 
												
												
													$sql_insert_order2 = "select * from order_tb where order_number = '".$data_order['order_number']."'";
													$result_insert_order2 = @mysql_query($sql_insert_order2, $connect);
													$num_order2 = @mysql_num_rows($result_insert_order2);
													$data_order2= @mysql_fetch_array($result_insert_order2);
													
													if($num_order2 == 2){ 
														$val_order1 = $data_order2['order_number']."-IN";
														$val_order2 = $data_order2['order_number']."-PRE";
														
														$sql_order1 = "select * from order_tb where order_number = '".$data_order2['order_number']."' and order_type = 'IN' ";
														$result_order1 = @mysql_query($sql_order1, $connect);
														$data_o1= @mysql_fetch_array($result_order1);
														
														$order_total1 = $data_o1['order_total'];
														$order_id1 = $data_o1['order_id'];
														$order_tran1 = $data_o1['order_transport_status'];
														$order_dis1 = $data_o1['order_promotion'];
														
														
														

														$sql_order2 = "select * from order_tb where order_number = '".$data_order2['order_number']."' and  order_type = 'PRE' ";
														$result_order2 = @mysql_query($sql_order2, $connect);
														$data_o2= @mysql_fetch_array($result_order2);
														
														$order_total2 = $data_o2['order_total'];
														$order_id2 = $data_o2['order_id'];
														$order_tran2 = $data_o2['order_transport_status'];
														$order_dis2 = $data_o2['order_promotion'];
														
														$total_order = $order_total1 + $order_total2;
														
														$discount = $total_order - ($total_order * $order_dis1 / 100);
														
														$total_price = $discount + $order_tran1 + $order_tran2;
														
														
														$sql_update2 = "select * from order_product_tb where order_number = '".$data_order2['order_number']."'";
														$sql_update2 .= " and tracking_number = '' and  ready_sent = '0' ";
														$result_update2 = @mysql_query($sql_update2, $connect);
														$num_update2 =@mysql_num_rows($result_update2);
														
														for($i5=0;$i5<intval($num_update2);$i5++){
															
														$data_update2 =@mysql_fetch_array($result_update2);
														
															$arrProduct[$exV2][$i5] = $data_update2['pro_code'].":".$data_update2['order_p_color'];
															
														}

														$sql_traking1 = "select * from order_product_tb where order_number = '".$data_order2['order_number']."'";
														$sql_traking1 .= " and tracking_number = '' and  round_update = '0'";
														$result_traking1 = @mysql_query($sql_traking1, $connect);
														$num_traking1 =@mysql_num_rows($result_traking1);
														
														
														for($i7=0;$i7<intval($num_traking1);$i7++){
															
															$data_traking1 =@mysql_fetch_array($result_traking1);
														
															$arrProduct2[$exV2][$i7] = $data_order2['order_number'];
															
														}
													}else{
														$val_order1 = $data_order2['order_number']."-".$data_order2['order_type'];
														$order_total1 = $data_order['order_total'];
														$order_id1 = $data_order['order_id'];
														$order_dis1 = $data_order['order_promotion'];
														
														$discount = $order_total1 - ($order_total1 * $order_dis1 / 100);

														$val_order2 = '';
														$total_price = $discount  + $data_order2['order_transport_status'];
														
														$sql_update2 = "select * from order_product_tb where order_number = '".$data_order2['order_number']."'";
														$sql_update2 .= " and tracking_number = '' and  ready_sent = '0' ";
														$result_update2 = @mysql_query($sql_update2, $connect);
														$num_update2 =@mysql_num_rows($result_update2);
														
														
														for($i5=0;$i5<intval($num_update2);$i5++){
															
														$data_update2 =@mysql_fetch_array($result_update2);
														
															$arrProduct[$exV2][$i5] = $data_update2['pro_code'].":".$data_update2['order_p_color'];
															
														}
														
														
														$sql_traking1 = "select * from order_product_tb where order_number = '".$data_order2['order_number']."'";
														$sql_traking1 .= " and tracking_number = '' and  round_update = '0'";
														$result_traking1 = @mysql_query($sql_traking1, $connect);
														$num_traking1 =@mysql_num_rows($result_traking1);
														
														
														for($i7=0;$i7<intval($num_traking1);$i7++){
															
															$data_traking1 =@mysql_fetch_array($result_traking1);
														
															$arrProduct2[$exV2][$i7] = $data_order2['order_number'];
															
														}
														

													}

												
											  ?>
                                                    <a href="<?php echo $url_pic;?>/tmp/<?php echo $val_order1;?>.pdf" target="_blank"><?php echo $val_order1;?></a>
                                                    <?php if($val_order2 != '' ){?>
                                                    <div style="border-top:#ffffff 1px solid;">
                                                    
                                                    <a href="<?php echo $url_pic;?>/tmp/<?php echo $val_order2;?>.pdf" target="_blank"><?php echo $val_order2;?></a>
                                                    
										  </div>
										<?php } ?></td>
                                        <td align="center" valign="top" bgcolor="#F5F5F5">
                                         <?php echo $data_user['u_fname']." ".$data_user['u_lname'];?><br /><?php echo $data_user['u_mobi'];?>
                                        </td>
                                        <td align="left" valign="top" bgcolor="#F5F5F5">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          
											<?php 
                                           //print_r($arrProduct);
                                            foreach($arrProduct as $y){
												
                                                foreach($y as $g){
                                                
                                                $proEx = explode(':',$g);
                                                $sql_update3 = "select * from order_product_tb where order_number = '".$data_order['order_number']."'";
                                                $sql_update3 .= " and pro_code  = '".$proEx[0]."' ";
												$sql_update3 .= "and order_p_color  = '".$proEx[1]."' and tracking_number = ''  and  ready_sent = '0' ";
                                                $result_update3 = @mysql_query($sql_update3, $connect);
                                                $num_update3 =@mysql_num_rows($result_update3);
                                                $data_update3 =@mysql_fetch_array($result_update3);
echo $sql_update3;
                                                if($num_update3 != 0){
                                                    
                                                $sql_color = "select name from color_tb where c_code = '".$data_update3['order_p_color']."' ";
                                                $result_color = @mysql_query($sql_color, $connect);
                                                $data_color =@mysql_fetch_array($result_color);
                                            ?>
                                           
                                            
                                                 
                                            <tr>
                                              <td width="150"><?php echo $data_update3['pro_code']." ".$data_update3['order_p_size']." ".$data_color['name'];?></td>
                                              <td>
                                              <?php
											  $sql_temp = "select * from temp_order_product where order_number = '".$data_order['order_number']."' ";
                                                $sql_temp .= "and pid  = '".$data_update3['pro_id']."'";
                                                $result_temp = @mysql_query($sql_temp, $connect);
                                                $data_temp =@mysql_fetch_array($result_temp);

                                                if($data_temp['sent_status'] == 'READY'){
                                                    echo "<font color=#00CC00>พร้อมส่ง</font>";
                                                }else{
													
													$kard = $data_temp['product_number'] - $data_temp['product_recive'];
													if($kard > 1 ){
                                                    echo "<font color=#FF0000>รอของ ขาด ".$kard." ตัว</font>";
													}else{
                                                    echo "<font color=#FF0000>รอของ ".$kard." ตัว</font>";
													}
                                                }
                                            ?>
                                              </td>
                                              <td width="20"><input type="checkbox" name="tracking[<?php echo $data_update3['order_p_id'];?>]" value="1" /></td>
                                            <tr>
                                            <input type="hidden" name="trackingProId[<?php echo $data_update3['order_p_id'];?>]" value="<?php echo $data_update3['order_p_id'];?>"/>
                                            <?php } }  }
												
												
												 unset($arrProduct);
												 
												foreach($arrProduct2 as $t){
													foreach($t as $m){
													
													$sql_update4 = "select * from order_product_tb where order_number = '".$m."'";
													$sql_update4 .= " and tracking_number = ''  and  round_update = '0' ";
													$result_update4 = @mysql_query($sql_update4, $connect);
													$num_update4 =@mysql_num_rows($result_update4);
													
												} }
												 
												 
												 //echo $num_update4;
												 if(  $num_update4 == '' || $num_update4 == '0' ){ 
												 echo "<a href=?done=".$data_order['order_number']."><font color=#00CC00><center><b>DONE</b></center></font>"; }
												 unset($arrProduct2);
												 $num_update4 = 0;
												 ?>
                                        </table></td>
                                      </tr>
									  <?php $val_order2 == '' ;} ?>
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

<?php include('footer.php');?>

<!--End Page Footer-->        
    </div>
</div>    
</body>
</html>
