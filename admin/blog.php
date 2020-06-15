<?php
include('header.php');
?>
<div id="page-wrapper">
<div class="main-page">
<div class="row">
<div id="col-md-6">

<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
<div class="form-title">
<h4>Post Blog:</h4>
</div>
<div class="form-body">
<form method="post" data-toggle="validator" enctype="multipart/form-data"> 
<div class="form-group"> 

<div class="col-md-6">
<div class="form-group">
<label>Title</label>

<input type="text" class="form-control" placeholder="Title" name="title" size="30" > 
</div>
</div>
<div class="clearfix"></div>
<div class="col-md-12">
<div class="form-group">
<label>Blog Content</label>

<textarea class="form-control"  name="des"  ></textarea> 
</div>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
<div class="form-group">
<label> Blog Image</label>

<input type="file" name="file">
</div>
</div>
<div class="clearfix"></div>
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
$des=mysqli_real_escape_string($con,$_POST['des']);

$_FILES['file'] ['name'];
$img1=$_FILES['file'] ['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$img1); 
$sq="insert into blog (title,des,img) values('".$_POST['title']."','".$des."','".$img1."')";
$r=mysqli_query($con,$sq) or mysqli_error($con);
if($r==1){
echo  "<script>alert('Success');window.location.href='blog.php';</script>";
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