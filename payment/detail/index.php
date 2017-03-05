<?php
session_start();
require_once('../../dbconnect.inc');



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
<title>Cross Twelfth</title>
<link rel="shortcut icon" type="image/x-icon" href="../../images/favicon.ico">
<link href="../../css.css" rel="stylesheet" type="text/css" />
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
<link rel="stylesheet" href="../../css/accordion/accordion-style.css" type="text/css">
<!--End Accordion-->  
<!--/////Menu Drop Down/////-->
<script src="../../js/dropdown/jquery-1.9.0.min.js"></script>
<script type="text/javascript" language="javascript" src="../../js/slide_thumb1/jquery-1.8.2.min.js"></script>
<script src="../../js/dropdown/hoverIntent.js"></script>
<script src="../../js/dropdown/superfish.js"></script>
<script>
// initialise plugins
jQuery(function(){
    jQuery('#example').superfish({
        //useClick: true
    });
});
</script>
<!--/////Menu Drop Down/////--> 
</head>

<body>
<?php include('../../include/header.php') ?>
<section class="container">
	<section class="container_content">
    	<?php include('../../include/blogMember.php') ?>
    	<section class="paragraph overflowNone">
            <hgroup class="titleModule">
                <h2><?php echo $data_webboard['webboard_head'];?></h2>
            </hgroup>  
            <section class="navigator">
            	<nav class="left"><a href="../index.php">Payment</a> / <?php echo $data_webboard['webboard_head'];?></nav>
                <nav class="right">
                    <img alt="" title="" src="../images/calenda.png" />
                    <time datetime="2014-08-19"><?php echo date_from_db($data_webboard['date_in'],'');?></time>                	
                </nav>
            </section>      
            <section class="paragraph03">
				<?php echo $data_webboard['webboard_detail'];?>
            </section>
            <div class="clear"></div>
        </section>
	   
        
        
        
		<?php include('../../include/sitemap.php') ?>        
    </section>
</section>
<?php include('../../include/footer.php') ?>

<script type="text/javascript" src="../../js/accordion/script.js"></script>

<script type="text/javascript">

var parentAccordion=new TINY.accordion.slider("parentAccordion");
parentAccordion.init("acc","section",1,-1);

var nestedAccordion=new TINY.accordion.slider("nestedAccordion");
nestedAccordion.init("nested","section",1,-1,"acc-selected");

</script> 


</body>
</html>
