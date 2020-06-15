<?php
ob_start();
include('database.php');
$mail_id=$_REQUEST['mail_id'];
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel</title>
<link rel="icon"  
      href="#" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->

		<!--left-fixed -navigation-->
		<!-- header-starts -->

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Forget Password</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h3>Welcome to....AdminPanel ! <br></h3>
					</div>
					<div class="login-body">
						<form method="post" data-toggle="validator">
										<div class="form-group has-feedback">
											<input type="email" class="form-control" id="inputEmail" name="em"  value="<?php echo $mail_id; ?>" placeholder="Enter Your Email" data-error="Bruh, that email address is invalid" readonly>
											<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										</div>
                                        	<div class="form-group">
											<input type="password" data-toggle="validator" name="pwd" data-minlength="6" class="form-control" id="inputPassword" placeholder="New Password" required>
										</div>
                                        <div class="form-group">
											<input type="password" data-toggle="validator" name="confirm_pass" data-minlength="6" class="form-control" id="inputPassword" placeholder="Confirm Password" required>
										</div>
							
							<div class="bottom">
											<div class="form-group">
												<input type="submit" class="btn btn-primary" value="Change Password" name="sub">
											</div>
										</div>
										
						</form>
					</div>
				</div>
				
<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{

//$role=$_POST['role'];

if(isset($_POST['sub']))
{ 
$sq="update admin set password='".$_POST['confirm_pass']."' where email='".$mail_id."'";
$r=mysqli_query($con,$sq);
 
 

if($r==1)
{
header('location:index.php');

}
else
{
echo"<script>alert('Please Give Your Proper Email Address')</script>";
}
}
}
mysqli_close($con);
?>			
			</div>
		</div>
		<!--footer-->
		<?php include('footer.php');?>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
   	<script src="js/validator.min.js"></script>

</body>
</html>