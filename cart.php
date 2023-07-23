<?php
session_start();
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
	<br>
	<br>
	<br>
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-success">
					<div class="panel-heading" style="margin-bottom:10px;">
						<div class="row">
							<div class="col-md-3">Produktbilde</div>
							<div class="col-md-3">Produkt</div>
							<div class="col-md-3">Antall</div>
							<div class="col-md-3">Pris i NOK</div>
						</div>
					</div>
						<div id="cart_checkout"></div>
						<!--<div class="row">
							<div class="col-md-2">
								<div class="btn-group">
									<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									<a href="" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
								</div>
							</div>
							<div class="col-md-2"><img src='product_images/imges.jpg'></div>
							<div class="col-md-2">Product Name</div>
							<div class="col-md-2"><input type='text' class='form-control' value='1' ></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
							<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
						</div> -->
						<!--<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b>Total $500000</b>
							</div> -->
						</div>
						</div>
					</div>
				</div>
			<div class="panel-footer" style="text-align:center;position:absolute;bottom:0px;width:100%;"><p style="font-weight:bold;">kundeservice@epakke.no</p>&copy; 2019 ePakke · <a href="kontaktinfo.php">Kontaktinfo</a></div>
</body>
</html>
