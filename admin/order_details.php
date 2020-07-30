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
            <h4 class="text-center py-3"><?php echo $customer_order['order_id']; ?></h4>
            <div class="d-flex justify-content-between border">
                <span class="customer-details mx-5 my-2">
                    <label for="" class="d-block">
                        Customer Name: <?php echo $customer['name']; ?>
                    </label>
                    <label for="" class="d-block">
                        Customer Phone: <?php echo $customer['phone']; ?>
                    </label>
                    <label for="" class="d-block">
                        Customer Email: <?php echo $customer['email']; ?>
                    </label>
                </span>
                <span class="order-address mx-5 my-2 w-25 text-center border">
                    <label for="" class="p-1">Order Address</label>
                    <?php
                        $query = "select * from order_address where id = '$customer_order[delivery_address_id]'";
                        $result = mysqli_query($con,$query);
                        $order_address=mysqli_fetch_assoc($result);
                    ?>
                    <div class="p-1">   
                        <?php 
                            echo $order_address['name'];
                        ?>
                    </div>
                </span>
            </div>

        </div>
    </div>
</div>
<?php
    include('footer.php');
?>