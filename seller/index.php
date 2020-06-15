<?php
include('header.php');
?>
<script>
    $(document).ready(function(){
        $("#register-form").on('submit',function(e){
            var fname=$("#fname").val();
            var lname=$("#lname").val();
            var phone=$("#phone").val();
            var email=$("#email").val();
            var pass=$("#pass").val();
            var rpass=$("#rpass").val();
            e.preventDefault();
            if(pass!=rpass){
                $("#same-pass").css("display","block");
            }
            else{
                $.get("register-validation.php",{"fname":fname,"lname":lname,"phone":phone,"email":email,"pass":pass}, function($data){
                    if($data=='1'){
                        $("#phone-exist").css("display","block");
                    }
                    else if($data=='2'){
                        $("#email-exist").css("display","block");
                    }
                    else if($data=='3'){
                        window.location.href="dashboard.php";
                    }
                    else if($data=='4'){
                        $("#query-erorr").css("display","block");
                    }
                });
            }

        });
    });
</script>
<?php
    if(isset($_SESSION['seller_id'])){
        ?>
        <script>
            $(document).ready(function(){
                $("#open-shop").css("top","80px");
                $("#seller-content").css("top","80px");
                $(".index-footer").css("top","130px");
            });
        </script>
        <?php
    }
?>
<div id="open-shop">
    <img src="../images/gestion-tienda-fisica-y-online.jpg" alt="">
    <span class="text">
        <h3>Start your online handicraft shop today</h3>
        <br>
        <h5>Give a platform to your handicraft skills by listing your products on Madefru.</h5>
        <br>
        <h4>Register as a seller -></h4>
    </span>
    <span class="register">
        <form id="register-form" action="" method="POST">
            <p id="query-erorr">Sorry query error can't create account</p>
            <input id="fname" type="text" placeholder="FIRST NAME" required>
            <input id="lname" type="text" placeholder="LAST NAME" required>
            <input id="phone" type="text" placeholder="PHONE NO." pattern="[0-9]{10}" 
            oninvalid="this.setCustomValidity('Enter only your 10 digit phone no.')" oninput="this.setCustomValidity('')" maxlength="10" required>
            <p id="phone-exist">Phone number already exist please Login</p>
            <input id="email" type="email" placeholder="EMAIL" required>
            <p id="email-exist">Email already exist please Login or try with another email</p>
            <input id="pass" type="password" placeholder="PASSWORD" minlength="8" 
            oninvalid="this.setCustomValidity('Enter minimum 8 character')" oninput="this.setCustomValidity('')" required>
            <input id="rpass" type="password" placeholder="RETYPE PASSWORD" minlength="8" 
            oninvalid="this.setCustomValidity('Enter minimum 8 character')" oninput="this.setCustomValidity('')" required>
            <p id="same-pass">Enter same password</p>
            <input id="seller-register" type="submit" value="Register">
        </form>
    </span>
</div>
<div id="seller-content">
    <img src="../images/sell on madefru.jpg" alt="">
    <img src="../images/how to sell on madefru2.jpg" alt="">
</div>
<div class="index-footer">
    <?php
        include('footer.php');
    ?>
</div>