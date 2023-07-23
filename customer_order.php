<?php

session_start();
if(!isset($_SESSION["name"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ePakke | Netthandel</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<style></style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top" style="background:white;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="/" class="navbar-brand"><h1><span class ="lime">e</span>Pakke.no</h1></a>
				<a href="/" class="navbar-brand"><img src="img/pakke.png" style="width:35px; position:relative; top:-10px; left:-22px;"></a>
				<ul class="nav navbar-nav">
					<li><a href="/"><img src="img/produkt.jpg" style="width:30px;">Produkter</a></li>
				</ul>
			</div>

			<ul class="nav navbar-nav">
				<li><a href="kontaktinfo.php"><img src="img/info.jpg" style="width:30px;">Kontaktinfo</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="javascript:;" class="dropdown-toggle" id="handlekurv" data-toggle="dropdown"><img src="img/handlekurv.jpg" style="width:30px;">Handlekurv<span class="badge" style="position:relative;left:1px;"></span></a>
					<ul class="dropdown-menu" style="width:600px;">
						<div class="panel panel-success">
							<div class="kryss" style="position:absolute;left:589px;top:-1px;color:gray;font-size:18px;">x</div>
							<div class="panel-heading" style="margin-bottom:10px;">
								<div class="row">
									<div class="col-md-3">Produktbilde</div>
									<div class="col-md-3">Produkt</div>
									<div class="col-md-3">Antall</div>
									<div class="col-md-3">Pris i NOK</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
								</div>
							</div>
						</div>
					</ul>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/profil.jpg" style="width:30px;"><?php echo $_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
						<li><a href="customer_order.php" style="text-decoration:none;font-weight:bold;color:gray;height:40px;padding-top:10px;">Mine ordre</a></li>
						<hr style="padding:0;margin:0;">
						<li><a href="logout.php" style="text-decoration:none;font-weight:bold;color:gray;height:40px;padding-top:10px;">Logg ut</a></li>
					</ul>
				</li>

			</ul>
		</div>
	</div>
	</div>
	<br/>
	<br/>
	<br/>
	<br/>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body">
						<h1 style="padding-top:13px;">Mine ordre</h1>
						<?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];
							$orders_list = "SELECT o.order_id,o.user_id,o.product_id,o.qty,o.trx_id,o.p_status,p.product_title,p.product_price,p.product_image FROM orders o,products p WHERE o.user_id='$user_id' AND o.product_id=p.product_id";
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									?>
										<div class="row">
											<div class="col-md-6">
												<img style="float:right;" src="product_images/<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col-md-6">
												<table>
													<tr><td>Produkt</td><td><b><?php echo $row["product_title"]; ?></b> </td></tr>
													<tr><td>Pris</td><td><b><?php echo "$ ".$row["product_price"]; ?></b></td></tr>
													<tr><td>Antall</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
													<tr><td>Ordre ID</td><td><b><?php echo $row["trx_id"]; ?></b></td></tr>
												</table>
											</div>
										</div>
									<?php
								}
							} else{
								echo "<div class='alert alert-info'><b>Ingen ordre</b></div>";
							}
						?>

					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
