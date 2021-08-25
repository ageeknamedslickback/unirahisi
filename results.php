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

			<?php cart(); ?>
				
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

					if(isset($_GET['search'])){

					$search_query = $_GET['query'];

					$get_product = "select * from products where product_keyword like '%$search_query%'";
					$run_product = mysqli_query($con, $get_product);

					while($row_pro=mysqli_fetch_array($run_product)){
						//make while loop
						$id = $row_pro['product_id'];
						$category = $row_pro['product_category'];
						$brand = $row_pro['product_brand'];
						$title = $row_pro['product_title'];
						$price = $row_pro['product_price'];
						$image = $row_pro['product_image'];

						echo "

							<div id = 'singleprod'>

								<h2>$title</h2>
								
								<img src='Admin/product_images/$image' width='200' height='200' />

								<p><b> Ksh $price</b></p>

								<a href = 'details.php?product_id=$id' style='float:left'>Details</a>
								
								<a href = 'index.php?add_cart=$id'><button style='float:right'>Add to cart</button></a>


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
