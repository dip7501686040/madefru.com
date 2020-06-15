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
    <script>
        function enable_edit(){
            document.getElementById('input1').readOnly= false;
            document.getElementById('input2').readOnly= false;
            document.getElementById('input3').readOnly= false;
            document.getElementById('input4').readOnly= false;
            document.getElementById('input5').readOnly= false;
            document.getElementById('input6').readOnly= false;
            document.getElementById('input7').readOnly= false;
            document.getElementById('input8').readOnly= false;
            document.getElementById('input9').readOnly= false;
            document.getElementById('input10').readOnly= false;
            document.getElementById('input11').readOnly= false;
            document.getElementById('input12').readOnly= false;
            document.getElementById('input13').readOnly= false;
        }
    </script>
    <div class="personal1-details">
        <ul>
            <li>
                <ul class="row">
                    <li><h5>Personal Information</h5></li>
                    <li class="edit" onclick="enable_edit()">Edit</li>
                </ul>
                <div class="clearfix"></div>
            </li>
            <li>
                <ul class="row">
                    <li><label for="">First Name</label></li>
                    <li><input id="input1" type="text" value="<?php echo $row['fname'];?>" readonly></li>
                    <li><label for="">Last Name</label></li>
                    <li><input id="input2" type="text" value="<?php echo $row['lname'];?>" readonly></li>
                </ul>
                <div class="clearfix"></div>
            </li>
            <li>
                <ul class="row" style="margin-left:22px;">
                    <li><label for="">Email</label></li>
                    <li><input id="input3" type="text" value="<?php echo $row['email'];?>" readonly size="40"></li>
                    <li><label for="">Phone</label></li>
                    <li><input id="input4" type="text" value="<?php echo $row['phone'];?>" readonly></li>
                </ul>
                <div class="clearfix"></div>
            </li>
            <li>
                <ul class="row"style="margin-left:-5px;">
                    <li><label for="">Password</label></li>
                    <li><input id="input5" type="text" value="<?php echo $row['password'];?>" readonly></li>
                    <li><label for="">Date of Birth</label></li>
                    <li><input id="input6" type="text" value="<?php echo $row['dob'];?>" readonly></li>
                </ul>
                <div class="clearfix"></div>
            </li>
            <li>
                <ul class="row"style="margin-left:3px;">
                    <li><label for="">Country</label></li>
                    <li><input id="input7" type="text" value="<?php echo $row['country'];?>" readonly></li>
                    <li><label for="">state</label></li>
                    <li><input id="input8" type="text" value="<?php echo $row['state'];?>" readonly></li>
                </ul>
                <div class="clearfix"></div>
            </li>
            <li>
                <ul class="row"style="margin-left: 30px;">
                    <li><label for="">City</label></li>
                    <li><input id="input9" type="text" value="<?php echo $row['country'];?>" readonly></li>
                    <li><label for="">Address</label></li>
                    <li><input id="input10" type="text" value="<?php echo $row['state'];?>" readonly size="40" style="height:50px"></li>
                </ul>
                <div class="clearfix"></div>
            </li>
            <li>
                <ul class="row"style="margin-left: 0px;">
                    <li><label for="">Gender</label></li>
                    <li><input id="input11" type="radio" name="gender" value="<?php if($row['gender']==1){ 
                    echo $row['gender'];}?>" readonly></li>
                    <li><input id="input12" type="radio" name="gender" value="<?php if($row['gender']=='female'){ 
                    echo $row['gender'];}?>" readonly></li>
                    <li><input id="input13" type="radio" name="gender" value="<?php if($row['gender']=='others'){ 
                    echo $row['gender'];}?>" readonly></li>
                </ul>
                <div class="clearfix"></div>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<div id="mobile-profile">
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
<div class="user-account-footer">
<?php
    include('footer.php');
?>
</div>
