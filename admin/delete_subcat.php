<?php

ob_start();

include("database.php");

$id=$_REQUEST['id'];
$table=$_REQUEST['table'];
$sq="delete from $table where ID=".$id."";
$r=mysqli_query($con,$sq);

if($r==1 ){
	echo "<script>alert('The Sub Category has been deleted thank you');
	window.location.href='edit_sub_categ.php?id=".$table."';
	</script>";
	
} 

?>