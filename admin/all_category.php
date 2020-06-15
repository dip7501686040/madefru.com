<?php
    include('header.php');
?>
<script type="text/javascript">
function send(){
		
		if(window.confirm("Do You Really Want To Delete The Category??")){
			
			return true;
		}
		else return false;
		}
</script>
<div class="category-container">
<div class="all-category">
    <h3>All gategory</h3>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">sl</th>
      <th scope="col">category</th>
      <th scope="col">sub category</th>
      <th scope="col">sub sub category</th>
      <th scope="col">products</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sl=0;
        $query1="select * from category";
        $category=mysqli_query($con,$query1);
        while($row1=mysqli_fetch_assoc($category)){
            $sl++;
            $pro_id=$row1['id'];
            $categoryrow=$row1['category'];
    ?>
    <tr>
        <th scope="row"><?php echo"$sl"?></th>
        <td><?php echo"$categoryrow";?></td>
        <?php 
            $query2="select subcategory from subcategory where category='".$row1['category']."'"; 
            $subcategory=mysqli_query($con,$query2);
        ?>
        <td>
            <?php 
            while($row2=mysqli_fetch_assoc($subcategory)){
                $subcaterow=$row2['subcategory'];
                echo"$subcaterow,";
            }
        ?></td>
        <?php 
            $query2="select subsubcategory from subsubcategory where category='".$row1['category']."'"; 
            $subsubcategory=mysqli_query($con,$query2);
        ?>
        <td>
            <?php 
            while($row2=mysqli_fetch_assoc($subsubcategory)){
                $subsubcaterow=$row2['subsubcategory'];
                echo"$subsubcaterow,";
            }
        ?></td>
        <?php 
            $query3="select product_name from product where category='".$row1['category']."'"; 
            $product=mysqli_query($con,$query3);
        ?>
        <td><?php 
            while($row3=mysqli_fetch_assoc($product)){
                $productrow=$row3['product_name'];
                echo"$productrow,";
            }
        ?></td>
        <td><?php 
                echo"<a href='delete_cate.php?id=$pro_id' class='btn btn-success btn-sm' onclick='return send();'>Delete</a>"; 
        ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<h3>All Sub Category</h3>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">sl</th>
      <th scope="col">sub category</th>
      <th scope="col">sub sub category</th>
      <th scope="col">products</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sl=0;
        $query1="select * from subcategory";
        $subcategory=mysqli_query($con,$query1);
        while($row1=mysqli_fetch_assoc($subcategory)){
            $sl++;
            $pro_id1=$row1['id'];
            $categoryrow=$row1['subcategory'];
    ?>
    <tr>
        <th scope="row"><?php echo"$sl"?></th>
        <td><?php echo"$categoryrow";?></td>
        <?php 
            $query2="select subsubcategory from subsubcategory where subcategory='".$row1['subcategory']."'"; 
            $subsubcategory=mysqli_query($con,$query2);
        ?>
        <td>
            <?php 
            while($row2=mysqli_fetch_assoc($subsubcategory)){
                $subsubcaterow=$row2['subsubcategory'];
                echo"$subsubcaterow,";
            }
        ?></td>
        <?php 
            $query3="select product_name from product where subcategory='".$row1['subcategory']."'"; 
            $product=mysqli_query($con,$query3);
        ?>
        <td><?php 
            while($row3=mysqli_fetch_assoc($product)){
                $productrow=$row3['product_name'];
                echo"$productrow,";
            }
        ?></td>
        <td><?php 
                echo"<a href='delete_subcate.php?id=$pro_id1' class='btn btn-success btn-sm' onclick='return send();'>Delete</a>"; 
        ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<h3>All Sub Sub Category</h3>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">sl</th>
      <th scope="col">sub sub category</th>
      <th scope="col">products</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sl=0;
        $query1="select * from subsubcategory";
        $subsubcategory=mysqli_query($con,$query1);
        while($row1=mysqli_fetch_assoc($subsubcategory)){
            $sl++;
            $pro_id2=$row1['id'];
            $subsubcategoryrow=$row1['subsubcategory'];
    ?>
    <tr>
        <th scope="row"><?php echo"$sl"?></th>
        <td><?php echo"$subsubcategoryrow";?></td>
        <?php 
            $query3="select product_name from product where subsubcategory='".$row1['subsubcategory']."'"; 
            $product=mysqli_query($con,$query3);
        ?>
        <td><?php 
            while($row3=mysqli_fetch_assoc($product)){
                $productrow=$row3['product_name'];
                echo"$productrow,";
            }
        ?></td>
        <td><?php 
                echo"<a href='delete_subsubcate.php?id=$pro_id2' class='btn btn-success btn-sm' onclick='return send();'>Delete</a>"; 
        ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</div>
<?php
    include('footer.php');
?>