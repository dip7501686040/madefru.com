<?php
include("database.php");
$value;
$nid=$_POST['sid'];
$check=$_POST['check'];

if($check==1)
$value=0;
else
$value=1;

$update="update product set sunday_offer=".$value." where product_id='".$nid."'";
$r=mysqli_query($con,$update) or die(mysqli_query($con));
echo $update;
?>