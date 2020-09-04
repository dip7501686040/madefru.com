<?php
session_start(); 
include('dbcontroller.php');
$db_handle=new DBController();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    $user_id= $_SESSION['user_id'];
	$user_fname= $_SESSION['user_fname'];
	$user_phone=$_SESSION['phone'];
	$user_email=$_SESSION['email'];
}
else {
    $user_id='USER';$user_fname='Signin';
}

if(isset($_POST['add-to-cart'])){
    if(isset($_POST['size'])){
            $size=$_POST['size'];
            }
            else{
                $size='None';
            }

	if(isset($_SESSION['cart'])){
	    $item_array_id=array_column($_SESSION['cart'],"product_id");
	    if(in_array($_POST['product_id'],$item_array_id)){
            echo "<script>alert('product is already added')</script>";
			echo "<script>window.location='cart.php'</script>";
		}
		else{
           $count=count($_SESSION['cart']);
           $item_array=array(
			'product_id'=>$_POST['product_id'],
            'quantity'=>$_POST['quantity'],
            'size'=>$size,
		);
		$_SESSION['cart'][$count]=$item_array;
		}
	
	}
	else{
		$item_array=array(
			'product_id'=>$_POST['product_id'],
            'quantity'=>$_POST['quantity'],
            'size'=>$size,
		);
		$_SESSION['cart'][0]=$item_array;
		
	}
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madefru</title>
    <link rel="shortcut icon" href="images/mf_logo6.png" type="image/x-icon">
    <link rel="icon" href="images/mf_logo6.png" type="image/x-icon">
    <!-- css -->
    <link href="css/style.css?version=1.19" rel="stylesheet" type="text/css" media="all">
    <!--//css-->
    <!--bootstrap,jquery and proper.js-->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css" type="text/css">
    <link rel="stylesheet" href="css/slide-and-swipe-menu.css" type="text/css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">

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
    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <!--//-->
    <!--fontawsome cdn-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js" 
    integrity="sha256-EhSd26A4BBY7cx1qenrGNmgTke2gzkGS0HDPmLVVQ6w=" crossorigin="anonymous"></script>
    <!--//fontawsome cdn-->
    <!--google fonts-->

    <!--//google fonts-->
</head>
<body>
<script>
$(document).ready(function(){ 
{/* live search */}   
$("#search").keyup(function(){
    $("#searchlist").html('');
    $search = $(this).val();
    if($search.length>0){
        $.get("livesearch_result.php",{"search":$search},function($data){
            $("#searchlist").append('<li class="text-right"><span id="searchlist-close" class="fas fa-times"></span></li>');
            $("#searchlist").append('<li class="list-group-item">'+$data+'</li>');
            $("#searchlist").css("display","block");
        })
    }
    else{
        $("#searchlist").css("display","none");
    }
});

$("#search").focusout(function(){
    $("#searchlist").css("display","none");
});
$("#searchlist-close").on("click", function(){
    $("#searchlist").css("display","none");
});
{/* //live search $category=$("#nav-category").html();
        $.get("navbar_span.php",{"category":$category},function($data){
        $(".item_span").html($data);
    });*/}
{/* navbar */}                                                                        
$('.desktop-nav li').hover(function() {
    $('.desktop-nav ul li ul').stop().slideDown(300);
  },
  function() {
    $('.desktop-nav ul li ul').stop().slideUp(200);
  }
);
$(".nav-category a").hover(function(){
    $category=$(this).text();
        $.get("navbar_span.php",{"category":$category},function($data){
        $(".item_span").html($data);
    });
});
{/* //navbar */}
$('nav').slideAndSwipe();
});
</script>
    <!-- fix header -->
<div id="container">
    <div class="ssm-overlay ssm-toggle-nav"></div>
    <header>
        <nav id="#mobile-side-nav">
            <ul>
                <?php
                    $query="select * from category";
                    $result=$db_handle->runQuery($query);
                    while($row=$result->fetch_assoc()){
                    ?>
                <li class="category">
                    <a href="client-shop.php?category=<?php echo "$row[category]";?>" class="mobile-product-category"><?php echo "$row[category]";?></a>
                    <ul>
                        <?php
                        $query1="select * from subcategory where category='$row[category]'";
                        $result1=$db_handle->runQuery($query1);
                        while($row1=$result1->fetch_assoc()){
                        ?>
                        <li>
                            <a href="client-shop.php?subcategory=<?php echo "$row1[subcategory]";?>" class="mobile-product-subcategory"><?php echo "$row1[subcategory]";?></a>
                            <ul>
                                <?php
                                $query2="select * from subsubcategory where subcategory='$row1[subcategory]'";
                                $result2=$db_handle->runQuery($query2);
                                while($row2=$result2->fetch_assoc()){
                                ?>
                                <li class="subsubcategory">
                                    <a href="client-shop.php?subsubcategory=<?php echo "$row2[subsubcategory]";?>" class="mobile-product-subsubcategory"><?php echo "$row2[subsubcategory]";?></a>
                                <div class="clearfix"></div>                                    
                                </li>
                                <?php }?>
                            </ul>
                            <div class="clearfix"></div>
                        </li>
                        <?php }?>
                    </ul>
                    <div class="clearfix"></div>   
                </li>
                <?php }?>
            </ul>
            <div class="clearfix"></div>
        </nav>
        <main>
            <a class="ssm-toggle-nav" href="#" title="Open / close">
                <div></div>
                <div></div>
                <div></div>
            </a>
        </main>
        <div class="row">
        <!-- logo -->
            <div class="col">
                <div class="logo">
                    <a href="index.php"><img src="images/madefru__logo.jpg" alt=""></a>
                    <div class="clearfix"></div>
                </div>
            </div>
        <!-- //logo -->
        <!-- search -->
        
            <div class="col">
                <div class="row">
                    <div class="col-md-9">
                        <div class="search">
                            <input id="search" type="search" name="search-input" placeholder="search for a product...." 
                            required autocomplete="off">
                        </div>
                        <ul id="searchlist" class="list-group"></ul>
                    </div>
                    <div class="col-md-3">
                        <div class="search">
                            <button type="submit" class="btn btn-dark" name="search-button">
                                <div class="search-icon">
                                    <i class="fas fa-search" aria-hidden="true"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        <!-- //search -->
        <!-- about us -->
            <div class="col header_about_us">
                <a href="about-us.php" class="btn btn-dark">AboutUs</a>
            </div>
        <!-- //about us -->

        <!-- login-signup -->
            <div class="col">
                <div class="login-signup">
                    <a href="<?php if(isset($_SESSION['user_id'])){echo 'user_account.php';}else{echo 'signup.php';}?>" 
                    class="btn btn-dark"><?php echo $user_fname;?></a>
                </div>
            </div>
            <!-- //login-signup -->
            <!-- cart -->
            <div class="col">
            <div class="cart">
                <?php
                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                    $count=count($_SESSION['cart']);
                    ?>
            <a class="btn btn-dark" href="cart.php" role="button">
                <div class="cart-icon">
                        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <span><div class="value"><?php echo $count; ?></div></span>
                </a>
                <?php }
                else{
                ?>
                <a class="btn btn-dark" href="empty_cart.php" role="button">
                <div class="cart-icon">
                        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <span><div class="value">0</div></span>
                </a>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
            </div>
            <!-- //cart -->
            <!-- wishlist -->
            <div class="col">
            <div class="wishlist">
                <a class="btn btn-dark" href="" role="button">
                    <div class="wishlist-icon">
                        <i class="fas fa-heart" aria-hidden="true"></i>
                    </div>
                    <span><div class="value">0</div></span>
                </a>
                <div class="clearfix"></div>
            </div>
            </div>
        <!-- //wishlist -->
            <div class="col">
                <div id="sell-on-madefru">
                    <a class="btn btn-dark" href="seller/index.php" role="button">
                        <div class="sell-on-madefru-icon">
                            <i class="fas fa-store" aria-hidden="true"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
         <!-- navbar -->
        <div class="desktop-nav">
            <div class="container">
                <ul>
                    <?php
                        $query="select * from category";
                        $result=$db_handle->runQuery($query);
                        while($row=$result->fetch_assoc()){
                        ?>
                    <li class="nav-category">
                        <a href="client-shop.php?category=<?php echo "$row[category]";?>"><?php echo "$row[category]";?></a>   
                    </li>
                    <?php }?>
                    <li>
                        <ul>
                            <li><span class="item_span"></span></li>
                        </ul>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //navbar -->
    </header>
    <!-- //fix header -->