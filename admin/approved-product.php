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
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Seller_id</th>
                    <th>Seller Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Pickup Address</th>
                    <th>Edit / Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sl=0; 
                    $query1="select * from seller_product where status='approved' order by seller_product_id desc";
                    $r1=mysqli_query($con,$query1);
                    while($prow=mysqli_fetch_assoc($r1)){
                        $sl++;
                ?>
                <tr>
                    <td><?php echo"$sl"; ?></td>
                    <td><?php echo"$prow[seller_id]"; ?></td>
                    <td><?php echo"$prow[seller_product_id]"; ?></td>
                    <td><?php echo"$prow[product_name]"; ?></td>
                    <td><?php echo"$prow[category]"; ?></td>
                    <td><?php echo"$prow[price]"; ?></td>
                    <?php
                        $query2="select * from pickup_address where id='$prow[pickup_address_id]'";
                        $r2=mysqli_query($con,$query2);
                        $row1=mysqli_fetch_assoc($r2);
                    ?>
                    <td>
                        <?php echo"$row1[address]"; ?>,<br><?php echo"$row1[locality]"; ?>,<?php echo"$row1[city]"; ?>,<br><?php echo"$row1[state]"; ?>-<?php echo"$row1[pin]"; ?></p>
                    </td>
                    <td><?php echo"<a href='edit_product_aesir.php?id=$prow[product_id]' class='btn btn-primary btn-sm' style='padding: 2px; margin: 2px;'>
                                Edit</a><a href='delete_product.php?id=$prow[product_id]' class='btn btn-primary btn-sm' style='padding: 2px; margin: 2px;' onclick='return send();'>
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