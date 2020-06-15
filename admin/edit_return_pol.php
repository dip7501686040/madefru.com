<?php
include('header.php');
$id=1; 

$s="select * from return_pol where id='".$id."' " ;
$r=mysqli_query($con,$s);
while($row = mysqli_fetch_array($r)){
$pro_id=$row['id'];
$title=$row['title'];
$content=$row['des'];
 
}
?>	

		
<div id="page-wrapper">
<div class="main-page">
<div class="row">
<div id="col-md-6">


<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
<div class="form-title">
<h4>Update Return Policy:</h4>
</div>
<div class="form-body">
<form method="post" data-toggle="validator" enctype="multipart/form-data"> 
<div class="form-group"> 

<div class="col-md-6">
<div class="form-group">
<label>Title</label>

<input type="text" class="form-control" value="<?=$title;?>" name="title" size="30" > 
</div>
</div>

 
<div class="clearfix"></div>
<div class="col-md-12">
    <textarea class="form-control"  name="des" ><?php echo $content; ?></textarea> 

    </div>
    
<div class="clearfix"></div>

<div class="col-md-6">
<input type="submit" class="btn btn-info" name="sub" value="Submit">
</div>

</div>  
</div>
</form> 
					
<?php

if(isset($_POST['sub'])){
$today=date("Y-m-d");
$title=mysqli_real_escape_string($con,$_POST['title']);
$des=mysqli_real_escape_string($con,$_POST['des']);
 
$up2 ="UPDATE return_pol SET title='".$title."',des='".$des."'  WHERE id=".$id." ";

$r2=mysqli_query($con,$up2);
 
if($r2){
 echo "<script>alert('Thank you for Updating Return page');window.location.href='".$_SERVER['REQUEST_URI']."'</script>";
 }   
 
 



}

?>			
</div>
</div>				
</div>	
</div>	
</div>
</div>
		<!--footer-->
<?php

include('footer.php');
?>		