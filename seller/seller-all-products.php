<?php
    include('header.php');
?>
<div class="container-fluid pt-3 pb-3" id="seller_all_product">
    <table id="product-list" class="table table-borderless class">
        <thead>
            <tr>
                <th>slno.</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Sub category</th>
                <th>Sub Sub category</th>
                <th>Description</th>
                <th>Status</th>
                <th>Pickup address</th>
                <th>Images</th>
            </tr>
        </thead>
        <tbody>    
            <?php
                $i=0;
                $query="select * from seller_product where seller_id='$_SESSION[seller_id]'";
                $result=$db_handle->runQuery($query);
                while($product=$result->fetch_assoc()){
                    $i++;
            ?>
            <tr>
                <td><?php echo"$i"; ?></td>
                <td><?php echo"$product[seller_product_id]"; ?></td>
                <td><?php echo"$product[product_name]"; ?></td>
                <td><?php echo"$product[price]"; ?></td>
                <td><?php echo"$product[category]"; ?></td>
                <td><?php echo"$product[subcategory]"; ?></td>
                <td><?php echo"$product[subsubcategory]"; ?></td>
                <td><?php echo"$product[description]"; ?></td>
                <td><?php echo"$product[status]"; ?></td>
                <?php
                    $query1="select * from pickup_address where id='$product[pickup_address_id]'";
                    $result1=$db_handle->runQuery($query1);
                    $row1=$result1->fetch_assoc();
                ?>
                <td>
                    <?php echo"$row1[address]"; ?>,<br><?php echo"$row1[locality]"; ?>,<?php echo"$row1[city]"; ?>,<br><?php echo"$row1[state]"; ?>-<?php echo"$row1[pin]"; ?></p>
                </td>
                <?php
                    $query1="select product_id,status from seller_product where seller_product_id='$product[seller_product_id]'";
                    $result1=$db_handle->runQuery($query1);
                    $seller_product=$result1->fetch_assoc();
                    $query2="select * from seller_product_img where seller_product_id='$product[seller_product_id]'";
                    $query3="select * from product_img where product_id='$seller_product[product_id]'";
                    if($seller_product['status']=='approved'){
                        $result2=$db_handle->runQuery($query3);
                    }
                    else{
                        $result2=$db_handle->runQuery($query2);
                    }
                ?>
                <td>
                    <div class="row">
                        <?php
                            while($row2=$result2->fetch_assoc()){
                        ?>
                        <div class="col-6 pb-2">
                            <img src="../images/<?php echo $row2['img']; ?>" alt="">
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>    
    </table>
</div>
<?php
    $i=0;
    $query="select * from seller_product where seller_id='$_SESSION[seller_id]'";
    $result=$db_handle->runQuery($query);
    while($product=$result->fetch_assoc()){
        $i++;
?>
<div id="mobile-all-products">
    <div class="row justify-content-center">
        <div class="col-3">
            <span>SL no.- <?php echo"$i"; ?></span>
        </div>
        <div class="col">
            <span><b>Product ID - </b><?php echo"$product[seller_product_id]"; ?></span>
        </div>
    </div>
    <div class="row justify-content-center pl-1 pt-3">
        <div class="col-5">
            <span><b>Product Name</b>
            <div><?php echo"$product[product_name]"; ?></div></span>
        </div>
         <div class="col-3">
            <b>Price</b>
            <div><?php echo"$product[price]"; ?></div>
        </div>
        <div class="col-4">
            <b>Status</b>
            <div><?php echo"$product[status]"; ?></div>
        </div>
    </div>
    <div class="row justify-content-center pl-1 pt-3">
        <div class="col-4">
            <span>
            <b>Category</b>
            <div><?php echo"$product[category]"; ?></div>
            </span>
        </div>
        <div class="col-4">
            <span>
                <b>Sub Category</b>
                <div><?php echo"$product[subcategory]"; ?></div>
            </span>
        </div>
         <div class="col-4">
            <span>
                <b>Sub Sub Category</b>
                <div><?php echo"$product[subsubcategory]"; ?></div>
            </span>
        </div>
    </div>
    <div class="row justify-content-center pl-2 pt-3">
        <div class="col-6">
            <span>
            <b>Pickup Address</b>
            <div><?php echo"$row1[address]"; ?>,<br><?php echo"$row1[locality]"; ?>,<?php echo"$row1[city]"; ?>,<br><?php echo"$row1[state]"; ?>-<?php echo"$row1[pin]"; ?></p></div>
            </span>
        </div>
        <div class="col-6">
            <span>
                <b>Images</b>
                <?php
                    $query1="select product_id,status from seller_product where seller_product_id='$product[seller_product_id]'";
                    $result1=$db_handle->runQuery($query1);
                    $seller_product=$result1->fetch_assoc();
                    $query2="select * from seller_product_img where seller_product_id='$product[seller_product_id]'";
                    $query3="select * from product_img where product_id='$seller_product[product_id]'";
                    if($seller_product['status']=='approved'){
                        $result2=$db_handle->runQuery($query3);
                    }
                    else{
                        $result2=$db_handle->runQuery($query2);
                    }
                ?>
                <div class="row">
                    <?php
                        while($row2=$result2->fetch_assoc()){
                    ?>
                    <div class="col-6 pb-1">
                        <img src="../images/<?php echo $row2['img']; ?>" alt="">
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </span>
        </div>
    </div>
</div>
<?php
    }
?>
<div class="allproduct-footer">
<?php
    include('footer.php');
?>
</div>
