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
				<li><a href=""><img src="img/info.jpg" style="width:30px;">Kontaktinfo</a></li>
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
				<?php
				if(!isset($_SESSION["name"])){
					echo '<li><a href="javascript:;" class="dropdown-toggle" id="profil" data-toggle="dropdown"><img src="img/profil.jpg" style="width:30px;"></a>
						<ul class="dropdown-menu">
							<div style="width:300px;">
								<div class="kryss" style="position:absolute;left:289px;top:-1px;color:gray;font-size:18px;">x</div>
								<div class="panel panel-primary" style="border-radius:3px 3px 0px 0px;border-bottom:0px;">
								<div class="panel-heading" style="color:white;background-color:#a1a1a1;font-weight:bold;border:3px 3px 0px 0px;">Husk handlekurven og se dine ordre</div>
								</div>
								<div class="panel panel-primary" style="position:relative;top:-20px;border-top:0px;border-radius:0px 0px 3px 3px;">
									<div class="panel-heading" style="color:black;background-color:white;border-radius:0px 0px 3px 3px;border-bottom:0px;">
										<form onsubmit="return false" id="login">
											<label for="email" style="font-weight:normal;">E-post</label>
											<input type="email" class="form-control" name="email" id="email" required/>
											<label for="email" style="font-weight:normal;">Passord</label>
											<input type="password" class="form-control" name="password" id="password" required/>
											<p><br/></p>
											<div>
											<a href="customer_registration.php">Lag ny bruker</a>
										</div>
											<input type="submit" value="Logg inn" class="btn btn-success" style="float:right;position:relative;top:-27px;">
										</form>
									</div>
									<div id="e_msg"></div>
								</div>
							</div>
						</ul>
					</li>';
				}else{
					echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/profil.jpg" style="width:30px;">';
					echo $_SESSION["name"];
					echo '</a>
						<ul class="dropdown-menu">
							<li><a href="customer_order.php" style="text-decoration:none;font-weight:bold;color:gray;height:40px;padding-top:10px;">Mine ordre</a></li>
							<hr style="padding:0;margin:0;">
							<li><a href="logout.php" style="text-decoration:none;font-weight:bold;color:gray;height:40px;padding-top:10px;">Logg ut</a></li>
						</ul>
					</li>';
				}
				?>
			</ul>
		</div>
	</div>
</div>
<br/>
<br/>
<br/>
<h2 style="padding-left:6px;">Epakke.no</h2>
<b style="padding-left:9px;">Kontaktinfo</b>
<hr>
<img style="float:right;width:600px;" src="img/kart.jpg">
<b style="padding-left:12px;">E-post:</b><p style="padding-left:14px;">kundeservice@epakke.no</p>
<b style="padding-left:12px;">E-post2:</b><p style="padding-left:14px;">daniel@epakke.no</p>
<b style="padding-left:12px;">Adresse:</b><p style="padding-left:14px;">St. Sunnivas gate, 2004 Lillestrøm</p>
<b style="padding-left:12px;">Telefon:</b><p style="padding-left:14px;">+47 468 69 852</p>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<div style="position:relative;top:-1366px;">
	<h1 style="padding-left:19px;height:50px;width:250px;font-size:31px;position:relative;top:6px;"><span class ="lime" style="font-size:119%;">e</span>Pakke<img src="img/pakke.png" style="width:30px;position:relative;top:-12px;left:-7px;"></h1>
	<p style="padding-left:19px;font-weight:bold;">Lillestrøm, Norge</p>
	<img src="img/bitcoinaccepted.jpg" style="width:100px;padding-right:3px;"><img src="img/betalingslosning.jpg" style="width:100px;">
	</div>
	<div class="panel-footer" style="text-align:center;position:absolute;bottom:0px;width:100%;"><p style="font-weight:bold;">kundeservice@epakke.no</p>&copy; 2019 ePakke · <a href="kontaktinfo.php">Kontaktinfo</a></div>
</body>
</html>
