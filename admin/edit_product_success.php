<script src="sweetalert-master/dist/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<?php
include('database.php');

if(isset($_POST['sub'])){

		$id=$_POST['id'];	echo $id;
						$name=mysqli_real_escape_string($con,$_POST['pname']);
						$price=mysqli_real_escape_string($con,$_POST['price']);
						$des=mysqli_real_escape_string($con,$_POST['desc']);
												$cate=mysqli_real_escape_string($con,$_POST['cate']);
									echo $pname;			


						$pic=$_POST['pic'];
						
						$img1=$id.$_FILES['file']['name'];
						$targetpath="../product_img/".$img1;
							if(move_uploaded_file($_FILES['file']['tmp_name'],$targetpath)){
						$path='../product_img/'.$pic;
						unlink($path);
						$sql="update product set category='".$cate."', product_name='".$name."' ,picture='".$img1."',price=".$price." where product_id='".$id."'";
						$res=mysqli_query($con,$sql) or die(mysqli_error($con));
							echo $sql;
						if($res!=0)
						{
						
						echo "<script> sweetAlert('Product Updated', ' For ".$name."', 'success');</script>";
						echo"<script>window.location.href='all_product.php';</script>";
						}
						}
						else{
						$sql="update product set category='".$cate."', product_name='".$name."',price=".$price." where product_id='".$id."'";
							echo $sql;
						$res=mysqli_query($con,$sql) or die(mysqli_error($con));
						echo $sql;
						if($res!=0)
						{
						
						echo "<script> sweetAlert('Product Updated', ' For ".$name."', 'success');</script>";
						echo"<script>window.location.href='all_product.php';</script>";
						}
						}
						}


?>				
		