<?php 
	//session_start();

	if (isset($_SESSION['email'])) {
		# from table
		echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	}
	//else{
 ?>

<?php 

include("Includes/database.php");
	
	if (isset($_GET['deletecustomer'])) {

		$deleteid= $_GET['deletecustomer'];
		//using get method catch the id and save in local variable
		//id to delete specific
		$deletecus = "delete from customers where customerid='$deleteid' ";

		$run = mysqli_query($con, $deletecus);

		if ($run) {
			echo "<script>alert('Customer successfully deleted')</script>";
			echo "<script>window.open('index.php?viewcustomers', '_self')</script> ";
		}

		
	}

 ?>
 <?php //} ?>