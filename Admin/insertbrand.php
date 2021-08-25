<?php 
	//session_start();

	if (isset($_SESSION['email'])) {
		# from table
		echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	}
	//else{
 ?>

<form action="" method="post" style="padding: 80px;">
	
	<b>Insert new brand</b>
	<input type="text" name="brand">
	<input type="submit" name="addbrand" value="Add new brand">


</form>

<?php 

include("Includes/database.php");

	if (isset($_POST['brand'])) {

	$newbrand = $_POST['brand'];

	$insertbrand = "INSERT INTO brand (brand_title) VALUES ('$newbrand')";

	$run = mysqli_query($con, $insertbrand);

	if ($run) {
		
		echo "<script>alert('new brand added')</script> ";
		echo "<script>window.open('index.php?viewbrands', '_self')</script>";

	}
}

 ?>
 <?php //} ?>