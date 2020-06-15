<?php
include('user_account1.php');
?>
<div class="wishlistcontainer">
    <h4>sorry this feature is not available we are working on it.</h4>
    <?php
        $query="select * from wishlist where user_id='$_SESSION[user_id]' order by id desc";
        $result=$db_handle->runQuery($query);
        while($wishlist=$result->fetch_assoc()){
            $query1="select* from product where product_id='$wishlist[product_id]'";
            $result1=$db_handle->runQuery($query1);
            $product=$result1->fetch_assoc();
    ?>
    <a href="single_product.php?product_id=<?php echo $product['product_id']; ?>">
        <div class="row">
            <div class="col-3">
                <?php
                    $query2="select * from product_img where product_id='$product[product_id]' limit 1";
                    $result2=$db_handle->runQuery($query2);
                    $productimg=$result2->fetch_assoc();
                ?>
                <img src="images/<?php echo $productimg['img']; ?>" alt="image">
            </div>
            <div class="col-9">
                <div class="row">
                    <h5><?php echo $product['product_name']; ?></h5>
                </div>
                <div class="row">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                </div>
                <div class="row">
                    <h5><?php echo $product['net_price']; ?>&nbsp<h6><del><?php echo $product['price']; ?></del></h6><span class="badge badge-success"><?php echo $product['price']; ?></span></h5>

                </div>
            </div>
        </div>
    </a>
    <?php } ?>
</div>
</div>
<div class="user-wishlist-footer">
<?php
    include('footer.php');
?>
</div>