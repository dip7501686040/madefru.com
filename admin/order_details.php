<?php
    include('header.php');
    $query = "SELECT * FROM customer_order WHERE order_id='$_REQUEST[order_id]'";
    $r1=mysqli_query($con,$query);
    $customer_order=mysqli_fetch_assoc($r1);  
    $query1 = "SELECT * FROM user WHERE user_id='$customer_order[user_id]'";
    $r2=mysqli_query($con,$query1);
    $customer=mysqli_fetch_assoc($r2);           
?>
<div id="page-wrapper">
	<div class="main-page">
        <div class="order-details" style="background-color: white">
            <h4 class="text-center" style="padding-bottom: 20px;"><?php echo $customer_order['order_id']; ?></h4>
            <div class="d-flex justify-content-between">
                <span class="customer-details">
                    <label for="" class="m-2 d-block">
                        Customer Name: <?php echo $customer['name']; ?>
                    </label>
                    <label for="" class="m-2 d-block">
                        Customer Phone: <?php echo $customer['phone']; ?>
                    </label>
                    <label for="" class="m-2 d-block">
                        Customer Email: <?php echo $customer['email']; ?>
                    </label>
                </span>
                <span class="order-address m-2">
                    <label for="">Order Address</label>
                    
                </span>
            </div>

        </div>
    </div>
</div>
<?php
    include('footer.php');
?>