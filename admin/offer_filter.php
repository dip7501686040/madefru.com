<?php

include('header.php');
?>

<script type="text/javascript">
    function send(){
		
		if(window.confirm("Do You Really Want To Delete The Product??")){
			
			return true;
		}
		else return false;
		
		
	}
</script>

<div id="page-wrapper">
    <div class="main-page">
        <div class="allproduct-container">
            <tr class="tfilter">
                <td class="filtertype">
                    <a href="new_filter.php" class="btn btn-primary btn-sm" style="padding: 1px 10px; margin: 0px 10px 10px 10px;">
                        New
                    </a>
                </td>
                <td class="filtertype">
                    <a href="popular_filter.php" class="btn btn-primary btn-sm" style="padding: 1px 10px; margin: 0px 10px 10px 10px;">
                        Popular
                    </a>
                </td>
                <td class="filtertype">
                    <a href="hit_filter.php" class="btn btn-primary btn-sm" style="padding: 1px 10px; margin: 0px 10px 10px 10px;">
                        Hit
                    </a>
                </td>
                <td class="filtertype">
                    <a href="low_stock_filter.php" class="btn btn-primary btn-sm" style="padding: 1px 10px; margin: 0px 10px 10px 10px;">
                        Low stock
                    </a>
                </td>
                <td class="filtertype">
                    <a href="offer_filter.php" class="btn btn-primary btn-sm" style="padding: 1px 10px; margin: 0px 10px 10px 10px;">
                        sunday offer
                    </a>
                </td>
                <td class="filtertype">
                    <a href="refresh_product.php" class="btn btn-primary btn-sm" style="padding: 1px 10px; margin: 0px 10px 10px 10px;">
                        Refresh
                    </a>
                </td>
            <tr>   
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Sub category</th>
                    <th>Sub Sub category</th>
                    <th>Descrip</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Net price</th>
                    <th>Quantity</th>
                    <th>Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sl=0; 
                    $query1="select * from product where sunday_offer=1";
                    $r1=mysqli_query($con,$query1);
                    while($prow=mysqli_fetch_assoc($r1)){
                        $sl++;
                        $pid=$prow['product_id'];
                        $pname=$prow['product_name'];
                        $pbrand=$prow['brand'];
                        $pcategory=$prow['category'];
                        $psubcate=$prow['subcategory'];
                        $psubsubcate=$prow['subsubcategory'];
                        $pdescrip=$prow['description'];
                        $psize=$prow['size'];
                        $pcolor=$prow['color'];
                        $pprice=$prow['price'];
                        $pdiscount=$prow['discount'];
                        $pnet=$prow['net_price'];
                        $pquantity=$prow['quantity'];
                ?>
                <tr>
                    <td><?php echo"$sl"; ?></td>
                    <td><?php echo"$pname"; ?></td>
                    <td><?php echo"$pbrand"; ?></td>
                    <td><?php echo"$pcategory"; ?></td>
                    <td><?php echo"$psubcate"; ?></td>
                    <td><?php echo"$psubsubcate"; ?></td>
                    <td><?php echo"$pdescrip"; ?></td>
                    <td><?php echo"$psize"; ?></td>
                    <td><?php echo"$pcolor"; ?></td>
                    <td><?php echo"$pprice"; ?></td>
                    <td><?php echo"$pdiscount"; ?>%</td>
                    <td><?php echo"$pnet"; ?></td>
                    <td><?php echo"$pquantity"; ?></td>
                    <td><?php echo"<a href='edit_product_aesir.php?id=$pid' class='btn btn-primary btn-sm' style='padding: 2px; margin: 2px;'>
                                Edit</a><a href='delete_product.php?id=$pid' class='btn btn-primary btn-sm' style='padding: 2px; margin: 2px;' onclick='return send();'>
                                Delete</a>"; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php

include('footer.php');
?>