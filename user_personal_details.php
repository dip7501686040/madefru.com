<?php
include('user_account1.php');
?>
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
<div class="personal-details">
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
<div class="mobile-personal-details">
    <ul>
        <li>
            <div class="row">
                <div class="col-7">
                    <h6>Personal Information</h6>
                </div>
                <div class="col-4" onclick="enable_edit()">
                    Edit
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-4">
                    <label for="">First Name</label>
                </div>
                <div class="col-4">
                    <input id="input1" type="text" value="<?php echo $row['fname'];?>" readonly>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-4">
                    <label for="">Last Name</label>
                </div>
                <div class="col-4">
                    <input id="input1" type="text" value="<?php echo $row['lname'];?>" readonly>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-4">
                    <label for="">Email</label>
                </div>
                <div class="col-4">
                    <input id="input1" type="text" value="<?php echo $row['email'];?>" readonly>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-4">
                    <label for="">Phone</label>
                </div>
                <div class="col-4">
                    <input id="input1" type="text" value="<?php echo $row['phone'];?>" readonly>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-4">
                    <label for="">Password</label>
                </div>
                <div class="col-4">
                    <input id="input1" type="text" value="<?php echo $row['password'];?>" readonly>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-4">
                    <label for="">D.O.B</label>
                </div>
                <div class="col-4">
                    <input id="input1" type="text" value="<?php echo $row['dob'];?>" readonly>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-4">
                    <label for="">Country</label>
                </div>
                <div class="col-4">
                    <input id="input1" type="text" value="<?php echo $row['country'];?>" readonly>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-4">
                    <label for="">State</label>
                </div>
                <div class="col-4">
                    <input id="input1" type="text" value="<?php echo $row['state'];?>" readonly>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-4">
                    <label for="">City</label>
                </div>
                <div class="col-4">
                    <input id="input1" type="text" value="<?php echo $row['city'];?>" readonly>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-4">
                    <label for="">Address</label>
                </div>
                <div class="col-4">
                    <input id="input1" type="text" value="<?php echo $row['address'];?>" readonly>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-4">
                    <label for="">Gender</label>
                </div>
                <div class="col-4">
                    <input id="input1" type="text" value="<?php echo $row['gender'];?>" readonly>
                </div>
            </div>
        </li>
    </ul>
</div>
<div class="user-account-footer">
<?php
    include('footer.php');
?>
</div>