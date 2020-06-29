<link rel="stylesheet" href="css/datepicker.css">
<?php
ob_start();
session_start();
$code=$_REQUEST['id'];
$url=$_REQUEST['url'];
include 'database.php';


$result = mysqli_query($con,"select * from product_img where id=".$code."");
				while($test=mysqli_fetch_array($result)){
				
		$img=$test['img'];
		$prod_id=$test['product_id'];

				}
?>

   
            	<div class="panel" style="margin:0;">
		<div class="panel-heading">
			 <header class="panel-heading">
                      Edit Pic
                        </header>
			</div>         
							
		<div class="panel-body">					
 <form method="post" enctype="multipart/form-data" action="edit_pic_success.php"  class="form-horizontal">
				   <input type="hidden" name="id" value="<?php echo $code; ?>"  />
			     <input type="hidden" name="pro_id" value="<?php echo $prod_id; ?>"  />



  <div class="form-group">
   <label class="control-label col-sm-2"> Image</label>  
	<div class="col-sm-10">

<img src="../images/<?php echo $img; ?>" width="200">
 </div>
	   </div>
	  
	  
	   <div class="form-group">
   <label class="control-label col-sm-2">Update</label>  
	<div class="col-sm-10"> 
	  
<input type="file"  name="file"  required />

	
   </div>				
 </div>
	  
 
<button type="submit" class="btn btn-success" name="sub">Update</button>
   <a href="edit_product_aesir.php?id=<?php echo $prod_id; ?>" class="btn btn-danger">Close </a>                       
       

</form>
</div>
	
   </div>
 


<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>     
   <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
             $(document).ready(function(){
       $("#date1").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });
       });
        </script>
	  </body></html>