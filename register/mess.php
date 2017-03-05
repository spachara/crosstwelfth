<?php


$message = "Company Name : ".$_POST['company_name']."<br><br>";


$message .= "Contact Name : ".$_POST['contact_name']."<br><br>";


$message .= "E-mail : ".$_POST['contact_email']."<br><br>";



$message .= "Questionnaire"."<br><br>";
$message .= "Question for NPM :"."<br><br>";
$message .= "How are you Currently monitoring your network infrastructure?";
$message .= "<br>".$_POST['text1']."<br><br>";

$message .= "•  Do you get alert when problems arise or hardware failure?"."&nbsp;&nbsp;&nbsp;<b>".$_POST['r1']."</b><br><br>";

$message .= "•  Do you want one interface for all end to end monitoring?"."&nbsp;&nbsp;&nbsp;<b>".$_POST['r2']."</b><br><br>";

$message .= "Question for NPM : <br><br>";
$message .= "•  Do you need to monitor you bandwidth?"."&nbsp;&nbsp;&nbsp;<b>".$_POST['r3']."</b><br><br>";

$message .= "•  Do you need to see who is using your bandwidth?"."&nbsp;&nbsp;&nbsp;<b>".$_POST['r4']."</b><br><br>";

$message .= "•  Do you need to know all of the traffic that is using a specific application port,server,group of servers?"."&nbsp;&nbsp;&nbsp;<b>".$_POST['r5']."</b><br><br>";

$message .= "Question for NPM : <br><br>";
$message .= "•  Are you responsible for managing the configuration of your network devices?"."&nbsp;&nbsp;&nbsp;<b>".$_POST['r6']."</b><br><br>";

$message .= "•  If so, how are you currently doing this? Do you have to do it manually?"."&nbsp;&nbsp;&nbsp;<b>".$_POST['r7']."</b><br><br>";

$message .= "•  Do you know who making changes to your network devices?"."&nbsp;&nbsp;&nbsp;<b>".$_POST['r8']."</b><br><br>";

$message .= "Question for NPM : <br><br>";
$message .= "•  Do you need to monitor your server hardware health & application ?"."&nbsp;&nbsp;&nbsp;<b>".$_POST['r9']."</b><br><br>";

$message .= "•  Do you know when you applications are slow?"."&nbsp;&nbsp;&nbsp;<b>".$_POST['r10']."</b><br><br>";

?>