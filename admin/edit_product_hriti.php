<?php

ob_start();
session_start();
include('database.php');
include('header.php');
$id=$_REQUEST['id'];
?>
<script>

function check1(){
	
	var a=document.getElementById('typ').value;
	//alert(a);
	if(a=='Renew' || a=='AMC'){
	document.getElementById('2').style.display='inline-block';
		document.getElementById('1').style.display='none';
	}
	else{
	document.getElementById('2').style.display='none';
		document.getElementById('1').style.display='inline-block';
		
	}
	
}

</script>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="row">
					<div id="col-md-12">
			
					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Edit Product Entry</h4>
						</div>
						<div class="form-body">
<?php  

$sq="select * from product where product_id='".$id."' order by id";
$r=mysqli_query($con,$sq);
while($row=mysqli_fetch_array($r)){
	
$pro_id=$row['product_id'];	
$pname=$row['product_name'];
$pic=$row['picture'];
$price=$row['price'];
$qt=$row['size'];
$desc=$row['description'];
$cat=$row['category'];
$gross=$row['gross_price'];
}					
	
?>	<form method="post" data-toggle="validator" enctype="multipart/form-data" action=""> 
								<div class="form-group"> 
										
										<div class="col-md-12">

						<label>Product Category</label>
<?php	  
			 $sql="select * FROM category order by id";
$r=mysqli_query($con,$sql);
echo"<select name='cate' class='form-control'><option>Please Select</option>";
while($row=mysqli_fetch_array($r))
{
echo"<option value='".trim($row[1])."'";
if($cat==$row[1])echo "selected";
echo ">".$row[1]."</option>";





}
echo"</select>";

?> 
  <?php 
  
  $sq="select img from product_img where product_id='".$id."'";
  $r=mysqli_query($con,$sq);
  while($row=mysqli_fetch_array($r)){ 
  $img=explode(" : ",$row['img']);
  }
  ?>
  

	</div>
																	
																	<div class="clearfix"></div>
																		</div>	
							<div class="form-group"> 
										
										<div class="col-md-12">

						<label>Product Name</label>
														<input type="hidden" class="form-control" value="<?php echo $pro_id; ?>" name="id" size="30" /> 
														<input type="hidden" class="form-control" value="<?php echo $pic; ?>" name="pic" size="30"/> 

							<input type="text" class="form-control" placeholder="Full Name" name="pname" value="<?php echo $pname; ?>" size="30" required> 
							</div>
																	
																	<div class="clearfix"></div>
																		</div>
				
		<div class="form-group"> 
											<div class="col-md-6">

						<label>Product Price</label>
										<input type="text" class="form-control" pattern="[0-9]+" value="<?php echo $gross; ?>" name="price" size="30" required> 


						</div>
						<div class="col-md-6">

						<label>Product discounted</label>
										<input type="text" class="form-control" pattern="[0-9]+"  value="<?php echo $price; ?>" title="Please Provide the price" placeholder="Product Price" name="dis" size="30" required> 


						</div>
						<div class="clearfix"></div>
												</div>
<div class="form-group"> 
						<div class="col-md-12">
						<label>Product Size</label>
						<?php
      $options = array("S","M","L","XL","XXL","XXXL");
 ?>
     <?php foreach ($options as $option): ?>
	 <input type="checkbox" name="size" value="<?php echo $option; ?>"<?php if ($qt == $option): ?> checked<?php endif; ?> >  <?php echo $option; ?>
	 
        
     <?php endforeach; ?>
					
																	</div>
																	<div class="clearfix"></div>
																		</div>				
				<div class="form-group"> 					
				<div class="col-md-3">
				<label>Picture</label>
								<img src="../product_img/<?php echo  $img[0];?>" width="100px">	 
								<input type="file" name="file" /></div>								

<div class="col-md-3">
<img src="../product_img/<?php echo  $img[1];?>" width="100px">
   <input type="file" name="file1" value="<?php echo  $img[2];?>" />
</div>			<div class="col-md-3">
<img src="../product_img/<?php echo  $img[2];?>" width="100px">									
   <input type="file" name="file2" />							
																	
																	</div>
																																		<div class="clearfix"></div>

		</div>
																		
																		
							<div class="form-group"> 						<div class="col-md-12">

												<label>Description</label>
																	
<textarea class="form-control" name="desc" required> <?php echo $desc; ?></textarea>	</div>
																	<div class="clearfix"></div>
																		</div>
			
		<div class="form-group"> 
																		<div class="col-md-6">

							
				<input type="submit" class="btn btn-info" name="sub" value="Submit">
				</div>
																<div class="clearfix"></div>

				</div>

					</div>
				
							</div>
					
					
				
													
				</form> 
		<?php		
		
if(isset($_POST['sub'])){

	$discount=round($dis_per);
		$id=$_POST['id'];	echo $id;
						$name=mysqli_real_escape_string($con,$_POST['pname']);
						$price=mysqli_real_escape_string($con,$_POST['price']);
						$price1=mysqli_real_escape_string($con,$_POST['dis']);
$dis=$price-$price1;
	$total_dis=$dis/$price;
	$dis_per=$total_dis*100;
	echo $total_dis;
			$discount=round($dis_per);
		$today=date("s");
				$des=mysqli_real_escape_string($con,$_POST['desc']);
												$cate=mysqli_real_escape_string($con,$_POST['cate']);
									echo $pname;			
$img1=$today.$_FILES['file']['name'];
$img2=$today.$_FILES['file1']['name'];
$img3=$today.$_FILES['file2']['name'];

$pro_img=$img1." : ".$img2." : ".$img3;

						/*$pic=$_POST['file'];
						
						$img1=$id.$_FILES['file']['name'];
						$targetpath="../product_img/".$img1;*/
if(move_uploaded_file($_FILES['file']['tmp_name'],"../product_img/".$img1) && move_uploaded_file($_FILES['file1']['tmp_name'],"../product_img/".$img2) && move_uploaded_file($_FILES['file2']['tmp_name'],"../product_img/".$img3))
{			$path='../product_img/'.$img[0];
$path1='../product_img/'.$img[1];
$path2='../product_img/'.$img[2];
						unlink($path);	unlink($path1);	unlink($path2);
						$sql="update product set category='".$cate."', product_name='".$name."' ,picture='".$img1."',price=".trim($_POST['dis']).",discount=".$discount.",gross_price=".$price.",size='".trim($_POST['size'])."' where product_id='".$id."'";
						$res=mysqli_query($con,$sql) or die(mysqli_error($con));
							echo $sql;
						$sql1="update product_img set  img='".$pro_img."' where product_id='".$id."'";	
							$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
						if($res && $res1)
						{
						
						echo "<script> sweetAlert('Product Updated', ' For ".$name."', 'success');</script>";
						echo"<script>window.location.href='edit_product_hriti.php?id=$id';</script>";
						}
						}
						else{
$sql="update product set category='".$cate."', product_name='".$name."' ,price=".trim($_POST['dis']).",discount=".$discount.",gross_price=".$price.",size='".trim($_POST['size'])."' where product_id='".$id."'";
						$res=mysqli_query($con,$sql) or die(mysqli_error($con));							echo $sql;
						$res=mysqli_query($con,$sql) or die(mysqli_error($con));
						echo $sql;
						if($res!=0)
						{
						
						echo "<script> sweetAlert('Product Updated', ' For ".$name."', 'success');</script>";
						echo"<script>window.location.href='edit_product_hriti.php?id=$id';</script>";
						}
						}
						}


?>				
				
						</div>
					

		</div></div></div>			

	<script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
             $(document).ready(function(){
       $("#date1").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });
	         $("#date2").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });      $("#date3").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });      $("#date4").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });
       });
        </script>	
		
		<!--footer-->

<?php

include('footer.php');
?>		
	