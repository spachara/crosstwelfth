<?php

require_once("src/facebook.php");
$config = array(

  'appId'  => '742461059118460', // มีเครื่องหมาย ' คร่อมหัวท้ายด้วย

  'secret' => 'e905f6b6ff4fb6f470c79b55e30fc0ca', // มีเครื่องหมาย ' คร่อมหัวท้ายด้วย

      'fileUpload' => false, // optional

      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps

  );

  $facebook = new Facebook($config);

  $user_id = $facebook->getUser();


    if($user_id) { // ถ้าผู้เข้าชมมีการ Login facebook ในเว็บไซต์เราแล้วให้แสดงผลต่อไปนี้

      try {

        $user_profile = $facebook->api('/me','GET');

        echo "ชื่อ facebook : " . $user_profile['name'];

        $params = array( 'next' => 'http://www.crosstwelfth.com/' ); // เว็บไซต์ของคุณ

        $logout_url = $facebook->getLogoutUrl($params);  // $params is optional.

        echo " ออกจากระบบ Facebook "; // คุณอาจเปลี่ยนเป็นรูปภาพที่สวยงามแทนข้อความ

      } catch(FacebookApiException $e) {

        // If the user is logged out, you can have a

        // user ID even though the access token is invalid.

        // In this case, we'll get an exception, so we'll

        // just ask the user to login again here.

        $login_url = $facebook->getLoginUrl();

        echo 'กรุณาเข้าสู่ระบบด้วย facebook'; // คุณอาจเปลี่ยนเป็นรูปภาพที่สวยงามแทนข้อความ

        error_log($e->getType());

        error_log($e->getMessage());

      }  

    } else {

      // ถ้าผู้เข้าชมยังไม่มีการ Login facebook ในเว็บไซต์ ให้แสดงลิงค์เข้าสู่ระบบแทน

      $login_url = $facebook->getLoginUrl();

      echo 'กรุณาเข้าสู่ระบบด้วย facebook'; // คุณอาจเปลี่ยนเป็นรูปภาพที่สวยงามแทนข้อความ

    }

  ?>