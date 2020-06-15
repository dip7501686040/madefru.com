<?php
ob_start();
session_start();
include('database.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Madefru Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="AesirShopping" />
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
				<h3 class="title1">SignIn Page</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Welcome back to Madfru AdminPanel ! <br></h4>
					</div>
					<div class="login-body">
						<form method="post" data-toggle="validator">
											<div class="form-group has-feedback">
											<input type="email" class="form-control" id="inputEmail" name="em" placeholder="Enter Your Email" data-error="Bruh, that email address is invalid" required>
											<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										</div>
							<div class="form-group">
											<input type="password" data-toggle="validator" name="pwd" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
										</div>
							<div class="bottom">
											<div class="form-group">
												<input type="submit" class="btn btn-primary" value="Login" name="sub">
											</div>
										</div>
							<div class="forgot-grid">
								<div class="forgot">
								 
								</div>
								<div class="clearfix"> </div>
							</div>
						
						
						
						</form>
					</div>
				</div>
				
<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$username = filter_var($_POST["em"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["pwd"], FILTER_SANITIZE_STRING);
$myusername = mysqli_real_escape_string($con,$username);
$mypassword = mysqli_real_escape_string($con, $password);

if(isset($_POST['sub']))
{ 
$sql="SELECT * FROM admin WHERE email='$myusername' and password='$mypassword'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
//$active=$row['active'];
$usr=$row['username'];
$count=mysqli_num_rows($result);
 
 

if($count==1)
{
$_SESSION['usrname']=$usr;
$_SESSION['login_user']=$myusername;
echo $usr;
echo $myusername;
header("location:dashboard.php");
}
else
{
echo"<script>alert('Please Give Your Proper Email And password')</script>";
}
}
}
mysqli_close($con);
?>			
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2020 Madefru Admin Panel. All Rights Reserved | Designed & Developed by <a href="" target="_blank">Dipankar Saha</a></p>
		</div>
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