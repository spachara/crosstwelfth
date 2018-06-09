<?php
session_start();
require_once '../../dbconnect.inc';



$sql_product = "SELECT * FROM product_tb where pid = '".$_GET['id']."'";
$result_product = @mysql_query($sql_product,$connect);
$data_product = @mysql_fetch_array($result_product);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K8BH2BP');</script>
<!-- End Google Tag Manager -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross Twelfth</title>
<link rel="shortcut icon" type="image/x-icon" href="../../images/favicon.ico">
<link href="../../css.css" rel="stylesheet" type="text/css" />
<script>
	document.createElement('header');
	document.createElement('nav');
	document.createElement('section');
	document.createElement('article');
	document.createElement('footer');
	document.createElement('hgroup');
	
</script>
<!--Accordion-->
<link rel="stylesheet" href="../../css/accordion/accordion-style.css" type="text/css">
<!--End Accordion-->  


<script type="text/javascript">
function processPopupLink(){
$(document).ready(function() {
	$.fancybox({
				href : 'popup.php',
				type : 'iframe',
				width     : 350,
				height    : 300,
				minWidth  : 100,
				minHeight : 300,
				maxWidth  : 350,
				maxHeight : 9999,
				padding : 5
			});
		
	});
}

</script>


<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '382803885229241'); // Insert your pixel ID here.
fbq('track', 'PageView');

fbq('track', 'ViewContent', {
  content_ids: [<?php echo $_GET['id']  );?>],
  content_type: 'product',
  value: <?php echo $data_product['p_price'] );?>,
  currency: 'THB
});
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=382803885229241&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
 
</head>

<body>

<?php include('../../include/header.php') ?>
<section class="container">
	<section class="container_content">
    	<?php include('../../include/blogMember.php') ?>
    	<section class="paragraph overflowNone">
        	<section class="showProduct">
                <div class="boxShow-case2_pic-content">
                    <section>
                    <?php
					$chk_pic1 = "../../images/products/".$data_product['p_code']."/".$data_product['p_color']."/01.jpg";
					$chk_pic2 = "../../images/products/".$data_product['p_code']."/".$data_product['p_color']."/02.jpg";
					$chk_pic3 = "../../images/products/".$data_product['p_code']."/".$data_product['p_color']."/03.jpg";
					$chk_pic4 = "../../images/products/".$data_product['p_code']."/".$data_product['p_color']."/04.jpg";
					$chk_pic5 = "../../images/products/".$data_product['p_code']."/".$data_product['p_color']."/05.jpg";

					?>
                            <a href="<?php echo $chk_pic1;?>"  class="MagicZoom" id="Zoomer" rel="zoom-width:580;zoom-height:350; zoom-id:Zoomer;show-title: false;" title="">
                                <img src="<?php echo $chk_pic1;?>" width="300" >
                            </a>                            

                    </section>                                	
                </div>
                <section class="listThumb" id="thumblist">
                    <ul >
                    <?php
						if(@getimagesize($chk_pic1)){
					?>
                        <li>
                        	<a href="<?php echo $chk_pic1;?>" rel="zoom-width:580;zoom-height:350; zoom-id:Zoomer;" rev="<?php echo $chk_pic1;?>" >                        	
                            	<img src="<?php echo $chk_pic1;?>"/>
                            </a>
                        </li>
                     <?php } ?>
                    <?php
						if(@getimagesize($chk_pic2)){
					?>
                        <li>
                        	<a href="<?php echo $chk_pic2;?>" rel="zoom-width:580;zoom-height:350; zoom-id:Zoomer;" rev="<?php echo $chk_pic2;?>" >                        	
                            	<img src="<?php echo $chk_pic2;?>"/>
                            </a>
                        </li>
                     <?php } ?>
                    <?php
						if(@getimagesize($chk_pic3)){
					?>
                        <li>
                        	<a href="<?php echo $chk_pic3;?>" rel="zoom-width:580;zoom-height:350; zoom-id:Zoomer;" rev="<?php echo $chk_pic3;?>" >                        	
                            	<img src="<?php echo $chk_pic3;?>"/>
                            </a>
                        </li>
                     <?php } ?>
                    <?php
						if(@getimagesize($chk_pic4)){
					?>
                        <li>
                        	<a href="<?php echo $chk_pic4;?>" rel="zoom-width:580;zoom-height:350; zoom-id:Zoomer;" rev="<?php echo $chk_pic4;?>" >                        	
                            	<img src="<?php echo $chk_pic4;?>"/>
                            </a>
                        </li>
                     <?php } ?>
                    <?php
						if(@getimagesize($chk_pic5)){
					?>
                        <li>
                        	<a href="<?php echo $chk_pic5;?>" rel="zoom-width:580;zoom-height:350; zoom-id:Zoomer;" rev="<?php echo $chk_pic5;?>" >                        	
                            	<img src="<?php echo $chk_pic5;?>"/>
                            </a>
                        </li>
                     <?php } ?>
                        
                    </ul>
                </section>
            </section>
            
   			<form action="../../shopping-bag/index.php" method="post">
            <section class="detailProduct">
            	<section id="example-two">
                    <section class="menuTap">
                        <ul class="nav">
                            <li><a href="#detail" class="current">Detail</a></li>
                        </ul>
                    </section>
                    <section class="paragraph02" id="detail">
                    	<section class="heightlight">
                        	<div>Code :</div> <span><?php echo $data_product['p_code'];?></span>
                        </section>
                        <section class="heightlight">
                        	<div>Name :</div> <span>
                                <?php
                                echo ($_SESSION['sess_language'] == 'eng' ? str_replace("+", "",$data_product['name_eng']) : str_replace("+", "",$data_product['name']));   
								?>
                            </span>
                        </section>
                        <article class="paragraph03 contentproduct">
                        	<?php 
							echo ($_SESSION['sess_language'] == 'eng' ? str_replace("+", "",$data_product['p_details_eng']) : str_replace("+", "",$data_product['p_details']));
							?>
                        </article>
                           <section class="heightlight">
                        	<div>Color :</div>
                                </section>
                        <section class="blogColor">
                             
                            <section>
								<?php
                                $sql_color = "SELECT pt.pid, c.color_code, c.c_code FROM product_tb as pt, color_tb as c where pt.p_category = '".$data_product['p_category']."' AND pt.p_code = '".$data_product['p_code']."'";
                                $sql_color .= "AND pt.ranking = 1 AND pt.p_color = c.c_code GROUP BY c.c_code ORDER BY pid desc";
                                $result_color = @mysql_query($sql_color,$connect);
                                $num_color =@mysql_num_rows($result_color);
                                //echo $sql_color;
								for($col=1;$col<=intval($num_color);$col++){
								$data_color =@mysql_fetch_array($result_color);
                               ?>
                                <a href="?id=<?php echo $data_color['pid'];?>">
                            	<div style="background:#<?php echo $data_color['color_code'];?>;"></div>
                                </a>
                                <?php } ?>
                                
                            </section>
                        </section>
                           <section class="heightlight">
                        	<div>Size :</div> 
                                </section>
                        <section class="choiceDetail">
								<?php
								
                                $sql_size = "SELECT p.* FROM product_tb as p, size_tb as s, category_tb as c where c.name = p.p_category and c.cid = s.cid AND ";
								$sql_size .= "p.p_category = '".$data_product['p_category']."' AND p.p_code = '".$data_product['p_code']."'";
                                $sql_size .= " AND p.p_color = '".$data_product['p_color']."' AND p.p_size = s.name GROUP BY p.p_size ORDER BY s.ranking";
                                $result_size = @mysql_query($sql_size,$connect);
								
                                $result_size2 = @mysql_query($sql_size,$connect);
                                $result_size3 = @mysql_query($sql_size,$connect);
                                $result_size4 = @mysql_query($sql_size,$connect);
                                $result_size5 = @mysql_query($sql_size,$connect);
                                $result_size6 = @mysql_query($sql_size,$connect);


                                $num_size =@mysql_num_rows($result_size);
								
								for($g=1;$g<=intval($num_size);$g++){
								$data_g =@mysql_fetch_array($result_size5);
									$ans_pid .= "'".$data_g['pid']."',";
									$ans_spare = $data_g['p_spare'];
								}
								
								$ans_pid = substr($ans_pid,0,-1);
								
								$sql_count_spare = "select sum(product_number) as order_spareStock from temp_order_product where pid in (".$ans_pid.")";
								$sql_count_spare .= " and buy_status = 'SPARE' AND sent_status = 'RESERVE'";
								$result_count_spare = @mysql_query($sql_count_spare,$connect);
								$num_count_spare =@mysql_num_rows($result_count_spare);
								$data_count_spare =@mysql_fetch_array($result_count_spare);
								
								if($data_count_spare['order_spareStock'] != 0 && $data_count_spare['order_spareStock'] != '' ){

									$SPAREtock = $ans_spare - $data_count_spare['order_spareStock'];
								
									if($SPAREtock == 0){
										$finishSpare = "OUT";
									}else{
										$finishSpare = "";
									}
								}
								
								
								
                                //echo $sql_size;
                                ?>
                             <section class="heightlight">
                        
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tableSize2">
                            	
								<?php
                                for($t4=1;$t4<=intval($num_size);$t4++){
                                $data_size4 =@mysql_fetch_array($result_size4);
								
                                echo "<tr>";
								
								
								if($data_size4['armlength'] != '' || $data_size4['set_waist'] != '' ||
								$data_size4['set_hip'] != '' || $data_size4['set_length'] != '' ||
								$data_size4['set_waist_skirts'] != '' || $data_size4['set_hip_skirts'] != '' ||
								$data_size4['set_length_skirts'] != ''){
								
								echo "<td class=first2>".($data_size4['p_size'] != '' ? "<b>".$data_size4['p_size']."</b>" : "")."</td>";
								echo "<td>";
								echo ($data_size4['shoulder'] != '' ? " ไหล่ : ".$data_size4['shoulder']."" : "");
								echo ($data_size4['arm'] != '' ? " รอบแขน : ".$data_size4['arm'] : "");
								echo ($data_size4['armlength'] != '' ? " ความยาวแขน : ".$data_size4['armlength'] : "");
								echo ($data_size4['breast'] != '' ? " อก : ".$data_size4['breast'] : "");
								echo ($data_size4['waist'] != '' ? " เอว : ".$data_size4['waist'] : "");
								echo ($data_size4['hip'] != '' ? " สะโพก : ".$data_size4['hip'] : "");
								echo ($data_size4['alllength'] != '' ? " ความยาว : ".$data_size4['alllength'] : "");
								echo "<br>";
								echo ($data_size4['shoulder_waist'] != '' ? " ไหล่-เอว : ".$data_size4['shoulder_waist'] : "");
								echo ($data_size4['shoulder_crotch'] != '' ? " ไหล่-เป้า : ".$data_size4['shoulder_crotch'] : "");
								echo ($data_size4['waist_end'] != '' ? " เอว-ปลาย : ".$data_size4['waist_end'] : "");
								echo ($data_size4['waist_crotch'] != '' ? " เอว-เป้า : ".$data_size4['waist_crotch'] : "");
								echo ($data_size4['thigh'] != '' ? " ต้นขา : ".$data_size4['thigh'] : "");
								
								//echo "<br>";
								echo ($data_size4['set_waist'] != '' ? " เอวกางเกง : ".$data_size4['set_waist'] : "");
								echo ($data_size4['set_hip'] != '' ? " สะโพกกางเกง : ".$data_size4['set_hip'] : "");
								echo ($data_size4['set_length'] != '' ? " ความยาวกางเกง : ".$data_size4['set_length'] : "");
								echo ($data_size4['set_waist_skirts'] != '' ? " เอวกระโปรง : ".$data_size4['set_waist_skirts'] : "");
								echo ($data_size4['set_hip_skirts'] != '' ? " สะโพกกระโปรง : ".$data_size4['set_hip_skirts'] : "");
								echo ($data_size4['set_length_skirts'] != '' ? " ความยาวกระโปรง : ".$data_size4['set_length_skirts'] : "");

								echo "</td>";
								
								}else{
									
								echo "<td class=first2>".($data_size4['p_size'] != '' ? "<b>".$data_size4['p_size']."</b>" : "")."</td>";
								echo "<td>";
								echo ($data_size4['shoulder'] != '' ? " ไหล่ : ".$data_size4['shoulder']."" : "");
								echo ($data_size4['arm'] != '' ? " รอบแขน : ".$data_size4['arm'] : "");
								echo ($data_size4['armlength'] != '' ? " ความยาวแขน : ".$data_size4['armlength'] : "");
								echo ($data_size4['breast'] != '' ? " อก : ".$data_size4['breast'] : "");
								echo ($data_size4['waist'] != '' ? " เอว : ".$data_size4['waist'] : "");
								echo ($data_size4['hip'] != '' ? " สะโพก : ".$data_size4['hip'] : "");
								echo ($data_size4['alllength'] != '' ? " ความยาว : ".$data_size4['alllength'] : "");
								echo "<br>";
								echo ($data_size4['shoulder_waist'] != '' ? " ไหล่-เอว : ".$data_size4['shoulder_waist'] : "");
								echo ($data_size4['shoulder_crotch'] != '' ? " ไหล่-เป้า : ".$data_size4['shoulder_crotch'] : "");
								echo ($data_size4['waist_end'] != '' ? " เอว-ปลาย : ".$data_size4['waist_end'] : "");
								echo ($data_size4['waist_crotch'] != '' ? " เอว-เป้า : ".$data_size4['waist_crotch'] : "");
								echo ($data_size4['thigh'] != '' ? " ต้นขา : ".$data_size4['thigh'] : "");
								
								echo "</td>";
								}
								echo "</tr>";
								
                                } 
								echo "</table>";
								?>
                                
                            </table>

                        </section>
                                <select name="pro_id" id="pro_id" onchange="chkPro()">
                                
                                    <?php

                                    for($s=1;$s<=intval($num_size);$s++){
                                    $data_size =@mysql_fetch_array($result_size);
									
									?>
                                      <option value="<?php echo $data_size['pid'];?>" 
									  <?php echo ($data_product['p_size'] == $data_size['p_size'] ? "selected=selected" : "" );?>>
									  <?php echo $data_size['p_size'];?>-
									  <?php 
                                      if ($data_size['p_special'] != 0 && $data_size['p_clearance'] == 0) {
                                        echo $data_size['p_special'];  
                                      }elseif($data_size['p_clearance'] != 0){
                                        echo $data_size['p_clearance'];
                                      }else{
                                        echo $data_size['p_price'];
                                      }
                                      ?>							  
                                       Baht-
									  <?php 
									  
									  if($data_size['p_stock'] != '0'){
                                          echo "Ready to ship สินค้าพร้อมส่ง";
                                      }elseif($finishSpare == 'OUT' && $data_size['p_stock'] == '0' && $data_size['p_pre'] == '0'){
                                          echo  "Out of stock สินค้าหมดสต๊อก";
									  }elseif($data_size['p_stock'] == '0' && $data_size['p_pre'] != '0'){
                                          echo  "Preorder จัดส่ง 15 วัน หลังชำระเงิน";
									  }elseif($data_size['p_pre'] == '0' && $data_size['p_spare'] != '0'){
                                          echo  "Preorder จัดส่ง 15 วัน หลังชำระเงิน";
                                      }elseif($data_size['p_stock'] == '0' && $data_size['p_pre'] == '0'  && $data_size['p_spare'] == '0' ){
                                          echo  "Out of stock สินค้าหมดสต๊อก";
                                      }?>
                                       </option>
                                    <?php } ?>
                                </select>  <font color="#000" style="font-weight: bold;font-family: 'arundina_sansregular'; font-size:16px;"> เลือกไซส์สินค้าที่ต้องการ</font> 
                        </section>
                        <?php
						$sql_stock = "SELECT * FROM product_tb where p_category = '".$data_product['p_category']."' AND p_code = '".$data_product['p_code']."'";
						$sql_stock .= " AND p_color = '".$data_product['p_color']."' GROUP BY p_size ORDER BY pid desc Limit 0,1";
						$result_stock = @mysql_query($sql_stock,$connect);
						$data_stock =@mysql_fetch_array($result_stock);
						?>
                        <!--inStock <input name="inStock" id="inStock" type="text" value="<?php echo $data_stock['p_stock'];?>" /><br />
						preStock <input name="preStock" id="preStock" type="text" value="<?php echo $data_stock['p_pre'];?>" /><br />-->

                        <section class="paragraph03 buttonProducts">
                        
                        	<section>
                            <?php if($data_product['p_stock'] == '0' && $data_product['p_pre'] == '0' && $data_product['p_spare'] == '0'){?>
                            	<input name="addtocart" id="addtocart" type="submit" value="Out of stock" disabled="disabled" />
                            <?php }else{ ?>
                            	<input name="addtocart" id="addtocart" type="submit" value="Add to Cart" />
                            <?php } ?>
                                
                            </section>
                         </section>   
                            
                        <section class="heightlight buttonProducts">
                            <section class="wait" >
                                <?php if($_SESSION['AUTH_PERMISSION_MEMID'] != ''){
								$select_waitlist = "SELECT * FROM waitlist_product_tb WHERE pro_id = '".$_GET['id']."' and u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."'";
								$result_waitlist =@mysql_query($select_waitlist, $connect);
								$num_waitlist =@mysql_num_rows($result_waitlist);
								?>
                            	<input name="Waitlist" type="button" value="Waitlist" onClick="window.location='addwaitlist.php?pro_id=<?php echo $_GET['id'];?>';"  <?php echo ($num_waitlist > 0 ? "disabled=disabled" : "" );?>>
                                <?php }else{ ?>
                            	<input name="Waitlist" type="button" value="Waitlist" onClick="processPopupLink();" >
								<?php } ?>
                            </section>
                            <section>
                            	
                                <?php if($_SESSION['AUTH_PERMISSION_MEMID'] != ''){
								$select_wishlist = "SELECT * FROM wishlist_product_tb WHERE pro_id = '".$_GET['id']."' and u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."'";
								$result_wishlist =@mysql_query($select_wishlist, $connect);
								$num_wishlist =@mysql_num_rows($result_wishlist);
								?>
                                <?php if($num_wishlist == 0){?><a href="addwishlist.php?pro_id=<?php echo $_GET['id'];?>">
                            		<img alt="Wish List" title="Wish List" src="images/wishlist.jpg" class="normal" />
                                    <img alt="Wish List" title="Wish List" src="images/wishlist-hover.jpg" class="hover" />
                               </a><?php }else{?><img alt="Wish List" title="Wish List" src="images/wishlist-hover.jpg" class="hover" />
                               <?php } ?>
                                <?php }else{ ?>
                                <a href="#" onClick="processPopupLink();">
                                <img alt="Wish List" title="Wish List" src="images/wishlist.jpg" class="normal" />
                                <img alt="Wish List" title="Wish List" src="images/wishlist-hover.jpg" class="hover" />
                                </a>
                                <?php } ?>
                            </section>
                        </section>
                        
                        
                        
<section class="paragraph03">
                    <!--Accordion-->
                    <div id="body">
                    <!-- panel -->
                        <div class="accordion">Overview<span></span></div>
                        <div class="container">
                            <div class="content">
                                <?php
                                echo ($_SESSION['sess_language'] == 'eng' ? $data_product['p_overview_eng'] : $data_product['p_overview']);   
								?>
                            </div>
                        </div>
                    <!-- end panel -->
                    <!-- panel -->
                        <div class="accordion">info<span></span></div>
                        <div class="container">
                            <div class="content">
                                <?php

                                echo ($_SESSION['sess_language'] == 'eng' ? $data_product['p_info_eng'] : $data_product['p_info']);   
								?>
                            </div>
                        </div>
                    <!-- end panel -->
                    <!-- panel -->
                        <div class="accordion">Delivery<span></span></div>
                        <div class="container">
                            <div class="content">
                                <?php
								$sql_deliveryproduct = "SELECT * FROM txt_tb WHERE type_name = 'deliveryproduct'";
								$result_deliveryproduct =@mysql_query($sql_deliveryproduct, $connect);
								$data_deliveryproduct =@mysql_fetch_array($result_deliveryproduct);
								
                                
                                echo ($_SESSION['sess_language'] == 'eng' ? $data_deliveryproduct['txt_detail_eng'] : $data_deliveryproduct['txt_detail_th']);   

								?>
                            </div>
                        </div>
                    <!-- end panel -->
                    <!-- panel -->
                        <div class="accordion">Return & Exchanges<span></span></div>
                        <div class="container">
                            <div class="content">
                                <?php
								$sql_return = "SELECT * FROM txt_tb WHERE type_name = 'return'";
								$result_return =@mysql_query($sql_return, $connect);
								$data_return =@mysql_fetch_array($result_return);
								
                                
                                echo ($_SESSION['sess_language'] == 'eng' ? $data_return['txt_detail_eng'] : $data_return['txt_detail_th']);   

								?>
                            </div>
                        </div>
                    <!-- end panel -->
                    </div>
                    <!--End Accordion-->
                </section>                        
                        
                    </section>
                    
                </section>
                                
            </section>
            
            </form>
            <div class="clear"></div>
        </section>
        
        <section class="paragraph03">
		<?php
        $sql_other = "SELECT * FROM product_tb where p_category = '".$data_product['p_category']."' AND p_code = '".$data_product['p_code']."' AND ranking = 1 GROUP BY p_color  ORDER BY pid desc";
        $result_other =  @mysql_query($sql_other,$connect);
        $num_other =@mysql_num_rows($result_other);

		if($num_other > 1){?>
        	<hgroup class="titleModule">
            	<h2>Other Color</h2>
            </hgroup>
            <section class="paragraph03 thumbList">
                <section class="controlCenter">
                    <ul id="foo4">
                    <?php
                    for($o=1;$o<=intval($num_other);$o++){
                    $data_other =@mysql_fetch_array($result_other);
					
					$product_color = "select name from color_tb where c_code = '".$data_other['p_color']."' ";
					$result_productcolor = @mysql_query($product_color, $connect);
					$data_productcolor =@mysql_fetch_array($result_productcolor);
                    ?>
                    
                        <li>
                            <a href="?id=<?php echo $data_other['pid'];?>">
                                <section>
                                <img alt="<?php echo $data_other['name'];?>" title="" src="../../images/products/<?php echo $data_other['p_code'];?>/<?php echo $data_other['p_color']; ?>/s.jpg" />
                                </section>
                            <article>
                                    <?php echo $data_other['p_code']." - ".$data_productcolor['name'];?>
                                </article>
                            </a>
						<?php
						$sql_price = "SELECT p.* FROM product_tb as p, size_tb as s, category_tb as c where c.name = p.p_category and c.cid = s.cid AND ";
						$sql_price .= "p.p_category = '".$data_other['p_category']."' AND p.p_code = '".$data_other['p_code']."'";
						$sql_price .= " AND p.p_color = '".$data_other['p_color']."' AND p.p_size = s.name GROUP BY p.p_size ORDER BY s.ranking";
                        $result_price = @mysql_query($sql_price,$connect);
                        $num_price =@mysql_num_rows($result_price);
						
						for($pz=1;$pz<=intval($num_price);$pz++){
						$data_price =@mysql_fetch_array($result_price);
							
							
							if($pz == 1 ){
								$price1 = $data_price['p_price'];
								$Sprice1 = $data_price['p_special'];
								$Cprice1 = $data_price['p_clearance'];
							}
							if($pz == $num_price ){
								$price2 = $data_price['p_price'];
								$Sprice2 = $data_price['p_special'];
								$Cprice2 = $data_price['p_clearance'];
							}
							
						
						}
                        ?>
                        
                        <p>
                            <span class="price">Price :</span>
                            <?php if ($data_other['p_special'] == 0 && $data_other['p_clearance'] == 0) {?>
                                <span class="price-default"></span>
                                <span class="price-specail"> <font color="#000000"><?php echo $price1."-".$price2;?></font></span>                              
                            <?php }?>

                            <?php if ($data_other['p_special'] != 0 && $data_other['p_clearance'] == 0) {?>
                            	<span class="leftPrice">
                                    <span class="price-default2"><?php echo $price1."-".$price2;?></span>
                                    <span class="price-specail2"><?php echo $Sprice1."-".$Sprice2;?></span>
                                </span>
                            <?php }?>
                            <?php if ($data_other['p_clearance'] != 0) {?>
                            	<span class="leftPrice">
                                    <span class="price-default2"><?php echo $price1."-".$price2;?></span>
                                    <span class="price-specail2"><?php echo $Cprice1."-".$Cprice2;?></span>
                                    <span class="iconPrice">
                                        <img alt="" title="" src="../../images/iconbag.png" width="16" />
                                    </span>
                                </span>
                            <?php }?>
                        </p>
                        
                        
                        
						<?php

								
                                $sql_color_size = "SELECT p.* FROM product_tb as p, size_tb as s, category_tb as c where c.name = p.p_category and c.cid = s.cid AND ";
								$sql_color_size .= "p.p_category = '".$data_other['p_category']."' AND p.p_code = '".$data_other['p_code']."'";
                                $sql_color_size .= " AND p.p_color = '".$data_other['p_color']."' AND p.p_size = s.name GROUP BY p.p_size ORDER BY s.ranking";
                                $result_color_size = @mysql_query($sql_color_size,$connect);
                                $result_color_size5 = @mysql_query($sql_color_size,$connect);


                                $num_color_size =@mysql_num_rows($result_color_size);
								
								for($g2=1;$g2<=intval($num_color_size);$g2++){
								$data_g2 =@mysql_fetch_array($result_color_size5);
									$ans_pid2 .= "'".$data_g2['pid']."',";
									$ans_spare2 = $data_g2['p_spare'];
								}
								
								$ans_pid2 = substr($ans_pid2,0,-1);
								
								$sql_count_spare2 = "select sum(product_number) as order_spareStock from temp_order_product where pid in (".$ans_pid2.")";
								$sql_count_spare2 .= " and buy_status = 'SPARE' AND sent_status = 'RESERVE'";
								$result_count_spare2 = @mysql_query($sql_count_spare2,$connect);
								$num_count_spare2 =@mysql_num_rows($result_count_spare2);
								$data_count_spare2 =@mysql_fetch_array($result_count_spare2);
								
								if($data_count_spare2['order_spareStock'] != 0 && $data_count_spare2['order_spareStock'] != '' ){

									$SPAREtock2 = $ans_spare2 - $data_count_spare2['order_spareStock'];
								
									if($SPAREtock2 == 0){
										$finishSpare2 = "OUT";
									}else{
										$finishSpare2 = "";
									}
								}
                        ?>
                        
                        <select name="">
                            <?php
                            for($col2=1;$col2<=intval($num_color_size);$col2++){
                            $data_color_size =@mysql_fetch_array($result_color_size);
                            ?>
                                      <option value="<?php echo $data_color_size['pid'];?>" 
									  <?php echo ($data_other['p_size'] == $data_color_size['p_size'] ? "selected=selected" : "" );?>>
									  <?php echo $data_color_size['p_size'];?>-
									  <?php 
                                      if ($data_color_size['p_special'] != 0 && $data_color_size['p_clearance'] == 0) {
                                        echo $data_color_size['p_special'];  
                                      }elseif($data_color_size['p_clearance'] != 0){
                                        echo $data_color_size['p_clearance'];
                                      }else{
                                        echo $data_color_size['p_price'];
                                      }
                                      ?>							  
                                       Baht-
									  <?php 
									  
									  if($data_color_size['p_stock'] != '0'){
                                          echo "Ready to ship";
                                      }elseif($finishSpare == 'OUT' && $data_color_size['p_stock'] == '0' && $data_color_size['p_pre'] == '0'){
                                          echo  "Out of stock";
									  }elseif($data_color_size['p_stock'] == '0' && $data_color_size['p_pre'] != '0'){
                                          echo  "Preorder";
									  }elseif($data_color_size['p_pre'] == '0' && $data_color_size['p_spare'] != '0'){
                                          echo  "Preorder";
                                      }elseif($data_color_size['p_stock'] == '0' && $data_color_size['p_pre'] == '0'  && $data_color_size['p_spare'] == '0' ){
                                          echo  "Out of stock";
                                      }?>
                                       </option>
                            <?php } ?>
                        </select>    
                        </li>
                        
                   <?php } ?>     
                        

                    </ul>
                    <a id="prev3" class="prev2" href="#"></a>
                    <a id="next3" class="next2" href="#"></a>                                          
                </section>                
            </section>
        
        <?php } ?>
        </section>
        <section class="paragraph">
        	<hgroup class="titleModule">
            	<h2>Size Model</h2>
            </hgroup>
            
            <section class="paragraph03" style="text-align:center;">
			<?php
            $sql_model = "SELECT * FROM model_tb where ranking not in ('','0') ORDER BY ranking";
            $result_model =@mysql_query($sql_model, $connect);
            $num_model =@mysql_num_rows($result_model);
            
            for($m=1;$m<=intval($num_model);$m++){
            $data_model =@mysql_fetch_array($result_model);
            ?>
            	<img alt="<?php echo $data_product['name'];?>" title="<?php echo $data_product['name'];?>" src="../../../images/model/<?php echo $data_model['picture'];?>" /> 
            <?php } ?>
            </section>
            <section class="paragraph03" id="size">
                    	<section id="example-three">
                            <!--<section class="menuTap2">
                                <ul class="nav2">
                                    <?php
                                    for($t=1;$t<=intval($num_size);$t++){
                                    $data_size2 =@mysql_fetch_array($result_size2);
                                    ?>
                                
                                    <li><a href="#box<?php echo $t;?>" <?php echo ($t == '1' ? "class=current2" : "");?>>Size <?php echo $data_size2['p_size'];?></a></li>
                                    
                                    <?php } ?>
                                </ul>
                            </section>-->
							<?php
                            for($t3=1;$t3<=intval($num_size);$t3++){
                            $data_size3 =@mysql_fetch_array($result_size3);
                            ?>
                            
                            <section class="paragraph03 <?php echo ($t3 != '1' ? "hide2" : "");?>" id="box<?php echo $t3;?>">
                                <center>
                                <?php 
								$sql_picture = "select s.* from size_tb as s , category_tb as c where c.name = '".$data_product['p_category']."' ";
								$sql_picture .= "AND s.cid = c.cid AND s.name = '".$data_size3['p_size']."'";
								$result_picture = @mysql_query($sql_picture,$connect);
								$data_picture =@mysql_fetch_array($result_picture);
								?>
                                    <img alt="" title="" src="../../../images/size/<?php echo $data_picture['picture'];?>" />
                                </center>                            
                            </section>
                            <?php } ?>

                        </section>
                        <!--table-->
                        
                        <section>
                        
                            <table cellpadding="0" cellspacing="0" border="0" class="tableSize2">
                            	
								<?php
                                for($t4=1;$t4<=intval($num_size);$t4++){
                                $data_size4 =@mysql_fetch_array($result_size6);
								
                                echo "<tr>";
								
								
								if($data_size4['armlength'] != '' || $data_size4['set_waist'] != '' ||
								$data_size4['set_hip'] != '' || $data_size4['set_length'] != '' ||
								$data_size4['set_waist_skirts'] != '' || $data_size4['set_hip_skirts'] != '' ||
								$data_size4['set_length_skirts'] != ''){
								
								echo "<td class=first>".($data_size4['p_size'] != '' ? "<b>Size : ".$data_size4['p_size']."</b>&nbsp;&nbsp;" : "")."</td>";
								echo "<td>";
								echo ($data_size4['shoulder'] != '' ? " ไหล่ : ".$data_size4['shoulder']."" : "");
								echo ($data_size4['arm'] != '' ? " รอบแขน : ".$data_size4['arm'] : "");
								echo ($data_size4['armlength'] != '' ? " ความยาวแขน : ".$data_size4['armlength'] : "");
								echo ($data_size4['breast'] != '' ? " อก : ".$data_size4['breast'] : "");
								echo ($data_size4['waist'] != '' ? " เอว : ".$data_size4['waist'] : "");
								echo ($data_size4['hip'] != '' ? " สะโพก : ".$data_size4['hip'] : "");
								echo ($data_size4['alllength'] != '' ? " ความยาว : ".$data_size4['alllength'] : "");
								echo "<br>";
								echo ($data_size4['shoulder_waist'] != '' ? " ไหล่-เอว : ".$data_size4['shoulder_waist'] : "");
								echo ($data_size4['shoulder_crotch'] != '' ? " ไหล่-เป้า : ".$data_size4['shoulder_crotch'] : "");
								echo ($data_size4['waist_end'] != '' ? " เอว-ปลาย : ".$data_size4['waist_end'] : "");
								echo ($data_size4['waist_crotch'] != '' ? " เอว-เป้า : ".$data_size4['waist_crotch'] : "");
								echo ($data_size4['thigh'] != '' ? " ต้นขา : ".$data_size4['thigh'] : "");
								
								//echo "<br>";
								echo ($data_size4['set_waist'] != '' ? " เอวกางเกง : ".$data_size4['set_waist'] : "");
								echo ($data_size4['set_hip'] != '' ? " สะโพกกางเกง : ".$data_size4['set_hip'] : "");
								echo ($data_size4['set_length'] != '' ? " ความยาวกางเกง : ".$data_size4['set_length'] : "");
								echo ($data_size4['set_waist_skirts'] != '' ? " เอวกระโปรง : ".$data_size4['set_waist_skirts'] : "");
								echo ($data_size4['set_hip_skirts'] != '' ? " สะโพกกระโปรง : ".$data_size4['set_hip_skirts'] : "");
								echo ($data_size4['set_length_skirts'] != '' ? " ความยาวกระโปรง : ".$data_size4['set_length_skirts'] : "");

								echo "</td>";
								
								}else{
									
								echo "<td class=first>".($data_size4['p_size'] != '' ? "<b>Size : ".$data_size4['p_size']."</b>&nbsp;&nbsp;" : "")."</td>";
								echo "<td>";
								echo ($data_size4['shoulder'] != '' ? " ไหล่ : ".$data_size4['shoulder']."" : "");
								echo ($data_size4['arm'] != '' ? " รอบแขน : ".$data_size4['arm'] : "");
								echo ($data_size4['armlength'] != '' ? " ความยาวแขน : ".$data_size4['armlength'] : "");
								echo ($data_size4['breast'] != '' ? " อก : ".$data_size4['breast'] : "");
								echo ($data_size4['waist'] != '' ? " เอว : ".$data_size4['waist'] : "");
								echo ($data_size4['hip'] != '' ? " สะโพก : ".$data_size4['hip'] : "");
								echo ($data_size4['alllength'] != '' ? " ความยาว : ".$data_size4['alllength'] : "");
								echo "<br>";
								echo ($data_size4['shoulder_waist'] != '' ? " ไหล่-เอว : ".$data_size4['shoulder_waist'] : "");
								echo ($data_size4['shoulder_crotch'] != '' ? " ไหล่-เป้า : ".$data_size4['shoulder_crotch'] : "");
								echo ($data_size4['waist_end'] != '' ? " เอว-ปลาย : ".$data_size4['waist_end'] : "");
								echo ($data_size4['waist_crotch'] != '' ? " เอว-เป้า : ".$data_size4['waist_crotch'] : "");
								echo ($data_size4['thigh'] != '' ? " ต้นขา : ".$data_size4['thigh'] : "");
								
								echo "</td>";
								}
								echo "</tr>";
								
                                } 
								echo "</table>";
								?>
                                
                            </table>

                        </section>
                        
                        
                        <!--table-->
                        
                    </section>
        </section>
        <section class="paragraph">
        	<hgroup class="titleModule">
            	<h2>Review</h2>
            </hgroup>
            <section class="paragraph03">
            	<section class="blog_review">
                	<ul>
						<?php
                        $sql_review = "SELECT * FROM review_tb where pid in (".$ans_pid.") and ranking not in('','0') ORDER BY ranking";
                        $result_review =@mysql_query($sql_review, $connect);
                        $num_review =@mysql_num_rows($result_review);
                        
                        for($r=1;$r<=intval($num_review);$r++){
                        $data_review =@mysql_fetch_array($result_review);
                        ?>
                    	<li>
                            <a rel="example_group" href="../../../images/review/<?php echo $data_review['picture'];?>" title="Review <?php echo $data_product['name'];?>">
                                <img alt="<?php echo $data_product['name'];?>" title="<?php echo $data_product['name'];?>" src="../../../images/review/<?php echo $data_review['picture'];?>" />
                            </a>                        
                        </li>
                        <?php } ?>

                    </ul>
                </section>
            </section>
        </section>
        
		<?php include('../../include/sitemap.php') ?>        
    </section>
</section>
<?php include('../../include/footer.php') ?>

<!--/////Menu Drop Down/////-->
<script src="../../js/dropdown/jquery-1.9.0.min.js"></script>
<script src="../../js/dropdown/hoverIntent.js"></script>
<script src="../../js/dropdown/superfish.js"></script>
<script>
// initialise plugins
jQuery(function(){
    jQuery('#example').superfish({
        //useClick: true
    });
});
</script>
<!--/////Menu Drop Down/////--> 
<!--Tap--> 
    <!--<script src='../../js/taps/jquery.min.js'></script>   --> 
    <script src="../../js/taps/organictabs.jquery.js"></script>
    <script>
        $(function() {
            $("#example-two").organicTabs({
                "speed": 200
            });
			$("#example-three").organicTabs2({
                "speed": 200
            });
        });
    </script>
    <style>
		.current {
			background:#000 !important;
			border:#000 1px solid !important;
			font-weight:bold;
			color:#fff !important;
		}
		.current2 {
			background:#000 !important;
			color:#fff !important;
			border:#000 1px solid !important;
		}
	</style>
<!--End Tap--> 
<!--accordion01-->
<script type="text/javascript" src="../../js/accordion/script.js"></script>
<script type="text/javascript">
var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc","section",1,-1);
var nestedAccordion=new TINY.accordion.slider("nestedAccordion");
nestedAccordion.init("nested","section",1,-1,"acc-selected");
</script>
<!--End accordion01-->
<!--accordion02-->
<link rel="stylesheet" href="../../css/accordion-style02/demo2.css" type="text/css" />
<!--<script type="text/javascript" src="../../js/accordion-style02/jquery.min.js"></script>-->
<script type="text/javascript" src="../../js/accordion-style02/highlight.pack.js"></script>
<script type="text/javascript" src="../../js/accordion-style02/jquery.cookie.js"></script>
<script type="text/javascript" src="../../js/accordion-style02/jquery.accordion.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        //syntax highlighter
        hljs.tabReplace = '    ';
        hljs.initHighlightingOnLoad();

        $.fn.slideFadeToggle = function(speed, easing, callback) {
            return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
        };

        //accordion
        $('.accordion').accordion({
            defaultOpen: '0',
            cookieName: 'accordion_nav',
            speed: 400,
            animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
                elem.next().stop(true, true).slideFadeToggle(opts.speed);
            },
            animateClose: function (elem, opts) { //replace the standard slideDown with custom function
                elem.next().stop(true, true).slideFadeToggle(opts.speed);
            }
        });

    });
</script> 
<!--End accordion02-->
<!--Thumb Slide-->
<link href="../../css/slide_thumb1/slide_thumb1.css" rel="stylesheet" type="text/css">
<!--<script type="text/javascript" language="javascript" src="../../js/slide_thumb1/jquery-1.8.2.min.js"></script>-->
<script type="text/javascript" language="javascript" src="../../js/slide_thumb1/jquery.carouFredSel-6.0.6-packed.js"></script>
<script type="text/javascript" language="javascript" src="../../js/slide_thumb1/foo3.js"></script>
<!--End Thumb Slide-->
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////-->
	<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>-->
	<script type="text/javascript" src="../../js/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="../../js/fancybox/jquery.fancybox-1.3.1.js"></script>
    <script type="text/javascript" src="../../js/fancybox/fancybox-jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////-->  

<!--///// link to magiczoom.css file /////-->
<link href="../../css/magiczoom/magiczoom.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- link to magiczoom.js file -->
<script src="../../js/magiczoom/magiczoom.js" type="text/javascript"></script>
<!--/////End link to magiczoom.css file /////-->

<script>
function chkPro(){

$(document).ready(function() {

		$.ajax({type:'POST',
		url:"ajax.php",
		data: "Pid="+$("#pro_id").val(),
		success:function(data){
			var a = new Array, b;
			b = data;
			a = b.split(":");
			$("#inStock").val(a[0]);
			$("#preStock").val(a[1]);
			
			if(a[0] == 0 && a[1] == 0  && a[2] == 0 ){
				$("#addtocart").val('Out of stock');
				$("#addtocart").attr('disabled','disabled');
			}else{
				$("#addtocart").val('Add to Cart');
				$("#addtocart").removeAttr('disabled');
			}
			

		}});
		

});

}
</script>



</body>
</html>
