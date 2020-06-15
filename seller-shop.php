<?php
    include('header.php');
?>
<div class="seller-shop">
    <div class="shop">
        <div class="heading">
            <span>SELLER NAME -</span>
            <a href="">view all</a>
        </div>
        <div id="new-item" class="owl-carousel">
            <?php
                $query="select * from product where new_item=1 order by product_id desc";
                $result=$db_handle->runQuery($query);
                while($row=$result->fetch_assoc()){
            ?>
            <div class="item">
                <div class="card">
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                    <?php
                        $query1="select img from product_img where product_id='$row[product_id]'";
                        $result1=$db_handle->runQuery($query1);
                        $row1=$result1->fetch_assoc(); 
                    ?>
                        <img class="card-img-top" src="images/<?php echo $row1['img'];?>" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                            <h6 class="card-title"><?php echo "$row[product_name]";?></h6>
                            <div class="ratings">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </a>
                        <p><b>Rs. <del><?php echo "$row[price]";?></del> <?php echo "$row[net_price]";?></b><br> 
                        <?php echo round($row['discount']);?>% discount
                        <i class="fas fa-share-alt text-muted float-right my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                        <i class="fas fa-heart text-muted float-right my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>    
<div class="seller-shop-footer">
<?php
    include('footer.php');
?>
</div>