<?php
session_start();
require_once '../dbconnect.inc';
include("../class.page_split.php");
$obj = new page_split();
$obj->_setPageSize(30);						
$obj->_setFile("index.php");		
$obj->_setPage($_GET['page']);		
if($_GET['page'] > 1){
	$f = 30*($_GET['page']- 1);
}


/*========================================= NEW ARRIVAL =========================================*/
$number_product_highlight = 1;
$number_product = 1;


$select_product_scand = "SELECT * FROM product_tb p, product_highlight_tb2 ph WHERE p.p_code = ph.p_code and p.p_color = ph.p_color ";
$select_product_scand .= " GROUP BY p.p_color, p.p_code ORDER BY ph.ranking desc";
$result_product_scand = $obj->_query($select_product_scand, $connect);

$num_product_scand = @mysql_num_rows($result_product_scand);


for ($pro=1; $pro<=$num_product_scand; $pro++) {
	$data_product_scand =@mysql_fetch_array($result_product_scand);
	

		$pro_id_h[$number_product_highlight] = $data_product_scand['pid'];
		$pro_code_h[$number_product_highlight] = $data_product_scand['p_code']." - ".$data_product_scand['p_color'];
		$pro_price_h[$number_product_highlight] = $data_product_scand['p_price'];
		$number_product_highlight += 1;
}
//print_r($pro_id);
/*========================================= NEW ARRIVAL =========================================*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cross Twelfth</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
<link href="../css.css" rel="stylesheet" type="text/css" />
<script>
	document.createElement('header');
	document.createElement('nav');
	document.createElement('section');
	document.createElement('article');
	document.createElement('footer');
	document.createElement('hgroup');
</script>
<link href="../css/gallery/gallery.css" rel="stylesheet" type="text/css" />
<script src="../js/gallery/jquery-1.10.2.min.js"></script>
<script>
	$(document).ready(function() {
		$('#gallery ul li img').click(function(e) {
			var newclass = $(this).attr('id');
			var oldclass = $('#full-size').attr('class');
				$('#full-size').fadeOut(function(){
					$('#full-size').removeClass(oldclass) .addClass(newclass) .fadeIn('slow');
                        
				})
		})
        
    });
</script>

<!--Accordion-->
<link rel="stylesheet" href="../css/accordion/accordion-style.css" type="text/css">
<!--End Accordion-->  
<!--////////////////////////////////////Banner Slide////////////////////////////////////-->
	<script type="text/javascript" src="../js/slide_main/jquery-1.2.6.min.js"></script>
    <link href="../css/slide_main/slide_main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/slide_main/jquery-slide_show2.js"></script>
<!--////////////////////////////////////End Banner Slide////////////////////////////////////-->
<!--/////Menu Drop Down/////-->
<script src="../js/dropdown/jquery-1.9.0.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/slide_thumb1/jquery-1.8.2.min.js"></script>
<script src="../js/dropdown/hoverIntent.js"></script>
<script src="../js/dropdown/superfish.js"></script>
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
    <!--<script src='../js/taps/jquery.min.js'></script>-->
    <script src="../js/taps/organictabs.jquery.js"></script>
    <script>
        $(function() {
            $("#example-two").organicTabs({
                "speed": 200
            });
        });
    </script>
    <style>
		.current {
			background:#000 !important;
			border:#000 1px solid !important;
			font-weight:bold;
			color:#fff;
		}
	</style>
<!--End Tap-->  

<!--Thumb Slide-->
<link href="../css/slide_thumb1/slide_thumb1.css" rel="stylesheet" type="text/css">
<!--<script type="text/javascript" language="javascript" src="../js/slide_thumb1/jquery-1.8.2.min.js"></script>-->
<script type="text/javascript" language="javascript" src="../js/slide_thumb1/jquery.carouFredSel-6.0.6-packed.js"></script>
<script type="text/javascript" language="javascript" src="../js/slide_thumb1/foo3.js"></script>
<!--End Thumb Slide-->


<link rel="stylesheet" href="../css/accordion-style02/demo2.css" type="text/css" />
<!--<script type="text/javascript" src="../js/accordion-style02/jquery.min.js"></script>-->
<script type="text/javascript" src="../js/accordion-style02/highlight.pack.js"></script>
<script type="text/javascript" src="../js/accordion-style02/jquery.cookie.js"></script>
<script type="text/javascript" src="../js/accordion-style02/jquery.accordion.js"></script>
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
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////-->
	<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>-->
	<script type="text/javascript" src="../js/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.1.js"></script>
    <script type="text/javascript" src="../js/fancybox/fancybox-jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////-->  
<!--////////////////////////////////////Scoll Bar Style X Y////////////////////////////////////-->
<link href="../css/scollbar-y/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<link href="../css/scollbar-y/scollbar-style.css" rel="stylesheet" type="text/css" />
<!--<script>!window.jQuery && document.write(unescape('%3Cscript src="../js/scollbar-y/jquery-1.7.2.min.js"%3E%3C/script%3E'))</script>-->
<script src="../js/scollbar-y/jquery-ui.min.js"></script>
<!--<script>!window.jQuery.ui && document.write(unescape('%3Cscript src="../js/scollbar-y/jquery-ui-1.8.21.custom.min.js"%3E%3C/script%3E'))</script>-->
<script src="../js/scollbar-y/jquery.mousewheel.min.js"></script>
<script src="../js/scollbar-y/jquery.mCustomScrollbar.js"></script>
<script src="../js/scollbar-y/jquery-scollbar.js"></script>
<!--////////////////////////////////////End Scoll Bar Style X Y////////////////////////////////////-->


<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '382803885229241'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=382803885229241&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
 

</head>

<body>

<?php include('../include/header.php') ?>
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
		<?php //include('../include/slide.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2>NEW IN</h2>
            </hgroup>        
            <section class="paragraph03 thumbPD" id="newarrival">
                <ul>
                    <?php 
					
					foreach($pro_id_h as $key){
					
							//for ($p=1; $p<=$number_product_highlight-1; $p++) {
								$select_product_h = "SELECT * FROM product_tb WHERE pid = '".$key."' and ranking not in ('','0')";	
								$result_product_h = @mysql_query($select_product_h, $connect);
								$num_product_h = @mysql_num_rows($result_product_h);
								
								for ($ph=1; $ph<=$num_product_h; $ph++) {
									$data_product_h =@mysql_fetch_array($result_product_h);
									
								$product_color = "select name from color_tb where c_code = '".$data_product_h['p_color']."' ";
								$result_productcolor = @mysql_query($product_color, $connect);
								$data_productcolor =@mysql_fetch_array($result_productcolor);
					?>
                    	<li>
                            <a href="../products/detail/?id=<?php echo $data_product_h['pid'];?>">
                                <section>
                                    <img alt="<?php echo $data_product_h['name'];?>" title="" src="../images/products/<?php echo $data_product_h['p_code'];?>/<?php echo $data_product_h['p_color']; ?>/s.jpg" height="385" />
                                </section>
                                <article>
                                    <?php echo $data_product_h['p_code']." - ".$data_productcolor['name'];?>
                                </article>
                            </a>
                            
						<?php
						$sql_price = "SELECT p.* FROM product_tb as p, size_tb as s, category_tb as c where c.name = p.p_category and c.cid = s.cid AND ";
						$sql_price .= "p.p_category = '".$data_product_h['p_category']."' AND p.p_code = '".$data_product_h['p_code']."'";
						$sql_price .= " AND p.p_color = '".$data_product_h['p_color']."' AND p.p_size = s.name and p.ranking not in ('','0') GROUP BY p.p_size ORDER BY s.ranking";
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
      
                                
                                <?php if ($data_product_h['p_special'] == 0 && $data_product_h['p_clearance'] == 0) {?>
                                
                                <span class="price-default"></span>
                                <span class="price-specail"> <font color="#000000"><?php echo $price1."-".$price2;?></font></span>                                
                                <?php }?>
                                
								<?php if ($data_product_h['p_special'] != 0 && $data_product_h['p_clearance'] == 0) {?>
                                <span class="leftPrice">
                                    <span class="price-default2"><?php echo $price1."-".$price2;?></span>
                                    <span class="price-specail2"><?php echo $Sprice1."-".$Sprice2;?></span>
                                </span>
                                <?php }?>
                                <?php if ($data_product_h['p_clearance'] != 0) {?>
                                <span class="leftPrice">
                                    <span class="price-default2"><?php echo $price1."-".$price2;?></span>
                                    <span class="price-specail2"><?php echo $Cprice1."-".$Cprice2;?></span>
                                    <span class="iconPrice">
                                        <img alt="" title="" src="images/iconbag.png" width="16" />
                                    </span>                                      
                                </span>
                                <?php }?>
                            </p>   
                            <?php
						
							$sql_color_h = "SELECT p.* FROM product_tb as p, size_tb as s, category_tb as c where c.name = p.p_category and c.cid = s.cid AND ";
							$sql_color_h .= "p.p_category = '".$data_product_h['p_category']."' AND p.p_code = '".$data_product_h['p_code']."'";
							$sql_color_h .= " AND p.p_color = '".$data_product_h['p_color']."' AND p.p_size = s.name and p.ranking not in ('','0')GROUP BY p.p_size ORDER BY s.ranking";
							
							$result_color_h = @mysql_query($sql_color_h, $connect);
							$num_color_h =@mysql_num_rows($result_color_h);

							$result_size5_h = @mysql_query($sql_color_h,$connect);
								$ans_pid_h = '';
								for($gh=1;$gh<=intval($num_color_h);$gh++){
								$data_g_h =@mysql_fetch_array($result_size5_h);
									$ans_pid_h .= "'".$data_g_h['pid']."',";
									$ans_spare_h = $data_g_h['p_spare'];
								}
								
								$ans_pid_h = substr($ans_pid_h,0,-1);
								
								$sql_count_spare_h = "select sum(product_number) as order_spareStock from temp_order_product where pid in (".$ans_pid_h.")";
								$sql_count_spare_h .= " and buy_status = 'SPARE' AND sent_status = 'RESERVE'";
								$result_count_spare_h = @mysql_query($sql_count_spare_h,$connect);
								$num_count_spare_h =@mysql_num_rows($result_count_spare_h);
								$data_count_spare_h =@mysql_fetch_array($result_count_spare_h);
								//echo $sql_count_spare_h;
								if($data_count_spare_h['order_spareStock'] != 0 && $data_count_spare_h['order_spareStock'] != '' ){

									$SPAREtock_h = $ans_spare_h - $data_count_spare_h['order_spareStock'];
								
									if($SPAREtock_h == 0){
										$finishSpare_h = "OUT";
									}else{
										$finishSpare_h = "";
									}
								}
								
								

					    $out=0;
						?>                         
                        <select name="" onchange="if (this.value != '') window.location.href=this.value">
                        <option value=""><?php echo ($_SESSION['sess_language'] == 'eng' ? "Please select your size" : "กรุณาเลือกไซส์สินค้า");?></option>
                            <?php for($col_h=1;$col_h<=intval($num_color_h);$col_h++){
                            			$data_color_h =@mysql_fetch_array($result_color_h);
										
                            ?>
                              <option value="../products/detail/?id=<?php echo $data_color_h['pid'];?>">
							  <?php echo $data_color_h['p_size'];?> 
							  <?php 
							  if ($data_color_h['p_special'] != 0 && $data_color_h['p_clearance'] == 0) {
								echo $data_color_h['p_special'];  
							  }elseif($data_color_h['p_clearance'] != 0){
								echo $data_color_h['p_clearance'];
							  }else{
							  	echo $data_color_h['p_price'];
							  }
							  ?>							  
							  
                              Baht-
							  <?php 
									  if($data_color_h['p_stock'] != '0'){
                                          echo "Ready to ship สินค้าพร้อมส่ง";
                                      }elseif($finishSpare_h == 'OUT' && $data_color_h['p_stock'] == '0' && $data_color_h['p_pre'] == '0'){
                                          echo  "Out of stock สินค้าหมดสต๊อก";
										  $out++;
									  }elseif($data_color_h['p_stock'] == '0' && $data_color_h['p_pre'] != '0'){
                                          echo  "Preorder จัดส่ง 15 วัน หลังชำระเงิน";
									  }elseif($data_color_h['p_pre'] == '0' && $data_color_h['p_spare'] != '0'){
                                          echo  "Preorder จัดส่ง 15 วัน หลังชำระเงิน";
                                      }elseif($data_color_h['p_stock'] == '0' && $data_color_h['p_pre'] == '0'  && $data_color_h['p_spare'] == '0' ){
                                          echo  "Out of stock สินค้าหมดสต๊อก";
										  $out++;
                                      }?>
                              
                              </option>
                            <?php } ?>
                            </select>
                        <?php if($num_color_h==$out){?> 
                        <div class="slodout"><img alt="Sold Out" title="Sold Out" src="../images/soldout.png" /></div> 
                        <?php } ?>
                        </li>
                    <?php } }?>
                    

                </ul>                                          	
            </section>
        
                                    
			<section class="paragraph">
                <?php $obj->_displayPage(); ?>
            </section>                                    
        </section>
        
        
        
        
		<?php include('../include/sitemap.php') ?>        
    </section>
</section>
<?php include('../include/footer.php') ?>

<script type="text/javascript" src="../js/accordion/script.js"></script>

<script type="text/javascript">

var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc","section",0,-0);

var nestedAccordion=new TINY.accordion.slider("nestedAccordion");
nestedAccordion.init("nested","section",0,-0,"acc-selected");

</script> 


</body>
</html>
