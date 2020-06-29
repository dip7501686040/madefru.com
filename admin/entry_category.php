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
							
					<div class="col-md-12">
<div class="form-group">
					<label>Product Category</label>
					
					<input type="text" class="form-control" placeholder="Product Category" name="cate" size="30" required
					<?php
						if(!empty($_REQUEST['category'])){
							echo "value='$_REQUEST[category]'";
						}
					?>> 
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
	$sq1="select * from category where category='".$_POST['cate']."'";
	$r1=mysqli_query($con,$sq1);
	if(mysqli_num_rows($r1)>0){
echo "<script>sweetAlert('Ooops','This category already exists','error');</script>";
		
	}else{
$sq="insert into category(category) 
values('".trim($_POST['cate'])."')";
$r=mysqli_query($con,$sq) or mysqli_error($con);
//echo $sq;
if($r==1){
echo "<script>sweetAlert('OK','Thank you for entering category','success');</script>";
}
else{
				
		echo "<script>sweetAlert('query error');</script>";	
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