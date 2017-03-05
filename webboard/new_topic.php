<?php 
session_start();
require_once('../dbconnect.inc');
include("../fckeditor/fckeditor.php");

//SQL Banner Slide
$select_slide = "SELECT * FROM banner_tb WHERE banner_type = 'slide' AND banner_ranking NOT IN ('','0') ORDER BY banner_ranking ";
$result_slide =@mysql_query($select_slide, $connect);
$num_slide =@mysql_num_rows($result_slide);

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
</head>

<body>
<div class="background">
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
<?php
if($_POST['CREATE_BOARD']=='Create'){
	
	if($_SESSION['captcha']!=$_POST['webboard_code'] || $_SESSION['captcha']=='BADCODE'){
		
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
		$select_censor = "SELECT * FROM censor_tb WHERE censor_id ='1' ";
		$result_censor =@mysql_query($select_censor, $connect);
		$data_censor =@mysql_fetch_array($result_censor);
		
		$array_text = explode(',',$data_censor['censor_text']);
		
		$txt_in = $_POST['webboard_detail'];
		
		foreach ($array_text as $key){
	
			$txt_in = str_replace($key,"**",$txt_in);
		
		}
		$txt_show = $txt_in;
		
		
		$insert_webboard = "INSERT INTO webboard_tb (webboard_id, webboard_head, webboard_title, webboard_detail, date_in)";
		$insert_webboard .= "VALUES(NULL, '".$_POST['webboard_head']."', '".$_POST['webboard_title']."', '".$txt_show."', NOW())";
		@mysql_query($insert_webboard, $connect);
		
		session_unregister('create_head');
		session_unregister('create_title');
		session_unregister('create_detail');
		?>		 
				<script>
                        alert('สร้างกระทู้เรียบร้อยแล้ว');
                        location.href='index.php';
                 </script>
        <?php
	}
}
?>    
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
                        <div class="block_title_webboard-main2"><h1>สร้างกระทู้ใหม่</h1></div>
                        <div class="block_webboard2">
                            <div class="navgator">
                                <a href="index.php">เว็บบอร์ด</a>
                            </div>
                                                        
                        </div>
                    </div>
                </div>
                
              
                
                <div class="box_newtopic">
                	<div class="box_newtopic-top">
                    	<div class="box_newtopic-top-l"></div>
                        <div class="box_newtopic-top-r"></div>
                        <div class="box_newtopic-top-t">Create New Topic</div>
                    </div>
                    <div class="box_newtopic-content">
                    	<form name="comment" action="" method="post" id="formID" class="formular" enctype="multipart/form-data">
                        <div class="block_coment-post" style="width:650px;border:0px;">                	
                            <ul>
                                <!--<li><textarea name="w_detail" cols="50" rows="10" id="w_detail" class="FCKeditor"><?php echo stripslashes($_SESSION['answer']);?></textarea></li>-->
                                <li>
                                    <div class="left">ชื่อกระทู้ :</div>
                                    <div class="right">
                                        <div class="textFild-style2">
                                            <input name="webboard_head" type="text" class="validate[required]" value="<?php echo $_SESSION['create_head']?>" />
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">หัวข้อกระทู้ :</div>
                                    <div class="right">
                                        <div style="margin-top:20px;">
                                            <textarea name="webboard_title" cols="30" rows="5" id="webboard_title" class="validate[required]"><?php echo $_SESSION['create_title']?></textarea>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                <div style="margin-top:20px;" >
                                <?php
                                                                                                                    
                                                                $oFCKeditor = new FCKeditor('webboard_detail');
                                                                $oFCKeditor->BasePath	=  'fckeditor/' ;
                                                                $oFCKeditor->Value		= stripslashes($_SESSION['create_detail']) ;
                                                                $oFCKeditor->Create() ;
                                ?>
                                </div>
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
                                            <input name="webboard_code" type="text" class="validate[required]" maxlength="5" />
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">&nbsp;</div>
                                    <div class="right">
                                            <div class="submit-bt">
                                            <input name="CREATE_BOARD" type="submit" value="Create" /><!-- onclick="test();" -->
                                            </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        </form>
                    </div>
                    <div class="box_newtopic-bottom">
                    	<div class="box_newtopic-bottom-l"></div>
                        <div class="box_newtopic-bottom-r"></div>
                    </div>
                </div>
                
                
                	
                    	
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
