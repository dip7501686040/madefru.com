<?php
include('dbcontroller.php');
$db_handle=new DBController();
$query="select * from subcategory where category='$_GET[category]'";
$result=$db_handle->runQuery($query);
?>
<div class="container">
<div class="row justify-content-center">
    <?php
    while($row=$result->fetch_assoc()){
   ?>
    <div class="col justify-content-center">
        <a href="client-shop.php?subcategory=<?php echo "$row[subcategory]";?>"><?php echo "$row[subcategory]";?></a>
        <?php
        $query1="select * from subsubcategory where subcategory='$row[subcategory]'";
        $result1=$db_handle->runQuery($query1);
        while($row1=$result1->fetch_assoc()){
        ?>
        <div class="row justify-content-center">
            <a href="client-shop.php?subsubcategory=<?php echo "$row1[subsubcategory]";?>"><?php echo "$row1[subsubcategory]";?></a>
        </div>
        <?php }?>
    </div>
    <?php }?>
</div>
</div>

