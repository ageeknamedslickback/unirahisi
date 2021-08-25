<h2 style="text-align: center;">Do you really want to delete your account</h2>
<form action="" method="">
	
	<br>
	<input type="submit" name="yes" value="Yes dude!!">
	<input type="submit" name="no" value="No Way!!">

</form>

<?php 

include("Includes/database.php");

	$user = $_SESSION['customeremail'];

	if(isset($_POST['yes'])){

		$delete = "delete from customers where customeremail='$user";
		$rundelete = mysqli_query($con, $delete);
		echo "<script>alert('Your account has been deleted')</script>";
		echo "<script>window.open('../index.php', '_self')</script> ";

	}

	if(isset($_POST['no'])){

		echo "<script>window.open('myaccount.php', '_self')</script> ";

	}


 ?>