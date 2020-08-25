<?php
    include('header.php');
    if(!isset($_SESSION['seller_id'])){
?>
<script>
    $(document).ready(function(){
        alert("please login to list a product");
        window.location.href="index.php";
    });
</script>
<?php
    }
?>

<script>
$(document).ready(function(){
    $("#category").on("change", function(e){
            let category = $("option:selected", this).val();
            $("#new-category").val(category)
            $('#sub-category').empty(); //remove all existing options
            $('#sub-sub-category').empty();
            $('#sub-category').append("<option value=''>select</option>");
            $('#sub-sub-category').append("<option value=''>select</option>");
            ///////
            $.get('get_subcategory.php',{'category':category},function(return_data){
                if(return_data.data.length>0){
                    $('#msg').html( return_data.data.length + ' records Found');
            $.each(return_data.data, function(key,value){
                    $("#sub-category").append("<option value='" + value.subcategory+"'>"+value.subcategory+"</option>");
                });
                }else{
                $('#msg').html('No records Found');
            }
            }, "json");
        });
        $("#sub-category").on("change", function(e){
            let subcategory = $("option:selected", this).val();
            $("#new-sub-category").val(subcategory);
            $('#sub-sub-category').empty(); //remove all existing options
            $('#sub-sub-category').append("<option value=''>select</option>")
            ///////
            $.get('get_subsubcategory.php',{'subcategory':subcategory},function(return_data){
                if(return_data.data.length>0){
                    $('#msg').html( return_data.data.length + ' records Found');
            $.each(return_data.data, function(key,value){
                    $("#sub-sub-category").append("<option value='" + value.subsubcategory+"'>"+value.subsubcategory+"</option>");
                });
                }else{
                $('#msg').html('No records Found');
            }
            }, "json");
        });
        $("#sub-sub-category").on("change", function(e){
            let subsubcategory = $("option:selected", this).val();
            $("#new-sub-sub-category").val(subsubcategory);
        });
});
</script>
<div id="list-product-container">
    <div class="list-product">
        <form action="" method="post" enctype="multipart/form-data">
        <ul class="list-row">
            <li>
                <ul class="list-col">
                    <li>
                        <label for="">Category</label>
                    </li>
                    <li>
                        <select name="category" id="category">
                            <option value="select">Select</option>
                            <?php
                            $query="select * from category";
                            $result = $db_handle->runQuery($query);
                            while($category=$result->fetch_assoc()){
                            ?>
                            <option value="<?php echo $category['category']; ?>"><?php echo $category['category']; ?></option>
                            <?php
                            }
                            ?>
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
                        <input type="text" name="new_subcategory" id="new-sub-category">
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
                        <input type="text" name="new_subsubcategory" id="new-sub-sub-category">
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
                    <div class="container">
                    <li>
                        <label class="mr-5" for="">Upload product images</label>
                    </li>
                    <li class="mb-2">
                        <input type="file" name="product_images[]" required multiple>
                    </li>
                    </div>
                </ul>
            </li>
            <li>
                <ul class="list-col">
                    <li>
                        <label class="mr-5" for="">Add Description</label>
                    </li>
                    <li>
                        <textarea name="description" class="description"></textarea>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="list-col pb-5">
                    <li id="submit-button">
                        <input type="submit" name="submit" id="submit" value="Submit">
                    </li>
                </ul>
            </li>
        </ul>
        </form>
    </div>
    <div class="list-product mobile-product">
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

        if(isset($_FILES['product_images']['name'])){

            $imgcount=count($_FILES['product_images']['name']);
        }
        $query="insert into `seller_product` (`id`, `seller_id`, `seller_product_id`, `product_name`, `category`, `subcategory`, `subsubcategory`, 
        `price`, `description`, `status`, `pickup_address_id`,`date`, `time`) values (NULL, '$_SESSION[seller_id]', '$seller_product_id', '$_POST[product_name]', '$_POST[new_category]', 
        '$_POST[new_subcategory]', '$_POST[new_subsubcategory]', '$_POST[product_price]', '$_POST[description]', 'not-approved', '$row1[id]',CURDATE(),CURTIME())";
        if($result=$db_handle->runQuery($query)){

            for($i=0;$i<$imgcount;$i++){
                $imgname=$_FILES['product_images']['name'][$i];

                $query1="insert into `seller_product_img` (`id`, `seller_product_id`, `img`) values (NULL, '$seller_product_id', '$imgname')";
                if($db_handle->runQuery($query1)){
                    move_uploaded_file($_FILES['product_images']['tmp_name'][$i], '../images/'.$imgname);
                    echo"<script>alert('product listed successfully')</script>";
                    echo"<script>window.location.href='seller-list-product.php'</script>";
                }
                else{
                    echo"<script>alert('Image upload Error')</script>";
                    echo"<script>window.location.href='seller-list-product.php'</script>";
                }
            }
        }
        else{
            echo"<script>alert('sorry failed')</script>";
            echo"<script>window.location.href='seller-list-product.php'</script>";
        }
    }
?>