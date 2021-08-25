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

if (isset($_GET['editcategory'])) {
	
	$catid = $_GET['editcategory'];

	$getcat = "select * from categories where category_id='$catid' ";

	$runcat = mysqli_query($con, $getcat);

	$rowcat = mysqli_fetch_array($runcat);//fetch data put in array

	$catid = $rowcat['category_id'];
	$cattitle = $rowcat['category_title'];
}

 ?>


<form action="" method="post" style="padding: 80px;">
	
	<b>Update Category</b>
	<input type="text" name="updatecategory" value=" <?php echo $cattitle ?>">
	<input type="submit" name="addcategory" value="Update Category">


</form>

<?php 



	if (isset($_POST['updatecategory'])) {

	$update = $catid;//from above

	$newcategory = $_POST['updatecategory'];

	$updatecategory = "update categories set category_title='$newcategory' where category_id='$update'" ;

	$run = mysqli_query($con, $updatecategory);

	if ($run) {
		
		echo "<script>alert('Category updated')</script> ";
		echo "<script>window.open('index.php?viewcategory', '_self')</script>";

	}
}

 ?>
 <?php //} ?>