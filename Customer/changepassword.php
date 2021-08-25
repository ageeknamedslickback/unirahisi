
<h2 style="text-align: center;" >Change Password</h2>
<form action="" method="post">
	
	<table align="center" width="600">

	<tr align="center">
		<td align="right">
	Enter current password:
	<input type="password" name="pass1" required>
</td>
</tr>
	<br>
	<tr align="center">
	<td align="right">
	Enter new password:	
	<input type="password" name="pass2" required>
</td>
</tr>
	<br>
	<tr align="center">
		<td align="right">
	Confirm Password:
	<input type="password" name="newpass2" required="">
</td>
</tr>
<tr align="center">
	<td colspan="3">
	<input type="submit" name="change" value="Change Password">
</td>
</tr>

</table>

</form>

<?php 

	include("Includes/database.php");

	if (isset($_POST['change'])) {

		$user = $_SESSION['customeremail'];
		
		$currentpassword=$_POST['pass1'];
		$newpassword=$_POST['pass2'];
		$confirmpassword=$_POST['newpass2'];

		$selectpassword = "select * from customers where customerpass='$currentpassword' AND customeremail='$user' ";

		$runpassword = mysqli_query($con, $selectpassword);

		$checkpassword = mysqli_num_rows($runpassword);

		if($checkpassword==0){

			echo "<script>alert('Your current password is wrong')</script> ";
			exit();
		}

		if($newpassword!=$confirmpassword){

			echo "<script>alert('passwords do not match')</script> ";
			exit();
		}

		else{

			$updatepassword="update cestomers set customerpass='$newpassword' where custgomeremail='$user'";

			$runupdate = mysqli_query($con, $updatepassword);

			echo "<scrip>alert('Your password was changes successfully')</script> ";
			echo "<scrip>window.open('myaccount.php', '_self')</script> ";
		}


	}

 ?>