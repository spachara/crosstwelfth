<?php
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8BH2BP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

session_register('AUTH_PERMISSION_MEMID');
session_register('sess_language');
session_register('LOGIN_FB_ID');

if($_SESSION['sess_language']==''){
$_SESSION['sess_language']='th';	
}
 // Facebook API
 require("facebook.php");  
 define("FB_APP_ID" , "429069913961602");  // App ID ที่ได้จากการสร้าง App
 define("FB_APP_SECRET" , "ee768c8cd2f0d1952fb2f0786ebbab9d"); // App Secret ที่ได้จากการสร้าง App
 $FB = new Facebook(array(
           'appId'  => FB_APP_ID,
           'secret' => 'ee768c8cd2f0d1952fb2f0786ebbab9d',
         ));
 $param['redirect_uri'] = "http://www.crosstwelfth.com/auth_fb.php"; // เมื่อ Login ผ่าน Facebook สำเร็จให้วิ่งกลับไป Link ดังกล่าว
 $param['scope'] = "email , public_profile"; // คือ Permission ที่เราต้องการ เช่น publish_stream = อนุญาติให้โพสผ่านหน้า wall ได้
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

$menu_sub = $check_page[1]."/".$check_page[2];

$menu_sub2 = $check_page[1]."/".$check_page[2]."/".$check_page[3];

$url_image= "http://".$web_name."/";
$var_page = count($check_page)-1;

/*date_default_timezone_set('Asia/Bangkok');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}*/
?>
<header>
	<section class="container_content paragraph">
    	
        <section class="header-right">
        	<section class="blogLanguage">
            	<span>
                	Language :
                </span>
                <a class="eng" href="<?php echo $url_image;?>language.php?link=<?php echo curPageURL()."&lag=eng";?>" <?php echo ($_SESSION['sess_language']=='eng' ? "id='active'" : ""); ?>></a>
                <a class="thai" href="<?php echo $url_image;?>language.php?link=<?php echo curPageURL()."&lag=th";?>" <?php echo ($_SESSION['sess_language']=='th' || $_SESSION['sess_language']=='' ? "id='active'" : ""); ?>></a>
            </section>                        
            <section class="blog_login">
            	
                	            <?php if($_SESSION['AUTH_PERMISSION_MEMID']){?>
                                <a href="<?php echo $url_image;?>profile/"> <?php echo ($_SESSION['sess_language']=='eng' ? "Hello " : "สวัสดี คุณ"); echo $_SESSION['AUTH_PERMISSION_FNAME']."&nbsp;".$_SESSION['AUTH_PERMISSION_LNAME'];?></a>
                                <a href="<?php echo $url_image;?>logout.php"><?php echo ($_SESSION['sess_language']=='eng' ? "Logout" : "ออกจากระบบ"); ?></a>
								<?php }elseif($_SESSION['LOGIN_FB_ID'] == '' ){?>
                                <a href="<?php echo $url_image;?>register/login.php">	<?php echo ($_SESSION['sess_language']=='eng' ? "Login" : "เข้าสู่ระบบ"); ?></a>
                                <?php }?>

                	
                <?php if($_SESSION['LOGIN_FB_ID'] == '' && $_SESSION['AUTH_PERMISSION_MEMID'] == ''){?>
                <span>|</span>
                <a href="<?php echo $url_image;?>register">
                	<?php echo ($_SESSION['sess_language']=='eng' ? "Register" : "สมัครสมาชิก"); ?>
                </a>
                <?php }?>
				<?php
					 
				 if($_SESSION['AUTH_PERMISSION_MEMID'] == '' && $_SESSION['LOGIN_FB_ID'] == ''){	 
                  //echo '<a href="'.FB_LOGIN_URL.'"><img src="'.$url_image.'images/mockup-loginFacebook.jpg" /></a>';
                 } 
				 
				 if($_SESSION['LOGIN_FB_ID'] != ''){
                  echo "<a href='#'>" . ($_SESSION['sess_language']=='eng' ? "Hello " : "สวัสดี คุณ ").$_SESSION['LOGIN_FB_FULLNAME']."</a>";
                  echo "<a href='".$url_image."logout.php'>".($_SESSION['sess_language']=='eng' ? "Logout" : "ออกจากระบบ")."</a>";
                 }
				 
                 ?>              
            </section>
            <section class="inYourCart">
            <a href="<?php echo $url_image;?>shopping-bag/">
            	Now in your Cart  <span>
				<?php  
				if($_SESSION['session_SubmitGrandTotal'] != '' ){
				echo ($_SESSION['session_SubmitGrandTotal'] != '' ? number_format($_SESSION['session_SubmitGrandTotal']) : "0");
				}else{
				echo ($_SESSION['session_CostCal'] != '' ? number_format($_SESSION['session_CostCal']) : "0");
				$_SESSION['session_SubmitGrandTotal'] = "0";
				
				?>
				<meta http-equiv="refresh" content="0">
				<?
				}
				
				?>
                </span>  Bht.</a>
            </section>
        </section>
    </section>
</header>
<section class="pageMenu">
	<nav class="container_content">
    	<section class="blogLogo">
        	<a href="<?php echo $url_image;?>index.php">
        		<img alt="" title="" src="<?php echo $url_image;?>images/crosstwelfth_Logo.jpg">
            </a>
        </section>
    	<ul id="example">
        	<li>
            	<a href="<?php echo $url_image;?>index.php" <?php echo ($check_page[1] == 'index.php' || $check_page[1] == ''  ? "class= active" : "" );?>>Home</a>
            </li>
            <li>
            	<a href="#">Shop</a>
                <ul>
                	<li>
                    	<a href="<?php echo $url_image;?>allitem">
                        	All Item
                        </a>
                    </li>
                    <li>
                    	<a href="<?php echo $url_image;?>newin">
                        	New in
                        </a>
                    </li>
                    <li>
                    	<a href="<?php echo $url_image;?>bestseller">
                        	Best Seller
                        </a>
                    </li>
                    <li>
                    	<a href="<?php echo $url_image;?>special">
                        	Special Price
                        </a>
                    </li>
                    <li>
                    	<a href="<?php echo $url_image;?>instock">
                        	In Stock
                        </a>
                    </li>
                </ul>
            </li>
            <li>
            	<a href="#">Info</a>
                <ul>
                	<li>
                    	<a href="<?php echo $url_image;?>howtoorder/">
                        	How to Order
                        </a>
                    </li>
                    <li>
                    	<a href="<?php echo $url_image;?>banking/">
                        	Banking Info
                        </a>
                    </li>
                    <li>
                    	<a href="<?php echo $url_image;?>delivery/">
                        	Delivery
                        </a>
                    </li>
                </ul>
                
            </li>
            <li>
            	<a href="<?php echo $url_image;?>payment" <?php echo ($check_page[1] == 'payment' ? "class= active" : "" );?>>Payment & Delivery </a>
            </li>
            <li>
            	<a href="<?php echo $url_image;?>fashionblog" <?php echo ($check_page[1] == 'fashionblog' ? "class= active" : "" );?>>Fashion Blog</a>
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
            	<a href="<?php echo $url_image;?>category/?c=<?php echo $data_category['name']; ?>" <?php //echo ($check_page[1] == 'category' ? "class= active" : "" );?>>
                	<?php echo $data_category['name']; ?>
                </a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</section>
<form name="SearchCat" method="get" action="<?php echo $url_image;?>search/index.php" enctype="multipart/form-data">
<section class="blog-search">
	<section class="container_content">
        <ul class="acc" id="acc">
            <li style="position: static;">
                <section style="font-size:18px;"><a href="javascript:;">+ Search</a></section>
                <div style="height: 0px;" class="acc-section">
                	<div class="acc-content">
						<article class="content-blogSearch">
                        	<article class="paragraphSearch">
                                <article class="titleSearch">
                                    Category
                                </article>
                                <article class="detailSearch">
								<?php
                                $sql_category2 = "SELECT * FROM category_tb where ranking not in('0','') ORDER BY ranking";
                                $result_category2 = @mysql_query($sql_category2, $connect);
                                $num_category2 = @mysql_num_rows($result_category2);
                                
                                for($i2=1;$i2<=intval($num_category2);$i2++){
                                $data_category2 =@mysql_fetch_array($result_category2);
                                ?>
                                    <article>
                                        <input name="chkCat[<?php echo $i2;?>]" id="chkCat[<?php echo $i2;?>]" type="checkbox" value="<?php echo $data_category2['name']; ?>" />
                                        <span><?php echo $data_category2['name']; ?></span>
                                    </article>
                                <?php } ?>

                                </article>                            	
                            </article>
                            
                            <article class="paragraphSearch">
                                <article class="titleSearch">
                                    Size
                                </article>
                                <article class="detailSearch">
								<?php
                                $sql_chkSize = "SELECT * FROM size_tb where ranking not in('0','') GROUP BY name ORDER BY ranking ";
                                $result_chkSize = @mysql_query($sql_chkSize, $connect);
                                $num_chkSize = @mysql_num_rows($result_chkSize);
                                
                                for($i3=1;$i3<=intval($num_chkSize);$i3++){
                                $data_chkSize =@mysql_fetch_array($result_chkSize);
                                ?>
                                    <article>
                                        <input name="chkSize[<?php echo $i3;?>]" type="checkbox" value="<?php echo $data_chkSize['name']; ?>" />
                                        <span><?php echo $data_chkSize['name']; ?></span>
                                    </article>
                                <?php } ?>
                                </article>                            	
                            </article>
                        </article>



                            
                            <article class="paragraphSearch">
                                <article class="titleSearch">
                                    Color
                                </article>
                                <article class="detailSearch">
								<?php
                                $sql_chkColor = "SELECT * FROM color_tb where ranking not in('0','') GROUP BY name ORDER BY name ";
                                $result_chkColor = @mysql_query($sql_chkColor, $connect);
                                $num_chkColor = @mysql_num_rows($result_chkColor);
                                
                                for($i4=1;$i4<=intval($num_chkColor);$i4++){
                                $data_chkColor =@mysql_fetch_array($result_chkColor);
                                ?>
                                    <article>
                                        <input name="chkColor[<?php echo $i4;?>]" type="checkbox" value="<?php echo $data_chkColor['c_code']; ?>" />
                                        <span><?php echo $data_chkColor['name']; ?></span>
                                    </article>
                                <?php } ?>
                                </article>                            	
                            </article>
                        </article>

                            <article class="paragraphSearch">
                                <article class="titleSearch">
                                    Status
                                </article>
                                <article class="detailSearch">
                                    <article>
                                        <input name="chkStatus" type="radio" value="" checked="checked" /> ALL
                                    </article>
                                    <article>
                                        <input name="chkStatus" type="radio" value="IN" /><?php echo ($_SESSION['sess_language']=='eng' ? "IN STOCK" : "สินค้ามีสต๊อก พร้อมส่ง"); ?> 
                                    </article>

                                    <article>
                                        <input name="chkStatus" type="radio" value="PRE" /><?php echo ($_SESSION['sess_language']=='eng' ? "PRE ORDER(10-15 days)" : "PRE ORDER (งานสั่งตัด รอสินค้า 10-15 วัน) "); ?>  
                                    </article>
                                </article>                            	
                            </article>
                            
                                                        
                            <article class="paragraphSearch">
                                <article class="titleSearch">
                                    Product Code
                                </article>
                                <article class="detailSearch">
                                    <article>
                                        <input name="chkCode" type="text" value="" /> (ใส่รหัสสินค้าที่ต้องการ และกด Search เพื่อค้นหา)
                                    </article>
                                <article class="titleSearch">
                                     
                                </article>
                                    <article>
                                        <input style="display:none;" name="chkName" type="text" value="" />
                                    </article>
                                </article>                            	
                            </article>
                        </article>


                        <nav class="buttonSearch">
                        	<input name="Search" type="submit" value="Search" />
                        </nav>
                    </div>
                </div>
                
            </li>
        </ul>
        
    </section>
</section>

</form>