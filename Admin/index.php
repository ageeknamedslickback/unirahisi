<?php 
	session_start();

	if (isset($_SESSION['email'])) {
		# from table
		echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	}
	//else{
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="styles/styles.css" media="all">
</head>
<body>

	<div class="mainwrapper">

		<div id="header"></div>

		<div id="right">

			<h2 style="text-align: center;">Manage Content</h2>
			<a href="index.php?insertproduct">Insert Product</a>
			<a href="index.php?viewproduct">View Products</a>
			<a href="index.php?insertcategory">Insert Category</a>
			<a href="index.php?viewcategory">View Categories</a>
			<a href="index.php?insertbrands">Insert Brand</a>
			<a href="index.php?viewbrands">View Brands</a>
			<a href="index.php?viewcustomers">View Customers</a>
			<a href="index.php?vieworders">View Orders</a>
			<a href="index.php?viewpayments">View Payments</a>
			<a href="logout.php">Logout</a>

		</div>

		<div id="left">
			<!--<h2 style="color: black; text-align: center"><?php// echo $_GET['logged_in'];  ?> </h2>-->
			<?php 
				if (isset($_GET['insertproduct'])) {
					include("insertProduct.php");
				}

				if (isset($_GET['viewproduct'])) {
					include("viewproduct.php");
				}

					if (isset($_GET['editproduct'])) {
					include("editproduct.php");
				}

					if (isset($_GET['insertcategory'])) {
					include("insertcategory.php");
				}

					if (isset($_GET['viewcategory'])) {
					include("viewcategory.php");
				}

					if (isset($_GET['editcategory'])) {
					include("editcategory.php");
				}
				
					if (isset($_GET['insertbrands'])) {
					include("insertbrand.php");
				}

					if (isset($_GET['viewbrands'])) {
					include("viewbrands.php");
				}

					if (isset($_GET['editbrand'])) {
					include("editbrand.php");
				}

					if (isset($_GET['viewcustomers'])) {
					include("viewcustomers.php");
				}
			 
			 ?>
		</div>
		

	</div>

</body>
</html>

<?php //} ?>