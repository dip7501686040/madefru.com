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
                <h1>Made in India</h1>
            </div>

        </div>

    </div>

</div>
<!-- //feature box -->
<div id="seller-content">
    <div class="what-is-section">
        <img src="../images/pic.jpg" alt="">
        <div class="inner-container">
            <h1>What is Madefru</h1>
            <p class="text">
                Madefru is an online social-commerce platform for buying and selling handicrafts and also you can share photos/videos of your work with everyone and if you want then teach anyone from here via online. We want to create a link between Creator and Customer so that the price of the product is reduced and the originality of the product is maintained. And Creator will get the right price for the thing he/she has made which is not available in the market due to the middle man and the customer will know the name of the creator, so there is a possibility that the creator's name will be known all over the world. This community unlike other online sites is not only limited to the customers who are checking out the products but also a great opportunity for artisans to demonstrate their skills and display their artwork to earn a living. This concept of showcasing the talent of the artisans is what makes it more special.
            </p>
        </div>
    </div>
    <div class="row who-can-why-sell-section">
        <div class="col-sm-5 who-can-section">
            <h3>Who can sell handicrafts on Madefru?</h3>
            <p>
                Madefru gives the hardworking artisans a leeway to showcase and sell something utterly useful. Any handmade item creator who creates a thing with great care and wants to share that product with everyone he/she can sell their product here. We should promote our handicrafts and buy them within us to help our economy to grow as a whole. This encourages individuality and creativity at its peak.
            </p>
        </div>
        <div class="col-sm-7 why-sell-section">
            <h3>Why sell on Madefru?</h3>
            <p>This is a platform that provides a noble prospect of selling products beyond the local area thus creating a huge customer base. Every creator can become a seller of their own hand made goods setting up their own online shop in Madefru with e-commerce facilities. You can see the work of more artists like you from where you can learn many new things. It is not at all difficult to upload items on this site and there is also no fear of being tech-savvy. It is a fully free service. We would like to request all the creators to come here and add their own products to benefit the customers so that the customer can buy a product directly from you, this will eliminate the chance of the product being duplicated. </p>
        </div>
    </div>
    <div id="how-to-sell">
        <div class="feature-section">
            <div class="containr">
                <div class="head pb-4">
                    <h3>HOW TO SELL ON MADEFRU</h3>
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
        <div class="how-sell-content">
            <h5>All you need to do is follow some simple steps.</h5>
            <ol class="steps">
                <li>
                    Register with us and create an account that is even easier than creating any social media account. This will help us to promote your products in no time after you upload your goods.
                </li>
                <li>
                    List your goods and give details such as size, shape, price, and other information that you want to include alongside your product.
                </li>
                <li>
                    Relax and the rest of the job is ours to sell your products.
                </li>
            </ol>
            <h5>Benefits</h5>
            <p class="benifits">
                • Easy to register as a seller&nbsp&nbsp
                • Availability of 24x7 support&nbsp&nbsp
                • Safe product delivery&nbsp&nbsp
                • Secure payment policies
            </p>
            <p class="conclusion">
                This is as easy as it looks so do not get all tensed up and trust us. We will become the bridge between your customer and you. Feel free to contact Madefru for further updates on starting your online handicraft shop for uploading your handcrafted goods. For all details and information call us on ________ any time as and when you may need us.
            </p>
            <h5>Corona Virus Update</h5>
            <p class="conclusion">
                Staff at Madefru is working under complete safety guidelines to prevent the spread of the coronavirus (COVID-19). Each and every employee arriving at your doorstep maintains a high standard of personal hygiene along with ensuring the use of face masks and sanitizers. Utmost care is taken to deliver the product to you free from germs. Your safety is our priority. We request you too to use face masks and sanitizers.
            </p>
        </div>
    </div>
</div>

<div class="index-footer">
    <?php
    include('footer.php');
    ?>
</div>