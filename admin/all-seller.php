<?php
    include('header.php');
?>
<div id="page-wrapper">
	<div class="main-page">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Sl no.</th>
                    <th>Seller ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Data & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sl=0;
                    $query="select * from seller";
                    $r1=mysqli_query($con,$query);
                    while($seller=mysqli_fetch_assoc($r1)){
                        $sl++;
                ?>
                <tr>
                    <td><?php echo"$sl"; ?></td>
                    <td><?php echo"$seller[seller_id]"; ?></td>
                    <td><?php echo"$seller[name]"; ?></td>
                    <td><?php echo"$seller[phone]"; ?></td>
                    <td><?php echo"$seller[email]"; ?></td>
                    <td><?php echo"$seller[password]"; ?></td>
                    <td><?php echo"$seller[date_of_creation]"; ?>, <?php echo"$seller[time_of_creation]"; ?></td>
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