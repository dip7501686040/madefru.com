<?php
include('header.php');
?>
<script>
    $(document).ready(function() {
        $("#register-form").on('submit', function(e) {
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var phone = $("#phone").val();
            var email = $("#email").val();
            var pass = $("#pass").val();
            var rpass = $("#rpass").val();
            e.preventDefault();
            if (pass != rpass) {
                $("#same-pass").css("display", "block");
            } else {
                $.get("register-validation.php", {
                    "fname": fname,
                    "lname": lname,
                    "phone": phone,
                    "email": email,
                    "pass": pass
                }, function($data) {
                    if ($data == '1') {
                        $("#phone-exist").css("display", "block");
                    } else if ($data == '2') {
                        $("#email-exist").css("display", "block");
                    } else if ($data == '3') {
                        location.href = "dashboard.php";
                    } else if ($data == '4') {
                        $("#query-erorr").css("display", "block");
                    }
                });
            }

        });
    });
</script>
<?php
if (isset($_SESSION['seller_id'])) {
?>
    <script>
        $(document).ready(function() {
            if (window.matchMedia('(min-width:320px) and (max-width: 480px)').matches) {
                $("#open-shop").css("top", "80px");
                $(".feature-section1").css("top", "80px");
                $("#seller-content").css("top", "80px");
                $(".index-footer").css("top", "130px");
            } else {
                $("#open-shop").css("top", "80px");
                $(".feature-section1").css("top", "80px");
                $("#seller-content").css("top", "80px");
                $(".index-footer").css("top", "130px");
            }
        });
    </script>
<?php
}
?>
<div id="open-shop">
    <div class="banner">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../images/gestion-tienda-fisica-y-online.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../images/seller.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../images/Seller5.png" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../images/Seller3.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../images/Seller4.png" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../images/seller6.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../images/seller7.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <span class="text">
        <h3>Start your online handicraft shop today</h3>
        <br>
        <h5>Give a platform to your handicraft skills by listing your products on Madefru.</h5>
        <br>
        <h4>Register as a Artist -></h4>
    </span>
    <span class="register">
        <form id="register-form" action="" method="POST">
            <p id="query-erorr">Sorry query error can't create account</p>
            <input id="fname" type="text" placeholder="FIRST NAME" required>
            <input id="lname" type="text" placeholder="LAST NAME" required>
            <input id="phone" type="text" placeholder="PHONE NO." pattern="[0-9]{10}" oninvalid="this.setCustomValidity('Enter only your 10 digit phone no.')" oninput="this.setCustomValidity('')" maxlength="10" required>
            <p id="phone-exist">Phone number already exist please Login</p>
            <input id="email" type="email" placeholder="EMAIL" required>
            <p id="email-exist">Email already exist please Login</p>
            <input id="pass" type="password" placeholder="PASSWORD" minlength="8" oninvalid="this.setCustomValidity('Enter minimum 8 character')" oninput="this.setCustomValidity('')" required>
            <input id="rpass" type="password" placeholder="RETYPE PASSWORD" minlength="8" oninvalid="this.setCustomValidity('Enter minimum 8 character')" oninput="this.setCustomValidity('')" required>
            <p id="same-pass">Enter same password</p>
            <input id="seller-register" type="submit" value="Register">
        </form>
    </span>
</div>

<!-- feature box -->
<div class="feature-section1">
    <div class="containr">
        <div class="features-inner">

            <div class="features-box">
                <div class="icon">
                    <img src="../images/download.png" alt="">
                </div>
                <h1>Ship Your Order Easily</h1>
            </div>

            <div class="features-box">
                <div class="icon">
                    <img src="../images/payment.png" alt="">
                </div>
                <h1> Fast & Secure Payment</h1>
            </div>

            <div class="features-box">
                <div class="icon">
                    <img src="../images/support.jpg" alt="">
                </div>
                <h1>24*7 Support</h1>
            </div>

            <div class="features-box">
                <div class="icon">
                    <img src="../images/india.jpg" alt="">
                </div>
                <h1>Made in Inadia</h1>
            </div>

        </div>

    </div>

</div>
<!-- //feature box -->
<div id="seller-content">
    <div class="why-sell-section">
        <img src="../images/pic.jpg" alt="">
        <div class="inner-container">
            <h1>Why Sell On Madefru</h1>
            <p class="text">
                Madefru is a online buyer and seller community,it focuses on
                hand-crafted products. If you are a artist or artisan or simply a
                handmade product maker then you can sell your item here instead of
                building a website and all other expenses. Madefru is a fully free
                alternative. we are an ecosystem between the creator and customer.
                Before internet artist sell their product in person at fair or open
                market and many of them still do business that way but Madefru give
                them an opportunity to sell their products beyond their local area and
                to a huge customer base without the hassle of setting up their own
                website or e-commerce platform. Every creator can set up a online shop
                on MF with fully e-commerce capabilities. It is fully free,fast,easy
                and of course made for you.
            </p>
        </div>
    </div>
    <div id="how-to-sell">
        <div class="feature-section">
            <div class="containr">
                <div class="head pb-4">
                    <h1>HOW TO SELL ON MADEFRU</h1>
                </div>
                <div class="features-inner">

                    <div class="features-box">
                        <div class="icon">
                            <h1>1.</h1>
                            <img src="crieat.png" alt="">
                        </div>
                        <h1>Register with us & Create an Artist account</h1>
                    </div>

                    <div class="features-box">
                        <div class="icon">
                            <h1>2.</h1>
                            <img src="list.png" alt="">
                        </div>
                        <h1>List your Product & details</h1>
                    </div>

                    <div class="features-box">
                        <div class="icon">
                            <h1>3.</h1>
                            <img src="relax.png" alt="">
                        </div>
                        <h1>You relax now, We are responsible for selling your product</h1>
                    </div>

                </div>
                <div class="note pt-4">
                    <p>NOTE: Product Picture quality shoud be good, Details seen to well</p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="index-footer">
    <?php
    include('footer.php');
    ?>
</div>