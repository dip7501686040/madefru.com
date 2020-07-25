<?php
    include('header.php');
    $query="select * from seller_product where seller_product_id='$_REQUEST[seller_product_id]'";
    $result=mysqli_query($con,$query);
    $seller_product=mysqli_fetch_assoc($result);
?>
<script>
    $(document).ready(function() {
////////////
$('#product-category').change(function(){
//var st=$('#category option:selected').text();
var cat_id=$('#product-category').val();
$('#product-subcategory').empty(); //remove all existing options
$('#product-subsubcategory').empty();
$('#product-subcategory').append("<option value=''>select</option>");
$('#product-subsubcategory').append("<option value=''>select</option>");
///////
$.get('get_subcategory.php',{'cat_id':cat_id},function(return_data){
	if(return_data.data.length>0){
		$('#msg').html( return_data.data.length + ' records Found');
$.each(return_data.data, function(key,value){
		$("#product-subcategory").append("<option value='" + value.subcategory+"'>"+value.subcategory+"</option>");
	});
	}else{
	$('#msg').html('No records Found');
}
}, "json");

///////
});
/////////////////////
});
$(document).ready(function() {
////////////
$('#product-subcategory').change(function(){
//var st=$('#category option:selected').text();
var subcat_id=$('#product-subcategory').val();
$('#product-subsubcategory').empty(); //remove all existing options
$('#product-subsubcategory').append("<option value=''>select</option>")
///////
$.get('get_subsubcategory.php',{'subcat_id':subcat_id},function(return_data){
	if(return_data.data.length>0){
		$('#msg').html( return_data.data.length + ' records Found');
$.each(return_data.data, function(key,value){
		$("#product-subsubcategory").append("<option value='" + value.subsubcategory+"'>"+value.subsubcategory+"</option>");
	});
	}else{
	$('#msg').html('No records Found');
}
}, "json");

///////
});
/////////////////////
});
</script>
<div id="page-wrapper">
    <div class="main-page">
        <div class="container" id="approve-product">
            <form method="POST">
                <div class="form-group row">
                    <label for="product-brand" class="col-sm-2 col-form-label">Product Brand</label>
                    <div class="col-sm-4">
                        <select name="product-brand" class='form-control' id="product-brand">
                            <option value="">Select</option>
                            <?php  
                                $query="select * from brand";
                                $result=mysqli_query($con,$query);
                                while($brand=mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $brand['brand']; ?>"><?php echo $brand['brand']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <a href="" class="btn btn-primary col-sm-1 col-form-label">Add</a>
                </div>
                <div class="form-group row">
                    <label for="product-category" class="col-sm-2 col-form-label">Product Category</label>
                    <div class="col-sm-4">
                        <select name="product-category" class='form-control' id="product-category">
                            <option value="">Select</option>
                            <?php  
                                $query="select * from category";
                                $result=mysqli_query($con,$query);
                                while($category=mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $category['category']; ?>"><?php echo $category['category']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputcategory" placeholder="category" value="<?php echo $seller_product['category']; ?>">
                    </div>
                    <a href="entry_category.php?category=<?php echo $seller_product['category']; ?>" class="btn btn-primary col-sm-1 col-form-label">Add</a>
                </div>
                <div class="form-group row">
                    <label for="product-subcategory" class="col-sm-2 col-form-label">Product Sub Category</label>
                    <div class="col-sm-4">
                        <select name="product-subcategory" class='form-control' id="product-subcategory">
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputsubcategory" placeholder="sub category" value="<?php echo $seller_product['subcategory']; ?>">
                    </div>
                    <a href="entry_sub_category.php?subcategory=<?php echo $seller_product['subcategory']; ?>" class="btn btn-primary col-sm-1 col-form-label">Add</a>
                </div>
                <div class="form-group row">
                    <label for="product-subsubcategory" class="col-sm-2 col-form-label">Product Sub Sub category</label>
                    <div class="col-sm-4">
                        <select name="product-subsubcategory" class='form-control' id="product-subsubcategory">
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputsubsubcategory" placeholder="sub sub category" value="<?php echo $seller_product['subsubcategory']; ?>">
                    </div>
                    <a href="entry_sub_sub_category.php?subsubcategory=<?php echo $seller_product['subsubcategory']; ?>" class="btn btn-primary col-sm-1 col-form-label">Add</a>
                </div>
                <div class="form-group row">
                    <label for="product-name" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="product-name" id="product-name" placeholder="product name" value="<?php echo $seller_product['product_name']; ?>">
                    </div>
                    <label for="product-qty" class="col-sm-1 col-form-label">Product Qty</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" name="product-qty" id="product-qty" placeholder="product quantity">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product-price" class="col-sm-2 col-form-label">Product Price</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="product-price" id="product-price" placeholder="product price" value="<?php echo $seller_product['price']; ?>">
                    </div>
                    <label for="product-disc" class="col-sm-1 col-form-label">Product Discounted price</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="product-netprice" id="product-disc" placeholder="product discount">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product-size" class="col-sm-2 col-form-label">Product Size</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="product-size" id="product-size" placeholder="product size">
                    </div>
                    <label for="product-color" class="col-sm-1 col-form-label">Product Color</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="product-color" id="product-color" placeholder="product color">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Product Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="product-desc" id="exampleFormControlTextarea1" rows="3">
                            <?php echo $seller_product['description']; ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product-image1" class="col-sm-2 col-form-label">Product Image</label>
                    <?php  
                        $query="select * from seller_product_img where seller_product_id='$seller_product[seller_product_id]'";
                        $result=mysqli_query($con,$query);
                        while($img=mysqli_fetch_assoc($result)){
                    ?>
                    <div class="col-sm-2">
                        <img id="product-image1" src="../images/<?php echo $img['img']; ?>" alt="sadf" style="width: 120px; height: 100px;">
                    </div>
                    <!-- <div class="col-sm-2 d-flex">
                        <a href="" class="btn btn-success btn-sm">Edit</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </div> -->
                    <?php
                        }
                    ?>
                </div>
                <div class="form-group row pd">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="approve">Approve</button>
                    </div>
                </div>
            </form>
        </div>    
    </div>
</div>

<?php
    include('footer.php');

    if(isset($_POST['approve'])){
    $disvalue=$_POST['product-price']-$_POST['product-netprice'];
    $discount=round((100*($disvalue/$_POST['product-price'])));
    include('ids.php'); //gives product id
        $seller_id=$_REQUEST['seller_id'];
        $query1="insert into `product` (`id`, `product_id`, `seller_id`, `product_name`, `brand`, `category`, `subcategory`, `subsubcategory`, 
        `price`, `quantity`, `description`, `discount`, `net_price`, `size`, `color`, `currency`, 
        `new_item`, `popular_item`, `hit_item`, `sunday_offer`) values (NULL, '$id', '$seller_id', '".trim($_POST['product-name'])."', '".trim($_POST['product-brand'])."', '".trim($_POST['product-category'])."', 
        '".trim($_POST['product-subcategory'])."', '".trim($_POST['product-subsubcategory'])."', '".trim($_POST['product-price'])."', '".trim($_POST['product-qty'])."', '".trim(mysqli_real_escape_string($con,$_POST['product-desc']))."', 
        '".trim($discount)."', '".trim($_POST['product-netprice'])."', '".trim($_POST['product-size'])."', '".trim($_POST['product-color'])."', NULL, 
        '1', '0', '0','0')";
        if($result=mysqli_query($con,$query1)){
            $query3="UPDATE `seller_product` SET `product_id` = '$id', `status` = 'approved' WHERE seller_product_id='$seller_product[seller_product_id]'";
            mysqli_query($con,$query3);
            $query4="select * from seller_product_img where seller_product_id='$seller_product[seller_product_id]'";
            $result1=mysqli_query($con,$query4);
            while($img=mysqli_fetch_assoc($result1)){
                $query2="insert into `product_img` (`id`, `product_id`, `img`) values (NULL, '$id', '$img[img]')";
                mysqli_query($con,$query2);
            }
            $query5="delete from `seller_product_img` where `seller_product_id`='$seller_product[seller_product_id]'";
            mysqli_query($con,$query5);
            echo"<script>alert('Product Approved')</script>";
            echo"<script>window.location.href='not-approved-product.php'</script>";
        }
        else{
            echo"<script>alert('failed')</script>";
        }
    }
?>
