<?php 
session_start();
if(isset($_SESSION['AUTH_PERMISSION_NAME'])==false) {
	echo "<script>location.href='index.php'</script>";
}
require_once '../dbconnect.inc';
$error_mess = '';
$next_purchase_order = '';
$om_no = '';
$suplier = '';
$order_date = '';
$expect_date = '';
$comment = '';
$curYear = substr( ((int)date('Y')) + 543 , 2 , 2 ); 
$curMonth = date('m'); 
$max_purchase_order =  @mysql_query("select purchase_order_no from purchase_order where purchase_order_no like '" . $curYear . '-'  . $curMonth . "%' and status <> 0 order by Replace(purchase_order_no,'-','') *1 desc LIMIT 1", $connect);
$num_purchase_order =  @mysql_num_rows($max_purchase_order);
if($num_purchase_order>0)
{
	$r = mysql_fetch_array($max_purchase_order);
	$next_purchase_order = $curYear . '-'  . $curMonth . '-'  . (((int)(str_replace($curYear . '-'  . $curMonth . '-',"",$r["purchase_order_no"]))) + 1);
}
else
{
	$next_purchase_order = $curYear . '-'  . $curMonth . '-1';
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['btnSubmit'] == 'Submit' ){
		
		$om_no = $_POST['om_no'];
		$suplier = $_POST['suplier'];
		$order_date = $_POST['order_date'];
		$expect_date = $_POST['expect_date'];
		$comment = $_POST['comment'];
		$allowed =  array('xls','xlsx');
		
		if(!file_exists($_FILES['fileEXEL']['tmp_name']) || !is_uploaded_file($_FILES['fileEXEL']['tmp_name'])) 
		{
			$error_mess =  'เลือก ไฟล์ข้อมูลเข้า';
		}
		else if(file_exists($_FILES['fileEXEL']['tmp_name']) || is_uploaded_file($_FILES['fileEXEL']['tmp_name'])) 
		{
			$filename = $_FILES['fileEXEL']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
				$error_mess = 'รูปแบบไฟล์นำเข้าไม่ถูกต้อง ต้องเป็น Exel ( .xls , .xlsx)';
			}
			else if( $om_no == '')
			{
				$error_mess =  'กรอกเลขที่ใบสั่งซื้อ';
			}
			else if(  $order_date == '')
			{
				$error_mess =  'กรอกวันที่สั่งผลิต';
			}
			else
			{
				$validate_duplicate = @mysql_query("select purchase_order_no from purchase_order where purchase_order_no ='" . $om_no . "' and status <> 0", $connect);
				$num_dup  =@mysql_num_rows($validate_duplicate);
				if($num_dup>0)
				{	
					$error_mess = 'เลขที่ใบสั่งซื้อซ้ำ!!!';
				}
			} 
		}
		
		if(empty($error_mess))
		{
			move_uploaded_file($_FILES["fileEXEL"]["tmp_name"],'file/' . $_FILES["fileEXEL"]["name"]); // Copy/Upload CSV

			//header('Content-Type: text/plain');
			$Filepath = 'file/' . $_FILES["fileEXEL"]["name"];
	 

		require('spreadsheet-reader/php-excel-reader/excel_reader2.php');
		require('spreadsheet-reader/SpreadsheetReader.php');

		date_default_timezone_set('UTC');

		$StartMem = memory_get_usage(); 
		try
		{
			mysql_query('SET AUTOCOMMIT=0',$connect);
			mysql_query('START TRANSACTION',$connect);
			$Spreadsheet = new SpreadsheetReader($Filepath);
			$BaseMem = memory_get_usage();

			$Sheets = $Spreadsheet -> Sheets();
			if($Sheets <4)
			{
				$error_mess = 'รูปแบบไฟล์นำเข้าไม่ถูกต้อง ข้อมูลนำเข้าต้องอยู่ใน sheet ที่ 4';
				throw new Exception($error_mess);
			}
			$Spreadsheet -> ChangeSheet(3);
			$a1 = mysql_query("INSERT INTO purchase_order VALUES(null,'". $om_no  ."', '" . $suplier . "', 1 , '" . $order_date . "', '" . $expect_date . "', '" . $comment . "', '" . $_SESSION['AUTH_PERMISSION_NAME'] . "', NOW(), '', null )" , $connect);
			if(!$a1)
			{
				$error_mess = 'Insert purchase order fail!!!!!';
				throw new Exception($error_mess);
			}
			$last_id = mysql_insert_id($connect);
			foreach ($Spreadsheet as $Key => $Row)
			{
				if ($Row && $Key > 0)
				{
				$code = trim($Row[0]) <> '' ? trim($Row[0]) : $code ;
				$color = trim($Row[1]) <> '' ? trim($Row[1]) : $color ;
				$size = trim($Row[2]);
				$num = trim($Row[3]);
				if( !is_numeric($num) )
				{
					$error_mess =  $error_mess = 'Error! สินค้่า: '. $code . ' color: ' . $color . ' size: ' . $size . '  จำนวนไม่เป็นตัวเลข!!!';
					throw new Exception($error_mess);
				}
				$product = @mysql_query("select p.pid,p.p_spare,p.p_pre  from product_tb p inner join color_tb c on p.p_color = c.c_code where p.p_code='" . $code . "' and c.name = '" . $color . "' and p.p_size = '" . $size . "'"  , $connect);
					$num_product  =@mysql_num_rows($product);
					if($num_product>1)
					{
							$error_mess = 'Error: มีสินค้ารหัส  ; ' . $code . ' ' . $color . ' '  .$size . 'มากกว่า1แบบ !!';
							throw new Exception($error_mess);
					}					
					else if($num_product==1)
					{
				       
						$row = mysql_fetch_array($product);
						if( $num > $row['p_spare'] )
						{
							$error_mess =  $code . ' ' . $color . ' '  .$size . ' ไม่สามารถสั่งผลิตได้เนื่องจากสั่งเกิน SPARE';
							
							throw new Exception($error_mess);
						}
						$a2 = mysql_query("INSERT INTO purchase_order_product(purchase_order_id,pid,p_code,p_color,p_size,order_num,receive_num) VALUES('" . $last_id ."', '" . $row['pid'] . "', '" . $code . "', '" . $color . "', '" . $size . "', '" . $num . "' , 0 )",$connect);
						if(!$a2)
						{
							$error_mess = 'Insert purchase order product fail!!!!!';
							throw new Exception($error_mess);
						}
						// update stock
						$sql_uu ="select p_code,p_color from product_tb where pid = '".$row['pid']."'";
						$result_uu =@mysql_query($sql_uu, $connect);
						$data_uu = @mysql_fetch_array($result_uu);
						
						
						$edit_product2 = "UPDATE product_tb SET p_spare = '". ((int)$row['p_spare'] - (int)$num) ."'";
						$edit_product2 .= " where p_code = '".$data_uu['p_code']."' and p_color = '".$data_uu['p_color']."'";
						$s = mysql_query($edit_product2, $connect);
						if(!$s)
						{
							$error_mess = 'UPDATE product_tb set p_spare fail!!!!!';
							throw new Exception($error_mess);
						}				
						
						
						$sql_buy_spare = "SELECT * FROM temp_order_product where pid ='".$row['pid']."'";
						$sql_buy_spare .= " AND buy_status = 'SPARE' AND sent_status = 'RESERVE' and order_type = 'PRE' order by date_in";
						$result_buy_spare =@mysql_query($sql_buy_spare, $connect);
						while($data_spare=mysql_fetch_array($result_buy_spare)){
						
							if($num >= $data_spare['product_number'])
							{
								$edit_product3 = "UPDATE temp_order_product SET buy_status = 'PREORDER'";
								$edit_product3 .= " where temp_id = '".$data_spare['temp_id']."'";
								$s1 = mysql_query($edit_product3, $connect);
								if(!$s1)
								{
									$error_mess = 'UPDATE temp_order_product  SET buy_status = PREORDER fail!!!!!';
									throw new Exception($error_mess);
								}
								$num = $num - $data_spare['product_number'];
							}
						}						
						 
						$total_pre = $row['p_pre']+$num;
						$edit_product4 = "UPDATE product_tb SET ";
						$edit_product4 .= " p_pre = '".$total_pre."' where pid = '".$row['pid']."'";
						$s2 = mysql_query($edit_product4, $connect);
						if(!$s2)
						{
							$error_mess = 'UPDATE product_tb  set p_pre fail!!!!!';
							throw new Exception($error_mess);
						}
						// update stock end
						
					}
					else
					{
						$error_mess = 'Error! ไม่มีสินค้่า: '. $code . ' color: ' . $color . ' size: ' . $size . ' ในระบบ!!';
						throw new Exception($error_mess);
					}
				}
				else
				{
					//var_dump($Row);
				}
		
			}
			
			mysql_query("COMMIT",$connect);	
			mysql_close($connect);
			header("Location: receive_product.php?purchase_order_no=" . $om_no); /* Redirect browser */
			exit();			
		}
		catch (Exception $E)
		{
			$error_mess  = $E -> getMessage();
			mysql_query("ROLLBACK",$connect);
		}

		mysql_query('SET AUTOCOMMIT=1');
		@unlink('file/' . $_FILES["fileEXEL"]["name"]);
		mysql_close($connect);

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
<script type="text/javascript">
$(function(){

	
	
// Datepicker
$('#order_date').datepicker({
	yearRange: "1950:+0",
	changeMonth: true,
	changeYear: true,
	dateFormat: 'yy-mm-dd',
	defaultDate: new Date()
});

$('#expect_date').datepicker({
	yearRange: "1950:+0",
	changeMonth: true,
	changeYear: true,
	dateFormat: 'yy-mm-dd'
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
                                        <a href="upload.php">นำเข้ารายการสั่งซื้อ</a>
                                        
                                   </div>
                                   <!--End Navigator-->            
            
            	<!--Block Frame-->
            	<div class="block_style2">
                	<div class="block_style2_top">
                    	<div class="block_style2_top-l"></div>
                        <div class="block_style2_top-r"></div>
                        <div class="block_style2_top-t">นำเข้ารายการสั่งซื้อ</div>
                    </div>
                    <div class="block_style2_content">
 <form method="post" enctype="multipart/form-data" name="myform2" action="upload.php">
                                        <div class="module_3">
                                            <div class="title">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                <div class="t"> 
													<div style="width:100px; float:left;"><b>ไฟล์ข้อมูลเข้า </b> </div>
                                                  <input name="fileEXEL" type="file" id="fileEXEL" class="validate[required]"><span style="color:red;margin-left: -61px;">*</span>
											   </div>
                                                <div class="t"> 
													<div style="width:100px; float:left;"><b>เลขที่ใบสั่งซื้อ </b> </div>
                                                  <input name="om_no" type="text" id="om_no" class="validate[required]" value="<?php echo $next_purchase_order; ?>">
												  <span style="color:red">*</span>
											   </div>
											   <div class="t"> 
													<div style="width:100px; float:left;"><b>วันที่สั่งผลิต </b> </div>
                                                  <input name="order_date" type="text" id="order_date" class="validate[required]" value="<?php echo $order_date; ?>">
												   <span style="color:red">*</span>
											   </div>
											    <div class="t"> 
													<div style="width:100px; float:left;"><b>วันที่คาดว่าจะได้</b> </div>
                                                  <input name="expect_date" type="text" id="expect_date" value="<?php echo $expect_date; ?>">
											   </div>
											   <div class="t">  
													<div style="width:100px; float:left;"><b>Suplier </b> </div>
                                                  <input name="suplier" type="text" id="suplier" value="<?php echo $suplier; ?>">
											   </div>											   
											    <div class="t"> 
													<div style="width:100px; float:left;"><b>Comment </b> </div>
                                                  <input name="comment" type="text" id="comment" value="<?php echo $comment; ?>">
											   </div>
												<div class="t"> 
                                                  <input name="btnSubmit" type="submit" id="btnSubmit" value="Submit" onclick="return confirm('Are you sure?');"><br /><br />
												  <div style="color:red"> <?php echo $error_mess;  ?></div>
                                                </div>
                                                <div class="bt">
                                                	 
                                                </div>
                                            </div>
                                            </div>
</form>
 </div>
                    <div class="block_style2_bottom">
                        <div class="block_style2_bottom-l"></div>
                        <div class="block_style2_bottom-r"></div>
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
                <!-- End Block Frame-->
</html>
 