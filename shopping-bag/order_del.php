<?php
session_start();

session_unregister("session_PointDis");
session_unregister("session_PromotionDis");
session_unregister("session_CodeDisHidden");
session_unregister("session_CostCal");

session_unregister("session_tranCostPlusHidden");
session_unregister("session_grandTotalHidden");
session_unregister("session_grandTotalPreHidden");
session_unregister("session_TotalNumPre");
session_unregister("session_TotalNumGrand");
session_unregister("session_tranCostPreChk");
session_unregister("session_SubmitGrandTotal");
session_unregister("session_tranCostPlusCal");
session_unregister("session_realShip");
session_unregister("session_realShipPre");
session_unregister("session_PointDis");
session_unregister("session_CodeDis");
session_unregister("session_CodeDisHidden");
session_unregister("session_PromotionDis");


session_unregister("session_shipping_send_free");//เก็บค่าขนส่งสินค้า
session_unregister("session_shipping_name");//เก็บค่าขนส่งสินค้า
session_unregister("session_shipping_name_th");//เก็บค่าขนส่งสินค้า
session_unregister("shipping");//เก็บค่าขนส่งสินค้า
session_unregister("product_total");//เก็บค่าขนส่งสินค้า
session_unregister("grand_total");//เก็บค่าขนส่งสินค้า


session_unregister("session_pre_shipping_send_free");//เก็บค่าขนส่งสินค้า
session_unregister("session_pre_shipping_name");//เก็บค่าขนส่งสินค้า
session_unregister("session_pre_shipping_name_th");//เก็บค่าขนส่งสินค้า
session_unregister("shipping_pre");//เก็บค่าขนส่งสินค้า
session_unregister("product_total_pre");//เก็บค่าขนส่งสินค้า
session_unregister("grand_total_pre");//เก็บค่าขนส่งสินค้า
session_unregister("groupDelivery");//เก็บค่าขนส่งสินค้า
session_unregister("shipping_p");//เก็บค่าขนส่งสินค้า



session_unregister('order_max_rank');//เก็บไอดี
session_unregister('session_id');//เก็บไอดี
session_unregister('session_code');//เก็บไอดี
session_unregister('session_name_th');//เก็บชื่อ
session_unregister('session_name_eng');//เก็บชื่อ
session_unregister('session_weight');//เก็บน้ำหนัก
session_unregister('session_price');
session_unregister("session_num");//เก็บจำนวนชิ้น
session_unregister("session_size");//เก็บไซด์
session_unregister("session_color");//เก็บสี
session_unregister("session_type_th");//เก็บประเภทสินค้า
session_unregister("session_type_eng");//เก็บประเภทสินค้า


session_unregister('session_pre_id');//เก็บไอดี
session_unregister('session_pre_code');//เก็บไอดี
session_unregister('session_pre_name_th');//เก็บชื่อ
session_unregister('session_pre_name_eng');//เก็บชื่อ
session_unregister('session_pre_weight');//เก็บน้ำหนัก
session_unregister('session_pre_price');
session_unregister("session_pre_num");//เก็บจำนวนชิ้น
session_unregister("session_pre_size");//เก็บไซด์
session_unregister("session_pre_color");//เก็บสี
session_unregister("session_pre_type_th");//เก็บประเภทสินค้า
session_unregister("session_pre_type_eng");//เก็บประเภทสินค้า


session_unregister('check_address');
		
session_unregister('cus_name');
session_unregister('cus_lname');
session_unregister('cus_company');
session_unregister('cus_address');
session_unregister('cus_zipcode');
session_unregister('cus_phone');
session_unregister('cus_email');

session_unregister('cus_name2');
session_unregister('cus_lname2');
session_unregister('cus_company2');
session_unregister('cus_address2');
session_unregister('cus_zipcode2');
session_unregister('cus_phone2');
session_unregister('cus_fax2');
session_unregister('cus_email2');

session_unregister('groupDelivery');

 echo "<script> window.location='index.php'</script>";
?>
