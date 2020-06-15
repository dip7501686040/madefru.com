<?php
    session_start();
    include('../dbcontroller.php');
    $db_handle=new DBController();
    $query1="select seller_id from seller where phone='$_GET[email_or_phone]' or email='$_GET[email_or_phone]'";

    if($db_handle->numOfRows($query1)==1)
    {
        $result=$db_handle->runQuery($query1);
        $seller_id=$result->fetch_assoc();
        $query2="select password from seller where password='$_GET[password]' and  seller_id='$seller_id[seller_id]'";
        if($db_handle->numOfRows($query2)==1)
        {
            $_SESSION['seller_id']=$seller_id['seller_id'];
            echo"1";
        }
        else
        {
                echo"2";
        }
    }
    else
    {
        echo"3";
    }
?>