<?php

ob_start();
session_start();
include('database.php');
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
							<h4>Show Bill-><a href="today_bill.php">Back</a></h4>
						</div>
						<div class="form-body">
						<form method="post">
<?php  

$sq="select * from place_order where order_id='".$id."' order by id";
$r=mysqli_query($con,$sq);
while($row=mysqli_fetch_array($r)){
	
$pro_id=$row['order_id'];	
$cname=$row['user_id'];
$date=$row['date'];
$amt=$row['amount'];
$phone=$row['phon'];
$add=$row['address'];
$st=$row['status'];
$points=$row['points'];
$money=$row['redeem_money'];
$redeem=$row['redeem'];
$status=$row['status'];

	

}					
	
?>	<form method="post" data-toggle="validator" enctype="multipart/form-data" action="edit_product_success.php"> 
								<div class="form-group"> 
										
										<div class="col-md-12">

						<label>Order Id</label>
							<input type="text" class="form-control" placeholder="Full Name" name="order" value="<?php echo $pro_id; ?>" size="30" required> 
	</div>
																	
																	<div class="clearfix"></div>
																		</div>	
							<div class="form-group"> 
										
										<div class="col-md-6">

						<label>Customer Email</label>
														<input type="hidden" class="form-control" value="<?php echo $pro_id; ?>" name="id" size="30" /> 

							<input type="text" class="form-control" placeholder="Full Name" name="pname" value="<?php echo $cname; ?>" size="30" required> 
							</div>
									<div class="col-md-6">

						<label>Customer Phone</label>

							<input type="text" class="form-control" placeholder="Full Name" name="pname" value="<?php echo $phone; ?>" size="30" required> 
							</div>
																	
																	<div class="clearfix"></div>
																		</div>
				
		<div class="form-group has-feedback"> 
											<div class="col-md-6">

						<label>Order Amount</label>
										<input type="text" class="form-control" pattern="[0-9]+" value="<?php echo $amt; ?>" name="price" size="30" required> 


						</div>
						<div class="col-md-6">

						<label>Update Status</label>
						<?php
      $options = array("placed","pending","paid");
 ?>
 <select  class="form-control" name="status" required>
     <?php foreach ($options as $option): ?>
         <option value="<?php echo $option; ?>"<?php if ($status == $option): ?> selected="selected"<?php endif; ?>>
             <?php echo $option; ?>
         </option>
     <?php endforeach; ?>
 </select>
						</div>
																	<div class="clearfix"></div>
																		</div>				

																		
																		
							<div class="form-group"> 						<div class="col-md-12">

												<label>Description</label>
																	
<textarea class="form-control" name="desc" required><?php echo $add; ?></textarea>	</div>
																	<div class="clearfix"></div>
																		</div>
			<div class="form-group">
				
			
            
			  <div class="col-md-2"><h4>Product</h4></div>
       <div class="col-md-3"><h4>Des</h4></div>
	   <div class="col-md-1"><h4>Qty</h4></div>
	   <div class="col-md-2"><h4>Unit</h4></div>
	   <div class="col-md-2"><h4>Price</h4></div>
<div class="col-md-2"><h4>Total</h4></div>
<div class="clearfix"></div>	
<hr>
             <?php 
			 
			 $s="select * from bill where order_id='".$pro_id."' order by order_id";
   $r1=mysqli_query($con,$s);
$qt1=0;
	while($row1=mysqli_fetch_array($r1)){
	
	$p=$row1['product_id'];;
	
	
		?>
	 
		   <?php $s1="select picture from product where product_id='".$p."' order by id";
   $r11=mysqli_query($con,$s1);
	while($row11=mysqli_fetch_array($r11)){
	
			$total=intval($row1['quantity']*$row1['price']);

	
		?>

	 <div class="col-md-2"><?php echo "<img src='../product_img/".$row11['picture']."' class='img-responsive' />"; ?></div>
       <div class="col-md-3"><?php echo $row1['product_name']; ?></div>
	   <div class="col-md-1"><?php echo $row1['quantity']; ?></div>
	   <div class="col-md-2"><?php echo $row1['type']; ?></div>
	   <div class="col-md-2"><?php echo $row1['price']; ?></div>
<div class="col-md-2"><?php echo $total; ?></div>	

<?php
	}?>
			<div class="clearfix"></div> 
			
			<hr>
           
         
          
          	<?php }?>
			
		
		
			 <div class="col-md-10">Total</div>
		  <div class="col-md-2">Rs.<?php echo $amt; ?></div>
		<?php 

if($redeem!=""){
	$bal=$amt-$money;
	
?>
 <div class="col-md-10">Point Balance Discount</div>
<div class="col-md-2">Rs.<?php echo $money; ?></div>
			<div class="clearfix"></div> 

<hr>
<div class="col-md-10">Balance</div>
<div class="col-md-2">Rs.<?php echo $bal; ?></div>

<?php
}
?>
			<div class="clearfix"></div> 
<hr>
<div class="col-md-12">		</div>


  
		  <div class="clearfix"></div> 
		  <br>
			</div>
		<div class="form-group"> 
																		<div class="col-md-6">

							
				<input type="submit" class="btn btn-info" name="sub" value="Update">
				</div>
																<div class="clearfix"></div>

				</div>
</form>
					
		<?php
if(isset($_POST['sub'])){
	$st=mysqli_real_escape_string($con,$_POST['status']);
$sq="update place_order set status='".$st."' where order_id='".$_POST['order']."'";
$r=mysqli_query($con,$sq);
						if($r!=0)
						{
						
						echo "<script> sweetAlert('ok', 'Bill Updated', 'success');</script>";
						echo"<script>window.location.href='today_bill.php';</script>";
						}	
	
}
		

?>		
							</div>
					
					
				
													
				
		
				
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