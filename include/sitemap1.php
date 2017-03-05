<?php
$check_page = explode('/',$_SERVER['REQUEST_URI']);


$web_name = $_SERVER['SERVER_NAME'];

$menu_sub = $check_page[2]."/".$check_page[3];

$menu_sub2 = $check_page[2]."/".$check_page[3]."/".$check_page[4];

$url_image= "http://".$web_name."/";
$var_page = count($check_page)-1;

?>


<section class="blog_Sitemap">
	
	<section class="content_blog_contact_us">
        <div class="line_right"></div>
    	<div class="sitemap_head">
        	<span style="font-weight:700">Contact Us</span>
        </div>
    	<div class="sitemap_head">
        	<img src="<?php echo $url_image;?>images/iconMessage.png">
            <span style="margin-left:10px;">Cross12th@hotmail.com</span>
        </div>
    	<div class="sitemap_head">
        	<img src="<?php echo $url_image;?>images/tel.png">
            <span style="margin-left:10px;">02-405-6562</span>
        </div>
    	<div class="sitemap_head">
        	<img src="<?php echo $url_image;?>images/iconmobile.png">
            <span style="margin-left:10px;">081-308-2212</span>
        </div>
    	<div class="sitemap_head">
        	<img src="<?php echo $url_image;?>images/marker_-16.png">
            <span style="margin-left:10px;">Monday - Saturday</span>
        </div>
    	<div class="sitemap_head">
        	<img src="<?php echo $url_image;?>images/clock.png">
            <span style="margin-left:10px;">10.00 AM - 20.00 PM</span>
        </div>
        
        
    </section>
    
    
    <section class="content_support">
    	<div class="content_left_support">
    	<div class="sitemap_head_Q_A">
        	<span style="font-weight:700">Support</span>
        </div>
        <div class="content_Q_A">
        	<ul>
                <li>
                	<a href="#">
                        <nav class="Q_head">
							Q & A	                            
                        </nav>
                        <nav class="Q_title">
                        	คำถามที่พบบ่อย
                        </nav>
                    </a>
                </li>
                <li>
                	<a href="#">
                        <nav class="Q_head">
							Event & Activity	                            
                        </nav>
                        <nav class="Q_title">
                        	กิจกรรมส่วนลด สมาชิก
                        </nav>
                    </a>
                </li>
                <li>
                	<a href="#">
                        <nav class="Q_head">
							Press & More	                            
                        </nav>
                        <nav class="Q_title">
                        	สื่อประชาสัมพันธ์
                        </nav>
                    </a>
                </li>
            </ul>
        </div>
        
        </div>
    	<div class="content_right_support">
            <div class="sitemap_head_Q_A">
                <span style="font-weight:700">Information</span>
            </div>
        	<ul>
                <li>
                	<a href="#">
                        <nav class="Q_head">
							Terms &  Condition                           
                        </nav>
                        <nav class="Q_title">
                        	เงื่อนไงและข้อตกลง
                        </nav>
                    </a>
                </li>
                <li>
                	<a href="#">
                        <nav class="Q_head">
							Shout & Share                           
                        </nav>
                        <nav class="Q_title">
                        	ห้องส่งต่อสินค้า
                        </nav>
                    </a>
                </li>
                <li>
                	<a href="#">
                        <nav class="Q_head">
							Careers                           
                        </nav>
                        <nav class="Q_title">
                        	ร่วมงานกับเรา
                        </nav>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section class="content_social">
    	<div class="sitemap_head_Q_A">
        	<span style="font-weight:700">Connect With Us</span>
        </div>
        <div class="content_social_facebook">
        	<div class="content_picturefacebook">
            	
                	<img src="<?php echo $url_image;?>images/603144_905052659520316_7475160454869714369_n.jpg">
                    <div class="content_face_text_all">
                        <a href="#">
                            <div class="text_facebook">
                                crosstwelfth
                            </div>
                            <div class="text_facebook2">
                                <img src="<?php echo $url_image;?>images/bottom_like.png">
                            </div>
                       </a>     
                    </div>
                
            </div>
        </div>
        <div class="content_social_facebook">
        	<div class="content_instargram">
            	<img src="<?php echo $url_image;?>images/38-instagram-64.png">
                <div class="instar_text">
                    IG : crosstwelfth
                </div>
            </div>
        	<div class="content_instargram">
            	<img src="<?php echo $url_image;?>images/38-line.png">
                <div class="instar_text">
                    Line : crosstwelfth
                </div>
            </div>
        </div>
        
    </section>
    
</section>









