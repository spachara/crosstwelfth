<?php if($_SESSION['AUTH_PERMISSION_MEMID']){?>
<section class="blogMember">
    <section class="blogMember-l">
        <section class="paragraph05">
            <section class="contentProfile-l">
                <section><?php echo $_SESSION['AUTH_PERMISSION_FNAME']."&nbsp;".$_SESSION['AUTH_PERMISSION_LNAME'];?></section>
                <article><?php echo ($_SESSION['sess_language']=='eng' ? "You pending order (" : "คุณมียอดค้างชำระเงิน ("); ?><span>
				<?php 
				$sql_check_pay = "select * from order_tb where u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' AND order_status = 1 GROUP BY order_number";
				$result_check_pay = @mysql_query($sql_check_pay, $connect);
				$num_check_pay = @mysql_num_rows($result_check_pay);
				echo $num_check_pay;
				?>
                
                </span><?php echo ($_SESSION['sess_language']=='eng' ? ")" : ") รายการ"); ?></article>
            </section>
            <section class="contentProfile-r">
                <div>
                    &hearts;&nbsp;Crosstwelfth Rewards
                </div>
                <section>
                <?php
                            $select_point = "SELECT sum(ppoint) as total_have FROM point_tb WHERE m_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
                            $result_point =@mysql_query($select_point, $connect);
                            $data_point =@mysql_fetch_array($result_point);


                            $select_use_point = "SELECT sum(order_point) as total_used FROM order_tb WHERE u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' and order_status <> 0 ";
                            $result_use_point =@mysql_query($select_use_point, $connect);
                            $data_use_point =@mysql_fetch_array($result_use_point);
							
							$grand_point  =  $data_point['total_have'] - $data_use_point['total_used'];
				echo $grand_point;
				?>
                
                 Points
                </section>
            </section>
        </section>
        <section class="paragraph menuMember">
            <ul>
            	<li>
                    <a href="<?php echo $url_image;?>shopping-bag" <?php echo ($check_page[2] == 'shopping-bag' ? "class= active" : "" );?>>
                        <section>
                            <div>
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconShoping.png" class="nomal" />
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconShoping-hover.png" class="hover" />
                            </div>
                            <span>
                                My Shopping Bag
                            </span>
                        </section>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $url_image;?>inbox">
                        <section>
                            <div>
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconMessage.png" class="nomal" />
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconMessage-hover.png" class="hover" />
                            </div>
                            <span>
							<?php echo ($_SESSION['sess_language']=='eng' ? "Contact Staff" : "พูดคุยกับทีมงาน"); ?>
                            <?php 
							$select_webboard_check = "SELECT webboard_title FROM inbox_tb WHERE webboard_pin = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
							$result_webboard_check =@mysql_query($select_webboard_check, $connect);
							$data_webboard_check =@mysql_fetch_array($result_webboard_check);
							echo ($data_webboard_check['webboard_title'] == '0' ? "" : "<img src='".$url_image."images/message.gif'>");?>
                            </span>
                        </section>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $url_image;?>order" <?php echo ($check_page[2] == 'order' ? "class= active" : "" );?>>
                        <section>
                            <div>
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconOrder.png" class="nomal" />
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconOrder-hover.png" class="hover" />
                            </div>
                            <span>
                                <?php echo ($_SESSION['sess_language']=='eng' ? "Order History/Tracking No." : "ประวัติการสั่งซื้อ/เลขพัสดุ"); ?>
                            </span>
                        </section>                                                        	
                    </a>
                </li>
                <li>
                    <a href="<?php echo $url_image;?>inferorder" <?php echo ($check_page[2] == 'inferorder' ? "class= active" : "" );?>>
                        <section>
                            <div>
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconLabel.png" class="nomal" />
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconLabel-hover.png" class="hover" />
                            </div>
                            <span>
                                <?php echo ($_SESSION['sess_language']=='eng' ? "Notify Payment" : "แจ้งชำระเงิน"); ?>
                            </span>
                        </section>                                                         	
                    </a>
                </li>                
                <li>
                    <a href="<?php echo $url_image;?>waitlist" <?php echo ($check_page[2] == 'waitlist' ? "class= active" : "" );?>>
                        <section>
                            <div>
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconFalse.png" class="nomal" />
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconFalse-hover.png" class="hover" />
                            </div>
                            <span>
                                Waitlist
                            </span>
                        </section>
                    </a>
                </li>
                <!--<li>
                    <a href="#">
                        <section>
                            <div>
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconPoint.png" class="nomal" />
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconPoint-hover.png" class="hover" />
                            </div>
                            <span>
                                แต้ม/คะแนนสะสม
                            </span>
                        </section>                                                        	
                    </a>
                </li>-->
                <li>
                    <a href="<?php echo $url_image;?>profile" <?php echo ($check_page[2] == 'profile' ? "class= active" : "" );?>>
                        <section>
                            <div>
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconProfile.png" class="nomal" />
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconProfile-hover.png" class="hover" />
                            </div>
                            <span>
                               <?php echo ($_SESSION['sess_language']=='eng' ? "My Account" : "ข้อมูลส่วนตัว"); ?>
                            </span>
                        </section>                                                         	
                    </a>
                </li>
                <li>
                    <a href="<?php echo $url_image;?>wishlist" <?php echo ($check_page[2] == 'wishlist' ? "class= active" : "" );?>>
                        <section>
                            <div>
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconWaitlist.png" class="nomal" />
                                <img alt="" title="" src="<?php echo $url_image;?>images/iconWaitlist-hover.png" class="hover" />
                            </div>
                            <span>
                                Wish List
                            </span>
                        </section>                                                         	
                    </a>
                </li>
            </ul>
        </section>
    </section>            
    
</section>
<?php } ?>