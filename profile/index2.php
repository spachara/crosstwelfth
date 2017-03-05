<?php
session_start();
require_once '../dbconnect.inc';
if (!isset($_SESSION['AUTH_PERMISSION_MEMID'])) {
   echo "<script>location.href='../register/login.php'</script>";
}
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
<!--Accordion-->
<link rel="stylesheet" href="../css/accordion/accordion-style.css" type="text/css">
<!--End Accordion-->  
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

<?php 
if($_POST['u_edit']=='Edit'){
	//echo "<br><br><br><br>";
	$date = date_into_db($_POST['u_birth']);
        $update_user= '';
if(empty($_POST['u_pass']) )
{
    $update_user = "UPDATE  user_tb SET   u_lname =  '".mysql_real_escape_string($_POST['u_lname'])."', u_mobi =  '".mysql_real_escape_string($_POST['u_mobi'])."', u_fname =  '".mysql_real_escape_string($_POST['u_fname'])."', ";
	$update_user .= "u_mail = '".mysql_real_escape_string($_POST['u_mail'])."',  u_fax =  '".mysql_real_escape_string($_POST['u_fax'])."', u_add =  '".mysql_real_escape_string($_POST['u_add'])."', u_province =  '".mysql_real_escape_string($_POST['u_province'])."', u_zipcode = '".mysql_real_escape_string($_POST['u_zipcode'])."', ";
	$update_user .= " u_birth =  '".$date."' , u_facebook =  '".mysql_real_escape_string($_POST['u_facebook'])."' , line_id =  '".mysql_real_escape_string($_POST['line_id'])."' , line_name =  '".mysql_real_escape_string($_POST['line_name'])."' WHERE  u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
}
else
{
    $update_user = "UPDATE  user_tb SET u_pass =  '".mysql_real_escape_string($_POST['u_pass'] )."', u_lname =  '".mysql_real_escape_string($_POST['u_lname'])."', u_mobi =  '".mysql_real_escape_string($_POST['u_mobi'])."', u_fname =  '".mysql_real_escape_string($_POST['u_fname'])."', ";
	$update_user .= "u_mail = '".mysql_real_escape_string($_POST['u_mail'])."', u_fax =  '".mysql_real_escape_string($_POST['u_fax'])."', u_add =  '".mysql_real_escape_string($_POST['u_add'])."', u_province =  '".mysql_real_escape_string($_POST['u_province'])."', u_zipcode = '".mysql_real_escape_string($_POST['u_zipcode'])."', ";
	$update_user .= " u_birth =  '".$date."' , u_facebook =  '".mysql_real_escape_string($_POST['u_facebook'])."' , line_id =  '".mysql_real_escape_string($_POST['line_id'])."' , line_name =  '".mysql_real_escape_string($_POST['line_name'])."' WHERE  u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
}
	
	@mysql_query($update_user, $connect);
        
        $select_user = "SELECT * FROM user_tb WHERE u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
	$result_user =@mysql_query($select_user, $connect);
	$data_user =@mysql_fetch_array($result_user);
	//echo $update_user;
	?><script type="text/javascript">
			//alert ('สมัครสมชิกเรียบร้อยแล้วค่ะ'); 
					$(document).ready(function() {
			$.fancybox({
						href : 'popup.php?action=edit',
						type : 'iframe',
						width     : 370,
						height    : 400,
						minWidth  : 100,
						minHeight : 350,
						maxWidth  : 350,
						maxHeight : 9999,
						padding : 5,
						onClosed: function() {   
						 //parent.location.reload(true); 
						}
					});

			});
			
			//location.href='index.php';
			</script>
	<?php
}

include('../include/header.php') ?>
<form method="post" id="formID2" enctype="multipart/form-data">
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2>ข้อมูลสมาชิก</h2>
            </hgroup>        
            <section class="paragraph03">
				<section class="blogRegister">
                	<header>
                    	Change Password
                    </header>
                    <fieldset>
                    	<ul>
                        	<li>
                            	<label>Username (ชื่อล๊อกอิน)*</label>
                                <input name="view_user" type="text" id="view_user" value="<?php echo $data_user['u_user']!='' ? $data_user['u_user'] : $_SESSION['r_user'] ;?>" disabled="disabled"/>
                                <input name="u_user" type="hidden" id="u_user" value="<?php echo $data_user['u_user']!='' ? $data_user['u_user'] : $_SESSION['r_user'] ;?>"/>
                                <input name="u_id" type="hidden" id="u_id" value="<?php echo $data_user['u_id']  ;?>"/>
                                
                                
                            	<div class="clear"></div>
                            </li>
                             <li>
                            	<label>Password (รหัสผ่านปัจจุบัน)</label>
                                <input name="u_pass_c" type="password" id="u_pass_c"  class="validate[condRequired[u_pass],minSize[4],maxSize[20],ajax[ajaxPassCall]]"/>
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>New Password (รหัสผ่านใหม่)</label>
                                <input name="u_pass" type="password" id="u_pass" class="validate[minSize[4],maxSize[20]]" />
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>Re-enter New Password (ยืนยันรหัสผ่านใหม่)</label>
                                <input name="u_repassword" type="password" id="u_repassword" class="validate[equals[u_pass]]"/>
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
                            	<label>Email Address (อีเมล์)*</label>
                                <input name="u_mail" type="text" class="validate[required,custom[email]]" value="<?php echo $data_user['u_mail']!='' ? $data_user['u_mail'] : $_SESSION['r_mail'] ;?>" />
                                <!--<input name="u_mail" type="hidden" value="<?php echo $data_user['u_mail']!='' ? $data_user['u_mail'] : $_SESSION['r_mail'] ;?>"/>-->
                            	<div class="clear"></div>
                            </li>
                        	<li>
                            	<label>Facebook </label>
                                <input name="u_facebook" type="text" 
                                  value="<?php echo $data_user['u_facebook']!='' ? $data_user['u_facebook'] : $_SESSION['r_facebook'] ;?>"/>
                            	<div class="clear"></div>
                            </li>
                        	<li>
                            	<label>Line ID </label>
                                <input name="line_id" type="text" 
                                value="<?php echo $data_user['line_id']!='' ? $data_user['line_id'] : $_SESSION['r_line_id'] ;?>"/>
                            	<div class="clear"></div>
                            </li>
                        	<li>
                            	<label>Line name </label>
                                <input name="line_name" type="text" 
                                value="<?php echo $data_user['line_name']!='' ? $data_user['line_name'] : $_SESSION['r_line_name'] ;?>"/>
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
                                <input name="u_zipcode" type="text" class="validate[required,minSize[5],maxSize[5]]" value="<?php echo $data_user['u_zipcode']!='' ? $data_user['u_zipcode'] : $_SESSION['r_zipcode'] ;?>"/>
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
                    	Conditional
                    </header>
                    <article>
                    	เงื่อนไขการสมัคร
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
            </section>
        </section>
        
        
        
        
		<?php include('../include/sitemap.php') ?>        
    </section>
</section>
</form>
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