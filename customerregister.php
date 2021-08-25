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

					 <b style="color: orange">Shopping cart</b> Total items: <?php total(); ?> Total price: <?php price(); ?><a href="cart.php" style="color: orange">Go to cart</a>

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

				<form action="customerregister.php" method="post" enctype="multipart/form-data">
					
					<table align="center" width="750">
						
						<tr align="center">
							<td colspan="6"><h2>Create an Account</h2></td>
						</tr>

						<tr>
							<td align="right">Customer Name:</td>
							<td><input type="text" name="name" required></td>
						</tr>

						<tr>
							<td align="right">Customer Email:</td>
							<td><input type="text" name="email" required></td>
						</tr>

						<tr>
							<td align="right">Customer Password</td>
							<td><input type="password" name="pass" required></td>
						</tr>

						<tr>
							<td align="right">Customer County</td>
							<td>
								<select name="county" required>
									<option>Select a County</option>
									<option>Mombasa</option>
									<option>Nairobi</option>
									<option>Kiambu</option>
									<option>Nyeri</option>
									<option>Kisumu</option>
								</select></td>
						</tr>

						<tr>
							<td align="right">Town</td>
							<td><input type="text" name="town" required></td>
						</tr>

						<tr>
							<td align="right">Customer Contact</td>
							<td><input type="text" name="contact" required></td>
						</tr>

						<tr align="center">
							<td colspan="6"><input type="submit" name="register" value="Create Account"></td>
						</tr>



					</table>


				</form>

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

<?php 

	if(isset($_POST['register'])){

		$ip = getIp();
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$county = $_POST['county'];
		$town = $_POST['town'];
		$contact = $_POST['contact'];

		$insert = "INSERT INTO customers (customerip, customername, customeremail, customerpass, customercounty, customertown, customercontact) VALUES ('$ip','$name','$email','$pass','$county','$town','$contact')";

		$run = mysqli_query($con, $insert);

		$get = "select *from cart where ip_add='$ip'";

		$runget = mysqli_query($con, $get);

		$checkget = mysqli_num_rows($runget);

//go to account after registration
		if($checkget==0){

			$_SESSION['customeremail']=$email;

			echo"<script>alert('Registration succesful')</script>";

			echo"<script>window.open('Customer/myaccount.php', '_self')</script>";
		}
//after registering send back to check out page to confirm purchase
		else{

			$_SESSION['customeremail']=$email;

			echo"<script>alert('Registration succesful')</script>";

			echo"<script>window.open('checkout.php', '_self')</script>";
		}
	}



 ?>
