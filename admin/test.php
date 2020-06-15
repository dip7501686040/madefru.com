<?php

include('header.php');
?>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" media="screen" rel="stylesheet" type="text/css" />
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
	
	function send(){
		
		if(window.confirm("Do You Really Want To Delete The Posted Job??")){
			
			return true;
		}
		else return false;
		
		
	}
  </script>
    <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
    	<script>
function doSearch() {
    var searchText = document.getElementById('searchTerm').value;
    var targetTable = document.getElementById('dataTable');
    var targetTableColCount;
            
    //Loop through table rows
    for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
        var rowData = '';

        //Get column count from header row
        if (rowIndex == 0) {
           targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
           continue; //do not execute further code for header row.
        }
                
        //Process data rows. (rowIndex >= 1)
        for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
            rowData += targetTable.rows.item(rowIndex).cells.item(colIndex).textContent;
        }

        //If search term is not found in row data
        //then hide the row, else show
        if (rowData.indexOf(searchText) == -1)
            targetTable.rows.item(rowIndex).style.display = 'none';
        else
            targetTable.rows.item(rowIndex).style.display = 'table-row';
    }
}
</script>
		<div id="page-wrapper">
			<div class="main-page">
				
					<div class="tables">
					
						<h3 class="title1">All Registered User</h3>
					<div class="panel-body widget-shadow">
			
			<div class="col-md-3 col-xs-offset-9">						
					
<input type="text" id="searchTerm" onkeyup="doSearch()" placeholder="Search Any fields within table" class="form-control"/>				
</div>
			<table class="table"  id="example">
							<thead>
								<tr>  
								  <th>Sl</th><th>Date of Creation</th>
								  <th>Customer</th>
								  <th>Customer Email/Phone</th>
								  <th>City/State</th> 
								    
								<th>Show/Delete</th>
								</tr>
							</thead>
							<tbody>

<?php
$count=1;
$sq="select * from user order by id desc";
$r=mysqli_query($con,$sq);
while($row=mysqli_fetch_array($r)){
	//$status=$row['status'];
$user_id=$row['user_id'];
	echo "	<tr>
								  <td>$count</td>
								  <td>".date("d-m-Y",strtotime($row['date_of_creation']))."</td>
								  <td>".$row['name']."</td>
								  <td>".$row['email']."<br>".$row['phone']."</td>
  <td>".$row['city']."<br>".$row['state']."</td>
								   <td><a href='edit_client.php?id=$user_id' class='label label-info'>Edit</a>
								  <a href='#' class='label label-danger' onclick='return send();'>Delete</a>
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