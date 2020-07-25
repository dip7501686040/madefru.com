	<ul class="nav" id="side-menu">
						<li <?php if (stripos($_SERVER['REQUEST_URI'],'dashboard.php')!== false) {echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="dashboard.php"><i class="fa fa-home nav_icon"></i>Dashboard</a>
						</li>
						
					<li <?php if (stripos($_SERVER['REQUEST_URI'],'edit_client.php')!== false || stripos($_SERVER['REQUEST_URI'],'create_staff.php')!== false || stripos($_SERVER['REQUEST_URI'],'registered_com.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_company.php')!== false || stripos($_SERVER['REQUEST_URI'],'pending_company.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_candidate.php')!== false || stripos($_SERVER['REQUEST_URI'],'applied_user_show.php')!== false ) {echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Users<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								
								
								<li>
									<a href="client.php">All Users</a>
								</li>
									
									
								</ul>
						</li>
						
		<li <?php if (stripos($_SERVER['REQUEST_URI'],'edit_product_aesir.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_brand.php')!== false  || stripos($_SERVER['REQUEST_URI'],'entry_brand.php')!== false  || stripos($_SERVER['REQUEST_URI'],'all_category.php')!== false  || stripos($_SERVER['REQUEST_URI'],'entry_category.php')!== false  || stripos($_SERVER['REQUEST_URI'],'entry_product.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_product.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_candidate.php')!== false) {echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Product Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								<li>
									<a href="all_product.php">All Products </a>
								</li>
								<li>
									<a href="entry_product.php">Entry Product</a>
								</li>
								
								<li>
									<a href="all_category.php">All Category </a>
								</li>
								<li>
									<a href="entry_category.php">Entry Category</a>
								</li>
								
								<li>
									<a href="entry_sub_category.php">Entry Sub-Category</a>
								</li>	
								
								<li>
									<a href="entry_sub_sub_category.php">Entry Sub-Sub-Category</a>
								</li>
								<li>
									<a href="all_brand.php">All Brand</a>
								</li>
								<li>
									<a href="entry_brand.php">Entry Brand</a>
								</li>
								
								</ul>
						</li>				
	<li <?php if (stripos($_SERVER['REQUEST_URI'],'edit_banner.php')!== false || stripos($_SERVER['REQUEST_URI'],'edit_delivery.php')!== false ||   stripos($_SERVER['REQUEST_URI'],'all_about.php')!== false || stripos($_SERVER['REQUEST_URI'],'about.php')!== false || stripos($_SERVER['REQUEST_URI'],'banner.php')!== false || stripos($_SERVER['REQUEST_URI'],'logo.php')!== false || stripos($_SERVER['REQUEST_URI'],'edit_logo.php')!== false  ) {echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Order Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								
								
								<li>
									<a href="all_orders.php">All orders</a>
								</li>
							
								</ul>
						</li>
					
						
		
	<li <?php if (stripos($_SERVER['REQUEST_URI'],'edit_banner.php')!== false || stripos($_SERVER['REQUEST_URI'],'edit_delivery.php')!== false ||   stripos($_SERVER['REQUEST_URI'],'all_about.php')!== false || stripos($_SERVER['REQUEST_URI'],'about.php')!== false || stripos($_SERVER['REQUEST_URI'],'banner.php')!== false || stripos($_SERVER['REQUEST_URI'],'logo.php')!== false || stripos($_SERVER['REQUEST_URI'],'edit_logo.php')!== false  ) {echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Seller Management<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								
								
								<li>
									<a href="all-seller.php">All seller</a>
								</li>
								<li>
									<a href="not-approved-product.php">Not Approved Product</a>
								</li>
								<li>
									<a href="approved-product.php">Approved Product</a>
								</li>

								</ul>
						</li>
	
		
		<li <?php if (stripos($_SERVER['REQUEST_URI'],'edit_banner.php')!== false || stripos($_SERVER['REQUEST_URI'],'edit_delivery.php')!== false ||   stripos($_SERVER['REQUEST_URI'],'all_about.php')!== false || stripos($_SERVER['REQUEST_URI'],'about.php')!== false || stripos($_SERVER['REQUEST_URI'],'banner.php')!== false || stripos($_SERVER['REQUEST_URI'],'logo.php')!== false || stripos($_SERVER['REQUEST_URI'],'edit_logo.php')!== false  ) {echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Page Setting<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								
								
								<li>
									<a href="banner.php">Add Banner</a>
								</li>
								<li>
									<a href="all_banner.php">All Banner</a>
								</li>
								<li>
									<a href="logo.php">Add Logo</a>
								</li>
								<li>
									<a href="all_logo.php">All Logo</a>
								</li>
								
								
						 
								
								<li>
									<a href="all_about.php">Edit About Page</a>
								</li>
								
							  
								
								
								</ul>
						</li>
						
						
		<li <?php if (stripos($_SERVER['REQUEST_URI'],'edit_delivery.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_delivery.php')!== false){echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Delivery Page Section <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								
								
 
<li>
<a href="all_delivery.php">Delivery Page</a>
</li>

 </ul>
 	</li>					
						
						
						
		<li <?php if (stripos($_SERVER['REQUEST_URI'],'edit_Privacy.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_Privacy.php')!== false){echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Privacy Policy Page Section <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								
								
 
<li>
<a href="all_Privacy.php">Privacy Policy</a>
</li>

 </ul>
 	</li>
 	

<li <?php if (stripos($_SERVER['REQUEST_URI'],'edit_return_policy.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_return_policy.php')!== false){echo 'class="active"';}
else
echo 'class= ""';
?> >
<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Return policy Page Section <span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">

<li>
<a href="return_policy.php">Return policy</a>
</li>

</ul>
</li>	
						


<li <?php if (stripos($_SERVER['REQUEST_URI'],'edit_terms_policy.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_terms_policy.php')!== false){echo 'class="active"';}
else
echo 'class= ""';
?> >
<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Terms & Condition Page Section <span class="fa arrow"></span></a>
<ul class="nav nav-second-level collapse">

<li>
<a href="terms_policy.php">Terms & Condition</a>
</li>

</ul>
</li>

						
						
						
 <li <?php if (stripos($_SERVER['REQUEST_URI'],'blog.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_blog.php')!== false){echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Blog <span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								
								
								<li>
									<a href="blog.php">Post Blog</a>
								</li>
								<li>
									<a href="all_blog.php">All Blog</a>
								</li>
																
							 
									
								</ul>
						</li>	
										
					<li <?php if (stripos($_SERVER['REQUEST_URI'],'today_bill.php')!== false || stripos($_SERVER['REQUEST_URI'],'show_bill.php')!== false){echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Invoice Report<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								
								
								<li>
									<a href="today_bill.php">Today Placed Bill Report</a>
								</li>
<li>
									<a href="today_paid_bill.php">Today Paid Bill Report</a>
								</li>
																
								<li>
									<a href="all_bill.php">All Invoice Report</a>
								</li>
									
								</ul>
						</li>	
													
	 	
			
					<li <?php if (stripos($_SERVER['REQUEST_URI'],'edit_client.php')!== false || stripos($_SERVER['REQUEST_URI'],'create_staff.php')!== false || stripos($_SERVER['REQUEST_URI'],'registered_com.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_company.php')!== false || stripos($_SERVER['REQUEST_URI'],'pending_company.php')!== false || stripos($_SERVER['REQUEST_URI'],'all_candidate.php')!== false || stripos($_SERVER['REQUEST_URI'],'applied_user_show.php')!== false ) {echo 'class="active"';}
else
	echo 'class= ""';
 ?> >
							<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Testimonial<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level collapse">
								
								
								<li>
								<a href="testimonial.php">Add Testimonial</a>
								</li>
									<li><a href="all-testimonial.php">All Testimonial</a></li>
									
								</ul>
						</li>												
						
								
						
						
					</ul>