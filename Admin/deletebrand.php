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
	
	if (isset($_GET['deletebrand'])) {

		$deletebrandid= $_GET['deletebrand'];
		//using get method catch the id and save in local variable
		//id to delete specific
		$deletebrand = "delete from brand where brand_id='$deletebrandid' ";

		$run = mysqli_query($con, $deletebrand);

		if ($run) {
			echo "<script>alert('Brand successfully deleted')</script>";
			echo "<script>window.open('index.php?viewbrands', '_self')</script> ";
		}

		
	}

 ?>
 <?php //} ?>