<!DOCTYPE html>
<?php 
	//session_start();

	if (isset($_SESSION['email'])) {
		# from table
		echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	}
	//else{
 ?>


<?php 
	include ("connections/dbconnection.php")
 ?>
<html>
<head>
	<title>Inserting Product</title>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>

</head>
<body bgcolor="skyblue">

	<form action="insertProduct.php" method="POST" enctype="multipart/form-data">
		
		<table align="center" width="795" border="2" bgcolor="orange">
			
			<tr align="center">		
				<td colspan="7"> <h2>Insert newpost here</h2></td>
			</tr>

			<tr>
				<td align="right"> <b>Product Title</b></td>
				<td><input type="varchar" name="title" required></td>
			</tr>

			<tr>
				<td align="right"> <b>Product Category</b></td>
				<td>
					<select name="category" required>
						<option>Select a category</option>
						<?php 
							$get_categories = "select * from categories" ;//sql query

							$run_categories = mysqli_query($con, $get_categories);//run the sql query

							//loop to retrieve all data from the table..
							while ($row_categories=mysqli_fetch_array($run_categories)){

								$category_id = $row_categories ['category_id'];
								$category_title = $row_categories['category_title'];
								//local variable 	//fetch from table

							echo "<option value='$category_id'><a href='#'>$category_title</a></option>";
							}

						 ?>
					</select>
				</td>
			</tr>

			<tr>
				<td align="right"><b>Product Brand</b></td>
				<td>
					<select name="brand" required>
						<option>Select a category</option>
						<?php 
						$get_brands = "select * from brand" ;//sql query

						$run_brands = mysqli_query($con, $get_brands);//run the sql query

						//loop to retrieve all data from the table..
						while ($row_brands=mysqli_fetch_array($run_brands)){

							$brand_id = $row_brands ['brand_id'];
							$brand_title = $row_brands['brand_title'];
							//local variable 	//fetch from table

						echo "<option value='$brand_id'><a href='#'>$brand_title</a></option>";
						}
					?>
					</select>
					
				</td>
			</tr>

			<tr>
				<td align="right"><b>Product Image</b></td>
				<td><input type="file" name="product_image" required></td>
			</tr>

			<tr>
				<td align="right"><b>Product Price</b></td>
				<td><input type="text" name="price" size="50" required></td>
			</tr>

			<tr>
				<td align="right"><b>Product Description</b></td>
				<td><textarea name="description" cols="20" rows="10"></textarea></td>
			</tr>

			<tr>
				<td align="right"><b>Product Keywords</b></td>
				<td><input type="text" name="keywords"></td>
			</tr>

			<tr align="center">
				<td colspan="7"><input type="submit" name="submit" value="Submit"></td>
			</tr>



		</table>

	</form>
</body>
</html>

<?php 
	
	if(isset($_POST['submit'])){

		//getting text data from the fields
		$product_title = $_POST['title'];
		$product_category = $_POST['category'];
		$product_brand = $_POST['brand'];
		$product_price = $_POST['price'];
		$product_description = $_POST['description'];
		$product_keyword = $_POST['keywords'];	

		//getting image
		$product_image = $_FILES['product_image'] ['name'];;
		$product_image_tmp = $_FILES['product_image']['tmp_name'];

		move_uploaded_file($product_image_tmp, "product_images/$product_image");
		//temp name in server and upload it to the folder
		$insert = "INSERT INTO products (product_category, product_brand, product_title, product_price, product_description, product_image, product_keyword) values ('$product_category', '$product_brand', '$product_title', '$product_price', '$product_description', '$product_image', '$product_keyword')";

		$insertdb = mysqli_query($con, $insert);

		if($insertdb){

			echo "<script>alert('New product added')</script>";
			echo "<script>window.open('index.php?insertproduct', '_self')</script>";
		}
	}


 ?>
 <?php //} ?>