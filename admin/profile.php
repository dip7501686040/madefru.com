<?php

ob_start();
session_start();
include('database.php');
include('header.php');
?>
	<script src="sweetalert-master/dist/sweetalert.min.js"></script>
    
<link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
<script>
function click1(){
	
	 if (window.confirm('Really want to delete the data'))
{
    window.location.href = "delete_category.php";
	return true;
}
else return false;	  
}

</script>
<?php
$sq="select * from admin order by id";
$r=mysqli_query($con,$sq);
while($row=mysqli_fetch_array($r)){
		$usr_n=$row['username'];
				$n=$row['name'];
				$phn=$row['phone'];

	$em=$row['email'];

	$pas=$row['password'];


	
}

?>
		<div id="page-wrapper">
			<div class="main-page">
			
<div class="col-md-12">
<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Profile</h3> 
			</div>
			<div class="panel-body">

			<form method="post" enctype="multipart/form-data" action=""  class="form-horizontal">
    <div class="form-group">

	<label class="control-label col-sm-2">Name</label><div class="col-sm-4">
                     <input type="text" class="form-control" name="na" value="<?php echo  $n;?>" />

    </div> <label class="control-label col-sm-2">Email</label>  
	<div class="col-sm-4">
                     <input type="text" class="form-control" name="fl_name" value="<?php echo  $name;?>"/>

	 
 </div>
    </div>
	   <div class="form-group">

	<label class="control-label col-sm-2">Username</label><div class="col-sm-4">
                     <input type="text" class="form-control" name="fl_name" value="<?php echo  $usr_n; ?>" />

    </div> <label class="control-label col-sm-2">Phone</label>  
	<div class="col-sm-4">
                     <input type="text" class="form-control" name="phn" value="<?php echo  $phn; ?>"/>

	 
 </div>
    </div>
	
		   <div class="form-group"><label class="control-label col-sm-2">Password</label>
<div class="col-sm-4">   
                     <input type="password" class="form-control" name="pas" value="<?php echo  $pas; ?>"/>

    </div> 
	<div class="col-sm-4">
                     <input type="submit"  class="btn btn-danger" name="sub" value="Edit" />

    </div> 
    </div>
</form>
<?php
if(isset($_POST['sub'])){
$sq="update admin set name='".trim($_POST['na'])."',phone='".trim($_POST['phn'])."',password='".trim($_POST['pas'])."',username='".trim($_POST['fl_name'])."' where email='".$name."'";
$r=mysqli_query($con,$sq);
if($r){
	
	echo "<script>
sweetAlert('OK','Profile has been Updated','success');
	window.location.href='profile.php';
	</script>";
	
	//header("location:profile.php");
	
}
}

?>

	</div></div>
			</div>
		</div></div>
		<!--footer-->
<?php

include('footer.php');
?>	
