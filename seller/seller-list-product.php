<?php
    include('header.php');
?>
<div id="list-product-container">
    <div class="list-product">
        <form action="" method="post">
        <ul class="list-row">
            <li>
                <ul class="list-col">
                    <li>
                        <label for="">Category</label>
                    </li>
                    <li>
                        <select name="category" id="category">
                            <option value="select">Select</option>
                        </select>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="list-col">
                    <li>
                        <label for="">Add new category</label>
                    </li>
                    <li>
                        <input type="text" name="new_category" id="new-category">
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="list-row">
            <li>
                <ul class="list-col">
                    <li>
                        <label for="">Sub-Category</label>
                    </li>
                    <li>
                        <select name="sub-category" id="sub-category">
                            <option value="select">Select</option>
                        </select>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="list-col">
                    <li>
                        <label for="">Add new Sub-Category</label>
                    </li>
                    <li>
                        <input type="text" name="new_subcategory" id="new-category">
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="list-row">
            <li>
                <ul class="list-col">
                    <li>
                        <label for="">Sub-Sub-Category</label>
                    </li>
                    <li>
                        <select name="sub-sub-category" id="sub-sub-category">
                            <option value="select">Select</option>
                        </select>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="list-col">
                    <li>
                        <label for="">Add new Sub-Sub-Category</label>
                    </li>
                    <li>
                        <input type="text" name="new_subsubcategory" id="new-category">
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="list-row">
            <li>
                <ul class="list-col">
                    <li>
                        <label for="">Product Name</label>
                    </li>
                    <li>
                        <input type="text" name="product_name" id="product-name">
                    </li>
                </ul>
            </li>
            <li>
                <ul class="list-col">
                    <li>
                        <label for="">Product Price</label>
                    </li>
                    <li>
                        <input type="text" name="product_price" id="product-price">
                    </li>
                </ul>
            </li>
            <li>
                <ul class="list-col">
                    <li id="submit-button">
                        <input type="submit" name="submit" id="submit" value="Submit">
                    </li>
                </ul>
            </li>
        </ul>
        </form>
    </div>
    <div class="list-product">
        <div id="list-content">
            <h3>Listing product needs to be aproove by us.
                After that your product will be listed in your shop.
            </h3>
            <?php 
                    $query="select * from pickup_address where selected=1 and seller_id='$_SESSION[seller_id]'";
                    $result=$db_handle->runQuery($query);
                    if($result->num_rows>0){
                    $row1=$result->fetch_assoc();
                ?>
            <h4>Your pickup address</h4>    
            <div id="pickupaddress">    
                <p><?php echo"$row1[name]"; ?>,<?php echo"$row1[phone]"; ?>,<br><?php echo"$row1[address]"; ?>,<br><?php echo"$row1[locality]"; ?>,<?php echo"$row1[city]"; ?>,<br><?php echo"$row1[state]"; ?>-<?php echo"$row1[pin]"; ?></p>
                <a href="seller_delivery_address.php" class="address"><b>Change Default Address</b></a>
                <?php } 
                else{ ?>
                    <a href="seller_delivery_address.php" class="address"><b>Add Shipping Address</b></a>
                <?php
                }
                ?>
            </div> 
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="list-product-footer">
<?php
    include('footer.php');
?>
</div>
<?php
    if(isset($_POST['submit'])){
        include('seller_product_id.php');
        $query="insert into `seller_product` (`id`, `seller_id`, `seller_product_id`, `product_name`, `category`, `subcategory`, `subsubcategory`, 
        `price`, `status`, `pickup_address_id`,`date`, `time`) values (NULL, '$_SESSION[seller_id]', '$seller_product_id', '$_POST[product_name]', '$_POST[new_category]', 
        '$_POST[new_subcategory]', '$_POST[new_subsubcategory]', '$_POST[product_price]', 'not-approved', '$row1[id]',CURDATE(),CURTIME())";
        if($result=$db_handle->runQuery($query)){
            echo"<script>alert('product listed successfully')</script>";
            echo"<script>window.location.href='seller-list-product.php'</script>";
        }
        else{
            echo"<script>alert('sorry failed')</script>";
            echo"<script>window.location.href='seller-list-product.php'</script>";
        }
    }
?>