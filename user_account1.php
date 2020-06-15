<?php
    include('header.php');
    $query="select * from user where user_id ='$user_id'";
    $reuslt=$db_handle->runQuery($query);
    $row=$reuslt->fetch_assoc();
?>
<div id="profile-container" class="row">
    <div id="profile">
        <ul class="sidebar">
            <li>
                <div class="row">
                    <div class="col-2 smile">
                        <i class="fas fa-smile" aria-hidden="true"></i>
                    </div>
                    <div class="col-9">
                    <b>Hello,</b><br>
                        <b><?php echo $row['name']; ?></b>
                    </div>
                </div>
                <hr>
            </li>
            <li>
                <div class="col-12">
                    <a href="user_personal_details.php"><h6>My Personal Details</h6></a>
                </div>
            </li>
            <li>
                <div class="col-12">
                    <a href="user_delivery_address.php"><h6>Manage Addresses</h6></a>
                </div>
            </li>
            <li>
                <div class="col-12">
                    <a href="user_order_details.php"><h6>My Order Details</h6></a>
                </div>
            </li>
            <li>
                <div class="col-12">
                    <h6>My Invoices</h6>
                </div>
            </li>
            <li>
                <div class="col-12">
                    <h6>My Wishlist</h6>
                </div>
            </li>
            <li>
                <div class="col-12">
                    <h6>My Reviews & Ratings</h6>
                </div>
            </li>
            <li>
                <div class="col-12">
                    <div class="row">
                    <div class="col-1"> 
                    <i class="fas fa-power-off" aria-hidden="true"></i>
                    </div>
                    <div class="col-10">
                        <a href="logout.php"><h6>Logout</h6></a>
                    </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
