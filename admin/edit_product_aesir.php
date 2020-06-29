<?php
include('header.php');
$id=$_REQUEST['id'];
?>
 <script src="tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });
  
  function show(){
	  
var file1 = $('#file1').val();
//alert(file1);
	 $.ajax({
        type: "POST",
        url: "upload_img.php", // Name of the php files
        data: "file1="+file1,
        success: function(html)
        {
            $("#s1").html(html);
		//	alert('jj');
			//document.getElementById("hide").style.display="none";
        }
    });  }

	function send(){
		
		if(window.confirm("Do You Really Want To Delete The Image??")){
			
			return true;
		}
		else return false;
		
		
	}
  </script>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="row">
					<div id="col-md-12">
			
					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Edit Product Entry</h4>
						</div>
						<div class="form-body">
<?php  

$sq="select * from product where product_id='".$id."' order by id";
$r=mysqli_query($con,$sq);
while($row=mysqli_fetch_array($r)){
	
$pro_id=$row['product_id'];	
$pname=$row['product_name'];
$discount=$row['discount'];
$qt=$row['quantity'];
$desc=$row['description'];
$cat=$row['category'];
$subcat=$row['subcategory'];
$subsubcat=$row['subsubcategory'];
$brand=$row['brand'];
$netprice=$row['net_price'];
$price=$row['price'];
$size=$row['size'];
$color=$row['color'];
$new=$row['new_item'];
$popular=$row['popular_item'];
$hit=$row['hit_item'];
$offer=$row['sunday_offer'];
}				
	
?>	
<form method="post" data-toggle="validator" enctype="multipart/form-data" action="">
	<div class="form-group"> 
		<div class="col-md-12">
			<label>Product Brand</label>
			<select name="brand" class='form-control' readonly>
				<option value="<?php echo $brand; ?>" selected><?php echo $brand; ?></option>
			</select>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="form-group"> 
		<div class="col-md-12">
			<label>Product Category</label>
			<select name="category" class='form-control' readonly>
				<option value="<?php echo $cat; ?>" selected><?php echo $cat; ?></option>
			</select>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="form-group"> 
		<div class="col-md-12">
			<label>Product Sub Category</label>
			<select name="subcategory" class='form-control' readonly>
				<option value="<?php echo $subcat; ?>" selected><?php echo $subcat; ?></option>
			</select>
  		</div>
		<div class="clearfix"></div>
	</div>
	
	<div class="form-group"> 
		<div class="col-md-12">
			<label>Product Sub Sub Category</label>
			<select name="subsubcategory" class='form-control' readonly>
				<option value="<?php echo $subsubcat; ?>" selected><?php echo $subsubcat; ?></option>
			</select>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="form-group"> 
		<div class="col-md-12">
			<label>*Product Name</label>
				<input type="hidden" class="form-control" value="<?php echo $pro_id; ?>" name="id" size="30" /> 
				<input type="text" class="form-control" placeholder="Full Name" name="pname" value="<?php echo $pname; ?>" size="30" required> 
		</div>
		<div class="clearfix"></div>
	</div>
				
	<div class="form-group"> 
		<div class="col-md-6">

			<label>*Product Price</label>
			<input type="text" class="form-control" pattern="[0-9]+" value="<?php echo $price; ?>" name="price" size="30" required> 


		</div>
		<div class="col-md-6">

			<label>*Product discounted price</label>
			<input type="text" class="form-control" pattern="[0-9]+"  value="<?php echo $netprice; ?>" title="discounted price" placeholder="less or equal than price" name="netprice" size="30" required> 


		</div>
			<div class="clearfix"></div>
	</div>
	<div class="form-group"> 
		<div class="col-md-12">
			<label>*Product Quantity</label>
			<?php

			?>
			<input type="text" class="form-control" pattern="[0-9]+"  value="<?php echo $qt; ?>" title="Please Provide the price" placeholder="Product Price" name="qt" size="30" required> 


		</div>
		<div class="clearfix"></div>
	</div>				
	<div class="form-group">
		<div class="col-md-6">
			<label>Product Size</label>
			<input type="text" class="form-control" placeholder="size" name="size" value="<?php echo $size; ?>" size="20">
		</div>
	</div>
	<div class="form-group">
		<label>Product color</label>
		<div class="col-md-6">
			<input type="text" class="form-control" placeholder="color" name="color" value="<?php echo $color; ?>" size="20">
		</div>
	</div>
	<div class="form-group" style="margin-top: 70px;">
		<div class="col-md-2">
			<label style="margin: 0 0 0 55px;"><h4><b>New</b></h4></label>
			<input type="checkbox" class="form-control" name="new" value="1" 
			<?php
			if($new==1){
			echo"checked";
			}
			?>>
		</div>
		<div class="col-md-2">
			<label style="margin: 0 0 0 45px;"><h4><b>Popular</b></h4></label>
			<input type="checkbox" class="form-control" name="popular" value="1"
			<?php
			if($popular==1){
			echo"checked";
			}
			?>
			>
		</div>
		<div class="col-md-2">
			<label style="margin: 0 0 0 55px;"><h4><b>Hit</b></h4></label>
			<input type="checkbox" class="form-control" name="hit" value="1"
			<?php
			if($hit==1){
			echo"checked";
			}
			?>
			>
		</div>
		<div class="col-md-2">
			<label style="margin: 0 0 0 55px;"><h4><b>Sunday</b></h4></label>
			<input type="checkbox" class="form-control" name="offer" value="1"
			<?php
			if($offer==1){
			echo"checked";
			}
			?>>
		</div>
		<div class="clearfix"></div>
	</div>		
	<div class="form-group" style="margin-top: 20px;"> 					
		<div class="col-md-12">

		<table class="table">
			<thead>
				<tr>  
					<th>Sl</th>
					<th>Image</th> 
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>

			<?php

			$sq="select img from product_img where product_id='".$id."'";
			$r=mysqli_query($con,$sq);
			while($row=mysqli_fetch_array($r)){ 
			$img=explode(" : ",$row['img']);
			}


			//			echo $_SERVER['REQUEST_URI'] ;
			$count=1;  
			$sq="select  * from product_img where product_id='".$id."'";
			$r=mysqli_query($con,$sq);
			while($row=mysqli_fetch_array($r)){
			//$status=$row['status'];
			$id=$row['id'];


			echo "	<tr>
				<td>$count</td>

				<td><img src='../images/".$row['img']."' width='100' height='70' alt='".$row['img']."'></td>
				<td><a href='edit_pic.php?id=$id&url=".$_SERVER['REQUEST_URI']."' class='label label-success' rel='facebox'>Edit</a>

					<a href='delete_pic.php?id=$id&url=".$_SERVER['REQUEST_URI']."' class='label label-danger' onclick='return send();'>Delete</a>

				</td>
			</tr>";	

			++$count;
			}
			echo "";

			?>	

			</tbody>
		</table>
		<a href='add_pic.php?id=<?php echo $pro_id; ?>&url=".$_SERVER['REQUEST_URI']."' class='btn btn-primary' rel='facebox'style="margin: 0 0 0 200px">Add New</a>
		<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>


	<div class="form-group"> 						
		<div class="col-md-12">

			<label>*Description</label>

			<textarea class="form-control" name="description" required> <?php echo $desc; ?></textarea>	</div>
		<div class="clearfix"></div>
		</div>

	<div class="form-group"> 
		<div class="col-md-6">


			<input type="submit" class="btn btn-info" name="sub" value="Submit">
		</div>
		<div class="clearfix"></div>

	</div>

	</div>

	</div>
</form>
		<?php		
		
if(isset($_POST['sub'])){
		$id=$_POST['id'];
		$name=$_POST['pname'];	 
    $price=$_POST['price'];
	$netprice=$_POST['netprice'];
	$disvalue=$price-$netprice;
	$discount=(100*($disvalue/$price));
$today=date("s");
$des=mysqli_real_escape_string($con,$_POST['description']);
if(isset($_POST['new'])){
	$new=1;
}
else{
	$new=0;
}
if(isset($_POST['popular'])){
	$popular=1;
}
else{
	$popular=0;
}
if(isset($_POST['hit'])){
	$hit=1;
}
else{
	$hit=0;
}
if(isset($_POST['offer'])){
	$offer=1;
}
else{
	$offer=0;
}


$sql="update `product` set `product_name` = '".trim($name)."', `brand` = '".$_POST['brand']."', `category` = '".$_POST['category']."', 
`subcategory` = '".$_POST['subcategory']."',`subsubcategory` = '".$_POST['subsubcategory']."', `price` = '$price', `quantity` = '".$_POST['qt']."', `description` = '$des', 
`discount` = '$discount', `net_price` = '$netprice', `size` = '".trim($_POST['size'])."', `color` = '".trim($_POST['color'])."', `new_item` = '$new', 
`popular_item` = '$popular', `hit_item` = '$hit', `sunday_offer` = '$offer' where `product_id` = '$id'";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
 

if($res)
{

echo "<script> alert('Product Updated', ' For ".$name."', 'success');</script>";
echo"<script>window.location.href='edit_product_aesir.php?id=$id';</script>";
}
						
}			

?>				
				
						</div>
					
                          

		</div></div></div>			

	<script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
             $(document).ready(function(){
       $("#date1").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });
	         $("#date2").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });      $("#date3").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });      $("#date4").datepicker({
	   format: 'dd-mm-yyyy',
	   
	   });
       });
        </script>	
		
		<!--footer-->

<?php

include('footer.php');
?>		
	