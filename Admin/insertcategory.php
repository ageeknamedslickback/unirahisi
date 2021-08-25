<?php 
	//session_start();

	if (isset($_SESSION['email'])) {
		# from table
		echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	}
	//else{
 ?>

<form action="" method="post" style="padding: 80px;">
	
	<b>Insert new Category</b>
	<input type="text" name="category">
	<input type="submit" name="addcategory" value="Add new Category">


</form>

<?php 

include("Includes/database.php");

	if (isset($_POST['category'])) {

	$newcategory = $_POST['category'];

	$insertcategory = "INSERT INTO categories (category_title) VALUES ('$newcategory')";

	$run = mysqli_query($con, $insertcategory);

	if ($run) {
		
		echo "<script>alert('new category added')</script> ";
		echo "<script>window.open('index.php?viewcategory', '_self')</script>";

	}
}

 ?>

 <?php //} ?>