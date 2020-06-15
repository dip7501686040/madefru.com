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

$(document).ready(function() {
////////////
$('#category').change(function(){
//var st=$('#category option:selected').text();
var cat_id=$('#category').val();
$('#subcategory').empty(); //remove all existing options
$('#subcategory').append("<option value='select'>select</option>")
///////
$.get('get_subcategory.php',{'cat_id':cat_id},function(return_data){
	if(return_data.data.length>0){
		$('#msg').html( return_data.data.length + ' records Found');
$.each(return_data.data, function(key,value){
		$("#subcategory").append("<option value='" + value.subcategory+"'>"+value.subcategory+"</option>");
	});
	}else{
	$('#msg').html('No records Found');
}
}, "json");

///////
});
/////////////////////
});

</script>

	<div id="page-wrapper">
			<div class="main-page">
				<div class="row">
					<div id="col-md-6">
						
					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>New Sub Sub Category Entry :</h4>
						</div>
						<div class="form-body">
							<form method="post" data-toggle="validator" enctype="multipart/form-data"> 
							
					<div class="form-group">		
					<div class="col-md-6">
 
				<label>*Product Category</label>
				<select class="form-control1" name="category" id="category" required>
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
 
				<label>*Product Sub Category</label>
				<select class="form-control1" name="subcategory" id="subcategory" required>
                    <option value="select">select</option>
					</select>			

					</div>
						 <div class="form-group">
                         <div class="col-md-12">

					<label>*Product Sub Sub Category</label>
					
					<input type="text" class="form-control" placeholder="sub sub Category" name="subsubcate" size="35" required> 
				
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
	$subcategory=$_POST['subcategory'];
    $subsubcate=$_POST['subsubcate'];
	$query="insert into subsubcategory(category,subcategory,subsubcategory) values('$category','$subcategory','$subsubcate')";
	if(mysqli_query($con,$query)){
		echo "<script>sweetAlert('OK','Thank you for entering sub-sub-category','success');</script>";
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