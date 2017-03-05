<?php 
session_start();
require_once('../dbconnect.inc');

//SQL Banner Slide
$select_slide = "SELECT * FROM banner_tb WHERE banner_type = 'slide' AND banner_ranking NOT IN ('','0') ORDER BY banner_ranking ";
$result_slide =@mysql_query($select_slide, $connect);
$num_slide =@mysql_num_rows($result_slide);

//SQL Webboard
$select_webboard = "SELECT * FROM webboard_tb WHERE webboard_ranking NOT IN ('','0') ORDER BY webboard_pin desc, webboard_ranking ";
$result_webboard =@mysql_query($select_webboard, $connect);
$num_webboard =@mysql_num_rows($result_webboard);

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
                <div class="title_bar2">
                	<img alt="How to Order Celeb" src="images/webboard/title.png" title="How to Order Celeb" />
                </div>
                <?php if($_SESSION['AUTH_PERMISSION_MEMID']!=''){?>
                <div class="block_bt-newtopic">
                	<a href="new_topic.php" class="bt-newtopic"></a>
                </div>
                <?php }?>    
                <div class="box_webboard">
                    <div class="block_title_webboard">
                        <div class="block_title_webboard-main">หัวข้อกระทู้</div>
                        <div class="block_title_webboard-view">ผู้เข้าชม</div>
                        <div class="block_title_webboard-view">ผู้ตอบกลับ</div>
                    </div>
                    <div class="block_webboard">
                    	<ul>
                        <?php for($b=1;$b<=intval($num_webboard);$b++){
									$data_webboard =@mysql_fetch_array($result_webboard);
									
									$select_comment = "SELECT * FROM answer_tb WHERE webboard_id = '".$data_webboard['webboard_id']."' ";
									$result_comment =@mysql_query($select_comment, $connect);
									$num_comment =@mysql_num_rows($result_comment);
									
									$day = date('d',strtotime($data_webboard['date_in']));
									$month = date('m',strtotime($data_webboard['date_in']));
									$year = date('Y',strtotime($data_webboard['date_in']));
						?>	
                            <li>
                            	<a href="weboard-detail.php?webboard_id=<?php echo $data_webboard['webboard_id'];?>">
                                <div class="block_content_webboard">
                                	<div class="block_content_webboard-main">
                                    	<div class="title-board">
                                        	<div class="title-board">
                                            	<?php echo $data_webboard['webboard_pin']=='1' ? "<img title=\"webboard_pin\" src=\"images/webboard/pin.png\" width=\"18\">" : "<img title=\"webboard_nomal\" src=\"images/webboard/icon.png\">";?>
                                                <!--<img alt="" title="" src="images/webboard/icon.png" />-->
                                            	<div class="t"><?php echo $data_webboard['webboard_head'];?></div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="sub-board">
                                            	<?php echo $data_webboard['webboard_title'];?>
                                            </div>
                                            <div class="dat-board">
                                            	<img alt="" title="" src="images/webboard/calenda.png" />
                                                <div class="t"><?php echo $day.".".$month.".".$year;?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block_content_webboard-view">
                                    <?php echo $data_webboard['webboard_couter'];?>
                                    </div>
                                    <div class="block_content_webboard-view">
                                    <?php echo $num_comment;?>
                                    </div>
                                </div>
                                </a>
                            </li>
						<?php }?>                         
                        </ul>
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
