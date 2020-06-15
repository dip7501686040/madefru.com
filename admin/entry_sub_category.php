<?php

include('header.php');
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
					<div id="col-md-6">
						
					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>New Category Entry :</h4>
						</div>
						<div class="form-body">
							<form method="post" data-toggle="validator" enctype="multipart/form-data"> 
							
					<div class="form-group">		
					<div class="col-md-6">
 
				<label>Product Category</label>
				<select class="form-control1" name="category">
                <option value="select">select</option>
	<?php
					$s="select * from category";
					$s1=mysqli_query($con,$s);
					while($row=mysqli_fetch_array($s1)){
						echo "<option value='".$row['category']."'>".$row['category']."</option>";
						
					}
					?>
					</select>			

					</div>
					<div class="col-md-6">

					<label>Product Sub Category</label>
					
					<input type="text" class="form-control" placeholder="Product sub Category" name="sub_cate" size="30" required> 
				
					</div>
	
							<div class="clearfix"></div>
                         </div>
						 
						
				
										
		<div class="form-group"> 
			<div class="col-md-12">
<input type="submit" class="btn btn-info" name="sub" value="Submit">

							
				</div>
		<div class="clearfix"></div>

				</div>
								
				</form> 
                </div>
				
<?php

if(isset($_POST['sub'])){
	$category=$_POST['category'];
	$subcategory=$_POST['sub_cate'];
	$query="insert into subcategory(category,subcategory) values('$category','$subcategory')";
	if(mysqli_query($con,$query)){
		echo "<script>sweetAlert('OK','Thank you for entering sub-category','success');</script>";
	}
	else{
				
		echo "<script>sweetAlert('query error');</script>";	
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