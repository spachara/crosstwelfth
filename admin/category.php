<?php
session_start();
require_once '../dbconnect.inc';

include("class.page_split.php");
$obj = new page_split();
$obj->_setPageSize(100);						
$obj->_setFile("category.php");		
$obj->_setPage($_GET['page']);		
if($_GET['page'] > 1){
	$f = 100*($_GET['page']- 1);
}

if($_SESSION['AUTH_PERMISSION_ID']=='') {
	header("Location:index.php");
}


if($_POST['save'] == '1'){
	if($_POST['hidden_new_id']){
		foreach ($_POST['hidden_new_id'] as $v) {

				$update_new_ranking = "UPDATE category_tb SET ranking = '".$_POST['new_ranking'][$v]."'  ";
				$update_new_ranking .= "WHERE cid = '".$_POST['hidden_new_id'][$v]."'";
				$update_new_ranking_result = @mysql_query($update_new_ranking, $connect);
				
		}
	}
?>		 
		<script>
			location.href='category.php'; //รีเฟสหน้า
		</script>
<?php
}


if($_GET['sAction'] == 'del'){
	$delete_howto = "DELETE FROM category_tb  WHERE cid = '".$_GET['id_del']."' ";
	@mysql_query($delete_howto, $connect);
?>		 
		<script>
			location.href='category.php'; //รีเฟสหน้า
		</script>
<?php
}


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
                                     <a href="category.php">Category</a>
                                        
                                   </div>
                                   <!--End Navigator-->            
            
            	<!--Block Frame-->
            	<div class="block_style2">
                	<div class="block_style2_top">
                    	<div class="block_style2_top-l"></div>
                        <div class="block_style2_top-r"></div>
                        <div class="block_style2_top-t">Category</div>
                    </div>
                    <div class="block_style2_content">



                                   		<!--Coppy Module Clear-->
                                        <form action="category.php" method="post" enctype="multipart/form-data" name="form1">
                                        <div class="module_3">
                                            <div class="title">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                <div class="t"><h2>
                                                </h2> </div>
                                                <div class="bt">
                                                	 
                                                </div>
                                            </div>
                                            <div class="conten">
                                                <!--ใสข้อมูล ตรงนี้-->
                                                <!--ตาราง 3 Cell-->
                                   <div class="title-top">
                                   <div class="right-title">
                                   <div class="form3">
                                   		
                                        <ul>
                                        <li><a href="add_category.php"><img alt="Add" src="images/1343378527_add1-.png" title="Add"/> <span style="position:relative; top:-3px;">Category </span></a></li>                                            
                                            <li><div style="height:20px; width:1px; background:#ccc;"></div></li>
                                        <li>
                                            <input type="hidden" name="save" value="1" />
                                            <input type="image" src="images/save_all_ranking.png" alt="Save Ranking" name="Submit" value="Save" title="Save Ranking" style="width:128px; height:16px;"/> </li>         
                                        </ul>
                                        
                                   </div>
                                   </div>
                                   
                                   </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                   	<div class="table_3cell">
                                     	<ul>
                                        	<!--Title-->
                                        	<li class="bg-title">
                                           	  <div class="cell1" style="width:10%;">ลำดับ</div>
                                              <div class="cell2" style="width:30%; height:25px;">Name</div>
                                              <div class="cell3" style="width:15%; height:25px;">Size</div>
                                              <div class="cell3" style="width:15%; height:25px;">Size</div>
                                              <div class="cell3" style="width:20%;">&nbsp;</div>
                                            </li>
                                            <!--End Title-->
                                            <?php
											$sql_category = "SELECT * FROM category_tb ORDER BY ranking";
											$result_category =$obj->_query($sql_category, $connect);
											$num_category =@mysql_num_rows($result_category);
											
											for($i=1;$i<=intval($num_category);$i++){
											$data_category =@mysql_fetch_array($result_category);
											?>
                                            <li>
                                                <div class="cell1"style="width:10%;">
                                                    <?php echo $f+$i;?>
                                                </div>
                                              <div class="cell2" style="width:30%;">
                                                <?php echo $data_category['name']; ?>
                                                </div>	
                                              <div class="cell3" style="width:15%;">
                                                <?php echo $data_category['c_discount']; ?> %
                                                </div>	
                                              <div class="cell3" style="width:15%;">
                                              <a href="size.php?cid=<?php echo $data_category['cid'];?>">Add size</a></div>	
                                                
                                                <div class="cell3" style="width:20%;">
                                                    <!--Form2-->
                                                   <div class="form2">
                                                        <ul>
                                                            <li><a href="add_category.php?cid=<?php echo $data_category['cid'];?>&amp;sAction=Edit"><img alt="Edit" src="images/1343377813_Modify.png" title="Edit"/></a></li>
                                                            <li><a href="category.php?id_del=<?php echo $data_category['cid'];?>&amp;sAction=del" onClick="return confirm('Do you want to delete it. (yes/no)')"><img alt="Delete" src="images/1343378039_23-Full Trash.png" title="Delete"/></a></li>
                                                            <li>Ranking</li>
                                                            <li><input name="new_ranking[<?php echo $data_category['cid'];?>] " type="text" id="new_ranking " size="3" maxlength="3" value="<?php echo $data_category['ranking'];?>">
                                                            <input name="hidden_new_id[<?php echo $data_category['cid'];?>] " type="hidden"  value="<?php echo $data_category['cid'];?>"></li>
                                                        </ul>
                                                   </div>                                   
                                                   <!--End Form2-->

                                          </div>
                                            </li>
                                            <? } ?>
                                        </ul>
                                    </div>
                                   <!--End ตาราง 3 Cell-->

                                	<!-- -->
                                  	<div class="page_number">
                                    	<div class="page_number-right">
                                        
                                            	<?php $obj->_displayPage(); ?>
                                    	</div>
                                    </div>   
                                    <!-- -->


                                            
                                          </div>
                                            <div class="bottom">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                            </div>
                                        </div>
										<!--End Coppy Module Clear--> </form>                                 



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
            







        </div>
<!--Page Footer-->

<?php include('footer.php');?>

<!--End Page Footer-->        
    </div>
</div>    
</body>
</html>
