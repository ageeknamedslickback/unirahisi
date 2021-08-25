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
			<h2>View all Brands</h2>
		</td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>Brand id</th>
		<th>Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>

	<?php 

		include("Includes/database.php");

		$getbrand = "select * from brand";
		$runbrand = mysqli_query($con, $getbrand);
		$i = 0;

		//create an array of the products
		while($rowbrand=mysqli_fetch_array($runbrand)){

			$brandid = $rowbrand['brand_id'];
			$brandtitle = $rowbrand['brand_title'];
			//$proimage = trim($rowproduct['product_image']);
			//$proprice = $rowproduct['product_price'];
			$i++; //for the serial number
		

	 ?>

	 <tr align="center">
	 	<td> <?php echo $i; ?></td>
	 	<td> <?php echo $brandtitle; ?></td>
	 	<!--<td><img src="product_images/<?php echo $proimage;?>" width="60" height="60" </td>
	 	<td> <?php echo $proprice; ?></td>-->
	 	<td> <a href="index.php?editbrand=<?php echo $brandid ?> ">Edit</a></td>
	 	<td> <a href="deletebrand.php?deletebrand=<?php echo $brandid ?> ">Delete</a></td>
	 </tr>

	<?php } ?>



</table>
<?php //} ?>
