<?php
session_start();
require_once '../dbconnect.inc';
if (!isset($_SESSION['AUTH_PERMISSION_MEMID'])) {
   echo "<script>location.href='../register/login.php'</script>";
}
if($_GET['sAction'] == 'del'){
	$delete_howto = "DELETE FROM waitlist_product_tb  WHERE waitlist_id = '".$_GET['id']."' ";
	@mysql_query($delete_howto, $connect);
?>		 
		<script>
			location.href='index.php'; //รีเฟสหน้า
		</script>
<?php
}


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
	document.createElement('fieldset');
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



 

</head>

<body>

<?php include('../include/header.php') ?>
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2>Waitlist</h2>
            </hgroup>        
            <section class="paragraph03">
                <section class="blogStyle" style="text-align:center;">
                    <strong>สมาชิกสามารถเพิ่ม การแจ้งสินค้าหลุดจองสูงสุด 3 ชิ้นเท่านั้น<br />
                    หากไม่ต้องการแจ้งสินค้าหลุดจอง ให้ทำการยกเลิกการแจ้งค่ะ</strong>
                </section>                        
				<section class="blogOrder">
                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                        	<td align="center" valign="middle">
                            	<p>สินค้า</p>                                
                            </td>
                        	<td align="center" valign="middle">
                            	<p>รายละเอียดและขนาด</p>                                
                            </td>
                            <td align="center" valign="middle">
                            	<p>สถานะ</p>
                            </td>
                            <td align="center" valign="middle">
                            	<p>ลบ</p>
                            </td>                            
                        </tr>
                        <?php
						$select_waitlist = "SELECT * FROM waitlist_product_tb WHERE u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."'";
						$result_waitlist =@mysql_query($select_waitlist, $connect);
						$num_waitlist =@mysql_num_rows($result_waitlist);
						
						for($w=1;$w<=intval($num_waitlist);$w++){
							$data_waitlist =@mysql_fetch_array($result_waitlist);
							
							if($num_waitlist){
						?>
                        <tr>
                            <td align="center" valign="middle">
                            	<img alt="" title="" src="../images/products/<?php echo $data_waitlist['pro_code'];?>/<?php echo $data_waitlist['p_color'];?>/s.jpg" height="100" />
                            </td>                        
                        	<td align="center" valign="middle">
                            	<a href="../products/detail/index.php?id=<?php echo $data_waitlist['pro_id'];?>">#CODE :<?php echo $data_waitlist['pro_code'];?> #SIZE : <?php echo $data_waitlist['p_size'];?> <?php echo ($_SESSION['sess_language'] == 'eng' ? $data_waitlist['p_name_eng']: str_replace('+','',$data_waitlist['p_name']));?></a>
                            </td>
                            <td align="center" valign="middle">
                            	#สถานะ
                            </td>
                            <td align="center" valign="middle">
                            	<nav>
                                    <a href="index.php?id=<?php echo $data_waitlist['waitlist_id'];?>&amp;sAction=del" onClick="return confirm('Do you want to delete it. (yes/no)')">
                                    <img alt="" title="" src="../order/images/icon-remove.png" /></a>
                                </nav>	
                            </td>
                        </tr>
                        <?php }else{?>
                        <tr>
                            <td colspan="4" align="center" valign="middle"  style="background:#ebebeb;">
                            	<strong style="color:#F00;">ท่านยังไม่มีรายการจองสินค้า</strong>
                            </td>
                        </tr>                                               
                        <?php } }  ?>
                    </table>
                </section>		                                                            
			</section>						                                     	
        </section>                                
		<?php include('../include/sitemap.php') ?>        
    </section>
</section>
<?php include('../include/footer.php') ?>

<script type="text/javascript" src="../js/accordion/script.js"></script>

<script type="text/javascript">

var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc","section",1,-1);

var nestedAccordion=new TINY.accordion.slider("nestedAccordion");
nestedAccordion.init("nested","section",1,-1,"acc-selected");

</script> 


</body>
</html>
