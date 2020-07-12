<?php
session_start();
    include('../dbcontroller.php');
    $db_handle=new DBController();
    @$subcat_id=$_GET['subcategory'];
//$cat_id=2;
/// Preventing injection attack //// 
// if(!is_numeric($cat_id)){
// echo "Data Error";
// exit;
//  }
/// end of checking injection attack ////
$result = array();
if($stmt = $db_handle->runQuery("select * from subsubcategory where subcategory='$subcat_id'")){
 while ($row = mysqli_fetch_assoc($stmt)) {
    $result[]=$row;
  }
}


$main = array('data'=>$result);
echo json_encode($main);
?>