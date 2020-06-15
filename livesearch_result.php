<?php
include('dbcontroller.php');
$db_handle=new DBController();
$query="select product_name from product where product_name like '%$_GET[search]%'";
$data=$db_handle->runQuery($query);
while($result=mysqli_fetch_assoc($data)){
    echo"$result[product_name]<br>";
}
?>