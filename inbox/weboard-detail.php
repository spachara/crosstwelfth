<?php
session_start();
require_once('../dbconnect.inc');
include("../fckeditor/fckeditor.php") ;
//SQL Banner Slide
$select_slide = "SELECT * FROM banner_tb WHERE banner_type = 'slide' AND banner_ranking NOT IN ('','0') ORDER BY banner_ranking ";
$result_slide =@mysql_query($select_slide, $connect);
$num_slide =@mysql_num_rows($result_slide);

//SQL Webboard 
$select_webboard = "SELECT * FROM webboard_tb WHERE webboard_id = '".$_GET['webboard_id']."' ";
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
$update_couter = "UPDATE webboard_tb SET webboard_couter = '".$couter."' WHERE webboard_id = '".$_GET['webboard_id']."' ";
@mysql_query($update_couter, $connect);

//echo "<br><br><br>".htmlspecialchars($_POST['w_detail']);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crosstwelfth.com</title>
<link href="../css.css" rel="stylesheet" type="text/css" />
    <!--Banner Slide-->
    <link href="../css/slide_main/slide_main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/lazy/jquery.min.js"></script>
    <script type="text/javascript" src="../js/slide_main/jquery-slide_show2.js"></script>
    <!--End Banner Slide-->
       
    <!--Moving Scollbar-->
    <script src="../js/moving_scollbar/jquery.js"></script>
    <script src="../js/moving_scollbar/functions.js"></script>	
    <!--End Moving Scollbar-->     
    <!--hover fade-->
    <script type='text/javascript' src='../js/hover_fade/jquery.js'></script>
    <script type='text/javascript' src='../js/hover_fade/banner_small-fade.js'></script>
    <link href="../css/hover_fade//banner_small-fade_css.css" rel="stylesheet" type="text/css" />
    <!--end hover fade-->
    
    <script type="text/javascript" src="../fckeditor/fckeditor.js"></script>
	<script type="text/javascript" src="../js/jquery.start.js"></script>
<?php
if($_POST['SEND_BOARD']=='Send'){
	
	if($_SESSION['captcha']!=$_POST['w_code'] || $_SESSION['captcha']=='BADCODE'){
		
		session_register('answer');
		$_SESSION['answer'] = $_POST['w_detail'];
		?>		 
				<script>
						alert('รหัสความปลอดภัยไม่ถูกต้อง');
						location.href='weboard-detail.php?webboard_id=<?php echo $_GET['webboard_id'];?>';
				 </script>
		<?php
		 exit();
	}else{
		
		$select_censor = "SELECT * FROM censor_tb WHERE censor_id ='1' ";
		$result_censor =@mysql_query($select_censor, $connect);
		$data_censor =@mysql_fetch_array($result_censor);
		
		$array_text = explode(',',$data_censor['censor_text']);
		
		$txt_in = $_POST['w_detail'];
		
		foreach ($array_text as $key){
	
			$txt_in = str_replace($key,"**",$txt_in);
		
		}
		$txt_show = $txt_in;
		
		$insert_answer = "INSERT INTO answer_tb(answer_id, webboard_id, u_id, answer_detail, date_in)";
		$insert_answer .= "VALUES(NULL, '".$_GET['webboard_id']."', '".$_SESSION['AUTH_PERMISSION_MEMID']."', '".$txt_show."', NOW() )";
		@mysql_query($insert_answer, $connect);
		
		session_unregister('answer');
	?>		 
			<script>
                    alert('แสดงความคิดเห็นเรียบร้อยแล้ว');
					location.href='weboard-detail.php?webboard_id=<?php echo $_GET['webboard_id'];?>';
             </script>
    <?php
	}
	
}

?>    
</head>

<body>
<div class="background">
<div id="A1">
<?php //include('../include/header.php') ?>
<!--End Header-->
    <link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css"/>
	<script src="../js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
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
</div>
<div class="container_content">
<div class="box_bt_onTop">
<a href="#A1" class="bt_onTop"></a>
</div>
    <div class="page_content">
    	<div class="content-l">
			<?php include('../include/content_left.php') ?>                                            
        </div>
        <div class="content-r">
        	<div class="bg-content-r">                   
                <div class="box_webboard">
                    <div class="block_title_webboard2">
                        <div class="block_title_webboard-main2"><h1><?php echo $data_webboard['webboard_head'];?></h1></div>
                        <div class="block_webboard2">
                            <div class="navgator">
                                <a href="index.php">เว็บบอร์ด</a> / <?php echo $data_webboard['webboard_head'];?>
                            </div>
                            <div class="date_webboard">
                                <img alt="" title="" src="images/webboard/calenda.png" />
                                <div class="t"><?php echo date_from_db($data_webboard['date_in'],'');?></div>
                            </div>                            
                        </div>
                    </div>
                </div>
                
                <div class="paragraph2" style="margin-top:20px;">
                	<?php echo $data_webboard['webboard_detail'];?>
                    <!--<p>Insert Content</p>-->
                </div>
                <?php 
				
				//SQL Comment
				$select_comment = "SELECT * FROM answer_tb WHERE webboard_id = '".$data_webboard['webboard_id']."' ";
				$result_comment =@mysql_query($select_comment, $connect);
				$num_comment =@mysql_num_rows($result_comment);
				
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
                <!-- COMMENT -->
                <div class="box_coment">
                	<div class="block_coment-top">
                    	<div class="block_coment-top-l"></div>
                        <div class="block_coment-top-r"></div>
                        <div class="block_coment-top-t">ข้อความที่ <?php echo $c;?> ::</div>
                    </div>
                    <div class="block_coment-content">
                    	<div class="content"><?php echo $data_comment['answer_detail'];?></div>
                        <div class="block_user">
                        	<img alt="" title="" src="images/webboard/background.png" class="icon_user" />
                            <div class="name_user"><?php echo $user;?></div>
                            <img alt="" title="" src="images/webboard/calenda2.png" class="icon_date-comment" />
                            <div class="name_user"><?php echo date_from_db($data_comment['date_in'],'comment');?></div>
                        </div>
                    </div>
                    <div class="block_coment-bottom">
                    	<div class="block_coment-bottom-l"></div>
                        <div class="block_coment-bottom-r"></div>
                    </div>
                </div>
                <!-- END COMMENT -->
                <?php }?>
                <?php if($_SESSION['AUTH_PERMISSION_MEMID'] != ''){?>
                <form name="comment" action="" method="post" id="formID" class="formular" enctype="multipart/form-data">
                <div class="block_coment-post">                	
                	<ul>
                    	<!--<li><textarea name="w_detail" cols="50" rows="10" id="w_detail" class="FCKeditor"><?php echo stripslashes($_SESSION['answer']);?></textarea></li>-->
						<li>
						<?php
																											
														$oFCKeditor = new FCKeditor('w_detail');
														$oFCKeditor->BasePath	=  'fckeditor/' ;
														$oFCKeditor->Value		= stripslashes($_SESSION['answer']) ;
														$oFCKeditor->Create() ;
						?>
                        </li>
                        <li>
                        	<div class="left">&nbsp;</div>
                            <div class="right">
                            	<img src="captcha/captcha_img.php" width="141" height="37"> 
                            </div>
                        </li>
                        <li>
                        	<div class="left">security code :</div>
                            <div class="right">
                            	<div class="textFild-style2">
                            		<input name="w_code" type="text" class="validate[required]" maxlength="5" />
                                </div>
                            </div>
                        </li>
                        <li>
                        	<div class="left">&nbsp;</div>
                            <div class="right">
                            		<div class="submit-bt">
                                    <input name="SEND_BOARD" type="submit" value="Send" /><!-- onclick="test();" -->
                                    </div>
                            </div>
                        </li>
                    </ul>
                </div>
                </form>	
                <?php }?>	
            </div>
            
            
                    
        </div>
    </div>

</div>
<?php include('../include/footer.php') ?>
</div>
<script type="text/javascript">
  $("img.lazy").lazyload({
    effect: "fadeIn"
  });	
</script>
</body>
</html>
