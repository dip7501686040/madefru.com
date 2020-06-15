<?php

ob_start();
session_start();
include('database.php');
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

}					
	
?>	<form method="post" data-toggle="validator" enctype="multipart/form-data" action="edit_product_success.php"> 
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
				
		<div class="form-group has-feedback"> 
											<div class="col-md-6">

						<label>Product Price</label>
										<input type="text" class="form-control" pattern="[0-9]+" value="<?php echo $price; ?>" name="price" size="30" required> 


						</div>
						
						<div class="col-md-6">
						<label>Product Size</label>
						<?php
      $options = array("S","M","L","XL","XXL","XXXL");
 ?>
     <?php foreach ($options as $option): ?>
	 <input type="checkbox" name="size" value="<?php echo $option; ?>"<?php if ($qt == $option): ?> checked<?php endif; ?> required>  <?php echo $option; ?>
	 
        
     <?php endforeach; ?>
					
																	</div>
																	<div class="clearfix"></div>
																		</div>				
				<div class="form-group"> 					
				<div class="col-md-12">
				<label>Picture</label>
								<img src="../product_img/<?php echo  $img[0];?>" width="100px">									
   <input type="file" name="file" />
<img src="../product_img/<?php echo  $img[1];?>" width="100px">									
   <input type="file" name="file" /><img src="../product_img/<?php echo  $img[2];?>" width="100px">									
   <input type="file" name="file" />
																	
																	</div>
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
				
		
				
						</div>
					

					

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


	