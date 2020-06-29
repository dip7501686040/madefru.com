<?php
/*include 'database.php';
ob_start();
if(isset($_POST['sub'])){
			echo $_POST['p_name'];
			$sq="delete from product_details where product_name='".$_POST['p_name']."'";
			mysqli_query($con,$sq);
			$sq="delete from product where product_name='".$_POST['p_name']."'";
			mysqli_query($con,$sq);
header("location:show_product.php");
			}*/
	?>
	
	
	<?php
include 'database.php';
ob_start();

			//echo $_REQUEST['id'];
		
			$sq="delete from product where product_id='".$_REQUEST['id']."'";
			mysqli_query($con,$sq);
					
					$sq2="select * from product_img where product_id='".$_REQUEST['id']."'";
					$r=mysqli_query($con,$sq2);
					while($row=mysqli_fetch_array($r)){
					    
			$img=$row['img'];
			unlink("../images/$img");
					}
					$sq1="delete from product_img where product_id='".$_REQUEST['id']."'";
			mysqli_query($con,$sq1);
			$sq3="delete from seller_product where product_id='".$_REQUEST['id']."'";
			mysqli_query($con,$sq3);
			
			
header("location:all_product.php");
			
	?>