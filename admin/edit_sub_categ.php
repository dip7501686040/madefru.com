<?php

ob_start();
session_start();
include('database.php');

$id=$_REQUEST['id'];
?>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery.bxslider.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
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
							<h4>Category -> <?php echo $id; ?></h4>
						</div>
						<div class="form-body">
							<table class="table" id='dataTable'>
							<thead>
								<tr>  
							
								  <th>Sub Category</th>
								<th>Delete</th>
								</tr>
							</thead>
							<tbody>

<?php  

$sq="select * from $id";
$r=mysqli_query($con,$sq);
while($row=mysqli_fetch_array($r)){
	
$id1=$row['ID'];
$scat=$row['sub_category'];

	echo "	<tr>
								
								    <td>".$scat."</td><td><a href='delete_subcat.php?table=".$id."&id=".$id1."' class='label label-danger'>Delete</a></td></tr>";	
	

	
}?>	

										</tbody></table>

				
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


	