<?php

ob_start();

include("database.php");

$id=$_REQUEST['id'];
$sql1="select subcategory from subcategory where id=".$id."";
$r2=mysqli_query($con,$sql1);
$sql2="delete from subcategory where id=".$id."";
$r=mysqli_query($con,$sql2);

if($r==1 ){
	while($row=mysqli_fetch_assoc($r2)){
		$subcategory=$row['subcategory'];
		$sql3="delete from subsubcategory where subcategory='".$subcategory."'";
		if(mysqli_query($con,$sql3)){
			$sql4="delete from product where subcategory='".$subcategory."'";
			if(mysqli_query($con,$sql4)){
				echo "<script>alert('The SubCategory has been deleted thank you');
						window.location.href='all_category.php';</script>";
			}
		}
	}
} 

?>