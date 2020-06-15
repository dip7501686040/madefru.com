<?php
include('header.php');
?>


		
<div id="page-wrapper">
<div class="main-page">
<div class="row">
<div id="col-md-6">


<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
<div class="form-title">
<h4>Post Testimonial :</h4>
</div>
<div class="form-body">
<form method="post" data-toggle="validator" enctype="multipart/form-data"> 
<div class="form-group"> 

<div class="col-md-6">
<div class="form-group">
<label>Name</label>

<input type="text" class="form-control" placeholder="Name" name="name" size="30" > 
</div>
</div>

 
<div class="clearfix"></div>
<div class="col-md-12">
    <textarea class="form-control"  name="des" ></textarea> 

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


$_FILES['file'] ['name'];
$img1=$_FILES['file'] ['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$img1); 
$sq="insert into testimonail (title,des) values('".$_POST['name']."','".$_POST['des']."' )";
 
$r=mysqli_query($con,$sq) or mysqli_error($con);
if($r==1){
echo  "<script>alert('Success');window.location.href='testimonial.php';</script>";
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