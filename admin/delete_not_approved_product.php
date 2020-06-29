<?php
include 'database.php';
ob_start();
		
			$sq="delete from seller_product where seller_product_id='".$_REQUEST['seller_product_id']."'";
			mysqli_query($con,$sq);
					
					$sq2="select * from seller_product_img where seller_product_id='".$_REQUEST['seller_product_id']."'";
					$r=mysqli_query($con,$sq2);
					while($row=mysqli_fetch_array($r)){
					    
			$img=$row['img'];
			unlink("../images/$img");
					}
					$sq1="delete from seller_product_img where seller_product_id='".$_REQUEST['seller_product_id']."'";
			mysqli_query($con,$sq1);
			
			
header("location:not-approved-product.php");
			
	?>