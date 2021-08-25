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
			<h2>View all Products</h2>
		</td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>Serial Number</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>

	<?php 

		include("Includes/database.php");

		$getproduct = "select * from products";
		$runproduct = mysqli_query($con, $getproduct);
		$i = 0;

		//create an array of the products
		while($rowproduct=mysqli_fetch_array($runproduct)){

			$proid = $rowproduct['product_id'];
			$protitle = $rowproduct['product_title'];
			$proimage = trim($rowproduct['product_image']);
			$proprice = $rowproduct['product_price'];
			$i++; //for the serial number
		

	 ?>

	 <tr align="center">
	 	<td> <?php echo $i; ?></td>
	 	<td> <?php echo $protitle; ?></td>
	 	<td><img src="product_images/<?php echo $proimage;?>" width="60" height="60" </td>
	 	<td> <?php echo $proprice; ?></td>
	 	<td> <a href="index.php?editproduct=<?php echo $proid ?> ">Edit</a></td>
	 	<td> <a href="delete.php?deleteproduct=<?php echo $proid ?> ">Delete</a></td>
	 </tr>

	<?php } ?>



</table>
<?php //} ?>