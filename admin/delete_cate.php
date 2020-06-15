<?php

ob_start();

include("database.php");

$id=$_REQUEST['id'];
$sql1="select category from category where id=".$id."";
$r2=mysqli_query($con,$sql1);
$sql2="delete from category where id=".$id."";
$r=mysqli_query($con,$sql2);

if($r==1 ){
	while($row=mysqli_fetch_assoc($r2)){
		$category=$row['category'];
		$sql3="delete from subcategory where category='".$category."'";
		if(mysqli_query($con,$sql3)){
			$sql4="delete from subsubcategory where category='".$category."'";
			if(mysqli_query($con,$sql4)){
				$sql5="delete from product where category='".$category."'";
				if(mysqli_query($con,$sql5)){
					echo "<script>alert('The Category has been deleted thank you');
						window.location.href='all_category.php';</script>";
				}
			}		
		}
	}
} 

?>