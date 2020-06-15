<?php
include('user_account1.php');
?>
<script>
    jQuery(document).ready(function($) {
    $('*[data-href]').on('click', function() {
        window.location = $(this).data("href");
    });
});
</script>
<div class="order">
    <div class="row justify-content-center">
        <h5>All Orders</h5>
    </div>
    <hr>
    <table class="table table-borderless ordertable">
        <tbody>
            <?php
            $query="select * from customer_order where user_id='$_SESSION[user_id]' order by id desc";
            $result=$db_handle->runQuery($query);
            while($customer_order=$result->fetch_assoc()){
                $order_id=$customer_order['order_id'];
            $query1="select * from order_items where order_id='$customer_order[order_id]'";
            $result1=$db_handle->runQuery($query1);
            while($order_items=$result1->fetch_assoc()){
            $query2="select * from product where product_id='$order_items[product_id]'";
            $result2=$db_handle->runQuery($query2);
            $product=$result2->fetch_assoc();
            ?>
            <tr id="orderrow" data-href="order_placed.php?order_id=<?php echo $order_id; ?>">
                <td>
                    <div class="row">
                        <?php
                            $queryimg="select* from product_img where product_id='$product[product_id]' limit 1";
                            $resultimg=$db_handle->runQuery($queryimg);
                            while($rowimg=$resultimg->fetch_assoc()){
                            ?>
                        <div class="col-4">
                            <img src="images/<?php echo $rowimg['img']; ?>"alt="<?php echo $rowimg['img'];?>">
                        </div>
                        <?php } ?>
                        <div class="col-8">
                            <h6><?php echo $product['product_name']; ?></h6>
                        </div>
                    </div>
                </td>
                <td><?php echo $product['net_price']; ?></td>
                <td><?php echo $customer_order['status']; ?></td>
            </tr>
            <?php
            }
            }
            ?>
        </tbody>
    </table>
</div>
</div>
<div class="mobile-order">
    <div class="row justify-content-center">
        <h5>All Orders</h5>
    </div>
    <hr>
    <table class="table table-borderless ordertable">
        <tbody>
            <?php
            $query="select * from customer_order where user_id='$_SESSION[user_id]' order by id desc";
            $result=$db_handle->runQuery($query);
            while($customer_order=$result->fetch_assoc()){
                $order_id=$customer_order['order_id'];
            $query1="select * from order_items where order_id='$customer_order[order_id]'";
            $result1=$db_handle->runQuery($query1);
            while($order_items=$result1->fetch_assoc()){
            $query2="select * from product where product_id='$order_items[product_id]'";
            $result2=$db_handle->runQuery($query2);
            $product=$result2->fetch_assoc();
            ?>
            <tr id="orderrow" data-href="order_placed.php?order_id=<?php echo $order_id; ?>">
                <td>
                    <div class="row">
                        <?php
                            $queryimg="select* from product_img where product_id='$product[product_id]' limit 1";
                            $resultimg=$db_handle->runQuery($queryimg);
                            while($rowimg=$resultimg->fetch_assoc()){
                            ?>
                        <div class="col-4">
                            <img src="images/<?php echo $rowimg['img']; ?>"alt="<?php echo $rowimg['img'];?>">
                        </div>
                        <?php } ?>
                        <div class="col-8">
                            <h6><?php echo $product['product_name']; ?></h6>
                        </div>
                    </div>
                </td>
                <td><?php echo $product['net_price']; ?></td>
                <td><?php echo $customer_order['status']; ?></td>
            </tr>
            <?php
            }
            }
            ?>
        </tbody>
    </table>
</div>
<div class="user-account-footer">
<?php
    include('footer.php');
?>
</div>