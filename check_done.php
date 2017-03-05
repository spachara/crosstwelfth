<?php
session_start();
require_once 'dbconnect.inc';
$sql_order = "select order_number from order_tb";
$sql_order .= " where payment_status in( '1', '3') and tranfer_status in( '1', '3') and order_status <> '0' and status_ready = '0'";
$sql_order .= " group by order_number";
$result= @mysql_query($sql_order, $connect);
$num_order =@mysql_num_rows($result);
$count_order = 0;
for($i=1;$i<=intval($num_order);$i++){
	$data_order=@mysql_fetch_array($result);
	$sql_order2 = "select  order_number  ,count(*)  product_num,sum(ready_sent) ready_sent_num from order_product_tb";
	$sql_order2 .= " where  order_number ='" .  $data_order['order_number'] . "' group by order_number";
	$result2= @mysql_query($sql_order2, $connect);
	$data_order2=@mysql_fetch_array($result2);
	if($data_order2['product_num'] == $data_order2['ready_sent_num'])
	{
		$sql_update_done = "INSERT INTO checkdone_log VALUES('" . $data_order2['order_number'] . "', NOW())"; 
                @mysql_query($sql_update_done, $connect);
		$sql_update_done = "UPDATE order_tb SET status_ready = '1' , date_update = NOW() , order_comment= CONCAT( IFNULL(order_comment , ''),  ':check_done_by_system:'  ) ";
		$sql_update_done .= " where order_number = '" . $data_order2['order_number'] . "'";		 
		@mysql_query($sql_update_done, $connect);
		$count_order++;		
	}
} 
?>
