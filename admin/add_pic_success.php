<?php
ob_start();
include 'database.php';
if(isset($_POST['sub'])){
$today=date("Y-m-d");	
$id=$_POST['id'];	

if(file_exists($_FILES['pimage']['name']))
{
echo "file exists";
}
else
{
$img1=$_FILES['pimage']['name'];

if(move_uploaded_file($_FILES['pimage']['tmp_name'],"../images/".$img1))
{
	
$query="insert into `product_img` (`id`, `product_id`, `img`) values (NULL, '$id', '$img1')";
$r=mysqli_query($con,$query) or die(mysqli_error($con));
if($r){
	echo "<script>
	alert('Image is updated');
	window.location.href='edit_product_aesir.php?id=".$id."';</script>";
	
}
}

}
}
?>
