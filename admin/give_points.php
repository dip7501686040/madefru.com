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
							<h4>Give Points</h4>
						</div>
						<div class="form-body">
<?php  

$sq="select * from user inner join points on user.user_id = points.user_id where user.user_id='".$id."' order by user.id desc";
$r=mysqli_query($con,$sq);
while($row=mysqli_fetch_array($r)){
	//$status=$row['status'];
$user_id=$row['user_id'];	
$n=$row['name'];	
$point=$row['points'];	
$money=$row['total'];	

}	
	
?>	<form method="post" data-toggle="validator" enctype="multipart/form-data" action="give_point_success.php"> 
								<div class="form-group"> 
										
																	
																	<div class="clearfix"></div>
																		</div>	
							<div class="form-group"> 
										
										<div class="col-md-12">

						<label>Name</label>
														<input type="hidden" class="form-control" value="<?php echo $user_id; ?>" name="id" size="30" /> 

							<input type="text" class="form-control" placeholder="Full Name" name="na" value="<?php echo $n; ?>" size="30" readonly > 
							</div>
																	
																	<div class="clearfix"></div>
																		</div>
				
				<div class="form-group"> 
										
										<div class="col-md-6">

						<label>Points</label>

							<input type="text" class="form-control" placeholder="Full Name" name="p" value="<?php echo $point; ?>" size="30" readonly > 
							</div>
							<div class="col-md-6">

						<label>Money</label>

							<input type="text" class="form-control" placeholder="Full Name" name="m" value="<?php echo $money; ?>" size="30" readonly > 
							</div>
												
																	
																	<div class="clearfix"></div>
																		</div>
					<div class="form-group"> 
<div class="col-md-12">

						<label>Give Points</label>

							<input type="text" class="form-control" placeholder="Give Points" name="points" value="" size="30" > 
																								<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
	</div>
		
		<div class="form-group"> 
																		<div class="col-md-12">

							
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


	