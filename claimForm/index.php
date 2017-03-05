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

 <?php include('../include/header.php') ?>
<section class="container">
	<section class="container_content">
    	<?php include('../include/blogMember.php') ?>
    	<section class="paragraph overflowNone"  style="margin-bottom:20px;">
            <hgroup class="titleModule">
                <h2>Claim  Form</h2>
            </hgroup>        
<section class="paragraph03">
	<article>
    	<strong>การเคลมสินค้า</strong><br />
    	<p>
        	ทางร้านยินดีรับผิดชอบ   ในการซ่อม/แก้ไข และเปลี่ยนสินค้า    หากลูกค้าพบว่าสินค้ามีปัญหา   โดยสามารถกรอกรายละเอียดปัญหาของสินค้าในแบบฟอร์มด้านล่างนี้  และทีมงานจะติดต่อท่านกลับไป  ภายใน 2 วันทำการนะคะ
        </p><br />
        <p>
        	หลังจากทางร้านได้รับข้อมูลเป็นที่เรียบร้อยแล้ว ทางร้านจะดำเนินการตรวจเช็คเบื้องต้น และจะดำเนินการตอบกลับพร้อมแจ้งขั้นตอนถัดไปอีกครั้ง    (กรุณา รอการตอบกลับจากทางร้าน ก่อนส่งสินค้ากลับมานะคะ  เพื่อพัสดุที่ส่งกลับมาจะส่งไปยังพนักงานที่เกี่ยวข้อง และง่ายต่อการแก้ไขงาน และส่งคืนลูกค้าคะ)
        </p>
    </article>
</section> 
<section class="paragraph"> 
    <section class="boxTitlePage">
        ฟอร์มการเคลมสินค้า
    </section>
    <section class="formCliam">
    	<ul>
        	<li>
            	<label>
                	ชื่อลูกค้า <span>*</span>
                </label>
                <div class="formright">
                	<div class="textField">
                    	<input type="text" />
                    </div>
                </div>
                <div class="clear"></div>
            </li>
            <li>
            	<label>
                	อีเมล์ <span>*</span>
                </label>
                <div class="formright">
                	<div class="textField">
                    	<input type="text" />
                    </div>
                </div>
                <div class="clear"></div>
            </li>
            <li>
            	<label>
                	โทร <span>*</span>
                </label>
                <div class="formright">
                	<div class="textField">
                    	<input type="text" />
                    </div>
                </div>
                <div class="clear"></div>
            </li>
            <li>
            	<label>
                	โทร <span>*</span>
                </label>
                <div class="formright">
                	<div class="textField">
                    	<input type="text" />
                    </div>
                </div>
                <div class="clear"></div>
            </li>
            <li>
            	<label>
                	Line Name
                </label>
                <div class="formright">
                	<div class="textField">
                    	<input type="text" />
                    </div>
                </div>
                <div class="clear"></div>
                <p>
                    *หากสั่งซื้อสินค้าทาง  Line
                </p>                
            </li>
            <li>
            	<label>
                	Facebook Name 
                </label>
                <div class="formright">
                	<div class="textField">
                    	<input type="text" />
                    </div>
                </div>
                <div class="clear"></div>
                <p>
                    *หากสั่งซื้อสินค้าทาง Facebook
                </p>                
            </li>
            <li>
            	<label>
                	เลขที่ใบสั่งซื้อ <span>*</span>
                </label>
                <div class="formright">
                	<div class="selectBox">
                    	<select name="">
                        	<option>
                            	--Select Choice--
                            </option>
                        </select>
                    </div>
                </div>
                <div class="clear"></div>            
            </li>
            <li>
            	<label>
                	ชื่อสินค้าที่ต้องการเปลี่ยนหรือคืน <span>*</span>
                </label>
                <div class="formright">
                	<div class="textArea">
                    	<textarea name="" cols="" rows=""></textarea>
                    </div>
                </div>
                <div class="clear"></div>
                <p>
                    **สินค้าลดราคา ไม่สามารถเปลี่ยน หรือ คืน ได้นะคะ**
                </p>                
            </li>
            <li>
            	<label>
                	Reauirement <span>*</span>
                </label>
                <div class="formright">
                	<div class="selectBox">
                    	<select name="">
                        	<option>
                            	--Select Choice--
                            </option>
                            <option>
                            	สินค้ามีตำหนิ  งานเย็บไม่เรียบร้อย
                            </option>
                            <option>
                            	สินค้ามีตำหนิ  ลายผ้าเลอะเทอะ  หรือ มีรอยฉีกขาด
                            </option>
                            <option>
                            	ขนาด และไซส์ไม่ตรงตามสเปค ที่แจ้งในเวบไซต์ 
                            </option>
                            <option>
                            	ได้รับสินค้าผิดรายการ  ไม่ตรงตามที่สั่งซื้อ
                            </option>
                            <option>
                            	อื่นๆ
                            </option>
                        </select>
                    </div>
                </div>
                <div class="clear"></div>               
            </li>
            <li>
            	<label style="width:100%; float:none; margin-bottom:10px; display:block;">
                	กรุณาระบุตำหนิ และรายละเอียดเพิ่มเติม  เพื่อทางร้านจะแก้ไข และส่งกลับได้รวดเร็วขึ้นคะ  
                </label>
                <div class="formright" style="width:100%; float:none;">
                	<div class="textArea">
                    	<textarea name="" cols="" rows=""></textarea>
                    </div>
                </div>
                <div class="clear"></div>            
            </li>
        </ul>
    </section>
</section>
<section class="paragraph03">
    <section class="blogRegister">
        <header>
            เงื่อนไขการเปลี่ยน / คืน สินค้า
        </header> 
        <article>
- ทางร้านจะรับเปลี่ยนสินค้าภายใน 7 วัน  (นับจากวันที่ลูกค้าได้รับสินค้า)<br /><br />
-การเปลี่ยนสินค้า สินค้าที่จัดส่งมานั้นจะต้องไม่ผ่านกระบวนการซัก, การใช้งาน และคงอยู่ในสภาพสมบูรณ์ หากทางร้านตรวจพบการใช้งานของสินค้าเกิดขึ้น ทางร้านขอสงวนสิทธิ์ในการเปลี่ยนสินค้า<br /><br />
-ทางร้านยินดีรับผิดชอบค่าส่งกลับของลูกค้า    โดยคิดค่าจัดส่งขั้นต่ำ 30 บาท  (ส่งแบบลงทะเบียน)  หรือ คำนวณจากจำนวนสินค้า ตามราคามาตรฐานการจัดส่งของทางร้านนะคะ      โดยจะโอนคืนค่าจัดส่งให้ลูกค้า  หรือแนบเงินคืนค่าจัดส่งพร้อมกับสินค้าชิ้นใหม่  (โดยลูกค้าอาจแจ้งวิธีที่สะดวกให้ทีมงานรับทราบ ได้เลยคะ)        
        </article>   
    </section>
</section>   
              <nav class="buttonRegister">
                    <input name="" type="submit" value="Cancel"/>
                    <input name="" type="submit" value="Send"/>
                </nav>     
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
