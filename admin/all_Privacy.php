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
 
  </script>
 


		<div id="page-wrapper">


			<div class="main-page">
				
					<div class="tables">
					
						<h3 class="title1"> Privacy Policy</h3>
					<div class="panel-body widget-shadow">
			
			<div class="col-md-3 col-xs-offset-9">						
					
		
</div>
			<table class="table" id='dataTable'>
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
$p=0;
$sq="select * from privacy order by id desc limit 1  ";
$r=mysqli_query($con,$sq);
while($row=mysqli_fetch_array($r)){
   $pro_id=$row['id'];
 ?>
 <?php
	//$status=$row['status'];
echo "	
<tr>
<td>$count</td>
<td>".$row['title']."</td>
 <td>".substr($row['des'],0,150)."</td>
<td>
<a href='edit_Privacy.php?id=$pro_id' class='label label-info'  >Update</a>
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