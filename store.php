<!-- new item from shop -->
<div class="new-item" style="border: 2px solid brown;">
        <div class="heading">
            <span>NEW ITEMS FROM MADEFRU</span>
            <a href="">view all</a>
        </div>
        <div class="row">
            <?php
                $query="select * from product where new_item=1 order by product_id desc limit 6";
                $result=$db_handle->runQuery($query);
                while($row=$result->fetch_assoc()){
            ?>
            <div class="col-sm-2" style="border: 2px solid brown;">
                <a href="single_product.php?product_id=<?php echo $row["product_id"]; ?>">
                <div class="card">
                    <?php
                        $query1="select img from product_img where product_id='$row[product_id]'";
                        $result1=$db_handle->runQuery($query1);
                        $row1=$result1->fetch_assoc(); 
                    ?>
                    <img class="card-img-top" src="images/<?php echo $row1['img'];?>" alt="Card image cap">
                    <div class="card-body">
                        <h6 class="card-title"><?php echo "$row[product_name]";?></h6>
                        <p><b>Rs <del><?php echo "$row[price]";?></del> <?php echo "$row[net_price]";?></b><br> 
                        <?php echo round($row['discount']);?>% discount
                        <i class="fas fa-share-alt text-muted float-right my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                        <i class="fas fa-heart text-muted float-right my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>
                        </p>
                    </div>
                </div> 
                </a>               
            </div>
            <?php }?>
        </div>
    </div>
<!-- //new item from shop -->



<div id="mobile-side-nav">
            <a href="#" class="ssm-open-nav slide-button" title="open nav">
                <div></div>
                <div></div>
                <div></div>
            </a>
            <span class="nav ssm-nav-visible mobile-sidebar">
                <ul>
                    <?php
                        $query="select * from category";
                        $result=$db_handle->runQuery($query);
                        while($row=$result->fetch_assoc()){
                        ?>
                    <li class="category">
                        <a href="" class="mobile-product-category"><?php echo "$row[category]";?></a>
                        <ul>
                            <?php
                            $query1="select * from subcategory where category='$row[category]'";
                            $result1=$db_handle->runQuery($query1);
                            while($row1=$result1->fetch_assoc()){
                            ?>
                            <li>
                                <a href="" class="mobile-product-subcategory"><?php echo "$row1[subcategory]";?></a>
                                <ul>
                                    <?php
                                    $query2="select * from subsubcategory where subcategory='$row1[subcategory]'";
                                    $result2=$db_handle->runQuery($query2);
                                    while($row2=$result2->fetch_assoc()){
                                    ?>
                                    <li class="subsubcategory">
                                        <a href="" class="mobile-product-subsubcategory"><?php echo "$row2[subsubcategory]";?></a>
                                    <div class="clearfix"></div>                                    
                                    </li>
                                    <?php }?>
                                </ul>
                                <div class="clearfix"></div>
                            </li>
                            <?php }?>
                        </ul>
                        <div class="clearfix"></div>   
                    </li>
                    <?php }?>
                </ul>
                <div class="clearfix"></div>
            </span>
            <div class="ssm-overlay visible" style="display:block;"></div>
        </div>