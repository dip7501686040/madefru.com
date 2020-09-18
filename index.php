<?php include('header.php'); ?>
<!-- banner -->
<script>
    $(document).ready(function() {
        $(".carousel-item:first").addClass("active");
    });
</script>
<div class="banner">
    <div id="carouselExampleFade" class="carousel slide" data-ride="carousel" data-interval="3000">
        <div class="carousel-inner">
            <?php
            $baner = "select* from banner";
            $runban = $db_handle->runQuery($baner);
            while ($lopban = mysqli_fetch_array($runban)) {

            ?>
                <div class="carousel-item">
                    <img src="images/<?php echo $lopban['banner_img']; ?>" class="d-block w-100" alt="...">
                </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->

<!-- feature box -->
<div class="feature-section">
    <div class="containr">
        <div class="features-inner">

            <div class="features-box">
                <div class="icon">
                    <img src="images/download.png" alt="">
                </div>
                <h1>Fastest Delivery</h1>
            </div>

            <div class="features-box">
                <div class="icon">
                    <img src="images/payment.png" alt="">
                </div>
                <h1>Secure Payment</h1>
            </div>

            <div class="features-box">
                <div class="icon">
                    <img src="images/support.jpg" alt="">
                </div>
                <h1>24*7 Support</h1>
            </div>

            <div class="features-box">
                <div class="icon">
                    <img src="images/india.jpg" alt="">
                </div>
                <h1>Made in India</h1>
            </div>

        </div>

    </div>

</div>
<!-- //feature box -->
<!-- categories -->
<?php
include('categories.php');
include('nxtcategories.php');
?>
<!-- //categories -->
<!-- price tag -->

<div class="container2">
    <ul>
        <li>
            <div class="bottom">Rs.299 STORE</div>
        </li>
        <li>
            <div class="bottom">Rs.599 STORE</div>
        </li>
        <li>
            <div class="bottom">Rs.999 STORE</div>
        </li>
    </ul>
</div>
<!-- shop -->
<!-- new items -->
<div class="shop">
    <div class="heading">
        <span>NEW ITEMS FROM MADEFRU</span>
        <a href="">view all</a>
    </div>
    <div id="new-item" class="owl-carousel">
        <?php
        $query = "select * from product where new_item=1 order by product_id desc";
        $result = $db_handle->runQuery($query);
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="item">
                <div class="card">
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                        <?php
                        $query1 = "select img from product_img where product_id='$row[product_id]'";
                        $result1 = $db_handle->runQuery($query1);
                        $row1 = $result1->fetch_assoc();
                        ?>
                        <img class="card-img-top" src="images/<?php echo $row1['img']; ?>" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                            <h6 class="card-title"><?php echo "$row[product_name]"; ?></h6>
                            <div class="ratings">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </a>
                        <p><b>Rs. <del><?php echo "$row[price]"; ?></del> <?php echo "$row[net_price]"; ?></b><br>
                            <?php echo round($row['discount']); ?>% discount
                            <i class="fas fa-share-alt text-muted float-right my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                            <i class="fas fa-heart text-muted float-right my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="clearfix"></div>
    </div>
    <!-- //new items -->
    <!-- popular item -->
    <div class="heading">
        <span>POPULAR ITEMS FROM MADEFRU</span>
        <a href="">view all</a>
    </div>
    <div id="popular-item" class="owl-carousel">
        <?php
        $query = "select * from product where popular_item=1 order by product_id desc";
        $result = $db_handle->runQuery($query);
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="item">
                <div class="card">
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>" style="position: relative;">
                        <?php
                        $query1 = "select img from product_img where product_id='$row[product_id]'";
                        $result1 = $db_handle->runQuery($query1);
                        $row1 = $result1->fetch_assoc();
                        ?>
                        <img class="card-img-top" src="images/<?php echo $row1['img']; ?>" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>" style="position: relative;">
                            <h6 class="card-title"><?php echo "$row[product_name]"; ?></h6>
                            <div class="ratings">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </a>
                        <p><b>Rs. <del><?php echo "$row[price]"; ?></del> <?php echo "$row[net_price]"; ?></b><br>
                            <?php echo round($row['discount']); ?>% discount
                            <i class="fas fa-share-alt text-muted float-right my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                            <i class="fas fa-heart text-muted float-right my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="clearfix"></div>
    </div>
    <!-- //popular item -->
    <!-- hit item -->
    <div class="heading">
        <span>ALL TIME HIT ITEMS FROM MADEFRU</span>
        <a href="">view all</a>
    </div>
    <div id="hit-item" class="owl-carousel">
        <?php
        $query = "select * from product where hit_item=1 order by product_id desc";
        $result = $db_handle->runQuery($query);
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="item">
                <div class="card">
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                        <?php
                        $query1 = "select img from product_img where product_id='$row[product_id]'";
                        $result1 = $db_handle->runQuery($query1);
                        $row1 = $result1->fetch_assoc();
                        ?>
                        <img class="card-img-top" src="images/<?php echo $row1['img']; ?>" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                            <h6 class="card-title"><?php echo "$row[product_name]"; ?></h6>
                            <div class="ratings">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </a>
                        <p><b>Rs. <del><?php echo "$row[price]"; ?></del> <?php echo "$row[net_price]"; ?></b><br>
                            <?php echo round($row['discount']); ?>% discount
                            <i class="fas fa-share-alt text-muted float-right my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                            <i class="fas fa-heart text-muted float-right my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="clearfix"></div>
    </div>
    <!-- //hit item -->
    <!--  client main shop -->
    <a href="client-shop.php" class="btn btn-success" id="go-to-shop">Go To Shop</a>
    <!-- //client main shop -->
</div>
<!-- //shop -->
<!-- <div class="testimonial1">
            <div class="whymadefru-container">
    <div class="services-section">
      <div class="inner-width">
        <h1 class="section-title">Why Madefru</h1>
        <div class="border"></div>
        <div class="services-container">

          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-hand-holding-heart"></i>
            </div>
            <div class="service-title">Everything Spacial</div>
            <div class="service-desc">
              Here all things are Unique.
            </div>
          </div>

          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-handshake"></i>
            </div>
            <div class="service-title">Ecosystem</div>
            <div class="service-desc">
             Creating an Ecosystem between Creator & Customer.
            </div>
          </div>

          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="service-title">Safe Shopping</div>
            <div class="service-desc">
              No need to Warry. We have taken full responsibility.
            </div>
          </div>

          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-smile-wink"></i>
            </div>
            <div class="service-title">Part of Happines</div>
            <div class="service-desc">
              When you buy Handmade ,Certainly Happy to enter someone's room.
            </div>
          </div>

          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-heart"></i>
            </div>
            <div class="service-title">Made with Love</div>
            <div class="service-desc">
              Create Anything by Hand With Love & Sell here
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>
        <div class="clearfix"></div>
    </div>
    <div class="testimonial2">
        <div class="heading">Artisian Review</div>
        <div class="clearfix"></div>
    </div>
    <div class="testimonial3">
        <div class="heading">Customer Review</div>
        <div class="clearfix"></div>
    </div> -->
<!-- footer -->
<div class="index-footer">
    <?php include('footer.php'); ?>
</div>
<!-- //footer -->