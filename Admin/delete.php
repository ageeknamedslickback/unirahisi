<?php 
	session_start();

	if (isset($_SESSION['email'])) {
		# from table
		echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	}
	//else{
 ?>>

<?php 

include("Includes/database.php");
	
	if (isset($_GET['deleteproduct'])) {

		$deleteproductid= $_GET['deleteproduct'];
		//using get method catch the id and save in local variable
		//id to delete specific
		$deletepro = "delete from products where product_id='$deleteproductid' ";

		$run = mysqli_query($con, $deletepro);

		if ($run) {
			echo "<script>alert('Product successfully deleted')</script>";
			echo "<script>window.open('index.php?viewproduct', '_self')</script> ";
		}

		
	}

 ?>
 <?php //} ?>