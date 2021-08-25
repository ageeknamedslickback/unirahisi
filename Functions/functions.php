<?php 
 //connection to db

$con = mysqli_connect ("localhost", "root", "", "unirahisi");

if(mysqli_connect_errno())
{
	echo"Connection was not established" . mysqli_connect_errno();
}

//ip add are use to show every customer their specific items in  the world...a single product can be added by diff people


function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//creating the cart...adding carts to the db
function cart(){

if(isset($_GET['add_cart'])){

	global $con; 
	
	$ip = getIp();
	
	$pro_id = $_GET['add_cart'];

	$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
	
	$run_check = mysqli_query($con, $check_pro); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
	
	}
	else {
	
	$insert_pro = "INSERT INTO cart (p_id,ip_add) VALUES ('$pro_id','$ip')";
	
	$run_pro = mysqli_query($con, $insert_pro); 
	
	echo "<script>window.open('cart.php','_self')</script>";
	}
	
}

}

//total items in the cart
function total(){

	if(isset($_GET['add_cart'])){

		global $con;

		$ip = getIp();

		$get_items = "select * from cart where ip_add='$ip'";

		$run_items = mysqli_query($con, $get_items);

		$count_items = mysqli_num_rows($run_items);
	
}
		else{

			global $con;

			$ip = getIp();

			$get_items = "select * from cart where ip_add='$ip'";

			$run_items = mysqli_query($con, $get_items);

			$count_items = mysqli_num_rows($run_items);
			}

		echo $count_items;
	}

//total price of the items *****

	function price(){

		$total = 0; //initialize to 0 lest error

		global $con;

		$ip=getIP();

		$sel_price = "select * from cart where ip_add='$ip'"; //get price from what is in the cart for whoevers ip address

		$run_price = mysqli_query($con, $sel_price);

		while ($p_price = mysqli_fetch_array($run_price)){

			$pro_id = $p_price['p_id'];

			$pro_price = "select * from products where product_id='$pro_id'";

			$run_pro_price = mysqli_query($con, $pro_price);

			//link to the products table to get prices
			while($pp_price = mysqli_fetch_array($run_pro_price)){

				$product_price = array($pp_price['product_price']);
				//array to get all the prices in one

				$values = array_sum($product_price);

				$total +=$values; //sum

			}
		}

		echo "Ksh" . $total;

	}

 //getting the catogries from db and display in the site
function getCategories(){

	global $con; // global variable to work inside $con function
	$get_categories = "select * from categories" ;//sql query

	$run_categories = mysqli_query($con, $get_categories);//run the sql query

	//loop to retrieve all data from the table..
	while ($row_categories=mysqli_fetch_array($run_categories)){

		$category_id = $row_categories ['category_id'];
		$category_title = $row_categories['category_title'];
		//local variable 	//fetch from table

	echo "<li><a href='index.php?cat=$category_id'>$category_title</a></li>";
	}
}

function getBrands(){

	global $con; // global variable to work inside $con function
	
	$get_brands = "select * from brand" ;//sql query

	$run_brands = mysqli_query($con, $get_brands);//run the sql query

	//loop to retrieve all data from the table..
	while ($row_brands=mysqli_fetch_array($run_brands)){

		$brand_id = $row_brands ['brand_id'];
		$brand_title = $row_brands['brand_title'];
		//local variable 	//fetch from table

	echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
}

//getting products from the table

function getProducts(){

	
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){


	global $con;

	$get_product = "select * from products order by RAND() LIMIT 0,6";
	$run_product = mysqli_query($con, $get_product);

	while($row_pro=mysqli_fetch_array($run_product)){
		//make an array
		$id = $row_pro['product_id'];
		$category = $row_pro['product_category'];
		$brand = $row_pro['product_brand'];
		$title = $row_pro['product_title'];
		$price = $row_pro['product_price'];
		$image = $row_pro['product_image'];

		echo "

			<div id = 'singleprod'>

				<h2>$title</h2>
				
				<img src='Admin/product_images/$image' width='200' height='200' />

				<p><b> Ksh $price</b></p>

				<a href = 'details.php?product_id=$id' style='float:left'>Details</a>
				
				<a href = 'index.php?add_cart=$id'><button style='float:right'>Add to cart</button></a>


			</div>


		";
//pass a variable to display the details...that is url/get variable 'details.php



	}
}
}
}


function getCatPro(){
	
	if(isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];

	global $con; 
	
	$get_cat_pro = "select * from products where product_category='$cat_id'";

	$run_cat_pro = mysqli_query($con, $get_cat_pro); 
	
	$count_cats = mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0){
	
	echo "<h2 style='padding:20px;'>No products where found in this category!</h2>";
	
	}
	
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	
		$id = $row_cat_pro['product_id'];
		$category = $row_cat_pro['product_category'];
		$brand = $row_cat_pro['product_brand'];
		$title = $row_cat_pro['product_title'];
		$price = $row_cat_pro['product_price'];
		$image = $row_cat_pro['product_image'];

		echo "
				<div id = 'singleprod'>

				<h2>$title</h2>
				
				<img src='Admin/product_images/$image' width='200' height='200' />

				<p><b> Ksh $price</b></p>

				<a href = 'details.php ?product_id=$id' style='float:left'>Details</a>
				
				<a href = 'index.php ?product_id=$id'><button style='float:right'>Add to cart</button></a>


			</div>
		
		";
		
	
	}
	
}

}


function getBrandPro(){
	
	if(isset($_GET['brand'])){
		
		$brand_id = $_GET['brand'];

	global $con; 
	
	$get_brand_pro = "select * from products where product_brand='$brand_id'";

	$run_brand_pro = mysqli_query($con, $get_brand_pro); 
	
	$count_brands = mysqli_num_rows($run_brand_pro);
	
	if($count_brands==0){
	
	echo "<h2 style='padding:20px;'>No products where found in this category!</h2>";
	
	}
	
	while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
	
		$id = $row_brand_pro['product_id'];
		$category = $row_brand_pro['product_category'];
		$brand = $row_brand_pro['product_brand'];
		$title = $row_brand_pro['product_title'];
		$price = $row_brand_pro['product_price'];
		$image = $row_brand_pro['product_image'];

		echo "
				<div id = 'singleprod'>

				<h2>$title</h2>
				
				<img src='Admin/product_images/$image' width='200' height='200' />

				<p><b> Ksh $price</b></p>

				<a href = 'details.php ?product_id=$id' style='float:left'>Details</a>
				
				<a href = 'index.php ?product_id=$id'><button style='float:right'>Add to cart</button></a>


			</div>
		
		";
		
	
	}
	
}

}


?>