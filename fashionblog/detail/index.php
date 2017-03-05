<?php 
session_start();
include "../../dbconnect.inc";


$select_fashionblog = "SELECT * FROM fashionblog_tb WHERE fashionblog_id = '".$_GET['id']."' ";
$result_fashionblog =@mysql_query($select_fashionblog, $connect);
$data_fashionblog =@mysql_fetch_array($result_fashionblog);

if ($_SESSION['sess_language'] == "eng") {
	$fashionblog_name = $data_fashionblog['fashionblog_name_eng'];
	$fashionblog_detail = $data_fashionblog['fashionblog_detail_eng'];
} else  {
	$fashionblog_name = $data_fashionblog['fashionblog_name_th'];
	$fashionblog_detail = $data_fashionblog['fashionblog_detail_th'];
}

$vdo_url = explode('/', $data_fashionblog['fashionblog_vdo']);

$select_gallery = "SELECT * FROM gallery_tb WHERE gallery_type = 'fashionblog' AND gallery_type_id = '".$data_fashionblog['fashionblog_id']."' ";
$result_gallery =@mysql_query($select_gallery, $connect);
$num_gallery =@mysql_num_rows($result_gallery);
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
<!--<script src="../js/dropdown/jquery-1.9.0.min.js"></script>-->
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
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////-->
	<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>-->
	<script type="text/javascript" src="../../js/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="../../js/fancybox/jquery.fancybox-1.3.1.js"></script>
    <script type="text/javascript" src="../../js/fancybox/fancybox-jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
<!--//////////////////////////////////////Fancy Box//////////////////////////////////////--> 


<!--////////////////////////////////////Tool tip////////////////////////////////////-->
<link href="../../css/tooltip/tooltip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../js/tooltip/tooltip.js"></script>
<!--////////////////////////////////////Tool tip////////////////////////////////////-->
</head>

<body>


<?php include('../../include/header.php') ?>
<section class="container">
	<section class="container_content">
    	<?php include('../../include/blogMember.php') ?>
    	<section class="paragraph overflowNone">
            <hgroup class="titleModule">
                <h2><?php echo $fashionblog_name;?></h2>
            </hgroup>  
            <!--Edit Navigator-->
            <div class="navigator">
                <a href="../../index.php">Home</a>
                >
                <a href="../index.php">Fashion Blog</a>
            </div>   
            <section class="paragraph03">
            
        <?php if ($data_fashionblog['fashionblog_vdo'] != "") {?>
            	<section class="vdobox">
                	<iframe width="600" height="400" src="http://www.youtube.com/embed/<?php echo $vdo_url[3];?>?wmode=transparent&autoplay=0"  frameborder="0" allowfullscreen></iframe> 
                </section>
        <?php }?>    
                
                
            	<article class="paragraph06 textcontent">
                    <?php echo $fashionblog_detail;?>
                </article>
            </section>
            
            
		<?php if ($num_gallery > 0) {?>
            <section class="boxgallery">
            	<ul>
                <?php for ($g=1; $g<=$num_gallery; $g++) {
							$data_gallery =@mysql_fetch_array($result_gallery);	
				?>
                	<li>
                        <a href="../../../images/gallery/fashionblog/<?php echo $data_gallery['gallery_pic2'];?>" id="example2" rel="example_group">
                            <img alt="" title="" src="../../../images/gallery/fashionblog/<?php echo $data_gallery['gallery_pic1'];?>">
                        </a>
                        
                    </li>
				<?php } ?>
                </ul>
            </section>
         <?php  } ?>
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
