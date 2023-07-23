<?php
session_start();
include "db.php";
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active' style='width: 233px; text-align:center;font-size:16px;'><a href=''>Alle kategorier</a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}


if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}

if(isset($_POST["getProduct"])){
	echo "
	<div class='alert alert-success' style='position:relative;top:10px;'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>GRATIS FRAKT til hele Norge!</b>
	</div>
	";
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image1 = $row['product_image1'];
			$pro_desc  = $row['product_desc'];
			echo "
			<a href='#' class='selectProduct' pid='$pro_id'>
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-body'>
								<div class='container'>
 <div id='content-slider'>
		<div id='slider'>

			 <ul>
			 <li id='first' class='firstanimation'>
			 <img src='product_images/$pro_image1' style='width:400px;height:width;'/>
			 </li>

			 <li id='second' class='secondanimation'>
			 <img src='product_images/$pro_image2' style='width:400px;height:width;'/>
			 </li>

			 <li id='third' class='thirdanimation'>
			 <img src='product_images/$pro_image1' style='width:400px;height:width;'/>
			 </li>
			 </ul>
		</div>
 </div>
</div>
								</div>
								<div class='panel-heading'>$pro_title - $pro_desc</div>
								</a>
								<div class='panel-heading'>$pro_price.00 kr
								<button pid='$pro_id' style='float:right;' id='product' class='btn leggihandlekurven btn-xs'>Legg i handlekurven</button>
								</div>
								<hr>
							</div>
						</div>
			";
		}
	}
}

if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		echo "
		<div class='alert alert-success' style='position:relative;top:10px;'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<b>GRATIS FRAKT til hele Norge!</b>
		</div>
		";
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}

	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image1 = $row['product_image1'];
			$pro_desc  = $row['product_desc'];
			echo "
			<a href='#' class='selectProduct' pid='$pro_id'>
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-body'>
								<div class='container'>
 <div id='content-slider'>
		<div id='slider'>

			 <ul>
			 <li id='first' class='firstanimation'>
			 <img src='product_images/$pro_image1' style='width:400px;height:width;'/>
			 </li>

			 <li id='second' class='secondanimation'>
			 <img src='product_images/$pro_image2' style='width:400px;height:width;'/>
			 </li>

			 <li id='third' class='thirdanimation'>
			 <img src='product_images/$pro_image1' style='width:400px;height:width;'/>
			 </li>
			 </ul>
		</div>
 </div>
</div>
								</div>
								<div class='panel-heading'>$pro_title - $pro_desc</div>
								</a>
								<div class='panel-heading'>$pro_price.00 kr
								<button pid='$pro_id' style='float:right;' id='product' class='btn leggihandlekurven btn-xs'>Legg i handlekurven</button>
								</div>
								<hr>
							</div>
						</div>
			";
		}
	}

	if(isset($_POST["selectProduct"])){
		echo "
		<div class='alert alert-success' style='position:relative;top:10px;'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<b>GRATIS FRAKT til hele Norge!</b>
		</div>
		";
		$id = $_POST["product_id"];
		$sql = "SELECT * FROM products WHERE product_id = '$id'";
		$run_query = mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($run_query)){
				$pid = $row["product_id"];
				$pro_id    = $row['product_id'];
				$pro_cat   = $row['product_cat'];
				$pro_brand = $row['product_brand'];
				$pro_title = $row['product_title'];
				$pro_price = $row['product_price'];
				$pro_image1 = $row['product_image1'];
				$pro_desc  = $row['product_desc'];
				$pro_key	 = $row['product_keywords'];
				$pro_spec = $row['product_specs'];
				echo "
					<div class='col-md-4'>
								<div class='panel panel-info'>
									<div class='panel-body'>
									<div class='kontainer'>
	 <div id='content-slider'>
			<div id='slidersin'>

				 <ul>
				 <li id='first' class='firstanimation'>
				 <img src='product_images/$pro_image1' style='width:400px;height:width;'/>
				 </li>

				 <li id='second' class='secondanimation'>
				 <img src='product_images/$pro_image2' style='width:400px;height:width;'/>
				 </li>

				 <li id='third' class='thirdanimation'>
				 <img src='product_images/$pro_image1' style='width:400px;height:width;'/>
				 </li>
				 </ul>
			</div>
	 </div>
	</div>
									</div>
									<div class='panel-heading'>$pro_title - $pro_desc</div>
									<div class='panel-heading'>$pro_price.00 kr
									<button pid='$pro_id' style='float:right;' id='product' class='btn leggihandlekurven btn-xs'>Legg i handlekurven</button>
									</div>
									<hr>
								</div>
							</div>
							<div style='position:relative;left:30px;top:10px; font-weight:bold;'>$pro_key</div>
							<br>
							<br>
							<div style='width:400px !important;position:absolute;left:550px;font-size:12px;'>$pro_spec</div>
							<div style='position:relative;top:350px;left:800px;'><img src='img/$pro_brand.jpg' style='width:60px;height:width;'/></div>
				";
			}
	}



	if(isset($_POST["addToCart"])){


		$p_id = $_POST["proId"];


		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			$sql = "UPDATE `cart` SET `qty`=qty+1 WHERE p_id = '$p_id' AND user_id = '$user_id'";
			if(mysqli_query($con,$sql)){
				echo "";
				exit();
			}
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `user_id`, `qty`)
			VALUES ('$p_id','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "";
			}
		}
		}else{
do {
			$user_id = (rand(1,99));

			$sql = "SELECT id FROM cart WHERE user_id = '$user_id' LIMIT 1" ;
			$check_query = mysqli_query($con,$sql);
			$count_user_id = mysqli_num_rows($check_query);
		} while($count_user_id > 0);


if($user_id){
			$sql = "INSERT INTO `cart`
			(`p_id`, `user_id`, `qty`)
			VALUES ('$p_id','$user_id','1')";
			if (mysqli_query($con,$sql)) {
				$_SESSION["uid"] = $user_id;
				echo "";
				exit();
			}
		}
		}




	}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
		$sql = "SELECT SUM(qty) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";

	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image1,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image1,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			echo "<form method='post' action='login_form.php'>";
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image1 = $row["product_image1"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				echo '
					<div class="row">
					<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
					<input type="hidden" name="" value="'.$cart_item_id.'"/>
						<div class="col-md-3"><img style="width:150px;height:width;" src="product_images/'.$product_image1.'" />
						</div>
						<div class="col-md-2" style="top:21px;left:10px;">'.$product_title.'
						</div>
						<div class="col-md-2" style="position:relative;left:50px;">
						<div class="btn-group">
						<a href="javascript:;" update_plus="'.$product_id.'" class="btn updatep"><img src="img/plus.jpg" style="width:13px;position:relative;left:-3px;">
						</a>
						<div>
						<input type="text" class="form-control qty" value="'.$qty.'" readonly="readonly" style="width:33px;padding:0;text-align:center;">
						</div>
						<a href="javascript:;" update_minus="'.$product_id.'" class="btn updatem"><img src="img/minus.jpg" style="width:13px;position:relative;left:-3px;">
						</a>
						</div>
						</div>
						<div class="col-md-2">
						</div>
						<div class="col-md-2" style="position:relative;top:34px;left:-11px;"><input type="text" class="form-control price" value="'.$product_price.'kr" readonly="readonly">
						</div>
						<div class="col-md-2">
						</div>
						<div class="col-md-2">
						<div class="btn-group">
						<a href="javascript:;" remove_id="'.$product_id.'" class="btn btn-danger remove"style="position:relative;left:86px;top:1px;"><img src="img/trash.png" style="width:16px;position:relative;left:-2px;"></a>
						</div>
						</div>
					</div><hr>';



			}


			if(isset($_SESSION["name"])){
				echo '<a style="float:right;left:-6px;top:-9px;" href="cart.php" class="gotilkassen btn btn-warning">Til kassen<span class="glyphicon glyphicon-checkout"></span></a>';
			}else{
		  	echo '<a style="float:right;left:-6px;top:-9px;" href="customer_registration.php" class="gotilkassen btn btn-warning">Til kassen<span class="glyphicon glyphicon-checkout"></span></a>';
			}
			?>
			<?php
		} else {
			echo "
				<div class='alert alert-info'>
					<b>Handlekurven er tom</b>
				</div>
			";
			exit();
		}
	}
	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image1"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo
						'<div class="row">
						<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
						<input type="hidden" name="" value="'.$cart_item_id.'"/>
							<div class="col-md-3"><img style="width:150px;height:width;" src="product_images/'.$product_image.'" />
							</div>
							<div class="col-md-2" style="top:30px;left:7px;">'.$product_title.'
							</div>
							<div class="col-md-2" style="position:relative;left:50px;">
							<div class="btn-group">
							<a href="javascript:;" update_plus="'.$product_id.'" class="btn updatep"><img src="img/plus.jpg" style="width:13px;position:relative;left:54px;">
							</a>
							<div>
							<input type="text" class="form-control qty" value="'.$qty.'" readonly="readonly" style="width:33px;padding:0;text-align:center;position:relative;left:57px;">
							</div>
							<a href="javascript:;" update_minus="'.$product_id.'" class="btn updatem"><img src="img/minus.jpg" style="width:13px;position:relative;left:54px;">
							</a>
							</div>
							</div>
							<div class="col-md-2">
							</div>
							<div class="col-md-2" style="width:90px;position:relative;top:34px;left:-4px;"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
							<div class="col-md-2">
							</div>
							<div class="col-md-2">
							<div class="btn-group">
							<a href="javascript:;" remove_id="'.$product_id.'" class="btn btn-danger remove"style="position:relative;left:76px;top:34px;"><img src="img/trash.png" style="width:16px;position:relative;left:-2px;"></a>
							</div>
							</div>
						</div>';
				}

				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:16px;"> </b>
					</div>';
				if(isset($_SESSION["name"])){
					//Paypal checkout form
					echo '
						</form>
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="WNN5NM8H8FL7S">';

							$x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo
									'<input type="hidden" name="item_name" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number" value="'.$x.'">
								     <input type="hidden" name="amount" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity" value="'.$row["qty"].'">';
								}

							echo'
									<input type="hidden" name="currency_code" value="NOK"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									<input type="image" style="float:right;padding-right:30px;padding-bottom:3px;" src="https://www.paypalobjects.com/no_NO/NO/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – en trygg og enkel betalingsmetode på nettet!">
									<img alt="" border="0" src="https://www.paypalobjects.com/no_NO/i/scr/pixel.gif" width="1" height="1">
									</form>';
				}
			}
	}


}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id'";
	}
	if(mysqli_query($con,$sql)){
		exit();
	}
}

//Update Item From cart
if (isset($_POST["updatePCartItem"])) {
	$update_plus = $_POST["update_plus"];
	if (isset($_POST["update_plus"])) {
		$update_plus = $_POST["update_plus"];
		$sql = "UPDATE cart SET qty=qty+1 WHERE p_id = '$update_plus' AND user_id = '$_SESSION[uid]'";
	}
	if(mysqli_query($con,$sql)){
		echo "";
		exit();
	}
}

if (isset($_POST["updateMCartItem"])) {
	$update_minus = $_POST["update_minus"];
	$qty = $_POST["qty"];
	if ($qty > 1) {
	if (isset($_POST["update_minus"])) {
		$update_minus = $_POST["update_minus"];
		$sql = "UPDATE cart SET qty=qty-1 WHERE p_id = '$update_minus' AND user_id = '$_SESSION[uid]'";
	}
	if(mysqli_query($con,$sql)){
		echo "";
		exit();
	}
}
}




?>
