<?php
include('header.php');
?>
<div class="delivery-address">
    <ul>
        <ul class="row">
            <li class="col-3">
                <h5>Manage Address</h5>
            </li>
        </ul>
        <li>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" 
                        aria-controls="collapseOne">
                        + Add New Address
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="" method="POST">
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="name" placeholder="Name" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="phone" placeholder="Phone" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="pin" placeholder="Pincode" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="locality" placeholder="Locality" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-12">
                                <textarea name="address" placeholder="Address" required cols="83"></textarea>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="city" placeholder="City/District/Town" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="state" placeholder="State" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="landmark" placeholder="Landmark(optional)" size="30">
                            </li>
                            <li class="col-4">
                                <input type="text" name="altphone" placeholder="Alternate phone(optional)" size="30">
                            </li>
                        </ul>
                        <ul class="row align-center">
                            <label for="">Address Type</label>
                            <li class="col-1 align-center">
                                <input type="radio" name="type" value="home" id="home" required>
                                <label for="home">Home</label>
                            </li>
                            <li class="col-1 align-center">
                                <input type="radio" name="type" value="work" id="work" required>
                                <label for="work">Work</label>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-2">
                                <input class="btn btn-dark" type="submit" name="savenew" value="Save">
                            </li>
                            <li class="col-2">
                                <input class="btn btn-light" Type="submit" name="cancel" value="Cancel">
                            </li>
                        </ul>
                        </form>
                    </div>
                    </div>
                </div>
                <?php  
                    $i=1;
                    $query="select * from pickup_address where seller_id='$_SESSION[seller_id]'";
                    $result=$db_handle->runQuery($query);
                    while($row=$result->fetch_assoc()){
                ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo"$i"; ?>">
                    <h2 class="mb-0">
                        <div class="row">
                            <div class="col-10">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo"$i"; ?>" aria-expanded="false" 
                                aria-controls="collapse<?php echo"$i"; ?>">
                                <span><?php echo"$row[type]"; ?></span><br>
                                <b><?php echo"$row[name]"; ?></b><b>&nbsp&nbsp&nbsp&nbsp<?php echo"$row[phone]"; ?></b><br><p><?php echo"$row[address]"; ?>,
                                <?php echo"$row[locality]"; ?>,<?php echo"$row[city]"; ?>,<?php echo"$row[state]"; ?>,<?php echo"$row[pin]"; ?></p>
                                </button>
                            </div>
                            <div class="col-2">
                                <?php 
                                   if($row['selected']==1){
                                       echo"<h6>Default Address</h6>";
                                    }
                                ?>
                            </div>
                        </div>
                    </h2>
                    </div>
                    <div id="collapse<?php echo"$i"; ?>" class="collapse" aria-labelledby="heading<?php echo"$i"; ?>" data-parent="#accordionExample">
                    <div class="card-body">
                       <form action="" method="POST">
                        <ul class="row">
                            <?php if($row['selected']==0){?>
                            <li class="col-12">
                                <label for="setdefault"><h5>Set As Default</h5></label>
                                <input id="setdefault" type="checkbox" name="setas-default" value="1">
                            </li>
                            <?php }?>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="name<?php echo"$i"; ?>" placeholder="Name" value="<?php echo"$row[name]"; ?>" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="phone<?php echo"$i"; ?>" placeholder="Phone" value="<?php echo"$row[phone]"; ?>" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="pin<?php echo"$i"; ?>" placeholder="Pincode" value="<?php echo"$row[pin]"; ?>" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="locality<?php echo"$i"; ?>" placeholder="Locality" value="<?php echo"$row[locality]"; ?>" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-12">
                                <textarea name="address<?php echo"$i"; ?>" placeholder="Address" required cols="83"><?php echo"$row[address]"; ?></textarea>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="city<?php echo"$i"; ?>" placeholder="City/District/Town" value="<?php echo"$row[city]"; ?>" size="30" required>
                            </li>
                            <li class="col-4">
                                <input type="text" name="state<?php echo"$i"; ?>" placeholder="State" value="<?php echo"$row[state]"; ?>" size="30" required>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="text" name="landmark<?php echo"$i"; ?>" placeholder="Landmark(optional)" value="<?php echo"$row[landmark]"; ?>" size="30">
                            </li>
                            <li class="col-4">
                                <input type="text" name="altphone<?php echo"$i"; ?>" placeholder="Alternate phone(optional)" value="<?php echo"$row[alternate_phone]"; ?>" size="30">
                            </li>
                        </ul>
                        <ul class="row align-center">
                            <label for="">Address Type</label>
                            <li class="col-1 align-center">
                                <input type="radio" name="type<?php echo"$i"; ?>" value="home" id="home" required <?php if($row['type']=='home'){echo"checked";} ?>>
                                <label for="home">Home</label>
                            </li>
                            <li class="col-1 align-center">
                                <input type="radio" name="type<?php echo"$i"; ?>" value="work" id="work" required <?php if($row['type']=='work'){echo"checked";}?>>
                                <label for="work">Work</label>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-2">
                                <input type="hidden" name="id<?php echo"$i"; ?>" value="<?php echo"$row[id]"; ?>">
                                <input class="btn btn-dark" type="submit" name="saveupdate<?php echo"$i"; ?>" value="Save">
                            </li>
                            <li class="col-2">
                                <input class="btn btn-light" Type="submit" name="cancel<?php echo"$i"; ?>" value="Cancel">
                            </li>
                        </ul>
                        </form>
                    </div>
                    </div>
                </div>
                <?php $i++;}?>
            </div>
        </li>
    </ul>
</div>
<div class="mobile-delivery-address">
    <ul>
        <ul class="row">
            <li class="col-3">
                <h5>Manage Address</h5>
            </li>
        </ul>
        <li>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" 
                        aria-controls="collapseOne">
                        + Add New Address
                        </button>
                    </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="" method="POST">
                        <ul>
                            <li>
                                <input type="text" name="name" placeholder="Name" size="30" required>
                            </li>
                            <li>
                                <input type="text" name="phone" placeholder="Phone" size="30" required>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <input type="text" name="pin" placeholder="Pincode" size="30" required>
                            </li>
                            <li>
                                <input type="text" name="locality" placeholder="Locality" size="30" required>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <textarea name="address" placeholder="Address" required cols="83"></textarea>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <input type="text" name="city" placeholder="City/District/Town" size="30" required>
                            </li>
                            <li>
                                <input type="text" name="state" placeholder="State" size="30" required>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <input type="text" name="landmark" placeholder="Landmark(optional)" size="30">
                            </li>
                            <li>
                                <input type="text" name="altphone" placeholder="Alternate phone(optional)" size="30">
                            </li>
                        </ul>
                        <ul>
                            <label for="">Address Type</label>
                            <li>
                                <input type="radio" name="type" value="home" id="home" required>
                                <label for="home"style="margin-left:80px;">Home</label>
                            </li>
                            <li>
                                <input type="radio" name="type" value="work" id="work" required>
                                <label for="work" style="margin-left:80px;">Work</label>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input class="btn btn-dark" type="submit" name="savenew" value="Save">
                            </li>
                            <li class="col-4">
                                <input class="btn btn-light" Type="submit" name="cancel" value="Cancel">
                            </li>
                        </ul>
                        </form>
                    </div>
                    </div>
                </div>
                <?php  
                    $i=1;
                    $query="select * from pickup_address where seller_id='$_SESSION[seller_id]'";
                    $result=$db_handle->runQuery($query);
                    while($row=$result->fetch_assoc()){
                ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo"$i"; ?>">
                    <h2 class="mb-0">
                        <div class="row">
                            <div class="col-13">
                                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo"$i"; ?>" aria-expanded="false" 
                                aria-controls="collapse<?php echo"$i"; ?>">
                                <span><?php echo"$row[type]"; ?></span><br>
                                <b><?php echo"$row[name]"; ?></b><b>&nbsp&nbsp&nbsp&nbsp<?php echo"$row[phone]"; ?></b><br><p><?php echo"$row[address]"; ?>,
                                <?php echo"$row[locality]"; ?>,<?php echo"$row[city]"; ?>,<?php echo"$row[state]"; ?>,<?php echo"$row[pin]"; ?></p>
                                </button>
                            </div>
                            <div class="col default">
                                <?php 
                                   if($row['selected']==1){
                                       echo"<h6>Default Address</h6>";
                                    }
                                ?>
                            </div>
                        </div>
                    </h2>
                    </div>
                    <div id="collapse<?php echo"$i"; ?>" class="collapse" aria-labelledby="heading<?php echo"$i"; ?>" data-parent="#accordionExample">
                    <div class="card-body">
                       <form action="" method="POST">
                        <ul class="row">
                            <?php if($row['selected']==0){?>
                            <li class="col-12">
                                <label for="setdefault"><h5>Set As Default</h5></label>
                                <input id="setdefault" type="checkbox" name="setas-default" value="1">
                            </li>
                            <?php }?>
                        </ul>
                        <ul>
                            <li>
                                <input type="text" name="name<?php echo"$i"; ?>" placeholder="Name" value="<?php echo"$row[name]"; ?>" size="30" required>
                            </li>
                            <li>
                                <input type="text" name="phone<?php echo"$i"; ?>" placeholder="Phone" value="<?php echo"$row[phone]"; ?>" size="30" required>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <input type="text" name="pin<?php echo"$i"; ?>" placeholder="Pincode" value="<?php echo"$row[pin]"; ?>" size="30" required>
                            </li>
                            <li>
                                <input type="text" name="locality<?php echo"$i"; ?>" placeholder="Locality" value="<?php echo"$row[locality]"; ?>" size="30" required>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <textarea name="address<?php echo"$i"; ?>" placeholder="Address" required cols="83"><?php echo"$row[address]"; ?></textarea>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <input type="text" name="city<?php echo"$i"; ?>" placeholder="City/District/Town" value="<?php echo"$row[city]"; ?>" size="30" required>
                            </li>
                            <li>
                                <input type="text" name="state<?php echo"$i"; ?>" placeholder="State" value="<?php echo"$row[state]"; ?>" size="30" required>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <input type="text" name="landmark<?php echo"$i"; ?>" placeholder="Landmark(optional)" value="<?php echo"$row[landmark]"; ?>" size="30">
                            </li>
                            <li>
                                <input type="text" name="altphone<?php echo"$i"; ?>" placeholder="Alternate phone(optional)" value="<?php echo"$row[alternate_phone]"; ?>" size="30">
                            </li>
                        </ul>
                        <ul>
                            <label for="">Address Type</label>
                            <li>
                                <input type="radio" name="type<?php echo"$i"; ?>" value="home" id="home" required <?php if($row['type']=='home'){echo"checked";} ?>>
                                <label for="home" style="margin-left: 80px;">Home</label>
                            </li>
                            <li>
                                <input type="radio" name="type<?php echo"$i"; ?>" value="work" id="work" required <?php if($row['type']=='work'){echo"checked";}?>>
                                <label for="work" style="margin-left: 80px;">Work</label>
                            </li>
                        </ul>
                        <ul class="row">
                            <li class="col-4">
                                <input type="hidden" name="id<?php echo"$i"; ?>" value="<?php echo"$row[id]"; ?>">
                                <input class="btn btn-dark" type="submit" name="saveupdate<?php echo"$i"; ?>" value="Save">
                            </li>
                            <li class="col-4">
                                <input class="btn btn-light" Type="submit" name="cancel<?php echo"$i"; ?>" value="Cancel">
                            </li>
                        </ul>
                        </form>
                    </div>
                    </div>
                </div>
                <?php $i++;}?>
            </div>
        </li>
    </ul>
</div>
<div class="user-account-footer">
<?php
    include('footer.php');
?>
</div>
<?php
    if(isset($_POST['savenew'])){
        $query="update pickup_address set selected=0 where seller_id='$_SESSION[seller_id]'";
        $db_handle->runQuery($query);
        $query="insert into pickup_address(id,seller_id,name,phone,pin,locality,address,city,state,landmark,alternate_phone,type,selected)
        values(Null,'$_SESSION[seller_id]','$_POST[name]','$_POST[phone]','$_POST[pin]','$_POST[locality]','$_POST[address]','$_POST[city]',
        '$_POST[state]','$_POST[landmark]','$_POST[altphone]','$_POST[type]',1)";
        if($result=$db_handle->runQuery($query)){
            echo"<script>alert('address added successfully please refersh')</script>";
            echo"<script>window.location.href='seller_delivery_address.php'</script>";
        }
        else{
            echo"<script>alert('address not added')</script>";
            echo"<script>window.location.href='seller_delivery_address.php'</script>";
        }
    }
    for($j=1;$j<$i;$j++){
        if(isset($_POST['saveupdate'.$j])){
            $query="update pickup_address set name='".$_POST['name'.$j]."',phone='".$_POST['phone'.$j]."',pin='".$_POST['pin'.$j]."',
            locality='".$_POST['locality'.$j]."',address='".$_POST['address'.$j]."',city='".$_POST['city'.$j]."',state='".$_POST['state'.$j]."',
            landmark='".$_POST['landmark'.$j]."',alternate_phone='".$_POST['altphone'.$j]."',type='".$_POST['type'.$j]."'
            where id=".$_POST['id'.$j]."";
            $result=$db_handle->runQuery($query);
            if(isset($_POST['setas-default'])){
                $query1="update pickup_address set selected=1 where id=".$_POST['id'.$j]."";
                $query2="update pickup_address set selected=0 where not(id=".$_POST['id'.$j].") and seller_id='$_SESSION[seller_id]'";
                $result1=$db_handle->runQuery($query1);
                $result2=$db_handle->runQuery($query2);
            }
            if($result==true || $result1==true || $result2==true){     
                echo"<script>alert('address updated successfully please refresh')</script>";
                echo"<script>window.location.href='seller_delivery_address.php'</script>";
            }
            else{
                echo"<script>alert('address not updated')</script>";
                echo"<script>window.location.href='seller_delivery_address.php'</script>";
            }
        }
    }
?>