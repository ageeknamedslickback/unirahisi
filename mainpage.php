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
		
		header
		<div class="header_wrapper">
			


		</div> 
		<!-- ends header-->


		<!-- Navigation bar start-->
		<div class="menubar">
			
			<ul id="menu">
				<li><a href="#">Home</a></li>
				<li><a href="#">Products</a></li>
				<li><a href="#">Sign up</a></li>
				<li><a href="#">Shopping cart</a></li>
				<li><a href="#">Contact Us</a></li>
			
			</ul>


			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					 <!--Displays even images-->
					<input type="text" name="query" placeholder="search"ss>
					<input type="submit" name="search" value="search">
				</form>


			</div>
		</div>
		 <!--Navigation bar ends-->


			
		<!-- content area-->
		<div class="content_wrapper">
				
				<div id="shoppingcart">
					
					<span style="float: right;">

					 <b style="color: orange">Shopping cart</b> Total items: Total price: <a href="cart.php" style="color: orange">Go to cart</a>

					</span>

					
			</div>

			

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
					
					<?php getProducts(); ?>

					
				</div>

			</div>

		</div>
		 <!--content area ends-->

		<!-- footer-->
		<div id="footer">
			
			<h2 style="text-align:center;padding-top: 50px;">&copy; Kenneth Mathenge</h2>

		</div>
		 <!--footer ends-->

	</div>
	 <!--main container ends-->

	
</body>
</html>
