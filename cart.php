<!DOCTYPE html>
<?php 
session_start();
include("Functions/functions.php");
include("Includes/database.php");
 ?>
<html>
<head>
	<title>Uni-Rahisi</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all" >
</head>
<body>
	<!-- main container start-->
	<div class="main_wrapper">
		
		<!--header-->
		<div class="header_wrapper">
			
			<img id="logo" src="Images/Uniform-Logo.jpg" height="100" width="200">
			<img id="banner" src="Images/logoimages (5).jpeg" height="100" width="800">

		</div> 
		<!-- ends header-->
		<hr>

		<!-- Navigation bar start-->
		<div class="menubar">
			
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="Customer/myaccount.php">My account</a></li>
				<li><a href="cart.php">Shopping cart</a></li>
				<li><a href="#">Contact Us</a></li>
			
			</ul>


			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					 <!--Displays even images-->
					<input type="text" name="query" placeholder="search">
					<input type="submit" name="search" value="search">
				</form>


			</div>
		</div>
		 <!--Navigation bar ends-->

		
			
		<!-- content area-->
		<div class="content_wrapper">

			<?php cart(); ?>
				
				<div id="shoppingcart">
					
					<span style="float: right; padding: 5px; line-height: 30px;">

						<?php 

						if(isset($_SESSION['customeremail'])){

							echo "Welcome:" . $_SESSION['customeremail'];
						}

						else{

							echo "Welcome guest";
						}

						 ?>

					 <b style="color: orange">Shopping cart</b> Total items: <?php total(); ?> Total price: <?php price(); ?><a href="index.php" style="color: orange">Back to shop</a>

					  <?php 
//if email is not set then take to the login page
					 if(!isset($_SESSION['customeremail'])){

					 	echo "<a href='checkout.php'>Login</a>";
					 }

					 else{

					 	echo"<a href='logout.php'>Logout</a>";
					 }
//if set you can log out
					 ?>

					</span>

					
			</div>

			

			<hr>

			<div id="sidebar">
				
				<div id="sidebar_title">Categories</div>

					<ul id="cats">
						<?php getCategories(); ?> 
						 <!--function to add the categories straight from the database-->
					</ul>

					
					<div id="sidebar_title">Brands</div>

					<ul id="cats">
						<?php getBrands(); ?>
						 <!--function to add the brands straight from the database-->
					</ul>

			</div>

		


			<div id="content_area">

				
				
				<div id="productcont">

					
					<form action="" method="post" enctype="multipart/form-data">
						
						<table align="centre" width="700" bgcolor="skyblue">
							
							<tr align="centre">
								<th>Remove</th>
								<th>Product(s)</th>
								<th>Quantity</th>
								<th>Total Price</th>
								<th></th>
							</tr>

							<?php

								$total = 0;
								
								global $con; 
								
								$ip = getIp(); 
								
								$sel_price = "select * from cart where ip_add='$ip'";
								
								$run_price = mysqli_query($con, $sel_price); 
								
								while($p_price=mysqli_fetch_array($run_price)){
									
									$pro_id = $p_price['p_id']; 
									
									$pro_price = "select * from products where product_id='$pro_id'";
									
									$run_pro_price = mysqli_query($con,$pro_price); 
									
									while ($pp_price = mysqli_fetch_array($run_pro_price)){
									
									$product_price = array($pp_price['product_price']);
									
									$product_title = $pp_price['product_title'];
									
									$product_image = $pp_price['product_image']; 
									
									$single_price = $pp_price['product_price'];
									
									$values = array_sum($product_price); 
									
									$total += $values; 
											
											?>
											
											<tr align="center">
												<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
												<td><?php echo $product_title; ?><br>
												<img src="Admin/product_images/<?php echo $product_image;?>" width="60" height="60"/>
												</td>
												<td><input type="text" size="2" name="qty" value=""/></td>
												<?php 
												if(isset($_POST['update_cart'])){
												
													$qty = $_POST['qty'];
													
													$update_qty = "update cart set qty='$qty'";
													
													$run_qty = mysqli_query($con, $update_qty); 
													
													$_SESSION['qty']=$qty;
													
													$total = $total * $qty;
												}
												
												
												?>
												
												
												<td><?php echo "Ksh" . $single_price; ?></td>
											</tr>
											
											
										<?php } } ?>
										
										<tr>
												<td colspan="4" align="right"><b>Sub Total:</b></td>
												<td><?php echo "Ksh" . $total;?></td>
											</tr>
											
											<tr align="center">
												<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
												<td><input type="submit" name="continue" value="Continue Shopping"></td>
												<td><input type="submit" name="checkout" value="Checkout"></td>
											</tr>
											
										</table> 
									
									</form>
									
							<?php 
								
							function updatecart(){
								
								global $con; 
								
								$ip = getIp();
								
								if(isset($_POST['update_cart'])){
								
									foreach($_POST['remove'] as $remove_id){
									
									$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
									
									$run_delete = mysqli_query($con, $delete_product); 
									
									if($run_delete){
									
									echo "<script>window.open('cart.php','_self')</script>";
									
									}
									
									}
								
								}
								if(isset($_POST['continue'])){
								
								echo "<script>window.open('index.php','_self')</script>";
								
								}
							
							}
							echo @$up_cart = updatecart();

							if(isset($_POST['checkout'])){
								
								echo "<script>window.open('checkout.php','_self')</script>";
								
								}
							
							?>	
				</div>

			</div>

		</div>
	

		 <!--content area ends-->

		<!-- footer-->
		<br>
		<hr>
		

	</div>
	 <!--main container ends-->

	
</body>
</html>
