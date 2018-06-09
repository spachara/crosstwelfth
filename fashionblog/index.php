<?php
	session_start();
	require_once '../dbconnect.inc';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K8BH2BP');</script>
<!-- End Google Tag Manager -->
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


<!--////////////////////////////////////Tool tip////////////////////////////////////-->
<link href="../css/tooltip/tooltip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/tooltip/tooltip.js"></script>
<!--////////////////////////////////////Tool tip////////////////////////////////////-->
</head>

<body>


<?php include('../include/header.php') ?>
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph overflowNone">
            <hgroup class="titleModule">
                <h2>Fashion Blog</h2>
            </hgroup>
            <section class="paragraph03 thumbList2">
            	<ul> COMING SOON! 
                <?php
					$sql_news = "SELECT * FROM fashionblog_tb where fashionblog_ranking not in ('','0')  ORDER BY fashionblog_ranking ";
					$result_news =@mysql_query($sql_news, $connect);
					$num_news =@mysql_num_rows($result_news);

					for($t=1;$t<=intval($num_news);$t++){
					$data_news =@mysql_fetch_array($result_news);
					
					$date_in = substr($data_news['date_in'], 8, 2).".".substr($data_news['date_in'], 5, 2).".".substr($data_news['date_in'], 0, 4);
				?>
                	<li>
                    	<a href="detail/?id=<?php echo $data_news['fashionblog_id'];?>">
                        	<div class="boxdisplay">
                            	<img alt="" title="" src="../../images/fashionblog/<?php echo $data_news['fashionblog_pic'];?>" />
                            </div>
                            <div class="date">
                            	<?php echo $date_in;?>
                            </div>
                            <article>
							<?php 
                            echo ($_SESSION['sess_language'] == 'eng' ? $data_news['fashionblog_name_eng'] : $data_news['fashionblog_name_th']);
                            ?>
                           	</article>
                        </a>
                    </li>
				<?php } ?>
                </ul>
            </section>
            <div class="clear"></div>
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
