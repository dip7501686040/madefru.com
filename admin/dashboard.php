<?php
include('header.php');
?>

		<div id="page-wrapper">
			<div class="main-page">
			<div class="row">
			
			<?php 
			 $sql="select * from product ";
			 $run=mysqli_query($con,$sql);
			 if($run){
			 $rowcount= mysqli_num_rows($run);
			?>
					<div class="col-md-3 btn-primary">
					<div class="btn btn-primary" role="alert" style="margin:0;">
						<div class="alert_logo"><h1 class="glyphicon glyphicon-user"></h1></div> 
						<div class="alert_content"><strong><a href="all_product.php">Total  Product's( <?php echo  $rowcount; ?> )</a></strong></div>
					</div>
					<?php } ?>
					
		            </div>
		            
		            	<?php 
			 $sql2="select * from category ";
			 $run2=mysqli_query($con,$sql2);
			 if($run2){
			$categorycount= mysqli_num_rows($run2);
			?>
					<div class="col-md-3 btn-success">
					<div class="btn btn-success" role="alert" style="margin:0;">
						<div class="alert_logo"><h1 class="glyphicon glyphicon-book"></h1></div> 
						<div class="alert_content"><strong><a href="all_category.php">Total Category ( <?php echo  $categorycount; ?> )</a></strong></div>
					</div>
		            </div>	
		            <?php } ?>
		            
		      
              
              
              
              
              <?php 
			 $sql4="select * from blog ";
			 $run4=mysqli_query($con,$sql4);
			 if($run4){
			$usercoun4= mysqli_num_rows($run4);
			?>
	<div class="col-md-3 btn-info">
					<div  class="btn btn-info"  role="alert" style="margin:0;">
						<div class="alert_logo"><h1 class="glyphicon glyphicon-list"></h1></div> 
						<div class="alert_content"><strong><a href="client.php">Total Blog ( <?php echo  $usercoun4; ?> )</a></strong></div>
					</div>
		            </div>
              <?php } ?>
               
              
              
<?php 
			 $sql5="select * from user ";
			 $run5=mysqli_query($con,$sql5);
			 if($run5){
			$usercount5= mysqli_num_rows($run5);
			?>
	<div class="col-md-3 btn-danger">
					<div  class="btn btn-danger"  role="alert" style="margin:0;">
						<div class="alert_logo"><h1 class="glyphicon glyphicon-list"></h1></div> 
						<div class="alert_content"><strong><a href="client.php">Total User ( <?php echo  $usercount5; ?> )</a></strong></div>
					</div>
		            </div>
              <?php } ?>
              
              
					</div>						
			</div>
		</div>
		<!--footer-->
<?php

include('footer.php');
?>