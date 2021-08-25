<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<div class="login-page">
  <div class="form">
    <!--<form class="register-form">
      <input type="text" placeholder="email" name="email" />
      <input type="password" placeholder="password" name="password" />
     
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>-->
    <form method="post" action="index.php" class="login-form">
    	<h2 style="color: black; text-align: center;"><?php echo @$_GET['not_Admin']; ?> </h2>
    	<h2 style="color: black; text-align: center;"><?php echo @$_GET['logged_out']; ?> </h2>
      <input type="text" placeholder="email" name="email" required />
      <input type="password" placeholder="password" name="password" required />
      <button type="submit" name="login">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>

</body>
</html>

<?php 

include("Includes/database.php"); 
	
	if(isset($_POST['login'])){
	
		$email = mysql_real_escape_string($_POST['email']);
		$pass = mysql_real_escape_string($_POST['password']);
	
	$sel_user = "select * from admin where email='$email' AND password='$pass'";
	
	$run_user = mysqli_query($con, $sel_user); 
	
	 $check_user = mysqli_num_rows($run_user); 
	
	if($check_user==1){
	
	$_SESSION['email']=$email; 
	
	echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	
	}
	else {
	
	echo "<script>alert('Password or Email is wrong, try again!')</script>";
	
	}
	
	
	}
	
	
	
	
	








?>