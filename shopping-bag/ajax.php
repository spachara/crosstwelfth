<?php 
session_start();
require_once('../dbconnect.inc');


if($_POST['type'] == 'chk_order'){

	if($_POST['shipping_type'] == '1'){
	$total_order =  $_SESSION['session_normal'];
	}else{
	$total_order =  $_SESSION['session_in_ems'];
	}
	
	
	echo $total_order;
}

if($_POST['type'] == 'chk_order2'){

	if($_POST['shipping_type'] == '1'){
	$total_order =  $_SESSION['session_normal'];
	}else{
	$total_order =  $_SESSION['session_pre_ems'];
	}
	
	
	echo $total_order;
}


if($_POST['type'] == 'chk_code'){

	$select_promotion = "SELECT * FROM promotion_tb WHERE promotion_pass = '".$_POST['Code']."'";
	$result_promotion =@mysql_query($select_promotion, $connect);
	$data_promotion =@mysql_fetch_array($result_promotion);
	
	
	echo $data_promotion['promotion_dis'];
}

?>
