<?php
    session_start();
    include('../dbcontroller.php');
    $db_handle=new DBController();
    $query1="select phone from seller where phone=$_GET[phone]";
    $query2="select email from seller where email='$_GET[email]'";
    if($db_handle->numOfRows($query1)==1){
        echo"1";
    }
    elseif($db_handle->numOfRows($query2)==1){
        echo"2";
    }
    else{
        include('seller_id.php');
        $query3="insert into `seller` (`id`, `seller_id`, `name`, `fname`, `lname`, `phone`, `email`, `password`, `dob`, 
        `address`, `pincode`,`city`, `state`, `date_of_creation`, `time_of_creation`, `referd_by`, `country`, `gender`) 
        values (NULL, '$seller_id', '$_GET[fname] $_GET[lname]', '$_GET[fname]', '$_GET[lname]', $_GET[phone], 
        '$_GET[email]', '$_GET[pass]', NULL, NULL, NULL, NULL, NULL, CURDATE(), CURTIME(), NULL, NULL, NULL)";
        if($db_handle->runQuery($query3)){
            $_SESSION['seller_id']=$seller_id;
            echo"3";
        }
        else{
            echo"4";
        }
    }
?>