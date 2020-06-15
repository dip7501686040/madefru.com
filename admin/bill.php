<?php

ob_start();
session_start();
include('database.php');
$user=$_REQUEST['user'];
$order=$_REQUEST['order'];

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bill</title>
<style>
body{font-family: 'Open Sans', sans-serif; font-size:12px;}
table{ border-collapse:collapse; width:100%;}
table tr,td,th{ border:1px solid #333; text-align:center; padding:10px;}
div.table{margin:5% 5%;}
table.top tr:nth-child(2){ border-bottom:none;}
table.top tr:nth-child(3){border-top:none; border-bottom:none;}
table.top tr:nth-child(4){border-top:none;}
table.top tr:nth-child(2) td{text-align:left;}
table.top tr:nth-child(3) td{text-align:left;}
table.top tr:nth-child(4) td{text-align:left;}

.no{border:none;}
.heigh{
	
	border-top:none;
	}
	table.heigh tr:last-child td{ padding-bottom:4em;}
	table.heigh tr,td{ border-bottom:none; border-top:none;}
	table.top tr,td{ border-bottom:none;}
	table.bottom td{ text-align:left; border:none;}
	table.bottom tr:nth-child(1){ border-bottom:none;}
	table.bottom tr:nth-child(2){ border-bottom:none; border-top:none;}
	table.bottom tr:nth-child(3){ border-top:none;}
	table.bottom tr:nth-child(4) td{ padding-top:5em; padding-bottom:2em;}
	.text-center{ text-align:center !important;}
.print{padding:7px 15px; margin:0 auto; background:rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #cae0b0 0%, #a6cb7a 2%, #6da42b 100%) repeat scroll 0 0; background:#619126; Color:#fff; }
.no-print{ margin:2em 0;}
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
<link href='//fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Racing+Sans+One' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
	$sq="select * from place_order inner join user on  user.email = place_order.user_id where place_order.user_id='".$user."' and place_order.order_id='".$order."' order by place_order.id desc limit 1";
	$r=mysqli_query($con,$sq);
$c=mysqli_num_rows($r);
if($c<=0){
	echo "<div class='privacy about' style='padding:0 5em 5em 2em;'>
        <div class='profile_box'><h4 align='center'>You have no orders to show</h4></div></div>";
}else{
	while($row=mysqli_fetch_array($r)){
	
	$add=$row['address']; 
	$order=$row['order_id'];
	$amt=$row['amount'];
	$redeem=$row['redeem'];
	$name=$row['name'];
	$id=$row['user_id'];
	$phn=$row['phone'];
$points=$row['points'];
$money=$row['redeem_money'];

	}
}
	?>
<div class="table">
<table class="top">
<tr><td><img src="../images/logo.png" width="100" /></td><td><h2>Lukachupi.in</h2></td><td>Date : <?php echo date("d-m-Y"); ?></td></tr>
<tr><td width="33%" class="no">Name : <?php echo $name;?></td><td class="no">User Id : <?php echo $id;?></td><td class="no">Order No : <?php echo $order;?></td></tr>
<tr><td colspan="3" class="no">Address : <?php echo $add;?></td></tr>
<tr><td class="no">Phone : <?php echo $phn;?></td><td colspan="2" class="no">Mail Id : <?php echo $user;?></td></tr>
</table>
<table>

<tr><th width="10%">sl no.</th>
<th width="45%">Description</th>
<th width="10%">Qty</th>
<th width="10%">Unit</th>
<th width="10%">Price</th>
<th width="15%">Total</th></tr>
</table>
<table class="heigh">
<?php
$total1=0;
	$sq1="select * from bill where user_id='".$user."' and order_id='".$order."'";
	$r1=mysqli_query($con,$sq1);
	while($row1=mysqli_fetch_array($r1)){
		$total=intval($row1['quantity']*$row1['price']);
		$total1+=$total;
		echo "<tr style='vertical-align:top;'><td width='10%'>1</td>
<td width='45%'>".$row1['product_name']."</td>
<td width='10%'>".$row1['quantity']."</td>
<td width='10%'>".$row1['type']."</td>
<td width='10%'>".$row1['price']."</td>
<td width='15%'>".$total."</td></tr>";

	}
define("MAJOR", 'pounds');
    define("MINOR", 'p');
    class toWords  {
               var $pounds;
               var $pence;
               var $major;
               var $minor;
               var $words = '';
               var $number;
               var $magind;
               var $units = array('','One','Two','Three','Four','Five','Six','Seven','Eight','Nine');
               var $teens = array('Ten','Eleven','Twelve','Thirteen','Fourteen','Fifteen','Sixteen','Seventeen','Eighteen','Nineteen');
               var $tens = array('','Ten','Twenty','Thirty','Forty','Fifty','Sixty','Seventy','Eighty','Ninety');
               var $mag = array('','Thousand','Million','Billion','Trillion');
        function toWords($amount, $major=MAJOR, $minor=MINOR) {
                 $this->major = $major;
                 $this->minor = $minor;
                 $this->number = number_format($amount,2);
                 list($this->pounds,$this->pence) = explode('.',$this->number);
                 $this->words = " $this->major $this->pence$this->minor";
                 if ($this->pounds==0)
                     $this->words = "Zero $this->words";
                 else {
                     $groups = explode(',',$this->pounds);
                     $groups = array_reverse($groups);
                     for ($this->magind=0; $this->magind<count($groups); $this->magind++) {
                          if (($this->magind==1)&&(strpos($this->words,'hundred') === false)&&($groups[0]!='000'))
                               $this->words = ' and ' . $this->words;
                          $this->words = $this->_build($groups[$this->magind]).$this->words;
                     }
                 }
        }
        function _build($n) {
                 $res = '';
                 $na = str_pad("$n",3,"0",STR_PAD_LEFT);
                 if ($na == '000') return '';
                 if ($na{0} != 0)
                     $res = ' '.$this->units[$na{0}] . ' hundred';
                 if (($na{1}=='0')&&($na{2}=='0'))
                      return $res . ' ' . $this->mag[$this->magind];
                 $res .= $res==''? '' : ' and';
                 $t = (int)$na{1}; $u = (int)$na{2};
                 switch ($t) {
                         case 0: $res .= ' ' . $this->units[$u]; break;
                         case 1: $res .= ' ' . $this->teens[$u]; break;
                         default:$res .= ' ' . $this->tens[$t] . ' ' . $this->units[$u] ; break;
                 }
                 $res .= ' ' . $this->mag[$this->magind];
                 return $res;
        }
    }
     
?>

</table>
<table class="bottom">
<tr><td>Total Amount in $</td><td width="15%" class="text-center"><?php echo $amt; ?></td></tr>
<?php 

if($redeem!=""){
	$bal=$amt-$money;
	
?>
<tr><td>Point Balance Discount</td><td width="15%" class="text-center"><?php echo $money; ?></td></tr>
<tr><td><hr />Total Payable(In $) :  <?php  $amount = $bal;
        $obj = new toWords( $bal , 'Only', ' paisa');
        echo  $obj->words;?>  </td><td width="15%" class="text-center"><hr /><?php echo $bal; ?></td></tr>

<?php
}else{
?>
<tr><td><hr />Total Payable(In $) : <?php  $amount = $amt;
        $obj = new toWords( $amt , 'Only', ' paisa');
        echo  $obj->words;?>  </td><td width="15%" class="text-center"><hr /><?php echo $amt; ?></td></tr>
		<?php
}
?>
<tr><td></td><td class="text-center"><hr />Lukachupi</td></tr>
</table>
<div class="no-print" align="center">
<button onclick="myFunction()" class="print">Print this page</button>
<div>
<script>
function myFunction() {
    window.print();
}
</script>
</div>
</body>
</html>
