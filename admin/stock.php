<?php
session_start();
require_once '../dbconnect.inc';

include("class.page_split.php");
$obj = new page_split();
$obj->_setPageSize(100);						
$obj->_setFile("new_color.php");		
$obj->_setPage($_GET['page']);		
if($_GET['page'] > 1){
	$f = 100*($_GET['page']- 1);
}

if($_SESSION['AUTH_PERMISSION_ID']=='') {
	header("Location:index.php");
}


if($_POST['save'] == '1'){


			
		$edit_product2 = "UPDATE product_tb SET p_spare = '".$_POST['p_spare']."'";
		$edit_product2 .= " where p_code = '".$_POST['p_code']."' and p_color = '".$_POST['p_color']."'";
		@mysql_query($edit_product2, $connect);
		//echo $edit_product2;
		

?>		 
		<script>
			location.href='stock.php?code=<?php echo $_POST['p_code'];?>&color=<?php echo $_POST['p_color'];?>'; //รีเฟสหน้า
		</script>
<?php
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
	<link rel="stylesheet" href="jquery_ui/development-bundle/demos/demos.css">
	<script>
	$(function() {
		$( "input:submit, a, button", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return false; });
	});
	</script>

<link href="cssstyle.css" rel="stylesheet" type="text/css" />
</head>

<body> 
<div class="page_container">
    <div class="shadow_l"></div>
	<div class="shadow_r"></div>  
    	<!--Header--> 
    	<?php include('header.php');?>
        <!--Header-->
        <div class="container_content">
            <!--Main Menu-->
          <?php //include('mainmenu.php');?>
            <!--End Main Menu-->

            
                                	<!--Edit Navigator-->
                                   <div class="navigator">
                                     <a href="product.php">Product</a>
                                        
                                   </div>
                                   <!--End Navigator-->            
				<?php
                $sql_category2 = "SELECT * FROM product_tb where p_code ='".$_GET['code']."' AND p_color = '".$_GET['color']."'  ORDER BY ranking";
                $result_category2 =@mysql_query($sql_category2, $connect);
                $data_category2 =@mysql_fetch_array($result_category2);
                ?>
            	<!--Block Frame-->
            	<div class="block_style2">
                	<div class="block_style2_top">
                    	<div class="block_style2_top-l"></div>
                        <div class="block_style2_top-r"></div>
                        <div class="block_style2_top-t" style="color:#000">
						<?php 
						$product_color = "select name from color_tb where c_code = '".$data_category2['p_color']."' ";
						$result_productcolor = @mysql_query($product_color, $connect);
						$data_categorycolor =@mysql_fetch_array($result_productcolor);
						
						echo $data_category2['p_category']." | ".$data_category2['p_code']." | ".$data_categorycolor['name'];?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo "Supplier ".$data_category2['p_supplier']." สั่งขั้นต่ำ ".$data_category2['p_minimum'];?>
                        </div>
                    </div>
                    <div class="block_style2_content">



                                   		<!--Coppy Module Clear-->
                                        <form action="stock.php" method="post" enctype="multipart/form-data" name="form1">
                                        <input type="hidden" name="p_code" value="<?php echo $data_category2['p_code'];?>" />
                                        <input type="hidden" name="p_color" value="<?php echo $data_category2['p_color'];?>" />
                                        <div class="module_3">
                                            <div class="title">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                <div class="t"><h2>
                                                </h2> </div>
                                                <div class="bt">
                                                	 
                                                </div>
                                            </div>
                                            <div class="conten">
                                                <!--ใสข้อมูล ตรงนี้-->
                                                <!--ตาราง 3 Cell-->
                                   <div class="title-top">
                                   <div class="right-title">
                                   <div class="form3">
                                   		
                                        <ul>
                                        <li>
                                            <input type="hidden" name="save" value="1" />
                                            <input type="image" src="images/save_all.png" alt="Save" name="Submit" value="Save" title="Save" style="width:52px; height:16px;" /> </li>         
                                        </ul>
                                        
                                   </div>
                                   </div>
                                   
                                   </div>
                                        
                                        
                                        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-color:#999">
                                          <tr>
                                            <td height="25" align="center">ลำดับ</td>
                                            <td align="center">Size</td>
                                            <td align="center">Color</td>
                                            <td align="center">In-Stock</td>
                                            <td align="center">In Stock(จอง)</td>
                                            <td align="center">Pre(พร้อมส่ง)</td>
                                            <td align="center">On hand</td>
                                            <td align="center">Pre-Order</td>
                                            <td align="center">Pre(จอง)</td>
                                            <td align="center">Make</td>
                                            <td align="center">Spare</td>
                                            <td align="center">Spare (จอง)</td>
                                            <td align="center">สั่งผลิต/รับสินค้า</td>
                                            <td align="center">ชำรุด</td>
                                          </tr>
                                            <?php
											$sql_category = "SELECT product_tb.* FROM product_tb LEFT JOIN category_tb ON category_tb.name = product_tb.p_category	LEFT JOIN size_tb ON category_tb.cid = size_tb.cid AND size_tb.name = product_tb.p_size   
											where product_tb.p_code ='".$_GET['code']."' AND product_tb.p_color = '".$_GET['color']."' ORDER BY size_tb.ranking";
											$result_category =@mysql_query($sql_category, $connect);
											$num_category =@mysql_num_rows($result_category);
											
											for($i=1;$i<=intval($num_category);$i++){
											$data_category =@mysql_fetch_array($result_category);
											?>
                                            
                                          <tr>
                                            <td height="25" align="center"><?php echo $f+$i;?></td>
                                            <td align="center"><?php echo $data_category['p_size']; ?></td>
                                            <td align="center">
											
											<?php 
											$product_color2 = "select name from color_tb where c_code = '".$data_category['p_color']."' ";
											$result_productcolor2 = @mysql_query($product_color2, $connect);
											$data_categorycolor2 =@mysql_fetch_array($result_productcolor2);

											
											echo $data_categorycolor2['name']; 
											
											
											?>
                                            
                                            
                                            </td>
                                            <td align="center"><?php echo $data_category['p_stock']; ?></td>
                                            <td align="center">
											<?php
                                            $product_send2 = 0;	 
                                            $product_on_hand2 = 0;
                                            
                                            $sql_count_sale = "select sum(product_number) as count_sale from temp_order_product where pid = '".$data_category['pid']."'";
                                            $sql_count_sale .= " and buy_status = 'INSTOCK'";
                                            $result_count_sale = @mysql_query($sql_count_sale, $connect);
                                            $data_count_sale = @mysql_fetch_array($result_count_sale);
                                            //echo $data_count_sale['count_sale'];
                                            
                                            $sql_order_product_hand2 = "SELECT * FROM order_product_tb WHERE pro_id = '".$data_category['pid']."' and order_type = 'IN' ";
                                            $result_order_product_hand2 =@mysql_query($sql_order_product_hand2, $connect);
                                            $num_order_product_hand2 =@mysql_num_rows($result_order_product_hand2);
                                            
                                            
                                            for ($o_h2=1; $o_h2<=$num_order_product_hand2; $o_h2++) {
                                            $data_order_product_hand2 =@mysql_fetch_array($result_order_product_hand2);
                                            
                                            if ($data_order_product_hand2['tracking_number'] != "") {
                                            $product_send2 = $product_send2 + $data_order_product_hand2['order_p_stock'];
                                            }
                                            
                                            }
                                            
                                            $product_on_hand2 = $data_count_sale['count_sale']- $product_send2;
                                            
                                            echo $product_on_hand2;
                                            ?>
                                            
                                            </td>
											<td align="center">
										   <?php
                                            
                                            $sql_buy_preorder1 = "SELECT sum(product_recive) as count_revPreorder FROM temp_order_product";
											$sql_buy_preorder1 .= " where pid ='".$data_category['pid']."'";
                                            $sql_buy_preorder1 .= " AND buy_status = 'PREORDER' AND sent_status = 'READY'";
                                            $result_buy_preorder1 =@mysql_query($sql_buy_preorder1, $connect);
                                            $data_buy_preorder1 =@mysql_fetch_array($result_buy_preorder1);

                                            $sql_buy_spare1 = "SELECT sum(product_recive) as count_revSpare FROM temp_order_product";
											$sql_buy_spare1 .= " where pid ='".$data_category['pid']."'";
                                            $sql_buy_spare1 .= " AND buy_status = 'SPARE' AND sent_status = 'READY'";
                                            $result_buy_spare1 =@mysql_query($sql_buy_spare1, $connect);
                                            $data_buy_spare1 =@mysql_fetch_array($result_buy_spare1);
											
											//echo $data_buy_spare1['count_revSpare'];
											
											$productPre_on_hand2 = 0;
											$productPre_send2 = 0;
											
											$sql_order_preorder2 = "SELECT * FROM order_product_tb WHERE pro_id = '".$data_category['pid']."' and order_type = 'PRE'";
											$result_order_preorder2 =@mysql_query($sql_order_preorder2, $connect);
											$num_order_preorder2 =@mysql_num_rows($result_order_preorder2);
											
											
											for ($pre=1; $pre<=$num_order_preorder2; $pre++) {
												$data_order_preorder2 =@mysql_fetch_array($result_order_preorder2);
												
												if ($data_order_preorder2['tracking_number'] != "") {
													$productPre_send2 = $productPre_send2 + $data_order_preorder2['order_p_stock'];
												}

											}
											
											$productPre_on_hand2 = ($data_buy_preorder1['count_revPreorder']- $productPre_send2)+$data_buy_spare1['count_revSpare'];
											
											
											
											//echo $data_buy_preorder1['count_revPreorder']."<br>";
											//echo $productPre_send2."<br>";
											//echo $productPre_on_hand2."<br>";
											
                                            echo ($productPre_on_hand2 == '' ? "0" : $productPre_on_hand2);
                                            
                                            
                                            ?>
										   </td>
                                           <td align="center">
                                           
												<?php
												$sql_product_hand = "SELECT * FROM product_tb WHERE pid = '".$data_category['pid']."' ";
												$result_product_hand =@mysql_query($sql_product_hand, $connect);
												$data_category_hand =@mysql_fetch_array($result_product_hand);
												
												$product_stock = $data_category_hand['p_stock'];
												//echo "p_stock ".$data_category_hand['p_stock']."<br>";
												
												$product_temp_stock = 0;
												
												$sql_temp_order_hand = "SELECT product_number FROM temp_order_product WHERE pid = '".$data_category['pid']."' and buy_status = 'INSTOCK' ";
												$result_temp_order_hand =@mysql_query($sql_temp_order_hand, $connect);
												$num_temp_order_hand =@mysql_num_rows($result_temp_order_hand);
												
												
												for ($t_h=1; $t_h<=$num_temp_order_hand; $t_h++) {
													$data_temp_order_hand =@mysql_fetch_array($result_temp_order_hand);
													
													$product_temp_stock += $data_temp_order_hand['product_number'];
													
												}
												
												
												$product_temp_stock_pre = 0;
												$sql_temp_order_hand_pre = "SELECT product_recive FROM temp_order_product WHERE pid = '".$data_category['pid']."' and buy_status = 'PREORDER' ";
												$sql_temp_order_hand_pre .= "AND product_recive > 0";
												$result_temp_order_hand_pre =@mysql_query($sql_temp_order_hand_pre, $connect);
												$num_temp_order_hand_pre =@mysql_num_rows($result_temp_order_hand_pre);
												
												for ($t_h2=1; $t_h2<=$num_temp_order_hand_pre; $t_h2++) {
													$data_temp_order_hand_pre =@mysql_fetch_array($result_temp_order_hand_pre);
													
													$product_temp_stock_pre += $data_temp_order_hand_pre['product_recive'];
													
												}


												$product_temp_stock_spare = 0;
												$sql_temp_order_hand_spare = "SELECT product_recive FROM temp_order_product WHERE pid = '".$data_category['pid']."' and buy_status = 'SPARE' ";
												$sql_temp_order_hand_spare .= "AND product_recive > 0";
												$result_temp_order_hand_spare =@mysql_query($sql_temp_order_hand_spare, $connect);
												$num_temp_order_hand_spare =@mysql_num_rows($result_temp_order_hand_spare);
												
												for ($t_h3=1; $t_h3<=$num_temp_order_hand_spare; $t_h3++) {
													$data_temp_order_hand_spare =@mysql_fetch_array($result_temp_order_hand_spare);
													
													$product_temp_stock_spare += $data_temp_order_hand_spare['product_recive'];
													
												}
												
												//echo "product_temp_stock ".$product_temp_stock."<br>";
												
												$product_send = 0;
												
												$sql_order_product_hand = "SELECT * FROM order_product_tb WHERE "; //order_number = '".$data_update3['order_number']."'
												$sql_order_product_hand .= " pro_id = '".$data_category['pid']."' ";
												$result_order_product_hand =@mysql_query($sql_order_product_hand, $connect);
												$num_order_product_hand =@mysql_num_rows($result_order_product_hand);
												for ($o_h=1; $o_h<=$num_order_product_hand; $o_h++) {
													$data_order_product_hand =@mysql_fetch_array($result_order_product_hand);
													
													if ($data_order_product_hand['tracking_number'] != "") {
														$product_send += $data_order_product_hand['order_p_stock'];
													}

												}
												//echo "sql_order_product_hand ".$sql_order_product_hand."<br>";
												

													$product_on_hand = ($product_stock + $product_temp_stock + $product_temp_stock_pre + $product_temp_stock_spare) - $product_send;

												
												echo $product_on_hand;
                                           ?>
                                           
                                           </td>
                                            <td align="center"><?php echo $data_category['p_pre']; ?></td>
                                            <td align="center">
											<?php
                                            $sql_buy_preorder = "SELECT sum(product_number) as count_buyPreorder FROM temp_order_product where pid ='".$data_category['pid']."'";
                                            $sql_buy_preorder .= " AND buy_status = 'PREORDER' AND sent_status = 'RESERVE'";
                                            $result_buy_preorder =@mysql_query($sql_buy_preorder, $connect);
                                            $data_buy_preorder =@mysql_fetch_array($result_buy_preorder);
                                            echo $data_buy_preorder['count_buyPreorder'];
                                            ?>
                                            </td>
                                            <td align="center" lign="center">
											<?php
                                            $realTotal = 0;
                                            
                                            $sql_manu = "SELECT num_product  FROM manufacture_tb where pid ='".$data_category['pid']."' and order_status = '0'";
                                            $result_manu =@mysql_query($sql_manu, $connect);
                                            $num_manu =@mysql_num_rows($result_manu);
                                            
                                            for($i3=1;$i3<=intval($num_manu);$i3++){
                                            $data_manu =@mysql_fetch_array($result_manu);
                                            
                                            $realTotal = $realTotal + $data_manu['num_product'];
                                            
                                            }
                                            
                                            
                                            echo $realTotal;
                                            $realTotal = 0;
                                            ?>                                            
											</td>
                                            <?php if($i == 1){?>
                                            <td rowspan="<?php echo $num_category;?>" align="center">
                                            <input name="p_spare" type="text" id="p_spare " style="width:30px; text-align:right;" value="<?php echo $data_category['p_spare'];?>">
                                            <input name="p_code" type="hidden"  value="<?php echo $data_category['p_code'];?>">
                                            </td>
                                            <?php } ?>
                                            <td  align="center">
											<?php
                                            $sql_buy_spare = "SELECT sum(product_number-product_recive) as count_buySpare FROM temp_order_product where pid ='".$data_category['pid']."'";
                                            $sql_buy_spare .= " AND buy_status = 'SPARE' AND sent_status = 'RESERVE'";
                                            $result_buy_spare =@mysql_query($sql_buy_spare, $connect);
                                            $data_buy_spare =@mysql_fetch_array($result_buy_spare);
                                            echo $data_buy_spare['count_buySpare'];
                                            ?>
                                            </td>
                                            <td align="center"><a href="manufacture.php?pid=<?php echo $data_category['pid'];?>" ><img alt="Edit" src="images/1343378527_add1-.png" title="Review"/></a></td>
                                            <td align="center"><a href="wornout.php?pid=<?php echo $data_category['pid'];?>" ><img alt="Edit" src="images/1343378527_add1-.png" title="Review"/></a></td>
                                          </tr>
                                            <? } ?>
                                        </table>
                                	<!-- -->
                                  	<div class="page_number">
                                    	<div class="page_number-right">
                                        
                                            	
                                    	</div>
                                    </div>   
                                    <!-- -->


                                            
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
