<?php 
session_start();
require_once('../dbconnect.inc');


if($_POST['type']=='chk_order'){
	
	
	if(!ereg(" | ",$_POST['order_number'])){
	$ex_order_2 = explode(":",$_POST['order_number']);
	}else{
	$ex_order = explode(" | ",$_POST['order_number']);
	$ex_order_2 = explode(":",$ex_order[0]);
	}

	$exPro = explode("-",$_POST['order_number']);
	
	if($exPro[2]){
	$select_order = "SELECT SUM(order_total) as total_order, SUM(order_transport_status) as sum_tran, order_promotion, order_point, u_id FROM order_tb ";
	$select_order .= "WHERE order_number = '".$exPro[0]."-".$exPro[1]."' and order_type = '".$exPro[2]."'";
	}else{
	$select_order = "SELECT SUM(order_total) as total_order, SUM(order_transport_status) as sum_tran, order_promotion, order_point, u_id FROM order_tb ";
	$select_order .= "WHERE order_number = '".$ex_order_2[0]."'";
	}
	
	
	$result_order =@mysql_query($select_order, $connect);
	$num_order =@mysql_num_rows($result_order);
	$data_order =@mysql_fetch_array($result_order);
	
	$total_order =  $data_order['total_order'];
	
	if($data_order['order_promotion'] != '' ){
	$total_order =  $total_order - ($total_order * ($data_order['order_promotion']/100));
	}
	$total_order =  $total_order + $data_order['sum_tran'] ;
	if($data_order['order_point'] != '' ){
	$total_order =  $total_order - $data_order['order_point'];
	}
	
		
		

	
	if($num_order=='1'){
		echo $total_order."|:".$data_order['u_id'];
	}elseif($num_order=='0'){
		echo "";
	}
}

?>
