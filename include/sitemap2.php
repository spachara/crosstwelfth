<?php
$check_page = explode('/',$_SERVER['REQUEST_URI']);


$web_name = $_SERVER['SERVER_NAME'];

$menu_sub = $check_page[2]."/".$check_page[3];

$menu_sub2 = $check_page[2]."/".$check_page[3]."/".$check_page[4];

$url_image= "http://".$web_name."/";
$var_page = count($check_page)-1;

?>
<section class="paragraph blogSiteMap">
<section class="blogLink-menu">
    <ul>
        <li>
            <div>
                <a href="#">
                    <strong>Q & A</strong>
                    <span>คำถามที่พบบ่อย</span>
                </a>
            </div>            
        </li>
        <li>
            <div>
                <a href="#">
                    <strong>Terms & Condition</strong>
                    <span>เงื่อนไข และข้อตกลง</span>
                </a>
            </div>            
        </li>
        <li>
            <div>
                <a href="#">
                    <strong>Press & More</strong>
                    <span>สื่อประชาสัมพันธ์</span>
                </a>
            </div>            
        </li>
        <li>
            <div>
                <a href="#">
                    <strong>Shout & Share</strong>
                    <span>ห้องส่งต่อสินค้า </span>
                </a>
            </div>            
        </li>
        <li>
            <div>
                <a href="#">
                    <strong>Events & Activities</strong>
                    <span>กิจกรรม/ส่วนลด สมาชิก</span>
                </a>
            </div>            
        </li>
        <li>
            <div>
                <a href="#">
                    <strong>Careers</strong>
                    <span>ร่วมงานกับเรา</span>
                </a>
            </div>            
        </li>
    </ul>
</section> 
<div class="split-l"></div>
<section class="blogSiteMap-c">
    <article class="blogSiteMap-c_content">
        <strong>Email  : </strong>
        <br />
        <span>cross12th@hotmail.com</span>
        <br />
        <strong>Tel  : </strong>
        <br />
        <span>02 405 6562</span>
        <br />
        <strong>Mobile Phone : </strong>
        <br />
        <span>081 380 2212</span>
        <br />
        <strong>Monday - Saturday</strong>
        <br />
        <span>10.00am - 20.00pm</span>
    </article>
    <section class="blogSiteMap-c_blogQR">
        <header>
            <img alt="" title="" src="<?php echo $url_image;?>images/iconLine.png" />
            <section>
                <strong>Line ID :</strong><br />
                <span>crosstwelfth</span>
            </section>
        </header>
        <div>
            <img alt="" title="" src="<?php echo $url_image;?>images/cross_twelfth-qrCode.jpg" />
        </div>
    </section>
</section>
<div class="split-r"></div>
<section class="blogSiteMap-r">
    <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fcrosstwelfth%3Ffref%3Dts&amp;width=200&amp;height=210&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:210px; width:200px;" allowTransparency="true"></iframe>
</section>
</section>
