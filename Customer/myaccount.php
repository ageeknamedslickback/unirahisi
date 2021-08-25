<!DOCTYPE html>
<?php 

session_start();
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
			
			<a href="../index.php"></a><img id="logo" src="Images/Uniform-Logo.jpg" height="100" width="200">
			<img id="banner" src="Images/logoimages (5).jpeg" height="100" width="800">

		</div> 
		<!-- ends header-->
		<hr>

		<!-- Navigation bar start-->
		<div class="menubar">
			
			<ul id="menu">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../products.php">Products</a></li>
				<li><a href="myaccount.php">My account</a></li>
				<li><a href="../cart.php">Shopping cart</a></li>
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

						 ?>

					


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
				
				<div id="sidebar_title">UniRahisi Account</div>

					<ul id="cats">

						<?php 

						$user = $_SESSION['customeremail'];

						 ?>
						
						<li><a href="myaccount.php?myorders">My Orders</a></li>
						<li><a href="myaccount.php?editaccount">Edit Account</a></li>
						<li><a href="myaccount.php?changepassword">Change Password</a></li>
						<li><a href="myaccount.php?deleteaccount">Delete Account</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>

				</div>

				

		


			<div id="content_area">

				
				
				<div id="productcont"> 
					
					
					
					<?php 

					if (!isset($_GET['myorders'])) {
						if (!isset($_GET['editaccount'])) {
							if (!isset($_GET['changepassword'])) {
								if (!isset($_GET['deleteaccount'])) {
					
					echo "
					<h2 style='padding: 20px;'>Welcome</h2>
					<p>click to see orders <a href='myaccount.php?myorders'>link</a></p>"	;
					}
					}
					}
					}

					 ?>

					<?php 

					if (isset($_GET['editaccount'])) {
					include("editaccount.php");
					}

					if (isset($_GET['changepassword'])) {
					include("changepassword.php");
					}

					if (isset($_GET['deleteaccount'])) {
					include("deleteaccount.php");
					}


					 ?>

					
				</div>

			</div>

		</div>
		 <!--content area ends-->

		<!-- footer-->
		<br>
		<hr>
		<!--<div id="footer">
			
			<h2 style="text-align:center;padding-top: 50px;">&copy; Kenneth Mathenge</h2>

		</div>
		 footer ends-->

	</div>
	 <!--main container ends-->

	
</body>
</html>
