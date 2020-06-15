<?php
ob_start();
include("database.php");
$id=$_REQUEST['id'];
 
$sq="delete * from testimonail where id='".$id."' ";
//echo $sq;
//exit();
$r=mysqli_query($con,$sq);

if($r==1 ){
	echo "<script>alert('The Testimonial has been deleted thank you');
	window.location.href='all-testimonial.php';
	</script>";
	
} 

?>