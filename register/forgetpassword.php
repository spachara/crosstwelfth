<?php
session_start();
require_once '../dbconnect.inc';
require("../class.phpmailer.php");

if ($_POST['u_register'] == "Send") {
	
	$select_user = "SELECT * FROM user_tb WHERE u_mail = '".$_POST['u_mail']."' ";
	$result_user =@mysql_query($select_user);
	$num_user =@mysql_num_rows($result_user);
	$data_user = @mysql_fetch_array($result_user);
	
	if ($num_user == 1) {
		
		$messages = "<p>";
		$messages .= "เรียนคุณ ".$data_user['u_fname']." ".$data_user['u_lname']."<br><br>";
		
		
		$messages .= "&nbsp;&nbsp;&nbsp;&nbsp;ท่านสามารถเข้าใช้งาน เว็บไซต์ <br>";

		$messages .= "<a href=\"http://www.crosstwelfth.com/demo/register/login.php\">login</a><br><br>";
		
		
		$messages .= "<b>Username</b> : ".$data_user['u_user']."<br>";
		$messages .= "<b>Password</b> : ".$data_user['u_pass']."<br><br>";
		$messages .= "เข้าชมและสั่งซื้อสินค้าในเว็บไซต์  <a href=\"http://www.crosstwelfth.com\">Crosstwelfth</a><br><br>";
		$messages .= "<b>C12  HOTLINE</b> :: 02 4056562,  081 3802212  (จันทร์-เสาร์   10.00 - 20.00 น.)<br><br>";
		$messages .= "<b>LINE</b>:: crosstwelfth_team<br>";
		$messages .= "<b>E-MAIL</b> :: info@crosstwelfth.com<br><br>";
		$messages .= "<img src=\"http://www.crosstwelfth.com/images/cross_twelfth-logo.png\"><br>";
		$messages .= "</p>";
			
	
		$mail = new PHPMailer();
		
		$body = "PHPMailer."; /// ใส่ข้อความข้อคุณ
		
		$mail->CharSet = "utf-8";
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "smtp@gmail.com"; // SMTP server
		$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
												   // 1 = errors and messages
												   // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 465;                   // set the SMTP port for the GMAIL server 465
		$mail->Username   = "cross12mail@gmail.com";  // GMAIL username
		$mail->Password   = "cross2014";            // GMAIL password
		
		$mail->SetFrom("cross12mail@gmail.com", "Cross Twelfth");
		$mail->AddReplyTo("cross12mail@gmail.com", "No-Reply");
		$mail->Subject = "Cross Twelfth :: Forget User or Password"; // หัวข้อในการส่ง email นั้นๆ
		$body = $messages;
		$mail->MsgHTML($body);

		
		$mail->AddAddress($_POST['u_mail'],""); // ผู้รับคนที่หนึ่ง , ชื่อผู้รับ ** กรุณีผู้สองคุณ สามารถเพิ่มบรรทัดนี้อีกได้

			
		if ($mail->Send()) {
			echo "<script>location.href='forgetpassword.php?done=1'</script>";
		}
	}else{
		
			echo "<script>location.href='forgetpassword.php?done=0'</script>";
	}


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
<!--Tap--> 
    <script src='../js/taps/jquery.min.js'></script>
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
<!--/////Menu Drop Down/////-->
<!--<script src="../js/dropdown/jquery-1.9.0.min.js"></script>-->
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

<link rel="stylesheet" href="../css/validationEngine.jquery.css" />
<script type="text/javascript" src="../js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../js/languages/jquery.validationEngine-en.js"></script>
<script>
	jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#formID2").validationEngine();
	});

	/**
	*
	* @param {jqObject} the field where the validation applies
	* @param {Array[String]} validation rules for this field
	* @param {int} rule index
	* @param {Map} form options
	* @return an error string if validation failed
	*/
	function checkHELLO(field, rules, i, options){
		if (field.val() != "HELLO") {
			// this allows to use i18 for the error msgs
			return options.allrules.validate2fields.alertText;
		}
	}
</script>
<link rel="stylesheet" href="../js/datepicker/css/mine-theme/jquery-ui-1.9.2.custom.css">
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
				
				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); },
					function() { $(this).removeClass('ui-state-hover'); }
				);

			});
</script>				
 

</head>

<body>

<?php include('../include/header.php') ?>
<form method="post" id="formID2" enctype="multipart/form-data">
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2>Forget User Or Password</h2>
            </hgroup>        
            <section class="paragraph03">
            <?php
            if($_GET['done'] == '1'){
				echo "<center>ระบบได้ทำการส่ง USER และ PASSWORD เข้า Email ของท่านแล้วค่ะ ขอบคุณค่ะ</center>";
			}elseif($_GET['done'] == '0'){
				echo "<center>ไม่มี Email นี้ในระบบค่ะ ขอบคุณค่ะ</center>";
			}else{
			?>
            
            
				<section class="blogRegister">
                	<header>
                    	Forget User Or Password
                    </header>
                    <fieldset>
                    	<ul>
                        	<li>
                            	<label>Email (อีเมล์)*</label>
                                <input name="u_mail" type="text" class="validate[required,custom[email]]" />
                                <div class="clear"></div>
                            </li>
                        </ul>
                    </fieldset>
                </section> 
                
              <nav class="buttonRegister">
                    <input name="u_register" type="submit" value="Send"/>
                </nav>   
             <?php } ?>                               	
            </section>
        </section>
 </form>       
        
        
        
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
