<?php 
include("Includes/database.php");
 ?>
<div> 

	<form action="" method ="post" >

		<table width="500" align="centre" bgcolor="skyblue">

		<tr align="centre"> 

			<td colspan="3"><h2>Login or Register to Buy</h2></td>

		</tr>

		<tr>
			
			<td align="right">Email:</td>
			<td><input type="text" name="email" placeholder="Email" required></td>

		</tr>

		<tr>
			
			<td align="right">Password:</td>
			<td><input type="password" name="pass" placeholder="Password" required></td>

		</tr>

		<tr align="center">
		
			<td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password</a></td>

		</tr>

		<tr align="center">
			
			<td colspan="3"><input type="submit" name="login" value="Login"></td>

		</tr>
	</table>

	<h2 style="float: right; padding-right: 20px;"><a href="customerregister.php" style="text-decoration: none;">Register here</a></h2>

	</form>

<?php 

	if(isset($_POST['login'])){

		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$select = "select * from customer where customerpass='$pass' AND customeremail='$email'";

		$runquery = mysqli_query($con, $select);

		//$checkdb = mysqli_num_rows($runquery); 

		if(!$select || mysqli_num_rows($runquery) == 0){

			$_SESSION['customeremail']=$email;
			echo "<script>alert('Password or Email is incorrect')</script>";
			exit();

		}
		//else{

			//$_SESSION['customeremail']=$email;
			//echo "<script>window.open('index.php?logged_in=You have successfully logged in', '_self') </script>";
		//}

		$ip = getIp();

		$get = "select *from cart where ip_add='$ip'";

		$runget = mysqli_query($con, $get);

		$checkcart = mysqli_num_rows($runget);

		if($checkcart==0){

			$_SESSION['customeremail']=$email;

			echo"<script>alert('Login Succesful')</script>";

			echo"<script>window.open('Customer/myaccount.php', '_self')</script>";
		}

		else{

			$_SESSION['customeremail']=$email;

			echo"<script>alert('Login Successful')</script>";

			echo"<script>window.open('checkout.php', '_self')</script>";
		}
		}

		

	 

 ?>

</div>
