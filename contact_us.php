<?php
include('header.php');
?>

<head>
    <link rel="stylesheet" href="css/contact_us.css?version=1.1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
</head>
<section id="contact_us">
    <div class="container1">
        <div class="contactinfo">
            <div>
                <h2>Contact Info</h2>
                <ul class="info">
                    <li>
                        <span><i class="fa fa-map-marker"></i></span>
                        <span>57/1 Dum Dum Road <br>
                            Madhugarh Road, Purbasanthi <br>
                            700030</span>
                    </li>
                    <li>
                        <span><i class="fa fa-envelope"></i></span>
                        <span>support@madefru.com</span>
                    </li>
                    <li>
                        <span><i class="fa fa-phone"></i></span>
                        <span>+91 9433205551</span>
                    </li>
                </ul>
            </div>
            <ul class="sci">
                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="contactForm">
            <h2>Send a Massage</h2>
            <div class="formBox">
                <div class="inputBox w50">
                    <input type="text" name="" required>
                    <span>First Name</span>
                </div>
                <div class="inputBox w50">
                    <input type="text" name="" required>
                    <span>Last Name</span>
                </div>
                <div class="inputBox w50">
                    <input type="text" name="" required>
                    <span>Email Address</span>
                </div>
                <div class="inputBox w50">
                    <input type="text" name="" required>
                    <span>Mobile Number</span>
                </div>
                <div class="inputBox w100">
                    <textarea name="" required></textarea>
                    <span>Write your message here....</span>
                </div>
                <div class="inputBox w100">
                    <input type="submit" value="Send">
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('footer.php');
?>