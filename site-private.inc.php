<?php
/*--------- DATABASE CONNECTION INFO---------*/ 
$hostname="localhost"; 
$mysql_login="root"; 
$mysql_password=""; 
$database="crosstwe_db";
$_WEB_NAME="Crosstwelfth";

// connect to the database server 

if (!($connect = mysql_pconnect($hostname, $mysql_login , $mysql_password))){ 
  die("Can't connect to database server.");     
}else{ 
  // select a database 
    if (!(mysql_select_db("$database",$connect))){ 
      die("Can't connect to database."); 
    } 
} 
//mysql_db_query($database,"SET NAMES latin1"); 
mysql_db_query($database,"SET NAMES utf8");
?>