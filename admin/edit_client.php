<?php

$id=$_REQUEST['id'];include('header.php');

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
				
					<div class="tables">
					<div id="col-md-12">
			
					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Show Client-><a href="client.php">Back</a></h4>
						</div>
						<div class="form-body">
<?php  

$sq="select * from user where user_id='".$id."' order by id";
$r=mysqli_query($con,$sq);
while($row=mysqli_fetch_array($r)){
	$name=ucfirst($row['name']);
		$dob=date("d-m-Y",strtotime($row['dob']));
$mob1=$row['phone'];
$city=$row['city'];
$state=$row['state'];
$pin=$row['pincode'];
$email=$row['email'];
$country=$row['country'];
	
}					
	
?>	<form method="post" data-toggle="validator" enctype="multipart/form-data" action="edit_product_success.php"> 
								
							<div class="form-group"> 
										
										<div class="col-md-6">

						<label>Customer ID</label>
														<input type="hidden" class="form-control" value="<?php ?>" name="id" size="30" /> 

							<input type="text" class="form-control" placeholder="Full Name" name="pname" value="<?php echo $name; ?>" size="30" required> 
							</div>
									<div class="col-md-6">

						<label>Customer Name</label>

							<input type="text" class="form-control" placeholder="Full Name" name="pname" value="<?php echo $name; ?>" size="30" required> 
							</div>
																	
																	<div class="clearfix"></div>
																		</div>			
							<div class="form-group"> 
										
										<div class="col-md-6">

						<label>Customer Email</label>

							<input type="text" class="form-control" placeholder="Full Name" name="pname" value="<?php echo $email; ?>" size="30" required> 
							</div>
									<div class="col-md-6">

						<label>Customer Phone</label>

							<input type="text" class="form-control" placeholder="Full Name" name="pname" value="<?php echo $mob1; ?>" size="30" required> 
							</div>
																	
																	<div class="clearfix"></div>
																		</div>
				
		<div class="form-group has-feedback"> 
											<div class="col-md-6">

						<label>City</label>
										<input type="text" class="form-control" pattern="[0-9]+" value="<?php echo $city; ?>" name="price" size="30" required> 


						</div>
						<div class="col-md-6">

						<label>State</label>
										<input type="text" class="form-control" pattern="[0-9]+" value="<?php echo $state; ?>" name="price" size="30" required> 


						</div>
																	<div class="clearfix"></div>
																		</div>				

																		
																		
	<div class="form-group has-feedback"> 
											<div class="col-md-6">

						<label>Pincode</label>
										<input type="text" class="form-control" pattern="[0-9]+" value="<?php echo $pin; ?>" name="price" size="30" required> 


						</div>
						<div class="col-md-6">

						<label>Country</label>
										<input type="text" class="form-control" pattern="[0-9]+" value="<?php echo $country; ?>" name="price" size="30" required> 


						</div>
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
		
				</div></div>
			</div></div>
		
		<!--footer-->
		<?php 
		
		include('footer.php');
		?>