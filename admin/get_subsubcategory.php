<?php
    @$subcat_id=$_GET['subcat_id'];
//$cat_id=2;
/// Preventing injection attack //// 
// if(!is_numeric($cat_id)){
// echo "Data Error";
// exit;
//  }
/// end of checking injection attack ////
require "database.php";
$result = array();
if($stmt = mysqli_query($con, "select * from subsubcategory where subcategory='$subcat_id'")){
 while ($row = mysqli_fetch_assoc($stmt)) {
    $result[]=$row;
  }
}


$main = array('data'=>$result);
echo json_encode($main);
?>