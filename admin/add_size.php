<?php
session_start();
require_once '../dbconnect.inc';

if(isset($_SESSION['AUTH_PERMISSION_ID'])==false) { 
	echo "<script>window.location.href='index.php'</script>";
}

$IMG_ROOT="../images/size/";

if($_GET['delfile'] != '' ){
	$edit_banner = "UPDATE size_tb SET picture='' where sid='".$_GET['sid']."'";
	@mysql_query($edit_banner, $connect);
	@unlink($_GET['delfile']);
	?><script>window.location.href='add_size.php?cid=<?php echo $_GET['cid'];?>&sid=<?php echo $_GET['sid'];?>&sAction=Edit';</script><?php
}



if($_POST['Submit'] == 'CREATE'){
	
	
	$realname = $_FILES['uploadedfile1']['name'];  
	
	if ($realname != ""){
	
	$target_path = $IMG_ROOT;
	
	$target_path = $target_path . basename( $_FILES['uploadedfile1']['name']); 
										
	if(move_uploaded_file($_FILES['uploadedfile1']['tmp_name'], $target_path)) {
		//echo "The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded";
	} else{
		//echo "There was an error uploading the file, please try again!";
	}
		
	
	$type= $_FILES['uploadedfile1']['type'];  
	
	if($type=="image/pjpeg"){
		$dot = "jpg";
	}elseif($type=="image/jpeg"){
		$dot = "jpg";
	}elseif($type=="image/gif"){
		$dot = "gif";
	}elseif($type== "image/x-png"){
		$dot = "png";
	}elseif($type== "image/png"){
		$dot = "png";
	}
	sleep(1);
	$name = date('Y').date('m').date('d')."-".date('H').date('i').date('s');
	
	//$IMG_ROOT="../images/gallery_/where_to_go/";
	
	$oldname = $IMG_ROOT."/".$_FILES['uploadedfile1']['name'];
	$newname =$IMG_ROOT."/".$name.".".$dot;
	//echo $oldname."<br>".$newname;
	rename($oldname,$newname); 
	
	$pic_name = $name.".".$dot;
	
	}

	$add_banner = "INSERT INTO size_tb (sid, cid, name, picture, ranking, date_in)";
	$add_banner .= "VALUES(NULL, '".$_POST['cid']."', '".$_POST['name']."', '".$pic_name."', '0', NOW())";
	@mysql_query($add_banner, $connect);
			

?><script>window.location.href='size.php?cid=<?php echo $_POST['cid'];?>';</script>
<?php } 


if($_POST['Submit'] == 'Edit'){

	$add_banner = "UPDATE size_tb SET name = '".$_POST['name']."'";
	$realname = $_FILES['uploadedfile1']['name'];  
	
	if ($realname != ""){
	
	$target_path = $IMG_ROOT;
	
	$target_path = $target_path . basename( $_FILES['uploadedfile1']['name']); 
										
	if(move_uploaded_file($_FILES['uploadedfile1']['tmp_name'], $target_path)) {
		//echo "The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded";
	} else{
		//echo "There was an error uploading the file, please try again!";
	}
		
	
	$type= $_FILES['uploadedfile1']['type'];  
	
	if($type=="image/pjpeg"){
		$dot = "jpg";
	}elseif($type=="image/jpeg"){
		$dot = "jpg";
	}elseif($type=="image/gif"){
		$dot = "gif";
	}elseif($type== "image/x-png"){
		$dot = "png";
	}elseif($type== "image/png"){
		$dot = "png";
	}
	sleep(1);
	
	@unlink($IMG_ROOT.$_POST['pic_hidden']);
	
	$name = date('Y').date('m').date('d')."-".date('H').date('i').date('s');
	
	//$IMG_ROOT="../images/gallery_/where_to_go/";
	
	$oldname = $IMG_ROOT."/".$_FILES['uploadedfile1']['name'];
	$newname =$IMG_ROOT."/".$name.".".$dot;
	//echo $oldname."<br>".$newname;
	rename($oldname,$newname); 
	
	$pic_name = $name.".".$dot;
	
	$add_banner .= ", picture = '".$pic_name."'";
	}
	$add_banner .= " where sid = '".$_POST['sid']."'";
	@mysql_query($add_banner, $connect);
	


?><script>window.location.href='size.php?cid=<?php echo $_POST['cid'];?>';</script>
<?php } 


$sql_size = "select * from size_tb where sid = '".$_GET['sid']."' and cid='".$_GET['cid']."' ";
$result_size = @mysql_query($sql_size, $connect);
$data_size = @mysql_fetch_array($result_size);

$sql_category = "SELECT * FROM category_tb where cid='".$_GET['cid']."'";
$result_category =@mysql_query($sql_category, $connect);
$data_category =@mysql_fetch_array($result_category);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
<title>::Crosstwelfth::</title>
	<link rel="stylesheet" href="jquery_ui/development-bundle/themes/base/jquery.ui.all.css">
	<script src="jquery_ui/development-bundle/jquery-1.7.2.js"></script>
	<script src="jquery_ui/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="jquery_ui/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="jquery_ui/development-bundle/ui/jquery.ui.button.js"></script>
	<link rel="stylesheet" href="jquery_ui/development-bundle/demos/demos.css">
	<script>
	$(function() {
		$( "input:submit, a, button", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return false; });
	});
	</script>
<script language="javascript">
$(document).ready(function() {
	
	$('#uploadedfile1').after('<span class="pixels"></span>');
	
    var banner_id = $('#banner_id').val();
    var type_id = $('#type_id').val();
    var banner_type = $('#banner_type').val();
	

	pixels = "( 250 x 141 pixels )";

	//alert(banner_id);
	$('.pixels').text(pixels);
});
</script>
<link href="cssstyle.css" rel="stylesheet" type="text/css" />
</head>

<body> 
	<div class="page_container">
    <div class="shadow_l"></div>
	<div class="shadow_r"></div>  
    	<!--Header--> 
    	<?php include('header.php');?>
        <!--Header-->
        <div class="container_content">
            <!--Main Menu-->
            <?php include('mainmenu.php');?>
            <!--End Main Menu-->
            <div class="content_r">
            
            <!--Edit Navigator-->
           <div class="navigator">
                <a href="category.php"><?php echo $data_category['name'];?></a> < <a href="size.php?cid=<?php echo $data_category['cid'];?>">Size</a> < <a href="#"><?php echo ($_GET['sAction'] == 'Edit' ? "Edit" : "Add" );?> <?php echo $banner_name;?></a>
           </div>
           <!--End Navigator-->            

            	<!--Block Frame-->
            	<div class="block_style2">
                	<div class="block_style2_top">
                    	<div class="block_style2_top-l"></div>
                        <div class="block_style2_top-r"></div>
                        <div class="block_style2_top-t">
                        <?php echo ($_GET['sAction'] == 'Edit' ? "Edit" : "Add" );?> Size
                        </div>
                    </div>
                    <div class="block_style2_content">

                     <!--Coppy Module Clear-->
                                   
                <form method="post" enctype="multipart/form-data" name="myform">
                <input type="hidden" name="sid" value="<?php echo $_GET['sid'];?>" />
                <input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>" />
                <input type="hidden" name="pic_hidden" value="<?php echo $data_size['picture'];?>" />
				<div class="page_conten_r">
                                   
                     <!--Coppy Module Clear-->
                      <div class="module_3">
                       		<div class="title">
                                <div class="l"></div>
                                <div class="r"></div>
                                <div class="t"><h2><!--เพิ่มรูปสไลด์--></h2> </div>                  
                      		</div>
                      <div class="conten">
                      <!--ใสข้อมูล ตรงนี้-->
                      <!--ตาราง 3 Cell-->
                      <div class="title-top">&nbsp;
                          <div class="right-title">&nbsp;</div>
                      </div>
                                   
                      <div class="table_3cell">
                          <ul>
                                 <li>
                              		<div class="cell3-text">Name : </div>
                                    <div class="cell3-input"><input name="name" type="text" id="name" value="<?php echo $data_size['name'];?>" /></div>
                                </li>
                                <li>
                              	  <div class="cell3-text">Picture Size : </div>                                
                                  <div class="cell3-input"><input name="uploadedfile1" type="file" id="uploadedfile1" ></div>
                                </li>
                                <?php if($data_size['picture']){?>
                                 <li>
                              	  <div class="cell3-text">Picture Size : </div>                                
                                  <div class="cell3-slidehome">
                                  <img src="<?php echo $IMG_ROOT.$data_size['picture'];?>" width="160"/>
                                  <br />
                                  <a href="add_size.php?cid=<?php echo $data_size['cid'];?>&sid=<?php echo $data_size['sid'];?>&delfile=<?php echo $IMG_ROOT.$data_size['picture'];?>" onClick="return confirm('Do you want to delete it. (yes/no)')">[ DELETE PICTURE ]</a>
                                  </div>
                                </li>
                                <?php } ?>
                                 
                          <!--End Title-->
                                           
                           </ul>
                       </div>
                       <!--End ตาราง 3 Cell-->
                       </div>
                                           
                       </div>
					   <!--End Coppy Module Clear-->                                 
                                        
				</div>    
                                   
                <div class="demo">
                                                    
                <!--<button>Submit</button>-->                                   
				<?php if($_GET['sAction'] == 'Edit'){?>
                <input name="Submit" type="submit" class="borderfrom" style="width:80px" value="Edit">
				<?php }else{?>
                <input name="Submit" type="submit" class="borderfrom" style="width:80px" value="CREATE">
				<?php } ?>
                                                    
                </div>                                   
                	
                    </form>


                    </div>
                    <div class="block_style2_bottom">
                        <div class="block_style2_bottom-l"></div>
                        <div class="block_style2_bottom-r"></div>
                    </div>                    
                </div>
                <!-- End Block Frame-->
                

                
            </div>
            <div class="clear"></div>                        
		</div>            
            


		<?php include('footer.php');?>



        </div>
    </div>
</div>    
</body>
</html>
