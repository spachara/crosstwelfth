<?php
session_start();
if(isset($_SESSION['AUTH_PERMISSION_NAME'])==false) {
	echo "<script>location.href='index.php'</script>";
}
require_once '../dbconnect.inc';
$purchase_order_id = isset($_GET["purchase_order_id"]) ? $_GET["purchase_order_id"] : '';
$purchase_order_no = isset($_GET["purchase_order_no"]) ? $_GET["purchase_order_no"] : '';
$recieve_date = '';
$comment = '';
$error_mess = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnCancel']) ) {
	header("Location: receive_product.php"); /* Redirect browser */
	exit();	
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnDelete']) ) {
	try
	{ 
			mysql_query('SET AUTOCOMMIT=0',$connect);
			mysql_query('START TRANSACTION',$connect);		
			$delete= mysql_query("UPDATE purchase_order SET status = '0', update_date = NOW(), update_by = '" . $_SESSION['AUTH_PERMISSION_NAME'] . "' where purchase_order_id ='" . $_POST['purchase_order_id'] . "'" ,$connect);  
				if(!$delete)
			{
				$error_mess = 'Delete purchase_order fail!!!!!';
				throw new Exception($error_mess);
			}
			$sql_order_product = "SELECT * FROM purchase_order_product where purchase_order_id ='".$_POST['purchase_order_id']."'";
			$result_order_product =mysql_query($sql_order_product, $connect);	
			while($data_row = mysql_fetch_array($result_order_product)){
			
			$sql_product = "SELECT * FROM product_tb where pid ='".$data_row['pid']."'";
			$result_product =mysql_query($sql_product, $connect);	
			$data_product_row = mysql_fetch_array($result_product);	
			$p_pre_val = $data_product_row['p_pre'] - ((int)$data_row['order_num']);
			
				if($p_pre_val < 0)
				{
						$sql_order_temp = "SELECT * FROM temp_order_product where pid = '".$data_row['pid']."' and order_type = 'PRE'" ;
						$sql_order_temp .= " and product_recive = 0 and sent_status = 'RESERVE' and buy_status = 'PREORDER' order by date_in desc";
						$result_order_temp =mysql_query($sql_order_temp, $connect);	
						$array_temp = array();
						$p_pre_val = abs($p_pre_val);
						while($data_row_temp = mysql_fetch_array($result_order_temp)){
						
							if($p_pre_val > 0)
							{
									array_push($array_temp,array($data_row_temp['temp_id'],$data_row_temp['product_number']));
									$p_pre_val= $p_pre_val - $data_row_temp['product_number'];
							
							}												
							else
							{	
								break;
							}										
						}
						$p_pre_val = abs($p_pre_val);
						$reversed = array_reverse($array_temp);
						if($p_pre_val > 0)									
						{									
							$i=0;						
							
							foreach ($reversed as $key => $value)
							{  
								if($i>0)
								{ 
									if($p_pre_val >= $value[1] && $p_pre_val > 0)
									{ 
										unset($reversed[$key]);
									 
										$p_pre_val = $p_pre_val - $value[1] ;
									}	
								}
								$i++;
							}
						} 
			
						foreach ($reversed as $key => $value)
						{
							$edit_temp = "UPDATE temp_order_product SET buy_status = 'SPARE' ";
							$edit_temp .= " where temp_id = '".$value[0]."'";
							$result_order_temp2 =mysql_query($edit_temp, $connect);	
							if(!$result_order_temp2)
								{
									$error_mess = 'UPDATE temp_order_product  buy_status = SPARE fail!!!!!';
									throw new Exception($error_mess);
								} 	
						}			
						
																
				
				}
				
				$edit_product2 = "UPDATE product_tb SET p_pre ='" . $p_pre_val . "'";
				$edit_product2 .= " where pid = '".$data_row['pid']."'";
				$s = mysql_query($edit_product2, $connect);
				if(!$s)
				{
					$error_mess = 'UPDATE product_tb set p_pre fail on delete!!!!';
					throw new Exception($error_mess);
				}
				
				$edit_product3 = "UPDATE product_tb SET p_spare = p_spare+".((int)$data_row['order_num']);
				$edit_product3 .=" where p_code = '".$data_product_row['p_code']."' and p_color = '".$data_product_row['p_color']."'";
				$s1 = mysql_query($edit_product3, $connect);
				if(!$s1)
				{
					$error_mess = 'UPDATE product_tb set p_spare fail on delete!!!!!';
					throw new Exception($error_mess);
				}
				
			}
			mysql_query("COMMIT",$connect);	
			mysql_close($connect);
			header("Location: receive_product.php"); /* Redirect browser */
			exit();	
	}
		catch (Exception $E)
	{
		mysql_query("ROLLBACK",$connect);
		$error_mess  = $E -> getMessage();
	}
	mysql_query('SET AUTOCOMMIT=1');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSubmit'])) {
	$purchase_order_no = $_POST['purchase_order_no'];
	$purchase_order_id = $_POST['purchase_order_id'];
	$recieve_date = $_POST['recieve_date'];
	$comment = $_POST['comment'];
	if(trim($recieve_date)  =='')
	{
		$error_mess = 'Error : 	ต้องกรอกวันที่รับสินค้า';
	}	
	if($error_mess == '')
	{
		try
		{
			$recieve_by = $_SESSION['AUTH_PERMISSION_NAME'];
			mysql_query('SET AUTOCOMMIT=0',$connect);
			mysql_query('START TRANSACTION',$connect);		
			if(trim($comment) <> '') 
			{
				$purchase_order_q = mysql_query("UPDATE purchase_order SET comment =    CONCAT(comment,CASE WHEN comment='' or comment IS NULL THEN '' ELSE '<br>' END,CURDATE(), ' " .$comment . "') where purchase_order_id='". $purchase_order_id ."'" ,$connect);
				if(!$purchase_order_q)
				{
					$error_mess = 'Update purchase_order fail!!!!!';
					throw new Exception($error_mess);
				}
			}
			$count=0;
			foreach ($_POST['number_id'] as $id) {
				$product_receive_num = trim($_POST['product_receive'][$id]);
				if($product_receive_num <> '' and $product_receive_num <> '0')
				{
					$product_commment = $_POST['product_commment'][$id];
					$pid = $_POST['product_id'][$id];
					$purchase_order_product_hist_q = mysql_query("INSERT INTO purchase_order_product_hist VALUES(null,'" . $id ."', '" . $product_receive_num . "', '" . $product_commment . "', '" . $recieve_date . "', '" . $recieve_by . "', NOW() )",$connect);
					if(!$purchase_order_product_hist_q)
					{
						$error_mess = 'Insert purchase_order_product_hist fail!!!!!';
						throw new Exception($error_mess);
					}
					$purchase_order_product_q = mysql_query("UPDATE purchase_order_product SET receive_num =  receive_num+" . ((int)$product_receive_num) . " where id ='" . $id . "'" ,$connect);
					if(!$purchase_order_product_q)
					{ 
						$error_mess = 'Update purchase_order_product fail!!!!!';
						throw new Exception($error_mess);
					}	
					
						// update stock
						$sql_reserve = "SELECT product_number,product_recive,temp_id FROM temp_order_product where pid ='".$pid."'";
						$sql_reserve .= " AND buy_status = 'PREORDER' AND sent_status = 'RESERVE' order by date_in asc";
						$result_reserve =mysql_query($sql_reserve, $connect);	
						$real_receive = $product_receive_num;
						while($data_reserve=mysql_fetch_array($result_reserve)){
											
							if($product_receive_num > 0)
							{
								$remain_need = $data_reserve['product_number']-$data_reserve['product_recive'];
								if($remain_need <= $product_receive_num)
								{
									$update_status = "READY";
									$update_num = $data_reserve['product_number'];
								}
								else
								{
									$update_status = "RESERVE";
									$update_num = $product_receive_num + $data_reserve['product_recive'];
								}
								
								$product_receive_num = $product_receive_num - $remain_need;
								$update_product_number = "UPDATE temp_order_product SET product_recive = '".$update_num."', sent_status = '".$update_status."'";
								$update_product_number .= " where temp_id = '".$data_reserve['temp_id']."'";
								$result_product_number =mysql_query($update_product_number, $connect);
								if(!$result_product_number)
								{ 
									$error_mess = 'Update temp_order_product fail!!!!!';
									throw new Exception($error_mess);
								}									
							}
							else
							{
								break;// get out loop
							}		
						}
						
						if($product_receive_num > 0)
						{
							$sql_up_product = "UPDATE product_tb SET";
							$sql_up_product .= " p_pre = case when p_pre-" .(int)$product_receive_num . " < 0 then 0 else p_pre-" .(int)$product_receive_num . " end";
							$sql_up_product .= ", p_stock = p_stock+" .(int)$product_receive_num;						
							$sql_up_product .= " where pid = '". $pid ."'";						
							$result_up_product = mysql_query($sql_up_product, $connect);
							if(!$result_up_product)
							{ 
								$error_mess = 'Update product_tb fail!!!!!';
								throw new Exception($error_mess);
							}									

						}
					
					// update stock end
					
					$count++;						
				}				
			}
			if($count ==0)
			{
				$error_mess = 'Error : 	ต้องกรอกจำนวนของเข้า';
			 	throw new Exception($error_mess);
			}
			else
			{
				$check_complete =  mysql_query("select id from purchase_order_product where purchase_order_id = '" . $purchase_order_id . "' and order_num > receive_num  LIMIT 1", $connect);
				$num_check_complete =  mysql_num_rows($check_complete);
				if($num_check_complete>0)
				{
					$update_status= mysql_query("UPDATE purchase_order SET status = '2' where purchase_order_id ='" . $purchase_order_id . "'" ,$connect);// remain some products still uncomplete
				}
				else
				{
					$update_status= mysql_query("UPDATE purchase_order SET status = '3' where purchase_order_id ='" . $purchase_order_id . "'" ,$connect); // receive all products complete
				}
			 
			}
			mysql_query("COMMIT",$connect);	
			mysql_close($connect);
			header("Location: receive_product.php?purchase_order_no=" . $purchase_order_no); /* Redirect browser */
			exit();	
		}
		catch (Exception $E)
		{
			mysql_query("ROLLBACK",$connect);
			$error_mess  = $E -> getMessage();
		}
		mysql_query('SET AUTOCOMMIT=1');
	}
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
<link rel="stylesheet" href="../js/datepicker/css/ui-darkness/jquery-ui-1.10.3.custom.css" type="text/css">
<script type="text/javascript" src="../js/datepicker/js/jquery-ui-1.8.22.custom.min.js"></script>
<link href="cssstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">

 function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
$(function(){

	
	
// Datepicker
$('#recieve_date').datepicker({
	yearRange: "1950:+0",
	changeMonth: true,
	changeYear: true,
	dateFormat: 'yy-mm-dd',
	defaultDate: new Date()
});

	
});
</script>
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
                                        <a href="receive_product.php">รับสินค้า</a>
                                        
                                   </div>
                                   <!--End Navigator-->            
            
            	<!--Block Frame-->
            	<div class="block_style2">
                	<div class="block_style2_top">
                    	<div class="block_style2_top-l"></div>
                        <div class="block_style2_top-r"></div>
                        <div class="block_style2_top-t">รับสินค้า</div>
                    </div>
                    <div class="block_style2_content">

                <form method="post" enctype="multipart/form-data" name="myform" action="<?php echo $_SERVER["PHP_SELF"];?>">                
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">     
                      <tr>
                        <td width="10%"><b>เลขที่ใบสั่งซื้อ</b></td>
                        <td width="10%"><?php echo $purchase_order_no;?>
							<input type="hidden" name="purchase_order_id" value="<?php echo $purchase_order_id;?>" />	
							<input type="hidden" name="purchase_order_no" value="<?php echo $purchase_order_no;?>" />						
						</td>
                        <td width="10%"><b>วันที่รับสินค้า</b></td>
                        <td width="30%"><input type="text" name="recieve_date" id="recieve_date" value="<?php echo $recieve_date;?>" /><span style="color:red">*</span></td>   
                        <td width="10%"><b>Comment</b></td>
                        <td width="30%"><textarea name="comment" id="comment"><?php echo $comment ;?></textarea></td>                        
                      </tr> 
				</table>
                    
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="table_3cell">
                      <tr>
                        <th width="10%" height="25" align="center" bgcolor="#CCCCCC">รหัสสินค้า</th>
                        <th width="10%" align="center" bgcolor="#CCCCCC">สี</th>
                        <th width="10%" align="center" bgcolor="#CCCCCC">ขนาด</th>
                        <th width="10%" align="center" bgcolor="#CCCCCC">จำนวนสั่งผลิต</th>
                        <th width="10%" align="center" bgcolor="#CCCCCC">ได้รับแล้ว</th>
                        <th width="10%" align="center" bgcolor="#CCCCCC">ขาด</th>
                        <th width="10%" align="center" bgcolor="#CCCCCC">ของเข้า</th>
                        <th width="30%" align="center" bgcolor="#CCCCCC">Comment</th>
                      </tr>
                      <?php  
					  
					$query = "select * from purchase_order_product  where purchase_order_id = '" . $purchase_order_id . "'";
					$data = @mysql_query($query, $connect);
					$num_order =@mysql_num_rows($data);
					$ids = '';
					$sum_order = 0;
					$sum_receive = 0;
					$sum_remain = 0;
						for($i=1;$i<=intval($num_order);$i++){
								$data_row=@mysql_fetch_array($data);	
								$ids .=  $data_row['id'] . (intval($num_order) <> $i ? ',' : '');
						?>
                      <tr>
                        <td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row["p_code"];?>
							<input type="hidden" name="number_id[<?php echo $data_row['id'];?>]" value="<?php echo $data_row['id'];?>" />
							<input type="hidden" name="product_id[<?php echo $data_row['id'];?>]" value="<?php echo $data_row['pid'];?>" />
                        </td>
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row["p_color"];?>
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row["p_size"];?>
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
								<?php $sum_order = $sum_order + $data_row["order_num"]; echo $data_row["order_num"];?>
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
								<?php $sum_receive = $sum_receive + $data_row["receive_num"]; echo $data_row["receive_num"];?>
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
								<?php  $sum_remain = $sum_remain + ($data_row["order_num"] - $data_row["receive_num"]); echo ($data_row["order_num"] - $data_row["receive_num"]);?>
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
								<input type="text" onkeypress="return isNumber(event)" name="product_receive[<?php echo $data_row["id"];?>]" value="<?php echo (isset($_POST['product_receive'][$data_row['id']]) ? $_POST['product_receive'][$data_row['id']] : "" );?>" /> 
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
								<input type="text" name="product_commment[<?php echo $data_row["id"];?>]" value="<?php echo (isset($_POST['product_commment'][$data_row['id']]) ? $_POST['product_commment'][$data_row['id']] : "" );?>" />
                        </td> 	
                       
                      </tr>
                      <?php   
					  
					  } 
					  ?>	
						<tr>
                        <td height="25" colspan="3" align="center"  bgcolor="#CCCCCC">		
							<?php echo  'รวม '.$num_order .' รายการ';?>
                        </td>
						<td height="25" align="center"  bgcolor="#AED6F1">		
							<?php echo $sum_order;?>
                        </td> 
						<td height="25" align="center"  bgcolor="#AED6F1">		
							<?php echo $sum_receive;?>
                        </td> 
						<td height="25" align="center"  bgcolor="#AED6F1">		
								<?php echo $sum_remain;?>
                        </td> 
						<td height="25" align="center"  bgcolor="#CCCCCC">		
						 
                        </td> 
						<td height="25" align="center"  bgcolor="#CCCCCC">		
								 
                        </td>                        
                      </tr>					  
					  <tr>
					  <td height="50" colspan="8" align="center">
							<input name="btnSubmit" type="submit" id="btnSubmit" value="Save"  onclick="return confirm('Are you sure to save?');">&nbsp;
							<?php 
								$query_status = "select status from purchase_order  where purchase_order_id = '" . $purchase_order_id . "'";
								$status_ret = @mysql_query($query_status, $connect);
								$data_row_status=@mysql_fetch_array($status_ret);	
								if($data_row_status["status"] == '1')
								{
							?>
								<input name="btnDelete" type="submit" id="btnDelete" value="Delete"  onclick="return confirm('Are you sure to delete?');">&nbsp;
							<?php 
								}
							?>
							<input name="btnCancel" type="submit" id="btnCancel" value="Cancel" >
							<br /><br />
							<div style="color:red"> <?php echo $error_mess;  ?></div>
					   </td> 
					  </tr>
                    </table>
					
					  <table width="60%" border="0" cellpadding="0" cellspacing="0" style="font-family:Tahoma, Geneva, sans-serif; font-size:12px; margin-top:20px">   
					<tr> 
                        <th bgcolor="#CCCCCC" align="center" colspan="7"><b>ประวัติการรับสินค้า</b></th>
                      </tr> 					  
                      <tr> 
					   <td width="15%" height="25" align="center" bgcolor="#CCCCCC">รหัสสินค้า</td>
                        <td width="10%" align="center" bgcolor="#CCCCCC">สี</td>
                        <td width="5%" align="center" bgcolor="#CCCCCC">ขนาด</td>
                        <td width="20%" align="center" bgcolor="#CCCCCC">วันที่รับสินค้า</td>
                        <td width="10%" align="center" bgcolor="#CCCCCC">จำนวน</td>
                        <td width="30%" align="center"bgcolor="#CCCCCC">Comment</td> 
                        <td width="10%" align="center" bgcolor="#CCCCCC">ผู้รับ</td>   
                      </tr> 
					   <?php  
					  
					$query2 = "select p.p_code,p.p_color,p.p_size,h.receive_date,h.receive_num,h.comment,h.receive_by";
					$query2.= " from purchase_order_product_hist h inner join  purchase_order_product p  on h.purchase_order_product_id = p.id";
					$query2 .= " where h.purchase_order_product_id in (" . $ids . ") order by h.receive_date, h.create_date desc";			 
					$data2 = @mysql_query($query2, $connect);
					$num_order2 =@mysql_num_rows($data2);
						for($i=1;$i<=intval($num_order2);$i++){
								$data_row2=@mysql_fetch_array($data2);	

						?>
						<tr>
                        <td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row2["p_code"];?> 
                        </td>
						 <td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row2["p_color"];?> 
                        </td>
						 <td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row2["p_size"];?> 
                        </td>
                        <td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row2["receive_date"];?> 
                        </td>
						 <td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row2["receive_num"];?> 
                        </td>
						 <td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row2["comment"];?> 
                        </td>
						 <td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row2["receive_by"];?> 
                        </td>
						</tr>
					<?php   
					  
					  } 
					 if(is_resource($connect))
					{
						mysql_close($connect);
					}
					?>	 
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