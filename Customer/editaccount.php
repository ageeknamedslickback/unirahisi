						<?php 

						include("Includes/database.php");

						$user = $_SESSION['customeremail'];
						$get = "select * from customers where customeremail='$user'";
						$run = mysqli_query($con, $get);
						$row = mysqli_fetch_array($run);

						$id = $row['customerid'];

						$name = $row['customername'];
						$email = $row['customeremail'];
						$password = $row['customerpass'];
						$county = $row['customercounty'];
						$town = $row['customertown'];
						$contact = $row['customercontact'];
						

						 ?>
						 	<!--so as to only update that customer id-->
				<form action="" method="post" enctype="multipart/form-data">
					
					<table align="center" width="750">
						
						<tr align="center">
							<td colspan="6"><h2>Edit your Account</h2></td>
						</tr>

						<tr>
							<td align="right">Customer Name:</td>
							<td><input type="text" name="name" value=" <?php echo $name; ?> " required></td>
						</tr>

						<tr>
							<td align="right">Customer Email:</td>
							<td><input type="text" name="email" value=" <?php echo $email; ?> " required></td>
						</tr>

						<tr>
							<td align="right">Customer Password</td>
							<td><input type="password" name="pass" value=" <?php echo $password; ?> " required></td>
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
							<td><input type="text" name="town" value=" <?php echo $town; ?> " required></td>
						</tr>

						<tr>
							<td align="right">Customer Contact</td>
							<td><input type="text" name="contact" value=" <?php echo $contact; ?> " required></td>
						</tr>

						<tr align="center">
							<td colspan="6"><input type="submit" name="update" value="Update Account"></td>
						</tr>



					</table>


				</form>

			</div>

<?php 

	if(isset($_POST['update'])){

		$ip = getIp();
		$customer_id= $id; 

		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$county = $_POST['county'];
		$town = $_POST['town'];
		$contact = $_POST['contact'];

		$update = "update customers set customername='$name', customeremail='$email', customerpass='$pass', customercounty='$county', customertown='$town', customercontact='$contact' where customerid='$customer_id'";

		$runupdate = mysqli_query($con, $update);

		if ($runupdate) {
			
			echo "<script>alert('Your account succssfully updated')</script>";
			echo "<script>window.open('myaccount.php', '_self')</script>";
		}
	}

		
?>
