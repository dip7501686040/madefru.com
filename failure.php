<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="FTD9LyuJyP";

// Salt should be same Post Request 

if (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
        include('user_account1.php');
      ?>
        <div class="order">
            <div class="row justify-content-center">
                  <h5>Your Order&nbsp<span class="badge badge-danger">Canceled</span></h5>
            </div>
            <hr>
            <div class="row justify-content-center">
                  <h6>Transaction Invalid</h6>
            </div>
            <div class="row justify-content-center">
                  <h6>Transaction ID- <?php echo $txnid; ?></h6>
            </div>
            <div class="row justify-content-center">
                <h6>Order ID- Order not generated</h6>
            </div>
            <div class="row justify-content-center">
                <h6>Please Try Again</h6>
            </div>
            <div class="row justify-content-center">
                <a href="cart.php" class="btn btn-success">Go To Cart</a>
            </div>
        </div>
        </div>
<div class="user-account-footer">
    <?php include('footer.php'); ?>
</div>
<?php
} 
else {
    include('user_account1.php');
      ?>
      <div class="order">
            <div class="row justify-content-center">
                  <h5>Your Order&nbsp<span class="badge badge-danger">Canceled</span></h5>
            </div>
            <hr>
            <div class="row justify-content-center">
                  <h6>Transaction Failed</h6>
            </div>
            <div class="row justify-content-center">
                  <h6>Transaction ID- <?php echo $txnid; ?></h6>
            </div>
            <div class="row justify-content-center">
                <h6>Order ID- Order not generated</h6>
            </div>
            <div class="row justify-content-center">
                <h6>Please Try Again</h6>
            </div>
            <div class="row justify-content-center">
                <a href="cart.php" class="btn btn-success">Go To Cart</a>
            </div>
    </div>
    </div>
    
<div class="user-account-footer">
    <?php include('footer.php'); ?>
</div>
<?php
}
?>
