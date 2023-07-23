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
				<a href="" class="navbar-brand"><h1><span class ="lime">e</span>Pakke.no</h1></a>
				<a href="" class="navbar-brand"><img src="img/pakke.png" style="width:35px; position:relative; top:-10px; left:-22px;"></a>
				<ul class="nav navbar-nav">
					<li><a href=""><img src="img/produkt.jpg" style="width:30px;">Produkter</a></li>
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

	<div style="position:absolute;top:600px;">
	<h1 style="padding-left:19px;height:50px;width:250px;font-size:31px;position:relative;top:6px;"><span class ="lime" style="font-size:119%;">e</span>Pakke<img src="img/pakke.png" style="width:30px;position:relative;top:-12px;left:-7px;"></h1>
	<p style="padding-left:19px;font-weight:bold;">Lillestrøm, Norge</p>
	<img src="img/bitcoinaccepted.jpg" style="width:100px;padding-right:3px;"><img src="img/betalingslosning.jpg" style="width:100px;">
	</div>

	<div class="row">
		<div class="col-md-2 col-xs-12">
			<div id="get_category" style="position:relative; top: 29px; width:200px;">
			</div>
			<!--<div class="nav nav-pills nav-stacked">
				<li class="active"><a href="#"><h4>Categories</h4></a></li>
				<li><a href="#">Categories</a></li>
				<li><a href="#">Categories</a></li>
				<li><a href="#">Categories</a></li>
				<li><a href="#">Categories</a></li>
			</div> -->
		</div>
		<div class="col-md-8 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12" id="product_msg">
				</div>
			</div>
			<div class="panel panel-info" style="position:relative; border:none; top:21px; left:30px;width:1400px;">
				<div class="panel-body">
					<div id="get_product">
						<!--Here we get product jquery Ajax Request-->
					</div>
					<!--<div class="col-md-4">
						<div class="panel panel-info">
							<div class="panel-heading">Samsung Galaxy</div>
							<div class="panel-body">
								<img src="product_images/images.JPG"/>
							</div>
							<div class="panel-heading">$.500.00
								<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<div class="panel-footer" style="text-align:center;"><p style="font-weight:bold;">kundeservice@epakke.no</p>&copy; 2019 ePakke · <a href="kontaktinfo.php">Kontaktinfo</a></div>
</body>
</html>
