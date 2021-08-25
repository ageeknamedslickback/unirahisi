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

if (isset($_GET['editbrand'])) {
	
	$brandid = $_GET['editbrand'];

	$getbrand = "select * from brand where brand_id='$brandid' ";

	$runbrand = mysqli_query($con, $getbrand);

	$rowbrand = mysqli_fetch_array($runbrand);//fetch data put in array

	$brandid = $rowbrand['brand_id'];
	$brandtitle = $rowbrand['brand_title'];
}

 ?>
<form action="" method="post" style="padding: 80px;">
	
	<b>Update brand</b>
	<input type="text" name="newbrand" value="<?php echo $brandtitle; ?> ">
	<input type="submit" name="updatebrand" value="Update brand">


</form>

<?php 



	if (isset($_POST['updatebrand'])) {

	$updateid = $brandid;

	$newbrand = $_POST['newbrand'];

	$updatebrand = "update brand set brand_title='$newbrand' where brand_id='$updateid'";

	$runupdate = mysqli_query($con, $updatebrand);

	if ($runupdate) {
		
		echo "<script>alert('Brand updated')</script> ";
		echo "<script>window.open('index.php?viewbrands', '_self')</script>";

	}
}

 ?>
 <?php //} ?>