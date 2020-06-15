<?php
include('header.php');
?>
 

		
		<div id="page-wrapper">
			<div class="main-page">
				<div class="row">
					<div id="col-md-6">
						
					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Brand Entry :</h4>
						</div>
						<div class="form-body">
							<form method="post" data-toggle="validator" enctype="multipart/form-data"> 
							<div class="form-group"> 
							
					<div class="col-md-12">
<div class="form-group">
					<label>Product Brand</label>
					
					<input type="text" class="form-control" placeholder="Product Brand" name="brand" size="30" required> 
</div>

					</div>
					<div class="col-md-6">
					
				<input type="submit" class="btn btn-info" name="sub" value="Submit">

					</div>
									
							<div class="clearfix"></div>

						</div> 
						
				
										
		<div class="form-group"> 
		<div class="col-md-12">
       </div>
			<div class="clearfix"></div>

				</div>

				
				
							</div>
					
					
				
													
				</form> 
				
<?php

if(isset($_POST['sub'])){
	 
$sq="insert into brand(id,brand) 
values(NULL,'".trim($_POST['brand'])."')";
$r=mysqli_query($con,$sq) or mysqli_error($con);
//echo $sq;
if($r==1){
echo "<script>sweetAlert('OK','Thank you for entering Brand','success');</script>";
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