<!DOCTYPE html>
<?php 
	session_start();

	if (!isset($_SESSION['email'])) {
		# from table
		echo "<script>window.open('login.php?not_Admin=You are not an admin!', '_self')</script> ";
	}
	else{
 ?>

<?php 
	include ("connections/dbconnection.php");

	if (isset($_GET['editproduct'])) {
		
		$getid = $_GET['editproduct'];

		$getproduct = "select * from products where product_id='$getid'";

		$runproduct = mysqli_query($con, $getproduct);

		$i = 0;

		//create an array of the products
		$rowproduct=mysqli_fetch_array($runproduct);

			$proid = $rowproduct['product_id'];
			$protitle = $rowproduct['product_title'];
			$proimage = trim($rowproduct['product_image']);
			$proprice = $rowproduct['product_price'];
			//$i++; //for the serial number
			$prodescription = $rowproduct['product_description'];
			$prokeywords = $rowproduct['product_keyword'];
			$procategory = $rowproduct['product_category'];
			$probrand = $rowproduct['product_brand'];

			$catname = "select * from categories where category_id = '$procategory' ";
			$runcatname = mysqli_query($con, $catname);
			$rowcatname = mysqli_fetch_array($runcatname);
			$categorytitle = $rowcatname['category_title'];

			$brandname = "select * from brand where brand_id = '$probrand' ";
			$runbrandname = mysqli_query($con, $brandname);
			$rowbrandname = mysqli_fetch_array($runbrandname);
			$brandtitle = $rowbrandname['brand_title'];
	}

 ?>
<html>
<head>
	<title>Update Product</title>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>

</head>
<body bgcolor="skyblue">

	<form action="" method="POST" enctype="multipart/form-data">
		
		<table align="center" width="795" border="2" bgcolor="orange">
			
			<tr align="center">		
				<td colspan="7"> <h2>Edit product</h2></td>
			</tr>

			<tr>
				<td align="right"> <b>Product Title</b></td>
				<td><input type="varchar" name="title" value=" <?php echo $protitle;  ?> "></td>
			</tr>

			<tr>
				<td align="right"> <b>Product Category</b></td>
				<td>
					<select name="category">
						<option><?php echo $categorytitle;  ?></option>
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
					<select name="brand">
						<option><?php echo $brandtitle;  ?></option>
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
				<td><input type="file" name="product_image"> <img src="product_images/<?php echo $proimage; ?> " width="60" height="60"></td>
			</tr>

			<tr>
				<td align="right"><b>Product Price</b></td>
				<td><input type="text" name="price" size="50" value=" <?php echo $proprice;  ?> "></td>
			</tr>

			<tr>
				<td align="right"><b>Product Description</b></td>
				<td><textarea name="description" cols="20" rows="10"><?php echo $prodescription;  ?> </textarea></td>
			</tr>

			<tr>
				<td align="right"><b>Product Keywords</b></td>
				<td><input type="text" name="keywords" value=" <?php echo $prokeywords;  ?> "></td>
			</tr>

			<tr align="center">
				<td colspan="7"><input type="submit" name="update" value="Update"></td>
			</tr>



		</table>

	</form>
</body>
</html>

<?php 
	
	if(isset($_POST['update'])){

		//getting text data from the fields
		$updateproid=$proid;

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
		$update = "update products set product_category = '$product_category', product_brand='$product_brand', product_title='$product_title', product_price='$product_price', product_description='$product_description', product_image='$product_image', product_keyword='$product_keyword' where product_id='$updateproid' ";

		$runupdate = mysqli_query($con, $update);

		if($runupdate){

			echo "<script>alert('Product has been updated')</script>";
			echo "<script>window.open('index.php?viewproduct', '_self')</script>";
		}
	}



 ?>
 <?php } ?>