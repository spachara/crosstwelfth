<?php
session_start();

require_once('../../dbconnect.inc');




if ($_GET['pro_id'] != '' ) {
	
	$id_arr = $_GET['pro_id'];

	//SQL Product
	$select_product = "SELECT * FROM product_tb WHERE pid = '".$_GET['pro_id']."'";
	$result_product =@mysql_query($select_product, $connect);
	$data_product =@mysql_fetch_array($result_product);
	
	if($data_product['p_special'] != '0' ){
	$price = round($data_product['p_special']);//เก็บราคา
	}else{
	$price = round($data_product['p_price']);//เก็บราคา
	}
	
	

	
	

	$insert_order_product = "INSERT INTO waitlist_product_tb (waitlist_id, u_id, pro_id, pro_code, p_name , p_name_eng, p_category, p_size, p_color";
	$insert_order_product .= " , p_price, date_in, date_update) ";
	$insert_order_product .= "VALUES (NULL, '".$_SESSION['AUTH_PERMISSION_MEMID']."', '".$id_arr."' , '".$data_product['p_code']."', '".$data_product['name']."', '".$data_product['name_eng']."', '".$data_product['p_category']."' "; 
	$insert_order_product .= ", '".$data_product['p_size']."', '".$data_product['p_color']."'"; 
	$insert_order_product .= ", '".$price."', NOW(), NOW())";
	@mysql_query($insert_order_product, $connect);
				
}
?>
	<script>location='../../waitlist/'</script>

