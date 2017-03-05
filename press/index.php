<?php
	session_start();
	require_once '../dbconnect.inc';

	$sql_event = "SELECT * FROM txt_tb WHERE type_name = 'press'";
	$result_event =@mysql_query($sql_event, $connect);
	$data_event =@mysql_fetch_array($result_event);

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
<script src="../js/dropdown/jquery-1.9.0.min.js"></script>
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
</head>

<body>
<?php include('../include/header.php') ?>
<form method="post" id="formID2" enctype="multipart/form-data">
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph overflowNone">
            <hgroup class="titleModule">
                <h2>
				<?php 
                echo ($_SESSION['sess_language'] == 'eng' ? "Press & More" : "สื่อประชาสัมพันธ์");
                ?>
                </h2>
            </hgroup>        
            <section class="paragraph03">
				<?php 
                echo ($_SESSION['sess_language'] == 'eng' ? $data_event['txt_detail_eng'] : $data_event['txt_detail_th']);
                ?>
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
