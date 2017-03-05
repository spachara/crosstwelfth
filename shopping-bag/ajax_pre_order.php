<?php
include "dbconnect.inc";
if ($_POST['function'] == "1") {
	$select_user = "SELECT * FROM user_tb WHERE u_user = '".$_POST['user_name']."' ";
	$result_user =@mysql_query($select_user, $connect);
	$num_user =@mysql_num_rows($result_user);
	echo $num_user;
} else if ($_POST['function'] == "2") {
	$select_user = "SELECT * FROM user_tb WHERE u_user = '".$_POST['user_name']."' AND u_pass = '".$_POST['password_name']."' ";
	$result_user =@mysql_query($select_user, $connect);
	$num_user =@mysql_num_rows($result_user);
	echo $num_user;
} else if ($_POST['function'] == "3") {
	$select_user = "SELECT * FROM user_tb WHERE u_mail = '".$_POST['mail']."' ";
	$result_user =@mysql_query($select_user, $connect);
	$num_user =@mysql_num_rows($result_user);
	echo $num_user;
}
?>