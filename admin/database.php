<?php
$con=mysqli_connect("localhost","root","","madefru");
if(mysqli_connect_errno()){
	echo "faild to connect to mysql".mysqli_connect_errno();
}
mysqli_select_db($con,"madefru");
?>
