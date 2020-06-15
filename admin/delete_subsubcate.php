<?php

ob_start();

include("database.php");

$id=$_REQUEST['id'];
$sql1="select subsubcategory from subsubcategory where id=".$id."";
$r2=mysqli_query($con,$sql1);
$sql2="delete from subsubcategory where id=".$id."";
$r=mysqli_query($con,$sql2);

if($r==1 ){
	while($row=mysqli_fetch_assoc($r2)){
		$subsubcategory=$row['subsubcategory'];
		$sql4="delete from product where subsubcategory='".$subsubcategory."'";
		if(mysqli_query($con,$sql4)){
			echo "<script>alert('The Sub SubCategory has been deleted thank you');
			window.location.href='all_category.php';</script>";
		}
	}
} 

?>