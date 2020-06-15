<?php

ob_start();
session_start();
include('database.php');
include('header.php');
?>
 <script>
function get_sub_category_name()
{
	var category_id = $('#category_id').val();
	 $.ajax({
        type: "POST",
        url: "get_sub_category_name.php", // Name of the php files
        data: "category="+category_id,
        success: function(html)
        {
            $("#show").html(html);
			document.getElementById("hide").style.display="none";
        }
    });
}
</script>

		
		<div id="page-wrapper">
			<div class="main-page">
				<div class="row">
					<div id="col-md-12">
						
					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>New Product Entry :</h4>
						</div>
						<div class="form-body">
							<form method="post" data-toggle="validator" enctype="multipart/form-data"> 
							<div class="form-group"> 
							
					<div class="col-md-4">
					<label>Product Category</label>
									<select class="form-control1" name="type" id="category_id" onChange="get_sub_category_name();" required/><option value="">Type</option>
	<?php
					$s="select * from category";
					$s1=mysqli_query($con,$s);
					while($row=mysqli_fetch_array($s1)){
						echo "<option value=".$row['category'].">".$row['category']."</option>";
						
					}
					?>
											
									
									
										</select></div>
											<div class="col-md-4">

					                       
							<label>Sub Category<font color="#FF0000">*</font></label>
							       <select name="" id="hide" disabled class="form-control">
                                	<option>--Select Test--</option>
                                </select>
                                <div id="show"></div>

											
									
									
										</select>
										
										
										</div>
									<div class="col-md-4">	
									<label>Product Id</label>
							<input type="text" class="form-control" placeholder="Client Id:Auto-generated" size="30" disabled/> 
										</div>
							<div class="clearfix"></div>

						</div> 
							<div class="form-group"> 
										
										<div class="col-md-6">

						<label>Product Name</label>
							<input type="text" class="form-control" placeholder="Full Name" name="name" size="30" required> 
							</div>
																	<div class="col-md-6">
							<label>Picture</label>
																	
   <input type="file" name="file" style="border:1px solid #ccc;" required />

																	</div>
																	<div class="clearfix"></div>
																		</div>
				
		<div class="form-group has-feedback"> 
											<div class="col-md-6">

						<label>Product Price</label>
										<input type="text" class="form-control" pattern="[0-9]+" title="Please Provide the price" placeholder="Product Price" name="price" size="30" required> 


						</div>
						
						<div class="col-md-6">
						<label>Product Quantity</label>
<select class="form-control1" name="qt" id="typ"  required/>
											<option value="">Type</option>
									
									<option value="Kg">Kg</option>
									<option value="Ltr">Ltr</option>
									<option value="Pcs">Pcs</option>
														<option value="Dozen">Dozen</option>
														<option value="Pkt">Pkt</option>
										</select>		
					
																	</div>
																	<div class="clearfix"></div>
																		</div>				
	
																		
																		
							<div class="form-group"> 						<div class="col-md-12">

												<label>Description</label>
																	
<textarea class="form-control" name="desc" required></textarea>	</div>
																	<div class="clearfix"></div>
																		</div>
		
																	
																																
																		
		<div class="form-group"> 
																		<div class="col-md-6">
				<input type="submit" class="btn btn-info" name="sub" value="Submit">

							
				</div>
																<div class="clearfix"></div>

				</div>

				
				
							</div>
					
					
				
													
				</form> 
				
<?php

if(isset($_POST['sub'])){
	include('ids.php');
		$today=date("s");

	if(file_exists($_FILES['file']['name']))
{
echo "file exists";
}
else
{
$img1=$today.$_FILES['file']['name'];

if(move_uploaded_file($_FILES['file']['tmp_name'],"../product_img/".$img1))
{	
$sq="insert into product(product_id,category,product_name,picture,price,quantity,description) 
values('".$id."','".trim($_POST['type'])."','".trim($_POST['name'])."','".$img1."',".trim($_POST['price']).",'".trim($_POST['qt'])."','".trim($_POST['desc'])."')";
$r=mysqli_query($con,$sq) or mysqli_error($con);
//echo $sq;
if($r==1){
echo "<script>sweetAlert('OK','Thank you for Registration with product','success');</script>";
}
}

}
}

?>				
				
				
						</div>
					

					
					</div>			
</div>	
</div>	
</div>
		</div>
			<script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
             $(document).ready(function(){
       $("#date").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });
	  
	 
       });
        </script>
		<!--footer-->
<?php

include('footer.php');
?>		