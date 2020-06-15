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
} 
else {
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
else 
{
    session_start();
    include('dbcontroller.php');
    $db_handle=new DBController();  
    $query="select * from delivery_address where selected=1 and user_id='$_SESSION[user_id]'";
    $result=$db_handle->runQuery($query);
    if($result->num_rows>0){
        $delivery_address=$result->fetch_assoc();
        $count=count($_SESSION['cart']);
        if($count>0){
            include('order_id.php');
            $item=$_SESSION['cart'];
            $order_id=$id;
            $itemtotal=$productinfo;
            $delivery=$amount-$productinfo;
            $total=$amount;
            $query="insert into order_address(id,order_id,name,phone,pin,locality,address,city,state,landmark,alternate_phone,type) values(Null,
            '".$order_id."','".$delivery_address['name']."','".$delivery_address['phone']."','".$delivery_address['pin']."',
            '".$delivery_address['locality']."','".$delivery_address['address']."','".$delivery_address['city']."','".$delivery_address['state']."',
            '".$delivery_address['landmark']."','".$delivery_address['alternate_phone']."','".$delivery_address['type']."')";
            $db_handle->runQuery($query);
            $query="insert into customer_order(id,order_id,total,delivery_charge,itemtotal,date,time,status,user_id,payment_method,txnid) 
            values(Null,'".$order_id."','".$total."','".$delivery."','".$itemtotal."',CURDATE(),CURTIME(),'placed',
            '".$_SESSION['user_id']."','online','".$txnid."')";
            $result=$db_handle->runQuery($query);
            if($result==true){
                foreach ($item as $key=>$value){
                    $quantity=$item[$key]['quantity'];
                    $product_id=$item[$key]['product_id'];
                    $size=$item[$key]['size'];
                    $query1="insert into order_items(id,order_id,product_id,quantity,size) values(Null,'$order_id','$product_id','$quantity','$size')";
                    $result1=$db_handle->runQuery($query1);
                }
                if($result1==true){
                        unset($_SESSION['cart']);
                        echo"<script>window.location.href='order_placed.php?order_id=$order_id&txnid=".urlencode($txnid)."'</script>";
                    }
            }
        }
        else{
            echo"<script>alert('cart is empty');</script>";
            echo"<script>window.location.href='index.php'</script>";
        }
    }
    else{
        echo"<script>alert('Please Add a Delivery Address');</script>";
        echo"<script>window.location.href='user_delivery_address.php'</script>";
    }
}
?>