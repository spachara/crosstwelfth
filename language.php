<?php
session_start();

if ($_SESSION['sess_language'] == '' ||  $_GET['lag'] == ''  ) {
	session_register("sess_language");
	$_SESSION['sess_language']='th';
}

if ($_GET['lag'] == 'eng') {
	session_unregister("sess_language");
	session_register("sess_language");
	$_SESSION['sess_language']='eng';
	
} else {
	session_unregister("sess_language");
	session_register("sess_language");
	$_SESSION['sess_language']='th';
	
}

if ($_GET['sid'] != "" || $_GET['pid'] != "") {
	
	if ($_GET['sid'] != "" && $_GET['pid'] == ""){
	$link = $_GET['link']."&sid=".$_GET['sid'];
	}elseif ($_GET['pid'] != ""){
	$link = $_GET['link']."&sid=".$_GET['sid']."&pid=".$_GET['pid'];
	}
	
} else {
	$link = $_GET['link'];	
}
?>
<script>
location.href='<?php echo $link;?>';
</script>
