<?php
	session_start();
	require_once '../dbconnect.inc';
	include("class.page_split.php");
	
	include_once("ckeditor/ckeditor.php");  
	include_once("cke_config.php");  

    $obj = new page_split();
	$obj->_setPageSize(10);						
	$obj->_setFile("new_order.php");		
	$obj->_setPage($_GET['page']);		
	if($_GET['page'] > 1){
		$f = 10*($_GET['page']- 1);
	}
	
	

	if($_GET['sAction'] == 'del'){
		
		$sql_order_unlink = "SELECT * FROM order_tb WHERE order_number = '".$_GET['id_del']."' ";
		$result_order_unlink =@mysql_query($sql_order_unlink, $connect);
		$data_order_unlink =@mysql_fetch_array($result_order_unlink);
		
		$sql_order_detail = "SELECT * FROM order_product_tb WHERE order_number = '".$_GET['id_del']."' ";
		$result_order_detail =@mysql_query($sql_order_detail, $connect);
		$num_order_detail =@mysql_num_rows($result_order_detail);
		
		for($o=1;$o<=intval($num_order_detail);$o++){
		$data_order_detail =@mysql_fetch_array($result_order_detail);
			
			$sql_delete_detail = "DELETE FROM order_product_tb WHERE order_number = '".$_GET['id_del']."' ";
			@mysql_query($sql_delete_detail, $connect);
		}
		
		@unlink("../tmp/".$data_order_unlink['order_number']);
		
		$sql_delete_order = "DELETE FROM order_tb  WHERE order_number = '$_GET[id_del]' ";
		@mysql_query($sql_delete_order,$connect);
		
	?>		 <script>
					location.href='new_order.php'; //รีเฟสหน้า
			 </script>
	<?php
	}

	if($_SESSION['AUTH_PERMISSION_ID']=='') {
		header("Location:index.php");
	}
	
	if($_POST['Submit']=='UPDATE'){

		$edit_txt = "UPDATE txt_tb SET txt_detail_th = '".$_POST['txt_detail_th']."', date_in = NOW() WHERE txt_id = '".$_POST['txt_id']."' ";
		@mysql_query($edit_txt, $connect);

		?>
		<script>location.href='new_order.php?txt_id=<?php echo $_POST['txt_id'];?>';</script>
        <?php
	}
	
	if($_POST['Submitrate']=='UPDATE'){

		$edit_txt = "UPDATE txt_tb SET txt_name_th = '".$_POST['txt_name_th']."', date_in = NOW() WHERE txt_id = '".$_POST['txt_id']."' ";
		@mysql_query($edit_txt, $connect);

		?>
		<script>location.href='new_order.php?txt_id=<?php echo $_POST['txt_id'];?>';</script>
        <?php
	}
	
	$url_pic = "../tmp"; //พาทรูปภาพ

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
</script>
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////-->
	<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>-->
	<script type="text/javascript" src="../js/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.1.js"></script>
    <script type="text/javascript" src="../js/fancybox/fancybox-jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////--> 

<link href="cssstyle.css" rel="stylesheet" type="text/css" />
<!--End Fancy Box-->

<link rel="stylesheet" href="../js/datepicker/css/ui-darkness/jquery-ui-1.10.3.custom.css" type="text/css">
<script type="text/javascript" src="../js/datepicker/js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript">
$(function(){
// Datepicker
$('#datepicker').datepicker({
	yearRange: "1950:+0",
	changeMonth: true,
	changeYear: true,
	dateFormat: 'dd/mm/yy'

});

$('#datepicker2').datepicker({
	yearRange: "1950:+0",
	changeMonth: true,
	changeYear: true,
	dateFormat: 'yy-mm-dd'

});
	
});



</script>
<script type="text/javascript">
function processPopupLink(val){
	$(document).ready(function() {
		$.fancybox({
				'href' : 'popupChk.php?id='+val,
				'width'				: 600,
				'height'			: 150,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'transitionIn'	: 'fade',
				'transitionOut'	: 'fade',				
				'type'				: 'iframe',
			});
		});
}
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
                    <a href="new_order.php">รายการสั่งซื้อทั้งหมด</a>
               </div>
               <!--End Navigator-->            
            
            	<!--Block Frame-->
            	<div class="block_style2">
                	<div class="block_style2_top">
                    	<div class="block_style2_top-l"></div>
                        <div class="block_style2_top-r"></div>
                        <div class="block_style2_top-t">รายการสั่งซื้อทั้งหมด</div>
                    </div>
                    <div class="block_style2_content">



                                   		<!--Coppy Module Clear-->
                                        <form method="post" name="myform" action="new_order.php">
                                        <div class="module_3">
                                            <div class="title">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                <div class="t" style="font-size:12px; font-weight:bold">
                                                <a href="new_order.php?txt_id=22">Paid</a> | 
                                                <a href="new_order.php?txt_id=24">Delivery</a> | 
                                                <a href="new_order.php?txt_id=23">Cancel</a>
                                              </div>
                                                <div class="bt">
                                                </div>
                                            </div>
                                          <div class="conten">
                                                <!--ใสข้อมูล ตรงนี้-->
                                                <!--ตาราง 3 Cell-->
                                                
                                   <?php if($_GET['txt_id']!='' && $_GET['txt_id']!=2 && $_GET['txt_id']!=6){
											//$sql_txt = "SELECT * FROM txt_tb WHERE txt_id = '".$_GET['txt_id']."' ";
											$sql_txt = "SELECT * FROM txt_tb WHERE txt_id = '".$_GET['txt_id']."' ";
											$result_txt =@mysql_query($sql_txt, $connect);
											$data_txt =@mysql_fetch_array($result_txt);
								   ?>
                                   
                                   
                                   
                                   <div class="table_3cell">
                                     	<ul>
                                        	<!--Title-->
                                            <li>
                                            <div style="font-weight:bold; margin:10px 0 10px 15px;">แก้ไข<?php echo $txt_text;?></div>
												<?php
                                                $CKEditor = new CKEditor(); $config['toolbar'] = 'Full';
                                                $events['instanceReady'] = 'function (evt) { 
                                                        return editorObj=evt.editor;
                                                }';	
                                                $CKEditor->editor("txt_detail_th", $data_txt['txt_detail_th'],$config,$events);
                                                ?>
                                            </li>
                                            <div class="demo">
                                            <input type="hidden" name="txt_id" value="<?php echo $data_txt['txt_id'];?>" />
                                            <input name="Submit" type="submit"  style="width:80px" value="UPDATE">
                                            </div>
                                        </ul>
                                    </div>
                                   <?php }
								   
								   if($_GET['txt_id']==2){
								  		    $sql_txt = "SELECT * FROM txt_tb WHERE txt_id = '".$_GET['txt_id']."' ";
											$result_txt =@mysql_query($sql_txt, $connect);
											$data_txt =@mysql_fetch_array($result_txt);?>
                                            <div class="table_3cell">
                                                  <ul>
                                                      <!--Title-->
                                                      <li>
                                                      <div style="font-weight:bold; margin:10px 0 10px 15px;">แก้ไข <?php echo $data_txt['txt_name'];?></div>
                                                        <input type="text" name="txt_name_th" value="<?php echo $data_txt['txt_name_th'];?>" style="width:80px" />  
                                                      </li>
                                                      <div class="demo">
                                                      <input type="hidden" name="txt_id" value="<?php echo $data_txt['txt_id'];?>" />
                                                      <input name="Submitrate" type="submit"  style="width:80px" value="UPDATE">
                                                      </div>
                                                  </ul>
                                            </div>
								   <? }
								   if($_GET['txt_id']==6){
								  		    $sql_txt = "SELECT * FROM txt_tb WHERE txt_id = '".$_GET['txt_id']."' ";
											$result_txt =@mysql_query($sql_txt, $connect);
											$data_txt =@mysql_fetch_array($result_txt);?>
                                            <div class="table_3cell">
                                                  <ul>
                                                      <!--Title-->
                                                      <li>
                                                      <div style="font-weight:bold; margin:10px 0 10px 15px;">แก้ไข <?php echo $data_txt['txt_name'];?></div>
                                                        <input type="text" name="txt_name_th" value="<?php echo $data_txt['txt_name_th'];?>" style="width:80px" />  
                                                      </li>
                                                      <div class="demo">
                                                      <input type="hidden" name="txt_id" value="<?php echo $data_txt['txt_id'];?>" />
                                                      <input name="Submitrate" type="submit"  style="width:80px" value="UPDATE">
                                                      </div>
                                                  </ul>
                                            </div>
								   <? }
								   
								   if($_GET['txt_id']==''){?>
                                   
                                    <table width="100%" border="0" cellpadding="0" cellspacing="4" style="font-family:Tahoma, Geneva, sans-serif; font-size:12px;">
                                      <tr>
                                        <td width="9%">ชื่อ</td>
                                        <td width="26%"><input type="text" name="order_employee" value="<?php echo $_POST['order_employee'];?>" /></td>
                                        <td width="11%" height="25">เลขที่ใบสั่งซื้อ</td>
                                        <td colspan="3"><input type="text" name="order_number" value="<?php echo $_POST['order_number'];?>" />
                                        <font color="#FF0000">*ใส่เฉพาะตัวเลข ไม่ต้องใส่ -IN -PRE</font></td>
                                      </tr>
                                      <tr>
                                        <td>รหัสสินค้า</td>
                                        <td><input type="text" name="product_code" value="<?php echo $_POST['product_code'];?>" /></td>
                                        <td>Color </td>
                                        <td><select name="color">
                                          <option></option>
                                          <?php
                        $sql_color = "SELECT distinct(name) as name FROM color_tb ";
                        $result_color = @mysql_query($sql_color, $connect);
                        $num_color =@mysql_num_rows($result_color);
                        
                        for($i=1;$i<=intval($num_color);$i++){
                        $data_color =@mysql_fetch_array($result_color);
                        ?>
                                          <option value="<?php echo $data_color['name']; ?>" <?php echo ($_POST['color'] == $data_color['name'] ? "selected=selected" : "" );?> ><?php echo $data_color['name']; ?></option>
                                          <?php } ?>
                                        </select></td>
                                        <td width="6%">Size</td>
                                        <td width="21%"><select name="size">
                                          <option></option>
                                          <?php
                        $sql_size = "SELECT distinct(name) as name FROM size_tb ";
                        $result_size = @mysql_query($sql_size, $connect);
                        $num_size =@mysql_num_rows($result_size);
                        
                        for($i=1;$i<=intval($num_size);$i++){
                        $data_size =@mysql_fetch_array($result_size);
                        ?>
                                          <option value="<?php echo $data_size['name']; ?>" <?php echo ($_POST['size'] == $data_size['name'] ? "selected=selected" : "" );?>><?php echo $data_size['name']; ?></option>
                                          <?php } ?>
                                        </select></td>
                                      </tr>
                                      <tr>
                                        <td>วันที่สั่งสินค้า</td>
                                        <td><input type="text" name="order_date" id="datepicker2" value="<?php echo $_POST['order_date'];?>" /></td>
                                        <td height="25">สถานะ</td>
                                        <td width="27%"><select name="order_status" >
                                          <option value="" <?php echo ($_POST['order_status'] == '' ? "selected=selected" : "");?>></option>
                                          <option value="1" <?php echo ($_POST['order_status'] == '1' ? "selected=selected" : "");?>>รอชำระค่าสินค้า</option>
                                          <option value="5" <?php echo ($_POST['order_status'] == '5' ? "selected=selected" : "");?>>แจ้งโอนเงิน/รอเช็คยอดเงิน</option>
                                          <option value="2" <?php echo ($_POST['order_status'] == '2' ? "selected=selected" : "");?>>ได้รับชำระเงินแล้ว/รอจัดส่งสินค้า</option>
                                          <option value="3" <?php echo ($_POST['order_status'] == '3' ? "selected=selected" : "");?>>จัดส่งสินค้าเรียบร้อยแล้ว</option>
                                          <option value="0" <?php echo ($_POST['order_status'] == '0' ? "selected=selected" : "");?>>ยกเลิกใบสั่งซื้อ</option>
                                        </select></td>
										 <td width="6%">เบอร์โทร</td>
                                        <td width="21%">
										<input type="text" name="order_phone" value="<?php echo $_POST['order_phone'];?>" />
										</td>
                                       
                                      </tr>
									  <tr>
									   <td colspan="6" align="right"><input type="submit" name="Search" id="Search" value="Search" /></td>
									   </tr>
                                    </table>
                                    <br />
									<?php 

									if($_POST['Search'] == 'Search'){
										
										 $sql_order = "SELECT * FROM order_tb where order_number <> ''";
							
										 if($_POST['order_employee'] != '' ){
											 
										 $sql_order .= " AND order_employee like '%".$_POST['order_employee']."%'";
										 
										 }

										 if($_POST['order_phone'] != '' ){
											 
										 $sql_order .= " AND REPLACE(order_phone, '-', '') like '%".$_POST['order_phone']."%'";
										 
										 }
										 
										 
										 if($_POST['order_status'] != '' ){
											 
										 $sql_order .= " AND order_status like '%".$_POST['order_status']."%'";
										 
										 }
							
										 if($_POST['order_date'] != '' ){
											 
										 $sql_order .= " AND date_in like '%".$_POST['order_date']."%'";
										 
										 }
										 if($_POST['order_number'] != '' ){
											 
										 $sql_order .= " AND order_number like '%".$_POST['order_number']."%'";
										 
										 }
										 
										 
										 if($_POST['product_code'] != '' ){
											 
											 $sql_product = "select * from order_product_tb where pro_code like '%".$_POST['product_code']."%' ";
											 
												 if($_POST['size'] != '' ){
													 
												 $sql_product .= " AND order_p_size = '".$_POST['size']."'";
												 
												 }


												 if($_POST['color'] != '' ){
													$product_t = "select * from color_tb where name = '".$_POST['color']."' ";
													$result_t = @mysql_query($product_t, $connect);
													$num_t = @mysql_num_rows($result_t);
													
													for($t=1;$t<=intval($num_t);$t++){
														
													$data_t =@mysql_fetch_array($result_t);
													$colorArrName .= "'".$data_t['c_code']."',";
													
													}
													
													 $colorArrName =  substr($colorArrName,0,-1);
													
												 $sql_product .= " AND order_p_color in (".$colorArrName.") ";
												 
												 }
											 
											 $result_product =@mysql_query($sql_product, $connect);
											 $num_product =@mysql_num_rows($result_product);

											 for($t=1;$t<=intval($num_product);$t++){
												$data_product=@mysql_fetch_array($result_product);
												
												$all_number .=  "'".$data_product['order_number']."',";
											 }
										 $all_number = substr($all_number,0,-1);
										 $sql_order .= " AND order_number in (".$all_number.")";
										 
										 }
										 
										 $sql_order .= " GROUP BY order_number ORDER BY date_in desc ";
										 
										 $_SESSION['ORDER_QUERY'] = $sql_order;
										$result_order =$obj->_query($sql_order, $connect);
										 
									}else{
									if(isset($_SESSION['ORDER_QUERY'])  && !empty($_SESSION['ORDER_QUERY']) && isset($_GET['page']))
										{
										 $sql_order = $_SESSION['ORDER_QUERY']; 
										}
										else{
										
										$sql_order = "SELECT * FROM order_tb GROUP BY order_number ORDER BY date_in desc ";
										}
										$_SESSION['ORDER_QUERY'] = $sql_order;
                                    $result_order =$obj->_query($sql_order, $connect);
									}
									
                                    $result_order4 =@mysql_query($sql_order, $connect);

									
                                    $num_order =@mysql_num_rows($result_order);
                                    
                                    for($i4=1;$i4<=intval($num_order);$i4++){
                                    $data_order4=@mysql_fetch_array($result_order4);
									
									
										$sql_insert_order5 = "select * from order_tb where order_number = '".$data_order4['order_number']."'";
										$result_insert_order5 = @mysql_query($sql_insert_order5, $connect);
										$num_order5 = @mysql_num_rows($result_insert_order5);
										
										for($i5=1;$i5<=intval($num_order5);$i5++){
										$data_order5= @mysql_fetch_array($result_insert_order5);
									
									
												if($data_order5['order_type'] == 'IN'){
													$order_in = $order_in + 1;
												}
												if($data_order5['order_type'] == 'PRE'){
													$order_pre = $order_pre + 1;
												}
												
										}
									}
									
									
									$order_total = $order_pre+$order_in;
									
                                    echo "<font color=#FF9933>ใบสั่งซื้อทั้งหมด ".$order_total." ใบ INSTOCK ".$order_in." ใบ PREORDER ".$order_pre." ใบ</font><br><br>";
									?>
                                    
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td bgcolor="#000000">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="1" class="table_3cell" style="font-size:12px">
                                      <tr>
                                        <td width="4%" height="25" align="center" bgcolor="#CCCCCC">ลำดับ</td>
                                        <td width="15%" align="center" bgcolor="#CCCCCC">ใบสั่งซื้อ</td>
                                        <td width="20%" align="center" bgcolor="#CCCCCC">&nbsp;</td>
                                        <td width="12%" align="center" bgcolor="#CCCCCC">ชื่อ</td>
                                        <td width="7%" align="center" bgcolor="#CCCCCC">ราคา<br />
                                        บาท</td>
                                        <td width="4%" align="center" bgcolor="#CCCCCC">ลด</td>
                                        <td width="5%" align="center" bgcolor="#CCCCCC">Point</td>
                                        <td width="6%" align="center" bgcolor="#CCCCCC">ราคารวม<br />
                                        บาท</td>
                                        <td width="14%" align="center" bgcolor="#CCCCCC">สถานะ</td>
                                        <td width="9%" align="center" bgcolor="#CCCCCC">สถานะโอนเงิน</td>
                                        <td width="4%" bgcolor="#CCCCCC">&nbsp;</td>
                                      </tr>
									<?php

                                    for($i=1;$i<=intval($num_order);$i++){
                                    $data_order=@mysql_fetch_array($result_order);
                                    

                                    $sql_user = "SELECT * FROM user_tb where u_id = '".$data_order['u_id']."' ";
                                    $result_user2 =@mysql_query($sql_user, $connect);
                                    $data_user=@mysql_fetch_array($result_user2);

                                    ?>
                                      <tr>
                                        <td height="25" align="center" bgcolor="#F5F5F5"> <?php echo $f+$i;?></td>
                                        <td bgcolor="#F5F5F5"><?php 
												
												
													$sql_insert_order2 = "select * from order_tb where order_number = '".$data_order['order_number']."'";
													$result_insert_order2 = @mysql_query($sql_insert_order2, $connect);
													$num_order2 = @mysql_num_rows($result_insert_order2);
													$data_order2= @mysql_fetch_array($result_insert_order2);
													
													if($num_order2 == 2){ 
														$val_order1 = $data_order2['order_number']."-IN".$data_order2['order_transport'];
														$val_order2 = $data_order2['order_number']."-PRE".$data_order2['order_transport'];
														
														$sql_order1 = "select * from order_tb where order_number = '".$data_order2['order_number']."' and order_type = 'IN' ";
														$result_order1 = @mysql_query($sql_order1, $connect);
														$data_o1= @mysql_fetch_array($result_order1);
														
														$order_total1 = $data_o1['order_total'];
														$order_id1 = $data_o1['order_id'];
														$order_tran1 = $data_o1['order_transport_status'];
														$order_dis1 = $data_o1['order_promotion'];
														$order_sum1 =$data_o1['order_total'] + $data_o1['order_transport_status'];


														$sql_order2 = "select * from order_tb where order_number = '".$data_order2['order_number']."' and  order_type = 'PRE' ";
														$result_order2 = @mysql_query($sql_order2, $connect);
														$data_o2= @mysql_fetch_array($result_order2);
														
														$order_total2 = $data_o2['order_total'];
														$order_id2 = $data_o2['order_id'];
														$order_tran2 = $data_o2['order_transport_status'];
														$order_dis2 = $data_o2['order_promotion'];
														$order_sum2 =$data_o2['order_total'] + $data_o2['order_transport_status'];
														
														$total_order = $order_total1 + $order_total2;
														
														$discount = $total_order - ($total_order * $order_dis1 / 100);
														
														$total_price = $discount + $order_tran1 + $order_tran2;
														
														$sql_update2 = "select * from order_product_tb where order_number = '".$data_order2['order_number']."' GROUP BY pro_id";
														$result_update2 = @mysql_query($sql_update2, $connect);
														$num_update2 =@mysql_num_rows($result_update2);
														
														for($i5=0;$i5<intval($num_update2);$i5++){
															
														$data_update2 =@mysql_fetch_array($result_update2);
														
														$arrProduct[$exV2][$i5] = $data_update2['pro_code'].":".$data_update2['order_p_color'].":".$data_update2['order_p_size'];
															
														}
														
													  
														
													
													}else{
														$val_order1 = $data_order2['order_number']."-".$data_order2['order_type'].$data_order2['order_transport'];
														$order_total1 = $data_order['order_total'];
														$order_id1 = $data_order['order_id'];
														$order_dis1 = $data_order['order_promotion'];
														$order_sum1 = $data_order['order_total'] + $data_order['order_transport_status'];

														$discount = $order_total1 - ($order_total1 * $order_dis1 / 100);

														$val_order2 = '';
														$total_price = $discount  + $data_order2['order_transport_status'];
														
														$sql_update2 = "select * from order_product_tb where order_number = '".$data_order2['order_number']."'";
														$result_update2 = @mysql_query($sql_update2, $connect);
														$num_update2 =@mysql_num_rows($result_update2);
														
														
														for($i5=0;$i5<intval($num_update2);$i5++){
															
														$data_update2 =@mysql_fetch_array($result_update2);
														
														$arrProduct[$exV2][$i5] = $data_update2['pro_code'].":".$data_update2['order_p_color'].":".$data_update2['order_p_size'];
															
														}
														
														
														
													}
													
													$tracking_number = "";
													
													$sql_check_order_status = "SELECT * FROM order_product_tb WHERE order_number = '".$data_order['order_number']."' ";
													$result_check_order_status =@mysql_query($sql_check_order_status, $connect);
													$num_check_order_status =@mysql_num_rows($result_check_order_status);
													for ($chk=1; $chk<=$num_check_order_status; $chk++) {
														$data_check_order_status =@mysql_fetch_array($result_check_order_status);
														
														if ($data_check_order_status['tracking_number'] != "") {
															$tracking_number[] = "T";
														} else {
															$tracking_number[] = "F";
														}
													}
													//print_r($tracking_number);
											  ?>
                                                    <a href="http://www.crosstwelfth.com/tmp/<?php echo $val_order1;?>.pdf" target="_blank"><?php echo $val_order1;?></a>
                                                    <?php if($val_order2 != '' ){?>
                                                    <div style="border-top:#ffffff 1px solid;">
                                                    
                                                    <a href="http://www.crosstwelfth.com/tmp/<?php echo $val_order2;?>.pdf" target="_blank"><?php echo $val_order2;?></a>
                                                    
										  </div>
										<?php } ?></td>
                                        <td align="center" bgcolor="#F5F5F5">
                                        
                                        
                                        
                                        
                                        
                                                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                                      <tr height="20">
                                                        <td width="150" bgcolor="#CCCCCC">รหัสสินค้า</td>
                                                        <td width="40" align="center" bgcolor="#CCCCCC">มีสินค้า</td>
                                                        <td width="40" align="center" bgcolor="#CCCCCC">สั่งสินค้า</td>
                                                      </tr>
                                                      <?php 
                                                      $num_readySend = 0;
                                                      $all_P = 0;
                                                                       //print_r($arrProduct);
                                                                        foreach($arrProduct as $y){
                                                                            foreach($y as $g){
                            
                                                                            
                                                                            $proEx = explode(':',$g);
                                                                            $sql_update3 = "select * from order_product_tb where order_number = '".$data_order['order_number']."'";
                                                                            $sql_update3 .= " and pro_code  = '".$proEx[0]."' and order_p_size  = '".$proEx[2]."'";
                                                                            $sql_update3 .= " and order_p_color  = '".$proEx[1]."'";
                                                                            $result_update3 = @mysql_query($sql_update3, $connect);
                                                                            $num_update3 =@mysql_num_rows($result_update3);
                                                                            $data_update3 =@mysql_fetch_array($result_update3);
                            
                                                                            if($num_update3 != 0){
                                                                                
                                                                            $sql_color = "select name from color_tb where c_code = '".$data_update3['order_p_color']."' ";
                                                                            $result_color = @mysql_query($sql_color, $connect);
                                                                            $data_color =@mysql_fetch_array($result_color);
                                                                            
                                                                            $sql_product_hand = "SELECT * FROM product_tb WHERE pid = '".$data_update3['pro_id']."' ";
                                                                            $result_product_hand =@mysql_query($sql_product_hand, $connect);
                                                                            $data_product_hand =@mysql_fetch_array($result_product_hand);
                                                                            
                                                                            $product_stock = $data_product_hand['p_stock'];
                                                                            //echo "p_stock ".$data_product_hand['p_stock']."<br>";
                                                                            
                                                                            $product_temp_stock = 0;
                                                                            
                                                                            $sql_temp_order_hand = "SELECT * FROM temp_order_product WHERE pid = '".$data_update3['pro_id']."' and buy_status = 'INSTOCK' ";
                                                                            $result_temp_order_hand =@mysql_query($sql_temp_order_hand, $connect);
                                                                            $num_temp_order_hand =@mysql_num_rows($result_temp_order_hand);
                                                                            for ($t_h=1; $t_h<=$num_temp_order_hand; $t_h++) {
                                                                                $data_temp_order_hand =@mysql_fetch_array($result_temp_order_hand);
                                                                                
                                                                                $product_temp_stock += $data_temp_order_hand['product_number'];
                                                                                
                                                                            }
                                                                            //echo "product_temp_stock ".$product_temp_stock."<br>";
                                                                        $product_temp_stock_pre = 0;
                                                                        $sql_temp_order_hand_pre = "SELECT * FROM temp_order_product WHERE pid = '".$data_update3['pro_id']."' and buy_status = 'PREORDER' ";
                                                                        $sql_temp_order_hand_pre .= "AND sent_status = 'READY'";
                                                                        $result_temp_order_hand_pre =@mysql_query($sql_temp_order_hand_pre, $connect);
                                                                        $num_temp_order_hand_pre =@mysql_num_rows($result_temp_order_hand_pre);
                                                                        
                                                                        for ($t_h2=1; $t_h2<=$num_temp_order_hand_pre; $t_h2++) {
                                                                            $data_temp_order_hand_pre =@mysql_fetch_array($result_temp_order_hand_pre);
                                                                            
                                                                            $product_temp_stock_pre += $data_temp_order_hand_pre['product_number'];
                                                                            
                                                                        }
																		
																		
																		$product_temp_stock_spare = 0;
																		$sql_temp_order_hand_spare = "SELECT * FROM temp_order_product WHERE pid = '".$data_update3['pro_id']."' and buy_status = 'SPARE' ";
																		$sql_temp_order_hand_spare .= "AND sent_status = 'READY'";
																		$result_temp_order_hand_spare =@mysql_query($sql_temp_order_hand_spare, $connect);
																		$num_temp_order_hand_spare =@mysql_num_rows($result_temp_order_hand_spare);
																		
																		for ($t_h3=1; $t_h3<=$num_temp_order_hand_spare; $t_h3++) {
																			$data_temp_order_hand_spare =@mysql_fetch_array($result_temp_order_hand_spare);
																			
																			$product_temp_stock_spare += $data_temp_order_hand_spare['product_number'];
																			
																		}
                            
                                                                            $product_send = 0;
                                                                            
                                                                            $sql_order_product_hand = "SELECT * FROM order_product_tb WHERE "; //order_number = '".$data_update3['order_number']."'
                                                                            $sql_order_product_hand .= " pro_id = '".$data_update3['pro_id']."' ";
                                                                            $result_order_product_hand =@mysql_query($sql_order_product_hand, $connect);
                                                                            $num_order_product_hand =@mysql_num_rows($result_order_product_hand);
                                                                            for ($o_h=1; $o_h<=$num_order_product_hand; $o_h++) {
                                                                                $data_order_product_hand =@mysql_fetch_array($result_order_product_hand);
                                                                                
                                                                                if ($data_order_product_hand['tracking_number'] != "") {
                                                                                    $product_send += $data_order_product_hand['order_p_stock'];
                                                                                }
                            
                                                                            }
                                                                            
                                                                            
                                                                            /*echo "product_stock ".$product_stock."<br>";
                                                                            echo "product_temp_stock ".$product_temp_stock."<br>";
                                                                            echo "product_temp_stock_pre ".$product_temp_stock_pre."<br>";*/
                                                                            
                                                                            //if ($data_update3['order_type'] == "IN") {
                                                                                $product_on_hand = ($product_stock + $product_temp_stock + $product_temp_stock_pre + $product_temp_stock_spare) - $product_send;
                                                                                //echo "(".$product_stock." + ".$product_temp_stock.") - ".$product_send;
                                                                            //} else if ($data_update3['order_type'] == "PRE") {
                                                                                //$product_on_hand = 0;
                                                                            //}
                            
                                                                            $order_p_stock = 0;
                            
                                                                            $sql_product_in_order = "SELECT * FROM order_product_tb WHERE order_number = '".$data_update3['order_number']."'";
                                                                            $sql_product_in_order .= " AND pro_id = '".$data_update3['pro_id']."' ";
                                                                            $result_product_in_order =@mysql_query($sql_product_in_order, $connect);
                                                                            $num_product_in_order =@mysql_num_rows($result_product_in_order);
                                                                            for ($o_h2=1; $o_h2<=$num_product_in_order; $o_h2++) {
                                                                                $data_product_in_order =@mysql_fetch_array($result_product_in_order);
                                                                                
                                                                                $order_p_stock += $data_product_in_order['order_p_stock'];
                                                                                    


                            
                                                                            }
                                                                        ?>
                                                      <tr height="20">
                                                        <td width="126" bgcolor="#FFFFFF">
<a href="#" onClick="processPopupLink(<?php echo $data_update3['pro_id'];?>);">                                                        
<?php echo $data_update3['pro_code']." ".$data_color['name']." ".$data_update3['order_p_size'].$data_product_hand['pro_code'];?></a>
                                                        </td>
                                                        <td width="48" align="center" bgcolor="#FFFFFF"><span style="color:#FF9900; font-weight:bold;" ><?php echo $product_on_hand;?></span></td>
                                                        <td width="56" align="center" bgcolor="#FFFFFF"><?php
                                                                          $sql_temp = "select * from temp_order_product where order_number = '".$data_order['order_number']."' ";
                                                                            $sql_temp .= "and pid  = '".$data_update3['pro_id']."'";
                                                                            $result_temp = @mysql_query($sql_temp, $connect);
                                                                            $data_temp =@mysql_fetch_array($result_temp);
                            
                                                                            if($data_temp['sent_status'] == 'READY'){
                                                                                $show_status =  "<font color=#00CC00>พร้อมส่ง</font>";
                                                                                $all_P = $all_P + 1;
                                                                            }else{
                                                                                $all_P = $all_P + 1;
                                                                                $kard = $data_temp['product_number'] - $data_temp['product_recive'];
                                                                                if($kard > 1 ){
                                                                                $disa = 1;
                                                                                $show_status =  "<font color=#FF0000>รอของ ขาด ".$kard." ตัว</font>";
                                                                                }else{
                                                                                $disa = 1;
                                                                                $show_status =  "<font color=#FF0000>รอของ ".$kard." ตัว</font>";
                                                                                }
                                                                            }
                                                                            echo " <b>".$order_p_stock."</b>";
                                                                        ?></td>
                                                      </tr>
                                                      <tr>
                                                        <input type="hidden" name="trackingProId[<?php echo $data_update3['order_p_id'];?>]" value="<?php echo $data_update3['order_p_id'];?>"/>
                                                        <?php $disa=0 ;} }  }
                                                                            
                                                                            
                                                                             unset($arrProduct);
                                                                             
                                                                            
                                                                             ?>
                                                      </tr>
                                                    </table>                                        
                                        
                                        
                                        
                                        
                                        
                                        </td>
                                        <td align="center" bgcolor="#F5F5F5">
										
                                         <?php echo $data_order['order_employee'] .
										 '<br />' . 
										 $data_order['order_phone'] .
										 '<br />' . 
										 "(<a href=edit_user.php?u_id=".$data_user['u_id']." target=_blank>".$data_user['u_user'] . "</a>)";?>
                                        </td>
                                        <td align="right" bgcolor="#F5F5F5">
										<?php 
                                        echo number_format($order_sum1);													
                                        ?>
                                        
                                        <?php if($val_order2 != '' ){?>
                                        <div style="border-top:#ffffff 1px solid;">
                                        
                                        <?php 
                                        echo number_format($order_sum2);													
                                        ?>
                                        
                                        </div>
                                        <?php } ?>
                                        </td>
                                        <td align="right" bgcolor="#F5F5F5"><?php echo ($data_order['order_promotion'] != '' ? $data_order['order_promotion']."%" : "" );?></td>
                                        <td align="right" bgcolor="#F5F5F5">
										<?php
										if($data_order['order_point']){
										echo $data_order['order_point'];
										$total_price = $total_price - $data_order['order_point'];
										}
										
										?></td>
                                        <td align="right" bgcolor="#F5F5F5">
                                        <?php echo number_format($total_price);?>
                                        </td>
                                        <td align="center" bgcolor="#F5F5F5">
                                        <?php 
												if (in_array("T", $tracking_number, true) && in_array("F", $tracking_number, true)) {
														echo "<font color=#F90>ค้างส่งสินค้าบางรายการ</font>";
												} else {
													if($data_order['order_status']==5){
														echo "<font color=#00FF00>แจ้งโอนเงิน/รอเช็คยอดเงิน</font>";
													}elseif($data_order['order_status']==0){
														echo "<font color=#6600CC>ยกเลิกใบสั่งซื้อ</font>";
													}elseif($data_order['order_status']==1){
														echo "<font color=#000000>รอชำระค่าสินค้า</font>";
													}elseif($data_order['order_status']==2){
														echo "<font color=#FF0000>ได้รับชำระเงินแล้ว/รอจัดส่งสินค้า</font>";
													}elseif($data_order['order_status']==3){
														echo "<font color=#0000FF>จัดส่งสินค้าเรียบร้อยแล้ว</font>";
													}elseif($data_order['order_status']==4){
														echo "<font color=#00CC00>Complete</font>";
                                                    }elseif($data_order['order_status']==6){
														echo "<font color=#00CC00>จัดส่งสินค้า/รอชำระเงินปลายทาง</font>";
													}
                                                    
												}
												?>s
                                        </td>
                                        <td align="center" bgcolor="#F5F5F5">                                        			
											<?php 
                                                if($data_order['tranfer_status']==1){
                                                    echo "<font color=#000000>โอนพอดี</font>";
                                                }elseif($data_order['tranfer_status']==2){
                                                    echo "<font color=red>โอนขาด</font>:".$data_order['tranfer_value'];
                                                }elseif($data_order['tranfer_status']==3){
                                                    echo "<font color=#FF6600>โอนเกิน</font>:".$data_order['tranfer_value'];
                                                }elseif($data_order['tranfer_status']==6){
                                                    echo "<font color=#000000>เก็บปลายทาง</font>";                                                    
                                                }
                                            ?>
                                        </td>
                                        <td bgcolor="#F5F5F5">
                                            <a href="edit_order.php?n=<?php echo $data_order['order_number'];?>" target="_blank">
                                            <img src="images/1343377813_Modify.png" alt="Edit" width="14" height="14" title="Edit"/></a>
                                            
                                            
                                            
                                          <!--<li><a href="new_order.php?id_del=<?php echo $data_order['order_number'];?>&amp;sAction=del" onClick="return confirm('Do you want to delete it. (yes/no)')"><img alt="Delete" src="images/1343378039_23-Full Trash.png" title="Delete"/></a></li>-->
                                              
                                            <?php if($val_order2 != '' ){?>
                                          <!--<div style="border-top:#ffffff 1px solid;">
                                            
                                            <a href="edit_order.php?n=<?php echo $data_order['order_number'];?>" target="_blank"><img src="images/1343377813_Modify.png" alt="Edit" width="14" height="14" title="Edit"/></a>
                                            
                                            </div>-->
                                            <?php } ?>
                                        <a href="order_comment.php?n=<?php echo $data_order['order_number'];?>" target="_blank">  
                                        <?php if($data_order['order_comment'] == '' ){?>  
                                        <img src="images/1.png" width="14" height="14" />
                                        <?php }else{ ?>
                                        <img src="images/2.png" width="14" height="14" />
                                        <?php } ?>
                                        </a>
										<?php if($data_order['link_url'] != '' ){?>  
                                          <a href="<?php echo $data_order['link_url'];?>" target="_blank">
                                            Link</a>
											 <?php } ?>
                                        </td>
                                      </tr>
									  <?php $val_order2 == '' ;} ?>
                                    </table>                                        </td>
                                      </tr>
                                    </table>

                                            

                                    
                                    <?php }?>
                                                
                                                

                                             <!--End ตาราง 3 Cell-->

                                   
                                          </div>
                                            <div class="bottom">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                            </div>
                                        </div>
										<!--End Coppy Module Clear--> </form>                                 



                    </div>
                    <div class="block_style2_bottom">
                        <div class="block_style2_bottom-l"></div>
                        <div class="block_style2_bottom-r"></div>
                    </div>  

                </div>
                <!-- End Block Frame-->
                                	<!-- -->
                                    <?php if($_POST['Search'] != 'Search' || 1 ==1){?>
                                  	<div class="page_number">
                                    	<div class="page_number-right">
                                            	<?php   $obj->_displayPage(); ?>
                                    	</div>
                                    </div>
                                    <?php } ?>
                                    <!-- -->
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
