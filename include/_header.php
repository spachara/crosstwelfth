<?php

 // Facebook API
 require("facebook.php");  
 define("FB_APP_ID" , "742461059118460");  // App ID ที่ได้จากการสร้าง App
 define("FB_APP_SECRET" , "e905f6b6ff4fb6f470c79b55e30fc0ca"); // App Secret ที่ได้จากการสร้าง App
 $FB = new Facebook(array(
           'appId'  => FB_APP_ID,
           'secret' => 'e905f6b6ff4fb6f470c79b55e30fc0ca',
         ));
 $param['redirect_uri'] = "http://www.crosstwelfth.com/demo/auth_fb.php"; // เมื่อ Login ผ่าน Facebook สำเร็จให้วิ่งกลับไป Link ดังกล่าว
 $param['scope'] = "email , publish_stream"; // คือ Permission ที่เราต้องการ เช่น publish_stream = อนุญาติให้โพสผ่านหน้า wall ได้
 $param['popup'] = 1; // เพื่อให้ App ใน Facebook ขึ้นว่า Login With Facebook
  
 $FB_ME_INFO = NULL;
 $FB_LOGIN_URL = "";
 $FB_LOGOUT_URL = "";
 
 if (empty($_SESSION['LOGIN_FB_ID'])) {   // Session นี้เราจะ Set ในไฟล์ auth_fb.php เมื่อทำการ Login สำเร็จ
  $FB_LOGIN_URL = $FB->getLoginUrl( $param );
 } else {
  $FB_LOGOUT_URL = $FB->getLogoutUrl();
 }
 
 define("FB_LOGIN_URL" , $FB_LOGIN_URL);
 define("FB_LOGOUT_URL" , $FB_LOGOUT_URL);
 

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
	$find = strpos($_SERVER["REQUEST_URI"],'?');
	if($find ==0){$ab = '?';}else{$ab ='&';}


 $ex_uri = explode($ab.'lag',$_SERVER["REQUEST_URI"]);
   
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$ex_uri[0];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$ex_uri[0];
 }
 
 
 return $pageURL;
}
$check_page = explode('/',$_SERVER['REQUEST_URI']);


$web_name = $_SERVER['SERVER_NAME'];

$menu_sub = $check_page[2]."/".$check_page[3];

$menu_sub2 = $check_page[2]."/".$check_page[3]."/".$check_page[4];

$url_image= "http://".$web_name."/demo/";
$var_page = count($check_page)-1;

?>
<header>
	<section class="container_content paragraph">
    	<section class="header-left">
			<img alt="Cross Twelfth" title="Cross Twelfth" src="<?php echo $url_image;?>images/cross_twelfth-logo.png" />
            <article>
            	LINE ID: crosstwelfth<br />
				Call 02 405 6562 , 081 380 2212
            </article>        	
        </section>
        <section class="header-right">
        	<section class="blogLanguage">
            	<span>
                	Language :
                </span>
                <a class="eng" href="<?php echo $url_image;?>language.php?link=<?=curPageURL()."&lag=eng";?>" <?php echo ($_SESSION['sess_language']=='eng' ? "id=active" : ""); ?>></a>
                <a class="thai" href="<?php echo $url_image;?>language.php?link=<?=curPageURL()."&lag=th";?>" <?php echo ($_SESSION['sess_language']=='th' || $_SESSION['sess_language']=='' ? "id=active" : ""); ?>></a>
            </section>
            <div class="clear"></div>
            <section class="inYourCart">
            	Now in your Cart  <span>0</span>  Bth.
            </section>
            <div class="clear"></div>
            <section class="blog_login">
            	<a href="#">
                	เข้าสู่ระบบ
                </a>
                <span>|</span>
                <a href="#">
                	สมัครสมาชิก
                </a>
				<?php
                 if (empty($_SESSION['LOGIN_FB_ID'])) {
                  echo '<a href="'.FB_LOGIN_URL.'"><img src="'.$url_image.'images/mockup-loginFacebook.jpg" /></a>';
                 } else {
                  echo " Hello , ".$_SESSION['LOGIN_FB_FULLNAME'];
                  echo '<a href="'.FB_LOGIN_URL.'"></a>';
                 }
                 ?>              
            </section>
        </section>
    </section>
</header>
<section class="blog-search">
	<section class="container_content">
        <ul class="acc" id="acc">
            <li style="position: static;">
                <section><a href="javascript:;">+ Search</a></section>
                <div style="height: 0px;" class="acc-section">
                	<div class="acc-content">
						<article class="content-blogSearch">
                        	<article class="paragraphSearch">
                                <article class="titleSearch">
                                    Category
                                </article>
                                <article class="detailSearch">
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>Top</span>
                                    </article>
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>Dress</span>
                                    </article>
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>Skirts</span>
                                    </article> 
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>Pants</span>
                                    </article> 
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>Shorts</span>
                                    </article>      
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>Jumpsuit</span>
                                    </article>                        	
                                </article>                            	
                            </article>
                            
                            <article class="paragraphSearch">
                                <article class="titleSearch">
                                    Size
                                </article>
                                <article class="detailSearch">
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>4</span>
                                    </article>
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>6</span>
                                    </article>
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>8</span>
                                    </article> 
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>10</span>
                                    </article> 
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>12</span>
                                    </article>      
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>14</span>
                                    </article> 
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>16</span>
                                    </article>     
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>S</span>
                                    </article>   
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>M</span>
                                    </article>   
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>L</span>
                                    </article>   
                                    <article>
                                        <input name="" type="checkbox" value="" />
                                        <span>One Size</span>
                                    </article>         	
                                </article>                            	
                            </article>
                        </article>
                        <nav class="buttonSearch">
                        	<input name="" type="button" value="Search..." />
                        </nav>
                    </div>
                </div>
                
            </li>
        </ul>
        
    </section>
</section>
<section class="pageMenu">
	<nav class="container_content">
    	<ul>
        	<li>
            	<a href="<?php echo $url_image;?>index.php" <?php echo ($check_page[2] == 'index.php' || $check_page[2] == ''  ? "class= active" : "" );?>>Home</a>
            </li>
            <li>
            	<a href="<?php echo $url_image;?>products" <?php echo ($check_page[2] == 'products' ? "class= active" : "" );?>>All Item</a>
            </li>
            <li>
            	<a href="#">How to Order</a>
            </li>
            <li>
            	<a href="#">Payment</a>
            </li>
            <li>
            	<a href="#">Delivery</a>
            </li>
            <li>
            	<a href="#">Contact us</a>
            </li>
            <li>
            	<a href="#">About Us</a>
            </li>
        </ul>
    </nav>
</section>
<section class="pageMenu-sub">
	<nav class="container_content">
    	<ul>
			<?php
            $sql_category = "SELECT * FROM category_tb where ranking not in('0','') ORDER BY ranking";
            $result_category = @mysql_query($sql_category, $connect);
            $num_category = @mysql_num_rows($result_category);
            
            for($i=1;$i<=intval($num_category);$i++){
            $data_category =@mysql_fetch_array($result_category);
            ?>
        	<li>
            	<a href="<?php echo $url_image;?>category/?c=<?php echo $data_category['name']; ?>" <?php //echo ($check_page[2] == 'category' ? "class= active" : "" );?>>
                	<?php echo $data_category['name']; ?>
                </a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</section>
