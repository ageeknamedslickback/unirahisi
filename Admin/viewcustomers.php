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
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Delete</th>
	</tr>

	<?php 

		include("Includes/database.php");

		$getcustomer = "select * from customers";
		$runcustomer = mysqli_query($con, $getcustomer);
		$i = 0;

		//create an array of the products
		while($rowcustomer=mysqli_fetch_array($runcustomer)){

			$cusid = $rowcustomer['customerid'];
			$cusname = $rowcustomer['customername'];
			//$proimage = trim($rowproduct['product_image']);
			$cusemail = $rowcustomer['customeremail'];
			$i++; //for the serial number
		

	 ?>

	 <tr align="center">
	 	<td> <?php echo $i; ?></td>
	 	<td> <?php echo $cusname; ?></td>
	 	<!--<td><img src="product_images/<?php echo $proimage;?>" width="60" height="60" </td>-->
	 	<td> <?php echo $cusemail; ?></td>
	 	<!--<td> <a href="index.php?editproduct=<?php echo $proid ?> ">Edit</a></td>-->
	 	<td> <a href="deletecustomer.php?deletecustomer=<?php echo $cusid ?> ">Delete</a></td>
	 </tr>

	<?php } ?>



</table>
<?php //} ?>
