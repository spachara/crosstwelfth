<?php 
session_start();
if(isset($_SESSION['AUTH_PERMISSION_NAME'])==false) {
	echo "<script>location.href='index.php'</script>";
}
require_once '../dbconnect.inc';
include("class.page_split.php");
	$obj = new page_split();
	$f=0;
	if(isset($_GET['page']))
	{
		$obj->_setPage($_GET['page']);	
		if($_GET['page'] > 1){
			$f = 20*($_GET['page']- 1);
		}	
	}
	$obj->_setPageSize(20);						
	$obj->_setFile("receive_product.php");
$purchase_order_no =  isset($_GET['purchase_order_no']) ? trim($_GET['purchase_order_no']) : ""; 
$product_code =  isset($_GET['product_code']) ? trim($_GET['product_code']) : ""; 
$status_id =  isset($_GET['status']) ? trim($_GET['status']) : ""; 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
<title>::Crosstwelfth::</title>
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
                                        <a href="receive_product.php">รับสิ้นค้า</a>
                                        
                                   </div>
                                   <!--End Navigator-->            
            
            	<!--Block Frame-->
            	<div class="block_style2">
                	<div class="block_style2_top">
                    	<div class="block_style2_top-l"></div>
                        <div class="block_style2_top-r"></div>
                        <div class="block_style2_top-t">รับสิ้นค้า</div>
                    </div>
                    <div class="block_style2_content">

                <form method="get" enctype="multipart/form-data" name="myform" action="<?php echo $_SERVER["PHP_SELF"];?>">                
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">     
                      <tr>
                        <td width="10%">เลขที่ใบสั่งซื้อ :</td>
                        <td width="20%"><input type="text" name="purchase_order_no" value="<?php echo $purchase_order_no;?>" /></td>
                        <td width="10%">รหัสสินค้า :</td>
                        <td width="20%"><input type="text" name="product_code" value="<?php echo $product_code;?>" /></td>    
						<td width="10%">สถานะ :</td>
                        <td width="20%"> 
						 <select name="status" id="status">
							<option value="">ทั้งหมด</option>
							<?php 
							$select_status = "SELECT * FROM purchase_order_status  where id <> 0 order by id";
							$result_status =@mysql_query($select_status, $connect);
							$num_status =@mysql_num_rows($result_status);
							for($c=1;$c<=intval($num_status);$c++){
							$data_status =@mysql_fetch_array($result_status);	
							?>
							<option value="<?php echo $data_status['id'];?>" <?php echo ($status_id == $data_status['id'] ? "selected=selected" : "");?>><?php echo $data_status['description'];?></option>
							<?php } ?>
                        </select>        
						</td>   
                        <td width="10%"><input type="submit" name="Search" id="Search" value="Search" /></td>                        
                      </tr> 
				</table>
                    
                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="table_3cell">
                      <tr>
                        <th width="5%" height="25" align="center" bgcolor="#CCCCCC">ลำดับ</th>
                        <th width="10%" align="center" bgcolor="#CCCCCC">เลขที่ใบสั่งซื้อ</th>
                        <th width="20%" align="center" bgcolor="#CCCCCC">Suplier</th>
                        <th width="10%" align="center" bgcolor="#CCCCCC">วันที่สั่ง</th>
                        <th width="10%" align="center" bgcolor="#CCCCCC">วันที่คาดว่าจะเข้า</th>
                        <th width="25%" align="center" bgcolor="#CCCCCC">หมายเหตุ</th>
                        <th width="15%" align="center" bgcolor="#CCCCCC">สถานะ</th>
                        <th width="5%" align="center" bgcolor="#CCCCCC">&nbsp;</th>
                      </tr>
                      <?php 
					  
					  $query_product = '';
					  if($product_code <> '')
					  {
					  $query_product = "select purchase_order_id from purchase_order_product where pid in (select pid from product_tb  where p_code =  '" . $product_code . "')";
					  }
					  
					$query = "select o.*,s.description from purchase_order o inner join purchase_order_status s on o.status = s.id  where o.status <> 0";
					$query .= $purchase_order_no <> '' ? " and o.purchase_order_no like '" . $purchase_order_no . "%'": "";
					$query .= $query_product <> '' ? " and o.purchase_order_id in(" . $query_product  . ")": "";
					$query .= $status_id <> '' ? " and o.status = '" . $status_id . "'": "";
					$query .= " order by Replace(o.purchase_order_no,'-','') *1 desc";
					$data = $obj->_query($query, $connect);
					$num_order =@mysql_num_rows($data);
						for($i=1;$i<=intval($num_order);$i++){
								$data_row=@mysql_fetch_array($data);	

						?>
                      <tr>
                        <td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $f+$i;?>
                        </td>
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row["purchase_order_no"];?>
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							<?php echo $data_row["suplier"];?>
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
								<?php echo $data_row["order_date"];?>
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
								<?php echo $data_row["expect_date"];?>
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
								<?php echo $data_row["comment"];?>
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
								<?php echo $data_row["description"];?>
                        </td> 
						<td height="25" align="center" valign="top" bgcolor="#F5F5F5">		
							  <a href="edit_purchase_order.php?purchase_order_id=<?php echo $data_row['purchase_order_id'];?>&purchase_order_no=<?php echo $data_row['purchase_order_no'];?>" target="_self">
								<img src="images/1343377813_Modify.png" alt="Edit" width="14" height="14" title="Edit"/>
							  </a>
                        </td> 						
                       
                      </tr>
                      <?php   
					  
					  } 
					  
				mysql_close($connect);
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
                                  	<div class="page_number">
                                    	<div class="page_number-right">
                                            	<?php $num_order > 0 ? $obj->_displayPage(str_replace('page='. (isset($_GET['page']) ? $_GET['page'] : '1') , '', $_SERVER['QUERY_STRING'])) :  null ; ?>
                                    	</div>
                                    </div>
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
