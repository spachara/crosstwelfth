<?php
	session_start();
	require_once '../dbconnect.inc';

	$sql_payment = "SELECT * FROM txt_tb WHERE type_name = 'Payment'";
	$result_payment =@mysql_query($sql_payment, $connect);
	$data_payment =@mysql_fetch_array($result_payment);

	//SQL Webboard
	$select_webboard = "SELECT * FROM webboard_tb WHERE webboard_ranking NOT IN ('','0') ORDER BY webboard_pin desc, webboard_ranking ";
	$result_webboard =@mysql_query($select_webboard, $connect);
	$num_webboard =@mysql_num_rows($result_webboard);
	
if ($_POST['u_register'] == "Login") {
	
	$select_user = "SELECT * FROM user_tb WHERE u_user = '".$_POST['u_user']."' AND u_pass = '".$_POST['u_pass']."' ";
	$result_user =@mysql_query($select_user);
	$num_user =@mysql_num_rows($result_user);
	
	if ($num_user == 1) {
		$data_user =@mysql_fetch_array($result_user);
		session_register("AUTH_PERMISSION_FNAME"); 
		session_register("AUTH_PERMISSION_LNAME"); 
		session_register("AUTH_PERMISSION_MEMID");
		
		$_SESSION['AUTH_PERMISSION_FNAME'] = $data_user['u_fname'];
		$_SESSION['AUTH_PERMISSION_LNAME'] = $data_user['u_lname'];
		$_SESSION['AUTH_PERMISSION_MEMID'] = $data_user['u_id'];
	}
	echo "<script>location.href='index.php'</script>";
}

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


<link rel="stylesheet" href="../css/validationEngine.jquery.css" />
<script type="text/javascript" src="../js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="../js/languages/jquery.validationEngine-en.js"></script>
<script>
	jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#formID2").validationEngine();
	});

	/**
	*
	* @param {jqObject} the field where the validation applies
	* @param {Array[String]} validation rules for this field
	* @param {int} rule index
	* @param {Map} form options
	* @return an error string if validation failed
	*/
	function checkHELLO(field, rules, i, options){
		if (field.val() != "HELLO") {
			// this allows to use i18 for the error msgs
			return options.allrules.validate2fields.alertText;
		}
	}
</script>
<link rel="stylesheet" href="../js/datepicker/css/mine-theme/jquery-ui-1.9.2.custom.css">
<script type="text/javascript" src="../js/datepicker/js/jquery-ui-1.8.22.custom.min.js"></script>
<script type="text/javascript">
			$(function(){

				
				// Datepicker
				$('#datepicker').datepicker({
					yearRange: "1950:+0",
					changeMonth: true,
					changeYear: true,
					dateFormat: 'dd/mm/yy'

				});
				
				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); },
					function() { $(this).removeClass('ui-state-hover'); }
				);

			});
</script>				
<script language="javascript">
function chk_order(){

$(document).ready(function() {
	$.ajax({type:'POST',
	url:"ajax.php",
	data: "order_number="+$("#order_number").val()+"&type=chk_order",
	success:function(data){
		var myArray = data.split('|:');
		
		$("#total_price2").val(myArray[0]);
		$("#real_price").val(myArray[0]);


		$("#uid").val(myArray[1]);
	}});
	
});

}


function chk_order2(){

$(document).ready(function() {
	$.ajax({type:'POST',
	url:"ajax2.php",
	data: "order_number="+$("#order_number").val()+"&type=chk_order",
	success:function(data){
		var myArray = data.split('|:');
		
		$("#total_price2").val(myArray[0]);
		$("#real_price").val(myArray[0]);


		$("#uid").val(myArray[1]);
	}});
	
});

}
</script>
<!--////////////////////////////////////Tool tip////////////////////////////////////-->
<link href="../css/tooltip/tooltip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/tooltip/tooltip.js"></script>
<!--////////////////////////////////////Tool tip////////////////////////////////////-->
</head>

<body>
<?php 

if($_POST['total_price'] != '' ){

if (!isset($_SESSION['AUTH_PERMISSION_MEMID'])) {
   echo "<script>location.href='../register/login.php'</script>";
}

if($_POST['order_number']){


	$paymentArr = explode(" | ",$_POST['order_number']);
	
	foreach ($paymentArr as $v) {
			    
				$exV =  explode(":",$v);
			
				$sql_update = "UPDATE order_tb SET payment_status = '1', order_status = '5' where order_number = '".$exV[0]."' and order_type = '".$exV[1]."'";
				$result_update = @mysql_query($sql_update, $connect);

	}
	

}
	if(!ereg(" | ",$_POST['order_number'])){
	$ex_order_2 = explode(":",$_POST['order_number']);
	
	if($ex_order_2[1]){
		$value_db = $ex_order_2[0]."-".$ex_order_2[1];
	}else{
		$value_db = $ex_order_2[0];
	}
	
	
	
	}else{
	$ex_order = explode(" | ",$_POST['order_number']);
	$ex_order_2 = explode(":",$ex_order[0]);
	$ex_order_3 = explode(":",$ex_order[1]);
	
	$value_db = $ex_order_2[0]."-"."IN"." | ".$ex_order_3[0]."-"."PRE";
	}
	
	$sql = "INSERT INTO payment_tb (id, u_id, order_number, total_price, real_price, order_name, tel";
	$sql .= ", payment_date, payment_time, bank_tranfer, more_bank, date_in)";
	$sql .= " VALUES ('','".$_POST['uid']."', '".$value_db."', '".$_POST['total_price']."', '".$_POST['real_price']."'";
	$sql .= ", '".$_POST['order_name']."', '".$_POST['tel']."', '".$_POST['payment_date']."'";
	$sql .= ", '".$_POST['payment_time']."', '".$_POST['bank_tranfer']."', '".$_POST['more_bank']."', NOW())";	
	$result = @mysql_query($sql, $connect);
	
	//echo $sql;
	
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			$.fancybox({
					'href' : 'popup.php',
					'width'				: 400,
					'height'			: 200,
					'autoScale'			: false,
					'transitionIn'		: 'none',
					'transitionOut'		: 'none',
					'transitionIn'	: 'fade',
					'transitionOut'	: 'fade',				
					'type'				: 'iframe',
					'onClosed': function() {   
					 parent.location.href='index.php';
					}
				});
			});
	</script>
	<?php

}

 include('../include/header.php') ?>
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph overflowNone">
            <hgroup class="titleModule">
                <h2>Payment & Delivery</h2>
            </hgroup>        
            <section class="paragraph03">
				<?php 
                echo ($_SESSION['sess_language'] == 'eng' ? $data_payment['txt_detail_eng'] : $data_payment['txt_detail_th']);
                ?>
            </section>
            <div class="clear"></div>
        </section>
        <?php if( $_SESSION['AUTH_PERMISSION_MEMID'] == ''){?>
        <form method="post" id="formID2" enctype="multipart/form-data">
            <section class="paragraph03">
				<section class="blogRegister">
                	<header>
                    	แจ้งชำระเงิน กรุณา Login
                    </header>
                    <fieldset>
                    	<ul>
                        	<li>
                            	<label>Username (ชื่อล๊อกอิน)*</label>
                                <input name="u_user" type="text" id="u_user" class="validate[required,minSize[4],maxSize[10]]" value="<?php echo $data_user['u_user']!='' ? $data_user['u_user'] : $_SESSION['r_user'] ;?>"/>
                            	<div class="clear"></div>
                            </li>
                            <li>
                            	<label>Password (รหัสผ่าน)*</label>
                                <input name="u_pass" type="password" id="u_pass" class="validate[required,minSize[4],maxSize[10]]" value="<?php echo $data_user['u_pass'];?>"/>
                            	<div class="clear"></div>
                            </li>
                        </ul>
                    </fieldset>
                </section> 
                
              <nav class="buttonRegister">
                    <input name="u_register" type="submit" value="Login"/>
                </nav>                                  	
            </section>    
         </form>   
                
        <?php }else{ ?>
        
        <form method="post" id="formID2" enctype="multipart/form-data">
        <input type="hidden" name="uid" id="uid" value="<?php echo $_SESSION['AUTH_PERMISSION_MEMID'];?>" />
		<section class="paragraph03 overflowNone">
        
      
            <section class="blogRegister">
            
<style type="text/css">
.blogRegister fieldset ul li label {
	display:block; width:150px; float:left; margin-right:10px; font-weight:bold;
}
</style>            
            
            <fieldset>
            	<ul>                    
					<li>
						<label>ใบสั่งซื้อ*</label>
						<section>
							<?php
							if($_SESSION['AUTH_PERMISSION_MEMID']){                        
								$sql_insert_order3 = "select * from order_tb where order_status = '1' and u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' GROUP BY order_number order by date_in desc";
								$result_insert_order3 = @mysql_query($sql_insert_order3, $connect);
								$num_order3 = @mysql_num_rows($result_insert_order3);
							?>
							<h4>
								<select name="order_number" id="order_number" class="validate[required]" onchange="chk_order()" style="width:300px;">
								<option></option>
                                                
							   <?php
                               for($p3=1;$p3<=intval($num_order3);$p3++){
                               $data_order3= @mysql_fetch_array($result_insert_order3);


                                    $sql_insert_order2 = "select * from order_tb where order_number = '".$data_order3['order_number']."' ";
                                    $result_insert_order2 = @mysql_query($sql_insert_order2, $connect);
                                    $num_order2 = @mysql_num_rows($result_insert_order2);
                                    $data_order2= @mysql_fetch_array($result_insert_order2);
                                    
                                    if($num_order2 == 2){ 
                                        
                                        $val_order = $data_order2['order_number']."-IN | ".$data_order2['order_number']."-PRE";
                                        $value_order = $data_order2['order_number'].":IN | ".$data_order2['order_number'].":PRE";
                                    }else{
                                        $val_order = $data_order2['order_number']."-".$data_order2['order_type'];
                                        $value_order = $data_order2['order_number'].":".$data_order2['order_type'];
                                    }
                            ?>
                                    <option value="<?php echo $value_order;?>"><?php echo $val_order;?></option>
                                    <?php  }?>
                                </select>
                                
                            <?php }else{ ?>
                             <input name="order_number" id="order_number" type="text" value="" onblur="chk_order2()" class="validate[required]"/>
                            <?php } ?>
                              </h4>
                              </section>
<!--                              <div class="clear"></div>  
                              <article><p>ตัวอย่าง (xxxxxxxx-xxxxxx-IN) or (xxxxxxxx-xxxxxx-PRE)<p></article>
                              <div class="clear"></div>  
                              <article><p>เพื่อความสะดวก กรุณา Login</p></article> 
-->                              <div class="clear"></div>                               
                      </li>
                     <li>
                          <label>ยอดเงินที่ต้องจ่าย</label>
                          <input name="total_price2" id="total_price2" type="text" value="" disabled="disabled"/>
                          <input name="real_price" id="real_price" type="hidden" value="" />
                          &nbsp;&nbsp;บาท
                          <div class="clear"></div>
                      </li>
                     <li>
                          <label>ยอดเงินที่โอน*</label>
                          <input name="total_price" id="total_price" type="text" class="validate[required]" value=""/>
                          &nbsp;&nbsp;บาท
                          <div class="clear"></div>
                      </li>
                      <li>
                          <label>ชื่อ*</label>
                          <input name="order_name" type="text" class="validate[required]" value="<?php echo ( $_SESSION['AUTH_PERMISSION_FNAME'] != '' ? $_SESSION['AUTH_PERMISSION_FNAME']." ".$_SESSION['AUTH_PERMISSION_LNAME'] : "" );?>" />
                          <div class="clear"></div>
                      </li>
                      <?php
                      $select_user = "SELECT * FROM user_tb WHERE u_id = '".$_SESSION['AUTH_PERMISSION_MEMID']."' ";
                      $result_user =@mysql_query($select_user, $connect);
                      $data_user =@mysql_fetch_array($result_user);
                      ?>
                      <li>
                          <label>เบอร์โทร*</label>
                          <input name="tel" type="text" class="validate[required]" value="<?php echo $data_user['u_mobi'];?>"/>
                          <div class="clear"></div>
                      </li>
                      <li>
                          <label>วันที่โอน*</label>
                          <input name="payment_date" type="text" id="datepicker" class="validate[required]"/>
                          <div class="clear"></div>
                      </li>
                      <li>
                          <label>เวลา*</label>
                          <input name="payment_time" type="text" class="validate[required]"/>
                          <div class="clear"></div>
                      </li>
                      <li>
                          <label>ธนาคาร*</label>
                          <section>
                            <h4>
                                  <select name="bank_tranfer" class="validate[required]">
                                            <option value=""></option>
											<?php
                                             
                                            $sql_bank2 = "SELECT * FROM bank_tb where ranking not in ('','0') ORDER BY ranking";
                                            $result_bank2 =@mysql_query($sql_bank2, $connect);
                                            $num_bank2 =@mysql_num_rows($result_bank2);
                                                                
                                            for($bk2=1;$bk2<=intval($num_bank2);$bk2++){
                                            $data_bank2 =@mysql_fetch_array($result_bank2);
                                            ?>
                                              <option value="<?php echo $data_bank2['name'];?>"><?php echo $data_bank2['name'];?></option>
                                          	<?php } ?>    
                                </select>
                              </h4>   
                              </section>   
                              <div class="clear"></div>                          
                      </li>
                  </ul>
                  <article class="paragraph02" style="text-align:center;">
                      กรณีโอนมากกว่า 1 ธนาคาร กรุณากรอกข้อมูลด้านล่าง
                  </article>
                  <textarea name="more_bank" cols="" rows="" class="textArea-new"></textarea>
              </fieldset>                
          </section>                                                                      
      <nav class="buttonRegister">
          <input name="submit" type="submit" value="แจ้งชำระเงิน" />
      </nav> 
      <div class="clear"></div>                                 	
  </section>  
         </form>  
         
         <?php } ?>
 <section class="paragraph02">
     <section class="boxwebbord">
        <ul class="title">
            <li>
                <div class="size-l">หัวข้อกระทู้</div>
                <div class="size-s">ผู้เข้าชม</div>
                <!--<div class="size-s">ผู้ตอบกลับ</div>-->
            </li>
        </ul>
        <ul>
			<?php 
			for($b=1;$b<=intval($num_webboard);$b++){
				
				$data_webboard =@mysql_fetch_array($result_webboard);
				
				$select_comment = "SELECT * FROM answer_tb WHERE webboard_id = '".$data_webboard['webboard_id']."' ";
				$result_comment =@mysql_query($select_comment, $connect);
				$num_comment =@mysql_num_rows($result_comment);
				
				$day = date('d',strtotime($data_webboard['date_in']));
				$month = date('m',strtotime($data_webboard['date_in']));
				$year = date('Y',strtotime($data_webboard['date_in']));
				
            ?>	
            <li>
            	<a href="detail/index.php?webboard_id=<?php echo $data_webboard['webboard_id'];?>">
                    <div class="size-l">
                        <section>
							<?php echo $data_webboard['webboard_pin']=='1' ? "<img title=\"webboard_pin\" src=\"images/pin.png\" width=\"18\">" : "<img title=\"webboard_nomal\" src=\"images/postit.png\">";?>
                            <div><?php echo $data_webboard['webboard_head'];?></div>
                        </section>
                        <article>
                            <?php echo $data_webboard['webboard_title'];?>
                        </article>
                        <p>
                        	<img alt="" title="" src="images/calenda.png" />
                            <time datetime="2014-08-19"><?php echo $day.".".$month.".".$year;?></time>
                        </p>
                    </div>
                    <div class="size-s"><?php echo $data_webboard['webboard_couter'];?></div>
                    <!--<div class="size-s"><?php echo $num_comment;?></div>-->
                </a>
            </li>
            <?php } ?>
            
            
        </ul>
     </section> 
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
