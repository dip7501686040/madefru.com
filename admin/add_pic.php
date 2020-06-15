<link rel="stylesheet" href="css/datepicker.css">
<?php
ob_start();
session_start();
$code=$_REQUEST['id'];
$url=$_REQUEST['url'];
include 'database.php';

?>

   
            	<div class="panel" style="margin:0;">
		<div class="panel-heading">
			 <header class="panel-heading">
                      Add New Image
                        </header>
			</div>         
							
		<div class="panel-body">					
 <form method="post" enctype="multipart/form-data" action="add_pic_success.php"  class="form-horizontal">
				   <input type="hidden" name="id" value="<?php echo $code; ?>"  />
	  
	  
	   <div class="form-group">
            <label class="control-label col-sm-2">Add</label>  
	        <div class="col-sm-10"> 
                <input type="file" name="pimage" style="border:1px solid #ccc;"/>
            </div>				
        </div>
	  
 
<button type="submit" class="btn btn-success" name="sub">Add</button>
   <a href="edit_product_aesir.php?id=<?php echo $code; ?>" class="btn btn-danger">Close </a>                       
       

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