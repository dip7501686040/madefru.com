<?php
    include('header.php');
?>
<div id="page-wrapper">
	<div class="main-page">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Status</th>
                    <th>Txn ID</th>
                    <th>Data & Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sl=0;
                    $query="select * from customer_order";
                    $r1=mysqli_query($con,$query);
                    while($customer_order=mysqli_fetch_assoc($r1)){
                        $sl++;
                ?>
                <tr>
                    <td><?php echo"$sl"; ?></td>
                    <td><?php echo"$customer_order[order_id]"; ?></td>
                    <td><?php echo"$customer_order[user_id]"; ?></td>
                    <td><?php echo"$customer_order[status]"; ?></td>
                    <td><?php echo"$customer_order[txnid]"; ?></td>
                    <td><?php echo"$customer_order[date]"; ?>, <?php echo"$customer_order[time]"; ?></td>
                    <td>
                        <a href="order_details.php?order_id=<?php echo $customer_order['order_id']; ?>" class="btn btn-success">Details</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    include('footer.php');
?>