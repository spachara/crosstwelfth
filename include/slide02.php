<?php
$check_page = explode('/',$_SERVER['REQUEST_URI']);


$web_name = $_SERVER['SERVER_NAME'];

$menu_sub = $check_page[2]."/".$check_page[3];

$menu_sub2 = $check_page[2]."/".$check_page[3]."/".$check_page[4];

$url_image= "http://".$web_name."/banner/";
$var_page = count($check_page)-1;

$sql_banner_sl = "SELECT * FROM banner_tb WHERE ranking NOT IN ('','0') ORDER BY ranking";
$result_banner_sl =@mysql_query($sql_banner_sl, $connect);
$num_banner_sl =@mysql_num_rows($result_banner_sl);

?>
<section class="pageSlide" id="slideshow">

        <a href="#" class="active"><img alt="" title="" src="http://www.crosstwelfth.com/banner/20140613-173315.jpg" /></a>
</section>