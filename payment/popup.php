<!DOCTYPE html>
<html>
<style type="text/css">
body {
	font-family:arial;
}
.page_form {
	padding-top:10px;margin:auto; width:310px;
}
	.page_form div {
		text-align:center;font-size:12px; color:#666; 
	}
	.page_form ul {
		margin-left:10px;
	}
	.page_form ul li {
		overflow:hidden;
		margin-bottom:10px;
		list-style:none; 
	}
		.page_form-l {
			width:40px; float:left; color:#999; font-size:12px; text-align:right;
		}
		.page_form-r {
			width:150px; float:left; margin-left:10px; overflow:hidden;
		}
		
			.page_form-r a {
				font-size:12px; text-decoration:underline; color:#666; font-weight:bold;
			}
			.page_form-r a:hover {
				color:#CCC;
			}
		
			.textFilde-style {
				width:135px;
				height:20px;
				background:url(images/popup_login/bg_form.png) no-repeat; float:left;
			}
				.textFilde-style input {
					background:transparent; -webkit-appearance: none; border:none; width:120px; height:16px; padding:2px 5px; color:#fff;
				}
			.textarea-style {
				width:130px;
				min-height:50px;
				float:left;
			}
				.textarea-style textarea {
					background:url(images/confirm_payment/bg_form.png); border:none; min-width:120px;max-width:160px; min-height:46px; padding:2px 5px; color:#fff;
				}				
			.textSelect-style {
				width:130px;
				height:20px;
				background:url(images/confirm_payment/bg_form02.png); overflow:hidden;
			}
				.textSelect-style select {
					background:transparent; -webkit-appearance: none; border:none; width:160px; height:20px; padding:2px 5px; color:#fff;
				}	
			.page_form-r span {
				float:left; margin-left:10px;
			}
.submit-bt {
	float:left; margin-right:10px; margin-bottom:5px;
}
.submit-bt input {
	color:#fff;
	height:21px;
	padding:1px 5px;
	background:#0eb5bf; border-radius:3px; border:#0d9aa2 1px solid;
}
.submit-bt input:hover {
	color:#fff;
	background:#049aa3; border-radius:3px; border:#03878f 1px solid;
}
.submit-bt input:active {
	color:#b5eff2;
	background:#049aa3; border-radius:3px; border:#fff 1px solid;
}

</style>
<head>
	<title>แจ้งชำระเงิน</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="js/popup_div/jquery-1.8.2.min.js"></script>
    <!--End Header-->
    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
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
</head>
<body>
	<center>
    	<img alt="" src="../images/cross_twelfth-logo.png" title=""/>
    </center>
                 <div class="page_form">
                    <div>
                    	แจ้งชำระเงินเรียบร้อย ขอบคุณค่ะ
                    
                    </div>
                </div> 
</body>
</html>