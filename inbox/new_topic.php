<?php 
session_start();
require_once('../dbconnect.inc');
include("../fckeditor/fckeditor.php");
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
<?php
if($_POST['CREATE_BOARD']=='Create'){
	
/*	if($_SESSION['captcha']!=$_POST['webboard_code'] || $_SESSION['captcha']=='BADCODE'){
		
		session_register('create_head');
		session_register('create_title');
		session_register('create_detail');
		$_SESSION['create_head'] = $_POST['webboard_head'];
		$_SESSION['create_title'] = $_POST['webboard_title'];
		$_SESSION['create_detail'] = $_POST['webboard_detail'];
		?>		 
				<script>
						alert('รหัสความปลอดภัยไม่ถูกต้อง');
						location.href='new_topic.php';
				 </script>
		<?php
		 exit();
	}else{
*/		$select_censor = "SELECT * FROM censor_tb WHERE censor_id ='1' ";
		$result_censor =@mysql_query($select_censor, $connect);
		$data_censor =@mysql_fetch_array($result_censor);
		
		$array_text = explode(',',$data_censor['censor_text']);
		
		$txt_in = $_POST['webboard_detail'];
		
		foreach ($array_text as $key){
	
			$txt_in = str_replace($key,"**",$txt_in);
		
		}
		$txt_show = $txt_in;
		
		
		$insert_webboard = "INSERT INTO inbox_tb (webboard_id, webboard_head, webboard_title, webboard_detail, date_in)";
		$insert_webboard .= "VALUES(NULL, '".$_POST['webboard_head']."', '".$_POST['webboard_title']."', '".$txt_show."', NOW())";
		@mysql_query($insert_webboard, $connect);
		
		session_unregister('create_head');
		session_unregister('create_title');
		session_unregister('create_detail');
		?>		 
				<script>
                        alert('เพิ่มหัวข้อการสนทนาเรียบร้อยแล้ว');
                        location.href='index.php';
                 </script>
        <?php
	}
/*}*/
?>    
<?php include('../include/header.php') ?>

<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2>เพิ่มหัวข้อการสนทนา</h2>
            </hgroup>        
            <section class="paragraph03">
				<section class="blogOrder">
                    <form name="comment" action="" method="post" id="formID" class="formular" enctype="multipart/form-data">
                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="29%" align="center" valign="middle">หัวข้อ :</td>
                          <td width="71%" align="left" valign="middle">
                            <input name="webboard_head" type="text" class="validate[required]" value="<?php echo $_SESSION['create_head']?>" />
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" valign="middle">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" valign="middle">
                                <?php
								$oFCKeditor = new FCKeditor('webboard_detail');
								$oFCKeditor->BasePath	=  '../../fckeditor/' ;
								$oFCKeditor->Value		= stripslashes($_SESSION['create_detail']) ;
								$oFCKeditor->Create() ;
                                ?>
                          </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center" valign="middle"><input name="CREATE_BOARD" type="submit" value="Create" /></td>                        
                        </tr>
                    </table>
                    </form>                              
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
