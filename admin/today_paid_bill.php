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
		
		if(window.confirm("Do You Really Want To Delete The Posted Job??")){
			
			return true;
		}
		else return false;
		
		
	}
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
					
						<h3 class="title1">Today Paid Bill</h3>
					<div class="panel-body widget-shadow">
			
			<div class="col-md-3 col-xs-offset-9">						
					
<input type="text" id="searchTerm" onkeyup="doSearch()" placeholder="Search Any fields within table" class="form-control"/>				
</div>
			<table class="table" id='dataTable'>
							<thead>
								<tr>  
								  <th>Sl</th>
								  <th>Bill No</th>
								  <th>Customer Email</th>
								   <th>Amount</th>   <th>Bill Time</th> 
								    <th>Status</th>
						<th>Bill</th> 	
									
								<th>Points</th> 	
								<th>Show/Delete</th>
								</tr>
							</thead>
							<tbody>

<?php
$sql = "SELECT COUNT(*) FROM place_order ";
$result = mysqli_query($con,$sql) or trigger_error("SQL", E_USER_ERROR);
$r = mysqli_fetch_row($result);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 15;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;
$count=1;
$sq="select * from place_order where status='paid' order by id desc LIMIT $offset, $rowsperpage";
$r=mysqli_query($con,$sq);
while($row=mysqli_fetch_array($r)){
	//$status=$row['status'];
$pro_id=$row['order_id'];
	echo "	<tr>
								  <td>$count</td>
								  <td>".$row['order_id']."</td>
								  <td>".$row['user_id']."</td>
								  <td>".$row['amount']."</td>
								  <td>".$row['date']."</td>
									<td>".$row['status']."</td>
										<td><a href='bill.php?user=".$row['user_id']."&order=".$pro_id."' target='_blank'class='label label-info'>Show Bill</a></td>

<td>".$row['redeem']."</td>

								   <td><a href='show_bill.php?id=$pro_id' class='label label-info'>Edit</a>
								  <a href='#' class='label label-danger' onclick='return send();'>Delete</a>
								 </td>
								</tr>";

++$count;
								}

$range = 3;

	echo"<tr><td colspan='10'>";

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=1' class='page'>First</a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage' class='page'>Previous</a> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " <span class='current'>$x</span> ";
      // if not current page...
      } else {
         // make it a link
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x' class='page'>$x</a> ";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage' class='page'>Next</a> ";
   // echo forward link for lastpage
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages' class='page'>Last</a> ";
}  
echo"</td></tr>";
?>							
								</tbody></table>
					</div></div>
			</div>
		</div>
		<!--footer-->
			<?php 
		
		include('footer.php');
		?>