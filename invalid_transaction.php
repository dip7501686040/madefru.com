<?php
include('user_account1.php');
include('failure.php');
if(isset($_SESSION['order'])){
$itemtotal=$_SESSION['order']['itemtotal'];
$delivery=$_SESSION['order']['delivery'];
$delivery_address_id=$_SESSION['order']['delivery_address_id'];
}
if(isset($_SESSION['cart'])){
    $item=$_SESSION['cart'];
}
$query="select * from customer_order where order_id='$productinfo'";
$result=$db_handle->runQuery($query);
if($result->num_rows>0){
    $customer_order=$result->fetch_assoc();
?>
    <div class="invalid-transaction">
        <div class="row justify-content-center">
            <h5>Your Order</h5>
        </div>
        <hr>
        <div class="row justify-content-center">
            <h6>Transaction Failed</h6>
        </div>
        <div class="row justify-content-center">
            <h6>Transaction ID- <?php echo $txnid; ?></h6>
        </div>
        <div class="row justify-content-center">
        <?php
        $MERCHANT_KEY = "nB5gd4Dp";
            $SALT = "FTD9LyuJyP";
            // Merchant Key and Salt as provided by Payu.

            $PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
            //$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

            $action = '';

            $posted = array();
            if(!empty($_POST)) {
                //print_r($_POST);
            foreach($_POST as $key => $value) {    
                $posted[$key] = $value; 
                
            }
            }

            $formError = 0;

            if(empty($posted['txnid'])) {
            // Generate random transaction id
            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            } else {
            $txnid = $posted['txnid'];
            }
            $hash = '';
            // Hash Sequence
            $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
            if(empty($posted['hash']) && sizeof($posted) > 0) {
            if(
                    empty($posted['key'])
                    || empty($posted['txnid'])
                    || empty($posted['amount'])
                    || empty($posted['firstname'])
                    || empty($posted['email'])
                    || empty($posted['phone'])
                    || empty($posted['productinfo'])
                    || empty($posted['surl'])
                    || empty($posted['furl'])
                    || empty($posted['service_provider'])
            ) {
                $formError = 1;
            } else {
                //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
                $hashVarsSeq = explode('|', $hashSequence);
                $hash_string = '';	
                foreach($hashVarsSeq as $hash_var) {
                $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                $hash_string .= '|';
                }

                $hash_string .= $SALT;


                $hash = strtolower(hash('sha512', $hash_string));
                $action = $PAYU_BASE_URL . '/_payment';
            }
            } elseif(!empty($posted['hash'])) {
            $hash = $posted['hash'];
            $action = $PAYU_BASE_URL . '/_payment';
            }
            ?>
            <script>
                var hash = '<?php echo $hash ?>';
                function submitPayuForm() {
                if(hash == '') {
                    return;
                }
                var payuForm = document.forms.payuForm;
                payuForm.submit();
                }
            </script>
            <body onload="submitPayuForm()">
            <form action="<?php echo $action; ?>" method="post" name="payuForm">
                <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
                <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
                <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
                <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                <input type="hidden" name="firstname" value="<?php echo $_SESSION['user_fname']; ?>">
                <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                <input type="hidden" name="phone" value="<?php echo $_SESSION['phone']; ?>">
                <textarea name="productinfo" style="display:none;"><?php echo $productinfo; ?></textarea>
                <input name="surl" type="hidden" value="http://localhost/webprojects/madefru/version1.1/success.php" size="64" />
                <input name="furl" type="hidden" value="http://localhost/webprojects/madefru/version1.1/failure.php" size="64" />
                <input  type="hidden" name="service_provider" value="payu_paisa" size="64" />
                <button type="submit" name="tryagain" class="btn btn-warning">Try Again</button>
            </form>
        </div>
        <div class="row justify-content-center p-4">
            <table class="table table-borderless">
                <thead class="table-bordered">
                    <tr>
                    <th>sl</th>
                    <th>Image</th>
                    <th>product</th>
                    <th>size</th>
                    <th>color</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>discount</th>
                    <th>net price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        $query="select * from order_items where order_id='$productinfo'";
                        $result1=$db_handle->runQuery($query);
                        while($order_items=$result1->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $i ;?></td>
                        <?php 
                        $query1="select img from product_img where product_id='$order_items[product_id]' limit 1";
                        $result=$db_handle->runQuery($query1);
                        $pimg=$result->fetch_assoc();
                        ?>
                        <td><img src="images/<?php echo $pimg['img'];?>" alt=""></td>
                        <?php 
                        $query1="select* from product where product_id='$order_items[product_id]'";
                        $result=$db_handle->runQuery($query1);
                        $product=$result->fetch_assoc();
                        ?>
                        <td><?php echo $product['product_name'] ;?></td>
                        <td><?php echo $order_items['size'] ;?></td>
                        <td>None</td>
                        <td><?php echo $order_items['quantity'] ;?></td>
                        <td><?php echo $product['price'] ;?></td>
                        <td><?php echo $product['discount'] ;?></td>
                        <td><?php echo $product['net_price'] ;?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                    <th colspan="7"></th>
                    <th colspan="2">Subtotal</th>
                    </tr>
                    <tr>
                    <th colspan="7"></th>
                    <th colspan="2">Delivery</th>
                    </tr>
                    <tr>
                    <th colspan="7"></th>
                    <th colspan="2">Total</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    </div>                
    <?php
}
else{     
     $query="insert into customer_order(id,order_id,total,delivery_charge,itemtotal,delivery_address_id,date,time,user_id) 
     values(Null,'".$productinfo."','".$amount."','".$delivery."','".$itemtotal."','".$delivery_address_id."',CURDATE(),CURTIME(),'pending',
     '".$_SESSION['user_id']."')";
     $result2=$db_handle->runQuery($query);
     if($result2==true){
         foreach ($item as $key=>$value){
             $quantity=$item[$key]['quantity'];
             $product_id=$item[$key]['product_id'];
             $size=$item[$key]['size'];
             $query1="insert into order_items(id,order_id,product_id,quantity,size) values(Null,'$productinfo','$product_id','$quantity','$size')";
             $result3=$db_handle->runQuery($query1);
            $query="select * from customer_order where order_id='$productinfo'";
            $result=$db_handle->runQuery($query);
            if($result->num_rows>0){
                 $customer_order=$result->fetch_assoc();
                ?>
                <div class="invalid-transaction">
                    <div class="row justify-content-center">
                        <h5>Your Order</h5>
                    </div>
                    <hr>
                    <div class="row justify-content-center">
                        <h6>Transaction Failed</h6>
                    </div>
                    <div class="row justify-content-center">
                        <h6>Transaction ID- <?php echo $txnid; ?></h6>
                    </div>
                    <div class="row justify-content-center">
                    <?php
                    $MERCHANT_KEY = "nB5gd4Dp";
                        $SALT = "FTD9LyuJyP";
                        // Merchant Key and Salt as provided by Payu.

                        $PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
                        //$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

                        $action = '';

                        $posted = array();
                        if(!empty($_POST)) {
                            //print_r($_POST);
                        foreach($_POST as $key => $value) {    
                            $posted[$key] = $value; 
                            
                        }
                        }

                        $formError = 0;

                        if(empty($posted['txnid'])) {
                        // Generate random transaction id
                        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                        } else {
                        $txnid = $posted['txnid'];
                        }
                        $hash = '';
                        // Hash Sequence
                        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
                        if(empty($posted['hash']) && sizeof($posted) > 0) {
                        if(
                                empty($posted['key'])
                                || empty($posted['txnid'])
                                || empty($posted['amount'])
                                || empty($posted['firstname'])
                                || empty($posted['email'])
                                || empty($posted['phone'])
                                || empty($posted['productinfo'])
                                || empty($posted['surl'])
                                || empty($posted['furl'])
                                || empty($posted['service_provider'])
                        ) {
                            $formError = 1;
                        } else {
                            //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
                            $hashVarsSeq = explode('|', $hashSequence);
                            $hash_string = '';	
                            foreach($hashVarsSeq as $hash_var) {
                            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                            $hash_string .= '|';
                            }

                            $hash_string .= $SALT;


                            $hash = strtolower(hash('sha512', $hash_string));
                            $action = $PAYU_BASE_URL . '/_payment';
                        }
                        } elseif(!empty($posted['hash'])) {
                        $hash = $posted['hash'];
                        $action = $PAYU_BASE_URL . '/_payment';
                        }
                        ?>
                        <script>
                            var hash = '<?php echo $hash ?>';
                            function submitPayuForm() {
                            if(hash == '') {
                                return;
                            }
                            var payuForm = document.forms.payuForm;
                            payuForm.submit();
                            }
                        </script>
                        <body onload="submitPayuForm()">
                        <form action="<?php echo $action; ?>" method="post" name="payuForm">
                            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
                            <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
                            <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
                            <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                            <input type="hidden" name="firstname" value="<?php echo $_SESSION['user_fname']; ?>">
                            <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                            <input type="hidden" name="phone" value="<?php echo $_SESSION['phone']; ?>">
                            <textarea name="productinfo" style="display:none;"><?php echo $productinfo; ?></textarea>
                            <input name="surl" type="hidden" value="http://localhost/webprojects/madefru/version1.1/success.php" size="64" />
                            <input name="furl" type="hidden" value="http://localhost/webprojects/madefru/version1.1/failure.php" size="64" />
                            <input  type="hidden" name="service_provider" value="payu_paisa" size="64" />
                            <button type="submit" name="tryagain" class="btn btn-warning">Try Again</button>
                        </form>
                    </div>
                    <div class="row justify-content-center p-4">
                        <table class="table table-borderless">
                            <thead class="table-bordered">
                                <tr>
                                <th>sl</th>
                                <th>Image</th>
                                <th>product</th>
                                <th>size</th>
                                <th>color</th>
                                <th>quantity</th>
                                <th>price</th>
                                <th>discount</th>
                                <th>net price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    $query="select * from order_items where order_id='$productinfo'";
                                    $result1=$db_handle->runQuery($query);
                                    while($order_items=$result1->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $i ;?></td>
                                    <?php 
                                    $query1="select img from product_img where product_id='$order_items[product_id]' limit 1";
                                    $result=$db_handle->runQuery($query1);
                                    $pimg=$result->fetch_assoc();
                                    ?>
                                    <td><img src="images/<?php echo $pimg['img'];?>" alt=""></td>
                                    <?php 
                                    $query1="select* from product where product_id='$order_items[product_id]'";
                                    $result=$db_handle->runQuery($query1);
                                    $product=$result->fetch_assoc();
                                    ?>
                                    <td><?php echo $product['product_name'] ;?></td>
                                    <td><?php echo $order_items['size'] ;?></td>
                                    <td>None</td>
                                    <td><?php echo $order_items['quantity'] ;?></td>
                                    <td><?php echo $product['price'] ;?></td>
                                    <td><?php echo $product['discount'] ;?></td>
                                    <td><?php echo $product['net_price'] ;?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th colspan="7"></th>
                                <th colspan="2">Subtotal</th>
                                </tr>
                                <tr>
                                <th colspan="7"></th>
                                <th colspan="2">Delivery</th>
                                </tr>
                                <tr>
                                <th colspan="7"></th>
                                <th colspan="2">Total</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                </div>                
                <?php
            }
        }
     }
 }
if(isset($_SESSION['order'])){
  unset($_SESSION['order']);
}
if(isset($_SESSION['cart'])){
  unset($_SESSION['cart']);
}
if(isset($_SESSION['order_id'])){
  unset($_SESSION['order_id']);
}
include('footer.php');
?>