<?php 
session_start();
include "db.php";

//Get Category
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con, $category_query);
	echo "<div class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#'><h4>Categories</h4></a></li>";
	if(mysqli_num_rows($run_query) > 0) {        
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "<li><a href='#' class='category' cid='$cid'>$cat_name</a></li> ";
		}
	}
	echo "</div>";
}

//Get Brand
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con, $brand_query);
	echo "<div class='nav nav-pills nav-stacked'>
				<li class='active'><a href='#'><h4>Brand</h4></a></li>";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo " <li><a href='#' class='brand' bid = '$bid'>$brand_name</a></li> ";
		}

		}
		echo "</div>";
	}

	//Product by Default
	if(isset($_POST["getProduct"])){
		$product_query = "SELECT * FROM products ORDER BY RAND() LIMIT 0, 6";
		$run_query = mysqli_query($con, $product_query);

		if(mysqli_num_rows($run_query) > 1){
			while($row = mysqli_fetch_array($run_query)){
				$pid = $row["product_id"];
				$pcat = $row["product_cat"];
				$pbrand = $row["product_brand"];
				$ptitle = $row["product_title"];
				$pprice = $row["product_price"];
				$pdescription = $row["product_desc"];
				$pimage = $row["product_image"];
				$pkeyword = $row["product_keyword"];
				echo "<div class='col-md-4'>
						<div class='panel panel-info'>
							<div class='panel-heading'>$ptitle</div>
							<div class='panel-body text-center'>    
									<img width='100%' src='product-image/$pimage' alt=''>
							</div>
							<div class='panel-heading'>$$pprice
									<button pid='$pid' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
							</div>
						</div>
					</div>";
			}
		}
	}

	//By category-wise, brand-wise & keyword-wise
	if(isset($_POST["get_selected_category"]) || isset($_POST["get_selected_brand"]) || isset($_POST["search"])){
		if(isset($_POST["get_selected_category"])){
			$id = $_POST["cat_id"];
			$product_query = "SELECT * FROM products WHERE product_cat = '$id'";
		} else if(isset($_POST["get_selected_brand"])){
			$id = $_POST["brand_id"];
			$product_query = "SELECT * FROM products WHERE product_brand = '$id'";
		} else {
			$id = $_POST["keyword"];
			$product_query = "SELECT * FROM products WHERE product_keyword LIKE '%$id%'";
		}
		
		
		$run_query = mysqli_query($con, $product_query);

		if(mysqli_num_rows($run_query) > 1){
			while($row = mysqli_fetch_array($run_query)){
				$pid = $row["product_id"];
				$pcat = $row["product_cat"];
				$pbrand = $row["product_brand"];
				$ptitle = $row["product_title"];
				$pprice = $row["product_price"];
				$pdescription = $row["product_desc"];
				$pimage = $row["product_image"];
				$pkeyword = $row["product_keyword"];
				echo "<div class='col-md-4 col-sm-4 col-xs-12'>
						<div class='panel panel-info'>
							<div class='panel-heading'>$ptitle</div>
							<div class='panel-body text-center'>    
									<img width='100%' src='product-image/$pimage' alt=''>
							</div>
							<div class='panel-heading'>$$pprice
									<button pid='$pid' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddToCart</button>
							</div>
						</div>
					</div>";
			}
		}
	}  
	
	if(isset($_POST["addToProduct"])){
		$p_id = $_POST["proId"];
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart where p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "<div class='alert alert-warning'>
							 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							 <b>Product is already added into the cart Continue Shopping..!</b>
					 </div>";
		   
		} else {
			$sql = "SELECT * FROM products WHERE product_id = '$p_id'";
			$run_query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($run_query);
				$id = $row["product_id"];
				$pro_name = $row["product_title"];
				$pro_price = $row["product_price"];
				$pro_image = $row["product_image"];

			$ipadd = getUserIpAddr();
			$sql = "INSERT INTO `cart` (`cart_id`, `p_id`, `ip_addr`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) 
			VALUES (NULL, '$id', '$ipadd', '$user_id', '$pro_name', '$pro_image', '1', '$pro_price', '$pro_price')";

			if(mysqli_query($con, $sql)){
				echo "<div class='alert alert-warning'>
							 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							 <b>Product is Added..!</b>
					 </div>";
			}
		}

	}
	function getUserIpAddr(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			//ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			//ip pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	if(isset($_POST["get_cart_product"]) || isset($_POST['cart_checkout'])){

		$uid = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE user_id = '$uid'";

		$run_query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			$i=1;
			while($row = mysqli_fetch_array($run_query)){
				$pro_id = $row["p_id"];
				$pro_image = $row["product_image"];
				$pro_name = $row["product_title"];                
				$pro_price = $row["price"];
				$qty = $row["qty"];
				$total = $row["total_amount"];
				if(isset($_POST['get_cart_product'])){
					
					echo  "<div class='row'>
						<div class='col-md-3 col-sm-3'>$i</div>                    
						<div class='col-md-3 col-sm-3'><img style='width:50px;height:50px;' src='product-image/$pro_image'></div>
						<div class='col-md-3 col-sm-3'>$pro_name</div>
						<div class='col-md-3 col-sm-3'>$.$pro_price.00</div>
					 </div>";
				
					$i++;
				} else {
				
				  echo "<div class='row'>
					<div class='col-md-2'>
						<div class='btn-group'>
							<a href='#' remove_id = '$pro_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
							<a href='#' update_id = '$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign '></span></a>
						</div>
					</div>

					<div class='col-md-2'><img style='width:80px; height:80px;' src='product-image/$pro_image' ></div>
					<div class='col-md-2'>$pro_name</div>
					<div class='col-md-2'><input type='text' class='form-control qty' pid = '$pro_id' id='qty-$pro_id' value='$qty' ></div>
					<div class='col-md-2'><input type='text' class='form-control price' pid = '$pro_id' id='price-$pro_id' value='$pro_price' disabled> </div>
					<div class='col-md-2'><input type='text' class='form-control total' pid = '$pro_id' id='total-$pro_id' value='$total' disabled></div>
					</div>";
				}
			}
		} else {
			echo "<div class='row'>
					<div class='col-md-12 text-center'>Your Cart is empty</div>
				</div>";
		}
	}
	
	if(isset($_POST['removeFromCart'])){
		$pid = $_POST["removeId"];
		$uid = $_SESSION["uid"];

		$sql = "DELETE FROM cart WHERE p_id = '$pid' AND user_id = '$uid'";
		$run_query = mysqli_query($con, $sql);
		if($run_query){
			echo "<div class='alert alert-warning'>
							 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							 <b>Product is Removed..!</b>
				  </div>";
		}
	}

	if(isset($_POST["updateProduct"])){
		$uid = $_SESSION["uid"];
		$pid = $_POST["updateID"];
		$qty = $_POST["qty"];
		$price = $_POST["price"];
		$total = $_POST["total"];

		$sql = "UPDATE cart SET qty = '$qty', price = '$price', total_amount = '$total' WHERE user_id='$uid' AND p_id = '$pid'";
		$run_query = mysqli_query($con, $sql);
		if($run_query){
			echo "<div class='alert alert-success'>
							 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							 <b>Cart is Updated..!</b>
				  </div>";
		}

	}

?>
