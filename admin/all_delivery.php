<?php
include('header.php');
?>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
	
	function send(){
		
		if(window.confirm("Do You Really Want To Delete The Brand??")){
			
			return true;
		}
		else return false;
		
		
	}
  </script>
 


		<div id="page-wrapper">


			<div class="main-page">
				
					<div class="tables">
					
						<h3 class="title1">Delivery Content</h3>
					<div class="panel-body widget-shadow">
			
			<div class="col-md-3 col-xs-offset-9">						
					
		
</div>
			<table class="table"  id='example'>
							<thead>
								<tr>  
								  <th>Sl</th>
								  <th>Title</th>
								   <th>Content</th>
								   
								<th>Action</th>
								</tr>
							</thead>
							<tbody>

<?php

$count=1;
 
$sq="select * from delivery order by id desc  ";
$r=mysqli_query($con,$sq);
while($row=mysqli_fetch_array($r)){
   $pro_id=1;
 ?>
 <?php
	//$status=$row['status'];
echo "	
<tr>
<td>$count</td>
<td>".$row['title']."</td> 

<td>".substr($row['des'],0,70)."</td> 
<td>
<a href='edit_delivery.php?id=$pro_id' class='label label-info'>Edit</a>
</td>

</tr>";

++$count;
}
?>							
								</tbody></table>
					</div></div>
			</div>
		</div>
		<!--footer-->
 
<?php
include('footer.php');
?>