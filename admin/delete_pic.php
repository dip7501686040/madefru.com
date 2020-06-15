<?php
ob_start();
include("database.php");
$id=$_REQUEST['id'];
$url=$_REQUEST['url'];
$sq1="select img from product_img where id='".$id."'";	
$sq="delete from product_img where id='".$id."' ";
//echo $sq;
//exit();
$r1=mysqli_query($con,$sq1);
while($row=mysqli_fetch_assoc($r1)){
	$img=$row['img'];
	unlink("../product_img/$img");
}
$r=mysqli_query($con,$sq);

if($r==1 ){
	echo "<script>alert('The Image has been deleted thank you');
	window.location.href='".$url."';
	</script>";
	
} 

?>