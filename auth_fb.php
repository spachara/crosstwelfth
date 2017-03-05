<?
 session_start();
 
 require("src/facebook.php");  
 define("FB_APP_ID" , "429069913961602");  // App ID ที่ได้จากการสร้าง App
 define("FB_APP_SECRET" , "ee768c8cd2f0d1952fb2f0786ebbab9d"); // App Secret ที่ได้จากการสร้าง App
 $FB = new Facebook(array(
           'appId'  => FB_APP_ID,
           'secret' => 'ee768c8cd2f0d1952fb2f0786ebbab9d',
         ));
 $user = NULL;
 $user = $FB->getUser();  // Get User
 
 if ($user) { // ตรวจสอบว่าสามารถ Login แล้ว Get ข้อมูลได้หรือไม่
 
  try { 
  
   $FB_ME_INFO = $FB->api('/me'); // เป็นการเรียก Method /me ซึ่งเป็นข้อมูลเกี่ยวกับผู้ใช้ท่านนั้นๆ ที่ได้ทำการ Login
   
   $_SESSION['LOGIN_FB_ID'] = $FB_ME_INFO["id"];
   $_SESSION['LOGIN_FB_FULLNAME'] = $FB_ME_INFO["name"];
   $_SESSION['LOGIN_FB_EMAIL'] = $FB_ME_INFO["email"];
   
   
   header("Location:http://www.crosstwelfth.com/"); 
   
  } catch(FacebookApiException $e) { 
   echo $e;  // print Error
   //header("Location:./index.php?Login=fail"); 
  }
  
 } else {
  header("Location:http://www.crosstwelfth.com/index.php?Login=fail");
 }

?>