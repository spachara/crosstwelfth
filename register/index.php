<?php
session_start();
require_once '../dbconnect.inc';
require("../class.phpmailer.php");

if($_SESSION['AUTH_PERMISSION_MEMID'] != ''){
	//SQL Edit User
	$select_user = "SELECT * FROM user_tb WHERE u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
	$result_user =@mysql_query($select_user, $connect);
	$data_user =@mysql_fetch_array($result_user);
	
	$birthday = date_from_db($data_user['u_birth']);
}
function date_from_db($date){
	$d_from = substr($date,8,2);
	$m_from = substr($date,5,2);
	$y_from = substr($date,0,4);
	return $d_from."/".$m_from."/".$y_from;
}
function date_into_db($into){
	$d_into = substr($into,0,2);
	$m_into = substr($into,3,2);
	$y_into = substr($into,6,4);
	return $y_into."-".$m_into."-".$d_into;
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
<!--<script type="text/javascript" src="../js/datepicker/js/jquery-ui-1.8.22.custom.min.js"></script>-->
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

<!--////////////////////////////////////Tool tip////////////////////////////////////-->
<link href="../css/tooltip/tooltip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/tooltip/tooltip.js"></script>
<!--////////////////////////////////////Tool tip////////////////////////////////////-->
				
 

</head>

<body>
<?php
if($_POST['u_register']=='Register'){
	
	//echo "IN";
	$select_chk_user = "SELECT * FROM user_tb WHERE u_user = '".$_POST['u_user']."' ";
	$result_chk_user =@mysql_query($select_chk_user, $connect);
	$num_chk_user =@mysql_num_rows($result_chk_user);
	
	$select_chk_mail = "SELECT * FROM user_tb WHERE u_mail = '".$_POST['u_mail']."' ";
	$result_chk_mail =@mysql_query($select_chk_mail, $connect);
	$num_chk_mail =@mysql_num_rows($result_chk_mail);
	
	if($num_chk_user!='0'){
		session_register('r_sex');
		session_register('r_fname');
		session_register('r_lname');
		session_register('r_tel');
		session_register('r_mobi');
		session_register('r_fax');
		session_register('r_birth');
		session_register('r_mail');
		session_register('r_add');
		session_register('r_zipcode');
		session_register('r_facebook');
		session_register('r_line_id');
		session_register('r_line_name');
		
		$_SESSION['r_sex']=$_POST['u_sex'];
		$_SESSION['r_fname']=$_POST['u_fname'];
		$_SESSION['r_lname']=$_POST['u_lname'];
		$_SESSION['r_tel']=$_POST['u_tel'];
		$_SESSION['r_mobi']=$_POST['u_mobi'];
		$_SESSION['r_fax']=$_POST['u_fax'];
		$_SESSION['r_birth']=$_POST['u_birth'];
		$_SESSION['r_mail']=$_POST['u_mail'];
		$_SESSION['r_add']=$_POST['u_add'];
		$_SESSION['r_province']=$_POST['u_province'];
		$_SESSION['r_zipcode']=$_POST['u_facebook'];
		$_SESSION['r_facebook']=$_POST['u_add'];
		$_SESSION['r_line_id']=$_POST['u_line_id'];
		$_SESSION['r_line_name']=$_POST['u_line_name'];
		echo "<script>var username = '".$_POST['u_user']."';</script>";
		?><script type="text/javascript">
			var user = 'Username : '+username+' <br><br>มีคนใช้แล้ว กรุณาเปลี่ยนเป็นชื่ออื่น';
			
		$(document).ready(function() {
			$.fancybox({
						href : 'popup.php?action=user&get_user='+user,
						type : 'iframe',
						width     : 450,
						height    : 400,
						minWidth  : 100,
						minHeight : 350,
						maxWidth  : 350,
						maxHeight : 9999,
						padding : 5
					});
				
			});
			
			//alert (user); 
			//location.href='register.php';
            </script>            
		<?php
	}
	
	if($num_chk_mail!='0'){
		session_register('r_user');
		session_register('r_sex');
		session_register('r_fname');
		session_register('r_lname');
		session_register('r_tel');
		session_register('r_mobi');
		session_register('r_fax');
		session_register('r_birth');
		session_register('r_add');
		session_register('r_zipcode');
		session_register('r_facebook');
		session_register('r_line_id');
		session_register('r_line_name');

		$_SESSION['r_user']=$_POST['u_user'];
		$_SESSION['r_sex']=$_POST['u_sex'];
		$_SESSION['r_fname']=$_POST['u_fname'];
		$_SESSION['r_lname']=$_POST['u_lname'];
		$_SESSION['r_tel']=$_POST['u_tel'];
		$_SESSION['r_mobi']=$_POST['u_mobi'];
		$_SESSION['r_fax']=$_POST['u_fax'];
		$_SESSION['r_birth']=$_POST['u_birth'];
		$_SESSION['r_add']=$_POST['u_add'];
		$_SESSION['r_province']=$_POST['u_province'];
		$_SESSION['r_zipcode']=$_POST['u_zipcode'];
		$_SESSION['r_facebook']=$_POST['u_add'];
		$_SESSION['r_line_id']=$_POST['u_line_id'];
		$_SESSION['r_line_name']=$_POST['u_line_name'];

		echo "<script>var mail = '".$_POST['u_mail']."';</script>";
		?><script type="text/javascript">
			var email = 'Email : '+mail+' <br><br>มีคนใช้แล้ว กรุณาเปลี่ยนเป็นอีเมล์ออื่น';
			
		$(document).ready(function() {
			$.fancybox({
						href : 'popup.php?action=mail&get_mail='+email,
						type : 'iframe',
						width     : 450,
						height    : 400,
						minWidth  : 100,
						minHeight : 350,
						maxWidth  : 350,
						maxHeight : 9999,
						padding : 5
					});
				
			});
			
			//alert (email); 
			//location.href='register.php';
            </script>
		<?php
	}
	
	if($num_chk_user=='0' && $num_chk_mail=='0'){
		$date = date_into_db($_POST['u_birth']);	
		
		$insert_user = "INSERT INTO user_tb(u_id, u_user, u_pass, u_sex, u_fname, u_lname, u_tel, u_mobi, u_fax,";
		$insert_user .= " u_birth, u_mail, u_add, u_province,  u_zipcode, u_facebook, line_id, line_name ,  date_in ) ";
		$insert_user .= "VALUES (NULL, '". mysql_real_escape_string($_POST['u_user'])."', '".mysql_real_escape_string($_POST['u_pass'])."', '".mysql_real_escape_string($_POST['u_sex'])."'";
		$insert_user .= ", '".mysql_real_escape_string($_POST['u_fname'])."', '".mysql_real_escape_string($_POST['u_lname'])."', ";
		$insert_user .= " '".mysql_real_escape_string($_POST['u_tel'])."', '".mysql_real_escape_string($_POST['u_mobi'])."', '".mysql_real_escape_string($_POST['u_fax'])."', '".$date."'";
		$insert_user .= ", '".mysql_real_escape_string($_POST['u_mail'])."', '".mysql_real_escape_string($_POST['u_add'])."', ";
		$insert_user .= " '".mysql_real_escape_string($_POST['u_province'])."', '".mysql_real_escape_string($_POST['u_zipcode'])."', '".mysql_real_escape_string($_POST['u_facebook'])."'";
		$insert_user .= ", '".mysql_real_escape_string($_POST['line_id'])."', '".mysql_real_escape_string($_POST['line_name'])."', NOW() )";
		@mysql_query($insert_user, $connect);
		//echo "<br><br><br>".$insert_user;
		
		session_unregister('r_user');
		session_unregister('r_sex');
		session_unregister('r_fname');
		session_unregister('r_lname');
		session_unregister('r_tel');
		session_unregister('r_mobi');
		session_unregister('r_fax');
		session_unregister('r_mail');
		session_unregister('r_add');
		session_unregister('r_zipcode');
		session_unregister('r_birth');
		session_unregister('r_birth');
		session_unregister('r_birth');
		session_unregister('r_birth');
		session_unregister('r_facebook');
		session_unregister('r_line_id');
		session_unregister('r_line_name');

		$messages = "<p>";
		$messages .= "เรียนคุณ ".$_POST['u_fname']." ".$_POST['u_lname']."<br><br>";
		
		
		$messages .= "&nbsp;&nbsp;&nbsp;&nbsp;ขอบคุณที่สมัครสมาชิกกับ www.crosstwelfth.com ค่ะ<br>";
		$messages .= "ท่านสามารถสั่งซื้อสินค้า  แจ้งชำระเงิน  ตรวจสอบสถานะใบสั่งซื้อ  และติดต่อพูดคุยกับทีมงาน<br>";
		$messages .= "ได้ด้วยการ Log In เข้าเว็บไซต์ของเรา  <a href=\"http://www.crosstwelfth.com/register/login.php\">login</a><br><br>";
		
		
		$messages .= "<b>Username</b> : ".$_POST['u_user']."<br>";
		$messages .= "<b>Password</b> : ".$_POST['u_pass']."<br><br>";
		$messages .= "เข้าชมและสั่งซื้อสินค้าในเว็บไซต์  <a href=\"http://www.crosstwelfth.com\">Crosstwelfth</a><br><br>";
		$messages .= "<b>C12  HOTLINE</b> :: 02 4056562,  081 3802212  (จันทร์-เสาร์   10.00 - 20.00 น.)<br><br>";
		$messages .= "<b>LINE</b>:: crosstwelfth_team<br>";
		$messages .= "<b>E-MAIL</b> :: info@crosstwelfth.com<br><br>";
		$messages .= "<img src=\"http://www.crosstwelfth.com/register/images/register.jpg\"><br>";
		$messages .= "</p>";
			
		
		
		//$emailto= "z.nosferatu5@gmail.com, tanapong@thetreedesign.com";
		echo $emailto = $_POST['u_mail'].", amanichanon@gmail.com, crosstwelfth@yahoo.com, cross12th@hotmail.com";
		$email_from="Cross Twelfth<info@crosstwelfth.com>";
		$subject='Cross Twelfth :: Register';
		$header= 'MIME-Version: 1.0' . "\r\n";
		$header.= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$header.= 'From: '.$email_from. "\r\n";
		
		//if (mail($emailto,$subject,$messages,$header)) {
				
		
		
	
				$select_user = "SELECT * FROM user_tb WHERE u_user = '".$_POST['u_user']."' AND u_pass = '".$_POST['u_pass']."' ";
				$result_user =@mysql_query($select_user);
				$num_user =@mysql_num_rows($result_user);
				
				if ($num_user == 1) {
					$data_user =@mysql_fetch_array($result_user);
					session_register("AUTH_PERMISSION_FNAME"); 
					session_register("AUTH_PERMISSION_LNAME"); 
					session_register("AUTH_PERMISSION_MEMID");
					
					$_SESSION['AUTH_PERMISSION_FNAME'] = $data_user['u_fname'];
					$_SESSION['AUTH_PERMISSION_LNAME'] = $data_user['u_lname'];
					$_SESSION['AUTH_PERMISSION_MEMID'] = $data_user['u_id'];
				}

		?>
		
		<script type="text/javascript">
		$(document).ready(function() {
			$.fancybox({
						href : 'popup.php?action=register',
						width     : 450,
						height    : 400,
						minWidth  : 100,
						minHeight : 350,
						maxWidth  : 350,
						maxHeight : 9999,
						padding : 5,
						onClosed: function() {   
						parent.location.assign('../allitem/');
						
						}
					});
				
			});
			
			
			</script>
		<?php
		//}
	}
}

if($_POST['u_edit']=='Edit'){
	//echo "<br><br><br><br>";
	$date = date_into_db($_POST['u_birth']);
	

	$update_user = "UPDATE  user_tb SET u_pass =  '".mysql_real_escape_string($_POST['u_pass'])."', u_lname =  '".mysql_real_escape_string($_POST['u_lname'])."', u_mobi =  '".mysql_real_escape_string($_POST['u_mobi'])."', u_fname =  '".mysql_real_escape_string($_POST['u_fname'])."', ";
	$update_user .= " u_fax =  '".mysql_real_escape_string($_POST['u_fax'])."', u_add =  '".mysql_real_escape_string($_POST['u_add'])."', u_province =  '".mysql_real_escape_string($_POST['u_province'])."', u_zipcode = '".mysql_real_escape_string($_POST['u_zipcode'])."', ";
	$update_user .= " u_birth =  '".$date."' , u_facebook =  '".mysql_real_escape_string($_POST['u_facebook'])."' , line_id =  '".mysql_real_escape_string($_POST['line_id'])."' , line_name =  '".mysql_real_escape_string($_POST['line_name'])."' WHERE  u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
	@mysql_query($update_user, $connect);
	//echo $update_user;
	?><script type="text/javascript">
			//alert ('สมัครสมชิกเรียบร้อยแล้วค่ะ'); 
					$(document).ready(function() {
			$.fancybox({
						href : 'popup.php?action=edit',
						type : 'iframe',
						width     : 450,
						height    : 400,
						minWidth  : 100,
						minHeight : 350,
						maxWidth  : 350,
						maxHeight : 9999,
						padding : 5,
						onClosed: function() {   
						 parent.location.reload(true); 
						}
					});

			});
			
			//location.href='index.php';
			</script>
	<?php
}
?>     

<?php include('../include/header.php') ?>
<form method="post" id="formID2" enctype="multipart/form-data">
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph overflowNone">
            <hgroup class="titleModule">
                <h2>สมัครสมาชิก</h2>
            </hgroup>        
            <section class="paragraph03 overflowNone">
				<section class="blogRegister">
                	<header>
                    	Create Account
                    </header>
                    <fieldset>
                    	<ul>
                        	<li>
                            	<label>Username (ชื่อล๊อกอิน)*</label>
                                <input name="u_user" type="text" id="u_user" class="validate[required,minSize[4]" value="<?php echo $data_user['u_user']!='' ? $data_user['u_user'] : $_SESSION['r_user'] ;?>" placeholder="เฉพาะตัวเลขและภาษาอังกฤษเท่านั้น" > 
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>Password (รหัสผ่าน)*</label>
                                <input name="u_pass" type="password" id="u_pass" class="validate[required,minSize[4]]" value="<?php echo $data_user['u_pass'];?>"/>
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>Re-enter Password (ยืนยันรหัสผ่าน)*</label>
                                <input name="u_repassword" type="password" id="u_repassword" class="validate[required, equals[u_pass]]" value="<?php echo $data_user['u_pass'];?>"/>
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>Email Address (อีเมล์)*</label>
                                <input name="u_mail" type="text" class="validate[required,custom[email]]" value="<?php echo $data_user['u_mail']!='' ? $data_user['u_mail'] : $_SESSION['r_mail'] ;?>"/>
                            	<div class="clear"></div>
                            </li>
                        </ul>
                    </fieldset>
                </section>            
                <section class="blogRegister">
                	<header>
                    	Account Info
                    </header>
                    <fieldset>
                    	<ul>
                        	<li>
                            	<label>ชื่อ *</label>
                                <input name="u_fname" type="text" class="validate[required]" 
                                value="<?php echo $data_user['u_fname']!='' ? $data_user['u_fname'] : $_SESSION['r_fname'] ;?>"/>
                            	<div class="clear"></div>
                            </li>
                        	<li>
                            	<label>นามสกุล *</label>
                                <input name="u_lname" type="text" class="validate[required]" 
                                value="<?php echo $data_user['u_lname']!='' ? $data_user['u_lname'] : $_SESSION['r_lname'] ;?>"/>
                            	<div class="clear"></div>
                            </li>
                        	<li>
                            	<label>Facebook </label>
                                <input name="u_facebook" type="text" 
                                value="<?php echo $data_user['u_facebook']!='' ? $data_user['u_facebook'] : $_SESSION['r_facebook'] ;?>"/>
                                <span class="hint">ชื่อ Facebook ของลูกค้า ที่แสดงเวลาส่งข้อความ เพื่อทีมงานจะติดต่อลูกค้าผ่านกล่องข้อความของ Facebook ค่ะ<span class="hint-pointer">&nbsp;</span></span>
                            	<div class="clear"></div>
                            </li>
                        	<li>
                            	<label>Line ID </label>
                                <input name="line_id" type="text" 
                                value="<?php echo $data_user['line_id']!='' ? $data_user['line_id'] : $_SESSION['r_line_id'] ;?>"/>
                                <span class="hint">LINE ID ของลูกค้าเพื่อทีมงานจะติดต่อผ่านช่องทาง LINE<span class="hint-pointer">&nbsp;</span></span>
                            	<div class="clear"></div>
                            </li>
                        	<li>
                            	<label>Line name </label>
                                <input name="line_name" type="text" 
                                value="<?php echo $data_user['line_name']!='' ? $data_user['line_name'] : $_SESSION['r_line_name'] ;?>"/>
                                <span class="hint">ชื่อที่ลูกค้าใช้ใน LINE เพื่อค้นหา และติดต่อกับลูกค้าได้รวดเร็วขึ้น และหากมีการเปลี่ยนแปลงในภายหลัง อย่าลืมอัพเดทในหน้าสมาชิกนะคะ เพื่อเราจะไม่พลาดการติดต่อกันค่ะ<span class="hint-pointer">&nbsp;</span></span>
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>Date of Birth (วันเกิด)*</label>
                                <input name="u_birth" type="text" id="datepicker" value="<?php echo $birthday!='' ? $birthday : $_SESSION['r_birth'] ;?>"/>
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>Phone number (หมายเลขโทรศัพท์มือถือ)*</label>
                                <input name="u_mobi" type="text" class="validate[required]" 
                                value="<?php echo $data_user['u_mobi']!='' ? $data_user['u_mobi'] : $_SESSION['r_mobi'] ;?>"/>
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>Delivery Address (ที่อยู่สำหรับส่งสินค้า)*</label>
                                <textarea name="u_add" cols="" rows="" class="validate[required]"><?php echo ($data_user['u_add']!='' ? $data_user['u_add'] : $_SESSION['r_add']) ;?></textarea>
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>จังหวัด *</label>
                                <select name="u_province" id="u_province" class="validate[required]">
                                    <option value="">กรุณาเลือกจังหวัด</option>
                                    <?php 
                                    $select_country = "SELECT * FROM province order by PROVINCE_NAME";
                                    $result_country =@mysql_query($select_country, $connect);
                                    $num_country =@mysql_num_rows($result_country);
                                    for($c=1;$c<=intval($num_country);$c++){
                                    $data_country =@mysql_fetch_array($result_country);	
                                    ?>
                                    <option value="<?php echo $data_country['PROVINCE_NAME'];?>" <?php echo ($data_user['u_province'] == $data_country['PROVINCE_NAME'] ? "selected=selected" : "");?>><?php echo $data_country['PROVINCE_NAME'];?></option>
                                    <?php } ?>
                                </select>
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>Postcode (รหัสไปรษณีย์)*</label>
                                <input name="u_zipcode" type="text" class="validate[required]" value="<?php echo $data_user['u_zipcode']!='' ? $data_user['u_zipcode'] : $_SESSION['r_zipcode'] ;?>"/>
                            	<div class="clear"></div>
                            </li>
                             <?php if($_SESSION['AUTH_PERMISSION_MEMID'] == ''){?>
                            <!--<li>
                            	<label>&nbsp;</label>
                                <img alt="" title="" src="images/captcha.png" />
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>Security Code (รหัสความปลอดภัย)</label>
                                <input name="" type="text" />
                            	<div class="clear"></div>
                            </li>-->
                            <?php } ?>
                        </ul>
                    </fieldset>
                </section> 
                
                <?php if($_SESSION['AUTH_PERMISSION_MEMID'] == ''){?>
   
                <section class="blogRegister">
                	<header>
                    	<?php
                        echo ($_SESSION['sess_language'] == 'eng' ? "Terms &  Condition" : "เงื่อนไขและข้อตกลง");
						?>
                    </header>
                    <article>
                    <?php
					$sql_event = "SELECT * FROM txt_tb WHERE type_name = 'condition'";
					$result_event =@mysql_query($sql_event, $connect);
					$data_event =@mysql_fetch_array($result_event);
					
					
					
					
               	    echo ($_SESSION['sess_language'] == 'eng' ? $data_event['txt_detail_eng'] : $data_event['txt_detail_th']);
					
					?>
                    </article>
                    <section class="checkbox">
                    	<input name="member_confirm" type="checkbox" value="" class="validate[required]" />
                        <label>ฉันยอมรับเงื่อนไขในการสมัครดังกล่าว</label>
                    </section>
                    
                </section>  
                <?php } ?>    
              <nav class="buttonRegister">
					<?php if($_SESSION['AUTH_PERMISSION_MEMID'] != ''){?>
                    <input name="u_edit" type="submit" value="Edit"/>
                    <?php }else{?>
                    <input name="u_register" type="submit" value="Register"/>
                    <input name="" type="reset" value="Clear" />
                  <?php }?>
                  
                </nav>  
                <div class="clear"></div>                                	
            </section>
            <div class="clear"></div>
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
