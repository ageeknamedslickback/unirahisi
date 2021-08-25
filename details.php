<!DOCTYPE html>
<?php 
include("Functions/functions.php");
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
				<li><a href="#">Sign up</a></li>
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
				
				<div id="shoppingcart">
					
					<span style="float: right; padding: 5px; line-height: 30px;">

					 <b style="color: orange">Shopping cart</b> Total items: Total price: <a href="cart.php" style="color: orange">Go to cart</a>

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
					
					<?php 

						if (isset($_GET['product_id'])) {

						$id = $_GET['product_id'];
									
						$get_product = "select * from products where product_id='$id'";
						$run_product = mysqli_query($con, $get_product);

						while($row_pro=mysqli_fetch_array($run_product)){
							//make an array
							$id = $row_pro['product_id'];
							$title = $row_pro['product_title'];
							$price = $row_pro['product_price'];
							$image = $row_pro['product_image'];
							$decription = $row_pro['product_description'];

							echo "

								<div id = 'singleprod'>

									<h2>$title</h2>
									
									<img src='Admin/product_images/$image' width='400' height='300' />

									<p><b> Ksh $price</b></p>

									<p><b>$decription</b></p>

									<a href = 'index.php' ?product_id=$id style='float:left'>Go Back</a>
									
									<a href = 'index.php' ?product_id=$id><button style='float:right'>Add to cart</button></a>


								</div>


							";
					//pass a variable to display the details...that is url/get variable 'details.php



						}
					}

					 ?>

					</div>
				</div>

			</div>

		 <!--content area ends-->

		<!-- footer-->
		<br>
		<hr>
		<div id="footer">
			
			<h2 style="text-align:center;padding-top: 50px;">&copy; Kenneth Mathenge</h2>

		</div>
		 <!--footer ends-->

	</div>
	 <!--main container ends-->

	
</body>
</html>
