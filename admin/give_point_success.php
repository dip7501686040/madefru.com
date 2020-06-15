<script src="sweetalert-master/dist/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
include('database.php');

if(isset($_POST['sub'])){

		$id=$_POST['id'];
						$name=mysql_real_escape_string($_POST['na']);
						$price=mysql_real_escape_string($_POST['p']);
												$money=mysql_real_escape_string($_POST['m']);
													$extra=mysql_real_escape_string($_POST['points']);


			//	$no=intval($tot/100);
	$rs=$extra/4;
						
						
						$sql="update points set points=points+".$extra.",total=total+".$rs." where user_id='".$id."'";
						$res=mysqli_query($con,$sql) or die(mysqli_error());
						if($res!=0)
						{
						
						echo "<script> alert('Ok Points Given');</script>";
						echo"<script>window.location.href='redeem.php';</script>";
						}
						
					
						}


?>				
		