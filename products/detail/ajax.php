<?php 
session_start();
require_once('../../dbconnect.inc');





	$select_product = "SELECT * FROM product_tb where pid = '".$_POST['Pid']."'";
	$result_product =@mysql_query($select_product, $connect);
	$data_product =@mysql_fetch_array($result_product);
	
	 
	echo $data_product['p_stock'].":".$data_product['p_pre'].":".$data_product['p_spare'];

?>
