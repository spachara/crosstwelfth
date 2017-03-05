<?php
session_start();
require_once '../dbconnect.inc';

session_unregister('session_SubmitGrandTotal');
session_register("session_tranCostPlusHidden");
session_register("session_grandTotalHidden");
session_register("session_grandTotalPreHidden");
session_register("session_TotalNumPre");
session_register("session_TotalNumGrand");
session_register("session_tranCostPreChk");
session_register("session_SubmitGrandTotal");
session_register("session_tranCostPlusCal");
session_register("session_realShip");
session_register("session_realShipPre");
session_register("session_PointDis");
session_register("session_CodeDis");
session_register("session_CodeDisHidden");
session_register("session_PromotionDis");

$_SESSION['session_tranCostPlusHidden'] = $_POST['tranCostPlusHidden'];



$_SESSION['session_TotalNumPre'] = $_POST['TotalNumPre'];
$_SESSION['session_TotalNumGrand'] = $_POST['TotalNumGrand'];
$_SESSION['session_tranCostPlusCal'] = $_POST['tranCostPlusCal'];
$_SESSION['session_PointDis'] = $_POST['PointDis'];
$_SESSION['session_CodeDis'] = $_POST['CodeDis'];

if($_POST['CodeDis'] != '' ){
$_SESSION['session_CodeDisHidden'] = $_POST['CodeDis'];
}else{
$_SESSION['session_CodeDisHidden'] = $_POST['CodeDisHidden'];
}
$_SESSION['session_PromotionDis'] = $_POST['PromotionDis'];


session_register("session_shipping_send_free");
session_register("session_shipping_name");
session_register("session_shipping_name_th");
session_register("shipping");
session_register("shipping_id");
session_register("product_total");
session_register("grand_total");


session_register("session_pre_shipping_send_free");
session_register("session_pre_shipping_name");
session_register("session_pre_shipping_name_th");
session_register("shipping_pre");
session_register("shipping_pre_id");
session_register("product_total_pre");
session_register("grand_total_pre");
session_register("groupDelivery");
session_register("shipping_p");

$_SESSION['groupDelivery'] = $_POST['groupDelivery'];


$prd_del = $_GET['prd_del'];
$prd_pre_del = $_GET['prd_pre_del'];

$calculate = $_POST['calculate'];
$prd_num = $_POST['prd_num'];
$prd_pre_num = $_POST['prd_pre_num'];
$complete = $_POST['complete'];




if($_SESSION['session_id']){
	
	if($calculate){
	
	foreach($_SESSION['session_id'] as $key=> $i){
		
		if (@!in_array($_SESSION['session_id'][$i],$prd_del)) {
		
		$temp_id[$i]=$_SESSION['session_id'][$i];
		$temp_name_th[$i]=$_SESSION['session_name_th'][$i];
		$temp_name_eng[$i]=$_SESSION['session_name_eng'][$i];
		$temp_price[$i]=$_SESSION['session_price'][$i];
		$temp_num[$i]=$prd_num[$i];
		
			if(($prd_num[$i] == '0' || $prd_num[$i] == '')  && $_GET['prd_remove'] == '' && $_GET['pre_remove'] == '' ){
	
					$temp_id[$i]='';
					$temp_name_th[$i]='';
					$temp_name_eng[$i]='';
					$temp_price[$i]='';
					$temp_num[$i]='';
			$key2 = array_search($_SESSION['session_id'][$i], $_SESSION['session_id']);
			if($key2 !== FALSE) { unset($_SESSION['session_id'][$_SESSION['session_id'][$i]]);unset($_SESSION['session_num'][$_SESSION['session_id'][$i]]);}
			}
			

			$grandTotalHidden = $grandTotalHidden + ($prd_num[$i] * $_SESSION['session_price'][$i]);
			$count_product = $count_product + $prd_num[$i];
		}
		
	}
	}else{
			foreach($_SESSION['session_id'] as $key=> $i){
				
				
					
				$temp_id[$i]=$_SESSION['session_id'][$i];
				$temp_name_th[$i]=$_SESSION['session_name_th'][$i];
				$temp_name_eng[$i]=$_SESSION['session_name_eng'][$i];
				$temp_price[$i]=$_SESSION['session_price'][$i];
				
				$temp_num[$i]=$prd_num[$i];
				
					if(($prd_num[$i] == '0' || $prd_num[$i] == '') && $_GET['prd_remove'] == '' && $_GET['pre_remove'] == '' ){
			
							$temp_id[$i]='';
							$temp_name_th[$i]='';
							$temp_name_eng[$i]='';
							$temp_price[$i]='';
							$temp_num[$i]='';
			$key2 = array_search($_SESSION['session_id'][$i], $_SESSION['session_id']);
			if($key2 !== FALSE) { unset($_SESSION['session_id'][$_SESSION['session_id'][$i]]);unset($_SESSION['session_num'][$_SESSION['session_id'][$i]]);}

			}
			
			
			$grandTotalHidden = $grandTotalHidden + ($prd_num[$i] * $_SESSION['session_price'][$i]);
			$count_product = $count_product + $prd_num[$i];
			}
			
		
	}
	


	$_SESSION['session_grandTotalHidden'] = $grandTotalHidden;
    $_SESSION['session_SubmitGrandTotal'] = $_SESSION['session_grandTotalHidden'];	
	

	if($_GET['prd_remove'] == '' && $_GET['pre_remove'] == '' ){
	foreach($_SESSION['session_id'] as $key2=> $i2){
		
		$_SESSION['session_id'][$i2]=$temp_id[$i2];
		$_SESSION['session_name_th'][$i2]=$temp_name_th[$i2];
		$_SESSION['session_name_eng'][$i2]=$temp_name_eng[$i2];
		
		$_SESSION['session_price'][$i2]=$temp_price[$i2];
		
		
		$_SESSION['session_num'][$i2]=$temp_num[$i2];
		
		$total_price_cal += $_SESSION['session_price'][$i2] * $_SESSION['session_num'][$i2];
		

	}
	}
	
	if($_GET['prd_remove']){
	$key2 = array_search($_GET['prd_remove'], $_SESSION['session_id']);
	if($key2 !== FALSE){ unset($_SESSION['session_id'][$_GET['prd_remove']]);unset($_SESSION['session_num'][$_GET['prd_remove']]);}
	}
	
}


if($_SESSION['session_pre_id']){
	
	if($calculate_pre){
	
	foreach($_SESSION['session_pre_id'] as $key=> $i){
		
		if (@!in_array($_SESSION['session_pre_id'][$i],$prd_pre_del)) {
			
		$temp_pre_id[$i]=$_SESSION['session_pre_id'][$i];
		$temp_pre_name_th[$i]=$_SESSION['session_pre_name_th'][$i];
		$temp_pre_name_eng[$i]=$_SESSION['session_pre_name_eng'][$i];
		$temp_pre_price[$i]=$_SESSION['session_pre_price'][$i];
		$temp_pre_num[$i]=$prd_pre_num[$i];
		
			if(($prd_pre_num[$i] == '0' || $prd_pre_num[$i] == '') && $_GET['pre_remove'] == ''  && $_GET['prd_remove'] == ''){
	
					$temp_pre_id[$i]='';
					$temp_pre_name_th[$i]='';
					$temp_pre_name_eng[$i]='';
					$temp_pre_price[$i]='';
					$temp_pre_num[$i]='';
			$key4 = array_search($_SESSION['session_pre_id'][$i], $_SESSION['session_pre_id']);
			if($key4 !== FALSE) unset($_SESSION['session_pre_id'][$_SESSION['session_pre_id'][$i]]);}
			
		$grandTotalPreHidden = 	$grandTotalPreHidden + ($prd_pre_num[$i] * $_SESSION['session_pre_price'][$i]);
		$count_pre = $count_pre + $prd_pre_num[$i];
			
		}
	}
	}else{
			foreach($_SESSION['session_pre_id'] as $key=> $i){
				
				
					
				$temp_pre_id[$i]=$_SESSION['session_pre_id'][$i];
				$temp_pre_name_th[$i]=$_SESSION['session_pre_name_th'][$i];
				$temp_pre_name_eng[$i]=$_SESSION['session_pre_name_eng'][$i];
				$temp_pre_price[$i]=$_SESSION['session_pre_price'][$i];
				
				$temp_pre_num[$i]=$prd_pre_num[$i];
				
					if(($prd_pre_num[$i] == '0' || $prd_pre_num[$i] == '') && $_GET['pre_remove'] == '' && $_GET['prd_remove'] == ''){
			
							$temp_pre_id[$i]='';
							$temp_pre_name_th[$i]='';
							$temp_pre_name_eng[$i]='';
							$temp_pre_price[$i]='';
							$temp_pre_num[$i]='';
			$key4 = array_search($_SESSION['session_pre_id'][$i], $_SESSION['session_pre_id']);
			if($key4 !== FALSE) unset($_SESSION['session_pre_id'][$_SESSION['session_pre_id'][$i]]);}
			
			$grandTotalPreHidden = 	$grandTotalPreHidden + ($prd_pre_num[$i] * $_SESSION['session_pre_price'][$i]);
			$count_pre = $count_pre + $prd_pre_num[$i];
			
			}
			
	}
	

	$_SESSION['session_grandTotalPreHidden'] = $grandTotalPreHidden;
	$_SESSION['session_SubmitGrandTotal'] = $_SESSION['session_SubmitGrandTotal'] + $_SESSION['session_grandTotalPreHidden'];	

	
	if($_GET['pre_remove'] == '' && $_GET['prd_remove'] == ''){
	
		foreach($_SESSION['session_pre_id'] as $key2=> $i2){
			
			$_SESSION['session_pre_id'][$i2]=$temp_pre_id[$i2];
			$_SESSION['session_pre_name_th'][$i2]=$temp_pre_name_th[$i2];
			$_SESSION['session_pre_name_eng'][$i2]=$temp_pre_name_eng[$i2];
			
			$_SESSION['session_pre_price'][$i2]=$temp_pre_price[$i2];
			
			
			$_SESSION['session_pre_num'][$i2]=$temp_pre_num[$i2];
			
			$total_price_cal += $_SESSION['session_pre_price'][$i2] * $_SESSION['session_pre_num'][$i2];
			
	
		}
	}
	
	if($_GET['pre_remove']){
		

	
	$key = array_search($_GET['pre_remove'], $_SESSION['session_pre_id']);
	if($key !== FALSE) { unset($_SESSION['session_pre_id'][$_GET['pre_remove']]);unset($_SESSION['session_pre_num'][$_GET['pre_remove']]);}
	
	}

}

$total_count_product = $count_product+$count_pre;

if($_SESSION['session_id']){
	if($total_count_product > 1 ){
		if($count_product > 1){
		$select_ship = "SELECT * FROM shipping_tb WHERE shipping_id = '2' ";
		}else{
		$select_ship = "SELECT * FROM shipping_tb WHERE shipping_id = '".$_POST['shipping_type']."' ";
		}
		$result_ship =@mysql_query($select_ship, $connect);
		$data_ship =@mysql_fetch_array($result_ship);
		$_SESSION['shipping_id'] = $data_ship['shipping_id'];
		$_SESSION['shipping'] = $_POST['shipping_type'];
		$_SESSION['shipping_p'] = $data_ship['shipping_p'];
		$_SESSION['session_shipping_send_free'] = $data_ship['shipping_cost']; //ราคาส่ง
		$_SESSION['session_shipping_name'] = $data_ship['shipping_name']; //ราคาส่ง
		$_SESSION['session_shipping_name_th'] = $data_ship['shipping_name_th']; //ราคาส่ง
		$_SESSION['product_total'] = $_POST['product_total'];
		$_SESSION['grand_total'] = $_POST['grand_total'];

		$_SESSION['session_realShip'] = $data_ship['shipping_cost'] + ($data_ship['shipping_p'] * $count_product);

	}else{
		if($count_product > 1){
		   $select_ship = "SELECT * FROM shipping_tb WHERE shipping_id = '2' ";
		}else{
		   $select_ship = "SELECT * FROM shipping_tb WHERE shipping_id = '".$_POST['shipping_type']."' ";
		}
		$result_ship =@mysql_query($select_ship, $connect);
		$data_ship =@mysql_fetch_array($result_ship);
		$_SESSION['shipping_id'] = $data_ship['shipping_id'];
		$_SESSION['shipping'] = $_POST['shipping_type'];
		$_SESSION['shipping_p'] = $data_ship['shipping_p'];
		$_SESSION['session_shipping_send_free'] = $data_ship['shipping_cost']; //ราคาส่ง
		$_SESSION['session_shipping_name'] = $data_ship['shipping_name']; //ราคาส่ง
		$_SESSION['session_shipping_name_th'] = $data_ship['shipping_name_th']; //ราคาส่ง
		$_SESSION['product_total'] = $_POST['product_total'];
		$_SESSION['grand_total'] = $_POST['grand_total'];
		$_SESSION['session_realShip'] = $data_ship['shipping_cost'] + ($data_ship['shipping_p'] * $count_product);
	}
}
if($_SESSION['session_pre_id']){

	if($total_count_product > 1 ){
		
	if($_POST['shipping_type_pre'] == '' ){
	$select_ship_pre = "SELECT * FROM shipping_tb WHERE shipping_id = '2' ";
	}else{
		if($count_pre > 1){
		$select_ship_pre = "SELECT * FROM shipping_tb WHERE shipping_id = '2' ";
		}else{
		$select_ship_pre = "SELECT * FROM shipping_tb WHERE shipping_id = '".$_POST['shipping_type_pre']."' ";
		}
	}
	

	$result_ship_pre =@mysql_query($select_ship_pre, $connect);
	$data_ship_pre =@mysql_fetch_array($result_ship_pre);
	
	
	$_SESSION['shipping_pre_id'] = $data_ship_pre['shipping_id'];	
	$_SESSION['shipping_pre'] = $_POST['shipping_type_pre'];	
	$_SESSION['session_pre_shipping_send_free'] = $data_ship_pre['shipping_cost']; //ราคาส่ง
	$_SESSION['session_pre_shipping_name'] = $data_ship_pre['shipping_name']; //ราคาส่ง
	$_SESSION['session_pre_shipping_name_th'] = $data_ship_pre['shipping_name_th']; //ราคาส่ง
	$_SESSION['product_total_pre'] = $_POST['product_total_pre'];
	$_SESSION['grand_total_pre'] = $_POST['grand_total_pre']+$data_ship_pre['shipping_cost'];
	
			if($_SESSION['groupDelivery'] == '1'){
				 $_SESSION['session_realShipPre'] = ($data_ship_pre['shipping_p'] * $count_pre);
			}else{
				 $_SESSION['session_realShipPre'] = $data_ship_pre['shipping_cost'] + ($data_ship_pre['shipping_p'] * $count_pre);
			}

	$_SESSION['session_tranCostPreChk'] = $_SESSION['session_realShipPre'];
	}else{
		
	if($_POST['shipping_type_pre']){
		
		if($count_pre > 1){
		$select_ship_pre = "SELECT * FROM shipping_tb WHERE shipping_id = '2' ";
		}else{
		$select_ship_pre = "SELECT * FROM shipping_tb WHERE shipping_id = '".$_POST['shipping_type_pre']."' ";
		}
		
	}else{
	$select_ship_pre = "SELECT * FROM shipping_tb WHERE shipping_id = '".$_POST['shipping_type']."' ";
	}
	
	$result_ship_pre =@mysql_query($select_ship_pre, $connect);
	$data_ship_pre =@mysql_fetch_array($result_ship_pre);
	
	
	$_SESSION['shipping_pre_id'] = $data_ship_pre['shipping_id'];	
	$_SESSION['shipping_pre'] = $_POST['shipping_type_pre'];	
	$_SESSION['session_pre_shipping_send_free'] = $data_ship_pre['shipping_cost']; //ราคาส่ง
	$_SESSION['session_pre_shipping_name'] = $data_ship_pre['shipping_name']; //ราคาส่ง
	$_SESSION['session_pre_shipping_name_th'] = $data_ship_pre['shipping_name_th']; //ราคาส่ง
	$_SESSION['product_total_pre'] = $_POST['product_total_pre'];
	$_SESSION['grand_total_pre'] = $_POST['grand_total_pre']+$data_ship_pre['shipping_cost'];
	
		if($_SESSION['groupDelivery'] == '1'){
			$_SESSION['session_realShipPre'] = $data_ship_pre['shipping_p'] * $count_pre;
		}else{
			$_SESSION['session_realShipPre'] = $data_ship_pre['shipping_cost'] + ($data_ship_pre['shipping_p'] * $count_pre);
		}
		
	$_SESSION['session_tranCostPreChk'] = $_SESSION['session_realShipPre'];
	}
}

$_SESSION['session_SubmitGrandTotal'] = $_SESSION['session_SubmitGrandTotal'] + $_SESSION['session_realShip'] + $_SESSION['session_realShipPre'];

if($_GET['prd_remove']){
 echo "<script> window.location='index.php'</script>";
}elseif ($_GET['pre_remove']) {
 echo "<script> window.location='index.php'</script>";
}elseif ($calculate) {
 echo "<script> window.location='index.php'</script>";
}elseif ($calculate_pre) {
 echo "<script> window.location='index.php'</script>";
}elseif($_GET['prd_del'] != '' || $_GET['prd_pre_del'] != ''){
 echo "<script> window.location='index.php'</script>";
}elseif ($total_count_product  <= 0) {
 echo "<script> window.location='index.php'</script>";
 $_SESSION['session_SubmitGrandTotal'] = '0';
}else {
	if($_SESSION['AUTH_PERMISSION_ADMIN'] == '1')
		echo "<script> window.location='preorder_admin.php'</script>";
	else
		echo "<script> window.location='preorder.php'</script>";
}
?>