<?php
$id=0;
$sql2="select * from product_id";
$r2=mysqli_query($con,$sql2);
while($row=mysqli_fetch_array($r2))
{
$id=$row[1];
}
$id1=$id+1;

$sql1="update product_id set product_id='".$id1."'";
$r1=mysqli_query($con,$sql1);

$id="PRODUCT".$id;


?>