<?php
session_start();

foreach($_SESSION['cart'] as $key => $value){
    if($value['product_id'] == $_POST['product_id']){
        $value['quantity'] = $_POST['qty'];
        echo "$value[quantity]";
    }
    else{
        echo '$value[quantity]';
    }
}
?>