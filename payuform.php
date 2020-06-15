<?php
session_start();
include('dbcontroller.php');
$db_handle=new DBController();
$itemtotal=$_REQUEST['itemtotal'];
$total=$_REQUEST['total'];
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MadeFru</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <!--//css-->
    <!--bootstrap,jquery and proper.js-->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--//-->
    <!--fontawsome cdn-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js" 
    integrity="sha256-EhSd26A4BBY7cx1qenrGNmgTke2gzkGS0HDPmLVVQ6w=" crossorigin="anonymous"></script>
    <!--//fontawsome cdn-->
</head>
<body>
  <script>
    function submit_click(){
      $("#submit").click();
    }
    $(document).ready(function(){
      submit_click();
    });
</script>
    <div class="spinner-border text-success" role="status" style="margin: 300px 700px;">
      <span class="sr-only">Loading...</span>
    </div>  
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
        <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
        <input type="hidden" name="amount" value="<?php echo $total; ?>">
        <input type="hidden" name="firstname" value="<?php echo $_SESSION['user_fname']; ?>">
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
        <input type="hidden" name="phone" value="<?php echo $_SESSION['phone']; ?>">
        <textarea name="productinfo" style="display:none;"><?php echo $itemtotal; ?></textarea>
        <input name="surl" type="hidden" value="http://localhost/webprojects/madefru/version1.1/success.php" size="64" />
        <input name="furl" type="hidden" value="http://localhost/webprojects/madefru/version1.1/failure.php" size="64" />
        <input  type="hidden" name="service_provider" value="payu_paisa" size="64" />
        <input type="submit" id="submit" style="display:none;" />
    </form>
</body>
</html>