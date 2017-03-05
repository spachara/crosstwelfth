<?php
 
require_once '../../dbconnect.inc';
if(isset($_GET['fieldValue'])){
    
	$select_user = "SELECT * FROM user_tb WHERE u_id = '". $_GET['u_id'] ."' AND u_pass = '" . $_GET['fieldValue'] . "'";
	$result_user =@mysql_query($select_user, $connect);
	if(@mysql_num_rows($result_user) > 0)
        {
            header('Content-Type: application/json');
            $a = array("u_pass_c", true,"");
            echo json_encode($a);
        }
        else
        {            
             header('Content-Type: application/json');
               $a = array("u_pass_c", false,"Password is incorrect!");
            echo json_encode($a); 
        }
        
   
}
 
?>
