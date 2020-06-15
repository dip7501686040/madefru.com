<?php
include('database.php');
session_start();
ob_start();
if(isset($_POST['category']))
{
$category_id=trim($_POST['category']);
?>
<select name="sub_category" id="sub_category" required title="Enter Your Sub Category" class="form-control">
                                <option value="">--Select--</option>
                                <?php
								$sql1="select * from ".$category_id." order by id desc";
								$res1=mysqli_query($con,$sql1) or die(mysqli_error($con));
								while($row1=mysqli_fetch_array($res1))
								{
									echo"<option value='".$row1['sub_category']."'>".$row1['sub_category']."</option>";
								}
								?>
                                </select>
<?php }
?>
