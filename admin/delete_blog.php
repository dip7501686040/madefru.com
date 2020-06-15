<?php
ob_start();
include("database.php");
$id=$_REQUEST['id'];

$sq="DELETE FROM `blog` WHERE  id =".$id." ";

$r=mysqli_query($con,$sq);

if($r==1 ){
	echo "<script>alert('The Blog has been deleted thank you');
	window.location.href='all_blog.php';
	</script>";
	
} 

?>