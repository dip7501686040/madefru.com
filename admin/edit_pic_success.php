<?php
ob_start();
include 'database.php';
if(isset($_POST['sub'])){
$today=date("Y-m-d");	
$id=$_POST['id'];	
$prod_id=$_POST['pro_id'];	

if(file_exists($_FILES['file']['name']))
{
echo "file exists";
}
else
{
$img1=$_FILES['file']['name'];

if(move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$img1))
{
	
$sq="update product_img set img='".$img1."' where id='".$id."'";
$r=mysqli_query($con,$sq) or die(mysqli_error($con));
if($r){
	echo "<script>
	alert('Image is updated');
	window.location.href='edit_product_aesir.php?id=".$prod_id."';</script>";
	
}
}

}
}
?>