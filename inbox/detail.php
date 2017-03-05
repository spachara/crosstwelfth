<?php
session_start();
require_once('../dbconnect.inc');
include("../fckeditor/fckeditor.php") ;



$select_webboard_member = "SELECT * FROM inbox_tb WHERE webboard_pin = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
$result_webboard_member =@mysql_query($select_webboard_member, $connect);
$num_member = @mysql_num_rows($result_webboard_member);

if($num_member == '' || $num_member == '0' ){
	
$insert_webboard = "INSERT INTO inbox_tb (webboard_id, webboard_pin, webboard_head, webboard_title, webboard_detail, date_in)";
$insert_webboard .= "VALUES(NULL, '".$_SESSION['AUTH_PERMISSION_MEMID']."', 'สนทนากับ Admin', '', '', NOW())";
@mysql_query($insert_webboard, $connect);

}

$select_webboard = "SELECT * FROM inbox_tb WHERE webboard_pin = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
$result_webboard =@mysql_query($select_webboard, $connect);
$data_webboard =@mysql_fetch_array($result_webboard);

function date_from_db($data,$type){	
	$day = date('d',strtotime($data));
	$month = date('m',strtotime($data));
	$year = date('Y',strtotime($data));
	$hour = date('H',strtotime($data));
	$minute = date('i',strtotime($data));
	$second = date('s',strtotime($data));
	
	if($type==''){
		
		return $day.".".$month.".".$year;
	}
	if($type=='comment'){
		
		return $day.".".$month.".".$year." ".$hour.":".$minute.":".$second;
	}
}

$couter = 1;
$couter += $data_webboard['webboard_couter'];
//SQL Couter Webboard
$update_couter = "UPDATE inbox_tb SET webboard_couter = '".$couter."' WHERE webboard_id = '".$data_webboard['webboard_id']."' ";
@mysql_query($update_couter, $connect);

//echo "<br><br><br>".htmlspecialchars($_POST['w_detail']);
 
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
if($_POST['SEND_BOARD']=='Send'){
	
if($_POST['w_detail']){
		
		$select_censor = "SELECT * FROM censor_tb WHERE censor_id ='1' ";
		$result_censor =@mysql_query($select_censor, $connect);
		$data_censor =@mysql_fetch_array($result_censor);
		
		$array_text = explode(',',$data_censor['censor_text']);
		
		$txt_in = $_POST['w_detail'];
		
		foreach ($array_text as $key){
	
			$txt_in = str_replace($key,"**",$txt_in);
		
		}
		$txt_show = $txt_in;
		
		$insert_answer = "INSERT INTO inbox_answer_tb(answer_id, webboard_id, u_id, answer_detail, date_in)";
		$insert_answer .= "VALUES(NULL, '".$_POST['webboard_id']."', '".$_SESSION['AUTH_PERMISSION_MEMID']."', '".$txt_show."', NOW() )";
		@mysql_query($insert_answer, $connect);
		
		$sql_webboard1 = "UPDATE inbox_tb SET webboard_title = '0'";
		$sql_webboard1 .= " where webboard_id = '".$_POST['webboard_id']."'";
		@mysql_query($sql_webboard1, $connect);
		
		session_unregister('answer');
	?>		 
			<script>
                    alert('ส่งข้อความเรียบร้อยแล้วค่ะ');
					location.href='detail.php?mid=<?php echo $_SESSION['AUTH_PERMISSION_MEMID'];?>';
             </script>
    <?php
}else{
	?>		 
			<script>
                    alert('กรุณากรอกข้อความ');
					location.href='detail.php?mid=<?php echo $_SESSION['AUTH_PERMISSION_MEMID'];?>';
             </script>
    <?php
}
	
}

?>    
<?php include('../include/header.php') ?>

<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph">
            <hgroup class="titleModule">
                <h2><?php echo $data_webboard['webboard_head'];?> ( <?php echo date_from_db($data_webboard['date_in'],'');?> )</h2>
            </hgroup>        
            <section class="paragraph03">
				<section class="">
                	<?php echo $data_webboard['webboard_detail'];?><br /><br />

                    <form name="comment" action="" method="post" id="formID" class="formular" enctype="multipart/form-data">
                    <input type="hidden" name="webboard_id" value="<?php echo $data_webboard['webboard_id'];?>" />
                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" valign="middle">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center" valign="middle">
                                <?php
																											
														$oFCKeditor = new FCKeditor('w_detail');
														$oFCKeditor->BasePath	=  '../../fckeditor/' ;
														$oFCKeditor->Value		= stripslashes($_SESSION['answer']) ;
														$oFCKeditor->Create() ;
                                ?>

                          </td>
                        </tr>
                        <tr>
                            <td align="center" valign="middle"><input name="SEND_BOARD" type="submit" value="Send" /></td>
                        </tr>
                    </table>
                  </form>  
                <!-- COMMENT -->
                
            <section class="paragraph03 boxComment">
                
                <?php 
				
				//SQL Comment
				$select_comment = "SELECT * FROM inbox_answer_tb WHERE webboard_id = '".$data_webboard['webboard_id']."' order by answer_id desc";
				$result_comment =@mysql_query($select_comment, $connect);
				$num_comment =@mysql_num_rows($result_comment);
				$a = $num_comment;
				for($c=1;$c<=intval($num_comment);$c++){
					
				$data_comment =@mysql_fetch_array($result_comment);
				
				if($data_comment['u_id']!='0'){
				//SQL User
				$select_user = "SELECT * FROM user_tb WHERE u_id = '".$data_comment['u_id']."' ";
				$result_user =@mysql_query($select_user, $connect);
				$data_user =@mysql_fetch_array($result_user);
				
					$user = $data_user['u_fname'];
				}
				if($data_comment['u_id']=='0'){
					$user = "ADMIN";
				}
				?>
                <section class="blogStyle">
                	<header>
                    	ข้อความที่ <?php echo $a;?> ::
                    </header>
                    <article class="paragraph02">
                    	<?php echo $data_comment['answer_detail'];?>
                    </article>
                    <div class="block_user">
                        <img alt="" title="" src="images/webboard/background.png" class="icon_user" />
                        <div class="name_user"><?php echo $user;?></div>
                        <img alt="" title="" src="images/webboard/calenda2.png" class="icon_date-comment" />
                        <div class="name_user"><?php echo date_from_db($data_comment['date_in'],'comment');?></div>
                    </div>                    
                    
                </section>                        						                                                            
			<?php $a--; }?>	
			</section>						                                     	
    
                
                
                <!-- END COMMENT -->                                              
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
