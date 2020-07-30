<?php
session_start();
include('dbcontroller.php');
$db_handle = new DBController();

if(isset($_POST["action"]))
{
	$query = "SELECT * FROM product WHERE quantity >= 0";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= " AND net_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'";
	}

    $query .=" ORDER BY id DESC";
    
    $result = $db_handle->runQuery($query);
	$output = '';
	if($result)
	{
		while($row = $result->fetch_assoc())
		{
			$query1="select img from product_img where product_id='$row[product_id]'";
            $result1=$db_handle->runQuery($query1);
            $row1=$result1->fetch_assoc();
                $output .= '
                    <div class="col p-2" style = "padding: 0;">
                        <div class="card">
                            <a href="single_product.php?product_id='.$row['product_id'].'">
                                <img class="card-img-top" src="images/'.$row1['img'].'" alt="Card image cap">
                            </a>
                            <div class="card-body">
                                <a href="single_product.php?product_id='.$row['product_id'].'">
                                    <h6 class="card-title">'.$row['product_name'].'</h6>
                                    <div class="ratings">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </a>
                                <p><b>Rs. <del>'.$row['price'].'</del> '.$row['net_price'].'</b><br> 
                                '.round($row['discount']).'% discount
                                <i class="fas fa-share-alt text-muted float-right my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                                <i class="fas fa-heart text-muted float-right my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>
                                </p>
                            </div>
                        </div>
                    </div>
			';
		    }
        }
        else
        {
            $output = '<h3>No Data Found</h3>';
        }
        
	echo $output;
}

if($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["action"])) {
    if(isset($_POST["category"]) && !isset($_POST["subcategory"]) && !isset($_POST["subsubcategory"])){
        $category = trim($_POST["category"]);
        $query = "SELECT * FROM product WHERE quantity >= 0 AND category = '$category'";
    }
    elseif(isset($_POST["category"]) && isset($_POST["subcategory"]) && !isset($_POST["subsubcategory"]))
    {
        $category = trim($_POST["category"]);
        $subcategory = trim($_POST["subcategory"]);
        $query = "SELECT * FROM product WHERE quantity >= 0 AND category = '$category' AND subcategory = '$subcategory'";
    }
    elseif(isset($_POST["category"]) && isset($_POST["subcategory"]) && isset($_POST["subsubcategory"]))
    {
        $category = trim($_POST["category"]);
        $subcategory = trim($_POST["subcategory"]);
        $subsubcategory = trim($_POST["subsubcategory"]);
        $query = "SELECT * FROM product WHERE quantity >= 0 AND category = '$category' AND subcategory = '$subcategory' AND subsubcategory = '$subsubcategory'";
    }
    $result = $db_handle->runQuery($query);
    $output = '';
    if($result)
    {
        while($row = $result->fetch_assoc())
        {
            $query1="select img from product_img where product_id='$row[product_id]'";
            $result1=$db_handle->runQuery($query1);
            $row1=$result1->fetch_assoc();
                $output .= '
                    <div class="col p-2" style = "padding: 0;">
                        <div class="card">
                            <a href="single_product.php?product_id='.$row['product_id'].'">
                                <img class="card-img-top" src="images/'.$row1['img'].'" alt="Card image cap">
                            </a>
                            <div class="card-body">
                                <a href="single_product.php?product_id='.$row['product_id'].'">
                                    <h6 class="card-title">'.$row['product_name'].'</h6>
                                    <div class="ratings">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </a>
                                <p><b>Rs. <del>'.$row['price'].'</del> '.$row['net_price'].'</b><br> 
                                '.round($row['discount']).'% discount
                                <i class="fas fa-share-alt text-muted float-right my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                                <i class="fas fa-heart text-muted float-right my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>
                                </p>
                            </div>
                        </div>
                    </div>
            ';  
        }
    }
    else
    {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;   
}

?>