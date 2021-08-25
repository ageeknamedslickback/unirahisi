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
	
	if (isset($_GET['deletecategory'])) {

		$deletecategoryid= $_GET['deletecategory'];
		//using get method catch the id and save in local variable
		//id to delete specific
		$deletecat = "delete from categories where category_id='$deletecategoryid' ";

		$run = mysqli_query($con, $deletecat);

		if ($run) {
			echo "<script>alert('Category successfully deleted')</script>";
			echo "<script>window.open('index.php?viewcategory', '_self')</script> ";
		}

		
	}

 ?>
 <?php //} ?>