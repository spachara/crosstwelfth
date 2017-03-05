<?php

$url_image= "http://".$web_name."/banner/";
$var_page = count($check_page)-1;

$sql_banner_sl = "SELECT * FROM banner_tb WHERE ranking NOT IN ('','0') ORDER BY ranking";
$result_banner_sl =@mysql_query($sql_banner_sl, $connect);
$num_banner_sl =@mysql_num_rows($result_banner_sl);

?>
<section class="pageSlide" id="slideshow">
	<?php for ($b_sl=1; $b_sl<=$num_banner_sl; $b_sl++) {
				$data_banner_sl =@mysql_fetch_array($result_banner_sl);	
				if ($b_sl==1) {
					$banner_status_sl = "class=\"active\"";
				} else {
					$banner_status_sl = "";	
				}
	?>
        <a href="<?php echo $data_banner_sl['url'];?>" <?php echo $banner_status_sl;?>><img alt="" title="" src="<?php echo $url_image.$data_banner_sl['picture'];?>" /></a>
	<?php }?>
</section>