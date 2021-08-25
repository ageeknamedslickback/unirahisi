<?php 
	//session_start();

	if (isset($_SESSION['email'])) {
		# from table
		echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	}
	//else{
 ?>

<table width="795" align="center" bgcolor="orange">
	
	<tr align="center">
		<td colspan="6">
			<h2>View all Categories</h2>
		</td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>Category id</th>
		<th>Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>

	<?php 

		include("Includes/database.php");

		$getcategory = "select * from categories";
		$runcategory = mysqli_query($con, $getcategory);
		$i = 0;

		//create an array of the products
		while($rowcategory=mysqli_fetch_array($runcategory)){

			$catid = $rowcategory['category_id'];
			$cattitle = $rowcategory['category_title'];
			//$proimage = trim($rowproduct['product_image']);
			//$proprice = $rowproduct['product_price'];
			$i++; //for the serial number
		

	 ?>

	 <tr align="center">
	 	<td> <?php echo $i; ?></td>
	 	<td> <?php echo $cattitle; ?></td>
	 	<!--<td><img src="product_images/<?php echo $proimage;?>" width="60" height="60" </td>
	 	<td> <?php echo $proprice; ?></td>-->
	 	<td> <a href="index.php?editcategory=<?php echo $catid ?> ">Edit</a></td>
	 	<td> <a href="deletecategory.php?deletecategory=<?php echo $catid ?> ">Delete</a></td>
	 </tr>

	<?php } ?>



</table>
<?php //} ?>
