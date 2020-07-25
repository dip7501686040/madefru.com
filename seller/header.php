<?php
    session_start();
    include("../dbcontroller.php");
    $db_handle=new DBController();
    if(isset($_SESSION['seller_id']) && !empty($_SESSION['seller_id'])){
        $seller_id=$_SESSION['seller_id'];
    }
    else{
        $seller_id='seller';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell on Madefru</title>
    <link rel="shortcut icon" href="../images/mf_logo6.png" type="image/x-icon">
    <link rel="icon" href="../images/mf_logo6.png" type="image/x-icon">
    <!-- css -->
    <link href="css/style.css?version=1.10" rel="stylesheet" type="text/css" media="all">
    <!--//css-->
    <!--bootstrap,jquery and proper.js-->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css" type="text/css">
    <link rel="stylesheet" href="css/slide-and-swipe-menu.css" type="text/css">
    <script src="js/jquery-3.5.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
    <script src="js/jquery.slideandswipe.js"></script>
    <!--//-->
    <!--fontawsome cdn-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js" 
    integrity="sha256-EhSd26A4BBY7cx1qenrGNmgTke2gzkGS0HDPmLVVQ6w=" crossorigin="anonymous"></script>
    <!--//fontawsome cdn-->
    <!--google fonts-->

    <!--//google fonts-->
    <!-- datatable -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- // datatable -->
</head>
<body>
<script>
    $(document).ready(function(){
        $("#login-form").on('submit', function(e){
            var email_or_phone = $.trim($("#login-email-or-phone").val());
            var password = $.trim($("#login-password").val());
            e.preventDefault();
            $.get("login-validation.php",{"email_or_phone": email_or_phone,"password": password}, function($data){
                if($data=='1'){
                    $("#sellerlogin-modal .modal-body p").css("display","none");
                    window.location.href="dashboard.php";
                }
                else if($data=='2'){
                    $("#incorrect-pass").css("display","block");
                }
                else if($data=='3'){
                   $("#acc-not-exist").css("display","block"); 
                }
            });
        });
	    $('#product-list').DataTable();
    });
</script>
<!-- header -->
    <header>
        <div class="container-fluid">
            <a href="index.php" id="logo"><img src="../images/madefru sell logo2.jpg" alt=""></a>
            <?php
                if(isset($_SESSION['seller_id'])){
                    ?>
                    <button id="sellerlogin" class="btn" type="button" data-toggle="modal" data-target="#sellerlogout-modal">
                        <?php
                            $query="select seller_id from seller where seller_id='$_SESSION[seller_id]'";
                            $result=$db_handle->runQuery($query);
                            $data=$result->fetch_assoc(); 
                            echo "Artist ID- $data[seller_id]";
                        ?>
                    </button>
                    <div class="modal fade" id="sellerlogout-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Log Out</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body pl-5">
                                    <h3>Thank You</h3>
                                    <a id="logout" href="logout.php" class="btn">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <button id="sellerlogin" class="btn" type="button" data-toggle="modal" data-target="#sellerlogin-modal">
                        Login for existing Artist
                    </button>
                    <div class="modal fade" id="sellerlogin-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Log In</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="login-form" action="" method="post">
                                        <input id="login-email-or-phone" type="text" placeholder="EMAIL OR 10 DIGIT PHONE NO." 
                                        name="phone_or_email" required>
                                        <p id="acc-not-exist">Email or Phone dose'nt exist please Register</p>
                                        <input id="login-password" type="password" placeholder="PASSWORD" name="password" required>
                                        <p id="incorrect-pass">Incorrect Password</p>
                                        <input type="submit" name="seller-login" value="Log In">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php
                }
            ?>
        </div>
        <?php
        if(isset($_SESSION['seller_id'])){
        ?>
        <div id="navbar">
            <ul>
                <li>
                    
                    <!-- Example split danger button -->
                    <div class="btn-group">
                    <a href="dashboard.php"><i class="fas fa-home"></i>&nbspDashboard</a>
                    <a class="dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" 
                    aria-expanded="false" href="#" role="button">
                    </a>
                    <div class="dropdown-menu dashboard-menu">
                        <a class="dropdown-item" href="#">Stock Records</a>
                        <a class="dropdown-item" href="#">Selling Records</a>
                        <a class="dropdown-item" href="#">Customer Orders</a>
                        <a class="dropdown-item" href="#">On Demand</a>
                        <a class="dropdown-item" href="#">Payment Records</a>
                        <a class="dropdown-item" href="#">Reviews & Ratings</a>
                    </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown show">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-clipboard-list"></i>&nbspProduct Management
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="seller-all-products.php">All products</a>
                            <a class="dropdown-item" href="seller-list-product.php">List your product</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="../seller-shop.php?seller_id=<?php echo $_SESSION['seller_id']; ?>"><i class="fas fa-store"></i>&nbspYour Shop</a>
                </li>
            </ul>
        </div>
        <?php
        }
        ?>
    </header>