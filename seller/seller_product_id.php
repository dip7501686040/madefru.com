<?php
$id=0;
$sql2="select seller_product_id from seller_product_id";
$r2=$db_handle->runQuery($sql2);
while($row=mysqli_fetch_array($r2))
{
$id=$row['seller_product_id'];
}
$id1=$id+1;

$sql1="update seller_product_id set seller_product_id='".$id1."'";
$r1=$db_handle->runQuery($sql1);

$seller_product_id="SELLERPRODUCT".$id;


?>