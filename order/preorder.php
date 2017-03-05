
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
                <h2>สั่งซื้อสินค้า</h2>
            </hgroup>        
            <section class="paragraph03">
				<section class="blogOrder">
                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                    	<tr class="titleTable_order">
                        	<td align="center" valign="middle">
                            	<p>Products</p>
                                <span>สินค้า</span>
                            </td>
                            <td align="center" valign="middle">
                            	<p>Detail & Size</p>
                                <span>รายละเอียดและขนาด</span>
                            </td>
                            <td align="center" valign="middle">
                            	<p>Amount</p>
                                <span>จำนวนสินค้า</span>
                            </td>
                            <td align="center" valign="middle" >
                            	<p>Price</p>
                                <span>ยอดรวม(บาท)</span>
                            </td>
                            <td align="center" valign="middle" >&nbsp;
                            	
                            </td>
                        </tr>
                        <!------------------------------------------>
                        <tr>
                        	<td align="center" valign="middle">
                            	<img alt="" title="" src="../products/images/pic-test01-s.jpg" height="100" />
                            </td>
                            <td align="center" valign="middle">
                            	<strong>#CODE :DR800 #SIZE : SS #Name</strong>
                            </td>
                            <td align="center" valign="middle">
                            	1
                            </td>
                            <td align="center" valign="middle">
                            	<strong>780.00.-</strong>
                            </td>
                            <td align="center" valign="middle">
                            	<nav>
                                	<a href="#"><img alt="" title="" src="images/icon-view.png" /></a>
                                    <a href="#"><img alt="" title="" src="images/icon-remove.png" /></a>
                                </nav>
                            </td>
                        </tr>
                        <tr>
                        	<td align="center" valign="middle">
                            	<img alt="" title="" src="../products/images/pic-test01-s.jpg" height="100" />
                            </td>
                            <td align="center" valign="middle">
                            	<strong>#CODE :DR800 #SIZE : SS #Name</strong>
                            </td>
                            <td align="center" valign="middle">
                            	1
                            </td>
                            <td align="center" valign="middle">
                            	<strong>780.00.-</strong>
                            </td>
                            <td align="center" valign="middle">
                            	<nav>
                                	<a href="#"><img alt="" title="" src="images/icon-view.png" /></a>
                                    <a href="#"><img alt="" title="" src="images/icon-remove.png" /></a>
                                </nav>
                            </td>
                        </tr>
                        <tr class="twoTable">
                        	<td colspan="2">&nbsp;
                            	
                            </td>
                            <td align="center" valign="middle">
                            	Total Amount
                            </td>
                            <td align="center" valign="middle">
                            	<strong>780.00.-</strong>
                            </td>
                            <td align="center" valign="middle">&nbsp;
                            	
                            </td>
                        </tr>
                        <tr class="twoTable">
                        	<td colspan="2">&nbsp;
                            	
                            </td>
                            <td align="center" valign="middle">
                            	Delivery Charge
                            </td>
                            <td align="center" valign="middle">
                            	<strong>40.-</strong>
                            </td>
                            <td align="center" valign="middle">
                            	<div class="choice-tabel">
                                	<ul>
                                    	<li>
                                        	<input name="" type="radio" value="" />
                                            <label>Registered ลงทะเบียน</label>
                                        </li>
                                        <li>
                                        	<input name="" type="radio" value="" />
                                            <label>EMS ไปรษณีย์ส่งด่วน พิเศษ</label>
                                        </li>
                                        <li>
                                        	<input name="" type="radio" value="" />
                                            <label>รับสินค้าเอง</label>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="3">&nbsp;
                            	
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	TOTAL
                            </td>
                            <td class="hilight" align="center" valign="middle">
                            	<strong>820.00.-</strong>
                            </td>
                        </tr>
                    </table>
                </section>	
                <section class="paragraph03">
                    <section class="blogRegister">
                        <header>
                            ล๊อคอินเข้าสู่ระบบ
                        </header>
                        <fieldset>
                            <ul>
                                <li>
                                    <label style="text-align:center;">Username</label>
                                    <input name="" type="text" />
                                    <div class="clear"></div>
                                </li>
                                <li>
                                    <label style="text-align:center;">Password</label>
                                    <input name="" type="text" />
                                    <div class="clear"></div>
                                </li>
                            </ul>
                        </fieldset>
                        <section class="buttonRegister">
                            <input name="" type="button" value="เข้าสู่ระบบ"/>
                            <input name="" type="button" value="สมัครสมาชิก" onclick="window.location.href='../register/index.php'"  />
                        </section>                        
                    </section>   
                </section>                    
                
                	
                <section class="paragraph03">
                	<section class="addressUser">
                    	<section class="addressUser-l">
                        	<ul>
                            	<li>
                                	<header>ที่อยู่ออกบิล</header>
                                </li>
                                <li>
                                	&nbsp;
                                </li>
                            	<li>
                                	<label>* ชื่อ :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* นามสกุล :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* ที่อยู่ :</label>
                                    <h6>
                                    	<textarea name="" cols="" rows=""></textarea>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* จังหวัด :</label>
                                  <h5>
                                    	<select name="">
                                    	  <option>เลือกจังหวัด</option>
                                    	  <option>กรุงเทพฯ</option>
                                   	  </select>
                                    </h5>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* รหัสไปรษณีย์ :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* เบอร์โทรศัพท์ :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>แฟกซ์ :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* อีเมล์ :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                            </ul>
                        </section>
                        <section class="addressUser-r">
                        	<ul>
                            	<li>
                                	<header>ที่อยู่จัดส่ง</header>
                                </li>
                                <li>
                                	<h4>
                                        <input name="" type="checkbox" value=""/>
                                        <label>ที่อยู่เดียวกันกับที่อยู่ออกบิล</label>                                    
                                    <div class="clear"></div>
                                    </h4>
                                </li>
                            	<li>
                                	<label>* ชื่อ :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* นามสกุล :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* ที่อยู่ :</label>
                                    <h6>
                                    	<textarea name="" cols="" rows=""></textarea>
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* จังหวัด :</label>
                                  <h5>
                                    	<select name="">
                                    	  <option>เลือกจังหวัด</option>
                                    	  <option>กรุงเทพฯ</option>
                                   	  </select>
                                    </h5>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* รหัสไปรษณีย์ :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* เบอร์โทรศัพท์ :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>แฟกซ์ :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                                <li>
                                	<label>* อีเมล์ :</label>
                                    <h6>
                                    	<input name="" type="text" />
                                    </h6>
                                	<div class="clear"></div>
                                </li>
                            </ul>
                        </section>
                    </section>
                    <section class="buttonRegister">
                    	<input name="" type="button" value="กลับสู่หน้าหลักรายการสั่งซื้อ" onClick="history.go(-1);return true;" />
                    	<input name="" type="button" value="สั่งซื้อสินค้า" />
                    </section>
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
