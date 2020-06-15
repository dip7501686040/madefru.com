<?php
include('header.php');
$id=$_REQUEST['id'];
?>
 <div id="page-wrapper">
<div class="main-page">
<div class="row">
<div id="col-md-6">
 <?php

$s="select * from blog where id='".$id."' " ;
$r=mysqli_query($con,$s);
while($row = mysqli_fetch_array($r)){
$pro_id=$row['id'];
$title=$row['title'];
$content=$row['des'];
$img=$row['img'];
}
?>						
					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Edit Blog :</h4>
						</div>
						<div class="form-body">
							<form method="post" data-toggle="validator" enctype="multipart/form-data"> 
							<div class="form-group"> 
							
					<div class="col-md-12">
	
					<div class="form-group">
					
					<label>Blog Title</label>
					
					<input type="text" class="form-control" placeholder="Product Category" value="<?=$title;?>" name="title" size="30" required> 
					</div>
					
						
					<div class="form-group">
					<label>Blog Content</label>
					  <textarea placeholder="write Blog Content" name="content"><?php echo $content; ?> </textarea>

				
					</div>
				<div class="form-group">
					<label>Blog Image</label>		
				<img src="../images/<?php echo $img; ?>" width="100">  <br><br>
					<label>Update Image</label>
				<input type="file" name="file" placeholder="Change Image">

				
					</div >	
				
				
					</div>
					<div class="col-md-6">
					
				<input type="submit" class="btn btn-info" name="sub" value="Submit">

					</div>
									
							<div class="clearfix"></div>

						</div> 
						</div>
					
					</div>
													
				</form> 
				
<?php

if(isset($_POST['sub'])){
$today=date("Y-m-d");
$title=mysqli_real_escape_string($con,$_POST['title']);
$des=mysqli_real_escape_string($con,$_POST['content']);
 if($_FILES['file']['name'])
{
  $select=mysqli_query($con,"select img from blog where id='".$id."'");
$image=mysqli_fetch_array($select);
unlink("images/".$image['img']);
$img1=$today.$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"../images/".$img1);  
    
$up = "UPDATE blog SET title='".$title."',des='".$des."',img='".$img1."'  WHERE id='".$id."' " ;
$r1=mysqli_query($con,$up);
 
if($r){
 echo "<script>alert('Thank you for Updating Blog');window.location.href='".$_SERVER['REQUEST_URI']."'</script>";
 } 
}

else{
$up2 ="UPDATE blog SET title='".$title."',des='".$des."'  WHERE id=".$id." ";

$r2=mysqli_query($con,$up2);
 
if($r2){
 echo "<script>alert('Thank you for Updating Blog');window.location.href='".$_SERVER['REQUEST_URI']."'</script>";
 }   
}
 



}

?>				
 </div>		
</div>	
</div>	
</div>
</div>
			 
<?php
include('footer.php');
?>		