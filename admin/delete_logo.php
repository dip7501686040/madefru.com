<?php
ob_start();
include("database.php");
$id=$_REQUEST['id'];
 
$sq="delete * from logo where id='".$id."' ";
//echo $sq;
//exit();
$r=mysqli_query($con,$sq);

if($r==1 ){
	echo "<script>alert('The Logo has been deleted thank you');
	window.location.href='all_logo.php';
	</script>";
	
} 

?>