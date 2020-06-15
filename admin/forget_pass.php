<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

ob_start();

 include('database.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Novus Admin Panel an Admin Panel Category Flat Bootstrap Responsive Website Template | Login Page :: w3layouts</title>
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
				<h3 class="title1">Forget Password Page</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Welcome back to Annapurna Agency AdminPanel ! <br></h4>
					</div>
					<div class="login-body">
						<form method="post" data-toggle="validator">
											<div class="form-group has-feedback">
											<input type="email" class="form-control" id="inputEmail" name="em" placeholder="Enter Your Email" data-error="Bruh, that email address is invalid" required>
											<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
										</div>
						
							<div class="bottom">
											<div class="form-group">
												<input type="submit" class="btn btn-primary" value="Login" name="sub">
											</div>
										</div>
							<div class="forgot-grid">
								<div class="forgot">
									<a href="#">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						
						
						
						</form>
					</div>
				</div>
				
<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{

$myusername=$_POST['em'];
//$role=$_POST['role'];

if(isset($_POST['sub']))
{ 
$sql="SELECT * FROM admin WHERE email='$myusername'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$pass=$row['password'];
//$usr=$row['username'];
$count=mysqli_num_rows($result);
 
 

if($count==1)
{
echo "You got a email please check your mail for the password";


$email1="priya.pie27@gmail.com";


$email_subject = "Forget Password:";
$email_content1 = "<html><head>
	<style>
	body {

background-repeat: repeat-y no-repeat;

background-color:#ecc7af;

margin: 0;

padding: 0;

}
	h2{
	color:white;
	}
	.m{
	width:500px;
	border:1px dashed #1bc5b3;
	font-size:15px;
	
	 background-color: #A9F5F2;
	}
	th{
	background-color:#1bc5b3;}
	
	td{padding:10px;
color:#383838;
font-size:17px;
}
	
	</style>
	</head><body>
<table bgcolor='#16a086' width='100%' height='100px' background=''><tr><td width='70%'><h3>Welcome to ANNAPURNA AGENCY: ".$_SERVER['SERVER_NAME']."</h3></td><td width='20%'><img src='www.incrementertech.com/logo.png'></td></tr></table>
	<table bgcolor='#eee' width='100%' height='550px' cellspacing='1' cellpadding='1' background='www.incrementertech.com/email.jpg'><tr><td></td>
</tr>
<tr><td><p>Hi </p></td></tr><tr><td>".$email1."</td></tr>
	<tr><td><p>Thank you for contacting us Your password is:".$pass."</p></td></tr>
	

</table>
	</body></html>";

	
			
		$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
if(@mail($email1,$email_subject,$email_content1,$headers))
echo "sent";
else
echo "not";



}
}
else
{
echo"<script>alert('Please Give Your Proper Email')</script>";
}
}

mysqli_close($con);
?>			
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2016 Job Admin Panel. All Rights Reserved | Designed & Developed by <a href="https://incrementertech.com" target="_blank">Incrementer Technology Solutions Pvt Ltd</a></p>
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