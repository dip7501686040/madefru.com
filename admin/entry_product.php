<?php
include('header.php');
?>

<script>
    $(document).ready(function() {
////////////
$('#category').change(function(){
//var st=$('#category option:selected').text();
var cat_id=$('#category').val();
$('#subcategory').empty(); //remove all existing options
$('#subsubcategory').empty();
$('#subcategory').append("<option value=''>select</option>");
$('#subsubcategory').append("<option value=''>select</option>");
///////
$.get('get_subcategory.php',{'cat_id':cat_id},function(return_data){
	if(return_data.data.length>0){
		$('#msg').html( return_data.data.length + ' records Found');
$.each(return_data.data, function(key,value){
		$("#subcategory").append("<option value='" + value.subcategory+"'>"+value.subcategory+"</option>");
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
$('#subcategory').change(function(){
//var st=$('#category option:selected').text();
var subcat_id=$('#subcategory').val();
$('#subsubcategory').empty(); //remove all existing options
$('#subsubcategory').append("<option value=''>select</option>")
///////
$.get('get_subsubcategory.php',{'subcat_id':subcat_id},function(return_data){
	if(return_data.data.length>0){
		$('#msg').html( return_data.data.length + ' records Found');
$.each(return_data.data, function(key,value){
		$("#subsubcategory").append("<option value='" + value.subsubcategory+"'>"+value.subsubcategory+"</option>");
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
    <div class="product-container">
        <div class="row">
            <div class="col-md-12">
                <h3>New product entry</h3>
            </div>
        </div>
        <form action="entry_product.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <label for="brand">*Product Brand</label>
                    <select name="pbrand" id="brand" required>
                        <option value="">select</option>
                        <?php 
                            $query="select * from brand";
                            $result=mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<option value='".$row['brand']."'>".$row['brand']."</option>";        
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="category">*Product category</label>
                    <select name="pcategory" id="category">
                        <option value="">select</option required>
                        <?php
                            $query="select * from category";
                            $result=mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<option value='".$row['category']."'>".$row['category']."</option>";        
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="sub-category">Product Subcategory</label>
                    <select name="psubcategory" id="subcategory">
                        <option value="">select</option>
                        
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="sub-sub-category">Product SubSubcategory</label>
                    <select name="psubsubcategory" id="subsubcategory">
                        <option value="">select</option>
                    
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">    
                    <label for="name">*Product Name</label>
                    <input type="text" name="pname" id="name"  placeholder="product name" required>
                </div>
                <div class="col-md-4">
                    <label for="quantity">*Product Quantity</label>
                    <input type="number" name="pquantity" id="quantity" placeholder="product-quantity" required>
                </div>
                <div class="col-md-4">
                    <label for="price">*Product Price</label>
                    <input type="text" name="pprice" id="price" placeholder="price" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label id="img-label" for="image">*Product Image</label>
                    <input type="file" name="pimage[]" style="border:1px solid #ccc;"  id="image1" required />
                    <!-- <input type="file" name="pimage[]" style="border:1px solid #ccc;"  id="image2" required />
                    <input type="file" name="pimage[]" style="border:1px solid #ccc;"  id="image3" required />
                    <font color="red">
                        <h6>Note : Please give 3 images .Repeat image if 3 images are not available</h6>
                    </font> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label id="discount-label" for="discount">*Product Discounted price</label>
                    <input type="text" name="pnetprice" id="discount" placeholder="less or equal than price" required>
                </div>
                <div class="col-md-4">
                    <label id="size-label" for="size">Product size</label>
                    <input type="text" name="psize" id="size" placeholder="size">
                </div>
                <div class="col-md-4">
                    <label id="color-label" for="color">Product color code</label>
                    <input type="text" name="pcolor" id="color" placeholder="color code">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label id="desc-label" for="description">*Description</label>															
                    <textarea name="pdescription" id="description"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" name="psubmit" class="btn btn-primary" value="Submit">
                </div>
            </div>
    </form> 
</div>
</div>
</div>

<?php
    if(isset($_POST['psubmit'])){
        include('ids.php'); //gives product id
        $name=$_POST['pname'];
        $brand=$_POST['pbrand'];
        $category=$_POST['pcategory'];
        $subcategory=$_POST['psubcategory'];
        $subsubcategory=$_POST['psubsubcategory'];
        $quantity=$_POST['pquantity'];
        $price=$_POST['pprice'];
        $image=$_FILES['pimage']['name'];
        $countimage=count(array_filter($_FILES['pimage']['name']));
        $tmpimage=$_FILES['pimage']['tmp_name'];
        $netprice=$_POST['pnetprice'];
        $disvalue=$price-$netprice;
        $discount=(100*($disvalue/$price));
        $size=$_POST['psize'];
        $color=$_POST['pcolor'];
        $descrip=$_POST['pdescription'];
        $query1="insert into `product` (`id`, `product_id`, `product_name`, `brand`, `category`, `subcategory`, `subsubcategory`, 
                 `price`, `quantity`, `description`, `discount`, `net_price`, `size`, `color`, `currency`, 
                 `new_item`, `popular_item`, `hit_item`, `sunday_offer`) values (NULL, '$id', '".trim($name)."', '".trim($brand)."', '".trim($category)."', 
                 '".trim($subcategory)."', '".trim($subsubcategory)."', '".trim($price)."', '".trim($quantity)."', '".trim(mysqli_real_escape_string($con,$descrip))."', 
                 '".trim($discount)."', '".trim($netprice)."', '".trim($size)."', '".trim($color)."', NULL, 
                 '1', '0', '0','0')";
        if(mysqli_query($con,$query1)){
            for($i=0;$i<$countimage;$i++){
                $query2="INSERT INTO `product_img` (`id`, `product_id`, `img`) VALUES (NULL, '$id', '$image[$i]')";
                if(move_uploaded_file($tmpimage[$i],"../product_img/$image[$i]")){ 
                    if(mysqli_query($con,$query2)){
                            echo "<script>sweetAlert('product has been added successfuly');</script>";
                    }
                }
                else{
                    if(mysqli_query($con,"DELETE FROM `product` WHERE `product`.`product_id` = $id;")){
                        echo "<script>sweetAlert('file upload error');</script>";
                    }
                    else{
                        echo "<script>sweetAlert('file upload error plz delete product id= $id');</script>";
                    }
                }
            }
        }
        else{
            echo "<script>sweetAlert('try again product error');</script>";
        }
    }
include('footer.php');
?>